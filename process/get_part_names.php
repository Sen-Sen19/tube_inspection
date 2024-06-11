<?php
include 'conn.php';

try {
    $stmt = $conn->prepare("SELECT part_name FROM sp_cot ORDER BY part_name");
    $stmt->execute();
    
    $parts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($parts);
} catch (PDOException $e) {
    echo 'QUERY ERROR: ' . $e->getMessage();
}
?>
