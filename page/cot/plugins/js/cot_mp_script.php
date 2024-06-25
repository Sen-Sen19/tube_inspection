

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

        // Validate against i_dia_min
        if (startVal !== '' && parseFloat(startVal) < parseFloat(iDiaMin)) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });

    $('#inside-end').on('input', function() {
        var endVal = $(this).val();
        var iDiaMax = $(this).data('iDiaMax');

        // Validate against i_dia_max
        if (endVal !== '' && parseFloat(endVal) > parseFloat(iDiaMax)) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });

    $('#outside-start').on('input', function() {
        var startVal = $(this).val();
        var oDiaMin = $(this).data('oDiaMin');

        // Validate against o_dia_min
        if (startVal !== '' && parseFloat(startVal) < parseFloat(oDiaMin)) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });

    $('#outside-end').on('input', function() {
        var endVal = $(this).val();
        var oDiaMax = $(this).data('oDiaMax');

        // Validate against o_dia_max
        if (endVal !== '' && parseFloat(endVal) > parseFloat(oDiaMax)) {
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
function saveData() {
    var form = document.getElementById('myForm');
    var formData = new FormData(form);
    var isEmpty = false;

    // Function to reset the border on input event
    function resetBorder(event) {
        event.target.style.border = ''; // Reset border to default
    }

    // Reset borders and remove input event listeners for text inputs
    form.querySelectorAll('input[type="text"]').forEach(input => {
        input.style.border = ''; // Reset border to default
        input.removeEventListener('input', resetBorder); // Remove any previous listeners to avoid duplication
    });

    // Reset borders for select elements
    form.querySelectorAll('select').forEach(select => {
        select.style.border = ''; // Reset border to default
    });

    // Check text inputs for empty values
    form.querySelectorAll('input[type="text"]').forEach(input => {
        if (input.value.trim() === "") {
            isEmpty = true;
            input.style.border = '1px solid red'; // Highlight empty field

            // Add event listener to reset border when user starts typing
            input.addEventListener('input', resetBorder);
        }
    });

    // Check select elements for not being picked
    form.querySelectorAll('select').forEach(select => {
        if (select.value.trim() === "") {
            isEmpty = true;
            select.style.border = '1px solid red'; // Highlight empty field
        }
    });

    if (isEmpty) {
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Please fill out all required fields!',
            showConfirmButton: true
        });
        return;
    }

    // Adjusted fetch request to point to the correct PHP script for MS SQL Server
    fetch('../../process/mp_cot_save.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(data => {
        console.log(data);

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        });

        setTimeout(function() {
            window.location.reload();
        }, 1600);
    })
    .catch(error => {
        console.error('Error:', error);

        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Oops...',
            text: 'There was an error saving the data.',
            timer: 1500
        });
    });
}


// ---------------------------------------------------Populate the table COT Start Point---------------------------------------------------


document.addEventListener('DOMContentLoaded', () => {
    let offset = 0;
    const limit = 10;

    // Load initial table data
    loadTableData(offset, limit);

    // Load more button event
    document.getElementById('btnLoadMore').addEventListener('click', () => {
        offset += limit;
        loadTableData(offset, limit);
    });

    // Infinite scroll event
    document.getElementById('accounts_table_res').addEventListener('scroll', () => {
        const container = document.getElementById('accounts_table_res');
        if (container.scrollTop + container.clientHeight >= container.scrollHeight) {
            offset += limit;
            loadTableData(offset, limit, document.getElementById('searchBox').value.trim());
        }
    });

    // Search button event
    document.getElementById('searchReqBtn').addEventListener('click', () => {
        offset = 0; // Reset offset for new search
        loadTableData(offset, limit, document.getElementById('searchBox').value.trim());
    });
});

document.getElementById('exportReqBtn').addEventListener('click', () => {
    const searchTerm = document.getElementById('searchBox').value.trim();
    const url = `../../process/cot_mp_export_data.php${searchTerm ? '?search=' + encodeURIComponent(searchTerm) : ''}`;
    window.location.href = url;
});

