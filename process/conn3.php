<?php
$serverName = "172.25.114.171\\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "tube_inspection_db",
    "Uid" => "sa",
    "PWD" => "SystemGroup2018"
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
