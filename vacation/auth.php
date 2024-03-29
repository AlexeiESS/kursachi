<?php
session_start();
if(isset($_SESSION['admin'])){header("Location: admin.php");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <nav>
            <div class="nav-elem" style="justify-content: left; align-items: center; width: 192px;">
                <div class="--logo-block">
                <a href="./"><img src="./img/logo.svg" draggable="false" alt></a>
                </div>
            </div>
            <div class="nav-elem" style="justify-content: center; align-items: center; flex-direction: column;">
                <div class="--menu-block">
                    <p style="font-weight: 700;">Администратор</p>
                </div>
                <div class="--menu-block">
                    <p>Авторизация</p>
                </div>
            </div>
            <div class="nav-elem" style="justify-content: right; width: 260px;">
                <div class="--contact-block">
                    <p>г. Калуга</p>
                    <a href="tel:+70000000000">+7(000)000-00-00</a>
                </div>
            </div>
        </nav>
        <form class="f-auth" style="margin-top: 56px;" method="POST" action="php/handlers/main.php">
            <div class="--container">
                <div style="display: flex; flex-direction: row; gap: 11px;">
                    <label for="user_login">Логин:</label>
                    <input type="text" name="user_login" id="user_login" text>
                </div>
                <div style="display: flex; flex-direction: row; gap: 11px;">
                    <label for="password">Пароль:</label>
                    <input type="password" id="password" name="password" text>
                </div>
                <input type="submit" value="Войти" name="sign_in">
            </div>
        </form>
    </div>
    <footer>
        <img src="img/logo.svg" draggable="false" alt>
        <a href="auth.php">Авторизация администратора</a>
    </footer>
</body>
</html>