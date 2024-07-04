<?php
include 'conn3.php';  // Ensure this file properly initializes $conn

// Check if connection is valid
if (!$conn) {
    die('Database connection failed: ' . sqlsrv_errors());
}

$partName = $_GET['partName'] ?? '';
$inspectedBy = $_GET['inspectedBy'] ?? '';
$defectType = $_GET['defectType'] ?? '';
$dateFrom = $_GET['dateFrom'] ?? '';
$dateTo = $_GET['dateTo'] ?? '';

// Build your SQL query based on the parameters
$sql = "SELECT * FROM sp_cotdb WHERE 1=1";

// Add conditions for filters
$params = array();

if (!empty($partName)) {
    $sql .= " AND part_name = ?";
    $params[] = $partName;
}

if (!empty($inspectedBy)) {
    $sql .= " AND inspected_by = ?";
    $params[] = $inspectedBy;
}

if (!empty($defectType)) {
    $sql .= " AND defect_type = ?";
    $params[] = $defectType;
}

if (!empty($dateFrom)) {
    $sql .= " AND inspection_date >= ?";
    $params[] = $dateFrom;
}

if (!empty($dateTo)) {
    $sql .= " AND inspection_date <= ?";
    $params[] = $dateTo;
}

// Prepare statement
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
$stmt = sqlsrv_query($conn, $sql, $params, $options);

if ($stmt === false) {
    die('Error executing query: ' . sqlsrv_errors());
}

// Create CSV content
$filename = 'COT_Start_Point.csv';
header('Content-Type: text/csv');
header("Content-Disposition: attachment; filename=$filename");

$output = fopen('php://output', 'w');

// Output CSV headers
$fields = sqlsrv_field_metadata($stmt);
$headers = array();
foreach ($fields as $field) {
    $headers[] = $field['Name'];
}
$headers[] = 'NG_Indicator'; // Add a new column for NG indicator
fputcsv($output, $headers);

// Output CSV data rows
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    // Format DateTime fields as strings
    $formattedRow = array_map(function($value) {
        if ($value instanceof DateTime) {
            return $value->format('Y-m-d H:i:s'); // Adjust format as per your DateTime format
        }
        return $value;
    }, $row);

    // Check for NG condition and add indicator
    $ngIndicator = '';
    if (isset($row['defect_type']) && $row['defect_type'] === 'NG') {
        $ngIndicator = 'NG';
    }
    $formattedRow['NG_Indicator'] = $ngIndicator;

    fputcsv($output, $formattedRow);
}

// Close resources
fclose($output);
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
