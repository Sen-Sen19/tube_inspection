

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
        
        var iDiaMin = selectedOption.data('iDiaMin');
        var iDiaMax = selectedOption.data('iDiaMax');
        var oDiaMin = selectedOption.data('oDiaMin');
        var oDiaMax = selectedOption.data('oDiaMax');
        var wMin = selectedOption.data('wMin');
        var wMax = selectedOption.data('wMax');
        
        $('#tolerance-plus').val(iDiaMin);
        $('#tolerance-minus').val(iDiaMax);
        
        $('#o-tolerance-plus').val(oDiaMin);
        $('#o-tolerance-minus').val(oDiaMax);

        $('#w-tolerance-plus').val(wMin);
        $('#w-tolerance-minus').val(wMax);
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

    form.querySelectorAll('input[type="text"]').forEach(input => {
        input.style.border = ''; // Reset border to default
        input.removeEventListener('input', resetBorder); // Remove any previous listeners to avoid duplication
    });

    form.querySelectorAll('input[type="text"]').forEach(input => {
        if (input.value.trim() === "") {
            isEmpty = true;
            input.style.border = '.5px solid red'; 

            // Add event listener to reset border when user starts typing
            input.addEventListener('input', resetBorder);
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
   function populateTable() {
        var tbody = document.getElementById('sp_cotdb_body');
        <?php foreach ($result as $row): ?>
            var newRow = tbody.insertRow(0); // Insert at index 0, which is the top

            newRow.innerHTML = `
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
            `;
        <?php endforeach; ?>
    }

    window.onload = function() {
        populateTable();
    };
    // -----------------------------------search------------------------------------


    function searchAccounts() {
    var input = document.getElementById("searchBox").value.toUpperCase();
    var table = document.getElementById("sp_cotdb");
    var rows = table.getElementsByTagName("tr");

    for (var i = 0; i < rows.length; i++) {
        var partNameCol = rows[i].getElementsByTagName("td")[1]; 
        if (partNameCol) {
            var textValue = partNameCol.textContent || partNameCol.innerText;
            if (textValue.toUpperCase().indexOf(input) > -1) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
}

// --------------------------------------------


    </script>