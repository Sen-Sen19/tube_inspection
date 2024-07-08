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
                                <i class="nav-icon fas fa-file-export"></i> Export
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
    <div class="row">
        <div class="col-md-4 mb-4">
            <label for="partName">Part Name</label>
            <select class="form-control" id="partName">
                <option value="">Choose...</option>
            </select>
        </div>

        <div class="col-md-4 mb-4">
        <label for="search" style="visibility: hidden;"> Search</label>
        <button class="btn btn-primary btn-block btn-sm" id="searchBtn">
    <i class="fas fa-search"></i> Search
</button>

        </div>

        <div class="col-md-2 mb-4">
        <label for="export"style="visibility: hidden;">Export</label>
            <button class="btn btn-warning btn-block btn-sm" id="exportReqBtn" onclick="exportTable()">
                <i class="fas fa-file-export mr-2"></i>Export
            </button>
        </div>
        <div class="col-md-2 mb-4">
        <label for="export"style="visibility: hidden;">PIDS PDF</label>
            <button class="btn btn-danger btn-block btn-sm" id="exportReqBtn" onclick="exportTable()">
                <i class="fas fa-file-pdf mr-2"></i>PIDS PDF
            </button>
        </div>
    </div>
</div>







                            <div id="accounts_table_res" class="table-responsive"
                                style="height: 45vh; overflow: auto; display: inline-block; margin-top: 50px; border-top: 1px solid gray;">
                                <table id="export_cotdb" class="table table-sm table-head-fixed text-nowrap table-hover">
                                    <thead style="text-align: center;">
                                        <!-- Table Headers -->
                                        <tr>
                                            <th>#</th>
                                            <th>Part Name</th>
                                            <th>Process</th>
                                            <th>Lot No.</th>
                                            <th>Serial No</th>

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
                                    <tbody id="export_cotdb_body" style="text-align: center; padding:20px;">
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
    // Fetch and populate part names dropdown
    fetch('../../process/cot_get_part_names.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const partNameSelect = document.getElementById('partName');
            data.forEach(part => {
                const option = document.createElement('option');
                option.value = part.part_name;
                option.textContent = part.part_name;
                partNameSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching part names:', error));

    // Fetch and populate table data
    fetch('../../process/cot_export_viewer.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const tableBody = document.getElementById('export_cotdb_body');
            tableBody.innerHTML = ''; // Clear existing rows

            // Ensure data is an array before iterating
            if (!Array.isArray(data)) {
                throw new Error('Expected array, received:', typeof data);
            }

            data.forEach((row, index) => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${row.part_name}</td>
                        <td>${row.Process}</td>
                    <td>${row.lot_no}</td>
                    <td>${row.serial_no}</td>
                    <td>${row.quantity}</td>
                    <td>${row.time_start}</td>
                    <td>${row.time_end}</td>
                    <td>${row.inspected_by}</td>
                    <td>${row.shift}</td>
                    <td>${row.inspection_date}</td>
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
                tableBody.appendChild(tr);
            });
        })
        .catch(error => console.error('Error fetching or processing table data:', error));
});

// Function to format date/time
function formatDateTime(dateTimeStr) {
    if (!dateTimeStr) return ''; // Handle null or undefined values

    const date = new Date(dateTimeStr);
    return date.toLocaleString(); // Adjust format as needed
}

// Function to format date
function formatDate(dateStr) {
    if (!dateStr) return ''; // Handle null or undefined values

    const date = new Date(dateStr);
    return date.toLocaleDateString(); // Adjust format as needed
}


</script>


<?php include 'plugins/sp_footer.php'; ?>