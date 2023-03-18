<?php session_start(); if(!isset($_SESSION['admin'])){header("Location: ../../index.html");} ?>
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
            <div class="nav-elem" style="justify-content: right; gap: 30px;">
                <button look="btn1" class="btn-myreqs" style="width: 169px;"><a href="#">Просмотреть заявки</a></button>
                <button look="btn1" class="btn-myreqs btn-myreqs-active" style="width: 169px;"><a href="#">Добавить пользователя</a></button>
                <button look="btn1" class="btn-myreqs" style="width: 169px;"><a href="#">Список пользователей</a></button>
                <button look="btn1" class="btn-logout"><a href="#">Выход</a></button>
            </div>
        </nav>
        <form class="f-user-add" method="POST" action="php/handlers/main.php">
            <div class="--container">
                <label for="user_name" style="margin-bottom: 6px;">Введите имя</label>
                <input type="text" name="user_name">
                <label for="user_surname" style="margin-top: 20px; margin-bottom: 6px;">Введите фамилию</label>
                <input type="text" name="user_surname">
                <label for="user_login" style="margin-bottom: 6px;">Введите логин</label>
                <input type="text" name="user_login">
                <label for="password" style="margin-top: 20px; margin-bottom: 6px;">Введите пароль</label>
                <input type="password" name="password">
            </div>
            <input type="submit" name="add_user" value="Добавить" look="btn1" style="width: 284px; margin-top: 30px;">
        </form> 
    </div>
    <script src="./dropdown.js"></script>
</body>
</html>