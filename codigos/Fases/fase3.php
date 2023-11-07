<?php
// Iniciando a sessão para manter o controle do usuário logado
session_start();

// Garantindo que o meu ID de usuário esteja definido antes de usá-lo
if (isset($_SESSION['user_id'])) {
    // Capturando o meu ID de usuário da sessão para referência futura
    $userId = $_SESSION['user_id'];
    if (isset($_SESSION['name'])) {
        $name = $_SESSION['name'];
    }

    // Preciso estabelecer uma conexão com o banco de dados antes de fazer qualquer alteração nele
    require_once '../Login/db_connect.php';

    // Se o método da requisição for POST, posso prosseguir com a atualização do meu progresso
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vou definir o valor do meu progresso como 3 para marcar o avanço
        $progress = 3; // ou qualquer outro valor apropriado que eu queira atribuir

        // Agora, vou executar uma consulta SQL para atualizar o meu progresso no banco de dados
        $sql = "UPDATE users SET progress = '$progress' WHERE user_id = '$userId'";

        // Verifico se a atualização foi realizada com sucesso ou se houve algum erro
        if ($conn->query($sql) === TRUE) {
            // Vou imprimir um alerta para mim mesmo para confirmar que o progresso foi atualizado com sucesso
            echo '<script>alert("Ótimo! Seu progresso foi atualizado com sucesso!")</script>';
        } else {
            // Se algo der errado, quero ser notificado com um alerta indicando o problema
            echo '<script>alert("Ops! Houve um problema ao atualizar o seu progresso: ' . $conn->error . '")</script>';
        }
        // Terminado o processo, posso fechar a conexão com o banco de dados
        $conn->close();
    }
} else {
    // Se meu ID de usuário não estiver definido na sessão, devo receber um alerta para verificar o problema
    echo '<script>alert("Parece que seu ID de usuário não está definido na sessão. Verifique e tente novamente.")</script>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fase 3</title>
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
    <form action="fase3.php" method="post">
        <div class="salvar"> <button type="submit" name="save_progress" class="button">Salvar Progresso</button></div>
    </form>
    <div id="tudo">
        <header>
            <p>3</p>
            <div class="navbar">
                <div class="resposta">
                    <input type="text" class="rs" id="rs" autocomplete="off" placeholder="Dica: há volta?">

                    <input type="submit" value="Enviar" class="enviar" onclick="verificarResposta()">

                </div>
            </div>
        </header>

        <h2 class="morse">-. .- --- / - . -- / ...- --- .-.. - .-</h2>
        <br><br><br>

        <div class="select">select</div>


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
    </div>
    <p style="font-size: 20px;" id="timer"></p>
    <br>
    <p style="font-size: 25px;">Não demore, <span style="font-weight: bolder; color: #9669B5;;">
            <?php echo $name ?>
        </span></p>

    <script>
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function deleteCookie(cname) {
            document.cookie = cname + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }

        var timerElement = document.getElementById('timer');
        var storedTimeLeft = getCookie('timer');
        var timeLeft = storedTimeLeft ? parseInt(storedTimeLeft) : 900; // Set to 90 seconds by default or fetch from cookie
        var intervalId;

        function updateCountdown() {
            var minutes = Math.floor(timeLeft / 60);
            var seconds = timeLeft % 60;

            seconds = seconds < 10 ? '0' + seconds : seconds;

            timerElement.innerHTML = 'Tempo: ' + minutes + ':' + seconds;

            if (timeLeft > 0) {
                setCookie('timer', timeLeft, 1); // Save the timer value in cookie every second
                timeLeft--;
            } else {
                clearInterval(intervalId); // Clear the interval when the timer runs out
                alert('Que pena, o tempo se esgotou!');
                deleteCookie('timer');
                window.location.href = '../Login/destroy_session.php';
            }
        }

        // Clear the previous interval when the page reloads
        window.onload = function () {
            if (intervalId) {
                clearInterval(intervalId);
            }
            intervalId = setInterval(updateCountdown, 1000);
        };
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
            if (rs.toLowerCase() === "não tem volta" || rs.toLowerCase() === "nao tem volta" || rs.toLowerCase() === "NAO TEM VOLTA" || rs.toLowerCase() === "NÃO TEM VOLTA") {
                window.alert("Resposta correta! Próxima fase...");
                window.location.href = 'fase4.php';

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