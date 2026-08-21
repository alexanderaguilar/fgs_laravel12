@include('partials.breadcrumb', ['items' => [['label' => 'Impacto social']]])

<!-- BANNER PRINCIPAL -->
<div class="highlighted_banner position-relative" data-aos="fade-up" data-aos-duration="1000">
    <div class="position-relative content h-100">
        <img class="d-none d-sm-block object-fit-cover" src="/assets/img/2026/2026_02_impacto_header.jpg" onerror="this.src='https://placehold.co/1920x600?text=Impacto+Social'" alt="Impacto Social">
        <img class="d-block d-sm-none object-fit-cover" src="/assets/img/2026/2026_open_socialimpact.jpg" onerror="this.src='https://placehold.co/1920x600?text=Impacto+Social'" alt="Impacto Social">

        <div class="position-absolute info infoExt text-start">
            <button class="btn btn-secondary mb-3 btn-sm" data-action="history-back">
                <i class="fas fa-arrow-left me-2"></i> Volver
            </button>
            <h1 class="my-2 text-white fw-bold display-4">Nuestro impacto social</h1>
        </div>
    </div>      
</div>

<h1 class="m-3 mt-4 mb-2 fw-bold fst-italic d-none"><span class="text-deepblue">Nuestro impacto social</span></h1>

<div class="container py-5">
    <div class="tabs-container">
        <!-- Flecha indicadora de scroll -->
        <div class="scroll-indicator-tabs" id="tabArrow">
            <i class="bi bi-arrow-right-short"></i>
        </div>
        <!-- Navegación de Tabs -->
        <ul class="nnav nav-tabs nav-tabs-scroll" id="impactoTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="esencia-tab" data-bs-toggle="tab" data-bs-target="#esencia" type="button" role="tab" aria-controls="esencia" aria-selected="true">
                    Más de un siglo fieles al legado de nuestro fundador
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="empresas-tab" data-bs-toggle="tab" data-bs-target="#empresas" type="button" role="tab" aria-controls="empresas" aria-selected="false">
                    Impacto social desde nuestras empresas
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="territorios-tab" data-bs-toggle="tab" data-bs-target="#territorios" type="button" role="tab" aria-controls="territorios" aria-selected="false">
                    Impacto social desde nuestros Territorios Progreso
                </button>
            </li>
            <!-- NUEVA PESTAÑA CIFRAS BENTO -->
            <li class="nav-item" role="presentation">
                <button class="nav-link text-primary" id="cifras-tab" data-bs-toggle="tab" data-bs-target="#cifras" type="button" role="tab" aria-controls="cifras" aria-selected="false">
                    Nuestras Cifras en Resumen
                </button>
            </li>
        </ul>
    </div>

    <!-- Contenido de Tabs -->
    <div class="tab-content mt-4" id="impactoTabsContent">
        
        <!-- TAB 1: ESENCIA Y LEGADO -->
        <div class="tab-pane fade show active" id="esencia" role="tabpanel" aria-labelledby="esencia-tab">
            
            <section class="mb-5" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-start">
                        <h2 class="mb-4 text-deepblue fw-bold fst-italic">Más de un siglo <span class="text-blue">fieles al legado de nuestro fundador</span></h2>
                        <p class="mb-3">
                            Todo se remonta a la convicción de nuestro fundador, el Padre José María Campoamor,
de vincular a los pobres a la gestión de su propio desarrollo y que para ello un potente
instrumento era el ahorro. De hecho, la primera actividad que realizó, el mismo día en que
nació la Fundación, (enero de 1911) fue la creación de una Sección de Ahorros que se
convertiría luego en el Banco Caja Social, una de nuestras empresas.
                        </p>
                        <p class="mb-3">
                            Así mismo, inició otros proyectos que se llamarían “empresariales”, puesto que consistían
en la producción de bienes o servicios con propósito social, pero con viabilidad y retorno económico: cooperativas de consumo, mutualidades aseguradoras, talleres y granjas,
construcción de vivienda, entre otros.
                        </p>
                        <div class="alert alert-light border-start border-4 border-warning mt-4 shadow-sm" data-aos="fade-up"  data-aos-offset="200">
                            La visión de Campoamor constituye un marco y referente en materia de responsabilidad
