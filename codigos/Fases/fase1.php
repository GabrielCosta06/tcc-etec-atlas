<?php
session_start();
require_once '../Login/db_connect.php';

// sessão: $userId e $name
require 'sessaoNome-ID.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['rs'])) {
        $rs = strtolower(trim($_POST["rs"]));

        #checar se o cookie ainda é válido
        if (isset($_COOKIE['timer']) && $_COOKIE['timer'] > 0) {
            if ($rs === "tobias") {
                $newProgress = 2;
                $updateSql = "UPDATE users SET progress = '$newProgress' WHERE user_id = '$userId'";
                $_SESSION['progress'] = $newProgress;

                if ($conn->query($updateSql) === TRUE) {
                    echo '<script>alert("Ótimo! Seu progresso foi atualizado com sucesso!");</script>';
                    echo '<script>alert("Resposta correta! Próxima fase...");</script>';
                    echo '<script>window.location.href = "fase2.php";</script>';
                } else {
                    echo '<script>alert("Ops! Houve um problema ao atualizar o seu progresso: ' . $conn->error . '");</script>';
                }
            } else {
                echo '<script>alert("Resposta incorreta!");</script>';
            }
        } else {
            echo '<script>alert("Que pena, o tempo se esgotou!");</script>';
            include '../Login/destroy_session.php';
            echo '<script>window.location.href = "../Login/index.php";</script>';
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fase 1</title>
    <link rel="stylesheet" href="fases.css">
    <link rel="stylesheet" href="menu.css">
    <link rel="shortcut icon" type="imagex/png" href="./img/incognita.png">


</head>

<body>

    <nav class="circular-menu">

        <div class="circle">
            <a id="openModalButtonSlider" class="fa fa-gear fa-2x"></a>

            <div class="opacidade">
                <a class="fa fa-facebook fa-2x"></a>
                <a class="fa fa-twitter fa-2x"></a>
                <a class="fa fa-linkedin fa-2x"></a>
                <a class="fa fa-github fa-2x"></a>
                <a class="fa fa-rss fa-2x"></a>
            </div>

            <a href="../../codigos/Login/pages/home/home-logado.php" class="fa fa-home fa-2x"></a>
            <a id="openModalBtn" class="fa fa-book fa-2x"></a>
        </div>

        <a class="menu-button fa fa-bars fa-2x"></a>
    </nav>
    <div id="tudo">

        <header>
            <p>1</p>
            <div class="navbar">
                <div class="resposta">
                    <form action="fase1.php" method="post">
                        <input type="text" class="rs" name="rs" id="rs" autocomplete="off"
                            placeholder="Dica: Seu nome?">
                        <input type="submit" value="Enviar" class="enviar">
                    </form>
                </div>
            </div>
        </header>
        <div class="iframe" style="display: flex; justify-content: center; margin-top: 2%;">
            <div id="iframe-container" style="width: 60%;">
                <div
                    style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                    <iframe id="myIframe"
                        src="https://www.jigsawplanet.com/?rc=play&amp;pid=2f72a962898b&amp;view=iframe"
                        style="position: absolute; width: 100%; height: 100%; border: none;"></iframe>
                </div>
            </div>
        </div>


        <div id="mainModal" class="modal">
            <div class="modal-content">
                <span id="closeMainModalBtn" class="close">&times;</span>
                <h1>Querido Diário, </h1>
                <div class="txtModal">
                    <br>Hoje foi um dia surpreendente, cheio de mistério e reviravoltas. Comecei minha manhã de
                    forma
                    rotineira,
                    mas uma surpresa me aguardava: um e-mail anônimo no meu celular. Pensei que fosse uma
                    brincadeira
                    dos
                    meus
                    amigos, mas logo percebi que havia algo diferente. O endereço IP indicava que vinha da China, o
                    que
                    me
                    fez
                    lembrar da série "Mr. Robot".

                    Comecei a me questionar sobre o conteúdo do e-mail. ​<br><br>
                    <button class="emailbtn" id="openEmailModalBtn">Email</button><br>
                    <br>
                    Mesmo com a curiosidade à espreita, a vida continuou seguindo seu curso. Cuidei do meu cachorro
                    Tobias,
                    fiz
                    algumas tarefas de casa e me preparei para sair com meus amigos. Passamos um tempo no parque,
                    conversando e
                    relaxando. Aproveitei a oportunidade para mencionar o e-mail misterioso, mas todos negaram
                    qualquer
                    envolvimento e pareciam tão confusos quanto eu.
                    <br><br>
                    Ao voltar para casa, decidi reler o e-mail com mais atenção. Foi aí que percebi algo estranho
                    nas
                    palavras,
                    algo que não havia notado antes. Uma sensação de suspense começou a tomar conta de mim, como se
                    estivesse no
                    meio de um enigma a ser decifrado.

                    Estou intrigado com toda essa situação. Quem poderia ter enviado o e-mail da China? O que ele
                    realmente
                    quer
                    dizer? Cada vez mais, sinto que estou entrando em um terreno desconhecido, onde cada nova pista
                    pode
                    revelar
                    algo surpreendente.
                    <br><br><br>
                    Até breve,<br>
                    Antônio
                </div>
            </div>
        </div>
        <div id="emailModal" class="modalEmail">
            <div class="modal-content">
                <span class="close" id="closeEmailModalBtn">&times;</span>
                <h2 class="glitch layers font email">Email</h2>
                <div class="txtModalEmail">
                    <br>
                    Assunto: Convocação
                    <br><br>
                    Para Antonio,
                    <br><br>
                    Das sombras mais densas, nossas palavras se materializam. O seu coração trilha a linha tênue,
                    entre
                    a
                    claridade frágil e o abismo. Uma melodia singular de compreensão obscurecida.
                    <br><br>
                    Nos recantos profundos de nossa reflexão, desvelamos segredos ocultos, acolhendo gestos
                    enigmáticos
                    como
                    os seus. Estendemos a você o convite para desbravar conosco os corredores da compreensão
                    sombria,
                    onde a
                    sabedoria ancestral permanece.
                    <br><br>
                    Entretanto, a jornada que propomos é para os destemidos. Se o sombrio chamar do seu ser ressoar,
                    permaneceremos no limiar, prontos para guiar sua senda, quando sua alma estiver disposta a
                    desafiar
                    o
                    desconhecido.
                    <br><br>
                    Com implacabilidade,
                    <br><br>
                    [E.V.A]
                </div>
            </div>
        </div>


        <div id="myModalSlider" class="modalSlider">
            <div class="modal-content">
                <h1 class="conftxt">CONFIGURAÇÕES</h1>
                <div class="slider-container">
                    <div class="brilho">
                        Brilho
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
    </p>
    <script src="fase1.js"></script>

</body>

</html>