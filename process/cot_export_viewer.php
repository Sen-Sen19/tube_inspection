
<?php
include 'conn3.php'; // Include your database connection script

// Function to fetch data from a specific table based on part name
function fetchDataByPartName($conn, $tableName, $columns, $partName) {
// Extract date parameters
$dateFrom = $_GET['date_from'] ?? null;
$dateTo = $_GET['date_to'] ?? null;

// Prepare SQL query with part name and optional date filters
$sql = "SELECT " . implode(', ', $columns) . ",
               CASE
                   WHEN '$tableName' = 'sp_cotdb' THEN 'Start Point'
                   WHEN '$tableName' = 'mp_cotdb' THEN 'Mass Production'
                   WHEN '$tableName' = 'ep_cotdb' THEN 'End Point'
                   ELSE 'Unknown'
               END AS Process
        FROM [tube_inspection_db].[dbo].[$tableName]
        WHERE part_name = ?";

// Add date filters if provided
if ($dateFrom && $dateTo) {
    $sql .= " AND inspection_date BETWEEN '$dateFrom' AND '$dateTo'";
}
    
    
    // Prepare and execute SQL query with parameterized part name
    $params = array($partName);
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
$sp_cotdb_columns = [
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
    'slit_condition',
    'inside_appearance',
    'color',
    'i_tolerance_plus',
    'i_tolerance_minus',
    'i_diameter_start',
    'i_diameter_end',
    'o_tolerance_plus',
    'o_tolerance_minus',
    'o_diameter_start',
    'o_diameter_end',
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
    'using_round_bar',
    'using_bare_hands',
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

$ep_cotdb_columns = [
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
    'slit_condition',
    'inside_appearance',
    'color',
    'i_tolerance_plus',
    'i_tolerance_minus',
    'i_diameter_start',
    'i_diameter_end',
    'o_tolerance_plus',
    'o_tolerance_minus',
    'o_diameter_start',
    'o_diameter_end',
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
    'using_round_bar',
    'using_bare_hands',
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

$mp_cotdb_columns = [
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
    'slit_condition',
    'inside_appearance',
    'color',
    'i_tolerance_plus',
    'i_tolerance_minus',
    'i_diameter_start',
    'i_diameter_end',
    'o_tolerance_plus',
    'o_tolerance_minus',
    'o_diameter_start',
    'o_diameter_end',
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
    'using_round_bar',
    'using_bare_hands',
    'appearance_judgement',
    'dimension_judgement',
    'ng_quantity',
    'defect_type',
    'confirm_by',
    'remarks'
];

// Fetch data from each table
$partName = $_GET['partName'] ?? ''; // Adjust this based on how partName is passed

// Fetch data based on part name from each table
$data_sp_cotdb = fetchDataByPartName($conn, 'sp_cotdb', $sp_cotdb_columns, $partName);
$data_mp_cotdb = fetchDataByPartName($conn, 'mp_cotdb', $mp_cotdb_columns, $partName);
$data_ep_cotdb = fetchDataByPartName($conn, 'ep_cotdb', $ep_cotdb_columns, $partName);

// Combine data from all tables
$combinedData = array_merge($data_sp_cotdb, $data_mp_cotdb, $data_ep_cotdb);

// Output data as JSON
echo json_encode($combinedData);
?>