<?php
session_start();
require_once '../../db_connect.php';

function phpAlert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

//checo se o metodo é igual a post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //checando se as senhas coincidem
    if ($_POST['password'] != $_POST['confirmPassword']) {
        phpAlert('As senhas não coincidem!');
    } else {
        //se senhas coincidem, insere na tabela
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        phpAlert('Registro efetuado com sucesso!');
        //caso haja inserção de dados na tabela, então redireciona para página de login
        if ($conn->query($sql) === TRUE) {
            $_SESSION['email'] = $email;
            header("Location: ../../index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
?>


<!doctype html>
<html>

<head>
    <title>Registrar</title>
    <link rel="stylesheet" href="register.css">
    <link rel="shortcut icon" type="imagex/png" href="./img/incognita.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <header>
        <div class="max-width">
            <h1>Atlas</h1>
        </div>
    </header>
    <div class="box">
        <!-- English content here -->
        <div class="english-content">
            <h2 style="color: #BC6FF1; font-weight: bold; font-size: 45px;">Registrar-se</h2>
            <p>Registre-se agora!</p>
            <form action="register.php" method="post">
                <div class="inputBox">
                    <input type="email" name="email" id="email" autocomplete="off" required value="">
                    <label>E-mail</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" id="password" autocomplete="off" required value="">
                    <label>Senha</label>
                    <i class="far fa-eye" style="cursor: pointer; position: absolute; top: 50%; right: 10px; transform: translateY(-150%);" id="togglePassword"></i>
                </div>

                <div class="inputBox">
                    <input type="password" name="confirmPassword" id="confirmPassword" autocomplete="off" required value="">
                    <label>Confirmar senha</label>
                    <i class="far fa-eye" style="cursor: pointer; position: absolute; top: 50%; right: 10px; transform: translateY(-150%);" id="toggleConfirmPassword"></i>
                </div>
                <button type="submit" class="solid" id="register-button">Registrar</button>
                <button style="background: transparent; border: none; box-shadow: none; color: white;" type="button" class="clear" onclick="irLogin()">Login</button>
            </form>
        </div>
    </div>
    <script src="register.js"></script>
</body>

</html>