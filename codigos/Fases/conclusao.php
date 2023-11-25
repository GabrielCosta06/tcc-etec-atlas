<?php
session_start();
require_once("../Login/db_connect.php");

# Para mostrar o nome do usuário
if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parabéns!!!</title>
    <link rel="stylesheet" href="conclusao.css">
    <link rel="shortcut icon" type="imagex/png" href="./img/incognita.png">
</head>

<body>
    <div class="container">
        <h1>Parabéns por ter <span>concluído</span> este enigma!</h1>
        <h2><span style="font-size: 35px;">
                <?php echo $name ?>,
            </span>você é demais!</h2>
    </div>
    <canvas id="fireworksCanvas"
        style="position: absolute; top: 0; left: 0; pointer-events: none; z-index: -1;"></canvas>
    <script src="conclusao.js"></script>
</body>

</html>