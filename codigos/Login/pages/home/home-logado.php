<?php
session_start();
require_once '../../db_connect.php';

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
} else {
    header("Location: ../../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['logout'])) {
        $_SESSION = array();

        session_destroy();

        echo "<script>alert('Deslogado com sucesso.'); alert('Faça o login novamente!');";
        echo 'window.setTimeout(function(){ window.location.href = "../../index.php"; }, 1);';
        echo '</script>';
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['jogar'])) {
            if (isset($_SESSION['progress'])) {
                $savedProgress = $_SESSION['progress'];
                $page = "fase" . $savedProgress . ".php";
                header("Location: ../../../Fases/" . $page);
                exit;
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home-logado.css">
    <link rel="shortcut icon" type="imagex/png" href="../../../Fases/img/incognita.png">
</head>

<body>
    <main>
        <header>
            <div class="max-width">
                <h1>Atlas</h1>
                <div class="login-texto">
                    <ul style="display: flex;">
                        <li><a href="#">Bem-vindo(a): <br><a style="font-size: 18px; text-decoration: none; font-weight: lighter;" href="#"><?php echo $name; ?></a></a></li>
                        <li><a href="#">
                                <form action="home-logado.php" method="post">
                                    <button class="botao-sair" type="submit" name="logout">Sair</button>
                                </form>
                            </a></li>
                    </ul>
                </div>
            </div>
        </header>

        <section class="content1">
            <img src="1.png" alt="">
            <div class="max-width">
                <div class="master">
                    <div class="principal">
                        <h1 class="glitch layers font"><span>Incógnita,</span><br></h1>
                        <h1>O enigma.</h1>
                    </div>
                    <div class="sj">
                        <div class="jogar">
                            <p>Você joga e se diverte!<br><span class="cinza">Tá esperando o que?</span></p>
                            <br>
                            <form action="home-logado.php" method="post">
                                <button name="jogar">Jogar</button>
                            </form>
                        </div>
                        <div class="sobre">
                            <p>Grupo ATLAS<br><span>ETEC - IPIA</span></p>
                            <br>
                            <button id="openModalBtn">Sobre</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="modal" class="modal">
                <div class="modal-content">
                    <span id="closeModalBtn" class="close">&times;</span>
                    <div class="tsobre">
                        <h1>SOBRE</h1>
                    </div>
                    <br>
                    <p class="sobretext"> - Nosso TCC tem como base um site de enigmas, com o objetivo de desenvolver um método criativo, que
                        estimula a capacidade cognitiva.​<br><br>

                        - Esse site conta com 5 enigmas, abordando temas do curso Informática Para Internet e variados. Boa sorte!
                    </p>
                </div>
            </div>
        </section>
    </main>
    <script src="home.js"></script>
</body>

</html>