frente a la sociedad que hoy se mantiene inalterado. Lo empresarial está en la esencia de
nuestra estrategia social, porque consideramos que su quehacer es inherente a ‘lo social’
y no debe buscarse como adicional a la gestión en sí misma.
                        </div>
                    </div>
                </div>
            </section>

            <hr class="my-5">

            <section class="mb-5" data-aos="fade-up">
                <div class="row g-4 align-items-stretch">
                    
                    <div class="col-lg-6">
                        <div class="sost-split-card">
                            <div class="sost-img-top" style="background-image: url('/assets/img/2026/2026_02_impacto_col_1.jpg');">
                                <h3>¿Cómo entendemos la sostenibilidad?</h3>
                            </div>
                            <div class="sost-body-bottom">
                                <p class="text-white">Creemos que se es Sostenible cuando se cuenta con las condiciones que <span class="highlight-word">permiten
                                permanecer en el tiempo fieles a la esencia, persiguiendo el fin fijado para la sociedad</span>,
                                logrando impactarla eficazmente y haciéndola cada vez más digna del ser humano.</p>
                                <p class="text-white">Cualquier labor, incluida la empresarial, lo es en la medida en que de manera
                                permanente, consistente y perdurable cumpla su propósito generando una huella positiva en su entorno.</p>
                                <p class="text-white">La sostenibilidad conlleva preguntarnos, incluso, por nuestro compromiso o
                                responsabilidad de extender la generación de riqueza a actores excluidos que no
                                participan, dada su vulnerabilidad, del bienestar que produce el desarrollo del sistema
                                económico.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="sost-split-card">
                            <div class="sost-img-top" style="background-image: url('/assets/img/2026/2026_02_impacto_col_2.jpg');">
                                <h3>Relación con la naturaleza</h3>
                            </div>
                            <div class="sost-body-bottom">
                                <p class="text-white">La gestión de nuestros impactos, los generados en el quehacer como aquellos que nos
                                afectan, positivos o negativos, es parte esencial del rol ante la sociedad. Por ello la
                                gestión de lo ambiental, incluido el cambio climático, está totalmente integrada en la
                                estrategia.</p>
                                <p class="text-white">Reconocemos que el planeta está en peligro por cuenta de los impactos negativos en el
                                medio ambiente y <span class="highlight-word">que tales efectos afectan principalmente a la población más vulnerable</span>,
                                que es aquella a la cual nos debemos. En este frente, los impactos negativos, pasados,
                                presentes y futuros son indiscutibles y es necesario gestionarlos.</p>
                                <p class="text-white">Es indispensable integrar el concepto de <span class="highlight-word">Justicia <sup>1</sup></span> en las discusiones sobre el ambiente,
                                siempre considerando la prevalencia de la vida humana. La gestión debe
                                realizarse con gradualidad, pertinencia y equilibrio.</p>
                                <p class="text-white" style="font-size:.7em; line-height:1.3em;"><sup>1</sup> "Es la disposición constante y firme que surge en el horizonte de la solidaridad y del amor de reconocer al otro en
1 dignidad humana, y el cumplimiento de los mutuos y de los respectivos deberes y obligaciones, con sensibilidad especial por los más necesitados". Definición del valor de la Justicia. Legado de la Fundación Grupo Social.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>

        <!-- TAB 2: EMPRESAS -->
        <div class="tab-pane fade" id="empresas" role="tabpanel" aria-labelledby="empresas-tab">

            <section class="mb-5">
                
                <div class="row mb-5">
                    <div class="text-start" data-aos="fade-up">
                        <h2 class="mb-4 text-deepblue fw-bold fst-italic">Impacto social <span class="text-blue">desde nuestras empresas</span></h2>
                        <p class="lead bg-light p-4 rounded-3">"Lo social" es inherente al quehacer empresarial y no debe buscarse como algo adicional a
