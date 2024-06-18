<?php
// export_data.php

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="COT_Start_Point.csv"');
header('Pragma: no-cache');
header('Expires: 0');

// Database connection (replace with your actual DB connection)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tube_inspection_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM sp_cotdb";

if (!empty($search)) {
    $stmt = $conn->prepare("SELECT * FROM sp_cotdb WHERE part_name LIKE ?");
    $searchTerm = "%$search%";
    $stmt->bind_param("s", $searchTerm);
} else {
    $stmt = $conn->prepare("SELECT * FROM sp_cotdb");
}

$stmt->execute();
$result = $stmt->get_result();

// Output the column headings
$headers = [
    'ID', 'Part Name', 'Quantity', 'Time Start', 'Time End', 'Inspected By',
    'Shift', 'Inspection Date', 'Total Minutes', 'Outside Appearance',
    'Slit Condition', 'Inside Appearance', 'Color', 'I Tolerance +',
    'I Tolerance -', 'I Diameter Start', 'I Diameter End', 'O Tolerance +',
    'O Tolerance -', 'O Diameter Start', 'O Diameter End', 'W Tolerance +',
    'W Tolerance -', 'Q1 Start', 'Q2 Start', 'Q3 Start', 'Q4 Start',
    'Q1 Middle', 'Q2 Middle', 'Q3 Middle', 'Q4 Middle', 'Q1 End',
    'Q2 End', 'Q3 End', 'Q4 End', 'Using Round Bar', 'Using Bare Hands',
    'Appearance Judgement', 'Dimension Judgement', 'NG Quantity',
    'Defect Type', 'Confirm By', 'Remarks'
];
$output = fopen('php://output', 'w');
fputcsv($output, $headers);

// Output the data rows
while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);

$stmt->close();
$conn->close();
?>
