<?php session_start(); if(isset($_SESSION['user']) || isset($_SESSION['admin'])){header("Location: index.php");} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Чистим Дом</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <nav>
            <div class="nav-elem" style="justify-content: left;">
                <div class="company-logo">
                    <img src="./img/Ellipse 1.svg" draggable="false" alt id="--logo-bg">
                    <img src="./img/чИСТИМ. ДОМ.svg" draggable="false" alt id="--logo-text">
                </div>
            </div>
            <p id="some-note">Авторизуйтесь, чтобы войти</p>
        </nav>
        <form class="f-auth" method="POST" action="php/handlers/main.php">
            <div class="--container">
                <label for="user_login" style="margin-bottom: 6px;">Введите логин</label>
                <input type="text" name="user_login">
                <label for="password" style="margin-top: 20px; margin-bottom: 6px;">Введите пароль</label>
                <input type="password" name="password">
            </div>
            <input type="submit" name="sign_in" value="Войти" look="btn1" style="margin-top: 30px;">
        </form>
    </div>
</body>
</html>