su gestión, la cual conlleva necesariamente efectos serios, negativos y positivos, para la
sociedad, lo cual incluye el entorno en el cual se desarrolla y el bien común.</p>
                    </div>
                </div>

                <div class="container py-5">
                    <div class="row justify-content-start mb-5">
                        <div class="col-lg-12">
                            <h3 class="mb-4 text-deepblue fw-bold fst-italic">¿A qué se debe comprometer una empresa para ser sostenible?</h3>
                        </div>

                        <!-- Item 1 -->
                        <div class="col-12 col-lg-3 p-3 d-flex" data-aos="fade-up" data-aos-offset="100">
                            <p class="alert alert-light border-start border-4 border-warning shadow-sm h-100 w-100">
                                Debe satisfacer los intereses legítimos de todas las personas que participan en la cadena de valor, con criterios de justicia y en el largo plazo.
                            </p>
                        </div>

                        <!-- Item 2 -->
                        <div class="col-12 col-lg-3 p-3 d-flex" data-aos="fade-up" data-aos-offset="200">
                            <p class="alert alert-light border-start border-4 border-warning shadow-sm h-100 w-100">
                                Cuenta con la capacidad de asumir el impacto negativo y positivo que conlleva, pues no existe actividad empresarial socialmente neutra.
                            </p>
                        </div>

                        <!-- Item 3 -->
                        <div class="col-12 col-lg-3 p-3 d-flex" data-aos="fade-up" data-aos-offset="300">
                            <p class="alert alert-light border-start border-4 border-warning shadow-sm h-100 w-100">
                                Tiene la capacidad de adaptarse al entorno económico, político, social, ambiental, entre otros, en el cual se desarrolla su actividad empresarial. Ello implica ser competitiva.
                            </p>
                        </div>

                        <!-- Item 4 -->
                        <div class="col-12 col-lg-3 p-3 d-flex" data-aos="fade-up" data-aos-offset="400">
                            <p class="alert alert-light border-start border-4 border-warning shadow-sm h-100 w-100">
                                “Debe preguntarse por su eventual compromiso o la responsabilidad de extender la generación de riqueza a ‘otros actores’ que pueden denominarse los excluidos”
                                <br>
                                <small class="text-muted d-block mt-2" style="font-size:0.7rem;line-height:0.7rem;">[Documento Retorno justo esperado en las inversiones de capital de la Fundación Grupo Social. 2017].</small>
                            </p>
                        </div>
                    </div>
                </div>
            

                <div class="row justify-content-start mb-5">
                    <div class="col-lg-12">
                        <h3 class="mb-4 text-deepblue fw-bold fst-italic">¿Cómo entendemos el Impacto Social de las Empresas?</h3>
                        <p>Son cuatro las funciones del quehacer empresarial a partir de las cuales debe entenderse
su impacto en la sociedad y por las cuales hemos decidido que sea interpretada la labor
de nuestras empresas. Así ofrecemos su gestión como un testimonio de la cultura que
queremos encontrar en la sociedad.</p>
                    </div>
                </div>
        
                <div class="tabs-container">
                    <div class="scroll-indicator-tabs" id="tabArrow">
                        <i class="bi bi-arrow-right-short"></i>
                    </div>
                    <ul class="nnav nav-tabs nav-tabs-scroll" id="tabSub" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="necesidades-tab" data-bs-toggle="tab" data-bs-target="#necesidades" type="button" role="tab" aria-controls="necesidades" aria-selected="true">Satisfacer verdaderas necesidades</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="riqueza-tab" data-bs-toggle="tab" data-bs-target="#riqueza" type="button" role="tab" aria-controls="riqueza" aria-selected="false">Generar la máxima riqueza para la sociedad en su conjunto</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="comunidad-tab" data-bs-toggle="tab" data-bs-target="#comunidad" type="button" role="tab" aria-controls="comunidad" aria-selected="false">Comunidad de personas</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="actor-tab" data-bs-toggle="tab" data-bs-target="#actor" type="button" role="tab" aria-controls="actor" aria-selected="false">Actor de la sociedad civil</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content mb-3" id="tabSubContent">
                    
                    <div class="tab-pane fade show active" id="necesidades" role="tabpanel" aria-labelledby="necesidades-tab">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-5 mb-4 mb-md-0 text-center">
                                <img src="/assets/img/2026/2026_02_impacto_tab_1.jpg" class="img-fluid rounded-20 shadow-lg" alt="Inclusión y Necesidades">
                            </div>
                            <div class="col-md-5">
                                <div class="content-card">
                                    <h3 class="mb-4 text-deepblue fw-bold fst-italic">Satisfacer verdaderas necesidades</h3>
                                    <p class="mb-3">
                                        Nuestro modelo de actuación busca, en las realidades donde opera, a través de sus
