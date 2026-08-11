<section id="bread-crumb" class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col py-2 px-4">
                <p><a href="/">Inicio</a> - <a href="/contatenos" class="text-decoration-none text-dark fw-bold">Contacto</a></p>
            </div>
        </div>
    </div>
</section>

<!-- BANNER PRINCIPAL -->
<div class="highlighted_banner position-relative d-none d-md-block" data-aos="fade-up" data-aos-duration="1000">
    <div class="position-relative content">
        <img class="object-fit-cover" src="/assets/img/2026/2026_contact_page.jpg" onerror="this.src='https://placehold.co/1920x600?text=Que+Hacemos'" alt="Contacto">

        <div class="position-absolute info infoExt text-start">
            <a class="btn btn-secondary mb-3" data-action="history-back" href="#">Volver</a>
            <h1 class="my-2 text-white fw-bold">Contacto</h1>
        </div>
    </div>      
</div>

<h1 class="m-3 mt-4 mb-2 fw-bold fst-italic d-block d-md-none"><span class="text-deepblue">Contáctenos</span></h1>

<section class="bg_white faq_section">
   <div class="width1200">
      <div class="faq_pra_section">
         <div class="d-flex flex-wrap-767 align-items-center justify-content-between">
            <div class="width100_767 width50 page_title_faq oswaldfonts">
               <h2>Escriba sus comentarios, preguntas o sugerencias en el siguiente formulario y en cuanto lo recibamos daremos respuesta a sus inquietudes.</h2>
               <div class="blank_space_50 d-none-767">&nbsp;</div>
               <hr class="black_line d-none-767" />
            </div>
            <div class="width100_767 width50 samll_text sourcesansprofonts d-none-767">
               <div class="btn_work_us sourcesansprofonts pull-right">
                  <h5 class="page_title_faq oswaldfonts pb-5">Si desea incluir su hoja de vida en nuestras bases de datos, consulte la secci&oacute;n Trabaje con Nosotros</h5>
                  <a href="https://trabajaconnosotros.fundaciongruposocial.co/" target="_blank" rel="noopener">Ir a trabaje con nosotros</a>
               </div>
            </div>
         </div>
      </div>
      <div class="faq_que_ans wow bounceInUp center">
         <div class="">
            <div class="inner contact">
               <div class="contact_form">

                  <!-- Bloque de Alertas (Éxito y Error) -->
                  @if(Session::has('front_message_success'))
                     <div class="alert alert-success" style="padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; color: #155724; background-color: #d4edda; border-color: #c3e6cb;">
                        {{ Session::pull('front_message_success') }}
                     </div>
                  @endif

                  @if(Session::has('front_message_error'))
                     <div class="alert alert-danger" style="padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;">
                        {{ Session::pull('front_message_error') }}
                     </div>
                  @endif
                  <!-- Fin Bloque de Alertas -->

                  <form id="contact-form" name="contact-form" action="{{ url('contactenos/store') }}" method="post">
                     
                     <!-- CAMPO HONEYPOT (ANTISPAM): Los bots lo llenarán, los humanos no lo verán -->
                     <div class="honeypot-field" aria-hidden="true">
                        <label for="website_url">Por favor deja este campo vacío</label>
                        <input type="text" id="website_url" name="website_url" tabindex="-1" autocomplete="off">
                     </div>

                     <!-- First row: name and email inputs -->
                     <div class="row">
                        <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                 <label for="name">Nombre</label>
                                 <input id="name" name="name" value="" type="text" class="form" required="required" placeholder="Escriba su nombre completo" />
                                 <div id="name-error" style="color:red; font-size:11px;"></div>
                              </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                 <label for="email">Correo Electr&oacute;nico:</label>
                                 <input id="email" name="email" value="" type="email" class="form email" required="required" placeholder="Ingrese su correo electr&oacute;nico" />
                                 <div id="email-error" style="color:red; font-size:11px;"></div>
                              </div>
                        </div>
                     </div>

                     <!-- Second row: subject input -->
                     <div class="row">
                        <div class="col-sm-12 col-12">
                              <div class="form-group">
                                 <label for="subject">Tema / T&iacute;tulo:</label>
                                 <input id="subject" name="subject" value="" type="text" class="form" required="required" placeholder="Escriba el motivo por el cual nos contacta" />
                                 <div id="subject-error" style="color:red; font-size:11px;"></div>
                              </div>
                        </div>
                     </div>

                     <!-- Third row: message textarea -->
                     <div class="row">
                        <div class="col-sm-12 col-12">
                              <div class="form-group">
                                 <label for="message">Asunto:</label>
                                 <textarea id="message" class="form textarea" title="Este campo es requerido" name="message" required="required" placeholder="Mensaje"></textarea>
                                 <div id="message-error" style="color:red; font-size:11px;"></div>
                              </div>
                        </div>
                     </div>

                     <!-- Fourth row: checkbox for personal data use authorization -->
                     <div class="row">
                        <div class="col-sm-12 col-12">
                              <div class="form-group" style="display: flex; align-items: center;">
                                 <input id="check" name="check" value="" type="checkbox" class="form" style="width: fit-content; margin-right: 30px;" required="required" />
                                 <label for="check">Autorizo a la Fundaci&oacute;n Grupo Social el uso de mis datos personales conforme a las <a href="/storage/documents/FGS-Politica-Proteccion-Datos-Personales.pdf" target="_blank" rel="noopener">Pol&iacute;ticas de Protecci&oacute;n de Datos Personales</a></label>
                                    <div id="check-error" style="color:red; font-size:11px;"></div>
                              </div>
                        </div>
                     </div>

                     <!-- Fifth row: submit button with CSRF token -->
                     <div class="row justify-content-center text-center mt-4">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" id="submit-btn" class="form-btn semibold" value="Enviar">
                     </div>
                  </form>

               </div>
               <div class="only_dis_mobile text-center">
                  <div class="btn_work_us sourcesansprofonts">
                    <h5 class="page_title_faq oswaldfonts pb-5">Si desea incluir su hoja de vida en nuestras bases de datos, consulte la secci&oacute;n Trabaje con Nosotros</h5>
                    <a href="https://trabajaconnosotros.fundaciongruposocial.co/" target="_blank" rel="noopener">Ir a trabaje con nosotros</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
