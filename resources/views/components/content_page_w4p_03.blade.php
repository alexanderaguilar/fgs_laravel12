<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario A3 - Propuesta - W4P 2025</title>
    <!-- Incluyendo Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Incluyendo jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <link href="{{ asset('assets/css/pages/w4p.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4 sm:p-8">

    <div id="form-container" class="max-w-4xl mx-auto bg-white p-6 sm:p-10 rounded-2xl shadow-lg">
        
        <header class="text-center mb-8">
            <img src="/storage/w4p/w4p_main_cover_desktop.jpg" alt="Banner W4P" class="w-full rounded-lg mb-6 object-cover">
            <h1 class="text-3xl font-bold text-gray-800">Formulario A3 - Propuesta</h1>
            <p class="text-lg text-gray-600 mt-2">Convocatoria W4P 2025 para Colombia</p>
        </header>

        <form id="w4p-form" class="space-y-6">

            <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">1. ZONA GEOGRÁFICA Y CONTEXTO SOCIOECONÓMICO</h2>
                <div class="space-y-4">
                    <label for="s1" class="block text-gray-600">
                        - ¿Cuál es su análisis general del contexto?<br>
                        - ¿Cuáles son los principales riesgos?<br>
                        - ¿Cuál es la situación socioeconómica de las personas a beneficiar?<br>
                        - Estime el número de personas a beneficiar.
                    </label>
                    <textarea id="s1" rows="15" class="w-full p-2 border rounded-md"></textarea>
                </div>
            </div>

            <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">2. CONSTITUCIÓN DEL CONSORCIO QUE VA A LIDERAR EL PROYECTO</h2>
                 <div class="space-y-4">
                    <label for="s2" class="block text-gray-600">
                        - ¿Cuáles y cuántas son las organizaciones que van a liderar?<br>
                        - Explique el motivo de su selección, roles y propuesta de valor.<br>
                        - ¿Cuál es el rol de la administración pública?
                    </label>
                    <textarea id="s2" rows="10" class="w-full p-2 border rounded-md"></textarea>
                </div>
            </div>

            <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">3. PROPUESTA DE METODOLOGÍA PARA DIAGNÓSTICO</h2>
                 <div class="space-y-4">
                    <label for="s3" class="block text-gray-600">
                        - ¿Qué metodología utilizará para el diagnóstico participativo?<br>
                        - ¿Cómo asegurará la interacción permanente con las comunidades?<br>
                        - ¿Cómo se conectarán las necesidades con las actividades?
                    </label>
                    <textarea id="s3" rows="10" class="w-full p-2 border rounded-md"></textarea>
                </div>
            </div>
            
            <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">4. PROPUESTA DE METODOLOGÍA PARA LA COCREACIÓN (RED DE ACTORES)</h2>
                 <div class="space-y-4">
                    <label for="s4" class="block text-gray-600">
                        - ¿Qué entidades y actores participarán en la cocreación?<br>
                        - Argumente el valor añadido de cada uno y cómo se gestionará la red.<br>
                        - ¿Qué metodología usará para incorporar nuevos actores?
                    </label>
                    <textarea id="s4" rows="10" class="w-full p-2 border rounded-md"></textarea>
                </div>
            </div>
            
            <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">5. PROPUESTA DE PROTOTIPOS DE INICIATIVAS GENERADORAS DE EMPLEO</h2>
                 <div class="space-y-4">
                    <label for="s5" class="block text-gray-600">
                        - Indique las tipologías de iniciativas.<br>
                        - ¿Cuántas iniciativas se pondrán en marcha?<br>
                        - ¿Cuántos puestos de trabajo puede generar cada iniciativa?
                    </label>
                    <textarea id="s5" rows="10" class="w-full p-2 border rounded-md"></textarea>
                </div>
            </div>
            
            <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">6. POTENCIAL DE INNOVACIÓN</h2>
                 <div class="space-y-4">
                    <label for="s6" class="block text-gray-600">
                        - ¿Qué potencial de innovación tienen las iniciativas?<br>
                        - ¿Cómo contribuyen a solucionar las problemáticas?<br>
                        - ¿Por qué estas innovaciones son potencialmente mejores que otras?
                    </label>
                    <textarea id="s6" rows="10" class="w-full p-2 border rounded-md"></textarea>
                </div>
            </div>
            
            <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">7. PROPUESTA DE CUADRO DE MANDOS E INDICADORES</h2>
                 <div class="space-y-4">
                    <label for="s7" class="block text-gray-600">
                        - Proponga un cuadro de mandos con indicadores para monitorizar el avance.
                    </label>
                    <textarea id="s7" rows="10" class="w-full p-2 border rounded-md"></textarea>
                </div>
            </div>

            <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">8. EVALUACIÓN</h2>
                 <div class="space-y-4">
                    <label for="s8" class="block text-gray-600">
                       - Explique la coordinación con el evaluador externo.<br>
                       - ¿Cómo se coordinarán la evaluación continua y de impacto?<br>
                       - Indique si tiene experiencia previa en evaluaciones de este tipo.
                    </label>
                    <textarea id="s8" rows="10" class="w-full p-2 border rounded-md"></textarea>
                </div>
            </div>

            <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">9. PLAN DE COMUNICACIÓN</h2>
                 <div class="space-y-4">
                    <label for="s9" class="block text-gray-600">
                       - Detalle la estrategia de comunicación y diseminación.<br>
                       - Resalte aspectos con potencial de comunicación.
                    </label>
                    <textarea id="s9" rows="10" class="w-full p-2 border rounded-md"></textarea>
                </div>
            </div>

            <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">10. CRONOGRAMA</h2>
                 <div class="space-y-4">
                    <label for="s10" class="block text-gray-600">
                       - Presente un cronograma o plan de acción.
                    </label>
                    <textarea id="s10" rows="10" class="w-full p-2 border rounded-md"></textarea>
                </div>
            </div>

            <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">11. PRESUPUESTO</h2>
                 <div class="space-y-4">
                    <label for="s11" class="block text-gray-600">
                       - Indique y justifique la distribución del presupuesto.
                    </label>
                    <textarea id="s11" rows="10" class="w-full p-2 border rounded-md"></textarea>
                </div>
            </div>
        </form>

        <div class="mt-10 text-center">
            <button id="guardarPdf" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">
                Guardar como PDF Editable
            </button>
            <a href="/work-4-progress/w4p_2025_formulario_A2"  class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Previo: Formulario A2</a>
            <div id="loading" class="hidden mt-4 text-gray-600"><p>Generando PDF, por favor espere...</p></div>
        </div>
    </div>
    <script src="/assets/js/fgs/w4p-03.js"></script>
</body>
</html>