servicios, productos, canales y procesos, la satisfacción de necesidades prioritarias y la
apertura de caminos de inclusión y oportunidad para quienes no los han tenido, sectores
populares que no son atendidos adecuadamente por la oferta tradicional formal.
                                    </p>
                                    <p class="mb-0">
                                        En otras palabras, intenta nuevas rutas para la convivencia, la igualdad de oportunidades,
la inclusión y el bienestar de todos aquellos con los cuales se relaciona.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="riqueza" role="tabpanel" aria-labelledby="riqueza-tab">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-5 order-md-2 mb-4 mb-md-0 text-center">
                                <img src="/assets/img/2026/2026_02_impacto_tab_2.jpg" class="img-fluid rounded-20 shadow-lg mb-3" alt="Sostenibilidad Económica">
                            </div>
                            <div class="col-md-5 order-md-1">
                                <div class="content-card">
                                    <h3 class="mb-4 text-deepblue fw-bold fst-italic">Generar la máxima riqueza para la sociedad en su conjunto</h3>
                                    <p class="mb-3">
                                        Consideramos que nuestra actividad empresarial debe estar orientada a prestar servicios
y productos claves para el mercado popular, pero con viabilidad económica, de manera
sostenible y con una razonable rentabilidad. Lo contrario es a la larga destructor de valor
para la sociedad en su conjunto. Esto impone para las empresas el reto de ser altamente
productivas y rentables.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-10 order-md-3">
                                <div class="content-card">
                                    <p class="mb-3">
                                        Uno de los retos que tenemos consiste en determinar cuál es el retorno considerado justo
para una inversión de capital, entendido como el que sea muy compatible con los valores
que queremos impulsar en la sociedad, lo cual no puede atentar contra la solidez de
nuestras empresas.
                                    </p>
                                    <p class="mb-3">
                                        Se trata de encontrar un retorno que no tiene que ser el máximo, pero que mire con
realismo el mercado, el rigor económico y la solidez técnica. Es la ‘prueba de fuego’ de
todo el planteamiento puesto que en el ‘retorno justo’ enfrentado al ‘retorno máximo’ se
juega la verdadera voluntad de compartir con la sociedad el valor generado en la actividad
productiva.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="comunidad" role="tabpanel" aria-labelledby="comunidad-tab">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-5 mb-4 mb-md-0 text-center">
                                <img src="/assets/img/2026/2026_02_impacto_tab_3.jpg" class="img-fluid rounded-20 shadow-lg" alt="Comunidad de Personas">
                            </div>
                            <div class="col-md-5">
                                <div class="content-card">
                                    <h3 class="mb-4 text-deepblue fw-bold fst-italic">Comunidad de personas</h3>
                                    <p class="mb-3">
                                       Nuestra cultura organizacional, entendida como la forma en que una comunidad de
personas piensa, se expresa y actúa, no solo es habilitador de la gestión del talento
humano sino garantía de sostenibilidad del legado y requisito mínimo de coherencia para
cumplir el propósito.
                                    </p>
                                    <p class="mb-3">
                                       Hemos abordado esta función a partir de un reconocimiento de los valores que orientan
nuestros comportamientos institucionales y personales que debemos hacer realidad en el
día a día.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="actor" role="tabpanel" aria-labelledby="actor-tab">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-5 order-md-2 mb-4 mb-md-0 text-center">
                                <img src="/assets/img/2026/2026_02_impacto_tab_4.jpg" class="img-fluid rounded-20 shadow-lg" alt="Actor de la sociedad civil">
                            </div>
                            <div class="col-md-5 order-md-1">
                                <div class="content-card">
                                    <h3 class="mb-4 text-deepblue fw-bold fst-italic">Actor de la sociedad civil</h3>
                                    <p class="mb-3">
                                        Nuestras empresas cumplen su tarea de participar activamente en el debate y solución de
