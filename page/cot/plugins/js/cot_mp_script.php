

<?php




if (isset($_SESSION['username'])) {
    $loggedInUser = $_SESSION['username'];
    echo '<script>';
    echo 'document.addEventListener("DOMContentLoaded", function() {';
    echo '    var inspectedByInput = document.getElementById("inspected_by");';
    echo '    inspectedByInput.value = "' . $loggedInUser . '";';
    echo '});';
    echo '</script>';
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script>

// --------------------------------modal open------------------------
document.getElementById("openModalBtn").addEventListener("click", function() {
     
    });





// ------------------------------Get PartName-------------------------
$(document).ready(function() {
    $.ajax({
        url: '../../process/cot_get_part_names.php',
        method: 'GET',
        success: function(data) {
            var parts = JSON.parse(data);
            var dropdown = $('#part_name_dropdown');
            dropdown.empty();
            dropdown.append('<option selected="true" disabled>Choose Part</option>');
            dropdown.prop('selectedIndex', 0);

            $.each(parts, function (key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.part_name)
                    .data('iDiaMin', entry.i_dia_min)
                    .data('iDiaMax', entry.i_dia_max)
                    .data('oDiaMin', entry.o_dia_min)
                    .data('oDiaMax', entry.o_dia_max)
                    .data('wMin', entry.w_min)
                    .data('wValue', entry.w_value)
                    .data('wMax', entry.w_max)
                    .data('iDiaTolMin', entry.i_dia_tol_min)
                    .data('iDiaTolMax', entry.i_dia_tol_add)
                    .data('oDiaTolMin', entry.o_dia_tol_min)
                    .data('oDiaTolMax', entry.o_dia_tol_add)
                    .data('wTolMin', entry.w_tol_min)
                    .data('wTolMax', entry.w_tol_add)
                    .text(entry.part_name));
            });
        },
        error: function() {
            alert('Failed to retrieve data.');
        }
    });

    $('#part_name_dropdown').change(function() {
        var selectedOption = $(this).find(':selected');

        // Set tolerance values for inside diameter
        $('#tolerance-plus').val(selectedOption.data('iDiaTolMin'));
        $('#tolerance-minus').val(selectedOption.data('iDiaTolMax'));

        // Set tolerance values for outside diameter
        $('#o-tolerance-plus').val(selectedOption.data('oDiaTolMin'));
        $('#o-tolerance-minus').val(selectedOption.data('oDiaTolMax'));

        // Set tolerance values for wall thickness
        $('#w-tolerance-plus').val(selectedOption.data('wTolMin'));
        $('#w-tolerance-minus').val(selectedOption.data('wTolMax'));

        // Clear and set data attributes for inside diameter fields
        $('#inside-start').val('').removeClass('is-invalid');
        $('#inside-end').val('').removeClass('is-invalid');
        $('#inside-start').data('iDiaMin', selectedOption.data('iDiaMin'));
        $('#inside-end').data('iDiaMax', selectedOption.data('iDiaMax'));

        // Clear and set data attributes for outside diameter fields
        $('#outside-start').val('').removeClass('is-invalid');
        $('#outside-end').val('').removeClass('is-invalid');
        $('#outside-start').data('oDiaMin', selectedOption.data('oDiaMin'));
        $('#outside-end').data('oDiaMax', selectedOption.data('oDiaMax'));

        // Clear and set data attributes for wall thickness (Q1) fields
        $('#q1_start').val('').removeClass('is-invalid');
        $('#q1_middle').val('').removeClass('is-invalid');
        $('#q1_end').val('').removeClass('is-invalid');
        $('#q1_start').data('wMin', selectedOption.data('wMin'));
        $('#q1_middle').data('wValue', selectedOption.data('wValue'));
        $('#q1_end').data('wMax', selectedOption.data('wMax'));

        // Clear and set data attributes for Q2 measurements fields
        $('#q2_start').val('').removeClass('is-invalid');
        $('#q2_middle').val('').removeClass('is-invalid');
        $('#q2_end').val('').removeClass('is-invalid');
        $('#q2_start').data('wMin', selectedOption.data('wMin'));
        $('#q2_middle').data('wValue', selectedOption.data('wValue'));
        $('#q2_end').data('wMax', selectedOption.data('wMax'));

        // Clear and set data attributes for Q3 measurements fields
        $('#q3_start').val('').removeClass('is-invalid');
        $('#q3_middle').val('').removeClass('is-invalid');
        $('#q3_end').val('').removeClass('is-invalid');
        $('#q3_start').data('wMin', selectedOption.data('wMin'));
        $('#q3_middle').data('wValue', selectedOption.data('wValue'));
        $('#q3_end').data('wMax', selectedOption.data('wMax'));

        // Clear and set data attributes for Q4 measurements fields
        $('#q4_start').val('').removeClass('is-invalid');
        $('#q4_middle').val('').removeClass('is-invalid');
        $('#q4_end').val('').removeClass('is-invalid');
        $('#q4_start').data('wMin', selectedOption.data('wMin'));
        $('#q4_middle').data('wValue', selectedOption.data('wValue'));
        $('#q4_end').data('wMax', selectedOption.data('wMax'));
    });

    $('#inside-start').on('input', function() {
    var startVal = $(this).val();
    var iDiaMin = $(this).data('iDiaMin');
    var iDiaMax = $('#inside-end').data('iDiaMax'); // Get i_dia_max from end input

    // Validate against i_dia_min and i_dia_max
    if (startVal !== '' && (parseFloat(startVal) < parseFloat(iDiaMin) || parseFloat(startVal) > parseFloat(iDiaMax))) {
        $(this).addClass('is-invalid');
    } else {
        $(this).removeClass('is-invalid');
    }
});
$('#inside-end').on('input', function() {
    var endVal = $(this).val();
    var iDiaMin = $('#inside-start').data('iDiaMin'); // Get i_dia_min from start input
    var iDiaMax = $(this).data('iDiaMax');

    // Validate against i_dia_min and i_dia_max
    if (endVal !== '' && (parseFloat(endVal) < parseFloat(iDiaMin) || parseFloat(endVal) > parseFloat(iDiaMax))) {
        $(this).addClass('is-invalid');
    } else {
        $(this).removeClass('is-invalid');
    }
});
$('#outside-start').on('input', function() {
    var startVal = $(this).val();
    var oDiaMin = $(this).data('oDiaMin');
    var oDiaMax = $('#outside-end').data('oDiaMax'); // Get o_dia_max from end input

    // Validate against o_dia_min and o_dia_max
    if (startVal !== '' && (parseFloat(startVal) < parseFloat(oDiaMin) || parseFloat(startVal) > parseFloat(oDiaMax))) {
        $(this).addClass('is-invalid');
    } else {
        $(this).removeClass('is-invalid');
    }
});


 $('#outside-end').on('input', function() {
    var endVal = $(this).val();
    var oDiaMin = $('#outside-start').data('oDiaMin'); // Get o_dia_min from start input
    var oDiaMax = $(this).data('oDiaMax');

    // Validate against o_dia_min and o_dia_max
    if (endVal !== '' && (parseFloat(endVal) < parseFloat(oDiaMin) || parseFloat(endVal) > parseFloat(oDiaMax))) {
        $(this).addClass('is-invalid');
    } else {
        $(this).removeClass('is-invalid');
    }
});

    $('#q1_start, #q2_start, #q3_start, #q4_start').on('input', function() {
        var startVal = $(this).val();
        var wMin = $(this).data('wMin');

        // Validate against w_min
        if (startVal !== '' && parseFloat(startVal) < parseFloat(wMin)) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });

    $('#q1_middle, #q2_middle, #q3_middle, #q4_middle').on('input', function() {
        var middleVal = $(this).val();
        var wValue = $(this).data('wValue');

        // Validate if w_value is exactly equal to the input
        if (middleVal !== '' && parseFloat(middleVal) !== parseFloat(wValue)) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });

    $('#q1_end, #q2_end, #q3_end, #q4_end').on('input', function() {
        var endVal = $(this).val();
        var wMax = $(this).data('wMax');

        // Validate against w_max
        if (endVal !== '' && parseFloat(endVal) > parseFloat(wMax)) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });
});



        // -----------------------Inspection Date --------------------------
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();


