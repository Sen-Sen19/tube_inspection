<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/cot_bar.php'; ?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Start Point</h1>
                </div>
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
                <label style="font-weight: normal; margin-bottom:6%; padding: 0; color: #000; font-weight: bold;">Date From</label>
                <input type="date" name="date_from" class="form-control form-control-sm" id="date_from">
            </div>
            <div class="col-md-2 mb-2">
                <label style="font-weight: normal;margin-bottom:6%; padding: 0; color: #000; font-weight: bold;">Date To</label>
                <input type="date" name="date_to" class="form-control form-control-sm" id="date_to">
            </div>
            <div class="col-md-2 mb-2">
                <label style="font-weight: normal;margin-bottom:6%; padding: 0; color: #000; font-weight: bold; visibility:hidden">Date To</label>
                <button class="btn btn-primary btn-block btn-sm" id="searchBtn">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
            <div class="col-md-2 mb-2">
                <label style="font-weight: normal; margin-bottom:6%; padding: 0; color: #000; font-weight: bold; visibility:hidden">Date To</label>
                <button class="btn btn-warning btn-block btn-sm" id="exportReqBtn" onclick="exportTable()">
                    <i class="fas fa-file-export mr-2"></i> Export to CSV
                </button>
            </div>
            <div class="col-md-2 mb-2">
                <label style="font-weight: normal; margin-bottom:6%; padding: 0; color: #000; font-weight: bold; visibility:hidden">Date To</label>
                <button class="btn btn-danger btn-block btn-sm" id="exportReqBtn" onclick="exportToPDF()">
                    <i class="fas fa-file-pdf mr-2"></i> Export to PDF
                </button>
            </div>
        </div>
    </div>
    </section>

    <div id="accounts_table_res" class="table-responsive"
        style="height: 60vh; overflow: auto; display: inline-block; margin-top: 50px; border-top: 1px solid gray;">
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
                        <td>${formatCell(row.i_tol_plus)}</td>
                        <td>${formatCell(row.i_tol_minus)}</td>
                        <td>${formatCell(row.i_diameter_start)}</td>
                        <td>${formatCell(row.i_diameter_end)}</td>
                        <td>${formatCell(row.o_tol_plus)}</td>
                        <td>${formatCell(row.o_tol_minus)}</td>
                        <td>${formatCell(row.o_diameter_start)}</td>
                        <td>${formatCell(row.o_diameter_end)}</td>
                        <td>${formatCell(row.w_tol_plus)}</td>
                        <td>${formatCell(row.w_tol_minus)}</td>
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
                        <td>${formatCell(row.appearance_judgment)}</td>
                        <td>${formatCell(row.dimension_judgment)}</td>
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

// Export to CSV
function exportTable() {
    const table = document.getElementById("export_cotdb");
    const rows = table.querySelectorAll("tr");

    let csvContent = "";
    rows.forEach((row) => {
        const cells = row.querySelectorAll("td, th");
        const rowContent = Array.from(cells)
            .map((cell) => `"${cell.textContent}"`)
            .join(",");
        csvContent += rowContent + "\n";
    });

    const date = new Date();
    const fileName = `COT_${date.toISOString().slice(0, 10)}.csv`;
    const blob = new Blob([csvContent], { type: "text/csv" });

    const link = document.createElement("a");
    link.href = URL.createObjectURL(blob);
    link.download = fileName;
    link.click();
}

function exportToPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('p', 'mm', 'a4'); 


    const logo = new Image();
    logo.src = '../../dist/img/R.jpg';
    const logoWidth = 60; 
    const logoHeight = 15; 
    const logoX = 10; 
    const logoY = 10; 
    doc.addImage(logo, 'PNG', logoX, logoY, logoWidth, logoHeight);

    // Title
    const titleText = 'COT/PVC Tube Inspection Record';
    const titleFontSize = 12;
    const titleWidth = doc.getStringUnitWidth(titleText) * titleFontSize / doc.internal.scaleFactor;
    const titleX = (doc.internal.pageSize.width - titleWidth) / 2;
    const titleY = 23;


    doc.setFont('helvetica', 'bold');
    doc.setFontSize(titleFontSize);
    doc.text(titleText, titleX, titleY);

   
    doc.setFont('helvetica', 'normal');

    // Page Number
    const pageNumberText = 'Page________';
    const pageNumberX = logoX + logoWidth - 55; 
    const pageNumberY = logoY + logoHeight + 10; 
    doc.setFontSize(8);
    doc.text(pageNumberText, pageNumberX, pageNumberY);


    