los grandes temas que afectan el bienestar de toda la sociedad, con una auténtica
preocupación por el bien común. En este ámbito intentan ser referente de una actuación
proactiva, propositiva, veraz y crítica, nunca en función de sus intereses particulares sino
de aquellos relevantes para el colectivo.
                                    </p>
                                    <p class="mb-3">
                                       Esta visión está presente en todas nuestras relaciones, en especial, en los numerosos
espacios colectivos en que actuamos: gremios, asociaciones, órganos de la sociedad civil,
alianzas, ambientes académicos, entre otros.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section>

        </div>

        <!-- TAB 3: TERRITORIOS -->
        <div class="tab-pane fade" id="territorios" role="tabpanel" aria-labelledby="territorios-tab">

            <div class="row align-items-center mb-5">
                <div class="col-lg-12 mb-4 mb-lg-0">
                    <h2 class="mb-4 text-deepblue fw-bold fst-italic">Impacto <span class="text-blue">desde Territorios Progreso</span></h2>
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <p class="mb-3">Destinamos al desarrollo de nuestra Misión la totalidad de los ingresos que percibimos, es
decir, a contribuir a superar las causas estructurales de la pobreza para construir una
sociedad justa, solidaria, productiva y en paz, a través de nuestra actividad empresarial y
de los programas denominados Territorios Progreso.</p>
                    <p class="mb-3">En los Territorios Progreso, acompañamos a comunidades excluidas en distintos
