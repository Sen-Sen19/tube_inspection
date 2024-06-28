<?php
// Include your connection file
include 'conn3.php';

// Retrieve POST data
if (isset($_POST['username']) && isset($_POST['newPassword'])) {
    $username = $_POST['username'];
    $newPassword = $_POST['newPassword'];

    // Check if the username is not 'admin'
    if ($username !== 'admin') {
        // SQL query to update password
        $sql = "UPDATE account SET password = ? WHERE username = ?";
        
        // Prepare and execute the statement
        $params = array($newPassword, $username);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            // SQL error occurred
            $error_message = print_r(sqlsrv_errors(), true);
            http_response_code(500); // Internal Server Error
            echo "Failed to update password. SQL Error: " . $error_message;
        } else {
            // Password updated successfully
            echo "Password updated successfully!";
        }
    } else {
        // Admin user cannot change password
        http_response_code(403); // Forbidden
        echo "Error: You do not have permission to change the admin password.";
    }

    sqlsrv_close($conn); // Close the connection
} else {
    // Missing POST data
    http_response_code(400); // Bad Request
    echo "Error: Missing POST data.";
}
?>
