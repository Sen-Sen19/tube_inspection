<?php
// Include SQL Server connection
require_once('conn3.php');

// Include TCPDF library
require_once('tcpdf/tcpdf.php');

// Function to fetch data from database
function fetchDataFromDatabase($conn) {
    $query = "SELECT * FROM your_table_name"; // Replace with your actual table name
    $stmt = sqlsrv_query($conn, $query);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    
    $data = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $data[] = $row;
    }
    sqlsrv_free_stmt($stmt);
    
    return $data;
}

// Fetch data from database
$data = fetchDataFromDatabase($conn);

// Initialize TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('COT Report Export');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('dejavusans', '', 10);

// Table header
$html = '
<table border="1">
  <thead>
    <tr>
      <th>#</th>
      <th>Part Name</th>
      <th>Process</th>
      <th>Lot No.</th>
      <th>Serial No.</th>
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
  <tbody>';

// Table body
foreach ($data as $index => $row) {
    $html .= '<tr>';
    $html .= '<td>' . ($index + 1) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Part Name']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Process']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Lot No.']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Serial No.']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Quantity']) . '</td>';
    $html .= '<td>' . htmlspecialchars(formatDateTime($row['Time Start'])) . '</td>';
    $html .= '<td>' . htmlspecialchars(formatDateTime($row['Time End'])) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Inspected By']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Shift']) . '</td>';
    $html .= '<td>' . htmlspecialchars(formatDate($row['Inspection Date'])) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Total Minutes']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Outside Appearance']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Slit Condition']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Inside Appearance']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Color']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['I Tolerance +']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['I Tolerance -']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['I Diameter Start']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['I Diameter End']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['O Tolerance +']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['O Tolerance -']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['O Diameter Start']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['O Diameter End']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['W Tolerance +']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['W Tolerance -']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Q1 Start']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Q2 Start']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Q3 Start']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Q4 Start']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Q1 Middle']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Q2 Middle']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Q3 Middle']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Q4 Middle']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Q1 End']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Q2 End']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Q3 End']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Q4 End']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Using Round Bar']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Using Bare Hands']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Appearance Judgement']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Dimension Judgement']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['NG Quantity']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Defect Type']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Confirm By']) . '</td>';
    $html .= '<td>' . htmlspecialchars($row['Remarks']) . '</td>';
    $html .= '</tr>';
}

$html .= '
  </tbody>
</table>';

// Print table
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('COT_Report.pdf', 'I');
?>
