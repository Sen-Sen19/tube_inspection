<?php
// Include the connection script
include 'conn3.php';

// Set content type to JSON
header('Content-Type: application/json');

// Get data from AJAX request
$data = json_decode(file_get_contents('php://input'), true);
$usernames = $data['usernames'];

try {
    // SQL query to delete data based on usernames array
    $sql = "DELETE FROM account WHERE username IN (" . implode(',', array_fill(0, count($usernames), '?')) . ")";
    $params = $usernames;

    // Prepare and execute the SQL statement
    $stmt = sqlsrv_prepare($conn, $sql, $params);
    $result = sqlsrv_execute($stmt);
    
    if ($result === false) {
        // SQL query execution failed
        throw new Exception('SQL query execution failed: ' . print_r(sqlsrv_errors(), true));
    }

    // If deletion was successful
    echo json_encode(array('message' => 'Data deleted successfully'));

} catch (Exception $e) {
    // Handle exception, log error
    http_response_code(500); // Internal Server Error
    echo json_encode(array('message' => 'Error deleting data: ' . $e->getMessage()));
}

// Close connection
sqlsrv_close($conn);
?>
