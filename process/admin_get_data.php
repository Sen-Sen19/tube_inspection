<?php
// Include the connection script
include 'conn3.php';

// Set content type to JSON
header('Content-Type: application/json');

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$search = isset($_GET['search']) ? $_GET['search'] : '';

try {
    // Base SQL query without pagination
    $sql = "SELECT * FROM account";

    // Check if search term is provided
    if (!empty($search)) {
        $sql .= " WHERE username LIKE ?";
        $searchTerm = "%$search%";
        $params = array($searchTerm);
    } else {
        $params = array();
    }

    // Add ORDER BY clause and ROW_NUMBER() for pagination
    $sql = "
        SELECT * FROM (
            SELECT ROW_NUMBER() OVER (ORDER BY username) AS RowNum, *
            FROM ($sql) AS SubQuery";

    // Add WHERE clause if search term is provided
    if (!empty($search)) {
        $sql .= " WHERE username LIKE ?";
        $params[] = $searchTerm;
    }

    // Finish SQL query for pagination
    $sql .= ") AS RowConstrainedResult WHERE RowNum > ? AND RowNum <= ?";

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
        // Add a new key 'Delete' with an empty value for each row
        $row['Delete'] = ''; // This will be populated with checkboxes in the HTML
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
