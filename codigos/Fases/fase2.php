<?php
session_start();
require_once '../Login/db_connect.php';

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['rs'])) {

        $rs = strtolower($_POST["rs"]);
        $userId = $_SESSION['user_id'];

        #checar se o cookie ainda é válido
        if (isset($_COOKIE['timer']) && $_COOKIE['timer'] > 0) {
            $selectSql = "SELECT progress FROM users WHERE user_id = '$userId'";
            $result = $conn->query($selectSql);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $currentProgress = $row['progress'];

                if ($rs === "a capela de ossos" || $rs === "capela de ossos" || $rs === "capela dos ossos" || $rs === "a capela dos ossos") {
                    $newProgress = 3;
                    $updateSql = "UPDATE users SET progress = '$newProgress' WHERE user_id = '$userId'";

                    if ($conn->query($updateSql) === TRUE) {
                        echo '<script>alert("Ótimo! Seu progresso foi atualizado com sucesso!");</script>';
                        echo '<script>alert("Resposta correta! Próxima fase...");</script>';
                        echo '<script>window.location.href = "fase3.php";</script>';
                    } else {
                        echo '<script>alert("Ops! Houve um problema ao atualizar o seu progresso: ' . $conn->error . '");</script>';
                    }
                } else {
                    echo '<script>alert("Resposta incorreta!");</script>';
                }
            } else {
                echo '<script>alert("Erro ao buscar o progresso do usuário: ' . $conn->error . '");</script>';
            }
        } else {
            echo '<script>alert("Que pena, o tempo se esgotou!");</script>';
            include '../Login/destroy_session.php';
            echo '<script>window.location.href = "../Login/index.php";</script>';
        }
    }
    $conn->close();
}

?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fase 2</title>
    <link rel="stylesheet" href="fases.css">
    <link rel="stylesheet" href="menu.css">
    <link rel="shortcut icon" type="imagex/png" href="./img/incognita.png">
</head>

<body>
    <nav class="circular-menu">

        <div class="circle">
            <a id="openModalButtonSlider" class="fa fa-gear fa-2x"></a>

            <div class="opacidade">
                <a href="" class="fa fa-facebook fa-2x"></a>
                <a href="" class="fa fa-twitter fa-2x"></a>
                <a href="" class="fa fa-linkedin fa-2x"></a>
                <a href="" class="fa fa-github fa-2x"></a>
                <a href="" class="fa fa-rss fa-2x"></a>
            </div>

            <a href="../../codigos/Login/pages/home/home-logado.php" class="fa fa-home fa-2x"></a>
            <a id="openModalBtn" class="fa fa-book fa-2x"></a>
        </div>

        <a class="menu-button fa fa-bars fa-2x"></a>

    </nav>
    <div id="tudo">
        <header>
            <p>2</p>
            <div class="navbar">
                <div class="resposta ">
                    <form action="fase2.php" method="post">
                        <input type="text" class="rs" name="rs" id="rs" autocomplete="off" placeholder="Dica: Local?">
                        <input type="submit" value="Enviar" class="enviar">
                    </form>
                </div>
            </div>

        </header>
        <div class="meio">
        <i class="fa fa-sun-o sun"><br> luceat</i>
        <h1 class="cod"> 38.56889920928527, -7.908806192879108</h1>
        </div>

        <div id="mainModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeMainModalBtn">&times;</span>
                <h1>Querido Diário, </h1>
                <div class="txtModal">
                    <br>
                    Hoje acordei depois de um longo pesadelo sobre o e-mail de ontem, li o mesmo cerca de 13 vezes sem
                    parar e não entendia sequer uma palavra daquele texto enigmático e melancólico. <br><br>

                    Após o almoço tentei procurar sobre na internet, não havia nada sobre esse tal de </E.V.A.> porém
                    descobri que esses sinais são de uma linguagem de programação chamada HTML, mas não consegui
                    assimilar essa informação a nada. <br> <br>

                    Decidi dar um tempo e dar andamento aos meus afazeres, fui ao mercado e depois a farmácia, porém no
                    trajeto todo senti como se eu estivesse sendo vigiado o tempo todo até que lembrei do endereço de
                    e-mail que era EVA@gmail.com. Tem algo brilhante no ar.. <br><br>
                </div>
            </div>
        </div>

        <div id="myModalSlider" class="modalSlider">
            <div class="modal-content">
                <h1 class="conftxt">CONFIGURAÇÕES</h1>
                <div class="slider-container">
                    <div class="brilho">
                        Brilho
                        <!-- Ícone de brilho -->
                    </div>
                    <input type="range" id="brightnessSlider" min="30" max="100" value="100">
                </div>
                <br>
                <div class="music-player__controls">
                    <audio id="myAudio" src="./music/1.mp3" autoplay loop controls></audio>
                </div>
                <div class="Fcenter"> <button class="fechar" id="closeModalSlider">Fechar</button></div>
            </div>
        </div>
    </div>


    </div>

    <p class="timer" id="timer"></p>
    <br>
    <p class="demore" style="font-size: 25px;">Não demore, <span style="font-weight: bolder; color: #9669B5;;">
        <?php echo $name ?></span>
    </p>
    <script src="fases.js"></script>

</body>

</html>