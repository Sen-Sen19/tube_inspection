<?php

include 'conn3.php';


if (isset($_POST['username']) && isset($_POST['newPassword'])) {
    $username = $_POST['username'];
    $newPassword = $_POST['newPassword'];

  
    if ($username !== 'admin') {
       
        $sql = "UPDATE account SET password = ? WHERE username = ?";
        
        
        $params = array($newPassword, $username);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            
            $error_message = print_r(sqlsrv_errors(), true);
            http_response_code(500); 
            echo "Failed to update password. SQL Error: " . $error_message;
        } else {
          
            echo "Password updated successfully!";
        }
    } else {
        
        http_response_code(403); 
        echo "Error: You do not have permission to change the admin password.";
    }

    sqlsrv_close($conn); 
} else {
   
    http_response_code(400); 
    echo "Error: Missing POST data.";
}
?>
