<?php
// Include the connection file
require_once 'conn3.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve and sanitize form data (sanitize as needed)
    // Example of basic sanitation, adjust as per your application's needs
   // Sanitize lot_no as a string
// Other parameters
$lot_no = filter_var($_POST['lot_no'], FILTER_SANITIZE_STRING);

$partName = filter_var($_POST['part_name'], FILTER_SANITIZE_STRING);
$quantity = intval($_POST['quantity']);
$timeStart = $_POST['time_start'];
$timeEnd = $_POST['time_end'];
$inspectedBy = filter_var($_POST['inspected_by'], FILTER_SANITIZE_STRING);
$shift = $_POST['shift'];
$inspectionDate = $_POST['inspection_date'];
$totalMins = floatval($_POST['total_mins']);
$outsideAppearance = $_POST['outside_appearance'];

$insideAppearance = $_POST['inside_appearance'];
$color = $_POST['color'];
$iTolerancePlus = floatval($_POST['i_tolerance_plus']);
$iToleranceMinus = floatval($_POST['i_tolerance_minus']);
$iDiameterStart = floatval($_POST['i_diameter_start']);
$iDiameterEnd = floatval($_POST['i_diameter_end']);

$wTolerancePlus = floatval($_POST['w_tolerance_plus']);
$wToleranceMinus = floatval($_POST['w_tolerance_minus']);
$q1Start = floatval($_POST['q1_start']);
$q2Start = floatval($_POST['q2_start']);
$q3Start = floatval($_POST['q3_start']);
$q4Start = floatval($_POST['q4_start']);
$q1End = floatval($_POST['q1_end']);
$q2End = floatval($_POST['q2_end']);
$q3End = floatval($_POST['q3_end']);
$q4End = floatval($_POST['q4_end']);
$serial_no = filter_var($_POST['serial_no'], FILTER_SANITIZE_STRING);

$appearanceJudgement = $_POST['appearance_judgement'];
$dimensionJudgement = $_POST['dimension_judgement'];
$ngQuantity = intval($_POST['ng_quantity']);
$defectType = $_POST['defect_type'];
$confirmBy = filter_var($_POST['confirm_by'], FILTER_SANITIZE_STRING);
$remarks = filter_var($_POST['remarks'], FILTER_SANITIZE_STRING);

    // Prepare SQL statement
    $sql = "INSERT INTO mp_pvcdb (
    part_name, quantity, time_start, time_end, inspected_by, shift, inspection_date, total_mins,
    outside_appearance, inside_appearance, color,
    i_tolerance_plus, i_tolerance_minus, i_diameter_start, i_diameter_end,
   
    w_tolerance_plus, w_tolerance_minus,
    q1_start, q2_start, q3_start, q4_start,
    q1_end, q2_end, q3_end, q4_end,
    serial_no, lot_no,
   
    appearance_judgement, dimension_judgement, ng_quantity,
    defect_type, confirm_by, remarks
) VALUES (
    ?, ?, ?, ?, ?, ?, ?, ?,
     ?, ?, ?,
    ?, ?, ?, ?,
    ?, ?,
   
    ?, ?, ?, ?,
    ?, ?, ?, ?,
    ?, ?, ?, ?,?,?,?,?
)";
    
    
    // Prepare the parameters array
    $params = array(
        $partName, $quantity, $timeStart, $timeEnd, $inspectedBy, $shift, $inspectionDate, $totalMins,
        $outsideAppearance,$insideAppearance, $color,
        $iTolerancePlus, $iToleranceMinus, $iDiameterStart, $iDiameterEnd,
      
        $wTolerancePlus, $wToleranceMinus,
        $q1Start, $q2Start, $q3Start, $q4Start,
        $q1End, $q2End, $q3End, $q4End,
        $serial_no, $lot_no, // lot_no now treated as string
    
        $appearanceJudgement, $dimensionJudgement, $ngQuantity,
        $defectType, $confirmBy, $remarks
    );
    

    // Prepare and execute the SQL statement
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt === false) {
        echo "Statement preparation error: " . print_r(sqlsrv_errors(), true);
    } else {
        if (sqlsrv_execute($stmt) === false) {
            echo "Execution error: " . print_r(sqlsrv_errors(), true);
        } else {
            echo "Data saved successfully.";
        }
    }
}
?>
