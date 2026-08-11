// --- START OF JAVASCRIPT FUNCTIONALITY ---

        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            const day = today.getDate();
            const year = today.getFullYear();
            const monthNames = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
            const month = monthNames[today.getMonth()];

            const dateLabel = document.getElementById('acceptance_date_label');
            if (dateLabel) {
                dateLabel.innerHTML = `Para constancia de aceptación se firma a el día (${day}), del mes (${month}) del año ${year}`;
            }
        });

        function toggleAutorizacion(formId) {
            const texto = document.getElementById(`texto-autorizacion-${formId}`);
            const boton = document.getElementById(`toggle-auth-btn-${formId}`);
            const isHidden = texto.classList.toggle('hidden');
            
            if (isHidden) {
                boton.textContent = '[Ver texto completo de la autorización]';
            } else {
                boton.textContent = '[Ocultar texto completo]';
            }
        }

        document.getElementById('guardarPdf').addEventListener('click', function () {
            const loadingIndicator = document.getElementById('loading');
            loadingIndicator.classList.remove('hidden');
            
            try {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF('p', 'mm', 'a4');

                let y = 15;
                const margin = 15;
                const pageWidth = doc.internal.pageSize.getWidth();
                const usableWidth = pageWidth - 2 * margin;

                function checkPageBreak(requiredHeight = 20) {
                     if (y + requiredHeight > doc.internal.pageSize.getHeight() - margin) {
                        doc.addPage();
                        y = margin;
                    }
                }

                function addSectionTitle(title) {
                    checkPageBreak(15);
                    doc.setFontSize(14);
                    doc.setFont('helvetica', 'bold');
                    doc.text(title, margin, y);
                    y += 10;
                }

                function addField(label, elementId, options = {}) {
                    const height = options.height || 8;
                    const multiline = options.multiline || false;
                    
                    checkPageBreak(height + 15);
                    
                    doc.setFontSize(11);
                    doc.setFont('helvetica', 'normal');
                    const splitLabel = doc.splitTextToSize(label, usableWidth);
                    doc.text(splitLabel, margin, y);
                    y += (splitLabel.length * 5) + 2;
                    
                    const value = document.getElementById(elementId)?.value || '';

                    const textField = new jsPDF.AcroForm.TextField();
                    textField.Rect = [margin, y, usableWidth, height];
                    textField.fieldName = elementId;
                    textField.value = value;
                    if (multiline) textField.multiline = true;
                    doc.addField(textField);

                    y += height + 8;
                }
                
                function addTwoColumnFields(label1, id1, label2, id2) {
                    checkPageBreak(25);
                    const colWidth = usableWidth / 2 - 5;
                    
                    doc.setFontSize(11);
                    doc.text(label1, margin, y);
                    doc.text(label2, margin + colWidth + 10, y);
                    y += 6;

                    const val1 = document.getElementById(id1)?.value || '';
                    const val2 = document.getElementById(id2)?.value || '';

                    const field1 = new jsPDF.AcroForm.TextField();
                    field1.Rect = [margin, y, colWidth, 8];
                    field1.fieldName = id1; field1.value = val1;
                    doc.addField(field1);
                    
                    const field2 = new jsPDF.AcroForm.TextField();
                    field2.Rect = [margin + colWidth + 10, y, colWidth, 8];
                    field2.fieldName = id2; field2.value = val2;
                    doc.addField(field2);

                    y += 14;
                }
                
                doc.setFontSize(18);
                doc.setFont('helvetica', 'bold');
                doc.text("Formulario A2 - Entidad Asociada", pageWidth / 2, y, { align: 'center' });
                y += 15;

                addSectionTitle("ENTIDAD ASOCIADA N° 1");
                addTwoColumnFields("Nombre de la entidad", "entidad_nombre", "Forma jurídica", "entidad_forma_juridica");
                addTwoColumnFields("Año de constitución", "entidad_ano_constitucion", "Nº de identificación fiscal", "entidad_nif");
                addTwoColumnFields("País donde está registrada", "entidad_pais", "Dirección", "entidad_direccion");
                addTwoColumnFields("Teléfono", "entidad_telefono", "Fax", "entidad_fax");
                addTwoColumnFields("E-mail", "entidad_email", "Página web", "entidad_web");

                addSectionTitle("Responsable de la Entidad");
                addTwoColumnFields("Nombre", "resp_entidad_nombre", "Nº de identificación", "resp_entidad_id");
                addTwoColumnFields("Cargo", "resp_entidad_cargo", "Teléfono fijo", "resp_entidad_telefono_fijo");
                addTwoColumnFields("Teléfono móvil", "resp_entidad_telefono_movil", "E-mail", "resp_entidad_email");

                addSectionTitle("Responsable Técnico del Proyecto");
                addTwoColumnFields("Nombre", "resp_tecnico_nombre", "Nº de identificación", "resp_tecnico_id");
                addTwoColumnFields("Cargo", "resp_tecnico_cargo", "Teléfono fijo", "resp_tecnico_telefono_fijo");
                addTwoColumnFields("Teléfono móvil", "resp_tecnico_telefono_movil", "E-mail", "resp_tecnico_email");

                doc.addPage();
                y = margin;

                addField("1. ¿Cuál es la misión de la entidad?", "q1", { height: 40, multiline: true });
                addField("2. ¿Tiene el proyecto presentado relación con la especialización...?", "q2", { height: 40, multiline: true });
                addField("3. ¿Qué peso tiene el desarrollo socioeconómico...?", "q3", { height: 40, multiline: true });
                
                doc.addPage();
                y = margin;

                addField("4. Indique los proyectos más significativos...", "q4", { height: 40, multiline: true });
                addField("6. ¿Cuál es el proyecto de mayor presupuesto que gestiona...?", "q6", { height: 40, multiline: true });
                addField("11. ¿Pertenece la organización a algún gremio o federación...?", "q11", { height: 40, multiline: true });

                doc.addPage();
                y = margin;

                addField("12. ¿Trabaja la organización habitualmente con socios locales/internacionales...?", "q12", { height: 40, multiline: true });
                addField("13. ¿Ha trabajado su entidad anteriormente con los socios miembros del consorcio...?", "q13", { height: 40, multiline: true });
                addField("14. Especifique el cometido de su entidad en el proyecto...", "q14", { height: 40, multiline: true });
                
                doc.addPage();
                y = margin;

                addField("15. ¿Qué inversión realiza su entidad en innovación...?", "q15", { height: 40, multiline: true });

                addSectionTitle("AUTORIZACIÓN PARA EL TRATAMIENTO DE DATOS PERSONALES");
                
                const authText = document.getElementById('texto-autorizacion-a2').innerText;
                doc.setFontSize(8);
                const splitAuthText = doc.splitTextToSize(authText, usableWidth);
                doc.text(splitAuthText, margin, y);
                y += (splitAuthText.length * 3) + 5;

                const acceptCheckbox = new jsPDF.AcroForm.CheckBox();
                acceptCheckbox.Rect = [margin, y, 6, 6];
                acceptCheckbox.fieldName = "accept_terms_pdf";
                if (document.getElementById('accept_terms').checked) {
                    acceptCheckbox.value = 'Yes';
                    acceptCheckbox.AS = '/Yes';
                }
                doc.addField(acceptCheckbox);
                doc.setFontSize(10);
                doc.text(document.getElementById('acceptance_date_label').innerText, margin + 8, y + 4.5);
                y += 15;
                
                addTwoColumnFields("NOMBRE:", "firma_nombre", "TIPO DE DOCUMENTO:", "firma_tipodocumento");
                addTwoColumnFields("NÚMERO:", "firma_numero", "FIRMA REPRESENTANTE LEGAL:", "firma_firma");

                setTimeout(() => {
                    doc.save('Formulario-A2-Entidad-Asociada-Actualizado.pdf');
                    loadingIndicator.classList.add('hidden');
                }, 500);

            } catch(error) {
                console.error("Error al generar el PDF:", error);
                alert("Ocurrió un error al generar el PDF.");
                loadingIndicator.classList.add('hidden');
            }
        });

        // --- END OF JAVASCRIPT FUNCTIONALITY ---


// Data-attribute wiring (no inline onclick/onchange)
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-action="toggle-autorizacion"]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            if (typeof toggleAutorizacion === 'function') {
                toggleAutorizacion(btn.getAttribute('data-form-id'));
            }
        });
    });
    document.querySelectorAll('[data-action="toggle-ayudas"]').forEach(function (el) {
        el.addEventListener('change', function () {
            if (typeof toggleAyudas === 'function') {
                toggleAyudas(el.getAttribute('data-show') === '1');
            }
        });
    });
});
