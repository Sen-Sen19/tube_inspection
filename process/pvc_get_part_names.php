<?php
include 'conn.php';

try {
    // Select part_name, i_dia_min, i_dia_max, i_dia_tol_min, i_dia_tol_add, o_dia_tol_min, o_dia_tol_add, w_tol_min, and w_tol_add
    $stmt = $conn->prepare("SELECT part_name, i_dia_min, i_dia_max,w_min,w_value,w_max, i_dia_tol_min, i_dia_tol_add,w_tol_min, w_tol_add FROM sp_pvc ORDER BY part_name");
    $stmt->execute();
    
    // Fetch all results
    $parts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Encode the results to JSON format
    echo json_encode($parts);
} catch (PDOException $e) {
    echo 'QUERY ERROR: ' . $e->getMessage();
}

?>
