#!/usr/bin/env bash
# Provisionamiento inicial del servidor EC2 (Ubuntu 22.04/24.04).
# Ejecutar EN EL SERVIDOR como root o con sudo:
#   curl -fsSL ... | bash
#   o: sudo bash deploy/bootstrap-server.sh
set -euo pipefail

APP_ROOT="/var/www/fgs"
APP_USER="${APP_USER:-www-data}"
DEPLOY_UNIX_USER="${DEPLOY_UNIX_USER:-ubuntu}"
PHP_VERSION="${PHP_VERSION:-8.3}"
SITE_NAME="${SITE_NAME:-fgs-preview}"
BASIC_AUTH_USER="${BASIC_AUTH_USER:-fgs}"
BASIC_AUTH_PASSWORD="${BASIC_AUTH_PASSWORD:-}"

if [[ "${EUID:-$(id -u)}" -ne 0 ]]; then
  echo "Ejecuta como root: sudo bash $0"
  exit 1
fi

if [[ -z "$BASIC_AUTH_PASSWORD" ]]; then
  echo "Define BASIC_AUTH_PASSWORD antes de ejecutar."
  echo "Ejemplo: sudo BASIC_AUTH_USER=fgs BASIC_AUTH_PASSWORD='TuClaveSegura' bash $0"
  exit 1
fi

export DEBIAN_FRONTEND=noninteractive

echo "==> Actualizar sistema"
apt-get update -y
apt-get upgrade -y

echo "==> Paquetes base"
apt-get install -y \
  nginx \
  git \
  unzip \
  curl \
  acl \
  ufw \
  software-properties-common \
  apache2-utils

echo "==> PHP ${PHP_VERSION} (ondrej PPA)"
add-apt-repository -y ppa:ondrej/php
apt-get update -y
apt-get install -y \
  "php${PHP_VERSION}-fpm" \
  "php${PHP_VERSION}-cli" \
  "php${PHP_VERSION}-mbstring" \
  "php${PHP_VERSION}-xml" \
  "php${PHP_VERSION}-curl" \
  "php${PHP_VERSION}-zip" \
  "php${PHP_VERSION}-gd" \
  "php${PHP_VERSION}-intl" \
  "php${PHP_VERSION}-bcmath" \
  "php${PHP_VERSION}-sqlite3" \
  "php${PHP_VERSION}-mysql"

echo "==> Composer"
if ! command -v composer >/dev/null 2>&1; then
  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
fi

echo "==> Estructura de despliegue"
mkdir -p "${APP_ROOT}/releases"
mkdir -p "${APP_ROOT}/shared/storage/app/public"
mkdir -p "${APP_ROOT}/shared/storage/framework/"{cache,sessions,views}
mkdir -p "${APP_ROOT}/shared/storage/logs"
mkdir -p "${APP_ROOT}/deploy"
mkdir -p /var/log/nginx

chown -R "${APP_USER}:${APP_USER}" "${APP_ROOT}/shared/storage"
chmod -R 775 "${APP_ROOT}/shared/storage"

usermod -aG "${APP_USER}" "${DEPLOY_UNIX_USER}" 2>/dev/null || true

echo "==> Basic auth (sitio completo, incl. /cp)"
HTPASSWD_FILE="/etc/nginx/${SITE_NAME}.htpasswd"
htpasswd -cb "${HTPASSWD_FILE}" "${BASIC_AUTH_USER}" "${BASIC_AUTH_PASSWORD}"
chmod 640 "${HTPASSWD_FILE}"
chown root:www-data "${HTPASSWD_FILE}"

echo "==> Nginx"
cat > "/etc/nginx/sites-available/${SITE_NAME}" <<NGINX
server {
    listen 80 default_server;
    listen [::]:80 default_server;
    server_name _;

    root ${APP_ROOT}/current/public;
    index index.php;

    auth_basic "FGS Preview";
    auth_basic_user_file ${HTPASSWD_FILE};

    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;

    client_max_body_size 64M;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php${PHP_VERSION}-fpm.sock;
        fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    location ~* \.(css|js|jpg|jpeg|png|gif|ico|svg|webp|woff2?)$ {
        expires 7d;
        access_log off;
        try_files \$uri =404;
    }
}
NGINX

ln -sf "/etc/nginx/sites-available/${SITE_NAME}" /etc/nginx/sites-enabled/${SITE_NAME}
rm -f /etc/nginx/sites-enabled/default

nginx -t
systemctl enable nginx "php${PHP_VERSION}-fpm"
systemctl restart "php${PHP_VERSION}-fpm"
systemctl restart nginx

echo "==> Firewall"
ufw allow OpenSSH
ufw allow 'Nginx Full'
ufw --force enable

echo "==> Placeholder current (hasta primer deploy)"
mkdir -p "${APP_ROOT}/current/public"
echo 'FGS — pendiente primer deploy desde rama main' > "${APP_ROOT}/current/public/index.html"
chown -R "${DEPLOY_UNIX_USER}:${APP_USER}" "${APP_ROOT}"

cat <<EOF

Bootstrap completado.

  App root:     ${APP_ROOT}
  Basic auth:   ${BASIC_AUTH_USER} / (la clave que definiste)
  PHP:          ${PHP_VERSION}
  URL:          http://$(curl -s http://169.254.169.254/latest/meta-data/public-ipv4 2>/dev/null || hostname -I | awk '{print $1}')/

Próximos pasos:
  1. Copiar deploy/activate-release.sh a ${APP_ROOT}/deploy/
  2. Crear ${APP_ROOT}/shared/.env (ver deploy/env/production.env.example)
  3. Sincronizar storage/app/public (~578 MB) a ${APP_ROOT}/shared/storage/app/public/
  4. Configurar secretos en GitHub y hacer push a main

EOF
