<?php include 'plugins/navbar.php'; ?>
    <?php include 'plugins/sidebar/pvc_bar.php'; ?>
    <script type="text/javascript" src="../../plugins/sweetalert2/dist/sweetalert2.min.js"></script>


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
                                <i class="nav-icon fas fa-play-circle"></i> Start Point
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
        <option value="N/A">N/A</option>
        <option value="Hole">Hole</option>
        <option value="Scratch">Scratch</option>
        <option value="Deformed">Deformed</option>
        <option value="Rough surface">Rough surface</option>
        <option value="Bubbles on surface">Bubbles on surface</option>
        <option value="Unstable thickness">Unstable thickness</option>
        <option value="Big Diameter">Big Diameter</option>
        <option value="Small Diameter">Small Diameter</option>
        <option value="Wrinkled on surface">Wrinkled on surface</option>
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
                                <table id="sp_pvcdb" class="table table-sm table-head-fixed text-nowrap table-hover">
                                    <thead style="text-align: center;">
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
                                            <th>Inside Appearance</th>
                                            <th>Color</th>
                                            <th>I Tolerance +</th>
                                            <th>I Tolerance -</th>
                                            <th>I Diameter Start</th>
                                            <th>I Diameter End</th>
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
                                            <th>Appearance Judgement</th>
                                            <th>Dimension Judgement</th>
                                            <th>NG Quantity</th>
                                            <th>Defect Type</th>
                                            <th>Confirm By</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sp_pvcdb_body" style="text-align: center; padding:20px;">
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

    loadTableData(offset, limit);

    document.getElementById('btnLoadMore').addEventListener('click', () => {
        offset += limit;
        loadTableData(offset, limit);
    });

    document.getElementById('accounts_table_res').addEventListener('scroll', () => {
        const container = document.getElementById('accounts_table_res');
        if (container.scrollTop + container.clientHeight >= container.scrollHeight) {
            offset += limit;
            loadTableData(offset, limit);
        }
    });

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

    const url = `../../process/pvc_sp_get_data.php?offset=${offset}&limit=${limit}&partName=${partName}&inspectedBy=${inspectedBy}&defectType=${defectType}&dateFrom=${dateFrom}&dateTo=${dateTo}`;

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (reset) {
                document.getElementById('sp_pvcdb_body').innerHTML = ''; 
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
    const tbody = document.getElementById('sp_pvcdb_body');

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
           
            <td>${row.inside_appearance}</td>
            <td>${row.color}</td>
            <td>${row.i_tolerance_plus}</td>
            <td>${row.i_tolerance_minus}</td>
            <td>${row.i_diameter_start}</td>
            <td>${row.i_diameter_end}</td>
           
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
    fetch('../../process/pvc_get_part_names.php')
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
    const filename = `PVC_Start_Point_${currentDate}.csv`;

    // Construct the URL with search parameters
    const url = `../../process/pvc_sp_export_data.php?partName=${encodeURIComponent(partName)}&inspectedBy=${encodeURIComponent(inspectedBy)}&defectType=${encodeURIComponent(defectType)}&dateFrom=${encodeURIComponent(dateFrom)}&dateTo=${encodeURIComponent(dateTo)}`;

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


</script>

<?php include 'plugins/sp_footer.php'; ?>
<?php include 'plugins/js/pvc_sp_script.php'; ?>
