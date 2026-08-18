{{-- Overlay de búsqueda global --}}
<div
    id="site-search"
    class="site-search"
    hidden
    role="dialog"
    aria-modal="true"
    aria-labelledby="site-search-title"
>
    <div class="site-search__backdrop" data-site-search-close tabindex="-1"></div>

    <div class="site-search__panel">
        <div class="site-search__bar">
            <h2 id="site-search-title" class="visually-hidden">Buscar en el sitio</h2>
            <form class="site-search__form" method="GET" action="{{ route('search') }}" role="search">
                <label class="visually-hidden" for="site-search-input">Buscar</label>
                <i class="bi bi-search site-search__icon" aria-hidden="true"></i>
                <input
                    id="site-search-input"
                    class="site-search__input"
                    type="search"
                    name="query"
                    placeholder="Buscar noticias, páginas, territorios…"
                    autocomplete="off"
                    autocorrect="off"
                    spellcheck="false"
                    enterkeyhint="search"
                    data-suggest-url="{{ route('search.suggest') }}"
                    data-min-chars="3"
                >
                <button type="submit" class="site-search__submit">Buscar</button>
            </form>
            <button type="button" class="site-search__close" data-site-search-close aria-label="Cerrar buscador">
                <i class="bi bi-x-lg" aria-hidden="true"></i>
            </button>
        </div>

        <p class="site-search__hint" id="site-search-hint">Escribe al menos 3 caracteres para ver sugerencias.</p>

        <ul
            class="site-search__list"
            id="site-search-list"
            role="listbox"
            aria-label="Sugerencias de búsqueda"
            hidden
        ></ul>

        <a class="site-search__all" id="site-search-all" href="{{ route('search') }}" hidden>
            Ver todos los resultados
            <i class="bi bi-arrow-right" aria-hidden="true"></i>
        </a>
    </div>
</div>
