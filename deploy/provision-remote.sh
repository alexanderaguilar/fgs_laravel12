#!/usr/bin/env bash
# Bootstrap remoto desde tu máquina local (requiere llave SSH y acceso al servidor).
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
REPO_ROOT="$(cd "${SCRIPT_DIR}/.." && pwd)"

SSH_KEY="${SSH_KEY:-${HOME}/Documents/Dev/AWS/MaFriend_USEast.cer}"
DEPLOY_HOST="${DEPLOY_HOST:-3.88.87.19}"
DEPLOY_USER="${DEPLOY_USER:-ubuntu}"
BASIC_AUTH_USER="${BASIC_AUTH_USER:-fgs}"
BASIC_AUTH_PASSWORD="${BASIC_AUTH_PASSWORD:-}"

usage() {
  cat <<EOF
Uso:
  BASIC_AUTH_PASSWORD='clave-segura' bash deploy/provision-remote.sh

Variables:
  SSH_KEY              Ruta a la llave PEM (default: ~/Documents/Dev/AWS/MaFriend_USEast.cer)
  DEPLOY_HOST          IP o host (default: 3.88.87.19)
  DEPLOY_USER          Usuario SSH (default: ubuntu; probar ec2-user en Amazon Linux)
  BASIC_AUTH_USER      Usuario HTTP basic auth (default: fgs)
  BASIC_AUTH_PASSWORD  Obligatorio

EOF
}

if [[ -z "$BASIC_AUTH_PASSWORD" ]]; then
  usage
  exit 1
fi

if [[ ! -f "$SSH_KEY" ]]; then
  echo "No se encontró la llave: ${SSH_KEY}"
  exit 1
fi

chmod 600 "$SSH_KEY"

echo "==> Probar conexión SSH"
if ! ssh -i "$SSH_KEY" -o StrictHostKeyChecking=accept-new -o ConnectTimeout=15 \
  "${DEPLOY_USER}@${DEPLOY_HOST}" 'echo ok' 2>/dev/null; then
  if [[ "$DEPLOY_USER" == "ubuntu" ]]; then
    echo "Probando ec2-user..."
    DEPLOY_USER=ec2-user
    ssh -i "$SSH_KEY" -o StrictHostKeyChecking=accept-new \
      "${DEPLOY_USER}@${DEPLOY_HOST}" 'echo ok'
  else
    exit 1
  fi
fi

echo "==> Subir scripts de deploy"
ssh -i "$SSH_KEY" "${DEPLOY_USER}@${DEPLOY_HOST}" 'sudo mkdir -p /var/www/fgs/deploy && sudo chown -R $USER:$USER /var/www/fgs'
scp -i "$SSH_KEY" "${SCRIPT_DIR}/bootstrap-server.sh" "${DEPLOY_USER}@${DEPLOY_HOST}:/tmp/bootstrap-server.sh"
scp -i "$SSH_KEY" "${SCRIPT_DIR}/activate-release.sh" "${DEPLOY_USER}@${DEPLOY_HOST}:/var/www/fgs/deploy/activate-release.sh"
ssh -i "$SSH_KEY" "${DEPLOY_USER}@${DEPLOY_HOST}" 'chmod +x /tmp/bootstrap-server.sh /var/www/fgs/deploy/activate-release.sh'

echo "==> Ejecutar bootstrap en servidor"
ssh -i "$SSH_KEY" "${DEPLOY_USER}@${DEPLOY_HOST}" \
  "sudo BASIC_AUTH_USER='${BASIC_AUTH_USER}' BASIC_AUTH_PASSWORD='${BASIC_AUTH_PASSWORD}' bash /tmp/bootstrap-server.sh"

echo "==> Crear .env compartido (si no existe)"
ssh -i "$SSH_KEY" "${DEPLOY_USER}@${DEPLOY_HOST}" bash <<REMOTE
set -euo pipefail
if [[ ! -f /var/www/fgs/shared/.env ]]; then
  sudo mkdir -p /var/www/fgs/shared
  sudo cp /dev/null /var/www/fgs/shared/.env
  sudo chown ${DEPLOY_USER}:www-data /var/www/fgs/shared/.env
  sudo chmod 640 /var/www/fgs/shared/.env
  echo "Crea /var/www/fgs/shared/.env con APP_KEY y secretos (ver deploy/env/production.env.example)"
else
  echo ".env compartido ya existe"
fi
REMOTE

echo ""
echo "Provisionamiento remoto completado."
echo "Configura secretos GitHub y sube main para el primer deploy automático."
