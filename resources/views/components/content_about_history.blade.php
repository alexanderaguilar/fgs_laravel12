@include('partials.breadcrumb', ['items' => [['label' => 'Conócenos', 'url' => '/conocenos/quienes-somos'], ['label' => 'Historia']]])

@include('menu.mega_about')

<!-- BANNER PRINCIPAL -->
<div class="highlighted_banner position-relative d-none d-md-block" data-aos="fade-up" data-aos-duration="1000">
    <div class="position-relative content">
        <img class="object-fit-cover" src="/assets/img/2026/2026_01_conocenos_header_historia.jpg" onerror="this.src='https://placehold.co/1920x600?text=Historia'" alt="Historia">

        <div class="position-absolute info infoExt text-start">
            <a class="btn btn-secondary mb-3" data-action="history-back" href="#">Volver</a>
            <h1 class="my-2 text-white fw-bold">Historia</h1>
        </div>
    </div>      
</div>

<h1 class="m-3 mt-4 mb-2 fw-bold fst-italic d-block d-md-none"><span class="text-deepblue">Historia</span></h1>

<div class="container py-md-2 py-2">

    <!-- SECCIÓN: INTRODUCCIÓN -->
    <section class="mb-5" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-start">
                <h5 class="highlighted_title fw-bold fst-italic mt-5 mb-3">
                    Nuestra historia nace de una visión adelantada en el tiempo y un compromiso genuino con una sociedad más justa y llena de oportunidades.
                </h5>
                <p>
                    Desde 1911 hemos caminado al lado de quienes más lo necesitan, creyendo en su capacidad para transformar su realidad. Así comenzó una obra que, fiel a su origen, ha crecido impulsando iniciativas que dignifican, promueven y abren puertas al progreso colectivo.
                </p>
            </div>
        </div>
    </section>

    <hr class="my-5">

    <!-- SECCIÓN: LÍNEA DE TIEMPO -->
    <section class="mb-5" data-aos="fade-up">
        <div class="text-center mb-5">
            <h2 class="text-deepblue we_700 colored_lines position-relative pb-3 d-inline-block">Línea de tiempo</h2>
        </div>

        <div class="timeline">
            
            <!-- 1911 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">1911</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_001.jpg" onerror="this.src='https://placehold.co/600x400?text=1911'" alt="Padre José María Campoamor S.J.">
                    <p>El 1 de enero, el Padre José María Campoamor S.J., junto con un grupo de obreros y algunos benefactores, crea el Círculo de Obreros de San Francisco Javier (hoy Fundación Grupo Social). Ese mismo día, el Círculo crea la Sección de Ahorros (hoy Banco Caja Social).</p>
                </div>
            </div>

            <!-- 1913 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">1913</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_002.jpg" onerror="this.src='https://placehold.co/600x400?text=1913'" alt="Barrio Villa Javier">
                    <p>El 7 de septiembre se pone la primera piedra para la inauguración del barrio Villa Javier en Bogotá, iniciativa pionera de vivienda popular en el país, cumpliendo el sueño del padre Campoamor de brindar vivienda digna a la clase obrera.</p>
                </div>
            </div>

            <div class="timeline-bridge" aria-hidden="false">
                <p class="timeline-bridge__text">
                    Con el fin de brindar oportunidades y herramientas a los obreros de la época para que tuvieran una vida digna, a partir de estos años, el Círculo crea granjas agrícolas, escuelas, talleres nocturnos, hospederías, cajas de previsión, restaurantes escolares, mutualidades y pensiones para la vejez e invalidez, buscando una vida digna para los obreros.
                </p>
            </div>

            <!-- 1930 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">1930</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_003.jpg" onerror="this.src='https://placehold.co/600x400?text=1930'" alt="Círculo de Obreros — Caja de Ahorros">
                    <p>La Sección de Ahorros pasa a ser la Caja de Ahorros del Círculo de Obreros.</p>
                </div>
            </div>

            <!-- 1933 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">1933</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_004.jpg" onerror="this.src='https://placehold.co/600x400?text=1933'" alt="Villa Javier consolidado">
                    <p>El barrio Villa Javier ya contaba con 120 casas construidas, una sucursal de la Caja de Ahorros, escuelas, talleres, instituto nocturno y enseñanza de agricultura en los jardines y la huerta. Funcionaban además sala cuna, hospedería, capilla, piscina y teatro.</p>
                </div>
            </div>

            <!-- 1946 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">1946</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_005.jpg" onerror="this.src='https://placehold.co/600x400?text=1946'" alt="Fallecimiento Padre Campoamor">
                    <p>El 31 de enero fallece el padre José María Campoamor S.J., fundador del Círculo de Obreros, pero su Legado continúa.</p>
                </div>
            </div>

            <!-- 1972 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">1972</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_006.jpg" onerror="this.src='https://placehold.co/600x400?text=1972'" alt="Expansión empresarial Grupo Social">
                    <p>Aparece la figura del Grupo Social e inicia la expansión empresarial de la organización con la creación de nuevas empresas en diferentes sectores.</p>
                    <p>La Caja de Ahorros del Círculo de Obreros se convierte en Caja Social de Ahorros, consolidándose como una entidad de ahorro y crédito.</p>
                </div>
            </div>

            <!-- 1974 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">1974</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_007.jpg" onerror="this.src='https://placehold.co/600x400?text=1974'" alt="Constructora Colmena">
                    <p>Se crea la Promotora Colmena, posteriormente Colmena Constructora, dedicada a la construcción de vivienda para los sectores populares.</p>
                    <p>Se crea la Corporación de Ahorro y Vivienda Colmena, para crear condiciones para favorecer el ahorro orientado a la adquisición de vivienda y al sector de la construcción.</p>
                </div>
            </div>

            <!-- 1980 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">1980</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_008.jpg" onerror="this.src='https://placehold.co/600x400?text=1980'" alt="Seguros Colmena">
                    <p>Se crea Colmena Seguros.</p>
                    <p>Se crea la Corporación Social de Recreación y Cultura Servir, con el fin de administrar el centro de recreación Las Palmeras (Villeta) y otros centros de formación alrededor del país.</p>
                </div>
            </div>

            <!-- 1981 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">1981</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_009.jpg" onerror="this.src='https://placehold.co/600x400?text=1981'" alt="Cenpro Comunicaciones">
                    <p>Se crea la Corporación Social para las Comunicaciones, Cenpro, con el interés de transformar la sociedad a través de la comunicación, divulgando valores y principios basados en el bien común.</p>
                    <p>Se constituye Colmena Fiduciaria.</p>
                </div>
            </div>

            <!-- 1984 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">1984</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_010.jpg" onerror="this.src='https://placehold.co/600x400?text=1984'" alt="Buen Vecino">
                    <p>Se humanizó la imagen corporativa de la Caja Social de Ahorros a través de la figura del "Buen Vecino", comunicando un mensaje de mayores servicios a la comunidad.</p>
                </div>
            </div>

            <!-- 1985 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">1985</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_011.jpg" onerror="this.src='https://placehold.co/600x400?text=1985'" alt="Minero Félix — Colmena">
                    <p>Aparece el minero "Felix" como imagen de la Corporación de Ahorro y Vivienda Colmena. Representaba la laboriosidad y el esfuerzo colectivo. Reforzó la identidad de la compañía como una entidad comprometida con el trabajo conjunto y el progreso social. Así como sucedió con el "Buen Vecino", es uno de los momentos insignia de las marcas colombianas.</p>
                </div>
            </div>

            <!-- 1986 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">1986</span>
                    
                    <p>Se implementaron programas de acompañamiento para el desarrollo con enfoque poblacional: programas integrales comunitarios en barrios y programas para microempresarios, recicladores, comunicación social, educación y madres comunitarias.</p>
                </div>
            </div>

            <!-- 1988 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">1988</span>
                    
                    <p>Se proclama el Documento Axiológico que enmarca la actuación de la organización y se define un nuevo modelo de intervención de, en ese entonces, Fundación Social.</p>
                    <p>Inicia el modelo de intervención mediante tres instrumentos que fueron evolucionando con el tiempo: las empresas, los programas sociales y el macroinflujo.</p>
                </div>
            </div>

            <!-- 1990 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">1990</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_014.jpg" onerror="this.src='https://placehold.co/600x400?text=1990'" alt="Colmena Capitalizadora">
                    <p>Se crea Colmena Capitalizadora.</p>
                </div>
            </div>

            <!-- 1991 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">1991</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_015.jpg" onerror="this.src='https://placehold.co/600x400?text=1991'" alt="Cesantías y Pensiones Colmena">
                    <p>Se crea Cesantías y Pensiones Colmena.</p>
                    <p>La Caja Social de Ahorros se convierte en establecimiento bancario y cambia su nombre a Caja Social.</p>
                </div>
            </div>

            <!-- 1993 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">1993</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_016.jpg" onerror="this.src='https://placehold.co/600x400?text=1993'" alt="De pies a cabeza — Cenpro">
                    <p>Inicia emisión de la serie ‘De pies a cabeza’ producida por Cenpro Televisión.</p>
                </div>
            </div>

            <!-- 1994 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">1994</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_017.jpg" onerror="this.src='https://placehold.co/600x400?text=1994'" alt="Colmena Seguros ARL y modelo DIL">
                    <p>Se crea Colmena Seguros ARL.</p>
                    <p>El acompañamiento a comunidades se enfoca en el denominado Desarrollo Integral Local (DIL), orientado a generar 5 Condiciones Básicas para el Desarrollo: capital humano, sentido de lo público, capital institucional, fortalecimiento del tejido social e inserción a mercados.</p>
                </div>
            </div>

            <!-- 1995 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">1995</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_018.jpg" onerror="this.src='https://placehold.co/600x400?text=1995'" alt="Proyecto piloto DIL — Medellín Comuna 13">
                    <p>Inicia el montaje del primer proyecto piloto DIL en Medellín (Comuna 13), como experiencia demostrativa del enfoque futuro de Fundación Social y su trabajo con sectores populares.</p>
                </div>
            </div>

            <!-- 1996 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">1996</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_019.jpg" onerror="this.src='https://placehold.co/600x400?text=1996'" alt="Banco Caja Social — Su Banco amigo">
                    <p>La Caja Social cambia su nombre a Banco Caja Social, Su Banco amigo.</p>
                    <p>El Banco Caja Social y la Corporación Colmena empiezan a trabajar bajo un mismo esquema de grupo.</p>
                    <p>Se contaba con proyectos del Modelo DIL en: Medellín (Comuna 13), Cartagena (Comuna 14 y 16), Neiva (Comuna 9), Barranquilla (Comuna 5) y Cali (Comuna 6) y Bogotá (Patio Bonito).</p>
                </div>
            </div>

            <!-- 1997 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">1997</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_021.jpg" onerror="this.src='https://placehold.co/600x400?text=1997'" alt="Unificación imagen Colmena">
                    <p>Se unificó la imagen visual de las unidades de negocio de Colmena, utilizando en sus nombres las expresiones que concretaban la nueva imagen corporativa.</p>
                </div>
            </div>

            <!-- 2001 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">2001</span>
                    
                    <p>El acompañamiento a comunidades se trabajaba desde el Modelo DIL y también se contaba con un programa de paz y derechos humanos.</p>
                </div>
            </div>

            <!-- 2002 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">2002</span>
                    
                    <p>Se retira formalmente la Compañía de Jesús de Fundación Social, que con posterioridad a la muerte del fundador en 1946 fue animadora y orientadora de la obra en lo social, moral y apostólico, a pesar de no ser nunca dueña de la organización. La Fundación mantiene la esencia católica y la espiritualidad ignaciana como una de sus cuatro fuentes de pensamiento.</p>
                </div>
            </div>

            <!-- 2003 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">2003</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_023.jpg" onerror="this.src='https://placehold.co/600x400?text=2003'" alt="Premio a la Excelencia de la Micro y Pequeña Empresa">
                    <p>El Banco Caja Social y ANIF (Asociación Nacional de Instituciones Financieras) crean el Premio a la Excelencia de la Micro y Pequeña Empresa.</p>
                </div>
            </div>

            <!-- 2004 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">2004</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_024.jpg" onerror="this.src='https://placehold.co/600x400?text=2004'" alt="DECO Construcciones">
                    <p>En el acompañamiento a comunidades se consolida el modelo de Condiciones Básicas para el Desarrollo con 5 resultados.</p>
                    <p>Se crea DECO Construcciones.</p>
                </div>
            </div>

            <!-- 2005 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">2005</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_025.jpg" onerror="this.src='https://placehold.co/600x400?text=2005'" alt="BCSC — Banco Caja Social y Colmena">
                    <p>Se da origen al BCSC, un solo banco con dos marcas: Banco Caja Social BCSC y Colmena BCSC.</p>
                </div>
            </div>

            <!-- 2006 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">2006</span>
                    
                    <p>Se publica el Legado de la Organización, en el que se reafirma el propósito y los elementos esenciales del quehacer de la Fundación.</p>
                </div>
            </div>

            <!-- 2007 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">2007</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_027.jpg" onerror="this.src='https://placehold.co/600x400?text=2007'" alt="Promotora de Inversiones y Cobranzas">
                    <p>Se crea el Premio Emprender Paz, liderado por Fundación Grupo Social, un reconocimiento a organizaciones que cuentan con iniciativas empresariales sostenibles que aportan a la construcción de paz.</p>
                    <p>Se crea la Promotora de Inversiones y Cobranzas.</p>
                </div>
            </div>

            <!-- 2011 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">2011</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_028.jpg" onerror="this.src='https://placehold.co/600x400?text=2011'" alt="Centenario Banco Caja Social">
                    <p>Se cumple el centenario de Fundación Grupo Social (en ese entonces Fundación Social).</p>
                    <p>El Banco Caja Social, en su centenario, unifica las marcas, renueva su identidad gráfica y pasa de ser BCSC a Banco Caja Social, Más banco, más amigo.</p>
                    <p>Los programas sociales se desarrollaban en: Bogotá (Patiobonito, Kennedy y Bosa); en el Corredor Oriental de Pasto (Comuna 3 y corregimientos de Buesaquillo, Cabrera, La Laguna y Mocondino), Norte de Nariño, Taminango, San Lorenzo y La Unión; en el Valle de Aburrá en Caldas, Copacabana, Girardota, Barbosa y Bello; y en Ibagué (Comunas 6, 7 y 8) y en los corregimientos de San Bernardo y El Salado.</p>
                </div>
            </div>

            <!-- 2012 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">2012</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_029.jpg" onerror="this.src='https://placehold.co/600x400?text=2012'" alt="Modelo Calidad de Vida — Territorios Progreso">
                    <p>Se define el nuevo objetivo estratégico de la organización: “es indispensable que la Fundación contribuya de manera relevante a desarrollar en el país una nueva cultura basada en la solidaridad, la ética, valores trascendentes, búsqueda del bien común y el desarrollo de los sectores marginados. Para ello, deberá promover formas de actuación económica y convivencia social acordes con este propósito”.</p>
                    <p>Inicia el modelo de Calidad de Vida, entendido como el logro de 10 resultados que se deben alcanzar en el acompañamiento a comunidades en los Territorios Progreso, metodología que reemplazó al Modelo DIL.</p>
                </div>
            </div>

            <!-- 2013 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">2013</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_030.jpg" onerror="this.src='https://placehold.co/600x400?text=2013'" alt="Territorio Progreso — Cartagena UCG 6">
                    <p>Inicia el acompañamiento en la Unidad Comunera de Gobierno 6 (Cartagena), en el marco del modelo de Calidad de Vida de los Territorios Progreso.</p>
                </div>
            </div>

            <!-- 2015 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">2015</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_031.jpg" onerror="this.src='https://placehold.co/600x400?text=2015'" alt="Colmena Seguros">
                    <p>Colmena Vida y Riesgos Laborales cambia su marca a Colmena Seguros.</p>
                </div>
            </div>

            <!-- 2016 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">2016</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_031_A.jpg" onerror="this.src='https://placehold.co/600x400?text=2016'" alt="Gestora de Proyectos Empresariales">
                    <p>Se crea la Gestora de Proyectos Empresariales.</p>
                </div>
            </div>

            <!-- 2017 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">2017</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_032.jpg" onerror="this.src='https://placehold.co/600x400?text=2017'" alt="Transferencia metodológica Ibagué">
                    <p>Se realiza la entrega de resultados y transferencia metodológica a los actores comunitarios e institucionales en Ibagué, en donde se desarrollaba el modelo de Condiciones Básicas de Desarrollo.</p>
                </div>
            </div>

            <!-- 2019 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">2019</span>
                    <img class="timeline-img" src="/assets/img/fgs_logo_horizontal.svg" onerror="this.src='https://placehold.co/600x400?text=2019'" alt="Fundación Grupo Social — cambio de marca">
                    <p>La Fundación define su apuesta de visibilidad, entendiendo que era necesario dejarse ver y poder, sin ánimo de protagonismo, dar a conocer sus logros y experiencias para ser testimonio de la nueva cultura promulgada en su objetivo estratégico.</p>
                    <p>Se realiza el cambio de marca de Fundación Social a Fundación Grupo Social.</p>
                    <p>Se crea Inversora Fundación Grupo Social, Holding Financiero del Conglomerado Financiero de la Fundación Grupo Social.</p>
                    <p>Inicia el acompañamiento en Buriticá y Necoclí (Antioquia), en el marco del modelo de Calidad de Vida de los Territorios Progreso.</p>
                    <p>Se realiza la entrega de resultados y transferencia metodológica a los actores comunitarios e institucionales en Kennedy, Bosa (Bogotá) y Antioquia, en donde se desarrollaba el modelo de Condiciones Básicas de Desarrollo.</p>
                </div>
            </div>

            <!-- 2021 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">2021</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_034.jpg" onerror="this.src='https://placehold.co/600x400?text=2021'" alt="Acompañamiento comunitario durante la pandemia">
                    <p>Durante el momento más duro de la pandemia:</p>
                    <p>En una acción sin precedentes, Fundación Grupo Social pagó parte de la deuda de más de 600 mil clientes del Banco Caja Social que ascendía a más de 300 mil millones de pesos.</p>
                    <p>Al mismo tiempo, preservó los empleos de sus más de 9 mil colaboradores.</p>
                    <p>Desde los Territorios Progreso se llegó a más de 12.000 familias en distintos lugares del país garantizando el funcionamiento de 14 acueductos en Nariño, entregando mercados que sirvieron para la reactivación económica y entregando 365 obras en espacios públicos que promovieron la generación de ingresos en Soacha, Ibagué, Pasto y Cartagena.</p>
                    <p>Desde las empresas: Colmena Seguros acompañó a más de 15 mil afiliados con síntomas o afectados por el COVID 19, el Banco Caja Social redujo las cuotas de los créditos durante lo más severo de la cuarentena. Ambas compañías asumieron los costos de primas de seguros de más de 360 mil clientes, cuyas cuotas de los créditos fueron aplazados.</p>
                    <p>Se crea Entre Amigos, la fintech de la organización.</p>
                    <p>Se aprueba la escisión de Colmena Seguros para operar en los ramos de Riesgos Laborales y seguros de Personas. Se crea a su vez Colmena Seguros Generales.</p>
                    <p>Se realiza entrega de resultados y transferencia metodológica a los actores comunitarios e institucionales en Soacha y Nariño, en donde se desarrollaba el modelo de Condiciones Básicas de Desarrollo.</p>
                </div>
            </div>

            <!-- 2022 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">2022</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_035.jpg" onerror="this.src='https://placehold.co/600x400?text=2022'" alt="Nuevos Territorios Progreso">
                    <p>Inicia el acompañamiento en Algeciras (Huila), Tangua (Nariño) y Bilbao (Bogotá) en el marco del modelo de Calidad de Vida de los Territorios Progreso.</p>
                </div>
            </div>

            <!-- 2023 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">2023</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_036.jpg" onerror="this.src='https://placehold.co/600x400?text=2023'" alt="Buen Vecino renovado">
                    <p>Se renueva la imagen del "Buen Vecino" del Banco Caja Social.</p>
                    <p>Se constituye DECO Inversiones.</p>
                    <p>Inicia el acompañamiento en Sierra Morena (Bogotá), en el marco del modelo de Calidad de Vida de los Territorios Progreso.</p>
                </div>
            </div>

            <!-- 2024 -->
            <div class="timeline-container right">
                <div class="timeline-content">
                    <span class="timeline-year">2024</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_037.jpg" onerror="this.src='https://placehold.co/600x400?text=2024'" alt="Fiduciaria Caja Social">
                    <p>Colmena Fiduciaria cambia su marca a Fiduciaria Caja Social.</p>
                    <p>Se define la ruta para prestación de servicios a la tercera edad y se define la primera inversión en este sector.</p>
                </div>
            </div>

            <!-- 2025 -->
            <div class="timeline-container left">
                <div class="timeline-content">
                    <span class="timeline-year">2025</span>
                    <img class="timeline-img" src="/assets/img/2026/2026_content_history_038.jpg" onerror="this.src='https://placehold.co/600x400?text=2025'" alt="Territorio Progreso Mesetas — Meta">
                    <p>Fundación Grupo Social adquiere el 51% del Banco W, consolidándose como el actor más relevante del país en microfinanzas.</p>
                    <p>Inicia el acompañamiento en Mesetas (Meta), en el marco del modelo de Calidad de Vida de los Territorios Progreso.</p>
                </div>
            </div>

        </div>

    </section>

</div>
