<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/pvc_bar.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Export </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Export</li>
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
                              
                            <div class="col-6 col-sm-3 ">
                                    <label style="font-weight: normal; margin-bottom:6%; padding: 0; color: #000; font-weight: bold;">Date From</label>
                                    <input type="date" name="date_from" class="form-control form-control-sm" id="date_from">
                                </div>
                                <div class="col-6 col-sm-3 ">
                                    <label style="font-weight: normal;margin-bottom:6%; padding: 0; color: #000; font-weight: bold;">Date To</label>
                                    <input type="date" name="date_to" class="form-control form-control-sm" id="date_to">
                                </div>
                                <div class="col-6 col-sm-2 ">
                                    <label style="font-weight: normal;margin-bottom:9%; padding: 0; color: #000; font-weight: bold; visibility:hidden">Search</label>
                                    <button class="btn btn-primary btn-block btn-sm" id="searchBtn">
                                        <i class="fas fa-search"></i> Search
                                    </button>
                                </div>
                                <div class="col-6 col-sm-2 ">
                                    <label style="font-weight: normal; margin-bottom:9%; padding: 0; color: #000; font-weight: bold; visibility:hidden">CSV</label>
                                    <button class="btn btn-warning btn-block btn-sm" id="exportReqBtn" onclick="exportTable()" style="background-color:#888484; border-color:#888484; color:white;">
                                        <i class="fas fa-file-export mr-2"></i> Export to CSV
                                    </button>
                                </div>
                                <div class="col-6 col-sm-2 ">
                                    <label style="font-weight: normal; margin-bottom:9%; padding: 0; color: #000; font-weight: bold; visibility:hidden">Refresh</label>
                                    <button class="btn btn-info btn-block btn-sm" id="refreshPageBtn" onclick="refreshPage()" style="background-color:#f8f100; border-color:#cbc500; color:black;">
                                        <i class="fas fa-sync-alt mr-2"></i> Refresh Page
                                    </button>
                                </div>
                            </div>
                            <div id="accounts_table_res" class="table-responsive" style="height: 60vh; overflow: auto; display: inline-block; margin-top: 50px; border-top: 1px solid gray;">
                                <table id="export_pvcdb" class="table table-sm table-head-fixed text-nowrap table-hover">
                                    <thead style="text-align: center;">
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
                                    <tbody id="export_pvcdb_body" style="text-align: center; padding:20px;">
                                        <!-- Data will be inserted here -->
                                    </tbody>
                                </table>
                            </div>
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
    // Set default date values to today's date
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('date_from').value = today;
    document.getElementById('date_to').value = today;

    // Event listener for Search button
    const searchBtn = document.getElementById('searchBtn');
    searchBtn.addEventListener('click', () => {
        const dateFrom = document.getElementById('date_from').value;
        const dateTo = document.getElementById('date_to').value;

        let url = `../../process/pvc_export_viewer.php?date_from=${dateFrom}&date_to=${dateTo}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Clear existing table rows if any
                const tableBody = document.getElementById('export_pvcdb_body');
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
                        <td>${formatCell(row.time_start)}</td>
                        <td>${formatCell(row.time_end)}</td>
                        <td>${formatCell(row.inspected_by)}</td>
                        <td>${formatCell(row.shift)}</td>
                        <td>${formatCell(row.inspection_date)}</td>
                        <td>${formatCell(row.total_mins)}</td>
                        <td>${formatCell(row.outside_appearance)}</td>
                     
                        <td>${formatCell(row.inside_appearance)}</td>
                        <td>${formatCell(row.color)}</td>
                         <td>${formatCell(row.i_tolerance_plus)}</td>
                        <td>${formatCell(row.i_tolerance_minus)}</td>
                        <td>${formatCell(row.i_diameter_start)}</td>
                        <td>${formatCell(row.i_diameter_end)}</td>
                      
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

// Formatting functions
function formatDateTime(dateTimeStr) {
    return dateTimeStr ? new Date(dateTimeStr).toLocaleString() : 'N/A';
}

function formatDate(dateStr) {
    return dateStr ? new Date(dateStr).toLocaleDateString() : 'N/A';
}

function formatCell(value) {
    return value ? value : 'N/A';
}

 
    // Event listener for Export button
    const exportBtn = document.getElementById('exportReqBtn');
    exportBtn.addEventListener('click', () => {
        // Call the exportTable function
        exportTable();
    });

    // Function to export table data to CSV
    function exportTable() {
        const table = document.getElementById('export_pvcdb');
        const rows = Array.from(table.rows);

        // Extract headers
        const headers = rows[0].cells;
        const headerRow = [];
        for (let header of headers) {
            headerRow.push(header.textContent);
        }

        // Extract rows
        const csvContent = [];
        csvContent.push(headerRow.join(','));

        for (let i = 1; i < rows.length; i++) {
            const cells = rows[i].cells;
            const row = [];
            for (let cell of cells) {
                row.push(cell.textContent);
            }
            csvContent.push(row.join(','));
        }

        const csvBlob = new Blob([csvContent.join('\n')], { type: 'text/csv' });
        const csvUrl = URL.createObjectURL(csvBlob);

        const a = document.createElement('a');
        a.href = csvUrl;
        a.download = `PVC_${new Date().toISOString().split('T')[0]}.csv`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }

    // Function to refresh the page
    const refreshBtn = document.getElementById('refreshPageBtn');
    refreshBtn.addEventListener('click', () => {
        refreshPage();
    });

    // Function to refresh the page
    function refreshPage() {
        location.reload();
    }
});
</script>




<?php include 'plugins/sp_footer.php'; ?>