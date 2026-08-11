<header>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            
            <a id="logo" class="navbar-brand" href="/">
                <img src="/assets/svg/logo_fgs.svg" class="img">
            </a>

            <div>
                @php
                    $socialLinks = \App\Support\Cms::entries('social_links', fn ($q) => $q->orderBy('order')); 
                @endphp
                
                @if(count($socialLinks)>1)
                    @foreach($socialLinks as $socialLink)
                        <a href="{{$socialLink->website}}" target="_blank"><img src="/assets/img/svg/{{$socialLink->class}}"></a>
                    @endforeach 	   	
                @endif
            </div>
            
            <button class="m-3 navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
				    {{menu('front-main-menu','menu.main_menu')}}
                </ul>
            </div>

        </div> 
    </nav>
</header>