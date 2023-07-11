<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="<?php echo INCLUDE_PATH_STATIC ?>estilos/alert.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_STATIC ?>estilos/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/99df909021.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css">
    <title>Login | Pixel3 Social</title>
</head>

<body>
    <div class="sidebar"></div>
    <div class="form-container-login">

        <div class="logo-chamada-login">
            <img src="<?php echo INCLUDE_PATH_STATIC ?>images/Logo_Social.svg" alt="">
            <p>Conecte-se com seus amigos e expanda seus aprendizados com a rede social Danki Code.</p>
        </div>

        <div class="form-login">
            <form action="" method="post">
                <?php if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];

                    unset($_SESSION['msg']);
                }
                ; ?>
                <input type="text" id="email" name="email" placeholder="Email">
                <input type="password" id="password" name="senha" placeholder="Senha">
                <input type="submit" id="submit" name="acao" value="Entrar">
                <input type="hidden" name="login">
            </form>
            <p><a href="<?php echo INCLUDE_PATH ?>registrar">Criar uma conta</a></p>
        </div>

    </div>

    <?php include('includes/removeAlertLogin.php') ?>
</body>

</html>