function loadTableData(offset, limit, search = '') {
    fetch(`../../process/cot_mp_get_data.php?offset=${offset}&limit=${limit}&search=${encodeURIComponent(search)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Sort data by 'id'
            data.sort((a, b) => a.id - b.id);

            if (offset === 0) {
                document.getElementById('mp_cotdb_body').innerHTML = ''; // Clear table for new search results
            }
            populateTable(data);

            // Hide 'Load more' button if all data is loaded
            if (data.length < limit) {
                document.getElementById('btnLoadMore').style.display = 'none';
            } else {
                document.getElementById('btnLoadMore').style.display = 'block';
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}
// -----------------------------populate table-------------------
function populateTable(data) {
    const tbody = document.getElementById('mp_cotdb_body');

    data.forEach(row => {
        const newRow = tbody.insertRow();

        // Format date fields
        const timeStart = formatDate(row.time_start, false, true); // Pass false for isInspectionDate and true for removeMilliseconds
        const timeEnd = formatDate(row.time_end, false, true); // Pass false for isInspectionDate and true for removeMilliseconds
        const inspectionDate = formatDate(row.inspection_date, true); // Pass true to indicate it's inspection_date

        newRow.innerHTML = `
            <td>${row.id}</td>
            <td>${row.part_name}</td>
            <td>${row.quantity}</td>
            <td>${timeStart}</td>
            <td>${timeEnd}</td>
            <td>${row.inspected_by}</td>
            <td>${row.shift}</td>
            <td>${inspectionDate}</td>
            <td>${row.total_mins}</td>
            <td>${row.outside_appearance}</td>
            <td>${row.slit_condition}</td>
            <td>${row.inside_appearance}</td>
            <td>${row.color}</td>
            <td>${row.i_tolerance_plus}</td>
            <td>${row.i_tolerance_minus}</td>
            <td>${row.i_diameter_start}</td>
            <td>${row.i_diameter_end}</td>
            <td>${row.o_tolerance_plus}</td>
            <td>${row.o_tolerance_minus}</td>
            <td>${row.o_diameter_start}</td>
            <td>${row.o_diameter_end}</td>
            <td>${row.w_tolerance_plus}</td>
            <td>${row.w_tolerance_minus}</td>
            <td>${row.q1_start}</td>
            <td>${row.q2_start}</td>
            <td>${row.q3_start}</td>
            <td>${row.q4_start}</td>
           
            <td>${row.q1_end}</td>
            <td>${row.q2_end}</td>
            <td>${row.q3_end}</td>
            <td>${row.q4_end}</td>
            <td>${row.using_round_bar}</td>
            <td>${row.using_bare_hands}</td>
            <td>${row.appearance_judgement}</td>
            <td>${row.dimension_judgement}</td>
            <td>${row.ng_quantity}</td>
            <td>${row.defect_type}</td>
            <td>${row.confirm_by}</td>
            <td>${row.remarks}</td>
        `;
    });
}



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

//------------------------------------------------export--------------------------------------------------------

function export_accounts() {
    // Select the table
    var table = document.getElementById("mp_cotdb");

    // Create an empty array to store the rows (including headers)
    var rows = [];

   
    var headerRow = table.rows[0];
    var headers = [];
    for (var h = 0; h < headerRow.cells.length; h++) {
        headers.push(" " + headerRow.cells[h].textContent.trim()); 
    }
    rows.push(headers.join(","));

    var dataRows = [];

    
    for (var i = 1; i < table.rows.length; i++) {
        var row = [], cells = table.rows[i].cells;

        
        for (var j = 0; j < cells.length; j++) {
           
            row.push(" " + cells[j].textContent.trim()); 
        }

        // Push the row to the data rows array
        dataRows.push(row);
    }

    // Sort data rows by the first column (assuming the first column is the ID)
    dataRows.sort(function(a, b) {
        return parseInt(a[0]) - parseInt(b[0]); // Assuming ID is a numeric value
    });

    // Concatenate the header row and sorted data rows into the final rows array
    rows = rows.concat(dataRows.map(row => row.join(",")));

    // Join all rows into a CSV string with new line characters
    var csv = rows.join("\n");

    // Create a Blob object for the CSV file
    var blob = new Blob([csv], { type: "text/csv;charset=utf-8;" });

    // Create a temporary anchor element and trigger a click to download the CSV file
    var link = document.createElement("a");
    if (link.download !== undefined) {
        var url = URL.createObjectURL(blob);
        link.setAttribute("href", url);
        link.setAttribute("download", "export.csv");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    } else {
        alert("Exporting CSV is not supported in this browser.");
    }
}

    </script>