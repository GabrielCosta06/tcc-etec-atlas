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
            echo '<script>alert("Progresso atualizado com sucesso!")</script>';
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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fase 5</title>
    <link rel="stylesheet" href="fase1.css">
    <link rel="stylesheet" href="menu.css">
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
            <a href="" class="fa fa-gear fa-2x"></a>

            <div class="opacidade">
                <a href="" class="fa fa-facebook fa-2x"></a>
                <a href="" class="fa fa-twitter fa-2x"></a>
                <a href="" class="fa fa-linkedin fa-2x"></a>
                <a href="" class="fa fa-github fa-2x"></a>
                <a href="" class="fa fa-rss fa-2x"></a>
            </div>

            <a href="../../codigos/Login/pages/home/home-logado.php" class="fa fa-home fa-2x"></a>
            <a href="" class="fa fa-book fa-2x"></a>
        </div>

        <a href="" class="menu-button fa fa-bars fa-2x"></a>

    </nav>
    </div>
    <p style="font-size: 20px; margin-top: 55px;" id="countdown"></p>
    <script>
        var userInputField = document.getElementById('userInput');
        var countdownElement = document.getElementById('countdown');
        var timeLeft = 350;

        function updateCountdown() {
            var minutes = Math.floor(timeLeft / 60);
            var seconds = timeLeft % 60;

            seconds = seconds < 10 ? '0' + seconds : seconds;

            countdownElement.innerHTML = 'Tempo restante: ' + minutes + ':' + seconds;

            if (timeLeft > 0) {
                timeLeft--;
                setTimeout(updateCountdown, 1000);
            } else {
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

        document.querySelector('.menu-button').onclick = function(e) {
            e.preventDefault();
            document.querySelector('.circle').classList.toggle('open');
        }



        //VERIDFICAÇÃO DE RESPOSTA

        function verificarResposta() {
            var rs = document.getElementById("rs").value;
            if (rs.toLowerCase() === "oi") {
                window.alert("Resposta correta! Próxima fase...");
                window.location.href = 'conclusao.html';

            } else {
                alert("Resposta incorreta!");
                location.reload();
            }
        }

        function openPopup() {
            const windowFeatures = "left=800,top=350,width=320,height=320";
            window.open('sobre.html', 'popup', windowFeatures);
        }
    </script>

</body>

</html>