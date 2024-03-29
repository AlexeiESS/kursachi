<?php session_start();if(isset($_SESSION['admin'])){header("Location: admin.php");} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="address-block">
            <p>
                г. Кострома, ул. Магистральная, 20<br>3, 2 этаж, офис 4
            </p>
        </div>
        <img id="houseico" src="img/houseico.svg" draggable="false" alt>
        <div class="stripe-container">
            <div class="stripes">
                <div id="--stripe-1"></div>
                <div id="--stripe-2"></div>
                <div id="--stripe-3"></div>
                <p>стены</p>
            </div>
        </div>
        <div class="tel-block">
            <img src="img/tel.svg" draggable="false" alt><a href="tel:79125210012">7 (912) 521 00 12</a>
        </div>
    </nav>
    <div class="main">
        <div class="container">
            <section class="top-block">
                <div class="bar">
                    
                </div>
                <form class="f-admin-auth" method="POST" action="php/handlers/main.php">
                    <div>
                        <label for="user_login">Логин</label>
                        <input type="text" name="user_login" id="user_login">
                    </div>
                    <div>
                        <label for="password">Пароль</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="--button-block">
                        <input type="submit" style="font-weight:700;" value="Отправить" name="sign_in" btn>
                    </div>
                </form>
                <div class="admin-bar">
                    <a href="#">Администратор</a>
                </div>
            </section>
        </div>
    </div>
</body>
</html>