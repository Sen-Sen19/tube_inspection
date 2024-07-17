<?php
include 'conn3.php'; // Include your database connection script

// Function to fetch data from a specific table based on date range
function fetchDataByDateRange($conn, $tableName, $columns, $dateFrom, $dateTo) {
    // Convert date format to match the database (if necessary)
    $dateFrom = date('Y-m-d', strtotime($dateFrom));
    $dateTo = date('Y-m-d', strtotime($dateTo));

    // Prepare SQL query with date filters
    $sql = "SELECT " . implode(', ', $columns) . ",
               CASE
                   WHEN '$tableName' = 'sp_pvcdb' THEN 'Start Point'
                   WHEN '$tableName' = 'mp_pvcdb' THEN 'Mass Production'
                   WHEN '$tableName' = 'ep_pvcdb' THEN 'End Point'
                   ELSE 'Unknown'
               END AS Process
        FROM [tube_inspection_db].[dbo].[$tableName]
        WHERE CAST(inspection_date AS DATE) BETWEEN ? AND ?";
    
    // Prepare and execute SQL query with parameterized date range
    $params = array($dateFrom, $dateTo);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Fetch data into an array
    $data = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Ensure all columns are present in each row
        foreach ($columns as $column) {
            if (!array_key_exists($column, $row)) {
                // Set missing columns to null
                $row[$column] = null;
            } else {
                // Convert date/time objects to string
                if ($row[$column] instanceof DateTime) {
                    if ($column === 'inspection_date') {
                        // Format inspection_date to exclude time
                        $row[$column] = $row[$column]->format('Y-m-d');
                    } else {
                        // Format other DateTime fields as needed
                        $row[$column] = $row[$column]->format('Y-m-d H:i:s');
                    }
                }
            }
        }
        $data[] = $row;
    }

    // Free the statement and return data
    sqlsrv_free_stmt($stmt);
    return $data;
}


// Define columns for the tables with potential missing columns

$sp_pvcdb_columns = [
    'id',
    'part_name',
    'quantity',
    'time_start',
    'time_end',
    'inspected_by',
    'shift',
    'inspection_date',
    'total_mins',
    'outside_appearance',
    
    'inside_appearance',
    'color',
    'i_tolerance_plus',
    'i_tolerance_minus',
    'i_diameter_start',
    'i_diameter_end',
   
    'w_tolerance_plus',
    'w_tolerance_minus',
    'q1_start',
    'q2_start',
    'q3_start',
    'q4_start',
    'q1_end',
    'q2_end',
    'q3_end',
    'q4_end',
   
    'appearance_judgement',
    'dimension_judgement',
    'ng_quantity',
    'defect_type',
    'confirm_by',
    'remarks',
    'q1_middle',
    'q2_middle',
    'q3_middle',
    'q4_middle'
];

$ep_pvcdb_columns = [
    'id',
    'part_name',
    
    'quantity',
    'time_start',
    'time_end',
    'inspected_by',
    'shift',
    'inspection_date',
    'total_mins',
    'outside_appearance',
   
    'inside_appearance',
    'color',
    'i_tolerance_plus',
    'i_tolerance_minus',
    'i_diameter_start',
    'i_diameter_end',
    
    'w_tolerance_plus',
    'w_tolerance_minus',
    'q1_start',
    'q2_start',
    'q3_start',
    'q4_start',
    'q1_end',
    'q2_end',
    'q3_end',
    'q4_end',
   
    'appearance_judgement',
    'dimension_judgement',
    'ng_quantity',
    'defect_type',
    'confirm_by',
    'remarks',
    'q1_middle',
    'q2_middle',
    'q3_middle',
    'q4_middle'
];

$mp_pvcdb_columns = [
    'id',
    'part_name',
'lot_no',
    'serial_no',
    'quantity',
    'time_start',
    'time_end',
    'inspected_by',
    'shift',
    'inspection_date',
    'total_mins',
    'outside_appearance',
 
    'inside_appearance',
    'color',
    'i_tolerance_plus',
    'i_tolerance_minus',
    'i_diameter_start',
    'i_diameter_end',
   
    'w_tolerance_plus',
    'w_tolerance_minus',
    'q1_start',
    'q2_start',
    'q3_start',
    'q4_start',
    'q1_end',
    'q2_end',
    'q3_end',
    'q4_end',
    
    'appearance_judgement',
    'dimension_judgement',
    'ng_quantity',
    'defect_type',
    'confirm_by',
    'remarks'
];

// Fetch data from each table
$dateFrom = $_GET['date_from'] ?? null;
$dateTo = $_GET['date_to'] ?? null;
// Fetch data based on part name from each table
$data_sp_pvcdb = fetchDataByDateRange($conn, 'sp_pvcdb', $sp_pvcdb_columns, $dateFrom, $dateTo);
$data_mp_pvcdb = fetchDataByDateRange($conn, 'mp_pvcdb', $mp_pvcdb_columns, $dateFrom, $dateTo);
$data_ep_pvcdb = fetchDataByDateRange($conn, 'ep_pvcdb', $ep_pvcdb_columns, $dateFrom, $dateTo);

// Combine data from all tables
$combinedData = array_merge($data_sp_pvcdb, $data_mp_pvcdb, $data_ep_pvcdb);

// Output data as JSON
echo json_encode($combinedData);
?>