var formattedDate = yyyy + '-' + mm + '-' + dd;


document.getElementById('inspection_date').value = formattedDate;










  // -----------------------Time Start, End and Total Mins --------------------------



  document.addEventListener('DOMContentLoaded', function() {
    var startTimeInput = document.getElementById('start_time');
    var endTimeInput = document.getElementById('end_time');
    var totalMinsInput = document.getElementById('total_mins');
    var startButton = document.querySelector('.start-button');
    var endButton = document.querySelector('.end-button');

    startButton.addEventListener('click', function() {
        var startTime = new Date();
        startTimeInput.value = formatDateTime(startTime);
    });

    endButton.addEventListener('click', function() {
        var endTime = new Date();
        endTimeInput.value = formatDateTime(endTime);

        var startTimestamp = new Date(startTimeInput.value);
        var endTimestamp = new Date(endTimeInput.value);
        var timeDifference = endTimestamp - startTimestamp;

        var totalMinutes = timeDifference / (1000 * 60); 
        totalMinsInput.value = totalMinutes.toFixed(2); 
    });

    function formatDateTime(dateTime) {
        var year = dateTime.getFullYear();
        var month = (dateTime.getMonth() + 1).toString().padStart(2, '0');
        var day = dateTime.getDate().toString().padStart(2, '0');
        var hours = dateTime.getHours().toString().padStart(2, '0');
        var minutes = dateTime.getMinutes().toString().padStart(2, '0');
        var seconds = dateTime.getSeconds().toString().padStart(2, '0');
        return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
    }
});




