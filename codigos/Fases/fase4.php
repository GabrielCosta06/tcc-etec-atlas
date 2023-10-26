<?php
// Iniciando a sessão para garantir que o usuário esteja conectado
session_start();

// Certificando de que a variável de sessão está definida antes de acessá-la
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Estabelecendo uma conexão com o banco de dados antes de usar a variável $conn
    require_once '../Login/db_connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $progress = 4; // ou qualquer outro valor apropriado que você deseja atribuir

        // Consulta SQL para atualizar o valor do progresso para o usuário
        $sql = "UPDATE users SET progress = '$progress' WHERE user_id = '$userId'";

        if ($conn->query($sql) === TRUE) {
            // Convertendo o comando echo do PHP em um alerta em JavaScript
            echo '<script>alert("Ótimo! Seu progresso foi atualizado com sucesso!")</script>';
        } else {
            // Convertendo o comando echo do PHP em um alerta em JavaScript
            echo '<script>alert("Erro ao atualizar o registro: ' . $conn->error . '")</script>';
        }
        $conn->close();
    }
} else {
    // Convertendo o comando echo do PHP em um alerta em JavaScript
    echo '<script>alert("ID do usuário não definido na sessão.")</script>';
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fase 4</title>
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
        <div class="salvar"> <button type="submit" name="save_progress" class="button">Salvar Progresso</button>
        </div>
    </form>
    <div id="tudo">
        <header>
            <p>4</p>
            <div class="navbar">
                <div class="resposta">
                    <input type="text" class="rs" id="rs" autocomplete="off" placeholder="Onde estao ?">

                    <input type="submit" value="Enviar" class="enviar" onclick="verificarResposta()">

                </div>
            </div>
        </header>
        <h2 class="binario" style="font-size:10px;">
            <div class="g1">01100101 </div>
            <div class="g2">01110011</div>
            <div class="g3">01110100</div>
            <div class="g4">01100001</div>
            <div class="g5">01101101</div>

            <div class="g1">01101111 </div>
            <div class="g2">01110011 </div>
            <div class="g3">00100000 </div>
            <div class="g4">01100101 </div>
            <div class="g5">01101101 </div>

            <div class="g1">00100000 </div>
            <div class="g2">01110100 </div>
            <div class="g3">01101111 </div>
            <div class="g4">01100100 </div>
            <div class="g5">01100001 </div>

            <div class="g1">00100000 </div>
            <div class="g2">01110000 </div>
            <div class="g3">01100001 </div>
            <div class="g4">01110010 </div>
            <div class="g5">01110100 </div>
            <div class="g1">01100101</div>
        </h2><br><br><br>




        <div id="emailModal" class="modaldia2">
            <div class="modal-content">
                <span class="close" id="closeEmailModalBtn">&times;</span>
                <h1>Querido Diário, </h1>
                <div class="txtModalDia2">
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
                if (rs.toLowerCase() === "ESTAMOS EM TODA PARTE" || rs.toLowerCase() === "estamos em toda parte") {
                    window.alert("Resposta correta! Próxima fase...");
                    window.location.href = 'fase5.php';

                } else {
                    alert("Resposta incorreta!");
                }
            }

            document.querySelector('.menu-button').onclick = function (e) {
                e.preventDefault();
                document.querySelector('.circle').classList.toggle('open');
            }



            //VERIDFICAÇÃO DE RESPOSTA

            function verificarResposta() {
                var rs = document.getElementById("rs").value;
                if (rs.toLowerCase() === "ESTAMOS EM TODA PARTE" || rs.toLowerCase() === "estamos em toda parte") {
                    window.alert("Resposta correta! Próxima fase...");
                    window.location.href = 'fase5.php';

                } else {
                    alert("Resposta incorreta!");
                    location.reload();
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