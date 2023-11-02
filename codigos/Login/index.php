<?php
session_start();
require_once 'db_connect.php';

function phpAlert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);


    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            phpAlert('Logado com sucesso! Redirecionando...');
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $email;
            $_SESSION['progress'] = $row['progress'];
            header("Location: ./pages/home/home-logado.php");
            exit;
        } else {
            phpAlert('Senha incorreta!');
        }
    } else {
        phpAlert("Usuário não encontrado!");
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel de Login</title>
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" type="imagex/png" href="./Fases/img/incognita.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <header>
        <div class="max-width">
            <h1>Atlas</h1>
        </div>
    </header>
    <div class="box">
        <div class="english-content">
            <h2 style="color: #BC6FF1; font-weight: bold; font-size: 45px;">Login</h2>
            <p>Faça login!</p>
            <form method="post" action="index.php">
                <div class="inputBox">
                    <input type="email" name="email" autocomplete="off" id="email" required value="">
                    <label>E-mail</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" id="password" autocomplete="off" required value="">
                    <label>Senha</label>
                    <i class="far fa-eye"
                        style="cursor: pointer; position: absolute; top: 50%; right: 10px; transform: translateY(-150%);"
                        id="togglePassword"></i>
                </div>
                <button type="button" class="clear" id="recover-password-button" disabled="true">Recuperar senha</button>
                <button type="submit" class="solid" id="login-button">Login</button>
                <button style="background: transparent; border: none; box-shadow: none; color: white;" type="button" class="outline" onclick="irRegistrar()">Registrar</button>
            </form>
        </div>
    </div>
    <script src="index.js"></script>
</body>

</html>