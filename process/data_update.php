<?php
// Include connection file
include 'conn3.php';

// Check if POST data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from POST
    $id = $_POST['id'];
    $part_name = $_POST['part_name'];
    $quantity = $_POST['quantity'];
    $inspected_by = $_POST['inspected_by'];
    $shift = $_POST['shift'];
    $total_mins = $_POST['total_mins'];
    $outside_appearance = $_POST['outside_appearance'];
    $slit_condition = $_POST['slit_condition'];
    $inside_appearance = $_POST['inside_appearance'];
    $color = $_POST['color'];
    $i_tolerance_plus = $_POST['i_tolerance_plus'];
    $i_tolerance_minus = $_POST['i_tolerance_minus'];
    $i_diameter_start = $_POST['i_diameter_start'];
    $i_diameter_end = $_POST['i_diameter_end'];
    $o_tolerance_plus = $_POST['o_tolerance_plus'];
    $o_tolerance_minus = $_POST['o_tolerance_minus'];
    $o_diameter_start = $_POST['o_diameter_start'];
    $o_diameter_end = $_POST['o_diameter_end'];
    $w_tolerance_plus = $_POST['w_tolerance_plus'];
    $w_tolerance_minus = $_POST['w_tolerance_minus'];
    $q1_start = $_POST['q1_start'];
    $q2_start = $_POST['q2_start'];
    $q3_start = $_POST['q3_start'];
    $q4_start = $_POST['q4_start'];
    $q1_middle = $_POST['q1_middle'];
    $q2_middle = $_POST['q2_middle'];
    $q3_middle = $_POST['q3_middle'];
    $q4_middle = $_POST['q4_middle'];
    $q1_end = $_POST['q1_end'];
    $q2_end = $_POST['q2_end'];
    $q3_end = $_POST['q3_end'];
    $q4_end = $_POST['q4_end'];
    $using_round_bar = $_POST['using_round_bar'];
    $using_bare_hands = $_POST['using_bare_hands'];
    $appearance_judgement = $_POST['appearance_judgement'];
    $dimension_judgement = $_POST['dimension_judgement'];
    $ng_quantity = $_POST['ng_quantity'];
    $defect_type = isset($_POST['defect_type']) ? $_POST['defect_type'] : '';
    $confirm_by = isset($_POST['confirm_by']) ? $_POST['confirm_by'] : '';
    $remarks = isset($_POST['remarks']) ? $_POST['remarks'] : '';
    // Add more fields as needed

    // SQL query to update data
    $sql = "UPDATE tb_data
            SET part_name = ?,
                quantity = ?,
                inspected_by = ?,
                shift = ?,
                total_mins = ?,
                outside_appearance = ?,
                slit_condition = ?,
                inside_appearance = ?,
                color = ?,
                i_tolerance_plus = ?,
                i_tolerance_minus = ?,
                i_diameter_start = ?,
                i_diameter_end = ?,
                o_tolerance_plus = ?,
                o_tolerance_minus = ?,
                o_diameter_start = ?,
                o_diameter_end = ?,
                w_tolerance_plus = ?,
                w_tolerance_minus = ?,
                q1_start = ?,
                q2_start = ?,
                q3_start = ?,
                q4_start = ?,
                q1_middle = ?,
                q2_middle = ?,
                q3_middle = ?,
                q4_middle = ?,
                q1_end = ?,
                q2_end = ?,
                q3_end = ?,
                q4_end = ?,
                using_round_bar = ?,
                using_bare_hands = ?,
                appearance_judgement = ?,
                dimension_judgement = ?,
                ng_quantity = ?,
                defect_type = ?,
                confirm_by = ?,
                remarks = ?
            WHERE id = ?";

    // Prepare and execute the statement
    $params = array(
        $part_name, $quantity, $inspected_by, $shift, $total_mins,
        $outside_appearance, $slit_condition, $inside_appearance, $color,
        $i_tolerance_plus, $i_tolerance_minus, $i_diameter_start, $i_diameter_end,
        $o_tolerance_plus, $o_tolerance_minus, $o_diameter_start, $o_diameter_end,
        $w_tolerance_plus, $w_tolerance_minus, $q1_start, $q2_start,
        $q3_start, $q4_start, $q1_middle, $q2_middle, $q3_middle, $q4_middle,
        $q1_end, $q2_end, $q3_end, $q4_end, $using_round_bar, $using_bare_hands,
        $appearance_judgement, $dimension_judgement, $ng_quantity, $defect_type,
        $confirm_by, $remarks, $id
    );

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        // Handle error if the query fails
        die(print_r(sqlsrv_errors(), true));
    } else {
        // Query succeeded
        echo "Data updated successfully!";
    }

    // Clean up statement
    sqlsrv_free_stmt($stmt);
} else {
    // Handle if no POST data received
    echo "No data received for update.";
}

// Close connection
sqlsrv_close($conn);
?>
