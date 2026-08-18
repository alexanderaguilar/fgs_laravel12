<section id="home-campaigns" class="home-campaigns py-5">
    <div class="container">
        <div class="home-campaigns__intro mb-4 mb-lg-5">
            <h2 class="text-deepblue colored_lines position-relative pb-3 mb-3 we_700">Así abrimos puertas al progreso</h2>
            <p class="home-campaigns__lead">Haz clic y descubre cómo abrimos puertas al progreso a través de nuestras empresas.</p>
        </div>

        @if(($campaigns ?? collect())->isNotEmpty())
            <div class="home-campaigns__grid">
                @foreach($campaigns as $i => $campaign)
                    @php
                        $img = $campaign->image ? '/storage/'.ltrim($campaign->image, '/') : '';
                        $href = $campaign->cta_url ?? '';
                        $target = $campaign->target ?: '_self';
                        $cta = $campaign->cta_text ?: 'Ver campaña';
                        $rel = $target === '_blank' ? 'noopener noreferrer' : null;
                    @endphp
                    <article class="home-campaign-card" data-aos="fade-up" data-aos-delay="{{ 100 + ($i * 80) }}">
                        @if($href !== '')
                            <a href="{{ $href }}" target="{{ $target }}" @if($rel) rel="{{ $rel }}" @endif class="home-campaign-card__link">
                        @else
                            <div class="home-campaign-card__link">
                        @endif
                            <div class="home-campaign-card__media overflow-hidden">
                                @if($img)
                                    <img src="{{ $img }}" alt="{{ $campaign->title }}" class="home-campaign-card__img" loading="lazy">
                                @endif
                                <div class="home-campaign-card__shade" aria-hidden="true"></div>
                            </div>
                            <div class="home-campaign-card__body">
                                @if($campaign->tag)
                                    <span class="home-campaign-card__tag">{{ $campaign->tag }}</span>
                                @endif
                                <h3 class="home-campaign-card__title">{{ $campaign->title }}</h3>
                                @if($href !== '')
                                    <span class="home-campaign-card__cta">
                                        {{ $cta }}
                                        <i class="bi bi-arrow-right" aria-hidden="true"></i>
                                    </span>
                                @endif
                            </div>
                        @if($href !== '')
                            </a>
                        @else
                            </div>
                        @endif
                    </article>
                @endforeach
            </div>
        @endif

        <div class="home-owner mt-5 pt-2" data-aos="fade-up">
            <div class="home-owner__heading">
                <img
                    src="{{ asset('assets/img/fgs_logo_horizontal.svg') }}"
                    alt="Fundación Grupo Social"
                    class="home-owner__logo-wordmark"
                    width="226"
                    height="38"
                >
                <span class="home-owner__tagline">DUEÑA DE</span>
            </div>

            @if(($ownerLogos ?? collect())->isNotEmpty())
                <div class="home-owner__bar">
                    <ul class="home-owner__logos" id="home_owner_logos" aria-label="Empresas de Fundación Grupo Social">
                        @foreach($ownerLogos as $logo)
                            @php
                                $src = $logo->logo ? '/storage/'.ltrim($logo->logo, '/') : '';
                                $site = $logo->website ?? '';
                            @endphp
                            @if($src)
                                <li class="home-owner__item">
                                    @if($site !== '')
                                        <a href="{{ $site }}" target="_blank" rel="noopener noreferrer" class="home-owner__logo-link" aria-label="{{ $logo->title }}">
                                            <img src="{{ $src }}" alt="{{ $logo->title }}" class="home-owner__logo" loading="lazy">
                                        </a>
                                    @else
                                        <span class="home-owner__logo-link" aria-hidden="false">
                                            <img src="{{ $src }}" alt="{{ $logo->title }}" class="home-owner__logo" loading="lazy">
                                        </span>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</section>
