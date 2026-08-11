<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario A1 - Entidad Líder - W4P 2025</title>
    <!-- Incluyendo Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Incluyendo la biblioteca jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <link href="{{ asset('assets/css/pages/w4p.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4 sm:p-8">

    <div id="form-container" class="max-w-4xl mx-auto bg-white p-6 sm:p-10 rounded-2xl shadow-lg">
        
        <header class="text-center mb-8">
             <img src="/storage/w4p/w4p_main_cover_desktop.jpg" alt="Banner W4P" class="w-full rounded-lg mb-6 object-cover">
            <h1 class="text-3xl font-bold text-gray-800">Formulario A1 - Entidad Líder</h1>
            <p class="text-lg text-gray-600 mt-2">Convocatoria W4P 2025 para Colombia</p>
        </header>

        <form id="w4p-form" class="space-y-6">

            <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-700 mb-6">ENTIDAD LÍDER</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div><label for="entidad_nombre" class="block mb-1">Nombre de la entidad</label><input type="text" id="entidad_nombre" class="w-full p-2 border rounded-md"></div>
                    <div><label for="entidad_forma_juridica" class="block mb-1">Forma jurídica</label><input type="text" id="entidad_forma_juridica" class="w-full p-2 border rounded-md"></div>
                    <div><label for="entidad_ano_constitucion" class="block mb-1">Año de constitución</label><input type="number" id="entidad_ano_constitucion" class="w-full p-2 border rounded-md"></div>
                    <div><label for="entidad_nif" class="block mb-1">Número de identificación fiscal</label><input type="text" id="entidad_nif" class="w-full p-2 border rounded-md"></div>
                    <div><label for="entidad_pais" class="block mb-1">País donde está registrada</label><input type="text" id="entidad_pais" class="w-full p-2 border rounded-md"></div>
                    <div><label for="entidad_direccion" class="block mb-1">Dirección (calle, código postal, ciudad)</label><input type="text" id="entidad_direccion" class="w-full p-2 border rounded-md"></div>
                    <div><label for="entidad_telefono" class="block mb-1">Teléfono</label><input type="tel" id="entidad_telefono" class="w-full p-2 border rounded-md"></div>
                    <div><label for="entidad_fax" class="block mb-1">Fax</label><input type="text" id="entidad_fax" class="w-full p-2 border rounded-md"></div>
                    <div><label for="entidad_email" class="block mb-1">E-mail</label><input type="email" id="entidad_email" class="w-full p-2 border rounded-md"></div>
                    <div><label for="entidad_web" class="block mb-1">Página web</label><input type="text" id="entidad_web" class="w-full p-2 border rounded-md"></div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="text-xl font-semibold text-gray-700 mb-6">Responsable de la Entidad</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div><label for="resp_entidad_nombre" class="block mb-1">Nombre</label><input type="text" id="resp_entidad_nombre" class="w-full p-2 border rounded-md"></div>
                    <div><label for="resp_entidad_id" class="block mb-1">Número de identificación</label><input type="text" id="resp_entidad_id" class="w-full p-2 border rounded-md"></div>
                    <div><label for="resp_entidad_cargo" class="block mb-1">Cargo</label><input type="text" id="resp_entidad_cargo" class="w-full p-2 border rounded-md"></div>
                    <div><label for="resp_entidad_telefono_fijo" class="block mb-1">Teléfono fijo</label><input type="tel" id="resp_entidad_telefono_fijo" class="w-full p-2 border rounded-md"></div>
                    <div><label for="resp_entidad_telefono_movil" class="block mb-1">Teléfono móvil</label><input type="tel" id="resp_entidad_telefono_movil" class="w-full p-2 border rounded-md"></div>
                    <div><label for="resp_entidad_email" class="block mb-1">E-mail</label><input type="email" id="resp_entidad_email" class="w-full p-2 border rounded-md"></div>
                </div>
            </div>

            <div class="form-section">
                <h2 class="text-xl font-semibold text-gray-700 mb-6">Responsable Técnico del Proyecto</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div><label for="resp_tecnico_nombre" class="block mb-1">Nombre</label><input type="text" id="resp_tecnico_nombre" class="w-full p-2 border rounded-md"></div>
                    <div><label for="resp_tecnico_id" class="block mb-1">Número de identificación</label><input type="text" id="resp_tecnico_id" class="w-full p-2 border rounded-md"></div>
                    <div><label for="resp_tecnico_cargo" class="block mb-1">Cargo</label><input type="text" id="resp_tecnico_cargo" class="w-full p-2 border rounded-md"></div>
                    <div><label for="resp_tecnico_telefono_fijo" class="block mb-1">Teléfono fijo</label><input type="tel" id="resp_tecnico_telefono_fijo" class="w-full p-2 border rounded-md"></div>
                    <div><label for="resp_tecnico_telefono_movil" class="block mb-1">Teléfono móvil</label><input type="tel" id="resp_tecnico_telefono_movil" class="w-full p-2 border rounded-md"></div>
                    <div><label for="resp_tecnico_email" class="block mb-1">E-mail</label><input type="email" id="resp_tecnico_email" class="w-full p-2 border rounded-md"></div>
                </div>
            </div>
            
            <div class="form-section space-y-8">
                 <p class="text-sm text-gray-500 bg-gray-50 p-3 rounded-md">*Para las respuestas narrativas de las preguntas 1-18, el texto no debe exceder 1 página o 400 palabras.</p>
                <div><label for="q1" class="block mb-2 text-lg">1. ¿Cuál es la misión de la entidad?</label><textarea id="q1" rows="6" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q2" class="block mb-2 text-lg">2. Si es una entidad registrada en el país de ejecución del proyecto: ¿Está la misión relacionada con la reducción de la pobreza y/o el fomento del empleo? ¿Cuántos años tiene de experiencia en este ámbito?</label><textarea id="q2" rows="6" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q3" class="block mb-2 text-lg">3. Si es una entidad registrada fuera del país de ejecución del proyecto: ¿La cooperación internacional forma parte de su misión? ¿Desde hace cuántos años? ¿Cuántos años lleva su organización trabajando en el país donde se ejecutará la acción?</label><textarea id="q3" rows="6" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q4" class="block mb-2 text-lg">4. ¿Qué peso tienen el desarrollo socioeconómico y el fortalecimiento del tejido económico y productivo en la estrategia de acción de la organización?</label><textarea id="q4" rows="6" class="w-full p-2 border rounded-md"></textarea></div>
                
                <div>
                    <label class="block mb-2 text-lg">5. ¿Ha recibido su entidad ayudas de la Fundación "la Caixa", Fundación VISA y/o de Fundación Grupo Social en años anteriores?</label>
                    <div class="flex items-center space-x-4">
                        <label><input type="radio" name="ayudas_anteriores" value="si" data-action="toggle-ayudas" data-show="1"> Sí</label>
                        <label><input type="radio" name="ayudas_anteriores" value="no" data-action="toggle-ayudas" data-show="0" checked> No</label>
                    </div>
                </div>
                <div id="proyectos_anteriores" class="hidden space-y-4 p-4 border-l-4 border-blue-500 bg-blue-50 rounded-md">
                    <p class="font-medium text-gray-700">Si la respuesta anterior es afirmativa, complete la información para cada proyecto:</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4"><input type="text" placeholder="N° de proyecto" class="w-full p-2 border rounded-md"><input type="text" placeholder="Año de adjudicación" class="w-full p-2 border rounded-md"></div>
                    <div><input type="text" placeholder="Título del proyecto" class="w-full p-2 border rounded-md"></div>
                    <div><input type="text" placeholder="País" class="w-full p-2 border rounded-md"></div>
                </div>

                <div><label for="q6" class="block mb-2 text-lg">6. ¿El proyecto presentado tiene relación con la especialización estratégica de la organización? Arguméntelo.</label><textarea id="q6" rows="6" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q7" class="block mb-2 text-lg">7. Indique los proyectos más significativos realizados en el sector de actuación del proyecto presentado.</label><textarea id="q7" rows="6" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q9" class="block mb-2 text-lg">9. ¿Cuál es el proyecto de mayor presupuesto que gestiona? ¿Qué presupuesto anual supone? ¿Quién lo financia?</label><textarea id="q9" rows="4" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q14" class="block mb-2 text-lg">14. ¿Pertenece la organización a algún gremio o federación? Indique cuáles. Si la respuesta es negativa, argumente por qué.</label><textarea id="q14" rows="4" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q15" class="block mb-2 text-lg">15. ¿Trabaja la organización habitualmente con socios locales/internacionales? ¿Con qué criterios los elige?</label><textarea id="q15" rows="6" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q16" class="block mb-2 text-lg">16. ¿Ha trabajado su entidad anteriormente con los socios miembros del consorcio del presente proyecto? ¿Cuándo y durante cuánto tiempo?</label><textarea id="q16" rows="4" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q17" class="block mb-2 text-lg">17. Especifique el cometido de su entidad en el proyecto que presentan en relación con los otros socios.</label><textarea id="q17" rows="6" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q18" class="block mb-2 text-lg">18. ¿Qué inversión realiza su entidad en innovación? ¿Ha participado en laboratorios, incubadoras o prototipos de innovación social?</label><textarea id="q18" rows="6" class="w-full p-2 border rounded-md"></textarea></div>
            </div>

            <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">AUTORIZACIÓN PARA EL TRATAMIENTO DE DATOS PERSONALES</h2>
                
                <button type="button" id="toggle-auth-btn-a1" data-action="toggle-autorizacion" data-form-id="a1" class="text-blue-600 hover:underline mb-2 text-sm">[Ver texto completo de la autorización]</button>
                
                <div id="texto-autorizacion-a1" class="prose prose-sm max-w-none text-gray-600 border p-4 rounded-md bg-gray-50 hidden" style="text-align: justify;">
                    <p>Yo, en calidad de representante legal y/o responsable de la entidad líder participante del Programa Work4Progress, autorizo a Fundación Grupo Social (en adelante la "Entidad") o a quien represente sus derechos, a quien esta contrate para el ejercicio de los mismos o a quien la Entidad ceda sus derechos, sus obligaciones o su posición contractual, para que en calidad de Responsable trate mis datos personales y/o los de la entidad de la que soy responsable, de conformidad con la Ley 1581 de 2012 y demás normas concordantes. Conforme a lo anterior, declaro que Fundación Grupo Social me ha informado que los datos serán recolectados y tratados de forma física, electrónica o automatizada para las siguientes finalidades: contactarme y realizar todas las actividades necesarias para ejecutar los componentes del Programa Work4Progress; efectuar análisis y estudios acerca del impacto del Programa; almacenar y administrar mi información; grabar en video las sesiones virtuales; consultar antecedentes comerciales y reputacionales; presentar la información ante autoridades; compartir la información con terceros con quienes se celebren contratos para desarrollar el programa; transmitir la información a terceros ubicados dentro o fuera del país; comunicarse con la entidad; utilizar mi voz e imagen para promoción; compartir mi información con Entidades que hagan parte de la Organización liderada por la Fundación Grupo Social; transferir mi información a la Fundación "la Caixa"; y las demás que se integren en la Política de Protección de Datos Personales de la Entidad. Al autorizar, declaro que se me ha informado sobre el posible tratamiento de datos sensibles y mis derechos a conocer, actualizar, rectificar y suprimir mis datos, así como a revocar la autorización. Declaro que cuento con la autorización de terceros cuya información personal pueda suministrar. Conforme a lo anterior, autorizo a Fundación Grupo Social para que recolecte, almacene, use, y en general trate los datos de la entidad que represento y mis datos personales, de conformidad con los términos establecidos en la presente autorización y en la Política de Tratamiento de Datos Personales de la Entidad.</p>
                </div>

                <div class="mt-6">
                    <div class="flex items-center">
                        <input id="accept_terms" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="accept_terms" id="acceptance_date_label" class="ml-2 block text-sm text-gray-900">Para constancia de aceptación se firma a el día ( ), del mes ( ) del año 2025</label>
                    </div>
                </div>
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div><label for="firma_nombre" class="block mb-1">NOMBRE:</label><input type="text" id="firma_nombre" class="w-full p-2 border rounded-md"></div>
                    <div><label for="firma_tipodocumento" class="block mb-1">TIPO DE DOCUMENTO:</label><input type="text" id="firma_tipodocumento" class="w-full p-2 border rounded-md"></div>
                    <div><label for="firma_numero" class="block mb-1">NÚMERO:</label><input type="text" id="firma_numero" class="w-full p-2 border rounded-md"></div>
                    <div><label for="firma_firma" class="block mb-1">FIRMA:</label><input type="text" id="firma_firma" class="w-full p-2 border rounded-md" placeholder="Escriba su nombre para firmar"></div>
                </div>
            </div>
        </form>

        <div class="mt-10 text-center">
            <button id="guardarPdf" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">
                Guardar como PDF Editable
            </button>
             <div id="loading" class="hidden mt-4 text-gray-600">
                <p>Generando PDF, por favor espere...</p>
            </div>
        </div>
    </div>
    <script src="/assets/js/fgs/w4p-01.js"></script>
</body>
</html>