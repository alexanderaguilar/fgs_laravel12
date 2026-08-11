@php
    // Define an array of documents based on the provided file list.
    // You can easily add, remove, or edit documents here.
    // 'name' is the text that will be displayed.
    // 'filename' is the actual name of the file in the storage directory.
    $documents = [
        [
            'name' => '01. Certificación de Cargos Directivos y Gerenciales',
            'filename' => '01_Certificacion_directivos_FGS.pdf',
        ],
        [
            'name' => '02. Memoria Económica',
            'filename' => '02_Memoria_Economica_FGS.pdf',
        ],
        [
            'name' => '03. Informe Anual de Resultados',
            'filename' => '03_Informe_anual_de_resultados_FGS.pdf',
        ],
        [
            'name' => '04. Estados Financieros',
            'filename' => '04_Estados_Financieros_FGS.pdf',
        ],
        [
            'name' => '05. Certificado de Cumplimiento de Requisitos',
            'filename' => '05_Certificado_requisitos_FGS.pdf',
        ],
        [
            'name' => '06. Estatutos de la Fundación Grupo Social',
            'filename' => '06_Estatutos_Fundacion_Grupo_Social_FGS.pdf',
        ],
        [
            'name' => '07. Certificados de Antecedentes Judiciales',
            'filename' => '07_Certificados_antecedentes_FGS.pdf',
        ],
        [
            'name' => '08. Acta del Consejo Social',
            'filename' => '08_Acta_Consejo_Social_FGS.pdf',
        ],
        [
            'name' => '09. Acta del Consejo Directivo',
            'filename' => '09_Acta_Consejo_Directivo_FGS.pdf',
        ],
        [
            'name' => '10. Solicitud Régimen Tributario Especial',
            'filename' => '10_Solicitud_Regimen_Tributario_Especial_FGS.pdf',
        ],
    ];
@endphp

<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">

            <!-- Component Title -->
            <h1 class="display-5 mb-4 text-center">Documentos Régimen Tributario Especial (RTE)</h1>
            <p class="text-center text-muted mb-5">
                Encuentre aquí los documentos relevantes de la fundación para el Régimen Tributario Especial. Haga clic
                en cualquier enlace para ver o descargar el archivo PDF.
            </p>

            <!-- Document List -->
            <div class="list-group shadow-sm">
                @forelse ($documents as $doc)
                    <a href="{{ asset('storage/documents/fgs_certificados_2026/' . $doc['filename']) }}" target="_blank"
                        rel="noopener noreferrer"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">

                        <!-- Document Name and Icon -->
                        <div class="d-flex align-items-center">
                            <!-- SVG Icon for PDF -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-file-earmark-pdf text-danger me-3" viewBox="0 0 16 16">
                                <path
                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 1.5v3a.5.5 0 0 0 .5.5h3z" />
                                <path
                                    d="M4.603 14.087a.8.8 0 0 1-1.128.154l-2.36-1.686a.8.8 0 0 1 .154-1.128l1.686-2.36a.8.8 0 0 1 1.128-.154l2.36 1.686a.8.8 0 0 1-.154 1.128l-1.686 2.36zM8.5 14.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5m-3-2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                            </svg>
                            <span class="fw-medium">{{ $doc['name'] }}</span>
                        </div>

                        <!-- Download Badge -->
                        <span class="badge bg-primary rounded-pill">Ver / Descargar</span>
                    </a>
                @empty
                    <!-- Message when no documents are available -->
                    <div class="list-group-item text-center text-muted p-5">
                        <p class="mb-0">No hay documentos disponibles en este momento.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</div>
