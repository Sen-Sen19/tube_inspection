<?php

include 'conn3.php';


header('Content-Type: application/json');

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;


$partName = isset($_GET['partName']) ? $_GET['partName'] : '';
$inspectedBy = isset($_GET['inspectedBy']) ? $_GET['inspectedBy'] : '';
$defectType = isset($_GET['defectType']) ? $_GET['defectType'] : '';
$dateFrom = isset($_GET['dateFrom']) ? $_GET['dateFrom'] : '';
$dateTo = isset($_GET['dateTo']) ? $_GET['dateTo'] : '';

try {
    
    $sql = "SELECT * FROM tb_data";
    $params = array();

    
    $conditions = array();
    if (!empty($partName)) {
        $conditions[] = "part_name LIKE ?";
        $params[] = "%" . $partName . "%";
    }
    if (!empty($inspectedBy)) {
        $conditions[] = "inspected_by LIKE ?";
        $params[] = "%" . $inspectedBy . "%";
    }
    if (!empty($defectType)) {
        $conditions[] = "defect_type LIKE ?";
        $params[] = "%" . $defectType . "%";
    }
    
   
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }
    
    $dateConditions = array();
    if (!empty($dateFrom)) {
        $dateConditions[] = "inspection_date >= ?";
        $params[] = $dateFrom;
    }
    if (!empty($dateTo)) {
        $dateConditions[] = "inspection_date <= ?";
        $params[] = $dateTo;
    }
    if (!empty($dateConditions)) {
        if (empty($conditions)) {
            $sql .= " WHERE ";
        } else {
            $sql .= " AND ";
        }
        $sql .= implode(" AND ", $dateConditions);
    }


    $sql = "
        SELECT * FROM (
            SELECT ROW_NUMBER() OVER (ORDER BY time_start DESC) AS RowNum, *
            FROM ($sql) AS SubQuery
        ) AS RowConstrainedResult
        WHERE RowNum > ? AND RowNum <= ?
    ";

   
    $params[] = $offset;
    $params[] = $offset + $limit;

    
    $stmt = sqlsrv_query($conn, $sql, $params);
    
    if ($stmt === false) {
       
        throw new Exception('SQL query execution failed: ' . print_r(sqlsrv_errors(), true));
    }


    $data = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $data[] = $row;
    }

   
    echo json_encode($data);

} catch (Exception $e) {
   
    http_response_code(500); 
    echo json_encode(array('message' => 'Error fetching data: ' . $e->getMessage()));
}


sqlsrv_close($conn);
?>
