<?php

include 'conn3.php';

try {
    
    $sql_cot = "SELECT part_name, i_dia_min, i_dia_max, o_dia_min, o_dia_max, w_min, w_value, w_max,
                       i_dia_tol_min, i_dia_tol_add, o_dia_tol_min, o_dia_tol_add, w_tol_min, w_tol_add
                FROM sp_cot
                ORDER BY part_name";

    
    $stmt_cot = sqlsrv_query($conn, $sql_cot);
    
    if ($stmt_cot === false) {
        die(print_r(sqlsrv_errors(), true)); 
    }
    
    
    $parts_cot = array();
    while ($row = sqlsrv_fetch_array($stmt_cot, SQLSRV_FETCH_ASSOC)) {
        $parts_cot[] = $row;
    }
    
  
    $sql_pvc = "SELECT part_name, i_dia_min, i_dia_max, w_min, w_value, w_max,
                   i_dia_tol_min, i_dia_tol_add, w_tol_min, w_tol_add
                FROM sp_pvc
                ORDER BY part_name";

    
    $stmt_pvc = sqlsrv_query($conn, $sql_pvc);
    
    if ($stmt_pvc === false) {
        die(print_r(sqlsrv_errors(), true)); 
    }
    
  
    $parts_pvc = array();
    while ($row = sqlsrv_fetch_array($stmt_pvc, SQLSRV_FETCH_ASSOC)) {
        $parts_pvc[] = $row;
    }

  
    $parts = array_merge($parts_cot, $parts_pvc);
    
    
    echo json_encode($parts);
    sqlsrv_free_stmt($stmt_cot);
    sqlsrv_free_stmt($stmt_pvc);
    sqlsrv_close($conn);

} catch (Exception $e) {
    echo 'QUERY ERROR: ' . $e->getMessage();
}
?>
