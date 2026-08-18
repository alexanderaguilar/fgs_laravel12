# Fundación Grupo Social — Laravel 12 + Statamic 6

Sitio corporativo migrado desde Laravel 9 + Voyager a **Laravel 12** + **Statamic 6 Free** (contenido flat-file), con front Blade híbrido.

## Stack

| Componente | Versión |
|------------|---------|
| PHP | **8.5 recomendado en producción** (`composer.json` acepta `^8.3` para desarrollo local) |
| Laravel | 12.x |
| Statamic CMS | 6.x Free |
| Contenido | Flat-file en `content/` |
| Admin | Control Panel en `/cp` (`/admin` redirige a `/cp`) |

## Requisitos

- PHP 8.3+ (ideal **8.5**) con extensiones: `mbstring`, `xml`, `curl`, `zip`, `gd` o `imagick`, `intl`, `bcmath`, `pdo_sqlite` o `pdo_mysql`
- Composer 2
- Node.js 18+ (opcional; el front público usa assets estáticos en `public/assets`)

## Instalación (desarrollo)

```bash
cp .env.example .env
composer install
php artisan key:generate
php artisan storage:link
# Solo (gratis): máximo 1 usuario CP. Si ya existe users/*.yaml, no uses make:user.
php please make:user tu@email.com   # solo si aún no hay ningún usuario
php please stache:warm
php artisan serve
```

