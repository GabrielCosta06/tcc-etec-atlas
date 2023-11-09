<?php
session_start();
require_once '../../db_connect.php';

function phpAlert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

//checo se o metodo é igual a post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //checando se as senhas coincidem
    if ($_POST['password'] != $_POST['confirmPassword']) {
        phpAlert('As senhas não coincidem!');
    } else {
        //se senhas coincidem, insere na tabela
        $sql = "INSERT INTO users (email, name, password) VALUES ('$email', '$name', '$password')";
        //caso haja inserção de dados na tabela, então redireciona para página de login
        if ($conn->query($sql) === TRUE) {
            $_SESSION['email'] = $email;
            phpAlert('Registro efetuado com sucesso!');
            header("Location: ../../index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="../../index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="shortcut icon" type="imagex/png" href="./img/incognita.png">

</head>

<body>
    <div class="container flex">
        <div class="facebook-page flex">
            <div class="text">
                <h1>incógnita</h1>
                <p>Jogue o nosso game misterioso </p>
                <p> e veja se é capaz.</p>
            </div>
            <form action="register.php" method="post">
                <input type="text" name="name" id="name" placeholder="Nome" required>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <p>
                    <input type="password" name="password" id="password" placeholder="Senha" required>
                    <i style="display: none;" class="far fa-eye" id="togglePassword"></i>
                </p>
                <p>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirmar senha" required>
                    <i style="display: none;" class="far fa-eye" id="togglePassword2"></i>
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