// -------------------------Clear Button----------------------------------
document.addEventListener("DOMContentLoaded", function() {
    const clearButton = document.querySelector("#addRecordModal .btn-danger");

    clearButton.addEventListener("click", function() {
        const inputs = document.querySelectorAll("#addRecordModal input");
        const selects = document.querySelectorAll("#addRecordModal select");
        const textareas = document.querySelectorAll("#addRecordModal textarea");
        const excludedIds = ['inspected_by', 'inspection_date'];

        inputs.forEach(input => {
            if (!excludedIds.includes(input.id) && input.type !== 'button' && input.type !== 'submit') {
                input.value = '';
            }
        });

        selects.forEach(select => {
            if (!excludedIds.includes(select.id)) {
                select.selectedIndex = 0;
            }
        });

        textareas.forEach(textarea => {
            if (!excludedIds.includes(textarea.id)) {
                textarea.value = '';
            }
        });

        Swal.fire({
            icon: 'success',
            title: 'Form Cleared',
            text: 'All fields have been cleared.',
            showConfirmButton: false,
            timer: 1500
        });
    });
});



// -------------------------------save-------------------------------


// ------------------------------------------------date-------------------------------------------------

function formatDate(dateObject, isInspectionDate = false, removeMilliseconds = false) {
    if (!dateObject) return ''; 

    const date = new Date(dateObject.date);
    
    if (isInspectionDate) {
        return date.toLocaleDateString();
    } else {
        let formattedDate = date.toLocaleDateString();
        let formattedTime = date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });

        if (removeMilliseconds) {
            // Remove milliseconds from time part
            formattedTime = formattedTime.replace(/\.\d+/, '');
        }

        return `${formattedDate} ${formattedTime}`;
    }
}


// --------------------------------------------refresh button -----------------------------------------------------
function refreshPage() {
        window.location.reload(); 
    }







// ---------------------------------------------------export--------------------------------------------------------------

