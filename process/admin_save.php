<?php
// Include the connection file
require_once 'conn3.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve and sanitize form data (sanitize as needed)
    // Example of basic sanitation, adjust as per your application's needs
  
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type =  $_POST['type'];
    

    // Prepare SQL statement
    $sql = "INSERT INTO account (
     username,
    password,type
) VALUES (
    ?, ?, ?
  
)";
    
    
    // Prepare the parameters array
    $params = array(
        $username, $password, $type
    );
    

    // Prepare and execute the SQL statement
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt === false) {
        // Error handling if prepare fails
        echo "Statement preparation error: " . print_r(sqlsrv_errors(), true);
    } else {
        // Execute the query
        if (sqlsrv_execute($stmt) === false) {
            // Error handling if execute fails
            echo "Execution error: " . print_r(sqlsrv_errors(), true);
        } else {
            // Success message
            echo "Data saved successfully.";
        }
    }
}
?>
