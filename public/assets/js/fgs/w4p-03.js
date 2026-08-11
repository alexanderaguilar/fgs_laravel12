// --- START OF JAVASCRIPT FUNCTIONALITY ---

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

                function addProposalField(label, elementId) {
                    const height = 80;
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
                    textField.multiline = true;
                    doc.addField(textField);

                    y += height + 10;
                }
                
                doc.setFontSize(18);
                doc.setFont('helvetica', 'bold');
                doc.text("Formulario A3 - Propuesta", pageWidth / 2, y, { align: 'center' });
                y += 15;
                
                addSectionTitle("1. ZONA GEOGRÁFICA Y CONTEXTO SOCIOECONÓMICO");
                addProposalField(document.querySelector('label[for="s1"]').innerText, "s1");

                addSectionTitle("2. CONSTITUCIÓN DEL CONSORCIO");
                addProposalField(document.querySelector('label[for="s2"]').innerText, "s2");
                
                doc.addPage();
                y = margin;

                addSectionTitle("3. PROPUESTA DE METODOLOGÍA PARA DIAGNÓSTICO");
                addProposalField(document.querySelector('label[for="s3"]').innerText, "s3");
                
                addSectionTitle("4. PROPUESTA DE METODOLOGÍA PARA LA COCREACIÓN");
                addProposalField(document.querySelector('label[for="s4"]').innerText, "s4");
                
                doc.addPage();
                y = margin;

                addSectionTitle("5. PROPUESTA DE PROTOTIPOS DE INICIATIVAS");
                addProposalField(document.querySelector('label[for="s5"]').innerText, "s5");
                
                addSectionTitle("6. POTENCIAL DE INNOVACIÓN");
                addProposalField(document.querySelector('label[for="s6"]').innerText, "s6");

                doc.addPage();
                y = margin;

                addSectionTitle("7. PROPUESTA DE CUADRO DE MANDOS E INDICADORES");
                addProposalField(document.querySelector('label[for="s7"]').innerText, "s7");
                
                addSectionTitle("8. EVALUACIÓN");
                addProposalField(document.querySelector('label[for="s8"]').innerText, "s8");
                
                doc.addPage();
                y = margin;

                addSectionTitle("9. PLAN DE COMUNICACIÓN");
                addProposalField(document.querySelector('label[for="s9"]').innerText, "s9");

                addSectionTitle("10. CRONOGRAMA");
                addProposalField(document.querySelector('label[for="s10"]').innerText, "s10");
                
                addSectionTitle("11. PRESUPUESTO");
                addProposalField(document.querySelector('label[for="s11"]').innerText, "s11");

                setTimeout(() => {
                    doc.save('Formulario-A3-Propuesta-Actualizado.pdf');
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
