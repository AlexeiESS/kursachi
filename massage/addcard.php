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
    <div class="main">
        <nav>
            <div class="nav-module">
                <div class="--top-block">
                    <a href="#">АДМИНИСТРАТОР</a>
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
                <a href="admin.php">Назад</a>
                <a href="admin.php" class="topbar-active">Специалисты</a>
                <a href="exit.php">Выход</a>
            </div>
            <form class="f-editcard" method="POST" action="php/handlers/main.php" enctype="multipart/form-data">
                <section class="masters">
                    <div class="masters-cont">
                        <div class="master-elem">
                            <div class="--subelem --photo">
                                <div id="img"></div>
                                <label for="master_photo" class="btn-1">Добавить фото</label>
                                <input type="file" name="master_photo" style="display: none;" id="master_photo">
                            </div>
                            <div class="--subelem">
                                <div>
                                    <p id="--name"><input type="text" value="" placeholder="Введите имя" style="text-transform: uppercase;" name="master_name"></p>
                                </div>
                                <div>
                                    <p id="--desc"><textarea name="master_desc" placeholder="Введите описание" style="width: 100%; height: 100px; resize: none;"></textarea></p>
                                </div>
                                <div>
                                    <div class="info-block">
                                        <div class="--elem-row" style="max-width: 384px;">
                                            <div class="--elem-col">
                                                <img src="img/image 5.svg" draggable="false" alt><p><input type="tel" placeholder="Введите номер" name="master_tel"></p>
                                             </div>
                                             <div class="--elem-col">
                                                <img src="img/image 8.svg" draggable="false" alt><p style="display: flex; box-sizing: border-box; flex-direction: row; align-items: center; gap: 10px;"><input type="number" min=0 style="width: 100%; box-sizing: border-box; height: 30px;" name="price" placeholder="Введите цену"></p>
                                             </div>
                                        </div>
                                        <div class="--elem-row">
                                            <div class="--elem-col">
                                                <img src="img/image 7.svg" draggable="false" alt><p><input type="text" name="master_location" placeholder="Введите адрес"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="center" style="margin-top: 125px;">
                    <input type="submit" name="add_prod" value="Сохранить" class="btn-1">
                </div>
            </form>
        </div>
        <footer>
            <p>SERVICE</p>
        </footer>
    </div>
</body>
</html>