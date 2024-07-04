<?php include 'plugins/navbar.php'; ?>
    <?php include 'plugins/sidebar/cot_bar.php'; ?>

    <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Start Point</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-gray-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="nav-icon fas fa-chart-line"></i> Mass Production
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                    <i class="fas fa-expand"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="row mb-4">
                        <div class="col-sm-4">
    <label>Part Name</label>
    <select class="form-control" id="partName">
        <option value="">Choose...</option>
    </select>
</div>


    <div class="col-sm-4">
        <label>Inspected By</label>
        <input type="text" class="form-control" placeholder="Inspected By" id="inspectedBy">
    </div>
    <div class="col-sm-4">
        <label for="defectType">Defect Type</label>
        <select id="defectType" class="form-control">
            <option value="" selected disabled>Choose...</option>
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
        </select>
    </div>
</div>



                            <div class="row mt-4">
                                <div class="col-6 col-sm-4">
                                    <!-- Date From -->
                                    <label
                                        style="font-weight:normal;margin:0;padding:0;color:#000; font-weight:bold;">Date
                                        From</label>
                                    <input type="date" name="date_from" class="form-control form-control-sm"
                                        id="date_from">
                                </div>
                                <div class="col-6 col-sm-4">
                                    <!-- Date To -->
                                    <label
                                        style="font-weight:normal;margin:0;padding:0;color:#000; font-weight:bold;">Date
                                        To</label>
                                    <input type="date" name="date_to" class="form-control form-control-sm"
                                        id="date_to">
                                </div>

                                <div class="col-6 col-sm-4 ">
                                    <label
                                        style="font-weight:normal;margin:0;padding:0;color:#000; visibility: hidden !important;">Search</label>
                                    <button class="btn btn-primary btn-block btn-sm" id="searchbtn"
                                        style="margin-bottom:30px">
                                        <i class="fas fa-search mr-2"></i>Search
                                    </button>
                                </div>

                                <div class="col-6 col-sm-4 ">
                                    <!-- Refresh Button -->
                                    <button class="btn btn-info btn-block btn-sm" id="refreshPageBtn"
                                        onclick="refreshPage()">
                                        <i class="fas fa-sync-alt mr-2"></i>Refresh
                                    </button>
                                </div>
                                <div class="col-6 col-sm-4 ">
                                    <!-- Export Button -->
                                    <button class="btn btn-warning btn-block btn-sm" id="exportReqBtn"onclick="exportTable()">
                                        <i class="fas fa-file-export mr-2"></i>Export
                                    </button>
                                </div>
                                <div class="col-6 col-sm-4 ">
                                    <!-- Add Record Button -->
                                    <button class="btn btn-success btn-block btn-sm"
                                        style="background-color: #20c997; border-color: #20c997; color:white;"
                                        id="openModalBtn" data-toggle="modal" data-target="#addRecordModal">
                                        <i class="fas fa-plus mr-2"></i>Add Record
                                    </button>
                                </div>
                            </div>



                            <div id="accounts_table_res" class="table-responsive"
                                style="height: 45vh; overflow: auto; display: inline-block; margin-top: 50px; border-top: 1px solid gray;">
                                <table id="mp_cotdb" class="table table-sm table-head-fixed text-nowrap table-hover">
                                    <thead style="text-align: center;">
                                        <!-- Table Headers -->
                                        <tr>
                                            <th>#</th>
                                            <th>Part Name</th>
                                            <th>Quantity</th>
                                            <th>Time Start</th>
                                            <th>Time End</th>
                                            <th>Inspected By</th>
                                            <th>Shift</th>
                                            <th>Inspection Date</th>
                                            <th>Total Minutes</th>
                                            <th>Outside Appearance</th>
                                            <th>Slit Condition</th>
                                            <th>Inside Appearance</th>
                                            <th>Color</th>
                                            <th>I Tolerance +</th>
                                            <th>I Tolerance -</th>
                                            <th>I Diameter Start</th>
                                            <th>I Diameter End</th>
                                            <th>O Tolerance +</th>
                                            <th>O Tolerance -</th>
                                            <th>O Diameter Start</th>
                                            <th>O Diameter End</th>
                                            <th>W Tolerance +</th>
                                            <th>W Tolerance -</th>
                                            <th>Q1 Start</th>
                                            <th>Q2 Start</th>
                                            <th>Q3 Start</th>
                                            <th>Q4 Start</th>
                                            <th>Q1 End</th>
                                            <th>Q2 End</th>
                                            <th>Q3 End</th>
                                            <th>Q4 End</th>
                                            <th>Serial No.</th>
                                            <th>Lot No.</th>
                                            <th>Using Round Bar</th>
                                            <th>Using Bare Hands</th>
                                            <th>Appearance Judgement</th>
                                            <th>Dimension Judgement</th>
                                            <th>NG Quantity</th>
                                            <th>Defect Type</th>
                                            <th>Confirm By</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mp_cotdb_body" style="text-align: center; padding:20px;">
                                        <!-- Data will be inserted here -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-sm-center mt-3">
                                <button type="button" class="btn bg-gray-dark" id="btnLoadMore">Load more</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
    
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

    // Infinite scroll event (if you want to keep it)
    document.getElementById('accounts_table_res').addEventListener('scroll', () => {
        const container = document.getElementById('accounts_table_res');
        if (container.scrollTop + container.clientHeight >= container.scrollHeight) {
            offset += limit;
            loadTableData(offset, limit);
        }
    });

    // Search button event
    document.getElementById('searchbtn').addEventListener('click', () => {
        offset = 0;
        loadTableData(offset, limit, true);
    });
});

function loadTableData(offset, limit, reset = false) {
    const partName = document.getElementById('partName').value;
    const inspectedBy = document.querySelector('input[placeholder="Inspected By"]').value;
    const defectType = document.getElementById('defectType').value;
    const dateFrom = document.getElementById('date_from').value;
    const dateTo = document.getElementById('date_to').value;

    const url = `../../process/cot_mp_get_data.php?offset=${offset}&limit=${limit}&partName=${partName}&inspectedBy=${inspectedBy}&defectType=${defectType}&dateFrom=${dateFrom}&dateTo=${dateTo}`;

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (reset) {
                document.getElementById('mp_cotdb_body').innerHTML = ''; 
            }
            populateTable(data);

            if (data.length < limit) {
                document.getElementById('btnLoadMore').style.display = 'none';
            } else {
                document.getElementById('btnLoadMore').style.display = 'block';
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}

// Rest of the populateTable function remains the same


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
             <td>${row.serial_no}</td>
            <td>${row.lot_no}</td>
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

document.addEventListener('DOMContentLoaded', () => {
    // Fetch part names data
    fetch('../../process/cot_get_part_names.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Populate dropdown options
            const partNameSelect = document.getElementById('partName');
            data.forEach(part => {
                const option = document.createElement('option');
                option.value = part.part_name;
                option.textContent = part.part_name;
                partNameSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching part names:', error));
});





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






</script>
<?php include 'plugins/mp_footer.php'; ?>
<?php include 'plugins/js/cot_mp_script.php'; ?>
