<?php
// Include the connection script
include 'conn3.php';

header('Content-Type: application/json');

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$search = isset($_GET['search']) ? $_GET['search'] : '';

try {
    $sql = "SELECT * FROM sp_cotdb";

    if (!empty($search)) {
        $sql .= " WHERE part_name LIKE ? OFFSET ? ROWS FETCH NEXT ? ROWS ONLY";
        $searchTerm = "%$search%";
        $params = array($searchTerm, $offset, $limit);
    } else {
        $sql .= " ORDER BY part_name OFFSET ? ROWS FETCH NEXT ? ROWS ONLY";
        $params = array($offset, $limit);
    }

    // Prepare and execute the SQL statement
    $stmt = sqlsrv_query($conn, $sql, $params);
    
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Fetch data as associative array
    $data = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $data[] = $row;
    }

    // Output JSON encoded data
    echo json_encode($data);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
sqlsrv_close($conn);
?>
