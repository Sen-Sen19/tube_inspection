<?php
// Include the connection file
require_once 'conn.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve and sanitize form data
    $partName = $_POST['part_name'];
    $quantity = $_POST['quantity'];
    $timeStart = $_POST['time_start'];
    $timeEnd = $_POST['time_end'];
    $inspectedBy = $_POST['inspected_by'];
    $shift = $_POST['shift'];
    $inspectionDate = $_POST['inspection_date'];
    $totalMins = $_POST['total_mins']; // Ensure the database column can handle float values
    $outsideAppearance = $_POST['outside_appearance'];
    $slitCondition = $_POST['slit_condition'];
    $insideAppearance = $_POST['inside_appearance'];
    $color = $_POST['color'];
    $iTolerancePlus = $_POST['i_tolerance_plus'];
    $iToleranceMinus = $_POST['i_tolerance_minus'];
    $iDiameterStart = $_POST['i_diameter_start'];
    $iDiameterEnd = $_POST['i_diameter_end'];
    $oTolerancePlus = $_POST['o_tolerance_plus'];
    $oToleranceMinus = $_POST['o_tolerance_minus'];
    $oDiameterStart = $_POST['o_diameter_start'];
    $oDiameterEnd = $_POST['o_diameter_end'];
    $wTolerancePlus = $_POST['w_tolerance_plus'];
    $wToleranceMinus = $_POST['w_tolerance_minus'];
    $q1Start = $_POST['q1_start'];
    $q2Start = $_POST['q2_start'];
    $q3Start = $_POST['q3_start'];
    $q4Start = $_POST['q4_start'];

    $q1End = $_POST['q1_end'];
    $q2End = $_POST['q2_end'];
    $q3End = $_POST['q3_end'];
    $q4End = $_POST['q4_end'];
    $usingRoundBar = $_POST['using_round_bar'];
    $usingBareHands = $_POST['using_bare_hands'];
    $appearanceJudgement = $_POST['appearance_judgement'];
    $dimensionJudgement = $_POST['dimension_judgement'];
    $ngQuantity = $_POST['ng_quantity'];
    $defectType = $_POST['defect_type'];
    $confirmBy = $_POST['confirm_by'];
    $remarks = $_POST['remarks'];
    
    // Prepare SQL statement
    $sql = "INSERT INTO mp_cotdb (
        part_name, quantity, time_start, time_end, inspected_by, shift, inspection_date, total_mins,
        outside_appearance, slit_condition, inside_appearance, color,
        i_tolerance_plus, i_tolerance_minus, i_diameter_start, i_diameter_end,
        o_tolerance_plus, o_tolerance_minus, o_diameter_start, o_diameter_end,
        w_tolerance_plus, w_tolerance_minus,
        q1_start, q2_start, q3_start, q4_start,
        q1_end, q2_end, q3_end, q4_end,
        using_round_bar, using_bare_hands,
        appearance_judgement, dimension_judgement, ng_quantity,
        defect_type, confirm_by, remarks
    ) VALUES (
        :partName, :quantity, :timeStart, :timeEnd, :inspectedBy, :shift, :inspectionDate, :totalMins,
        :outsideAppearance, :slitCondition, :insideAppearance, :color,
        :iTolerancePlus, :iToleranceMinus, :iDiameterStart, :iDiameterEnd,
        :oTolerancePlus, :oToleranceMinus, :oDiameterStart, :oDiameterEnd,
        :wTolerancePlus, :wToleranceMinus,
        :q1Start, :q2Start, :q3Start, :q4Start,
        :q1End, :q2End, :q3End, :q4End,
        :usingRoundBar, :usingBareHands,
        :appearanceJudgement, :dimensionJudgement, :ngQuantity,
        :defectType, :confirmBy, :remarks
    )";

    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':partName', $partName);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':timeStart', $timeStart);
    $stmt->bindParam(':timeEnd', $timeEnd);
    $stmt->bindParam(':inspectedBy', $inspectedBy);
    $stmt->bindParam(':shift', $shift);
    $stmt->bindParam(':inspectionDate', $inspectionDate);
    $stmt->bindParam(':totalMins', $totalMins);
    $stmt->bindParam(':outsideAppearance', $outsideAppearance);
    $stmt->bindParam(':slitCondition', $slitCondition);
    $stmt->bindParam(':insideAppearance', $insideAppearance);
    $stmt->bindParam(':color', $color);
    $stmt->bindParam(':iTolerancePlus', $iTolerancePlus);
    $stmt->bindParam(':iToleranceMinus', $iToleranceMinus);
    $stmt->bindParam(':iDiameterStart', $iDiameterStart);
    $stmt->bindParam(':iDiameterEnd', $iDiameterEnd);
    $stmt->bindParam(':oTolerancePlus', $oTolerancePlus);
    $stmt->bindParam(':oToleranceMinus', $oToleranceMinus);
    $stmt->bindParam(':oDiameterStart', $oDiameterStart);
    $stmt->bindParam(':oDiameterEnd', $oDiameterEnd);
    $stmt->bindParam(':wTolerancePlus', $wTolerancePlus);
    $stmt->bindParam(':wToleranceMinus', $wToleranceMinus);
    $stmt->bindParam(':q1Start', $q1Start);
    $stmt->bindParam(':q2Start', $q2Start);
    $stmt->bindParam(':q3Start', $q3Start);
    $stmt->bindParam(':q4Start', $q4Start);
    $stmt->bindParam(':q1End', $q1End);
    $stmt->bindParam(':q2End', $q2End);
    $stmt->bindParam(':q3End', $q3End);
    $stmt->bindParam(':q4End', $q4End);
    $stmt->bindParam(':usingRoundBar', $usingRoundBar);
    $stmt->bindParam(':usingBareHands', $usingBareHands);
    $stmt->bindParam(':appearanceJudgement', $appearanceJudgement);
    $stmt->bindParam(':dimensionJudgement', $dimensionJudgement);
    $stmt->bindParam(':ngQuantity', $ngQuantity);
    $stmt->bindParam(':defectType', $defectType);
    $stmt->bindParam(':confirmBy', $confirmBy);
    $stmt->bindParam(':remarks', $remarks);

    // Execute the query
    try {
        $stmt->execute();
        echo "Data saved successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
