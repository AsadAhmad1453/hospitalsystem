$(document).ready(function () {
    // Before submitting the diagnosis form, get the HTML content of the Lab Investigation and Prescription tab panels,
    // store them in variables, and append them as hidden inputs to the form so they are sent in the request.

    $('#submit-diagnosis-form').on('click', function (e) {
        e.preventDefault();

        // Get the HTML strings
        var prescriptionHtml = getPrescriptionHtmlString();
        var investigationHtml = getInvestigationHtmlString();
        var appointmentDate = $('#appointment_date').val();

        // Remove any previous hidden inputs to avoid duplicates
        $('#diagnosis-form input[name="prescription_html"]').remove();
        $('#diagnosis-form input[name="investigation_html"]').remove();
        $('#diagnosis-form input[name="appointment_date"]').remove(); // avoid duplicates

        // Append as hidden inputs to the form
        $('<input>').attr({
            type: 'hidden',
            name: 'recommended_medication',
            value: prescriptionHtml
        }).appendTo('#diagnosis-form');

        $('<input>').attr({
            type: 'hidden',
            name: 'further_investigation',
            value: investigationHtml
        }).appendTo('#diagnosis-form');

        $('<input>').attr({
            type: 'hidden',
            name: 'appointment_date',
            value: appointmentDate
        }).appendTo('#diagnosis-form');

        $('#diagnosis-form').submit();

    });

    // Feather icons
    if (typeof feather !== 'undefined') {
        feather.replace({ width: 14, height: 14 });
    }

    // Dropify file uploader
    $('.file-input').dropify();

    // Submit diagnosis form
    $('.message-input').keydown(function(event) {
        if (event.key === 'Enter' && !event.shiftKey) {
            event.preventDefault(); // prevent newline in input
            $('.send-button').click(); // trigger the send button
        }
    });

    $('.send-button').click(function () {
        const prompt = $('.message-input').val().trim();
        if (!prompt) return;
    
        // Append user's message
        $('.chat-container').append(`
            <div class="message user-message">${prompt}</div>
        `);
    
        $('.message-input').val('');
        $('#chatContainer').scrollTop($('#chatContainer')[0].scrollHeight);
    
        // Append typing indicator as a message placeholder
        const typingId = 'typing-' + Date.now(); // Unique ID for this placeholder
        $('.chat-container').append(`
            <div class="message ai-message typing-placeholder" id="${typingId}">
                <div class="typing-dots">
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                </div>
            </div>
        `);
    
        $('#chatContainer').scrollTop($('#chatContainer')[0].scrollHeight);
    
        // Fetch the AI response
        fetch('/user/ai/ask', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ prompt })
        })
            .then(res => res.json())
            .then(data => {
                // Replace typing indicator with actual response
                $('#' + typingId).replaceWith(`
                    <div class="message ai-message">${data.reply}</div>
                `);
                $('#chatContainer').scrollTop($('#chatContainer')[0].scrollHeight);
            })
            .catch(err => {
                console.error('Fetch error:', err);
                $('#' + typingId).replaceWith(`
                    <div class="message error-message">AI: Request failed.</div>
                `);
            });
    });
    
    
    // ✅ Print only prescription tab
    $('#printButton').on('click', function () {
        var printContents = $('#printSection').html();

        // CSS/Fonts/CDNs
        const styles = `
            
            <!-- BEGIN: Page CSS-->
            <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/menu/menu-types/vertical-menu.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/pages/page-profile.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/forms/select/select2.min.css') }}">
            <!-- END: Page CSS-->
            <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/forms/form-file-uploader.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/forms/form-file-uploader.min.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css-rtl/plugins/forms/form-file-uploader.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css-rtl/plugins/forms/form-file-uploader.min.css') }}">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

            <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/pages/app-invoice.css') }}">
            <!-- Bootstrap CSS & Icons -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
            <link rel="stylesheet" href="{{ asset('admin-assets/css/ai.css') }}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="{{ asset('admin-assets/css/examine.css') }}">

            <style>
                .report-image {
                    transition: transform 0.2s ease-in-out;
                    border: 2px solid #e0e0e0;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                }

                .report-image:hover {
                    transform: scale(1.05);
                    border-color: #007bff;
                    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
                }

                .modal-lg {
                    max-width: 90%;
                }

                .modal-body img {
                    border-radius: 8px;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                }

                .modal-header {
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    color: white;
                    border-bottom: none;
                }

                .modal-header .close {
                    color: white;
                    opacity: 0.8;
                }

                .modal-header .close:hover {
                    opacity: 1;
                }
            </style>
        `;

        // Open popup
        var printWindow = window.open('', '');

        // Write document
        printWindow.document.write(
            '<html><head><title>Print Prescription</title>' +
            styles +
            '</head><body>' +
            printContents +
            '</body></html>'
        );

        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    });

    // ✅ Bind CKEditor to fields and preview
    const editors = {};
    function bindEditor(id, targetSelector) {
        ClassicEditor
            .create(document.querySelector(id))
            .then(editor => {
                editors[id] = editor;

                if (targetSelector) {
                    editor.model.document.on('change:data', () => {
                        const value = editor.getData();
                        $(targetSelector).html(value); // Live update
                    });
                }
            })
            .catch(error => {
                console.error(`CKEditor init failed on ${id}:`, error);
            });
    }

    // Fields to bind
    bindEditor('#complaint', '#display-complaint');
    bindEditor('#symptoms', '#display-symptoms');
    bindEditor('#blood_pressure', null);
    bindEditor('#provisional-diagnosis', '#display-provisional-diagnosis');
    bindEditor('#final-diagnosis', '#display-final-diagnosis');
    bindEditor('#final_diagnosis', '#display-diagnosis');
    bindEditor('#special_notes', '#display_special_notes');
    bindEditor('#medication', '#display-medication');
    bindEditor('#investigation', '#display-investigation');


    // Display prescription in the prescription tab

        // If you want to update the prescription tab dynamically when the form changes,
        // you can listen to changes on the medicine/dose selects and update the display.
        // --- Prescription Display Logic ---
        function getPrescriptionHtmlString() {
            let prescriptionList = [];
            $('#medicine-dose-list .medicine-dose-row').each(function() {
                let medicine = $(this).find('select[name="medicine_id[]"] option:selected').text();
                let dose = $(this).find('select[name="dose_id[]"] option:selected').text();
                if (medicine && dose) {
                    prescriptionList.push(`<li>${medicine} - ${dose}</li>`);
                }
            });
            if (prescriptionList.length > 0) {
                return '<ul class="mb-0">' + prescriptionList.join('') + '</ul>';
            } else {
                return '<span class="text-muted">No prescription added.</span>';
            }
        }

        function updatePrescriptionDisplay() {
            $('#display-medication').html(getPrescriptionHtmlString());
        }

        // --- Lab Investigation Display Logic ---
        function getInvestigationHtmlString() {
            let investigationList = [];
            $('#lab-test-list .lab-test-row').each(function() {
                let bloodTest = $(this).find('select[name^="blood_test_id"] option:selected');
                let xray = $(this).find('select[name^="xray_id"] option:selected');
                let ultrasound = $(this).find('select[name^="ultrasound_id"] option:selected');
                let ctscan = $(this).find('select[name^="ctscan_id"] option:selected');

                let items = [];
                if (bloodTest.length && bloodTest.val() && bloodTest.text().trim() && !bloodTest.prop('disabled') && bloodTest.val() !== "") {
                    if (bloodTest.val() !== "" && !/select/i.test(bloodTest.text())) {
                        items.push(bloodTest.text().trim());
                    }
                }
                if (xray.length && xray.val() && xray.text().trim() && !xray.prop('disabled') && xray.val() !== "") {
                    if (xray.val() !== "" && !/select/i.test(xray.text())) {
                        items.push(xray.text().trim());
                    }
                }
                if (ultrasound.length && ultrasound.val() && ultrasound.text().trim() && !ultrasound.prop('disabled') && ultrasound.val() !== "") {
                    if (ultrasound.val() !== "" && !/select/i.test(ultrasound.text())) {
                        items.push(ultrasound.text().trim());
                    }
                }
                if (ctscan.length && ctscan.val() && ctscan.text().trim() && !ctscan.prop('disabled') && ctscan.val() !== "") {
                    if (ctscan.val() !== "" && !/select/i.test(ctscan.text())) {
                        items.push(ctscan.text().trim());
                    }
                }

                if (items.length > 0) {
                    investigationList.push('<li>' + items.join(', ') + '</li>');
                }
            });

            if (investigationList.length > 0) {
                return '<ul class="mb-0">' + investigationList.join('') + '</ul>';
            } else {
                return '<span class="text-muted">No lab investigation added.</span>';
            }
        }

        function updateLabInvestigationDisplay() {
            $('#display-investigation').html(getInvestigationHtmlString());
        }

        // Initial update
        updatePrescriptionDisplay();
        updateLabInvestigationDisplay();

        // Update on change
        $(document).on('change', '#medicine-dose-list select', updatePrescriptionDisplay);
        $(document).on('change', '#lab-test-list select', updateLabInvestigationDisplay);

        // Also update when a new medicine row is added or removed
        $(document).on('click', '.btn-add-medicine, .btn-remove-medicine', function() {
            setTimeout(updatePrescriptionDisplay, 100); // slight delay to allow DOM update
        });

        // --- SUBMIT PRESCRIPTION/INVESTIGATION AS HTML STRING ON FORM SUBMIT ---
        // Replace '#diagnosis-form' with your actual form ID or selector
        $('#diagnosis-form').on('submit', function(e) {
            // Before submit, set hidden fields with the HTML string
            // If not present, create them
            let $presc = $(this).find('input[name="prescription_html"]');
            if ($presc.length === 0) {
                $presc = $('<input type="hidden" name="prescription_html">').appendTo(this);
            }
            $presc.val(getPrescriptionHtmlString());

            let $invest = $(this).find('input[name="investigation_html"]');
            if ($invest.length === 0) {
                $invest = $('<input type="hidden" name="investigation_html">').appendTo(this);
            }
            $invest.val(getInvestigationHtmlString());
            // Now the form will submit these HTML strings as part of the POST data
        });

    // Also update when a new lab test row is added or removed
    $(document).on('click', '.btn-add-lab-test, .btn-remove-lab-test', function() {
        setTimeout(updateLabInvestigationDisplay, 100); // slight delay to allow DOM update
    });
    // Dynamic add/remove medicine/dose rows
    function reinitSelect2(template) {
        template.find('.medicine-select, .dose-select').select2({ width: 'resolve' });
    }

    $('.btn-add-medicine').on('click', function () {
        var $template = $('#medicine-dose-template')
            .clone()
            .removeClass('d-none')
            .addClass('d-flex')
            .removeAttr('id');

        // Clean any residual select2 junk
        $template.find('select').each(function () {
            $(this).removeAttr('data-select2-id').removeClass('select2-hidden-accessible').removeData('select2');
        });
        $template.find('.select2-container').remove();

        // Clear values and errors
        $template.find('select').val('');
        $template.find('span.text-danger').remove();

        // Append and reinitialize select2
        $('#medicine-dose-list').append($template);
        reinitSelect2($template);
        feather.replace();  
    });

    // Optional: remove row
    $(document).on('click', '.btn-remove-medicine', function () {
        $(this).closest('.medicine-dose-row').remove();
    });

    function initLabSelects($context) {
    $context.find('select').each(function () {
        $(this).select2({ width: 'resolve' });
    });
}

$('.btn-add-lab-test').on('click', function () {
    let $template = $('#lab-test-template').clone().removeClass('d-none').removeAttr('id');

    // Remove old Select2 data if any
    $template.find('select').each(function () {
        $(this).removeAttr('data-select2-id').removeClass('select2-hidden-accessible').removeData('select2');
    });
    $template.find('.select2-container').remove();

    // Clear all selections
    $template.find('select').val('');

    // Append and re-init
    $('#lab-test-list').append($template);
    initLabSelects($template);
});

$(document).on('click', '.btn-remove-lab-test', function () {
    $(this).closest('.lab-test-row').prev('hr').remove();
    $(this).closest('.lab-test-row').remove();
});

// Initialize existing selects
initLabSelects($('#lab-test-list'));
});