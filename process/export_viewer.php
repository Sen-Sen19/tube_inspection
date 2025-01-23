<?php
include 'conn3.php'; 
function fetchDataByDateRange($conn, $tableName, $columns, $dateFrom, $dateTo, $shift = null) {
    $dateFrom = date('Y-m-d', strtotime($dateFrom));
    $dateTo = date('Y-m-d', strtotime($dateTo));

    $sql = "SELECT " . implode(', ', $columns) . " FROM [tube_inspection_db].[dbo].[$tableName] WHERE ";

    if ($shift === "Dayshift") {
   
        $sql .= "(CAST(time_start AS DATETIME) BETWEEN ? AND ?)";
        $shiftFrom = $dateFrom . " 06:00:00";
        $shiftTo = $dateTo . " 17:59:59";
        $params = array($shiftFrom, $shiftTo);
    } elseif ($shift === "Night shift") {
       
        $sql .= "((CAST(time_start AS DATETIME) BETWEEN ? AND ?) OR (CAST(time_start AS DATETIME) BETWEEN ? AND ?))";
        $shiftFrom1 = $dateFrom . " 18:00:00";
        $shiftTo1 = date('Y-m-d H:i:s', strtotime($dateTo . ' 05:59:59'));
        $params = array($shiftFrom1, $shiftTo1, $shiftFrom1, $shiftTo1);
    } else {

        $sql .= "CAST(inspection_date AS DATE) BETWEEN ? AND ?";
        $params = array($dateFrom, $dateTo);
    }

    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $data = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        foreach ($columns as $column) { 
            $row[$column] = $row[$column] ?? null;
            if ($row[$column] instanceof DateTime) {
                $row[$column] = $row[$column]->format('Y-m-d H:i:s');
            }
        }
        $data[] = $row;
    }

    sqlsrv_free_stmt($stmt);
    return $data;
}


$dateFrom = $_GET['date_from'] ?? null;
$dateTo = $_GET['date_to'] ?? null;
$shift = $_GET['shift'] ?? null;

$tb_data_columns = [
    'id',
    'part_name',
    'process',
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
    'remarks',
    'q1_middle',
    'q2_middle',
    'q3_middle',
    'q4_middle'
];

$data_tb_data = fetchDataByDateRange($conn, 'tb_data', $tb_data_columns, $dateFrom, $dateTo, $shift);

echo json_encode($data_tb_data);




























// include 'conn3.php'; 

// function fetchDataByDateRange($conn, $tableName, $columns, $dateFrom, $dateTo, $shift = null) {
//     $dateFrom = date('Y-m-d', strtotime($dateFrom));
//     $dateTo = date('Y-m-d', strtotime($dateTo));


//     $sql = "SELECT " . implode(', ', $columns) . "
//             FROM [tube_inspection_db].[dbo].[$tableName]
//             WHERE ";


//     if ($shift === "Dayshift") {

//         $sql .= "(CAST(time_start AS DATETIME) BETWEEN ? AND ?) ";
//         $shiftFrom = $dateFrom . " 06:00:00";
//         $shiftTo = $dateFrom . " 17:59:59";
//         $params = array($shiftFrom, $shiftTo);
//     } elseif ($shift === "Night shift") {
   
//         $sql .= "(CAST(time_start AS DATETIME) BETWEEN ? AND ? OR CAST(time_start AS DATETIME) BETWEEN ? AND ?)";
//         $shiftFrom1 = $dateFrom . " 18:00:00";
//         $shiftTo1 = date('Y-m-d H:i:s', strtotime($dateFrom . ' 23:59:59'));
//         $shiftFrom2 = date('Y-m-d H:i:s', strtotime($dateTo . ' 00:00:00'));
//         $shiftTo2 = $dateTo . " 05:59:59";
//         $params = array($shiftFrom1, $shiftTo1, $shiftFrom2, $shiftTo2);
//     } else {

//         $sql .= "CAST(inspection_date AS DATE) BETWEEN ? AND ?";
//         $params = array($dateFrom, $dateTo);
//     }

//     $stmt = sqlsrv_query($conn, $sql, $params);
//     if ($stmt === false) {
//         die(print_r(sqlsrv_errors(), true));
//     }

  
//     $data = array();
//     while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
//         foreach ($columns as $column) {
//             if (!array_key_exists($column, $row)) {
//                 $row[$column] = null;
//             } else {
//                 if ($row[$column] instanceof DateTime) {
//                     $row[$column] = $row[$column]->format('Y-m-d H:i:s');
//                 }
//             }
//         }
//         $data[] = $row;
//     }

//     sqlsrv_free_stmt($stmt);
//     return $data;
// }

// $dateFrom = $_GET['date_from'] ?? null;
// $dateTo = $_GET['date_to'] ?? null;
// $shift = $_GET['shift'] ?? null;

// $tb_data_columns = [
//     'id',
//     'part_name',
//     'process',
//     'lot_no',
//     'serial_no',
//     'quantity',
//     'time_start',
//     'time_end',
//     'inspected_by',
//     'shift',
//     'inspection_date',
//     'total_mins',
//     'outside_appearance',
//     'slit_condition',
//     'inside_appearance',
//     'color',
//     'i_tolerance_plus',
//     'i_tolerance_minus',
//     'i_diameter_start',
//     'i_diameter_end',
//     'o_tolerance_plus',
//     'o_tolerance_minus',
//     'o_diameter_start',
//     'o_diameter_end',
//     'w_tolerance_plus',
//     'w_tolerance_minus',
//     'q1_start',
//     'q2_start',
//     'q3_start',
//     'q4_start',
//     'q1_end',
//     'q2_end',
//     'q3_end',
//     'q4_end',
//     'using_round_bar',
//     'using_bare_hands',
//     'appearance_judgement',
//     'dimension_judgement',
//     'ng_quantity',
//     'defect_type',
//     'confirm_by',
//     'remarks',
//     'q1_middle',
//     'q2_middle',
//     'q3_middle',
//     'q4_middle'
// ];

// $data_tb_data = fetchDataByDateRange($conn, 'tb_data', $tb_data_columns, $dateFrom, $dateTo, $shift);

// echo json_encode($data_tb_data);



?>
