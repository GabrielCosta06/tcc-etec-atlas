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
            $_SESSION['name'] = $row['name'];
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
<html lang="pt" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="shortcut icon" type="imagex/png" href="./Fases/img/incognita.png">
  <link rel="stylesheet" href="./index.css">

</head>
<body>
<div class="container flex">
  <div class="facebook-page flex">
    <div class="text">
      <h1>incógnita</h1>
      <p>Jogue o nosso game misterioso </p>
      <p> e veja se é capaz.</p>
    </div>
    <form method="post" action="index.php">
    <input type="email" name="email" id="email" placeholder="Email" required>
    <p>
        <input type="password" name="password" id="password" placeholder="Senha" required>
        <i style="display: none;" class="far fa-eye" id="togglePassword"></i>
    </p>
      <div class="link">
        <button type="submit" class="login">Entrar</button>
        <a href="#" class="forgot">Esqueceu a senha?</a>
      </div>
      <hr>
      <div class="button">
        <a onclick="irRegistrar()">Criar nova conta</a>
      </div>
    </form>
  </div>
  <script src="index.js"></script>
</div>
  
</body>
</html>
