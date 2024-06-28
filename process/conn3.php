<?php
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
?>