function exportTable() {
    const partName = document.getElementById('partName').value;
    const inspectedBy = document.getElementById('inspectedBy').value;
    const defectType = document.getElementById('defectType').value;
    const dateFrom = document.getElementById('date_from').value;
    const dateTo = document.getElementById('date_to').value;

    // Get current date in YYYY-MM-DD format
    const currentDate = new Date().toISOString().slice(0, 10);

    // Construct the filename with the current date
    const filename = `COT_Mass_Production_${currentDate}.csv`;

    // Construct the URL with search parameters
    const url = `../../process/cot_mp_export_data.php?partName=${encodeURIComponent(partName)}&inspectedBy=${encodeURIComponent(inspectedBy)}&defectType=${encodeURIComponent(defectType)}&dateFrom=${encodeURIComponent(dateFrom)}&dateTo=${encodeURIComponent(dateTo)}`;

    // Fetch data from the PHP script
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.blob(); // Convert response to a Blob
        })
        .then(blob => {
            // Create a URL for the Blob data
            const downloadUrl = window.URL.createObjectURL(blob);

            // Create an <a> element to trigger the download
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = downloadUrl;
            a.download = filename; // Set the filename for the downloaded file
            document.body.appendChild(a);

            // Trigger the download
            a.click();

            // Clean up by revoking the object URL
            window.URL.revokeObjectURL(downloadUrl);
        })
        .catch(error => {
            console.error('Error exporting data:', error);
        });
}







//------------------------------------------------defect type--------------------------------------------------------

function handleDefectTypeChange() {
            const defectType = document.getElementById('defect_type');
            const selectedOption = defectType.value;

            if (selectedOption === 'Others') {
                // Show SweetAlert confirmation
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to specify another defect type?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, specify',
                    cancelButtonText: 'No, cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Replace dropdown with a text input if confirmed
                        const inputField = document.createElement('input');
                        inputField.setAttribute('type', 'text');
                        inputField.setAttribute('class', 'form-control');
                        inputField.setAttribute('id', 'other_defect_type'); // Add an id to the new input field
                        inputField.setAttribute('name', 'defect_type');
                        inputField.setAttribute('placeholder', 'Specify other defect type');
                        inputField.style.marginBottom = '16px';

                        const defectContainer = document.getElementById('defect-container');
                        defectContainer.innerHTML = ''; // Clear previous content
                        defectContainer.appendChild(inputField);
                    } else {
                        // Reset the dropdown to default value if cancelled
                        defectType.value = "";
                    }
                });
            }
        }

        function handleFormSubmit(event) {
            event.preventDefault(); // Prevent form from submitting the traditional way

            // Check if the custom input field exists and has a value
            const otherDefectTypeInput = document.getElementById('other_defect_type');
            if (otherDefectTypeInput) {
                const defectType = document.getElementById('defect_type');
                defectType.value = otherDefectTypeInput.value;
            }

            // Here you can proceed with form submission using AJAX or any other method you prefer
            console.log('Form submitted with defect type:', document.getElementById('defect_type').value);
            // Perform your save operation here
            // Optionally, you can show a success message or perform any other actions needed
        }

        function clearForm() {
            document.getElementById('defectForm').reset();
            // Clear custom defect input if exists
            const defectContainer = document.getElementById('defect-container');
            defectContainer.innerHTML = ''; // Clear custom input
            // Re-add the original dropdown
            const selectElement = document.createElement('select');
            selectElement.id = 'defect_type';
            selectElement.className = 'form-control';
            selectElement.name = 'defect_type';
            selectElement.style.marginBottom = '16px';
            selectElement.onchange = handleDefectTypeChange;
            selectElement.innerHTML = `
                <option value="" selected disabled>Choose...</option>
                <option value="N/A">N/A</option>
                <option value="Round crest">Round crest</option>
                <option value="Damage">Damage</option>
                <option value="Molding defect">Molding defect</option>
                <option value="Excess burr">Excess burr</option>
                <option value="Dent">Dent</option>
                <option value="Misaligned joint portion">Misaligned joint portion</option>
                <option value="Foreign material">Foreign material</option>
                <option value="Slit position is on joint portion">Slit position is on joint portion</option>
                <option value="With gap on slit">With gap on slit</option>
                <option value="Crack">Crack</option>
                <option value="Overlap">Overlap</option>
                <option value="Slit is uneven">Slit is uneven</option>
                <option value="Slanted slit">Slanted slit</option>
                <option value="Unstable thickness">Unstable thickness</option>
                <option value="Tubebreaking on slit portion">Tubebreaking on slit portion</option>
                <option value="Out of Tolerance">Out of Tolerance</option>
                <option value="Others">Others</option>
            `;
            defectContainer.appendChild(selectElement);
        }

    </script>