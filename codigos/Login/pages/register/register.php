<?php
session_start();
require_once '../../db_connect.php';

function phpAlert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $checkQuery = "SELECT * FROM users WHERE email = '$email' OR name = '$name'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult-> num_rows > 0) {
        phpAlert('Email ou nome já existem.');
    } else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if ($_POST['password'] != $_POST['confirmPassword']) {
            phpAlert('Senhas não coincidem!');
        } else {
            $insertQuery = "INSERT INTO users (email, name, password) VALUES ('$email', '$name', '$password')";

            if ($conn->query($insertQuery) === TRUE) {
                $_SESSION['email'] = $email;
                echo "<script>alert('Registrado com sucesso! Redirecionando...'); alert('Agora faça o login com sua nova conta!');";
                echo 'window.setTimeout(function(){ window.location.href = "../../index.php"; }, 1);';
                echo '</script>';
                exit();
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
        }
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="shortcut icon" type="imagex/png" href="../../Fases/img/incognita.png">
    <link rel="stylesheet" href="../../index.css">

</head>

<body>
    <div class="container flex">
        <div class="facebook-page flex">
            <div class="text">
                <br><br><br>
                <h1>incógnita</h1>
                <p>Jogue o nosso game misterioso </p>
                <p> e veja se é capaz.</p>
            </div>
            <form action="register.php" method="post">
                <input type="text" name="name" id="name" placeholder="Nome" required>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <p>
                    <input type="password" name="password" id="password" placeholder="Senha" required>
                    <i style="display: none; color: #000;" class="far fa-eye" id="togglePassword"></i>
                </p>
                <p>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirmar senha" required>
                    <i style="display: none; color: #000;" class="far fa-eye" id="togglePassword2"></i>
                </p>
                <div class="link">
                    <button type="submit" class="login">Registrar</button>
                    <a href="#" class="forgot">Está com algum problema?</a>
                </div>
                <hr>
                <div class="button">
                    <a onclick="irLogin()">Já possuo uma conta</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="register.js"></script>

</html>