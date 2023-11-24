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

                if ($rs === "seja bem vindo ao realinismo" || $rs === "bem vindo ao realinismo") {
                    $newProgress = 1;
                    $updateSql = "UPDATE users SET progress = '$newProgress' WHERE user_id = '$userId'";

                    if ($conn->query($updateSql) === TRUE) {
                        echo '<script>alert("Ótimo! Seu progresso foi atualizado com sucesso!");</script>';
                        echo '<script>alert("Resposta correta! Aqui está uma supresa...");</script>';
                        echo '<script>window.location.href = "conclusao.php";</script>';
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

<!-- --------------------------------------------- -->
<!-- Type: seja bem vindo ao realinismo          -->
<!-- --------------------------------------------  -->


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fase 5</title>
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

    </form>
    <div id="tudo">
        <header>
            <p>5</p>
            <div class="navbar">
                <div class="resposta">
                    <form action="fase5.php" method="post">
                        <input type="text" class="rs" name="rs" id="rs" autocomplete="off"
                            placeholder="Dica: Bem vindo?">
                        <input type="submit" value="Enviar" class="enviar">
                    </form>
                </div>
            </div>
        </header>





        <div class="tudo">
            <div class="enigma">
                <div style="display: flex; justify-content: center; margin-top: 2%;">
                    <p class="">B SFTQPTUB FTUÁ OPT DÓEJHPT</p> <br> <br>
                    <p style="margin-top: 5%; font-size: smaller;">Julio (César) - 1</p>
                </div>
            </div>

        </div>


        <div id="mainModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeMainModalBtn">&times;</span>
                <h1>Querido Diário, </h1>
                <div class="txtModalDia2">
                    <br>
                    Nesse momento, minha mente mergulhou em um caos sombrio, à beira do desespero absoluto. A única
                    ideia que me ocorreu foi a de procurar desesperadamente o psicólogo para discutir os eventos
                    perturbadores que me assombravam. Enquanto seguia em direção ao seu consultório, deparei-me com uma
                    multidão de pessoas vestidas de modo obscuro e macabro, evocando imediatamente a lembrança sinistra
                    dos membros da misteriosa seita.<br><br>

                    Uma sensação de paralisia e sufocamento incontrolável apertou meu peito, e, olhando ao redor,
                    percebi que todos aqueles indivíduos começaram a me perseguir, suas faces ocultas pela escuridão.
                    Com a mente tomada pelo pânico, só havia uma opção: fugir daquele pesadelo. Foi quando me encontrava
                    nas imediações do bairro onde Afonso residia. Sem hesitar, decidi procurar refúgio em seu
                    apartamento. No entanto, ao chegar, deparei-me com a porta entreaberta, indiciando algo terrível que
                    havia ocorrido.<br><br>

                    Subitamente, uma figura sombria e indistinta avançou em minha direção, congelando-me de medo. Em um
                    ato desesperado, corri em direção à cozinha, buscando qualquer coisa que pudesse me proteger, peguei
                    o primeiro objeto que consegui ver, uma faca, fui em sua direção e coloquei próximo a sua garganta,
                    me lembro dele me chamando de louco e gritando por socorro, mas enquanto ele gritava mais, eu tinha
                    terminado, cortei sua garganta. Quando percebi ele caindo sobre meus braços percebi a loucura que
                    tinha feito, na hora o medo e um desespero tomou conta de mim, pois se tratava de meu melhor amigo,
                    Afonso. De alguma maneira tinha que me livrar daquele corpo antes que alguém notasse a falta dele.
                    Mas vendo aquele sangue disperso pela sala me deu fome, foi aí que despertou um desejo, dividir em
                    porções para guardar e saborear mais tarde.<br><br>

                    Após ter consumado o ato, uma inegável sensação de irrevogabilidade tomou conta de mim. Foi então
                    que me veio à mente a visão da figura enigmática, vestida de preto, que havia profetizado seu desejo
                    de usar-me como instrumento para aplacar sua fome insaciável. Aterrorizado, compreendi que eu havia
                    cumprido o desejo macabro que ele sussurrara em meus ouvidos: o assassinato de pessoas. Mas,
                    considerando o que ele prometera além disso, o vislumbre de recompensas futuras, continuei na
                    expectativa. <br><br>

                    Diante de todos esses fatos, em minha mente se passava uma melodia ressoando em meus mais profundos
                    pensamentos que não cessava:
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
    <p class="timer" id="timer"></p>
    <br>
    <p class="demore" style="font-size: 25px;">Não demore, <span style="font-weight: bolder; color: #9669B5;;">
            <?php echo $name ?>
        </span>
    </p>
    <script src="fases.js"></script>
</body>

</html>