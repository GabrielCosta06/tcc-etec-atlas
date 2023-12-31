<?php
require './db_connect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $update_query = "UPDATE users SET password = ?, reset_code = NULL WHERE user_id = ?";
    $update_stmt = $mysqli->prepare($update_query);
    $update_stmt->bind_param('si', $new_password, $user_id);
    $update_stmt->execute();

    echo "<script>alert('Senha resetada com sucesso. Redirecionando você para login...')</script>";
    header('Location: index.php');
}
