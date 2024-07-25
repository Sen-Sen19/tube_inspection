<?php

require_once 'conn3.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   
  
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type =  $_POST['type'];
    


    $sql = "INSERT INTO account (
     username,
    password,type
) VALUES (
    ?, ?, ?
  
)";
    
    

    $params = array(
        $username, $password, $type
    );
    

   
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt === false) {
       
        echo "Statement preparation error: " . print_r(sqlsrv_errors(), true);
    } else {
      
        if (sqlsrv_execute($stmt) === false) {
          
            echo "Execution error: " . print_r(sqlsrv_errors(), true);
        } else {
        
            echo "Data saved successfully.";
        }
    }
}
?>
