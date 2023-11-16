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

                if ($rs === "nao tem volta" || $rs === "não tem volta" || $rs === "nao tem mais volta" || $rs === "não tem mais volta") {
                    $newProgress = 4;
                    $updateSql = "UPDATE users SET progress = '$newProgress' WHERE user_id = '$userId'";

                    if ($conn->query($updateSql) === TRUE) {
                        echo '<script>alert("Ótimo! Seu progresso foi atualizado com sucesso!");</script>';
                        echo '<script>alert("Resposta correta! Próxima fase...");</script>';
                        echo '<script>window.location.href = "fase4.php";</script>';
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
    <title>Fase 3</title>
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
            <p>3</p>
            <div class="navbar">
                <div class="resposta">
                    <form action="fase3.php" method="post">
                        <input type="text" class="rs" name="rs" id="rs" autocomplete="off" placeholder="Dica: Tem volta?">
                        <input type="submit" value="Enviar" class="enviar">
                    </form>
                </div>
            </div>
        </header>

        <h2 class="morse">-. .- --- / - . -- / ...- --- .-.. - .-</h2>
        <br><br><br>

        <div class="select">select</div>


        <div id="mainModal" class="modal">
            <div class="modal-content">
            <span class="close" id="closeMainModalBtn">&times;</span>
                <h1>Querido Diário, </h1>
                <div class="txtModal">
                    <br>
                    O medo e o desespero começaram a se apoderar de mim, mas minha inabalável curiosidade para desvendar
                    o propósito daquele lugar misterioso era ainda mais forte.<br><br>

                    Decidi tomar um banho na esperança de acalmar minha mente e afastar momentaneamente esses
                    pensamentos perturbadores. No entanto, quanto mais eu tentava esquecer a situação, mais ela parecia
                    se infiltrar em minha consciência. Cada gota d'água que caía sobre mim era um lembrete constante da
                    incerteza que me cercava. Mesmo que eu desejasse profundamente libertar minha mente desses
                    pensamentos, a sensação de que estava embarcando em uma jornada irreversível se tornava cada vez
                    mais intensa.<br><br>

                    No meio deste vasto enigma de incerteza e medo, finalmente tomei a decisão de deixar o conforto do
                    meu apartamento e seguir até a misteriosa capela de ossos, ansioso para descobrir o que me aguardava
                    lá. Chamei um táxi e o motorista começou a me contar histórias estranhas que aconteciam na região,
                    mas eu estava determinado a prosseguir, focado apenas em desvendar o mistério que me aguardava na
                    capela. <br><br>

                    Ao chegar à entrada da capela, deparei-me com uma porta negra que, de repente, se abriu. Uma voz
                    ecoou de dentro, chamando-me para entrar. Nesse momento, minhas pernas tremeram incontrolavelmente,
                    um medo profundo e uma presença maligna pareciam dominar minha alma. Incapaz de resistir, fui
                    compelido a seguir adiante, embora incapaz de entender o que exatamente me controlava naquele
                    momento.<br><br>

                    Caminhando em direção a um ser envolto em uma capa negra, dois outros seres surgiram e me forçaram a
                    me prostrar diante dele. O misterioso ser começou a falar comigo, expressando sua necessidade de
                    saciar sua fome por almas e prometendo recompensas que eu nunca tinha sequer imaginado, contanto que
                    eu concordasse em fazer tudo o que ele desejava. Movido por uma profunda carência e controlado por
                    uma influência desconhecida, eu concordei.<br><br>

                    Naquele momento, parecia que eu havia perdido o controle do meu próprio corpo. Logo depois, acordei
                    na minha cidade natal, completamente desorientado e perplexo. Eu não tinha a menor ideia de como
                    tinha chegado ali. Inicialmente, pensei que tudo não passasse de um sonho, mas ao examinar meus
                    braços, percebi uma enigmática marca da qual não fazia a menor ideia do significado.
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
    <p style="font-size: 20px;" id="timer"></p>
    <br>
    <p style="font-size: 25px;">Não demore, <span style="font-weight: bolder; color: #9669B5;;">
            <?php echo $name ?>
        </span></p>
    <script src="fases.js"></script>

</body>

</html>