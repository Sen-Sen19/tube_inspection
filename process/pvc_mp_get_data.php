<?php
// get_data.php

header('Content-Type: application/json');

// Database connection (replace with your actual DB connection)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tube_inspection_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM mp_pvcdb";

if (!empty($search)) {
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM mp_pvcdb WHERE part_name LIKE ? LIMIT ?, ?");
    $searchTerm = "%$search%";
    $stmt->bind_param("sii", $searchTerm, $offset, $limit);
} else {
    $stmt = $conn->prepare("SELECT * FROM mp_pvcdb LIMIT ?, ?");
    $stmt->bind_param("ii", $offset, $limit);
}

$stmt->execute();
$result = $stmt->get_result();
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$stmt->close();
$conn->close();
?>
