<?php
// Include connection file
include 'conn3.php';

// Check if POST data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from POST and sanitize if necessary
    $id = $_POST['id'];
    $part_name = $_POST['part_name'];
    $quantity = $_POST['quantity'];
    $inspected_by = $_POST['inspected_by'];
    $shift = $_POST['shift'];
    $total_mins = $_POST['total_mins'];
    // Ensure numeric values are used where necessary
    $outside_appearance = is_numeric($_POST['outside_appearance']) ? $_POST['outside_appearance'] : 0;
    $inside_appearance = is_numeric($_POST['inside_appearance']) ? $_POST['inside_appearance'] : 0;
    $color = $_POST['color'];
    $i_tolerance_plus = is_numeric($_POST['i_tolerance_plus']) ? $_POST['i_tolerance_plus'] : 0;
    $i_tolerance_minus = is_numeric($_POST['i_tolerance_minus']) ? $_POST['i_tolerance_minus'] : 0;
    $i_diameter_start = is_numeric($_POST['i_diameter_start']) ? $_POST['i_diameter_start'] : 0;
    $i_diameter_end = is_numeric($_POST['i_diameter_end']) ? $_POST['i_diameter_end'] : 0;
    $w_tolerance_plus = is_numeric($_POST['w_tolerance_plus']) ? $_POST['w_tolerance_plus'] : 0;
    $w_tolerance_minus = is_numeric($_POST['w_tolerance_minus']) ? $_POST['w_tolerance_minus'] : 0;
    $q1_start = is_numeric($_POST['q1_start']) ? $_POST['q1_start'] : 0;
    $q2_start = is_numeric($_POST['q2_start']) ? $_POST['q2_start'] : 0;
    $q3_start = is_numeric($_POST['q3_start']) ? $_POST['q3_start'] : 0;
    $q4_start = is_numeric($_POST['q4_start']) ? $_POST['q4_start'] : 0;
    $serial_no = $_POST['serial_no'];
    $lot_no = $_POST['lot_no'];
    $q1_end = is_numeric($_POST['q1_end']) ? $_POST['q1_end'] : 0;
    $q2_end = is_numeric($_POST['q2_end']) ? $_POST['q2_end'] : 0;
    $q3_end = is_numeric($_POST['q3_end']) ? $_POST['q3_end'] : 0;
    $q4_end = is_numeric($_POST['q4_end']) ? $_POST['q4_end'] : 0;
    $appearance_judgement = $_POST['appearance_judgement'];
    $dimension_judgement = $_POST['dimension_judgement'];
    $ng_quantity = $_POST['ng_quantity'];
    $defect_type = isset($_POST['defect_type']) ? $_POST['defect_type'] : '';
    $confirm_by = isset($_POST['confirm_by']) ? $_POST['confirm_by'] : '';
    $remarks = isset($_POST['remarks']) ? $_POST['remarks'] : '';
    // Add more fields with validation as needed

    // SQL query to update data
    $sql = "UPDATE ep_pvcdb
            SET part_name = ?,
                quantity = ?,
                inspected_by = ?,
                shift = ?,
                total_mins = ?,
                outside_appearance = ?,
                inside_appearance = ?,
                color = ?,
                i_tolerance_plus = ?,
                i_tolerance_minus = ?,
                i_diameter_start = ?,
                i_diameter_end = ?,
                w_tolerance_plus = ?,
                w_tolerance_minus = ?,
                q1_start = ?,
                q2_start = ?,
                q3_start = ?,
                q4_start = ?,
                serial_no = ?,
                lot_no = ?,
                q1_end = ?,
                q2_end = ?,
                q3_end = ?,
                q4_end = ?,
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
        $outside_appearance, $inside_appearance, $color,
        $i_tolerance_plus, $i_tolerance_minus, $i_diameter_start, $i_diameter_end,
        $w_tolerance_plus, $w_tolerance_minus, $q1_start, $q2_start,
        $q3_start, $q4_start, $serial_no,$lot_no,
        $q1_end, $q2_end, $q3_end, $q4_end, 
        $appearance_judgement, $dimension_judgement, $ng_quantity, $defect_type,
        $confirm_by, $remarks, $id
    );

    $stmt = sqlsrv_prepare($conn, $sql, $params); // Use sqlsrv_prepare for parameterized queries

    if ($stmt === false) {
        // Handle error if the query preparation fails
        die(print_r(sqlsrv_errors(), true));
    }

    $result = sqlsrv_execute($stmt); // Execute the prepared statement

    if ($result === false) {
        // Handle error if the query execution fails
        die(print_r(sqlsrv_errors(), true));
    } else {
        // Query succeeded
        echo "Data updated successfully!";
    }

    // Clean up resources
    sqlsrv_free_stmt($stmt);
} else {
    // Handle if no POST data received
    echo "No data received for update.";
}

// Close connection
sqlsrv_close($conn);
?>
