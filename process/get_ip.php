<?php
// // Include the connection file
// include 'conn3.php';

// // Get the user's IP address
// function getUserIP() {
//     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//         return $_SERVER['HTTP_CLIENT_IP'];
//     } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//         return $_SERVER['HTTP_X_FORWARDED_FOR'];
//     } else {
//         return $_SERVER['REMOTE_ADDR'];
//     }
// }

// // Get the IP address
// $userIP = getUserIP();

// // Prepare the SQL query to insert the IP address
// $query = "INSERT INTO [dbo].[ip_address] ([ip]) VALUES (?)";

// // Prepare the SQL statement
// $params = array($userIP);

// // Execute the query
// $stmt = sqlsrv_query($conn, $query, $params);

// // Check if the query was successful
// if ($stmt === false) {
//     die(print_r(sqlsrv_errors(), true)); // Handle error if the query fails
// } else {
//     echo json_encode(['status' => 'success', 'message' => 'IP address saved successfully']);
// }


 
    // Include the connection file
    include 'conn3.php';

    // Get the user's IP address
    function getUserIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    // Get the IP address
    $userIP = getUserIP();

    // Check if the IP address already exists in the database
    $queryCheck = "SELECT COUNT(*) FROM [dbo].[ip_address] WHERE [ip] = ?";
    $paramsCheck = array($userIP);

    // Prepare the SQL statement to check for existence
    $stmtCheck = sqlsrv_query($conn, $queryCheck, $paramsCheck);

    // Check if the query was successful
    if ($stmtCheck === false) {
        die(print_r(sqlsrv_errors(), true)); // Handle error if the query fails
    }

    // Fetch the result of the check
    $row = sqlsrv_fetch_array($stmtCheck, SQLSRV_FETCH_ASSOC);
    $existingCount = $row[''];

    // If the IP address doesn't already exist, insert it
    if ($existingCount == 0) {
        // Prepare the SQL query to insert the IP address
        $queryInsert = "INSERT INTO [dbo].[ip_address] ([ip]) VALUES (?)";
        $paramsInsert = array($userIP);

        // Execute the insert query
        $stmtInsert = sqlsrv_query($conn, $queryInsert, $paramsInsert);

        // Check if the query was successful
        if ($stmtInsert === false) {
            die(print_r(sqlsrv_errors(), true)); // Handle error if the query fails
        } else {
            echo json_encode(['status' => 'success', 'message' => 'IP address saved successfully']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'IP address already exists']);
    }
?>
