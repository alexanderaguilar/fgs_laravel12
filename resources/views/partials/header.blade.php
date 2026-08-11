<header>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            
            <a id="logo" class="navbar-brand" href="/">
                <img src="/assets/svg/logo_fgs.svg" class="img">
            </a>

            <div class="d-none d-sm-block">
                @php
                    $socialLinks = \App\Support\Cms::entries('social_links', fn ($q) => $q->orderBy('order'));
                @endphp
                
                @if(count($socialLinks)>1)
                    @foreach($socialLinks as $socialLink)
                        <a href="{{$socialLink->website}}" target="_blank" class="m-2"><i class="bi bi-{{$socialLink->class}}"></i></a>
                    @endforeach 	   	
                @endif
            </div>
            
            <button class="m-3 navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="main_nav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Conócenos
                    </a>
                        <div class="dropdown mega-menu" aria-labelledby="navbarDropdown">
                            {{-- Mega-menu IA stays in Blade; top-level links come from Statamic nav front_main_menu --}}
                            @include('menu.mega_2')
                        </div>
                    @foreach(\App\Support\Cms::navItems('front_main_menu') as $navItem)
                        <a class="nav-link" href="{{ $navItem->url }}">{{ $navItem->title }}</a>
                    @endforeach
                </ul>
                <form class="d-flex search-form" method="GET" action="{{ route('search') }}">
                    <input class="form-control form-control-sm me-2 search-input" type="search" placeholder="Inserta el criterio de búsqueda" aria-label="Search" name="query">
                    <button class="btn btn-outline-light search-btn p-0 m-0" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                        <g id="Group_67" data-name="Group 67" transform="translate(-7979 -1409)">
                            <rect id="Rectangle_323" data-name="Rectangle 323" width="40" height="40" rx="20" transform="translate(7979 1409)" fill="#f5f5f5"/>
                            <path id="search-svgrepo-com" d="M13.91,13.924l4.438,4.424M15.79,9.4A6.4,6.4,0,1,1,9.4,3,6.4,6.4,0,0,1,15.79,9.4Z" transform="translate(7988.826 1418.826)" fill="none" stroke="#70b5e6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </g>
                        </svg>
                    </button>
                </form>
            </div>

        </div> 
    </nav>
</header>