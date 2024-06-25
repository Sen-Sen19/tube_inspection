<?php
// export_data.php

include 'conn3.php'; // Include the MS SQL Server connection file

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="COT_Start_Point.csv"');
header('Pragma: no-cache');
header('Expires: 0');

$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM mp_pvcdb";

if (!empty($search)) {
    $sql = "SELECT * FROM mp_pvcdb WHERE part_name LIKE ?";
    $searchTerm = "%$search%";
    $params = array($searchTerm);
} else {
    $params = array();
}

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Output the column headings
$headers = [
    'ID', 'Part Name', 'Quantity', 'Time Start', 'Time End', 'Inspected By',
    'Shift', 'Inspection Date', 'Total Minutes', 'Outside Appearance',
    'Inside Appearance', 'Color', 'I Tolerance +',
    'I Tolerance -', 'I Diameter Start', 'I Diameter End', 
    'W Tolerance +',
    'W Tolerance -', 'Q1 Start', 'Q2 Start', 'Q3 Start', 'Q4 Start',
    'Q1 End',
    'Q2 End', 'Q3 End', 'Q4 End',
    'Appearance Judgement', 'Dimension Judgement', 'NG Quantity',
    'Defect Type', 'Confirm By', 'Remarks'
];
$output = fopen('php://output', 'w');
fputcsv($output, $headers);

// Output the data rows
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    // Format DateTime fields if necessary
    $formattedRow = [];
    foreach ($row as $key => $value) {
        if ($value instanceof DateTime) {
            if ($key === 'Inspection Date') {
                $formattedRow[$key] = $value->format('Y-m-d'); // Format without time
            } else {
                $formattedRow[$key] = $value->format('Y-m-d H:i:s'); // Keep other DateTime fields as is
            }
        } elseif ($key === 'Inspection Date' && strpos($value, ' ') !== false) {
            // Handle cases where the date might be stored as a string with time
            $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $value);
            if ($datetime !== false) {
                $formattedRow[$key] = $datetime->format('Y-m-d');
            } else {
                $formattedRow[$key] = $value; // Fallback to original value if parsing fails
            }
        } else {
            $formattedRow[$key] = $value;
        }
    }
    fputcsv($output, $formattedRow);
}

fclose($output);

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
