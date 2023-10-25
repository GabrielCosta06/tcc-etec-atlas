<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fase 1</title>
    <link rel="stylesheet" href="fase1.css">
    <link rel="stylesheet" href="menu.css">
    <script src="fase.js"></script>

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
                    <input type="text" class="rs" id="rs" autocomplete="off" placeholder="...">

                    <input type="submit" value="Enviar" class="enviar" onclick="verificarResposta()">
                </div>
                <audio id="myAudio" src="./music/1.mp3" autoplay loop controls></audio>
            </div>
        </header>
        <div style="display: flex; justify-content: center; margin-top: 2%;">
            <div id="iframe-container" style="width: 60%;">
                <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                    <iframe id="myIframe" src="https://www.jigsawplanet.com/?rc=play&amp;pid=2f72a962898b&amp;view=iframe" style="position: absolute; width: 100%; height: 100%; border: none;"></iframe>
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
                        <!-- Ícone de brilho -->
                    </div>
                    <input type="range" id="brightnessSlider" min="30" max="100" value="100">

                </div>
                <button class="fechar" id="closeModalSlider">Fechar</button>
            </div>
        </div>
    </div>
    <p style="font-size: 20px;" id="countdown"></p>
    <script>
        var countdownElement = document.getElementById('countdown');
        var timeLeft = '100';

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




        //MENU

        var items = document.querySelectorAll('.circle a, .circle buttom');

        for (var i = 0, l = items.length; i < l; i++) {
            items[i].style.left = (50 - 35 * Math.cos(-0.5 * Math.PI - 2 * (1 / l) * i * Math.PI)).toFixed(4) + "%";

            items[i].style.top = (50 + 35 * Math.sin(-0.5 * Math.PI - 2 * (1 / l) * i * Math.PI)).toFixed(4) + "%";
        }

        document.querySelector('.menu-button').onclick = function(e) {
            e.preventDefault();
            document.querySelector('.circle').classList.toggle('open');
        }



        //VERIDFICAÇÃO DE RESPOSTA

        function verificarResposta() {
            var rs = document.getElementById("rs").value;
            if (rs.toLowerCase() === "tobias") {
                window.alert("Resposta correta! Próxima fase...");
                window.location.href = 'fase2.php';

            } else {
                alert("Resposta incorreta!");
                location.reload();
            }
        }

        function openPopup() {
            const windowFeatures = "left=800,top=350,width=320,height=320";
            window.open('sobre.html', 'popup', windowFeatures);
        }


        //modal-----
        const openModalBtn = document.getElementById("openModalBtn");
        const mainModal = document.getElementById("mainModal");
        const closeMainModalBtn = document.getElementById("closeMainModalBtn");
        //modalEmail
        const openEmailModalBtn = document.getElementById("openEmailModalBtn");
        const emailModal = document.getElementById("emailModal");
        const closeEmailModalBtn = document.getElementById("closeEmailModalBtn");
        //modalSlider
        const openModalButtonSlider = document.getElementById("openModalButtonSlider");
        const closeModalSlider = document.getElementById("closeModalSlider");
        const modalSlider = document.getElementById("myModalSlider");
        const brightnessSlider = document.getElementById("brightnessSlider");

        let isMainModalDraggable = false;
        let isEmailModalDraggable = false;

        // Função para tornar o modal principal arrastável
        function makeMainModalDraggable() {
            mainModal.style.cursor = "grab";
            mainModal.style.userSelect = "none";

            mainModal.addEventListener("mousedown", startDraggingMainModal);
            mainModal.addEventListener("mouseup", stopDraggingMainModal);
        }

        // Função para iniciar o arrastamento do modal principal
        function startDraggingMainModal(e) {
            isMainModalDraggable = true;
            offsetMainModalX = e.clientX - mainModal.getBoundingClientRect().left;
            offsetMainModalY = e.clientY - mainModal.getBoundingClientRect().top;
            mainModal.style.cursor = "grabbing";
        }

        // Função para parar o arrastamento do modal principal
        function stopDraggingMainModal() {
            isMainModalDraggable = false;
            mainModal.style.cursor = "grab";
        }

        // Função para mover o modal principal durante o arrastamento
        function dragMainModal(e) {
            if (isMainModalDraggable) {
                mainModal.style.left = e.clientX - offsetMainModalX + "px";
                mainModal.style.top = e.clientY - offsetMainModalY + "px";
            }
        }

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
        makeMainModalDraggable();
        makeEmailModalDraggable();

        // Event listeners para arrastar os modais
        document.addEventListener("mousemove", dragMainModal);
        document.addEventListener("mousemove", dragEmailModal);

        // Função para abrir o modal principal
        openModalBtn.addEventListener("click", () => {
            mainModal.style.display = "block";
            mainModal.style.opacity = '100%';
        });

        // Função para fechar o modal principal
        closeMainModalBtn.addEventListener("click", () => {
            mainModal.style.display = "none";
        });

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

        });
    </script>

</body>

</html>