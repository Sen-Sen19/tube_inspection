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
            <div class="col-md-2 mb-2">
                <label for="partName">Part Name</label>
                <select class="form-control" id="partName">
                    <option value="">Choose...</option>
                </select>
            </div>
            <div class="col-md-2 mb-2">
                <label style="font-weight: normal; margin: 0; padding: 0; color: #000; font-weight: bold;">Date From</label>
                <input type="date" name="date_from" class="form-control form-control-sm" id="date_from">
            </div>
            <div class="col-md-2 mb-2">
                <label style="font-weight: normal; margin: 0; padding: 0; color: #000; font-weight: bold;">Date To</label>
                <input type="date" name="date_to" class="form-control form-control-sm" id="date_to">
            </div>
            <div class="col-md-2 mb-2">
            <label style="font-weight: normal; margin: 0; padding: 0; color: #000; font-weight: bold; visibility:hidden">Date To</label>
                <button class="btn btn-primary btn-block btn-sm" id="searchBtn">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
            <div class="col-md-2 mb-2">
            <label style="font-weight: normal; margin: 0; padding: 0; color: #000; font-weight: bold; visibility:hidden">Date To</label>
                <button class="btn btn-warning btn-block btn-sm" id="exportReqBtn" onclick="exportTable()">
                    <i class="fas fa-file-export mr-2"></i> Export
                </button>
            </div>
            <div class="col-md-2 mb-2">
            <label style="font-weight: normal; margin: 0; padding: 0; color: #000; font-weight: bold; visibility:hidden">Date To</label>
            <button class="btn btn-danger btn-block btn-sm" id="exportReqBtn" onclick="exportToPDF()">
    <i class="fas fa-file-pdf mr-2"></i> PID PDF
</button>

            </div>
        </div>
    </div>
</section>



                            <div id="accounts_table_res" class="table-responsive"
                                style="height: 60vh; overflow: auto; display: inline-block; margin-top: 50px; border-top: 1px solid gray;">
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
                            <!-- <div class="d-flex justify-content-sm-center mt-3">
                                <button type="button" class="btn bg-gray-dark" id="btnLoadMore">Load more</button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.29/jspdf.plugin.autotable.min.js"></script>

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

    // Event listener for Search button
    const searchBtn = document.getElementById('searchBtn');
    searchBtn.addEventListener('click', () => {
        const partName = document.getElementById('partName').value;
        const dateFrom = document.getElementById('date_from').value;
        const dateTo = document.getElementById('date_to').value;

        let url = `../../process/cot_export_viewer.php?partName=${partName}`;

        // Append date parameters if they are provided
        if (dateFrom && dateTo) {
            url += `&date_from=${dateFrom}&date_to=${dateTo}`;
        }

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Clear existing table rows if any
                const tableBody = document.getElementById('export_cotdb_body');
                tableBody.innerHTML = '';

                // Populate table with fetched data
                data.forEach((row, index) => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${formatCell(row.part_name)}</td>
                        <td>${formatCell(row.Process)}</td>
                        <td>${formatCell(row.lot_no)}</td>
                        <td>${formatCell(row.serial_no)}</td>
                        <td>${formatCell(row.quantity)}</td>
                        <td>${formatDateTime(row.time_start)}</td>
                        <td>${formatDateTime(row.time_end)}</td>
                        <td>${formatCell(row.inspected_by)}</td>
                        <td>${formatCell(row.shift)}</td>
                        <td>${formatDate(row.inspection_date)}</td>
                        <td>${formatCell(row.total_mins)}</td>
                        <td>${formatCell(row.outside_appearance)}</td>
                        <td>${formatCell(row.slit_condition)}</td>
                        <td>${formatCell(row.inside_appearance)}</td>
                        <td>${formatCell(row.color)}</td>
                        <td>${formatCell(row.i_tolerance_plus)}</td>
                        <td>${formatCell(row.i_tolerance_minus)}</td>
                        <td>${formatCell(row.i_diameter_start)}</td>
                        <td>${formatCell(row.i_diameter_end)}</td>
                        <td>${formatCell(row.o_tolerance_plus)}</td>
                        <td>${formatCell(row.o_tolerance_minus)}</td>
                        <td>${formatCell(row.o_diameter_start)}</td>
                        <td>${formatCell(row.o_diameter_end)}</td>
                        <td>${formatCell(row.w_tolerance_plus)}</td>
                        <td>${formatCell(row.w_tolerance_minus)}</td>
                        <td>${formatCell(row.q1_start)}</td>
                        <td>${formatCell(row.q2_start)}</td>
                        <td>${formatCell(row.q3_start)}</td>
                        <td>${formatCell(row.q4_start)}</td>
                        <td>${formatCell(row.q1_middle)}</td>
                        <td>${formatCell(row.q2_middle)}</td>
                        <td>${formatCell(row.q3_middle)}</td>
                        <td>${formatCell(row.q4_middle)}</td>
                        <td>${formatCell(row.q1_end)}</td>
                        <td>${formatCell(row.q2_end)}</td>
                        <td>${formatCell(row.q3_end)}</td>
                        <td>${formatCell(row.q4_end)}</td>
                        <td>${formatCell(row.using_round_bar)}</td>
                        <td>${formatCell(row.using_bare_hands)}</td>
                        <td>${formatCell(row.appearance_judgement)}</td>
                        <td>${formatCell(row.dimension_judgement)}</td>
                        <td>${formatCell(row.ng_quantity)}</td>
                        <td>${formatCell(row.defect_type)}</td>
                        <td>${formatCell(row.confirm_by)}</td>
                        <td>${formatCell(row.remarks)}</td>
                    `;
                    tableBody.appendChild(tr);
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    });
});

// Function to export table data to CSV
function exportTable() {
    const table = document.getElementById('export_cotdb');
    const rows = table.querySelectorAll('tbody tr');
    const csv = [];

    // Construct CSV header from table headers
    const headers = Array.from(table.querySelectorAll('thead th')).map(th => th.textContent.trim());
    csv.push(headers.join(','));

    // Construct CSV rows from table rows
    rows.forEach(row => {
        const csvRow = [];
        Array.from(row.cells).forEach(cell => {
            csvRow.push(cell.textContent.trim().replace(/,/g, ''));
        });
        csv.push(csvRow.join(','));
    });

    // Create CSV content and initiate download
    const csvContent = csv.join('\n');
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });

    const link = document.createElement('a');
    const today = new Date();
    const dateString = `${today.getFullYear()}-${(today.getMonth() + 1).toString().padStart(2, '0')}-${today.getDate().toString().padStart(2, '0')}`;
    link.setAttribute('href', URL.createObjectURL(blob));
    link.setAttribute('download', `COT_${dateString}.csv`);
    link.style.visibility = 'hidden';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Function to format cell content
function formatCell(value) {
    return value ? value : 'N/A';
}

// Function to format date/time
function formatDateTime(dateTimeStr) {
    if (!dateTimeStr) return 'N/A'; // Handle null or undefined values

    const date = new Date(dateTimeStr);
    return date.toLocaleString(); // Adjust format as needed
}

// Function to format date
function formatDate(dateStr) {
    if (!dateStr) return 'N/A'; // Handle null or undefined values

    const date = new Date(dateStr);
    return date.toLocaleDateString(); // Adjust format as needed
}
</script>



<?php include 'plugins/sp_footer.php'; ?>