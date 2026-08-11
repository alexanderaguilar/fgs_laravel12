<div class="container-fluid p-1 p-lg-5 py-lg-2 bg-light border-bottom slider-container">
    <!-- Icono de flecha más visible (Bootstrap Icons) -->
    <div class="scroll-indicator" id="scrollArrow">
        <i class="bi bi-arrow-right-short"></i>
    </div>

    <div class="row d-flex align-items-center py-md-3 py-1 slider-menu g-0 justify-content-lg-center" id="menuSlider">
        
        @php
            $links = [
                ['url' => '/conocenos/quienes-somos', 'label' => '¿Quiénes somos?'],
                ['url' => '/conocenos/como-somos', 'label' => '¿Cómo somos?'],
                ['url' => '/conocenos/que-hacemos', 'label' => '¿Qué hacemos?'],
                ['url' => '/conocenos/historia', 'label' => 'Historia'],
                ['url' => '/conocenos/asuntos-corporativos', 'label' => 'Asuntos corporativos'],
                ['url' => '/conocenos/trabaja-con-nosotros', 'label' => 'Trabaja con nosotros'],
            ];
        @endphp

        @foreach($links as $link)
            <div class="col-auto text-center menu-item">
                <div class="menu-content h-100">
                    <a href="{{ url($link['url']) }}">{{ $link['label'] }}</a>
                </div>
            </div>
        @endforeach

    </div>
</div>
