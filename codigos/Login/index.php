<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['email'] = $email;
          $_SESSION['progress'] = $row['progress'];
      
          $page = "fase" . $row['progress'] . ".php";
          header("Location: " . $page);
          exit;
      } else {
          echo "Senha incorreta!";
      }
      
    } else {
        echo "Usuário não encontrado!";
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
    <script src="index.js"></script>
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
                    <input type="password" name="password" id="password" required value="">
                    <label>Senha</label>
                </div>
                <button type="button" class="clear" id="recover-password-button" disabled="true">Recuperar
                    senha</button>
                <button type="submit" class="solid" id="login-button">Login</button>
                <button style="background: transparent; border: none; box-shadow: none; color: white;" type="button"
                    class="outline" onclick="irRegistro()">Registrar</button>
            </form>
        </div>
    </div>
</body>

</html>
