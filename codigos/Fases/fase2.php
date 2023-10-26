<?php
session_start();

// Ensure that the session variable is set before accessing it
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Establish a database connection before using the $conn variable
    require_once '../Login/db_connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $progress = 2; // or any other appropriate value you wish to assign

        // SQL query to update the progress value for the user
        $sql = "UPDATE users SET progress = '$progress' WHERE user_id = '$userId'";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Ótimo! Seu progresso foi atualizado com sucesso!")</script>';
        } else {
            echo '<script>alert("Ops! Houve um problema ao atualizar o seu progresso: ' . $conn->error . '")</script>';
        }
        $conn->close();
    }
} else {
    phpAlert("ERRO: Usuário não está com ID setado na sessão.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fase 2</title>
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
    <form action="fase4.php" method="post">
        <div class="salvar"> <button type="submit" name="save_progress" class="button">Salvar Progresso</button></div>
    </form>
    <div id="tudo">
        <header>
            <p>2</p>
            <div class="navbar">
                <div class="resposta">
                    <input type="text" class="rs" id="rs" autocomplete="off" placeholder="O local ?">

                    <input type="submit" value="Enviar" class="enviar" onclick="verificarResposta()">
                </div>
            </div>

        </header>

        <i class="fa fa-sun-o sun"><br> luceat</i>
        <h1 class="cod"> 38.56889920928527, -7.908806192879108</h1>


        <div id="emailModal" class="modaldia2">
            <div class="modal-content">
                <span class="close" id="closeEmailModalBtn">&times;</span>
                <h1>Querido Diário, </h1>
                <div class="txtModalDia2">
                    <br>
                    hoje acordei depois de um longo pesadelo sobre o e-mail de ontem, li o mesmo cerca de 13 vezes sem
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

    <p style="font-size: 20px;" id="countdown"></p>
    <script>
        var userInputField = document.getElementById('userInput');
        var countdownElement = document.getElementById('countdown');
        var timeLeft = 300;

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

            if (rs.toLowerCase() === "capela de ossos" || rs.toLowerCase() === "CAPELA DE OSSOS"|| rs.toLowerCase() === "capela dos ossos"|| rs.toLowerCase() === "CAPELA DOS OSSOS" || rs.toLowerCase() === "a capela de ossos") {

                window.alert("Resposta correta! Próxima fase...");
                window.location.href = 'fase3.php';

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