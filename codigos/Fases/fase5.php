<?php


// Vamos iniciar a sessão para garantir que o usuário permaneça conectado
session_start();

// Certifico de que a variável de sessão esteja definida antes de acessá-la
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Estabeleço uma conexão com o banco de dados antes de usar a variável $conn
    require_once '../Login/db_connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $progress = 5; // ou qualquer outro valor apropriado que você deseja atribuir

        // Consulta SQL para atualizar o valor do progresso para o usuário
        $sql = "UPDATE users SET progress = '$progress' WHERE user_id = '$userId'";

        if ($conn->query($sql) === TRUE) {
            // Converto o comando echo do PHP em um alerta em JavaScript
            echo '<script>alert("Ótimo! Seu progresso foi atualizado com sucesso!")</script>';
        } else {
            // Converto o comando echo do PHP em um alerta em JavaScript
            echo '<script>alert("Erro ao atualizar o registro: ' . $conn->error . '")</script>';
        }
        $conn->close();
    }
} else {
    // Converto o comando echo do PHP em um alerta em JavaScript
    echo '<script>alert("ID do usuário não definido na sessão.")</script>';
}
?>



<!DOCTYPE html>
<html lang="en">

<!-- --------------------------------------------- -->
<!-- DiGiTe: seja bem vindo ao realinismo          -->
<!-- --------------------------------------------  -->


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fase 5</title>
    <link rel="stylesheet" href="fase1.css">
    <link rel="stylesheet" href="menu.css">
    <link rel="shortcut icon" type="imagex/png" href="./img/incognita.png">
    <style>
        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: #7e57c2;
            border: none;
            color: #ffffff;
            text-align: center;
            font-size: 16px;
            padding: 10px;
            width: 120px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
            font-family: Arial, sans-serif;
        }

        .button:hover {
            background-color: #5d4099;
        }
    </style>
</head>

