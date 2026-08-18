#!/usr/bin/env bash
# Smoke test rápido antes de deploy. Requiere servidor local (php artisan serve).
set -euo pipefail

BASE="${SMOKE_BASE_URL:-http://127.0.0.1:8000}"
FAIL=0

pass() { echo "  OK  $1"; }
fail() { echo "  FAIL $1"; FAIL=1; }

check_status() {
  local path="$1"
  local expect="${2:-200}"
  local code
  code=$(curl -s -o /dev/null -w "%{http_code}" "${BASE}${path}" -H "Accept: text/html" || echo "000")
  if [[ "$code" == "$expect" ]]; then
    pass "${code} ${path}"
  else
    fail "${code} ${path} (expected ${expect})"
  fi
}

fetch() {
  curl -sS --connect-timeout 5 --max-time 30 "${BASE}${1}" -H "Accept: text/html"
}

contains() {
  local haystack="$1"
  local needle="$2"
  [[ "$haystack" == *"$needle"* ]]
}

check_contains() {
  local path="$1"
  local needle="$2"
  local label="$3"
  local html
  html=$(fetch "$path")
  if contains "$html" "$needle"; then
    pass "${label}"
  else
    fail "${label} (missing: ${needle})"
  fi
}

check_not_contains() {
  local path="$1"
  local needle="$2"
  local label="$3"
  local html
  html=$(fetch "$path")
  if contains "$html" "$needle"; then
    fail "${label} (found: ${needle})"
  else
    pass "${label}"
  fi
}

echo "Smoke test → ${BASE}"
echo ""

echo "HTTP routes"
URLS=(
  "/"
  "/noticias"
  "/testimonios"
  "/testimonios?fuente=territorios"
  "/nuestros-territorios-progreso"
  "/nuestros-territorios-progreso/mesetas"
  "/nuestras-empresas"
  "/search?query=banco"
)
for u in "${URLS[@]}"; do
  check_status "$u"
done

echo ""
echo "AJAX / API"
for u in "/search/suggest?q=banco" "/noticias?page=2" "/testimonios?fuente=empresas&page=2"; do
  code=$(curl -s -o /dev/null -w "%{http_code}" "${BASE}${u}" \
    -H "X-Requested-With: XMLHttpRequest" -H "Accept: application/json" || echo "000")
  if [[ "$code" == "200" ]]; then pass "${code} ${u}"; else fail "${code} ${u}"; fi
done

echo ""
echo "Redirects"
code=$(curl -s -o /dev/null -w "%{http_code}" "${BASE}/nuestro-impacto-en-la-sociedad/testimonios")
if [[ "$code" == "302" || "$code" == "301" ]]; then
  pass "${code} legacy testimonios → /testimonios"
else
  fail "${code} legacy testimonios redirect"
fi

echo ""
echo "Markup / assets"
check_not_contains "/" "site-breadcrumb" "home sin breadcrumb"
check_contains "/noticias" "site-breadcrumb" "noticias con breadcrumb"
check_contains "/noticias" "posts-infinite.js" "infinite scroll JS en noticias"
check_contains "/testimonios" "posts-infinite.js" "infinite scroll JS en testimonios"
check_contains "/" "home-cta-report__badge" "badge Informe en home"
check_contains "/nuestros-territorios-progreso/mesetas" "territory-figures" "KPIs territorio (mesetas)"
check_not_contains "/noticias" "&oacute;" "sin entidades HTML en noticias"

echo ""
echo "PHPUnit (Search, Testimonials, Breadcrumb)"
if php artisan test --filter='SearchTest|TestimonialsTest|BreadcrumbTest' >/dev/null 2>&1; then
  pass "12 feature tests"
else
  fail "feature tests"
fi

echo ""
if [[ "$FAIL" -eq 0 ]]; then
  echo "All smoke checks passed."
  exit 0
else
  echo "Some checks failed."
  exit 1
fi
