#!/usr/bin/env bash
# Activa un release ya sincronizado en /var/www/fgs/releases/$RELEASE_ID
set -euo pipefail

APP_ROOT="/var/www/fgs"
APP_USER="${APP_USER:-www-data}"
PHP_BIN="${PHP_BIN:-php}"

RELEASE_ID="${RELEASE_ID:-}"
if [[ -z "$RELEASE_ID" ]]; then
  echo "RELEASE_ID requerido"
  exit 1
fi

RELEASE_DIR="${APP_ROOT}/releases/${RELEASE_ID}"
CURRENT_LINK="${APP_ROOT}/current"

if [[ ! -d "$RELEASE_DIR" ]]; then
  echo "Release no encontrado: ${RELEASE_DIR}"
  exit 1
fi

cd "$RELEASE_DIR"

echo "==> Composer (prod)"
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

echo "==> Enlaces compartidos"
rm -rf storage
ln -sfn "${APP_ROOT}/shared/storage" storage
ln -sfn "${APP_ROOT}/shared/.env" .env

mkdir -p bootstrap/cache
chown -R "${APP_USER}:${APP_USER}" bootstrap/cache 2>/dev/null || true

if [[ ! -L public/storage ]]; then
  ln -sfn "${APP_ROOT}/shared/storage/app/public" public/storage
fi

echo "==> Permisos storage"
if command -v sudo >/dev/null 2>&1; then
  sudo chown -R "${APP_USER}:${APP_USER}" "${APP_ROOT}/shared/storage" bootstrap/cache
  sudo chmod -R 775 "${APP_ROOT}/shared/storage" bootstrap/cache
else
  chown -R "${APP_USER}:${APP_USER}" "${APP_ROOT}/shared/storage" bootstrap/cache
  chmod -R 775 "${APP_ROOT}/shared/storage" bootstrap/cache
fi

echo "==> Laravel / Statamic"
"${PHP_BIN}" artisan storage:link --force 2>/dev/null || true
"${PHP_BIN}" artisan config:cache
"${PHP_BIN}" artisan route:cache
"${PHP_BIN}" artisan view:cache
"${PHP_BIN}" artisan fgs:rewrite-content-urls 2>/dev/null || true
"${PHP_BIN}" please stache:clear
"${PHP_BIN}" please stache:warm
"${PHP_BIN}" please search:update site

echo "==> Activar symlink"
ln -sfn "${RELEASE_DIR}" "${CURRENT_LINK}"
chown -h "${APP_USER}:${APP_USER}" "${CURRENT_LINK}" 2>/dev/null || true

echo "==> Limpiar releases antiguos (conservar 5)"
ls -1dt "${APP_ROOT}/releases/"* 2>/dev/null | tail -n +6 | xargs -r rm -rf

echo "Deploy activo: ${RELEASE_ID}"
