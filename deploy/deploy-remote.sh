#!/usr/bin/env bash
# Deploy manual a producción (misma lógica que GitHub Actions).
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
REPO_ROOT="$(cd "${SCRIPT_DIR}/.." && pwd)"

SSH_KEY="${SSH_KEY:-${HOME}/Documents/Dev/AWS/MaFriend_USEast.cer}"
DEPLOY_HOST="${DEPLOY_HOST:-3.88.87.19}"
DEPLOY_USER="${DEPLOY_USER:-ubuntu}"
RELEASE_ID="${RELEASE_ID:-$(git -C "$REPO_ROOT" rev-parse HEAD)}"

chmod 600 "$SSH_KEY"
RELEASE_DIR="/var/www/fgs/releases/${RELEASE_ID}"

echo "==> Release ${RELEASE_ID} → ${DEPLOY_HOST}"
ssh -i "$SSH_KEY" -o StrictHostKeyChecking=accept-new \
  "${DEPLOY_USER}@${DEPLOY_HOST}" "mkdir -p '${RELEASE_DIR}'"

rsync -az --delete \
  --exclude '.git' \
  --exclude '.github' \
  --exclude 'node_modules' \
  --exclude 'vendor' \
  --exclude '.env' \
  --exclude 'storage/logs/*' \
  --exclude 'storage/framework/cache/data/*' \
  --exclude 'storage/framework/sessions/*' \
  --exclude 'storage/framework/views/*' \
  --exclude 'database/*.sql' \
  --exclude 'tests' \
  --exclude '.phpunit.result.cache' \
  -e "ssh -i ${SSH_KEY} -o StrictHostKeyChecking=accept-new" \
  "${REPO_ROOT}/" "${DEPLOY_USER}@${DEPLOY_HOST}:${RELEASE_DIR}/"

ssh -i "$SSH_KEY" -o StrictHostKeyChecking=accept-new \
  "${DEPLOY_USER}@${DEPLOY_HOST}" \
  "RELEASE_ID='${RELEASE_ID}' bash '${RELEASE_DIR}/deploy/activate-release.sh'"

echo "==> Deploy activo: http://${DEPLOY_HOST}/"
