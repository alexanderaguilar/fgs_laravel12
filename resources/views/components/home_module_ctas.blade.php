{{-- CTAs home tras logos “Dueña de”: Historias + Informe (colección home_ctas) --}}
@if(($homeCtas ?? collect())->isNotEmpty())
<section id="home-ctas" class="home-ctas" aria-label="Destacados">
    <div class="container">
        <div class="home-ctas__stack">
            @foreach($homeCtas as $cta)
                @php
                    $type = $cta->block_type ?: 'historias';
                    $href = $cta->cta_url ?? '';
                    $target = $cta->target ?: '_self';
                    $rel = $target === '_blank' ? 'noopener noreferrer' : null;
                    $img = !empty($cta->background_image) ? '/storage/'.ltrim($cta->background_image, '/') : '';
                @endphp

                @if($type === 'historias')
                    @if($href !== '')
                        <a href="{{ $href }}" target="{{ $target }}" @if($rel) rel="{{ $rel }}" @endif class="home-cta home-cta--stories" data-aos="fade-up">
                    @else
                        <div class="home-cta home-cta--stories" data-aos="fade-up">
                    @endif
                        <div class="home-cta__media" aria-hidden="true">
                            @if($img)
                                <img src="{{ $img }}" alt="" class="home-cta__img" loading="lazy">
                            @endif
                            <div class="home-cta__shade"></div>
                        </div>
                        <div class="home-cta__content">
                            <h2 class="home-cta__title">{{ $cta->title }}</h2>
                            @if($cta->subtitle)
                                <p class="home-cta__subtitle">{{ $cta->subtitle }}</p>
                            @endif
                            @if($cta->cta_text)
                                <span class="home-cta__action">
                                    {{ $cta->cta_text }}
                                    <span class="home-cta__action-icon" aria-hidden="true">
                                        <i class="bi bi-arrow-right"></i>
                                    </span>
                                </span>
                            @endif
                        </div>
                    @if($href !== '')
                        </a>
                    @else
                        </div>
                    @endif

                @elseif($type === 'informe')
                    @if($href !== '')
                        <a href="{{ $href }}" target="{{ $target }}" @if($rel) rel="{{ $rel }}" @endif class="home-cta home-cta--report" data-aos="fade-up">
                    @else
                        <div class="home-cta home-cta--report" data-aos="fade-up">
                    @endif
                        <div class="home-cta-report">
                            <div class="home-cta-report__left">
                                <span class="home-cta-report__icon" aria-hidden="true">
                                    <i class="bi bi-file-earmark-text-fill"></i>
                                </span>
                                <div class="home-cta-report__copy">
                                    <h2 class="home-cta-report__title">{{ $cta->title }}</h2>
                                    @if($cta->subtitle)
                                        <p class="home-cta-report__subtitle">{{ $cta->subtitle }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="home-cta-report__right">
                                @if($cta->highlight_label)
                                    @php
                                        $label = trim((string) $cta->highlight_label);
                                        $anos = '';
                                        if (preg_match('/^(.*?)(\s*AÑOS)\s*$/iu', $label, $m)) {
                                            $label = rtrim($m[1]);
                                            $anos = 'AÑOS';
                                        }
                                    @endphp
                                    <p class="home-cta-report__label">
                                        {{ $label }}@if($anos)<span class="home-cta-report__anos">{{ $anos }}</span>@endif
                                    </p>
                                @endif
                                @if($cta->highlight_year)
                                    <p class="home-cta-report__year">
                                        @foreach(preg_split('//u', preg_replace('/\s+/', '', (string) $cta->highlight_year), -1, PREG_SPLIT_NO_EMPTY) as $digit)
                                            <span>{{ $digit }}</span>
                                        @endforeach
                                    </p>
                                @endif
                            </div>
                        </div>

                        @if($cta->badge_text)
                            <span class="home-cta-report__badge">{{ $cta->badge_text }}</span>
                        @endif
                    @if($href !== '')
                        </a>
                    @else
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
</section>
@endif
