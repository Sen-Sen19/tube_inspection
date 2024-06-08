<?php
session_name("tube_inspection");
session_start();

include 'conn.php';

if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username, type FROM account WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $params = array($username, $password);
    $stmt->execute($params);
    if ($stmt->rowCount() > 0) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
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
        }
    } else {
        echo '<script>alert("Sign In Failed. Maybe an incorrect credential or account not found")</script>';
    }
}

if (isset($_POST['Logout'])) {
    session_unset();
    session_destroy();
    header('location: /tube_inspection/');
    exit;
}
?>
