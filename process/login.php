<?php
session_name("tube_inspection");
session_start();

include 'conn3.php';

if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username, type FROM account WHERE username = ? AND password = ?";
    $params = array($username, $password);
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt && sqlsrv_execute($stmt)) {
        if (sqlsrv_has_rows($stmt)) {
            $result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            $type = $result['type'];
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['type'] = $type;

            if ($type == 'cot') {
                header('location: page/cot/cstart_point.php');
                exit;
            } elseif ($type == 'pvc') {
                header('location: page/pvc/pstart_point.php');
                exit;
            } elseif ($type == 'admin') { // Add this block for admin redirection
                header('location: page/admin/admin.php');
                exit;
            }
        } else {
            echo '<script>alert("Sign In Failed. Maybe an incorrect credential or account not found")</script>';
        }
    } else {
        echo '<script>alert("Sign In Failed. Error in preparing or executing SQL query.")</script>';
    }
}

if (isset($_POST['Logout'])) {
    session_unset();
    session_destroy();
    header('location: /tube_inspection/');
    exit;
}
?>
