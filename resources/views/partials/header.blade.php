@php
    $socialLinks = \App\Support\Cms::entries('social_links', fn ($q) => $q->orderBy('order'));
    $mainNavItems = \App\Support\Cms::navItems('front_main_menu');
@endphp

<header id="site-header" class="site-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a id="logo" class="navbar-brand me-2" href="/" aria-label="Fundación Grupo Social — Inicio">
                <img src="/assets/svg/logo_fgs.svg" class="img" alt="Fundación Grupo Social">
            </a>

            @if(count($socialLinks) > 1)
                <div class="site-header-social d-none d-sm-flex ms-1">
                    @foreach($socialLinks as $socialLink)
                        <a href="{{ $socialLink->website }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $socialLink->class }}">
                            <i class="bi bi-{{ $socialLink->class }}"></i>
                        </a>
                    @endforeach
                </div>
            @endif

            <button
                class="navbar-toggler ms-auto ms-lg-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#main_nav"
                aria-controls="main_nav"
                aria-expanded="false"
                aria-label="Abrir menú"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="main_nav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                    <li class="nav-item dropdown has-megamenu">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdownConocenos"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            Conócenos
                        </a>
                        @include('menu.mega_2')
                    </li>
                    @foreach($mainNavItems as $navItem)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $navItem->url }}">{{ $navItem->title }}</a>
                        </li>
                    @endforeach
                </ul>
                <button
                    class="btn btn-outline-light search-btn p-0 m-0 border-0"
                    type="button"
                    id="site-search-open"
                    aria-label="Abrir buscador"
                    aria-haspopup="dialog"
                    aria-controls="site-search"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" aria-hidden="true">
                        <g transform="translate(-7979 -1409)">
                            <rect width="40" height="40" rx="20" transform="translate(7979 1409)" fill="#f5f5f5"/>
                            <path d="M13.91,13.924l4.438,4.424M15.79,9.4A6.4,6.4,0,1,1,9.4,3,6.4,6.4,0,0,1,15.79,9.4Z" transform="translate(7988.826 1418.826)" fill="none" stroke="#70b5e6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
</header>
