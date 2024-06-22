<?php
// Include the connection script
include 'conn3.php';

try {
    // SQL query to select data from MS SQL Server table
    $sql = "SELECT part_name, i_dia_min, i_dia_max, o_dia_min, o_dia_max, w_min, w_value, w_max,
                   i_dia_tol_min, i_dia_tol_add, o_dia_tol_min, o_dia_tol_add, w_tol_min, w_tol_add
            FROM sp_cot
            ORDER BY part_name";

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql);
    
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true)); // Print error details if query fails
    }
    
    // Fetch all results
    $parts = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $parts[] = $row;
    }
    
    // Encode the results to JSON format
    echo json_encode($parts);
    
    // Free statement and close connection
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);

} catch (Exception $e) {
    echo 'QUERY ERROR: ' . $e->getMessage();
}
?>
