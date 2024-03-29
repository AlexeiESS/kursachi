<?php

session_start();
if(isset($_SESSION['admin']) || isset($_SESSION['user'])){
    header("Location: index.php");
}
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
    <div class="main">
        <nav>
            <div class="nav-module">
                <div class="--top-block">
                    <a href="#">Вход для администраторов сайта</a>
                </div>
            </div>
            <div class="nav-module">
                <div class="--bigtitle">
                    <h1>SERVICE</h1>
                </div>
            </div>
            <div class="nav-module">
                <div class="--bottom-block">
                    <p>На сайте Вы можете выбрать любого специалиста в сфере массажа.</p>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="topbar">
                <a href="signin.php">Авторизация</a>
                <a href="signup.php">Регистрация</a>
            </div>
            <h1 id="title" style="text-align: center;">Регистрация</h1>
            <form class="f-auth" method="POST" action="php/handlers/main.php">
                <div class="--content">
                    <div>
                        <label for="user_name">Имя</label>
                        <input type="text" name="user_name" text id="user_name" required>
                    </div>
                    <div>
                        <label for="user_email">Эл. почта</label>
                        <input type="email" name="user_email" text id="user_email" required>
                    </div>
                    <div>
                        <label for="user_login">Логин</label>
                        <input type="text" name="user_login" text id="user_login" required>
                    </div>
                    <div>
                        <label for="password">Пароль</label>
                        <input type="password" text id="password" name="password" required>
                    </div>
                    <div class="center">
                        <input type="submit" value="Зарегистрироваться" class="btn-1" name="sign_up">
                    </div>
                </div>
            </form>
        </div>
        <footer>
            <p>SERVICE</p>
        </footer>
    </div>
</body>
</html>