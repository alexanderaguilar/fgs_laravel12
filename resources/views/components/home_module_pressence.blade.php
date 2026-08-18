<section class="somelogo_section d-none-767 actuamos ">
    <div class="container-fluid">
        <div class="left_right_padding_80 inner_text">
            <div class="d-flex justify-content-between align-items-center">
                <div class="width40 text_partew">
                <div>
                    <p>Tenemos presencia en más de<strong> 760 municipios</strong> del país, en los que se encuentra más del <strong>92%</strong> de la población colombiana.</p>
                    <p>Así mismo, nuestro trabajo con comunidades lo desarrollamos en diversas zonas de<strong> 11 municipios</strong>, con una población de<strong> 1.310.851 habitantes.</strong></p>
                    <p>Somos una fundación con más de<strong> 8.500 funcionarios</strong> que, con su trabajo diario, contribuyen a alcanzar nuestro propósito.</p>
                </div>
                </div>
                <div class="width60 logo_part">
                    <div class="d-flex flex-wrap align-items-center justify-content-center">
                        @foreach($mapLogo as $ml)
                            <div class="logo_si"><img src="./storage/{{ $ml->logo }}"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>