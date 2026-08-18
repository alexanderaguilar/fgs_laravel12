@php
    $socialLinks = \App\Support\Cms::entries('social_links', fn ($q) => $q->orderBy('order'));
@endphp

<header id="site-header" class="site-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a id="logo" class="navbar-brand me-2" href="/" aria-label="Fundación Grupo Social — Home">
                <img src="/assets/svg/logo_fgs.svg" class="img" alt="Fundación Grupo Social">
            </a>

            @if(count($socialLinks) > 1)
                <div class="site-header-social d-none d-sm-flex ms-1">
                    @foreach($socialLinks as $socialLink)
                        <a href="{{ $socialLink->website }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $socialLink->class }}">
                            <img src="/assets/img/svg/{{ $socialLink->class }}" alt="">
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
                aria-label="Open menu"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="main_nav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                    {{ menu('front-main-menu','menu.main_menu') }}
                </ul>
            </div>
        </div>
    </nav>
</header>
