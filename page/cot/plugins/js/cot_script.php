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
                        dropdown.append($('<option></option>').attr('value', entry.part_name).text(entry.part_name));
                    });
                },
                error: function() {
                    alert('Failed to retrieve data.');
                }
            });
        });
      




        // -----------------------Inspection Date --------------------------
            // Get today's date
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;

    // Set today's date as the value of the input field and disable it
    document.getElementById('inspection_date').value = today;
    document.getElementById('inspection_date').disabled = true;












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

        // Convert time difference to minutes and seconds
        var totalMins = Math.floor(timeDifference / (1000 * 60));
        var totalSeconds = Math.floor((timeDifference % (1000 * 60)) / 1000);
        totalMinsInput.value = totalMins + ' mins ' + totalSeconds + ' secs';
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
    });
});
    </script>