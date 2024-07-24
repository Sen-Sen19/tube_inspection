<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Plastic Tube Inspection</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <!-- <div class="container-fluid"> -->
            <!-- <div class="row"> -->
                <div class="col-sm-12">
                    <div class="card card-gray-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-box"></i> Plastic Tube Inspection
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
                                <div class="col-sm-3">
                                    <label>Part Name</label>
                                    <select class="form-control" id="partName" style="height: 33px; font-size: 14px;">
                                        <option value="">Choose...</option>
                                    </select>
                                </div>


                                <div class="col-sm-3">
                                    <label>Inspected By</label>
                                    <input type="text" class="form-control" placeholder="Inspected By" id="inspectedBy"
                                        style="height: 33px; font-size: 14px;">
                                </div>
                                <div class="col-sm-3">
                                    <label for="defectType">Defect Type</label>
                                    <select id="defectType" class="form-control" style="height: 33px;font-size: 14px;">
                                        <option value="" selected disabled>Choose...</option>
                                        <option value="Round crest">Round crest</option>
                                        <option value="Damage">Damage</option>
                                        <option value="Molding defect">Molding defect</option>
                                        <option value="Excess burr">Excess burr</option>
                                        <option value="Dent">Dent</option>
                                        <option value="Misaligned joint portion">Misaligned joint portion</option>
                                        <option value="Foreign material">Foreign material</option>
                                        <option value="Slit position is on joint portion">Slit position is on joint
                                            portion</option>
                                        <option value="With gap on slit">With gap on slit</option>
                                        <option value="Crack">Crack</option>
                                        <option value="Overlap">Overlap</option>
                                        <option value="Slit is uneven">Slit is uneven</option>
                                        <option value="Slanted slit">Slanted slit</option>
                                        <option value="Unstable thickness">Unstable thickness</option>
                                        <option value="Tubebreaking on slit portion">Tubebreaking on slit portion
                                        </option>
                                        <option value="Hole">Hole</option>
                                        <option value="Scratch">Scratch</option>
                                        <option value="Deformed">Deformed</option>
                                        <option value="Rough surface">Rough surface</option>
                                        <option value="Bubbles on surface">Bubbles on surface</option>
                                        <option value="Big Diameter">Big Diameter</option>
                                        <option value="Small Diameter">Small Diameter</option>
                                        <option value="Wrinkled on surface">Wrinkled on surface</option>
                                        <option value="Out of Tolerance">Out of Tolerance</option>
                                    </select>
                                </div>


                                <div class="col-6 col-sm-3 ">
                                    <!-- Refresh Button -->
                                    <label
                                        style="font-weight:normal;margin-bottom:9px;padding:0; visibility: hidden !important;">Refresh</label>
                                    <button class="btn btn-info btn-block btn-sm" id="refreshPageBtn"
                                        style="background-color:#f8f100; border-color:#cbc500; color:black;"
                                        onclick="refreshPage()">
                                        <i class="fas fa-sync-alt mr-2"></i>Refresh
                                    </button>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-6 col-sm-3">

                                    <label
                                        style="font-weight:normal;margin:0;padding:0;color:#000; font-weight:bold;">Date
                                        From</label>
                                    <input type="date" name="date_from" class="form-control form-control-sm"
                                        id="date_from">
                                </div>
                                <div class="col-6 col-sm-3">

                                    <label
                                        style="font-weight:normal;margin:0;padding:0;color:#000; font-weight:bold;">Date
                                        To</label>
                                    <input type="date" name="date_to" class="form-control form-control-sm" id="date_to">
                                </div>

                                <div class="col-6 col-sm-3 ">
                                    <label
                                        style="font-weight:normal;margin:0;padding:0; visibility: hidden !important;">Search</label>
                                    <button class="btn btn-primary btn-block btn-sm" id="searchbtn">
                                        <i class="fas fa-search mr-2"></i>Search
                                    </button>
                                </div>



                                <div class="col-6 col-sm-3 ">
                                    <label
                                        style="font-weight:normal;margin-bottom:0px;padding:0; visibility: hidden !important;">Add
                                        Record</label>
                                    <button class="btn btn-success btn-block btn-sm"
                                        style="background-color: #20c997; border-color: #20c997; color:white;"
                                        id="openModalBtn" data-toggle="modal" data-target="#addRecordModal">
                                        <i class="fas fa-plus mr-2"></i>Add Record
                                    </button>
                                </div>
                            </div>



                            <div id="accounts_table_res" class="table-responsive"
                                style="height: 45vh; overflow: auto; display: inline-block; margin-top: 50px; border-top: 1px solid gray;">
                                <table id="sp_cotdb" class="table table-sm table-head-fixed text-nowrap table-hover">
                                    <thead style="text-align: center;">
                                        <!-- Table Headers -->
                                        <tr>
                                            <th>#</th>
                                            <th>Part Name</th>
                                            <th>Process</th>
                                            <th>Serial No.</th>
                                            <th>Lot No.</th>
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
                                            <th>Q1 Middle</th>
                                            <th>Q2 Middle</th>
                                            <th>Q3 Middle</th>
                                            <th>Q4 Middle</th>
                                            <th>Q1 End</th>
                                            <th>Q2 End</th>
                                            <th>Q3 End</th>
                                            <th>Q4 End</th>
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
                                    <tbody id="sp_cotdb_body" style="text-align: center; padding:20px;">
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
            <!-- </div> -->
        <!-- </div> -->
    </section>
