<?php
session_start();
if(isset($_SESSION['admin'])){
    header("Location: admin.php");
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
    <nav>
        <a href="#"><img src="img/logo.png" draggable="false" alt></a>
        <p>г. Тюмень, ул. Пионеров, 24<br>
            Тел. 7 (5522) 84-56-23</p>
    </nav>
    <div class="nav-small">
        <p style="font-weight: 700;">АВТОРИЗАЦИЯ АДМИНИСТРАТОРА</p>
    </div>
    <div class="f-container">
        <form method="POST" action="php/handlers/main.php">
            <div>
                <label for="user_login">Логин:</label>
                <input type="text" id="user_login" name="user_login">
            </div>
            <div>
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password">
            </div>
            <input type="submit" name="sign_in" value="Войти">
        </form>
    </div>
    <footer>
        <a href="#">Войти как администратор</a>
    </footer>
</body>
</html>