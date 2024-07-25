<?php

include 'conn3.php';


header('Content-Type: application/json');

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$search = isset($_GET['search']) ? $_GET['search'] : '';

try {
  
    $sql = "SELECT * FROM account";

   
    if (!empty($search)) {
        $sql .= " WHERE username LIKE ?";
        $searchTerm = "%$search%";
        $params = array($searchTerm);
    } else {
        $params = array();
    }

    
    $sql = "
        SELECT * FROM (
            SELECT ROW_NUMBER() OVER (ORDER BY username) AS RowNum, *
            FROM ($sql) AS SubQuery";

   
    if (!empty($search)) {
        $sql .= " WHERE username LIKE ?";
        $params[] = $searchTerm;
    }

   
    $sql .= ") AS RowConstrainedResult WHERE RowNum > ? AND RowNum <= ?";

    
    $params[] = $offset;
    $params[] = $offset + $limit;

  
    $stmt = sqlsrv_query($conn, $sql, $params);
    
    if ($stmt === false) {
      
        throw new Exception('SQL query execution failed: ' . print_r(sqlsrv_errors(), true));
    }

    
    $data = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
      
        $row['Delete'] = ''; 
        $data[] = $row;
    }

   
    echo json_encode($data);

} catch (Exception $e) {
   
    http_response_code(500);
    echo json_encode(array('message' => 'Error fetching data: ' . $e->getMessage()));
}

// Close connection
sqlsrv_close($conn);
?>
