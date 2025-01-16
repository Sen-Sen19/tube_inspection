<?php

require_once 'conn3.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $lot_no = filter_var($_POST['lot_no'], FILTER_SANITIZE_STRING);
    $serial_no = filter_var($_POST['serial_no'], FILTER_SANITIZE_STRING);
    $partName = filter_var($_POST['part_name'], FILTER_SANITIZE_STRING);
    $quantity = intval($_POST['quantity']); 
    $timeStart = $_POST['time_start']; 
    $timeEnd = $_POST['time_end'];
    $inspectedBy = filter_var($_POST['inspected_by'], FILTER_SANITIZE_STRING);
    $shift = $_POST['shift'];
    $inspectionDate = $_POST['inspection_date']; 
    $totalMins = floatval($_POST['total_mins']); 
    $outsideAppearance = $_POST['outside_appearance']; 
    $slitCondition = $_POST['slit_condition'];
    $insideAppearance = $_POST['inside_appearance'];
    $color = $_POST['color'];
    $iTolerancePlus = floatval($_POST['i_tolerance_plus']);
    $iToleranceMinus = floatval($_POST['i_tolerance_minus']);
    $iDiameterStart = floatval($_POST['i_diameter_start']);
    $iDiameterEnd = floatval($_POST['i_diameter_end']);
    $oTolerancePlus = floatval($_POST['o_tolerance_plus']);
    $oToleranceMinus = floatval($_POST['o_tolerance_minus']);
    $oDiameterStart = filter_var($_POST['o_diameter_start']);
    $oDiameterEnd = filter_var($_POST['o_diameter_end']);
    $wTolerancePlus = floatval($_POST['w_tolerance_plus']);
    $wToleranceMinus = floatval($_POST['w_tolerance_minus']);
    $q1Start = filter_var($_POST['q1_start']);
    $q2Start = filter_var($_POST['q2_start']);
    $q3Start = filter_var($_POST['q3_start']);
    $q4Start = filter_var($_POST['q4_start']);
    $q1Middle = filter_var($_POST['q1_middle']);
    $q2Middle = filter_var($_POST['q2_middle']);
    $q3Middle = filter_var($_POST['q3_middle']);
    $q4Middle = filter_var($_POST['q4_middle']);
    $q1End = filter_var($_POST['q1_end']);
    $q2End = filter_var($_POST['q2_end']);
    $q3End = filter_var($_POST['q3_end']);
    $q4End = filter_var($_POST['q4_end']);
    $usingRoundBar = $_POST['using_round_bar'];
    $usingBareHands = $_POST['using_bare_hands'];
    $appearanceJudgement = $_POST['appearance_judgement'];
    $dimensionJudgement = $_POST['dimension_judgement'];
    $ngQuantity = intval($_POST['ng_quantity']); 
    $defectType = $_POST['defect_type'];
    $confirmBy = $_POST['confirm_by'];
    $remarks = $_POST['remarks'];
    $process = isset($_POST['process']) ? filter_var($_POST['process'], FILTER_SANITIZE_STRING) : '';

   
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
