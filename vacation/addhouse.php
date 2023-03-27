<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: index.php");
}
require_once 'php/init.php';
$conn = new mysql($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
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
                    <p><span style="font-weight: 700;">Домики</span> | Бронирования</p>
                </div>
            </div>
            <div class="nav-elem" style="justify-content: right; width: 260px;">
                <div class="--contact-block">
                    <p>г. Калуга</p>
                    <a href="tel:+70000000000">+7(000)000-00-00</a>
                </div>
            </div>
        </nav>
        <div class="tinyblock">
            <a href="admin.php">
                <img src="img/back-arrow.svg" draggable="false" alt>
                Вернуться
            </a>
        </div>
        <form class="card house-add" method="POST" action="php/handlers/main.php" enctype="multipart/form-data">
            <div class="card-elem">
                <div class="--elem" style="margin-right: 180px;">
                    <div class="--house-photo">
                        <label id="lbl-addphoto" for="house_photo">Добавить фото</label>
                        <input type="file" style="display: none;" id="house_photo" name="house_photo">
                    </div>
                </div>
                <div class="--elem">
                    <div class="--input-wrap">
                        <label for="house_name">Название:</label>
                        <input type="text" id="house_name" name="house_name" required text>
                    </div>
                    <div class="--input-wrap">
                        <label for="house_price_workdays">Цена в будни:</label>
                        <input type="text" id="house_price_workdays" name="house_price_workdays" required text>
                    </div>
                    <div class="--input-wrap">
                        <label for="house_price_holidays">Цена в выходные дни:</label>
                        <input type="text" id="house_price_holidays" name="house_price_holidays" required text>
                    </div>
                    <div>
                        <label for="house_price_holidays">
                            Тип цены
                        </label>
                        <select name="sale_type">
                            <option value="1">Оплата в сутки</option>
                            <option value="0">Оплата в час</option>
                        </select>
                    </div>
                    <div class="--input-wrap" style="align-items: start;">
                        <label for="house_desc">Описание:</label>
                        <input type="text" id="house_desc" style="height: 194px;" name="house_desc" required text>
                    </div>
                </div>
            </div>
            <div class="card-elem">
                <div class="some-block">
                    <input type="submit" value="Добавить новый домик" name="house_add">
                </div>
            </div>
        </form>
    </div>
    <footer>
        <img src="img/logo.svg" draggable="false" alt>
        <a href="auth.php">Авторизация администратора</a>
    </footer>
</body>
</html>