<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueceu a senha</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="shortcut icon" type="imagex/png" href="../Fases/img/incognita.png">
    <link rel="stylesheet" href="./index.css">

</head>

<body>
    <div class="container flex">
        <div class="facebook-page flex">
            <div class="text">
                <br><br><br>
                <h1>incógnita</h1>
                <p>Jogue o nosso game misterioso </p>
                <p> e veja se é capaz.</p>
            </div>
            <form method="post" action="forgotP_process.php">
                <input type="email" name="email" id="email" placeholder="Email" required>
                <div class="link">
                    <button type="submit" class="login">Resetar</button>
                    <a href="index.php" class="forgot">Já tenho uma conta</a>
                </div>
                <hr>
                <div class="button">
                    <a href="index.php">Criar nova conta</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>