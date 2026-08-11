<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario A2 - Entidad Asociada - W4P 2025</title>
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
            <h1 class="text-3xl font-bold text-gray-800">Formulario A2 - Entidad Asociada</h1>
            <p class="text-lg text-gray-600 mt-2">Convocatoria W4P 2025 para Colombia</p>
        </header>

        <form id="w4p-form" class="space-y-6">

            <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-700 mb-6">ENTIDAD ASOCIADA N° 1</h2>
                <p class="text-sm text-gray-500 mb-4">(repetir formulario para cada entidad asociada)</p>
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
                <p class="text-sm text-gray-500 bg-gray-50 p-3 rounded-md">*Para las respuestas narrativas de las preguntas, el texto no debe exceder 1 página o 400 palabras.</p>
                <div><label for="q1" class="block mb-2 text-lg">1. ¿Cuál es la misión de la entidad?</label><textarea id="q1" rows="6" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q2" class="block mb-2 text-lg">2. ¿Tiene el proyecto presentado relación con la especialización estratégica de la organización? Arguméntelo (máximo 4 líneas).</label><textarea id="q2" rows="4" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q3" class="block mb-2 text-lg">3. ¿Qué peso tiene el desarrollo socioeconómico y el fortalecimiento del tejido económico y productivo en la estrategia de acción de la organización?</label><textarea id="q3" rows="6" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q4" class="block mb-2 text-lg">4. Indique los proyectos más significativos realizados en el sector de actuación del proyecto presentado.</label><textarea id="q4" rows="6" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q6" class="block mb-2 text-lg">6. ¿Cuál es el proyecto de mayor presupuesto que gestiona? ¿Qué presupuesto anual supone? ¿Quién lo financia?</label><textarea id="q6" rows="4" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q11" class="block mb-2 text-lg">11. ¿Pertenece la organización a algún gremio o federación? Indique cuáles. Si la respuesta es negativa, argumente por qué.</label><textarea id="q11" rows="4" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q12" class="block mb-2 text-lg">12. ¿Trabaja la organización habitualmente con socios locales/internacionales? ¿Con qué criterios los elige?</label><textarea id="q12" rows="6" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q13" class="block mb-2 text-lg">13. ¿Ha trabajado su entidad anteriormente con los socios miembros del consorcio del presente proyecto? ¿Cuándo y durante cuánto tiempo?</label><textarea id="q13" rows="4" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q14" class="block mb-2 text-lg">14. Especifique el cometido de su entidad en el proyecto que presentan en relación con los otros socios.</label><textarea id="q14" rows="6" class="w-full p-2 border rounded-md"></textarea></div>
                <div><label for="q15" class="block mb-2 text-lg">15. ¿Qué inversión realiza su entidad en innovación? ¿Ha participado en laboratorios, incubadoras o prototipos de innovación social?</label><textarea id="q15" rows="6" class="w-full p-2 border rounded-md"></textarea></div>
            </div>

            <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">AUTORIZACIÓN PARA EL TRATAMIENTO DE DATOS PERSONALES</h2>
                
                <button type="button" id="toggle-auth-btn-a2" data-action="toggle-autorizacion" data-form-id="a2" class="text-blue-600 hover:underline mb-2 text-sm">[Ver texto completo de la autorización]</button>

                <div id="texto-autorizacion-a2" class="prose prose-sm max-w-none text-gray-600 border p-4 rounded-md bg-gray-50 hidden" style="text-align: justify;">
                    <p>En mi calidad de titular de datos personales autorizo a la empresa líder a compartir mi información personal con el fin de permitir la participación de la entidad asociada de la cual soy parte- en el programa Work4Progress. En consecuencia, autorizo a Fundación Grupo Social (en adelante la "Entidad") o a quien represente sus derechos, a quien esta contrate para el ejercicio de los mismos o a quien la Entidad ceda sus derechos, sus obligaciones o su posición contractual, para que en calidad de Responsable trate mis datos personales y/o los de la entidad de la que soy responsable, de conformidad con la Ley 1581 de 2012 y demás normas concordantes. Conforme a lo anterior, declaro que Fundación Grupo Social me ha informado que los datos serán recolectados y tratados de forma física, electrónica o automatizada para las finalidades descritas en su política de tratamiento de datos y en los términos de la autorización otorgada a la entidad líder.</p>
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
                    <div><label for="firma_firma" class="block mb-1">FIRMA REPRESENTANTE LEGAL:</label><input type="text" id="firma_firma" class="w-full p-2 border rounded-md" placeholder="Escriba su nombre para firmar"></div>
                </div>
            </div>
        </form>

        <div class="mt-10 text-center">
            <button id="guardarPdf" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">
                Guardar como PDF Editable
            </button>
            <a href="/work-4-progress/w4p_2025_formulario_A1"  class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Previo: Formulario A1</a>
            <a href="/work-4-progress/w4p_2025_formulario_A3"  class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Siguiente: Formulario A3</a>
            <div id="loading" class="hidden mt-4 text-gray-600"><p>Generando PDF, por favor espere...</p></div>
        </div>
    </div>
    <script src="/assets/js/fgs/w4p-02.js"></script>
</body>
</html>