territorios del país, para que ellas logren gestionar su propio desarrollo y alcancen un
mejoramiento sostenible en su calidad de vida, entendida esta no solo en el aspecto
material sino en la auténtica realización integral de las personas, en un marco de ética y
valores.</p>
                </div>
                
                <div class="col-lg-6">
                    
                    <h5 class="text-deepblue fw-bold text-center mt-4 mb-3" style="font-size: 0.9rem; line-height: 1.3;">10 resultados para la calidad de vida en los Territorios Progreso</h5>

                    <div id="carouselTerritorios" class="carousel slide territorios-slider-container" data-bs-interval="false">
                        <div class="carousel-inner">
                            
                            <!-- Slide 1 (Green) -->
                            <div class="carousel-item active">
                                <div class="territorios-card theme-1">
                                    <div class="territorios-header">
                                        <img src="/assets/img/2026/2026_impacto_svg_slide_1.svg" alt="Ingreso Sostenible" onerror="this.src='https://placehold.co/80x80/transparent/white?text=Icon'">
                                    </div>
                                    <div class="territorios-body">
                                        <p>La mayoría de las personas de la comunidad cuenta con un ingreso sostenible para el acceso a los bienes y servicios compatibles con una vida digna.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 2 (Teal) -->
                            <div class="carousel-item">
                                <div class="territorios-card theme-2">
                                    <div class="territorios-header">
                                        <img src="/assets/img/2026/2026_impacto_svg_slide_2.svg" alt="Comunidad Educada" onerror="this.src='https://placehold.co/80x80/transparent/white?text=Icon'">
                                    </div>
                                    <div class="territorios-body">
                                        <p>Comunidad educada: calidad y pertinencia</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 3 (Steel Blue) -->
                            <div class="carousel-item">
                                <div class="territorios-card theme-3">
                                    <div class="territorios-header">
                                        <img src="/assets/img/2026/2026_impacto_svg_slide_3.svg" alt="Ciudadanos con Iniciativa" onerror="this.src='https://placehold.co/80x80/transparent/white?text=Icon'">
                                    </div>
                                    <div class="territorios-body">
                                        <p>Ciudadanos con iniciativa y poder. Participan en la gestión de lo público con sus derechos y deberes (control social).</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 4 (Blue) -->
                            <div class="carousel-item">
                                <div class="territorios-card theme-4">
                                    <div class="territorios-header">
                                        <img src="/assets/img/2026/2026_impacto_svg_slide_4.svg" alt="Capacidad para interactuar" onerror="this.src='https://placehold.co/80x80/transparent/white?text=Icon'">
                                    </div>
                                    <div class="territorios-body">
                                        <p>Comunidad con capacidad para interactuar e incidir en la institucionalidad y comprometerla con el desarrollo.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 5 (Purple Red) -->
                            <div class="carousel-item">
                                <div class="territorios-card theme-5">
                                    <div class="territorios-header">
                                        <img src="/assets/img/2026/2026_impacto_svg_slide_5.svg" alt="Identidad y Visión" onerror="this.src='https://placehold.co/80x80/transparent/white?text=Icon'">
                                    </div>
                                    <div class="territorios-body">
                                        <p>Comunidad con identidad, sentido compartido y visión del futuro</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 6 (Light Purple) -->
                            <div class="carousel-item">
                                <div class="territorios-card theme-6">
                                    <div class="territorios-header">
                                        <img src="/assets/img/2026/2026_impacto_svg_slide_6.svg" alt="Convivencia" onerror="this.src='https://placehold.co/80x80/transparent/white?text=Icon'">
                                    </div>
                                    <div class="territorios-body">
                                        <p>Comunidad que reconoce el valor supremo de la vida, y cuenta con herramientas para resolver los conflictos para vivir en convivencia.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 7 (Brick Red) -->
                            <div class="carousel-item">
                                <div class="territorios-card theme-7">
                                    <div class="territorios-header">
                                        <img src="/assets/img/2026/2026_impacto_svg_slide_7.svg" alt="Medio Ambiente" onerror="this.src='https://placehold.co/80x80/transparent/white?text=Icon'">
                                    </div>
                                    <div class="territorios-body">
                                        <p>Comunidad que cuida y es responsable con el medio ambiente y las generaciones futuras.</p>
                                    </div>
                                </div>
                            </div>

                             <!-- Slide 8 (Gold) -->
                             <div class="carousel-item">
                                <div class="territorios-card theme-8">
                                    <div class="territorios-header">
                                        <img src="/assets/img/2026/2026_impacto_svg_slide_8.svg" alt="Solidaridad" onerror="this.src='https://placehold.co/80x80/transparent/white?text=Icon'">
                                    </div>
                                    <div class="territorios-body">
                                        <p>Comunidad solidaria que es corresponsable con el desarrollo de los otros.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 9 (Orange Brown) -->
                            <div class="carousel-item">
                                <div class="territorios-card theme-9">
                                    <div class="territorios-header">
                                        <img src="/assets/img/2026/2026_impacto_svg_slide_9.svg" alt="Sentido Ético" onerror="this.src='https://placehold.co/80x80/transparent/white?text=Icon'">
                                    </div>
                                    <div class="territorios-body">
                                        <p>Comunidad con sentido de lo ético en lo personal, lo comunitario y lo público.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 10 (Yellow) -->
                            <div class="carousel-item">
                                <div class="territorios-card theme-10">
                                    <div class="territorios-header">
                                        <img src="/assets/img/2026/2026_impacto_svg_slide_10.svg" alt="Espiritualidad" onerror="this.src='https://placehold.co/80x80/transparent/white?text=Icon'">
                                    </div>
                                    <div class="territorios-body">
                                        <p>Comunidad con sentido de la espiritualidad que entiende su calidad de vida más allá de los logros materiales.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <button class="carousel-control-prev carousel-control-custom" type="button" data-bs-target="#carouselTerritorios" data-bs-slide="prev">
                            <i class="bi bi-arrow-left-short"></i>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next carousel-control-custom" type="button" data-bs-target="#carouselTerritorios" data-bs-slide="next">
                            <i class="bi bi-arrow-right-short"></i>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>

            </div>

        </div>

        <!-- ==============================================================
             TAB 4: NUESTRAS CIFRAS EN RESUMEN (BENTO GRID APLICADO AQUÍ)
             ============================================================== -->
        <div class="tab-pane fade" id="cifras" role="tabpanel" aria-labelledby="cifras-tab">
            <section class="mb-5 impact-data-panel impact-data-panel--internal" data-aos="fade-up">
                <h2 class="text-deepblue colored_lines position-relative pb-3 mb-3 we_700 ifi-page-title">
                    Conoce nuestro <strong>Impacto Social en Cifras</strong>
                </h2>
                <p class="section-subtitle">Un resumen de los principales resultados de nuestra gestión a través de las empresas y los Territorios Progreso.</p>

                @include('components.impact_figures_internal')
            </section>
        </div>

    </div>
</div>