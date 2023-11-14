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
<html>
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
      <br>
      <br>
  <form>
    <label for="lang-switch">
        <span lang="pt">Idioma</span>
        <span lang="en">Language</span>
    </label>
    <select id="lang-switch">
        <option value="en">English</option>
        <option value="pt" selected>Português</option>
    </select>
  </form>
    </div>
    <form method="post" action="index.php">
    <input type="email" name="email" id="email" placeholder="Email" required>
    <p>
        <input type="password" name="password" id="password" placeholder="Senha" required lang="pt">
        <input type="password" name="password" id="password" placeholder="Password" required lang="en">
        <i style="display: none; color: #000;" class="far fa-eye" id="togglePassword"></i>
    </p>
      <div class="link">
        <button type="submit" class="login" lang="pt">Entrar</button>
        <button type="submit" class="login" lang="en">Sign In</button>
        <a href="forgot_password.php" class="forgot" lang="pt">Esqueceu a senha?</a>
        <a href="forgot_password.php" class="forgot" lang="en">Forgot password?</a>
      </div>
      <hr>
      <div class="button">
        <a onclick="irRegistrar()" lang="pt">Criar nova conta</a>
        <a onclick="irRegistrar()" lang="en">Sign up</a>
      </div>
    </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="index.js"></script>
  
</body>
</html>
