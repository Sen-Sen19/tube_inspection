<?php

include 'conn3.php';


header('Content-Type: application/json');


$data = json_decode(file_get_contents('php://input'), true);
$usernames = $data['usernames'];

try {

    $sql = "DELETE FROM account WHERE username IN (" . implode(',', array_fill(0, count($usernames), '?')) . ")";
    $params = $usernames;


    $stmt = sqlsrv_prepare($conn, $sql, $params);
    $result = sqlsrv_execute($stmt);
    
    if ($result === false) {
 
        throw new Exception('SQL query execution failed: ' . print_r(sqlsrv_errors(), true));
    }


    echo json_encode(array('message' => 'Data deleted successfully'));

} catch (Exception $e) {
 
    http_response_code(500); 
    echo json_encode(array('message' => 'Error deleting data: ' . $e->getMessage()));
}


sqlsrv_close($conn);
?>
