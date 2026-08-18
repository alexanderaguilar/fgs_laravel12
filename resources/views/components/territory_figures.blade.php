{{-- Cifras territorio: mismo lenguaje visual que impact-figures --}}
@php
    $territoryText = \App\Support\Cms::plainText($citydata->territory ?? '');
    $datosText = \App\Support\Cms::plainText($citydata->looking_for ?? '');
    $habitantesText = \App\Support\Cms::plainText($citydata->habitantes ?? '');
@endphp

<section class="container my-5 territory-figures" aria-label="Cifras del territorio">
    <div class="impact-figures">
        <div class="impact-container territory-figures__panel">
            <div class="internal-grid internal-grid-3">

                <article class="stat-card territory-stat" data-aos="fade-up" data-aos-duration="700" data-aos-delay="0">
                    <div class="territory-stat__icon-wrap" aria-hidden="true">
                        <i class="bi bi-geo-alt territory-stat__icon"></i>
                    </div>
                    <h3 class="stat-label territory-stat__label">Territorio</h3>
                    <p class="stat-desc territory-stat__desc">{{ $territoryText !== '' ? $territoryText : '—' }}</p>
                </article>

                <article class="stat-card territory-stat territory-stat--accent" data-aos="fade-up" data-aos-duration="700" data-aos-delay="100">
                    <div class="territory-stat__icon-wrap" aria-hidden="true">
                        <i class="bi bi-clipboard-data territory-stat__icon"></i>
                    </div>
                    <h3 class="stat-label territory-stat__label">Datos clave</h3>
                    <p class="stat-desc territory-stat__desc">{{ $datosText !== '' ? $datosText : '—' }}</p>
                </article>

                <article class="stat-card territory-stat" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
                    <div class="territory-stat__icon-wrap" aria-hidden="true">
                        <i class="bi bi-people territory-stat__icon"></i>
                    </div>
                    <h3 class="stat-label territory-stat__label">Habitantes</h3>
                    <p class="stat-desc territory-stat__desc territory-stat__desc--value">{{ $habitantesText !== '' ? $habitantesText : '—' }}</p>
                </article>

            </div>
        </div>
    </div>
</section>