Control Panel: [http://127.0.0.1:8000/cp](http://127.0.0.1:8000/cp)

**Statamic Solo (Free)** — `STATAMIC_PRO_ENABLED=false` (default):

- Un solo usuario de CP. Crear un segundo usuario exige Pro (`Statamic Pro is required`).
- No uses `make:user --super` si ya hay un usuario; resetea la contraseña del existente.
- Usuario local: `admin@fundaciongruposocial.co` (ver `users/`). Para resetear:

```bash
php -r 'echo password_hash("TuNuevaClave", PASSWORD_BCRYPT), PHP_EOL;'
# Sustituye password_hash en users/admin@fundaciongruposocial.co.yaml
```

Pro es opcional (roles, multi-usuario, revisiones, etc.). Este proyecto está pensado para **Solo**.

Auth del CP: en `config/auth.php` el provider `users` debe usar `driver: statamic` (usuarios en `users/*.yaml`). Si queda en `eloquent`, el login del CP fallará aunque el password sea correcto.

### Importar contenido desde dump Voyager

Con el dump en `database/fgsupdate_20260814_prod.sql` y medios en `storage/app/public`:

```bash
php artisan fgs:import-voyager --fresh
php please stache:clear
php please stache:warm
php artisan fgs:rewrite-content-urls
php please search:update site
```

Opciones:

- `--sql=database/fgsupdate_20260814_prod.sql`
- `--only=posts,pages,territories,home_banners` (subset; p. ej. solo home + territorios: `--only=home_banners,territories`)
- `--fresh` (borra entries de collections antes de importar)

Los envíos históricos `meet_youes` se archivan en `storage/app/imports/meet_youes.csv` (PII).

## Variables de entorno clave

```env
APP_NAME="Fundación Grupo Social"
APP_URL=http://127.0.0.1:8000
APP_ENV=local
APP_DEBUG=true

# Contacto Zendesk (ya no se hardcodea el token en el código)
ZENDESK_API_EMAIL=usuario@dominio.co
ZENDESK_API_TOKEN=

# Statamic
STATAMIC_LICENSE_KEY=
```

**`APP_URL` (crítico):** debe ser la URL pública exacta (esquema + host + puerto). Local con `artisan serve` → `http://127.0.0.1:8000`. Producción → `https://fundaciongruposocial.co` (dominio canónico). El front usa rutas root-relative (`/assets/...`, `/storage/...`) y helpers `url()`/`asset()`; no hardcodea `http://localhost`.

Rotar en producción: reCAPTCHA, GTM y demás valores importados en Globals `site` (CP → Globals).

## Estructura de contenido Statamic

| Collection / recurso | Origen legacy | Front |
|----------------------|---------------|-------|
| `posts` + taxonomía `categories` | `posts`, `categories` | Sí (`/noticias`, detalle `/noticias/{slug}` + JSON-LD `NewsArticle`; `/testimonios?fuente=empresas|territorios` filtra `companies-testimonials` / `work-in-communities-testimonials`) |
| `pages` | `pages` | Parcial (catch-all; About/FAQ/EN suelen ser Blade) |
| `territories` | `city_details` | Sí |
| `home_banners` | `home_banner_videos` | Sí (home: 5 más recientes por `order`; `thumbnail` ≥768px / `thumbnail_mobile` &lt;768px) |
| `home_campaigns` | nuevo | Sí (home: hasta 4 tarjetas “Así abrimos puertas…”; `image`, `tag`, `cta_*`, `order`) |
| `home_owner_logos` | nuevo | Sí (home: franja “Dueña de”; PNG blanco/transparente + `display_rank`) |
| `home_ctas` | nuevo | Sí (home: CTAs tras logos — Historias / Informe; `block_type`, textos, imagen, URL) |
| `faqs` | `faqs` | Sí (`/preguntas-frecuentes`, tabs `generales` / `empresas` / `territorios`) |
| `social_foundations` | `social_foundations` | Sí (empresas por `activity`) |
| `participate_capitals` | `participate_capitals` | Sí (bloque “Participa del capital” en empresas) |
| `company_logos`, `foundation_logos` | tablas BREAD | Archivadas en `content/_archived/` (no usadas en front) |
| Globals `site` | `settings` site.* | Sí |
| Navs `front_*` | menús front Voyager | Top-level header + footer Conócenos vía CP; mega-menu Conócenos en Blade |
| Assets (disco `public`) | `storage/app/public` | `/storage/...` |

El front Blade lee contenido vía `App\Support\Cms` (API Statamic), no Eloquent/Voyager.

### Home: campañas + logos “Dueña de” (CP)

| Qué | Colección CP | Cómo se usa |
|-----|--------------|-------------|
| Tarjetas (máx. 4) | **Campañas Home** (`home_campaigns`) | Imagen, etiqueta, título, CTA URL/texto, orden |
| Logos blancos | **Logos Dueña de (Home)** (`home_owner_logos`) | PNG transparente blanco sobre fondo azul; orden `display_rank`; URL opcional |
| CTAs post-logos | **CTAs Home** (`home_ctas`) | Tipo `historias` (foto + CTA) o `informe` (columnas + badge); orden |

Operativa recomendada:

1. Sube medios en **Assets** (carpeta sugerida `home-campaigns/` o `home-owner-logos/`).
2. Crea/edita entradas en cada colección; marca **Publicado**.
3. Logos: PNG o SVG **blanco/monocromo claro** con fondo transparente; el rail es `#163863`. Carpeta de assets sugerida: `home-owner-logos/`.
4. Tras cambios: `php please stache:clear` (o guardar desde CP ya refresca Stache).
5. Vista: `components/home_module_campaigns.blade.php` (después de impacto, antes de noticias).
6. CP → **Collections → Logos Dueña de (Home)** → Create Entry → subir logo en el campo Assets.

### Home: CTAs Historias + Informe (CP)

| Bloque | `block_type` | Campos clave |
|--------|--------------|--------------|
| Historias de progreso | `historias` | `title`, `subtitle`, `background_image`, `cta_text`, `cta_url` |
| Informe de labores | `informe` | `title`, `subtitle`, `highlight_label`, `highlight_year`, `badge_text`, `cta_url` |

1. Assets en carpeta `home-ctas/` (foto horizontal para Historias).
2. CP → **Collections → CTAs Home** → editar las dos entradas (orden 1 y 2).
3. Vista: `components/home_module_ctas.blade.php` (justo después del carousel de logos, antes de noticias).
4. Estilos: `public/assets/css/components/home-ctas.css`.

### Buscador del sitio (header)

Flujo en producción:

1. Icono de lupa en el header abre un **overlay** a pantalla completa.
2. Desde **3 caracteres** se consultan sugerencias vía `GET /search/suggest?q=…` (debounce ~280 ms).
3. Enter o “Buscar” lleva a `/search?query=…` (resultados paginados).
4. Esc / backdrop / botón × cierran el overlay.

Motor: índice Statamic **`site`** (driver local Comb) **solo** sobre `posts` y `territories` (`title`, `excerpt`, `body`, `description`, `territory`, `looking_for`, `state`). No indexa páginas ni FAQs. Caché de respuesta 30 s por consulta.

Límites (por IP):

| Ruta | Límite |
|------|--------|
| `/search/suggest` | 40/min (`throttle:search-suggest`) |
| `/search` | 20/min (`throttle:search`) |

Tras desplegar o importar contenido masivo:

```bash
php please search:update site
```

Al guardar/publicar desde el CP, Statamic actualiza el índice de forma incremental.

| Pieza | Ubicación |
|-------|-----------|
| Overlay | `partials/search-overlay.blade.php` |
| JS | `public/assets/js/fgs/nav.js` |
| CSS | `public/assets/css/components/search-overlay.css` |
| Índice | `config/statamic/search.php` → `indexes.site` |
| API | `SearchController` / `Cms::search` + `Cms::searchSuggest` |

### CSS modular (front público)

El sitio **no** usa Vite/Tailwind en las vistas públicas. Los estilos viven en `public/assets/css/`:

| Capa | Ubicación | Carga |
|------|-----------|--------|
| Tokens + utilidades | `app.css` (`--primary-color`, `.text-deepblue`, etc.) | Siempre (`partials/head`) |
| Chrome legacy | `style.css` | Siempre |
| Componentes reutilizables | `components/*.css` (header, breadcrumb, search-overlay, highlighted-banner shell, banners home, home-campaigns, home-ctas, tabs, FAQ accordion, KPI, empresas, about, books, footer) | Siempre |
| Páginas | `pages/*.css` | Bajo demanda con `@push('styles')` en la vista root |

Reglas:

1. **No** añadir bloques `<style>` en Blade.
2. Tokens de color solo en `app.css` (`--primary-color: #163863`; alias `--bs-blue-corporate`).
3. Tipografía única: **Roboto** (`--font-family-base`). Escala fluida en `:root` (`--fs-h1`…`--fs-h6`, `--fs-body`) con `clamp()`; headings usan line-height unitless. `.colored_lines` no fuerza tamaño (hereda del `h*`). Clases legacy `.oswaldfonts` mapean a Roboto. No usar Oswald, Inter, Roboto Slab/Condensed.
4. Header fijo: `body { padding-top: var(--header-offset) }` (altura expandida, estable al scroll). `--header-height` es la altura en vivo (overlays). Medición en `fgs/nav.js`. Sin spacer `.extra_header`. Heroes: margen + `--fgs-hero-height` en `components/highlighted-banner.css` (`.highlighted_banner`, `#all_banners`, `.page_title_section` en `page-title-hero.css`).
5. Breadcrumb unificado: `partials/breadcrumb` + `components/breadcrumb.css`. Pasar `items` con etiquetas humanas (`['label' => '…', 'url' => '/…']`; el último sin `url` = página actual). Home / campañas full-bleed no llevan miga. No inventar padding bajo el header en cada página.
6. Para una página nueva, crear `public/assets/css/pages/mi-pagina.css` y en la vista que hace `@extends('layouts.app')`:

```blade
@push('styles')
    <link href="{{ asset('assets/css/pages/mi-pagina.css') }}" rel="stylesheet">
@endpush
```

Formularios W4P son HTML standalone: el `<link>` va en el `<head>` del propio component.

### JS modular (eventos del front)

El sitio **no** usa Vite/jQuery en vistas públicas. La lógica vive en `public/assets/js/fgs/`:

| Capa | Archivos | Carga |
|------|----------|--------|
| Vendors | `bootstrap.bundle.min.js`, `tiny-slider.js`, `aos.js` | `defer` en `partials/footerscripts` |
| Globales | `core`, `nav`, `sliders`, `video-modal`, `cookies`, `history-back`, `footer`, `tabs-scroll`, `share`, `init` | `defer` siempre |
| Página | `home`, `contact`, `posts-infinite`, `territories-*`, `books`, `because`, `w4p-*` | `@push('scripts')` o `<script src>` en W4P |

Reglas:

1. **No** bloques `<script>` con lógica en Blade (solo `src`, importmap o `@push`).
2. Eventos por delegación / `data-*`: `data-video-id`, `data-action="close-video|history-back"`.
3. Bootstrap `data-bs-*` se mantiene (FAQ, tabs, collapses).
4. `app.js` / `homescripts.js` son stubs deprecados.

```blade
@push('scripts')
    <script defer src="{{ asset('assets/js/fgs/contact.js') }}"></script>
@endpush
```

### Navegación CP vs Blade

- **Header top-level** (impacto / empresas / territorios): árbol Statamic `front_main_menu` (`content/trees/navigation/`).
- **Mega-menu Conócenos**: permanece en `resources/views/menu/mega_2.blade.php` (IA editorial rica; no está en el árbol importado).
- **Footer Conócenos**: árbol `front_footer_left`.
- Helper `menu('front_main_menu', 'menu.main_menu')` disponible para partials legacy.

### URLs de contenido

Tras importar o editar bodies con dominios absolutos:

```bash
php artisan fgs:rewrite-content-urls          # fundaciongruposocial.co / 3.91.33.230 → rutas root-relative; http:// → https://
php artisan fgs:rewrite-content-urls --dry-run
```

El post legacy con slug `documentos` se renombró a `documentos-registro-web-rte` y quedó `published: false` para no colisionar con `GET /documentos`.

## Modo desarrollo

1. `APP_ENV=local`, `APP_DEBUG=true`
2. Contenido editable en `content/` o en `/cp`
3. Assets estáticos del sitio: `public/assets/`
4. Medios CMS: `storage/app/public` → URL `/storage/...`
5. Tras cambios masivos en `content/`: `php please stache:clear && php please stache:warm`

```bash
composer run dev   # serve + queue + logs + vite (si se usa)
# o solo:
php artisan serve
```

## Modo producción

1. **PHP 8.5** FPM + HTTPS (runtime objetivo; `composer.json` admite `^8.3` solo para desarrollo local)
2. `APP_ENV=production`, `APP_DEBUG=false`
3. `composer install --no-dev --optimize-autoloader`
4. `php artisan config:cache && php artisan route:cache && php artisan view:cache`
5. `php please stache:warm`
6. `php please search:update site`
7. Desplegar `content/` (sin necesidad de `content/_archived/` en runtime), `users/`, `public/assets` y `storage/app/public` (o volumen compartido)
8. `php artisan storage:link`
9. Proteger `/cp` (HTTPS, usuarios fuertes, opcional IP allowlist)
10. Backups: `content/`, `users/`, assets y `.env`

### Deploy checklist (PHP 8.5)

- [ ] Instalar/activar **PHP 8.5** FPM en el servidor (`php -v` → 8.5.x)
- [ ] Extensiones: `mbstring`, `xml`, `curl`, `zip`, `gd|imagick`, `intl`, `bcmath`, `pdo_*`
- [ ] Apuntar el pool FPM / contenedor a 8.5 (no dejar 8.3/8.4 en prod)
- [ ] `composer install --no-dev` bajo PHP 8.5
- [ ] `storage:link` y permisos de escritura en `storage/` y `bootstrap/cache/`
- [ ] Medios (~578 MB) sincronizados
- [ ] Secrets rotados (Zendesk, reCAPTCHA, GTM)
- [ ] Índice de búsqueda: `php please search:update site`
- [ ] Smoke test automatizado (con `php artisan serve` en otra terminal):

```bash
chmod +x scripts/smoke-test.sh
./scripts/smoke-test.sh
# prod/staging: SMOKE_BASE_URL=https://tudominio.co ./scripts/smoke-test.sh
```

- [ ] Revisión visual manual (no cubierta por el script):
  - Breadcrumb visible bajo el header fijo (sin solaparse)
  - Lupa del header: sugerencias a partir de 3 caracteres
  - Home → CTA Informe: badge centrado dentro del bloque azul, esquinas superiores redondeadas
  - Territorio (ej. Mesetas): hover en tarjetas KPI; flechas del carrusel “Ruta” solo si hay >1 slide
  - Noticias / Testimonios: scroll infinito al llegar al final
- [ ] URLs extra en prod: `/conocenos/quienes-somos`, `/preguntas-frecuentes`, `/documentos`, `/cp`
- [ ] Redirect `/admin` → `/cp` verificado
- [ ] Confirmar que no queden links absolutos `fundaciongruposocial.co/storage` en content (o correr `fgs:rewrite-content-urls`)

## CI/CD — ramas `develop` y `main`

| Rama | Uso | Pipeline |
|------|-----|----------|
| `develop` | Integración y desarrollo local | **CI** en cada push/PR (tests PHPUnit + stache warm) |
| `main` | Producción (servidor 3.88.87.19) | **CI + deploy** automático vía GitHub Actions |

### Flujo de trabajo

```text
feature/*  ──PR──►  develop  ──PR──►  main  ──push──►  deploy EC2
                      │                    │
                   CI tests            CI + rsync + activate
```

1. Trabaja en ramas cortas y abre PR hacia `develop`.
2. Cuando `develop` esté estable, abre PR hacia `main`.
3. Al merge/push en `main`, GitHub Actions despliega en el servidor.

Crear y publicar `develop` (una vez):

```bash
git checkout -b develop   # si no existe
git push -u origin develop
```

### Servidor (3.88.87.19)

- **SO:** Ubuntu 22.04/24.04 en AWS EC2
- **Stack:** Nginx + PHP 8.3 FPM + Composer
- **Ruta app:** `/var/www/fgs/current` → release activo
- **Persistente:** `/var/www/fgs/shared/.env`, `/var/www/fgs/shared/storage/`
- **Acceso web:** HTTP basic auth en **todo el sitio** (incluye `/cp`) hasta abrir a público

#### Provisionamiento inicial (desde tu Mac)

```bash
# Define usuario/clave del popup del navegador
export BASIC_AUTH_USER=fgs
export BASIC_AUTH_PASSWORD='TuClaveSegura'
export SSH_KEY="$HOME/Documents/Dev/AWS/MaFriend_USEast.cer"
export DEPLOY_HOST=3.88.87.19
export DEPLOY_USER=ubuntu   # o ec2-user en Amazon Linux

bash deploy/provision-remote.sh
```

En el servidor, completa el entorno:

```bash
sudo nano /var/www/fgs/shared/.env   # plantilla: deploy/env/production.env.example
php artisan key:generate --show       # local; copia APP_KEY al .env del servidor
```

Sincronizar medios (desde tu máquina, una vez o cuando cambien):

```bash
rsync -avz --progress \
  -e "ssh -i $SSH_KEY" \
  storage/app/public/ \
  ${DEPLOY_USER}@${DEPLOY_HOST}:/var/www/fgs/shared/storage/app/public/
```

Regenerar basic auth sin reinstalar todo:

```bash
sudo htpasswd -cb /etc/nginx/fgs-preview.htpasswd fgs 'NuevaClave'
sudo systemctl reload nginx
```

### Secretos GitHub (Settings → Secrets → Actions)

| Secret | Valor |
|--------|--------|
| `SSH_PRIVATE_KEY` | Contenido completo de `MaFriend_USEast.cer` |
| `DEPLOY_HOST` | `3.88.87.19` |
| `DEPLOY_USER` | `ubuntu` o `ec2-user` |
| `BASIC_AUTH_USER` | Mismo usuario del htpasswd (ej. `fgs`) |
| `BASIC_AUTH_PASSWORD` | Clave del basic auth (smoke test post-deploy) |

Opcional: crear environment **production** en GitHub con protección de rama `main`.

### Workflows

| Archivo | Trigger |
|---------|---------|
| `.github/workflows/ci.yml` | Push/PR a `develop` |
| `.github/workflows/deploy-production.yml` | Push a `main` |

Cada deploy: rsync del código → `deploy/activate-release.sh` (composer prod, caches, stache, search) → smoke HTTP con basic auth.

### Quitar basic auth (cuando vaya a dominio público)

Comentar o eliminar en `/etc/nginx/sites-available/fgs-preview`:

```nginx
auth_basic "FGS Preview";
auth_basic_user_file /etc/nginx/fgs-preview.htpasswd;
```

Luego `sudo nginx -t && sudo systemctl reload nginx` y configurar TLS (Certbot) con el dominio final.

## Comandos útiles

```bash
php artisan fgs:import-voyager --fresh
php artisan fgs:rewrite-content-urls
php please stache:clear
php please stache:warm
php please search:update site
php please make:user email@ejemplo.com   # Solo: solo si no existe ningún usuario aún
php artisan about
```

## Notas de migración

- Voyager eliminado; no hay BREAD ni tablas `data_types`/`data_rows` en runtime.
- Rutas públicas conservadas; posts en `/noticias/{slug}`; catch-all `/{slug}` resuelve pages Statamic y redirige 301 posts legacy.
- Statamic frontend routing desactivado (`config/statamic/routes.php` → `enabled => false`); el Blade propio sirve el sitio.
- Usuarios CP en archivos (`config/statamic/users.php` → `file`).

## Licencia

Código de aplicación: uso interno Fundación Grupo Social.  
Laravel y Statamic: según sus licencias open source.
