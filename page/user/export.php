<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>

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
                                <div class="col-6 col-sm-2 ">
                                    <label style="font-weight: normal; margin-bottom:6%; padding: 0; color: #000; font-weight: bold;">Date From</label>
                                    <input type="date" name="date_from" class="form-control form-control-sm" id="date_from">
                                </div>
                                <div class="col-6 col-sm-2 ">
                                    <label style="font-weight: normal;margin-bottom:6%; padding: 0; color: #000; font-weight: bold;">Date To</label>
                                    <input type="date" name="date_to" class="form-control form-control-sm" id="date_to">
                                </div>


                                <div class="col-6 col-sm-2 ">
                                <label style="font-weight: normal; margin-bottom:6%; padding: 0; color: #000; font-weight: bold;">Shift</label>
                                <select id="shift_select" class="form-control" name="shift" style="height: 31px; font-size: 14px;">
  <option value="" selected disabled>Choose...</option>
  <option value="Dayshift">Dayshift</option>
  <option value="Nightshift">Nightshift</option>
</select>


            </div>




                                <div class="col-6 col-sm-2 ">
                                    <label style="font-weight: normal;margin-bottom:6%; padding: 0; color: #000; font-weight: bold; visibility:hidden">Search</label>
                                    <button class="btn btn-primary btn-block btn-sm" id="searchBtn">
                                        <i class="fas fa-search"></i> Search
                                    </button>
                                </div>
                                <div class="col-6 col-sm-2 ">
                                    <label style="font-weight: normal; margin-bottom:6%; padding: 0; color: #000; font-weight: bold; visibility:hidden">CSV</label>
                                    <button class="btn btn-warning btn-block btn-sm" id="exportReqBtn" onclick="exportTable()" style="background-color:#888484; border-color:#888484; color:white;">
                                        <i class="fas fa-file-export mr-2"></i> Export
                                    </button>
                                </div>

                                <div class="col-6 col-sm-2 ">
                                    <label style="font-weight: normal; margin-bottom:6%; padding: 0; color:  #000; font-weight: bold; visibility:hidden">PIDS</label>
                                    <button class="btn btn-danger btn-block btn-sm" id="pidsBtn" onclick="exportCSV()" >
    <i class="fas fa-file-download"></i> PIDS
</button>

                                </div>


                               
                            </div>
                            <div id="accounts_table_res" class="table-responsive" style="height: 60vh; overflow: auto; display: inline-block; margin-top: 50px; border-top: 1px solid gray;">
                                <table id="export_cotdb" class="table table-sm table-head-fixed text-nowrap table-hover">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


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
        const shift = document.getElementById('shift_select').value; // Get selected shift

        let adjustedDateFrom = dateFrom;
        let adjustedDateTo = dateTo;

        if (shift === "Dayshift") {
            // For Dayshift, use the provided date range
            adjustedDateFrom = dateFrom + 'T06:00:00';
            adjustedDateTo = dateTo + 'T17:59:59';
        } else if (shift === "Nightshift") {
            // For Nightshift, adjust the date range to cover the night hours
            // The dateTo will be the next day
            adjustedDateFrom = dateFrom + 'T18:00:00';
            adjustedDateTo = new Date(new Date(dateTo).getTime() + 24 * 60 * 60 * 1000).toISOString().split('T')[0] + 'T05:59:59';
        }

        let url = `../../process/export_viewer.php?date_from=${adjustedDateFrom}&date_to=${adjustedDateTo}&shift=${shift}`;

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
                if (tableBody) {
                    tableBody.innerHTML = '';

                    // Populate table with fetched data
                    data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${index + 1}</td>
                            <td>${formatCell(row.part_name)}</td>
                            <td>${formatCell(row.process)}</td>
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
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    });

    // Event listener for Export button
    const exportBtn = document.getElementById('exportReqBtn');
    if (exportBtn) {
        exportBtn.addEventListener('click', exportTable);
    }

    // Event listener for PIDs button
    const pidsBtn = document.getElementById('pidsBtn');
    if (pidsBtn) {
        pidsBtn.addEventListener('click', exportCSV);
    }

    // Function to export table data to CSV
    function exportTable() {
        const table = document.getElementById('export_cotdb_body');

        if (!table) {
            console.error('Table not found!');
            return;
        }

        const rows = table.rows;
        if (!rows || rows.length === 0) {
            console.error('No rows found in the table!');
            return;
        }

        let csvContent = "";

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const cells = row.cells;

            if (!cells) {
                console.error('Cells not found in row ' + i);
                continue;
            }

            let rowContent = [];
            for (let j = 0; j < cells.length; j++) {
                const cell = cells[j];
                rowContent.push(cell.textContent.replace(/(\r\n|\n|\r)/gm, "").trim());
            }

            csvContent += rowContent.join(",") + "\n";
        }

        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement("a");
        if (link.download !== undefined) {
            const url = URL.createObjectURL(blob);
            link.setAttribute("href", url);
            link.setAttribute("download", "table_export.csv");
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }

    // Function to export aggregated data to CSV
    function exportCSV() {
        const dateFrom = document.getElementById('date_from').value;
        const dateTo = document.getElementById('date_to').value;

        let url = `../../process/export_viewer.php?date_from=${dateFrom}&date_to=${dateTo}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const aggregatedData = {};
                data.forEach(row => {
                    const partName = row.part_name || '';
                    const process = (row.process || '').trim();
                    const ngQuantity = parseInt(row.ng_quantity) || 0;
                    const totalMins = parseFloat(row.total_mins) || 0;
                    const remark = row.remarks || '';

                    if (aggregatedData[partName]) {
                        aggregatedData[partName].totalNG += ngQuantity;
                        aggregatedData[partName].totalMins += totalMins;
                        if (process === "Mass Production") {
                            aggregatedData[partName].count++;
                        }
                    } else {
                        aggregatedData[partName] = {
                            totalNG: ngQuantity,
                            totalMins: totalMins,
                            count: process === "Mass Production" ? 1 : 0,
                            remark: remark
                        };
                    }
                });

                let csvContent = "data:text/csv;charset=utf-8,";
                csvContent += "Item No,Part Name,Total Box/Roll,Total Part Qty,Total Inspected Qty,Total NG Detected, Ng %, Total Inspection Time,Frequency of Remark\n";

                let itemNo = 1;
                for (const partName in aggregatedData) {
                    const { totalNG, totalMins, count, remark } = aggregatedData[partName];
                    const formattedTime = totalMins.toFixed(2);
                    const formattedBoxRoll = count;

                    const rowContent = `${itemNo},${partName},${formattedBoxRoll},,,${totalNG},,${formattedTime},${remark}`;
                    csvContent += rowContent + "\n";

                    itemNo++;
                }

                const encodedUri = encodeURI(csvContent);
                const link = document.createElement("a");
                link.setAttribute("href", encodedUri);
                link.setAttribute("download", "aggregated_export.csv");
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    // Helper function to format cell content
    function formatCell(content) {
        return content !== null && content !== undefined ? content.toString().trim() : '';
    }
});

</script>


<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/export_script.php'; ?>