<?php
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($query);  
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $reset_code = uniqid();

        $update_query = "UPDATE users SET reset_code = ? WHERE user_id = ?";
        $update_stmt = $mysqli->prepare($update_query);
        $update_stmt->bind_param('si', $reset_code, $user['user_id']);
        $update_stmt->execute();

        $reset_url = "http://localhost/tcc-etec-atlas/codigos/Login/resetPassword.php?code=$reset_code";
        header("Location: $reset_url");
        exit();
    } else {
        echo "<script>alert('Email não encontrado.')</script>";
    }
}
?>
