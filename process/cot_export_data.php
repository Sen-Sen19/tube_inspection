<?php
// Include your connection file
include 'conn3.php';

// Assuming POST method is used to receive part name from client
$data = json_decode(file_get_contents("php://input"), true);
$partName = $data['partName'];

// Query to fetch data based on selected part name
$sql = "SELECT * FROM sp_cotdb WHERE PartName = ?";
$params = array($partName);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$result = array();

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    // Adjust keys and values based on your database structure
    $result[] = array(
        'id' => $row['ID'],
        'part_name' => $row['PartName'],
        'quantity' => $row['Quantity'],
        // Add more fields as needed
    );
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

// Return JSON response
header('Content-Type: application/json');
echo json_encode($result);
?>
