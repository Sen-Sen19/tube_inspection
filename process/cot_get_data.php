<?php
// Include the connection script
include 'conn3.php';

// Set content type to JSON
header('Content-Type: application/json');

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;

// Get search parameters
$partName = isset($_GET['partName']) ? $_GET['partName'] : '';
$inspectedBy = isset($_GET['inspectedBy']) ? $_GET['inspectedBy'] : '';
$defectType = isset($_GET['defectType']) ? $_GET['defectType'] : '';
$dateFrom = isset($_GET['dateFrom']) ? $_GET['dateFrom'] : '';
$dateTo = isset($_GET['dateTo']) ? $_GET['dateTo'] : '';

try {
    // Base SQL query without pagination
    $sql = "SELECT * FROM tb_data";
    $params = array();

    // Build the WHERE clause if any search parameters are provided
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
    
    // Append WHERE clause to the SQL if any conditions exist
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

    // Add ORDER BY clause and ROW_NUMBER() for pagination
    $sql = "
        SELECT * FROM (
            SELECT ROW_NUMBER() OVER (ORDER BY id) AS RowNum, *
            FROM ($sql) AS SubQuery
        ) AS RowConstrainedResult
        WHERE RowNum > ? AND RowNum <= ?
    ";

    // Add offset and limit to parameters
    $params[] = $offset;
    $params[] = $offset + $limit;

    // Prepare and execute the SQL statement
    $stmt = sqlsrv_query($conn, $sql, $params);
    
    if ($stmt === false) {
        // SQL query execution failed
        throw new Exception('SQL query execution failed: ' . print_r(sqlsrv_errors(), true));
    }

    // Fetch data as associative array
    $data = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $data[] = $row;
    }

    // Output JSON encoded data
    echo json_encode($data);

} catch (Exception $e) {
    // Handle exception, log error
    http_response_code(500); // Internal Server Error
    echo json_encode(array('message' => 'Error fetching data: ' . $e->getMessage()));
}

// Close connection
sqlsrv_close($conn);
?>
