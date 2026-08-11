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
php please make:user tu@email.com --super
php please stache:warm
php artisan serve
```

Control Panel: [http://127.0.0.1:8000/cp](http://127.0.0.1:8000/cp)

Usuario inicial de migración (cambiar password): `admin@fundaciongruposocial.co` (ver archivo en `users/`).

### Importar contenido desde dump Voyager

Con el dump en `database/fgsupdate_20260617_prod.sql` y medios en `storage/app/public`:

```bash
php artisan fgs:import-voyager --fresh
php please stache:clear
php please stache:warm
```

Opciones:

- `--sql=database/fgsupdate_20260617_prod.sql`
- `--only=posts,pages,territories` (subset)
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
| `posts` + taxonomía `categories` | `posts`, `categories` | Sí (`/noticias`, detalle `/noticias/{slug}` + JSON-LD `NewsArticle`) |
| `pages` | `pages` | Parcial (catch-all; About/FAQ/EN suelen ser Blade) |
| `territories` | `city_details` | Sí |
| `home_banners` | `home_banner_videos` | Sí |
| `faqs` | `faqs` | Sí (`/preguntas-frecuentes`, tabs `generales` / `empresas` / `territorios`) |
| `social_foundations` | `social_foundations` | Sí (empresas por `activity`) |
| `participate_capitals` | `participate_capitals` | Sí (bloque “Participa del capital” en empresas) |
| `company_logos`, `foundation_logos` | tablas BREAD | Archivadas en `content/_archived/` (no usadas en front) |
| Globals `site` | `settings` site.* | Sí |
| Navs `front_*` | menús front Voyager | Top-level header + footer Conócenos vía CP; mega-menu Conócenos en Blade |
| Assets (disco `public`) | `storage/app/public` | `/storage/...` |

El front Blade lee contenido vía `App\Support\Cms` (API Statamic), no Eloquent/Voyager.

### CSS modular (front público)

El sitio **no** usa Vite/Tailwind en las vistas públicas. Los estilos viven en `public/assets/css/`:

| Capa | Ubicación | Carga |
|------|-----------|--------|
| Tokens + utilidades | `app.css` (`--primary-color`, `.text-deepblue`, etc.) | Siempre (`partials/head`) |
| Chrome legacy | `style.css` | Siempre |
| Componentes reutilizables | `components/*.css` (banners, tabs, FAQ accordion, KPI, empresas, about, books, footer) | Siempre |
| Páginas | `pages/*.css` | Bajo demanda con `@push('styles')` en la vista root |

Reglas:

1. **No** añadir bloques `<style>` en Blade.
2. Tokens de color solo en `app.css` (`--primary-color: #163863`; alias `--bs-blue-corporate`).
3. Tipografía única: **Roboto** (`--font-family-base`). Clases legacy `.oswaldfonts` mapean a Roboto. No usar Oswald, Inter, Roboto Slab/Condensed ni `var(--font-family-base)` sin definirlo en `:root`.
4. Para una página nueva, crear `public/assets/css/pages/mi-pagina.css` y en la vista que hace `@extends('layouts.app')`:

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
php artisan fgs:rewrite-content-urls          # reescribe fundaciongruposocial.co → rutas root-relative
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
6. Desplegar `content/` (sin necesidad de `content/_archived/` en runtime), `users/`, `public/assets` y `storage/app/public` (o volumen compartido)
7. `php artisan storage:link`
8. Proteger `/cp` (HTTPS, usuarios fuertes, opcional IP allowlist)
9. Backups: `content/`, `users/`, assets y `.env`

### Deploy checklist (PHP 8.5)

- [ ] Instalar/activar **PHP 8.5** FPM en el servidor (`php -v` → 8.5.x)
- [ ] Extensiones: `mbstring`, `xml`, `curl`, `zip`, `gd|imagick`, `intl`, `bcmath`, `pdo_*`
- [ ] Apuntar el pool FPM / contenedor a 8.5 (no dejar 8.3/8.4 en prod)
- [ ] `composer install --no-dev` bajo PHP 8.5
- [ ] `storage:link` y permisos de escritura en `storage/` y `bootstrap/cache/`
- [ ] Medios (~578 MB) sincronizados
- [ ] Secrets rotados (Zendesk, reCAPTCHA, GTM)
- [ ] Smoke test: `/`, `/noticias`, `/nuestros-territorios-progreso`, `/nuestras-empresas`, `/conocenos/quienes-somos`, `/preguntas-frecuentes`, `/documentos`, `/cp`
- [ ] Redirect `/admin` → `/cp` verificado
- [ ] Confirmar que no queden links absolutos `fundaciongruposocial.co/storage` en content (o correr `fgs:rewrite-content-urls`)

## Comandos útiles

```bash
php artisan fgs:import-voyager --fresh
php artisan fgs:rewrite-content-urls
php please stache:clear
php please stache:warm
php please make:user email@ejemplo.com --super
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
