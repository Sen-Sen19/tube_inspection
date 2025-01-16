<?php
// get_count.php

$serverName = "172.25.116.188";
$connectionOptions = array(
    "Database" => "tube_inspection_db",
    "Uid" => "sa",
    "PWD" => "SystemGroup@2022"
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Query to count records
$sql = "SELECT COUNT(*) as count FROM tb_data";
$stmt = sqlsrv_query($conn, $sql);
$count = 0;

if ($stmt) {
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $count = $row['count'];
}

// Return count as JSON
echo json_encode(array('count' => $count));

// Free statement and close connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