</div>


<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/user_script.php'; ?>


<!-- Modal Structure -->
<div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #20c997; color: white;">
                <h5 class="modal-title" id="dataModalLabel">Start Point</h5>
                <button type="button" class="close" data-dismiss="modal" style="color:white" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalDataContent">
            </div>
            <div class="modal-footer d-flex justify-content-end">
                <button type="button" class="btn" style="background-color: #20c997; color: white;"
                    onclick="saveInspectionDetails()">Save</button>
            </div>
        </div>
    </div>
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
        // const partName = document.querySelector('input[placeholder="Part Name"]').value;
        const partName = document.getElementById('partName').value;
        const inspectedBy = document.querySelector('input[placeholder="Inspected By"]').value;
        const defectType = document.getElementById('defectType').value;
        const dateFrom = document.getElementById('date_from').value;
        const dateTo = document.getElementById('date_to').value;

        const url = `../../process/cot_get_data.php?offset=${offset}&limit=${limit}&partName=${partName}&inspectedBy=${inspectedBy}&defectType=${defectType}&dateFrom=${dateFrom}&dateTo=${dateTo}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (reset) {
                    document.getElementById('sp_cotdb_body').innerHTML = '';
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

    // Rest of the populateTable function remains the same


    // -----------------------------populate table-------------------
    function populateTable(data) {
        const tbody = document.getElementById('sp_cotdb_body');

        data.forEach(row => {
            const newRow = tbody.insertRow();

            // Format date fields
            const timeStart = formatDate(row.time_start, false, true); // Pass false for isInspectionDate and true for removeMilliseconds
            const timeEnd = formatDate(row.time_end, false, true); // Pass false for isInspectionDate and true for removeMilliseconds
            const inspectionDate = formatDate(row.inspection_date, true); // Pass true to indicate it's inspection_date

            newRow.innerHTML = `
            <td>${row.id}</td>
            <td>${row.part_name}</td>
            <td>${row.process}</td>
             <td>${row.serial_no}</td>
              <td>${row.lot_no}</td>
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
            <td>${row.q1_middle}</td>
            <td>${row.q2_middle}</td>
            <td>${row.q3_middle}</td>
            <td>${row.q4_middle}</td>
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
            newRow.addEventListener('click', () => {
                // Call function to open modal and populate with row data
                openModalWithData(row);
            });
        });
    }
    document.addEventListener('DOMContentLoaded', () => {
        // Fetch part names data
        fetch('../../process/get_partname.php')
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



    function exportTable() {
        const partName = document.getElementById('partName').value;
        const inspectedBy = document.getElementById('inspectedBy').value;
        const defectType = document.getElementById('defectType').value;
        const dateFrom = document.getElementById('date_from').value;
        const dateTo = document.getElementById('date_to').value;

        // Get current date in YYYY-MM-DD format
        const currentDate = new Date().toISOString().slice(0, 10);

        // Construct the filename with the current date
        const filename = `COT_Start_Point_${currentDate}.csv`;

        // Construct the URL with search parameters
        const url = `../../process/cot_sp_export_data.php?partName=${encodeURIComponent(partName)}&inspectedBy=${encodeURIComponent(inspectedBy)}&defectType=${encodeURIComponent(defectType)}&dateFrom=${encodeURIComponent(dateFrom)}&dateTo=${encodeURIComponent(dateTo)}`;

        // Fetch data from the PHP script
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.blob();
            })
            .then(blob => {

                const downloadUrl = window.URL.createObjectURL(blob);


                const a = document.createElement('a');
                a.style.display = 'none';
                a.href = downloadUrl;
                a.download = filename;
                document.body.appendChild(a);


                a.click();


                window.URL.revokeObjectURL(downloadUrl);
            })
            .catch(error => {
                console.error('Error exporting data:', error);
            });
    }
    function openModalWithData(rowData) {
        const modalBody = document.getElementById('modalDataContent');
        modalBody.innerHTML = ''; // Clear previous content

        // Create HTML content with textboxes to display row data in an editable format
        const modalContent = `
        <form id="inspectionForm">
            <table class="table table-bordered">
                <tbody>
                     <tr>
                    <th>ID:</th>
                    <td><input type="text" name="id" value="${rowData.id}" class="form-control" readonly></td>
                    <th>Part Name:</th>
                    <td><input type="text" name="part_name" value="${rowData.part_name}" class="form-control" readonly></td>
                </tr>
                <tr>
                    <th>Quantity:</th>
                    <td><input type="text" name="quantity" value="${rowData.quantity}" class="form-control"></td>
                    <th>Inspected By:</th>
                    <td><input type="text" name="inspected_by" value="${rowData.inspected_by}" class="form-control" readonly></td>
                </tr>
                <tr>
                    <th>Shift:</th>
                    <td><input type="text" name="shift" value="${rowData.shift}" class="form-control"></td>
                    <th>Total Minutes:</th>
                    <td><input type="text" name="total_mins" value="${rowData.total_mins}" class="form-control" readonly></td>
                </tr>
                <tr>
                    <th>Outside Appearance:</th>
                    <td>
                        <select name="outside_appearance" class="form-control">
                            <option value="OK" ${rowData.outside_appearance === 'OK' ? 'selected' : ''}>OK</option>
                            <option value="NG" ${rowData.outside_appearance === 'NG' ? 'selected' : ''}>NG</option>
                        </select>
                    </td>
                    <th>Slit Condition:</th>
                    <td>
                        <select name="slit_condition" class="form-control">
                            <option value="OK" ${rowData.slit_condition === 'OK' ? 'selected' : ''}>OK</option>
                            <option value="NG" ${rowData.slit_condition === 'NG' ? 'selected' : ''}>NG</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Inside Appearance:</th>
                    <td>
                        <select name="inside_appearance" class="form-control">
                            <option value="OK" ${rowData.inside_appearance === 'OK' ? 'selected' : ''}>OK</option>
                            <option value="NG" ${rowData.inside_appearance === 'NG' ? 'selected' : ''}>NG</option>
                        </select>
                    </td>
                    <th>Color:</th>
                    <td>
                        <select name="color" class="form-control">
                            <option value="OK" ${rowData.color === 'OK' ? 'selected' : ''}>OK</option>
                            <option value="NG" ${rowData.color === 'NG' ? 'selected' : ''}>NG</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Using Round Bar:</th>
                    <td>
                        <select name="using_round_bar" class="form-control">
                            <option value="OK" ${rowData.using_round_bar === 'OK' ? 'selected' : ''}>OK</option>
                            <option value="NG" ${rowData.using_round_bar === 'NG' ? 'selected' : ''}>NG</option>
                        </select>
                    </td>
                    <th>Using Bare Hands:</th>
                    <td>
                        <select name="using_bare_hands" class="form-control">
                            <option value="OK" ${rowData.using_bare_hands === 'OK' ? 'selected' : ''}>OK</option>
                            <option value="NG" ${rowData.using_bare_hands === 'NG' ? 'selected' : ''}>NG</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Inner Diameter Tolerance Plus:</th>
                    <td><input type="text" name="i_tolerance_plus" value="${rowData.i_tolerance_plus}" class="form-control" readonly></td>
                    <th>Inner Diameter Tolerance Minus:</th>
                    <td><input type="text" name="i_tolerance_minus" value="${rowData.i_tolerance_minus}" class="form-control" readonly></td>
                </tr>
                <tr>
                    <th>Inner Diameter Start:</th>
                    <td><input type="text" name="i_diameter_start" value="${rowData.i_diameter_start}" class="form-control"></td>
                    <th>Inner Diameter End:</th>
                    <td><input type="text" name="i_diameter_end" value="${rowData.i_diameter_end}" class="form-control"></td>
                </tr>
                <tr>
                    <th>Outer Diameter Tolerance Plus:</th>
                    <td><input type="text" name="o_tolerance_plus" value="${rowData.o_tolerance_plus}" class="form-control" readonly></td>
                    <th>Outer Diameter Tolerance Minus:</th>
                    <td><input type="text" name="o_tolerance_minus" value="${rowData.o_tolerance_minus}" class="form-control" readonly></td>
                </tr>
                <tr>
                    <th>Outer Diameter Start:</th>
                    <td><input type="text" name="o_diameter_start" value="${rowData.o_diameter_start}" class="form-control"></td>
                    <th>Outer Diameter End:</th>
                    <td><input type="text" name="o_diameter_end" value="${rowData.o_diameter_end}" class="form-control"></td>
                </tr>
                <tr>
                    <th>W Tolerance + :</th>
                    <td><input type="text" name="w_tolerance_plus" value="${rowData.w_tolerance_plus}" class="form-control" readonly></td>
                    <th>W Tolerance - :</th>
                    <td><input type="text" name="w_tolerance_minus" value="${rowData.w_tolerance_minus}" class="form-control" readonly></td>
                </tr>
                <tr>
                    <th>Q1 Start:</th>
                    <td><input type="text" name="q1_start" value="${rowData.q1_start}" class="form-control" ></td>
                    <th>Q2 Start:</th>
                    <td><input type="text" name="q2_start" value="${rowData.q2_start}" class="form-control" ></td>
                </tr>
                <tr>
                    <th>Q3 Start:</th>
                    <td><input type="text" name="q3_start" value="${rowData.q3_start}" class="form-control" ></td>
                    <th>Q4 Start:</th>
                    <td><input type="text" name="q4_start" value="${rowData.q4_start}" class="form-control" ></td>
                </tr>
                <tr>
                    <th>Q1 Middle:</th>
                    <td><input type="text" name="q1_middle" value="${rowData.q1_middle}" class="form-control" ></td>
                    <th>Q2 Middle:</th>
                    <td><input type="text" name="q2_middle" value="${rowData.q2_middle}" class="form-control" ></td>
                </tr>
                <tr>
                    <th>Q3 Middle:</th>
                    <td><input type="text" name="q3_middle" value="${rowData.q3_middle}" class="form-control" ></td>
                    <th>Q4 Middle:</th>
                    <td><input type="text" name="q4_middle" value="${rowData.q4_middle}" class="form-control" ></td>
                </tr>
                <tr>
                    <th>Q1 End:</th>
                    <td><input type="text" name="q1_end" value="${rowData.q1_end}" class="form-control" ></td>
                    <th>Q2 End:</th>
                    <td><input type="text" name="q2_end" value="${rowData.q2_end}" class="form-control" ></td>
                </tr>
                <tr>
                    <th>Q3 End:</th>
                    <td><input type="text" name="q3_end" value="${rowData.q3_end}" class="form-control" ></td>
                    <th>Q4 End:</th>
                    <td><input type="text" name="q4_end" value="${rowData.q4_end}" class="form-control" ></td>
                </tr>
                <tr>
                    <th>Defect Type:</th>
                    <td><input type="text" name="defect_type" value="${rowData.defect_type}" class="form-control"></td>
                    <th>NG Quantity:</th>
                    <td><input type="text" name="ng_quantity" value="${rowData.ng_quantity}" class="form-control"></td>
                </tr>
                <tr>
                    <th>Appearance Judgement:</th>
                    <td>
                        <select name="appearance_judgement" class="form-control">
                            <option value="OK" ${rowData.appearance_judgement === 'OK' ? 'selected' : ''}>OK</option>
                            <option value="NG" ${rowData.appearance_judgement === 'NG' ? 'selected' : ''}>NG</option>
                        </select>
                    </td>
                    <th>Dimension Judgement:</th>
                    <td>
                        <select name="dimension_judgement" class="form-control">
                            <option value="OK" ${rowData.dimension_judgement === 'OK' ? 'selected' : ''}>OK</option>
                            <option value="NG" ${rowData.dimension_judgement === 'NG' ? 'selected' : ''}>NG</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Confirm By:</th>
                    <td><input type="text" name="confirm_by" value="${rowData.confirm_by}" class="form-control"></td>
                    <th>Inspector's Remarks:</th>
                    <td colspan="3"><textarea name="remarks" class="form-control">${rowData.remarks}</textarea></td>
                </tr>
                </tbody>
            </table>
        </form>
    `;

        modalBody.innerHTML = modalContent;
        const dataModal = new bootstrap.Modal(document.getElementById('dataModal'));
        dataModal.show();
    }
    function saveInspectionDetails() {
        // Get the form data
        const form = document.getElementById('inspectionForm');
        const formData = new FormData(form);

        // Validate form fields (check if any required fields are empty)
        let formIsValid = true;
        form.querySelectorAll('.form-control').forEach(input => {
            if (input.value.trim() === '' && !input.readOnly) { // Check for non-read only empty fields
                formIsValid = false;
                input.classList.add('is-invalid'); // Optionally add a visual indicator for the user
            } else {
                input.classList.remove('is-invalid');
            }
        });

        if (!formIsValid) {

            Swal.fire({
                icon: 'warning',
                title: 'Validation Error',
                text: 'Please fill out all required fields.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
            return;
        }

        // Send data to server using fetch
        fetch('../../process/data_update.php', {
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
                    icon: 'success',
                    title: 'Success!',
                    text: 'Data saved successfully.',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload(); // Reload page after save
                    }
                });
            })
            .catch(error => {
                console.error('Error:', error);
                // Show error message using SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'There was an error saving the data.',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });
            });
    }

</script>

