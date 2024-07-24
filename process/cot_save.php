<?php
// Include the connection file
require_once 'conn3.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve and sanitize form data (sanitize as needed)
    // Example of basic sanitation, adjust as per your application's needs|
    $lot_no = filter_var($_POST['lot_no'], FILTER_SANITIZE_STRING);
    $serial_no = filter_var($_POST['serial_no'], FILTER_SANITIZE_STRING);
    $partName = filter_var($_POST['part_name'], FILTER_SANITIZE_STRING);
    $quantity = intval($_POST['quantity']); // Assuming quantity is an integer
    $timeStart = $_POST['time_start']; // Assuming time fields are properly formatted
    $timeEnd = $_POST['time_end'];
    $inspectedBy = filter_var($_POST['inspected_by'], FILTER_SANITIZE_STRING);
    $shift = $_POST['shift']; // Assuming shift is a string
    $inspectionDate = $_POST['inspection_date']; // Assuming date is properly formatted
    $totalMins = floatval($_POST['total_mins']); // Assuming total_mins is a float
    $outsideAppearance = $_POST['outside_appearance']; // Assuming appearance fields are strings
    $slitCondition = $_POST['slit_condition'];
    $insideAppearance = $_POST['inside_appearance'];
    $color = $_POST['color'];
    $iTolerancePlus = floatval($_POST['i_tolerance_plus']);
    $iToleranceMinus = floatval($_POST['i_tolerance_minus']);
    $iDiameterStart = floatval($_POST['i_diameter_start']);
    $iDiameterEnd = floatval($_POST['i_diameter_end']);
    $oTolerancePlus = floatval($_POST['o_tolerance_plus']);
    $oToleranceMinus = floatval($_POST['o_tolerance_minus']);
    $oDiameterStart = floatval($_POST['o_diameter_start']);
    $oDiameterEnd = floatval($_POST['o_diameter_end']);
    $wTolerancePlus = floatval($_POST['w_tolerance_plus']);
    $wToleranceMinus = floatval($_POST['w_tolerance_minus']);
    $q1Start = floatval($_POST['q1_start']);
    $q2Start = floatval($_POST['q2_start']);
    $q3Start = floatval($_POST['q3_start']);
    $q4Start = floatval($_POST['q4_start']);
    $q1Middle = floatval($_POST['q1_middle']);
    $q2Middle = floatval($_POST['q2_middle']);
    $q3Middle = floatval($_POST['q3_middle']);
    $q4Middle = floatval($_POST['q4_middle']);
    $q1End = floatval($_POST['q1_end']);
    $q2End = floatval($_POST['q2_end']);
    $q3End = floatval($_POST['q3_end']);
    $q4End = floatval($_POST['q4_end']);
    $usingRoundBar = $_POST['using_round_bar'];
    $usingBareHands = $_POST['using_bare_hands'];
    $appearanceJudgement = $_POST['appearance_judgement'];
    $dimensionJudgement = $_POST['dimension_judgement'];
    $ngQuantity = intval($_POST['ng_quantity']); // Assuming ng_quantity is an integer
    $defectType = $_POST['defect_type'];
    $confirmBy = $_POST['confirm_by'];
    $remarks = $_POST['remarks'];
    $process = isset($_POST['process']) ? filter_var($_POST['process'], FILTER_SANITIZE_STRING) : '';

    // Prepare SQL statement
    $sql = "INSERT INTO tb_data (
    part_name, quantity, time_start, time_end, inspected_by, shift, inspection_date, total_mins,
    outside_appearance, slit_condition, inside_appearance, color,
    i_tolerance_plus, i_tolerance_minus, i_diameter_start, i_diameter_end,
    o_tolerance_plus, o_tolerance_minus, o_diameter_start, o_diameter_end,
    w_tolerance_plus, w_tolerance_minus,
    q1_start, q2_start, q3_start, q4_start,
    q1_middle, q2_middle, q3_middle, q4_middle,
    q1_end, q2_end, q3_end, q4_end,
    using_round_bar, using_bare_hands,
    appearance_judgement, dimension_judgement, ng_quantity,
    defect_type, confirm_by, remarks,process, serial_no, lot_no
   
) VALUES (
    ?, ?, ?, ?, ?, ?, ?, ?,
    ?, ?, ?, ?,
    ?, ?, ?, ?,
    ?, ?, ?, ?,
    ?, ?,
    ?, ?, ?, ?,
    ?, ?, ?, ?,
    ?, ?, ?, ?,
    ?, ?, ?, ?,?,?,?,?,?,?,?
)";
    
    
    // Prepare the parameters array
    $params = array(
        $partName, $quantity, $timeStart, $timeEnd, $inspectedBy, $shift, $inspectionDate, $totalMins,
        $outsideAppearance, $slitCondition, $insideAppearance, $color,
        $iTolerancePlus, $iToleranceMinus, $iDiameterStart, $iDiameterEnd,
        $oTolerancePlus, $oToleranceMinus, $oDiameterStart, $oDiameterEnd,
        $wTolerancePlus, $wToleranceMinus,
        $q1Start, $q2Start, $q3Start, $q4Start,
        $q1Middle, $q2Middle, $q3Middle, $q4Middle,
        $q1End, $q2End, $q3End, $q4End,
        $usingRoundBar, $usingBareHands,
        $appearanceJudgement, $dimensionJudgement, $ngQuantity,
        $defectType, $confirmBy, $remarks,$process,$serial_no, $lot_no
    );
    

    // Prepare and execute the SQL statement
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt === false) {
        // Error handling if prepare fails
        echo "Statement preparation error: " . print_r(sqlsrv_errors(), true);
    } else {
        // Execute the query
        if (sqlsrv_execute($stmt) === false) {
            // Error handling if execute fails
            echo "Execution error: " . print_r(sqlsrv_errors(), true);
        } else {
            // Success message
            echo "Data saved successfully.";
        }
    }
}
?>
