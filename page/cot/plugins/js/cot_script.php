

<?php




// Check if user is logged in and set the username in JavaScript
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
        url: '../../process/get_part_names.php',
        method: 'GET',
        success: function(data) {
            var parts = JSON.parse(data);
            var dropdown = $('#part_name_dropdown');
            dropdown.empty();
            dropdown.append('<option selected="true" disabled>Choose Part</option>');
            dropdown.prop('selectedIndex', 0);

            $.each(parts, function (key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.part_name)
                    .data('iDiaMin', entry.i_dia_tol_min)
                    .data('iDiaMax', entry.i_dia_tol_add)
                    .data('oDiaMin', entry.o_dia_tol_min)
                    .data('oDiaMax', entry.o_dia_tol_add)
                    .data('wMin', entry.w_tol_min)
                    .data('wMax', entry.w_tol_add)
                    .text(entry.part_name));
            });
        },
        error: function() {
            alert('Failed to retrieve data.');
        }
    });

    $('#part_name_dropdown').change(function() {
        var selectedOption = $(this).find(':selected');
        
        // Retrieve the tolerance values from the selected option
        var iDiaMin = selectedOption.data('iDiaMin');
        var iDiaMax = selectedOption.data('iDiaMax');
        var oDiaMin = selectedOption.data('oDiaMin');
        var oDiaMax = selectedOption.data('oDiaMax');
        var wMin = selectedOption.data('wMin');
        var wMax = selectedOption.data('wMax');
        
        // Populate the form fields for inside diameter
        $('#tolerance-plus').val(iDiaMin);
        $('#tolerance-minus').val(iDiaMax);
        
        // Populate the form fields for outside diameter
        $('#o-tolerance-plus').val(oDiaMin);
        $('#o-tolerance-minus').val(oDiaMax);

        // Populate the form fields for new tolerance
        $('#w-tolerance-plus').val(wMin);
        $('#w-tolerance-minus').val(wMax);
    });
});

        // -----------------------Inspection Date --------------------------
  // Get today's date
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
var yyyy = today.getFullYear();

// Format the date as yyyy-mm-dd
var formattedDate = yyyy + '-' + mm + '-' + dd;

// Set formatted date as the value of the input field and disable it
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

        // Calculate time difference
        var startTimestamp = new Date(startTimeInput.value);
        var endTimestamp = new Date(endTimeInput.value);
        var timeDifference = endTimestamp - startTimestamp;

        // Convert time difference to minutes
        var totalMinutes = timeDifference / (1000 * 60); // Total time in minutes as a float
        totalMinsInput.value = totalMinutes.toFixed(2); // Set value with 2 decimal places
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
    // Get the clear button
    const clearButton = document.querySelector("#addRecordModal .btn-danger");

    // Add click event listener to the clear button
    clearButton.addEventListener("click", function() {
        // Get all input fields inside the modal
        const inputs = document.querySelectorAll("#addRecordModal input");
        const selects = document.querySelectorAll("#addRecordModal select");
        const textareas = document.querySelectorAll("#addRecordModal textarea");

        // Clear all input fields
        inputs.forEach(input => {
            // Only clear if input is not of type 'button' or 'submit'
            if (input.type !== 'button' && input.type !== 'submit') {
                input.value = '';
            }
        });

        // Reset all select fields to their default option
        selects.forEach(select => {
            select.selectedIndex = 0;
        });

        // Clear all textareas
        textareas.forEach(textarea => {
            textarea.value = '';
        });

        // Display warning notice using SweetAlert
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
    var form = document.getElementById('myForm'); // Replace 'myForm' with your actual form ID
    var formData = new FormData(form);

    // AJAX request to send formData to server
    fetch('../../process/save_sp_cot.php', {
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
        console.log(data); // Log server response
        
        // Display success message using SweetAlert
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        });

        // Refresh the page after the SweetAlert is closed
        setTimeout(function() {
            window.location.reload();
        }, 1600); // Delay slightly longer than SweetAlert's timer to ensure it shows completely
    })
    .catch(error => {
        console.error('Error:', error); // Log any errors
        
        // Display error notice using SweetAlert
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Oops...',
            text: 'There was an error saving the data.',
            timer: 1500
        });
    });
}



// ---------------------------------------------------Populate the table---------------------------------------------------

    
function populateTable() {
        var tbody = document.getElementById('sp_cotdb_body');

        <?php foreach ($result as $row): ?>
            tbody.innerHTML += `
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['part_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['time_start']; ?></td>
                    <td><?php echo $row['time_end']; ?></td>
                    <td><?php echo $row['inspected_by']; ?></td>
                    <td><?php echo $row['shift']; ?></td>
                    <td><?php echo $row['inspection_date']; ?></td>
                    <td><?php echo $row['total_mins']; ?></td>
                    <td><?php echo $row['outside_appearance']; ?></td>
                    <td><?php echo $row['slit_condition']; ?></td>
                    <td><?php echo $row['inside_appearance']; ?></td>
                    <td><?php echo $row['color']; ?></td>
                    <td><?php echo $row['i_tolerance_plus']; ?></td>
                    <td><?php echo $row['i_tolerance_minus']; ?></td>
                    <td><?php echo $row['i_diameter_start']; ?></td>
                    <td><?php echo $row['i_diameter_end']; ?></td>
                    <td><?php echo $row['o_tolerance_plus']; ?></td>
                    <td><?php echo $row['o_tolerance_minus']; ?></td>
                    <td><?php echo $row['o_diameter_start']; ?></td>
                    <td><?php echo $row['o_diameter_end']; ?></td>
                    <td><?php echo $row['w_tolerance_plus']; ?></td>
                    <td><?php echo $row['w_tolerance_minus']; ?></td>
                    <td><?php echo $row['q1_start']; ?></td>
                    <td><?php echo $row['q2_start']; ?></td>
                    <td><?php echo $row['q3_start']; ?></td>
                    <td><?php echo $row['q4_start']; ?></td>
                    <td><?php echo $row['q1_middle']; ?></td>
                    <td><?php echo $row['q2_middle']; ?></td>
                    <td><?php echo $row['q3_middle']; ?></td>
                    <td><?php echo $row['q4_middle']; ?></td>
                    <td><?php echo $row['q1_end']; ?></td>
                    <td><?php echo $row['q2_end']; ?></td>
                    <td><?php echo $row['q3_end']; ?></td>
                    <td><?php echo $row['q4_end']; ?></td>
                    <td><?php echo $row['using_round_bar']; ?></td>
                    <td><?php echo $row['using_bare_hands']; ?></td>
                    <td><?php echo $row['appearance_judgement']; ?></td>
                    <td><?php echo $row['dimension_judgement']; ?></td>
                    <td><?php echo $row['ng_quantity']; ?></td>
                    <td><?php echo $row['defect_type']; ?></td>
                    <td><?php echo $row['confirm_by']; ?></td>
                    <td><?php echo $row['remarks']; ?></td>
                </tr>
            `;
        <?php endforeach; ?>
    }

    
    window.onload = function() {
        populateTable();
    };



    </script>