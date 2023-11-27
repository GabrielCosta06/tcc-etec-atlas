<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resetar Senha</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="shortcut icon" type="imagex/png" href="./Fases/img/incognita.png">
    <link rel="stylesheet" href="index.css">

    <?php
    require './db_connect.php';

    $message = '';

    if (isset($_GET['code'])) {
        $reset_code = $_GET['code'];

        $query = "SELECT * FROM users WHERE reset_code = ?";
        $stmt = $mysqli->prepare($query);

        if ($stmt) {
            $stmt->bind_param('s', $reset_code);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user) {
                $message = "
                <div class=\"text\">
                    <br><br><br>
                    <h1>incógnita</h1>
                    <p>Jogue o nosso game misterioso </p>
                    <p> e veja se é capaz.</p>
                </div>
                <form class=\"reset-form\" action=\"resetP_process.php\" method=\"post\">
                <input type=\"hidden\" name=\"user_id\" value=\"{$user['user_id']}\">
                <input type=\"password\" name=\"password\" class=\"reset-input\" placeholder=\"Nova Senha\" required>
                <div class=\"link\">
                <button type=\"submit\" class=\"login\">Resetar Senha</button>
                </div>
            </form>";
            } else {
                $message = "<p class=\"reset-error\">Código de reset inválido.</p>";
            }

            $stmt->close();
        } else {
            $message = "<p class=\"reset-error\">Erro ao preparar a declaração.</p>";
        }
    } else {
        $message = "<p class=\"reset-error\">Código de reset não fornecido.</p>";
    }

    $conn->close();
    ?>
</head>

<body>
    <div class="container flex">
        <div class="facebook-page flex">
            <?php echo $message; ?>
        </div>
    </div>
</body>

</html>