doc.text('[  ] Normal Process       [  ] Re-Checking',76, 35); 

 
    const allCells = [
        { text: 'Insp Date & Shift:', width: 25, height: 6, top: 42, right: 40 },
        { text: 'Inspected By:', width: 25, height: 6, top: 48, right: 40 },
        { text: 'Machine No.:', width: 25, height: 6, top: 54, right: 40 },
        { text: 'Measuring Tools', width: 25, height: 6, top: 60, right: 40 },
        { text: 'Measuring Tools\nSerial No.', width: 25, height: 6, top: 66, right: 40 },
        { text: '', width: 55, height: 6, top: 42, right: 95 },
        { text: '', width: 55, height: 6, top: 48, right: 95 },
        { text: '', width: 55, height: 6, top: 54, right: 95 },
        { text: '', width: 18.3333333, height: 6, top: 60, right: 58.5 },
        { text: '', width: 18.3333333, height: 6, top: 60, right: 76.8 },
        { text: '', width: 18.3333333, height: 6, top: 60, right: 95 },
        { text: '', width: 18.3333333, height: 6, top: 66, right: 58.5 },
        { text: '', width: 18.3333333, height: 6, top: 66, right: 76.8 },
        { text: '', width: 18.3333333, height: 6, top: 66, right: 95 },
        { text: 'Total QTY:', width: 25, height: 6, top: 42, right: 120 },
        { text: 'Total insp QTY:', width: 25, height: 6, top: 48, right: 120 },
        { text: 'Total NG QTY:', width: 25, height: 6, top: 54, right: 120 },
        { text: 'NG%:', width: 25, height: 6, top: 60, right: 120 },
        { text: 'Total insp Time:', width: 25, height: 6, top: 66, right: 120 },
        { text: '', width: 30, height: 6, top: 42, right: 150 },
        { text: '', width: 30, height: 6, top: 48, right: 150 },
        { text: '', width: 30, height: 6, top: 54, right: 150 },
        { text: '', width: 30, height: 6, top: 60, right: 150 },
        { text: '', width: 30, height: 6, top: 66, right: 150 },
        { text: 'Approved By:', width: 20, height: 6, top: 42, right: 170 },
        { text: '', width: 20, height: 24, top: 48, right: 170 },
        { text: 'Checked By:', width: 20, height: 6, top: 42, right: 190 },
        { text: '', width: 20, height: 24, top: 48, right: 190 },


        

        { text: 'Appearance:', width: 77.5, height: 6, top: 75, right: 92.5 },
        { text: 'Dimension:', width: 77.5, height: 6, top: 75, right: 170 },
        { text: 'Judgement', width: 20, height: 18, top: 75, right: 190 },
        { text:'', width: 20, height: 12, top: 93, right: 190 },
        { text:'', width: 20, height: 12, top: 105, right: 190 },
        { text: '', width: 5, height: 12, top: 81, right: 20 },
        { text: 'S', width: 5, height: 12, top: 93, right: 20 },
        { text: 'E', width: 5, height: 12, top: 105, right: 20 },
        
        { text: 'PartName', width: 15, height: 12, top: 81, right: 35 },
        { id: 'Partsname', width: 15, height: 12, top: 93, right: 35 },
        { text: '', width: 15, height: 12, top: 105, right: 35 },
        { text: 'Inpection Time', width: 22, height: 6, top: 81, right: 57 },
        { text: 'Start', width: 11, height: 6, top: 87, right: 46 },
        { text: 'End', width: 11, height: 6, top: 87, right: 57 },
        { text:'QTY(m)', width: 12, height: 12, top: 81, right: 69 },
        { text:'Visual', width: 15.6, height: 6, top: 81, right: 84.6 },
        { text:'Color', width: 7.8, height: 12, top: 81, right: 92.5 },
        { text: 'Start', width: 7.8, height: 6, top: 87, right: 76.8 },
        { text: 'End', width: 7.8, height: 6, top: 87, right: 84.6 },
        { text: '', width: 11, height: 12, top: 93, right: 46 },
        { text: '', width: 11, height: 12, top: 93, right: 57 },
        { text: '', width: 11, height: 12, top: 105, right: 46 },
        { text: '', width: 11, height: 12, top: 105, right: 57 },
        { text:'', width: 12, height: 12, top: 93, right: 69 },
        { text:'', width: 12, height: 12, top: 105, right: 69 },
        { text: '', width: 7.8, height: 12, top:93, right: 76.8 },
        { text: '', width: 7.8, height: 12, top: 93, right: 84.6 },
        { text: '', width: 7.8, height: 12, top: 105, right: 76.8 },
        { text: '', width: 7.8, height: 12, top: 105, right: 84.6 },
        { text:'', width: 7.8, height: 12, top: 93, right: 92.5 },
        { text:'', width: 7.8, height: 12, top: 105, right: 92.5 },

{ text:'Inside MM', width: 12.5, height: 12, top: 81, right: 105 },
{ text:'', width: 12.5, height: 12, top: 93, right: 105 },
{ text:'', width: 12.5, height: 12, top: 105, right: 105 },
{ text:'Outside MM', width: 12.5, height: 12, top: 81, right: 117.5 },
{ text:'', width: 12.5, height: 12, top: 93, right: 117.5 },
{ text:'', width: 12.5, height: 12, top: 105, right: 117.5 },
{ text:'\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0Wall Thickness (mm)\n\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0Specs: [                                   ]', width: 52.5, height: 12, top: 81, right: 170 },
{ text: 'Start Point pt.1', width: 17.5, height: 4, top: 93, right: 135 },
{ text: '', width: 4.3, height: 4, top: 97, right: 121.8 },
{ text: '', width: 4.3, height:4, top: 97, right: 126.1 },
{ text: '', width: 4.3, height: 4, top: 97, right: 130.4 },
{ text: '', width: 4.5, height: 4, top: 97, right: 135 },
{ text: '', width: 4.3, height: 4, top: 101, right: 121.8 },
{ text: '', width: 4.3, height:4, top: 101, right: 126.1 },
{ text: '', width: 4.3, height: 4, top: 101, right: 130.4 },
{ text: '', width: 4.5, height: 4, top: 101, right: 135 },        
{ text: 'Middle Point pt.2', width: 17.5, height: 4, top: 93, right: 152.5 },
{ text: '', width: 4.3, height: 4, top: 97, right: 139.3 },
{ text: '', width: 4.3, height: 4, top: 97, right: 143.6 },
{ text: '', width: 4.3, height: 4, top: 97, right: 147.9 },
{ text: '', width: 4.5, height: 4, top: 97, right: 152.5 },
{ text: '', width: 4.3, height: 4, top: 101, right: 139.3 },
{ text: '', width: 4.3, height: 4, top: 101, right: 143.6 },
{ text: '', width: 4.3, height: 4, top: 101, right: 147.9 },
{ text: '', width: 4.5, height: 4, top: 101, right: 152.5 },
{ text: 'End Point pt.3', width: 17.5, height: 4, top: 93, right: 170 },
{ text: '', width: 4.3, height: 4, top: 97, right: 156.8},
{ text: '', width: 4.3, height: 4, top: 97, right: 161.1 },
{ text: '', width: 4.3, height: 4 ,top: 97, right: 165.4 },
{ text: '', width: 4.5, height: 4, top: 97, right: 169.9 },
{ text: '', width: 4.3, height: 4, top: 101, right: 156.8},
{ text: '', width: 4.3, height: 4, top: 101, right: 161.1 },
{ text: '', width: 4.3, height: 4 ,top: 101, right: 165.4 },
{ text: '', width: 4.5, height: 4, top: 101, right: 169.9 },
{ text: 'Start Point pt.1', width: 26.25, height: 4, top: 105, right: 143.7 },
{ text: '', width: 6.5, height: 4, top: 109, right: 124},
{ text: '', width: 6.5, height: 4, top: 109, right: 130.5 },
{ text: '', width: 6.5, height: 4 ,top: 109, right: 137 },
{ text: '', width: 6.7, height: 4, top: 109, right: 143.7 },
{ text: '', width: 6.5, height: 4, top: 113, right: 124},
{ text: '', width: 6.5, height: 4, top: 113, right: 130.5 },
{ text: '', width: 6.5, height: 4 ,top: 113, right: 137 },
{ text: '', width: 6.7, height: 4, top: 113, right: 143.7 },
{ text: 'End Point pt.2', width: 26.25, height: 4, top: 105, right: 169.95},
{ text: '', width: 6.5, height: 4, top: 109, right: 150.2},
{ text: '', width: 6.5, height: 4, top: 109, right: 156.7 },
{ text: '', width: 6.5, height: 4 ,top: 109, right: 163.2},
{ text: '', width: 6.7, height: 4, top: 109, right: 169.9 },
{ text: '', width: 6.5, height: 4, top: 113, right: 150.2},
{ text: '', width: 6.5, height: 4, top: 113, right: 156.7 },
{ text: '', width: 6.5, height: 4 ,top: 113, right: 163.2 },
{ text: '', width: 6.7, height: 4, top: 113, right: 169.9},



{ text: 'Appearance', width: 175, height: 6, top: 120, right:  190},
{ text: 'RN', width: 5, height: 12, top: 126, right: 20 },
{ text: 'PartName', width: 15, height: 12, top: 126, right: 35 },
{ text: 'Inspection\nTime', width: 14, height: 6, top: 126, right: 49 },

{ text: 'Start', width: 7, height: 6, top: 132, right: 42 },
{ text: 'End', width: 7, height: 6, top: 132, right: 49 },

{ text: 'Lot No.', width: 15, height: 12, top: 126, right: 64 },
{ text: 'Serial\nNo.', width: 8, height: 12, top: 126, right: 72 },
{ text: 'Quantity (m)', width: 14, height: 12, top: 126, right: 86 },
{ text: 'NG QTY(m)', width: 14, height: 12, top: 126, right: 100 },
{ text: 'Visual', width: 15, height: 6, top: 126, right: 115 },


{ text: 'Start', width: 7.5, height: 6, top: 132, right: 107.5 },
{ text: 'End', width: 7.5, height: 6, top: 132, right: 115 },

{ text: 'Color', width: 15, height: 12, top: 126, right: 130 },
{ text: 'Tube Breaking', width: 15, height: 12, top: 126, right: 145 },
{ text: 'Judgement', width: 15, height: 12, top: 126, right: 160 },
{ text: 'Type of Defect', width: 15, height: 12, top: 126, right: 175 },
{ text: 'Defect\nConfirmed by', width: 15, height: 12, top: 126, right: 190 },



{ text: '1', width: 5, height: 6, top: 138, right: 20 },
{ text: '', width: 15, height: 6, top: 138, right: 35 },


{ text: '', width: 7, height: 6, top: 138, right: 42 },
{ text: '', width: 7, height: 6, top: 138, right: 49 },

{ text: '', width: 15, height: 6, top: 138, right: 64 },
{ text: '', width: 8, height: 6, top: 138, right: 72 },
{ text: '', width: 14, height: 6, top: 138, right: 86 },
{ text: '', width: 14, height: 6, top: 138, right: 100 },
{ text: '', width: 15, height: 6, top: 138, right: 115 },


{ text: '', width: 7.5, height: 6, top: 138, right: 107.5 },
{ text: '', width: 7.5, height: 6, top: 138, right: 115 },

{ text: '', width: 15, height: 6, top: 138, right: 130 },
{ text: '', width: 15, height: 6, top: 138, right: 145 },
{ text: '', width: 15, height: 6, top: 138, right: 160 },
{ text: '', width: 15, height: 6, top: 138, right: 175 },
{ text: '', width: 15, height: 6, top: 138, right: 190 },
    ];

    // Iterate through allCells array
    allCells.forEach((cell) => {
        // Draw cell outline
        doc.rect(cell.right - cell.width, cell.top, cell.width, cell.height);

        // Set font size for text inside the cell
        doc.setFontSize(5); // Adjust as needed

        // Add text inside the cell
        const textX = cell.right - cell.width + 2; // X coordinate for the text (leave a small margin)
        const textY = cell.top + cell.height / 2; // Y coordinate for vertically centering the text
        doc.text(cell.text, textX, textY);
    });

    // Save the PDF
    doc.save('Custom_Cells_' + new Date().toLocaleDateString() + '.pdf');
}


</script>




<?php include 'plugins/sp_footer.php'; ?>