<body>
    <header>
        <p>5</p>
        <div class="navbar">
            <div class="resposta">
                <input type="text" class="rs" id="rs" autocomplete="off" placeholder="...">

                <input type="submit" value="Enviar" class="enviar" onclick="verificarResposta()">
            </div>
            <form action="fase5.php" method="post">
                <audio id="myAudio" src="./music/1.mp3" autoplay loop controls></audio>
                <button type="submit" name="save_progress" class="button">Salvar Progresso</button>
            </form>
        </div>
    </header>
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
            <a id="openEmailModalBtn" class="fa fa-book fa-2x"></a>
        </div>

        <a class="menu-button fa fa-bars fa-2x"></a>

    </nav>

    <form action="fase5.php" method="post">
        <div class="salvar"> <button type="submit" name="save_progress" class="button">Salvar Progresso</button>
        </div>
    </form>
    <div id="tudo">
        <header>
            <p>5</p>
            <div class="navbar">
                <div class="resposta">
                    <input type="text" class="rs" id="rs" autocomplete="off" placeholder="Bem vindo ?">

                    <input type="submit" value="Enviar" class="enviar" onclick="verificarResposta()">

                </div>
            </div>
        </header>





        <div class="tudo">
            <div style="display: flex; justify-content: center; margin-top: 2%;">
                <p>B SFTQPTUB FTUÁ OPT DÓEJHPT</p>
            </div>
            <p>Julio César</p>
        </div>



        <div id="emailModal" class="modaldia2">
            <div class="modal-content">
                <span class="close" id="closeEmailModalBtn">&times;</span>
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
    <p style="font-size: 20px;" id="countdown"></p>
    <script>
        var userInputField = document.getElementById('userInput');
        var countdownElement = document.getElementById('countdown');
        var timeLeft = 120;

        function updateCountdown() {
            var minutes = Math.floor(timeLeft / 60);
            var seconds = timeLeft % 60;

            seconds = seconds < 10 ? '0' + seconds : seconds;

            countdownElement.innerHTML = 'Tempo restante: ' + minutes + ':' + seconds;

            if (timeLeft > 0) {
                timeLeft--;
                setTimeout(updateCountdown, 1000);
            } else {
                alert('O tempo se esgotou, você perdeu! Tente novamente!');
                window.location.href = '../Login/destroy_session.php';
            }
        }

        updateCountdown();
        // Demo by http://creative-punch.net

        var items = document.querySelectorAll('.circle a');

        for (var i = 0, l = items.length; i < l; i++) {
            items[i].style.left = (50 - 35 * Math.cos(-0.5 * Math.PI - 2 * (1 / l) * i * Math.PI)).toFixed(4) + "%";

            items[i].style.top = (50 + 35 * Math.sin(-0.5 * Math.PI - 2 * (1 / l) * i * Math.PI)).toFixed(4) + "%";
        }

        document.querySelector('.menu-button').onclick = function (e) {
            e.preventDefault();
            document.querySelector('.circle').classList.toggle('open');
        }



        //VERIDFICAÇÃO DE RESPOSTA

        function verificarResposta() {
            var rs = document.getElementById("rs").value;
            if (rs.toLowerCase() === "SEJA BEM VINDO AO RAELIANISMO" || rs.toLowerCase() === "seja bem vindo ao realinismo") {
                window.alert("Resposta correta! Próxima fase...");
                window.location.href = 'conclusao.html';

            } else {
                alert("Resposta incorreta!");
            }
        }

        function openPopup() {
            const windowFeatures = "left=800,top=350,width=320,height=320";
            window.open('sobre.html', 'popup', windowFeatures);
        }

        //modalEmail
        const openEmailModalBtn = document.getElementById("openEmailModalBtn");
        const emailModal = document.getElementById("emailModal");
        const closeEmailModalBtn = document.getElementById("closeEmailModalBtn");
        //modalSlider
        const openModalButtonSlider = document.getElementById("openModalButtonSlider");
        const closeModalSlider = document.getElementById("closeModalSlider");
        const modalSlider = document.getElementById("myModalSlider");
        const brightnessSlider = document.getElementById("brightnessSlider");

        let isEmailModalDraggable = false;

        // Função para tornar o modal de email arrastável
        function makeEmailModalDraggable() {
            emailModal.style.cursor = "grab";
            emailModal.style.userSelect = "none";

            emailModal.addEventListener("mousedown", startDraggingEmailModal);
            emailModal.addEventListener("mouseup", stopDraggingEmailModal);
        }

        // Função para iniciar o arrastamento do modal de email
        function startDraggingEmailModal(e) {
            isEmailModalDraggable = true;
            offsetEmailModalX = e.clientX - emailModal.getBoundingClientRect().left;
            offsetEmailModalY = e.clientY - emailModal.getBoundingClientRect().top;
            emailModal.style.cursor = "grabbing";
        }

        // Função para parar o arrastamento do modal de email
        function stopDraggingEmailModal() {
            isEmailModalDraggable = false;
            emailModal.style.cursor = "grab";
        }

        // Função para mover o modal de email durante o arrastamento
        function dragEmailModal(e) {
            if (isEmailModalDraggable) {
                emailModal.style.left = e.clientX - offsetEmailModalX + "px";
                emailModal.style.top = e.clientY - offsetEmailModalY + "px";
            }
        }

        // Event listeners para tornar os modais arrastáveis
        makeEmailModalDraggable();

        // Event listeners para arrastar os modais
        document.addEventListener("mousemove", dragEmailModal);

        // Função para abrir o modal de email
        openEmailModalBtn.addEventListener("click", () => {
            emailModal.style.display = "block";
            emailModal.style.opacity = '100%';
        });

        // Função para fechar o modal de email
        closeEmailModalBtn.addEventListener("click", () => {
            emailModal.style.display = "none";
        });



        //OPen config
        openModalButtonSlider.addEventListener("click", () => {
            modalSlider.style.display = "block";
            modalSlider.style.opacity = '100%';
        });

        closeModalSlider.addEventListener("click", () => {
            modalSlider.style.display = "none";
        });


        //SliderBrilho
        brightnessSlider.addEventListener("input", () => {
            const brightnessValue = brightnessSlider.value;
            document.getElementById("tudo").style.filter = `brightness(${brightnessValue}%)`;

            const codElements = document.querySelectorAll(".cod");
            codElements.forEach((element) => {
                const initialOpacity = 100 - brightnessValue; // Calcula a opacidade inicial
                element.style.opacity = initialOpacity / 100; // Define a opacidade com base no valor do slider
            });
        });
    </script>

</body>

</html>