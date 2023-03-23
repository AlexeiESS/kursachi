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
    <nav>
        <a href="#"><img src="img/logo.png" draggable="false" alt></a>
        <p>г. Тюмень, ул. Пионеров, 24<br>
            Тел. 7 (5522) 84-56-23</p>
    </nav>
    <div class="nav-small">
        <a href="#">Basik Baby</a>
        <a href="#" style="font-weight: 700;">Каталог</a>
        <a href="#">Заявки</a>
    </div>
    <form method="POST" action="php/handlers/main.php" enctype="multipart/form-data">
        <div class="separator">
            <div class="--rect">
                <p>Добавить</p>
            </div>
        </div>
        <section class="kitties card admin-kitties">
            <div class="kittie-elem">
                <div class="--col-wrap">
                    <div class="--elem --photo-elem">
                        <label for="kitty_photo"></label>
                        <input type="file" name="kitty_photo" style="display: none;" id="kitty_photo" required>
                    </div>
                    <div class="--elem --desc-elem">
                        <p id="--title"><input type="text" placeholder="Введите название" name="kitty_name" required></p>
                        <p id="--desc"><textarea name="kitty_desc" placeholder="Введите описание" required></textarea></p>
                        <div class="--flex-block">
                            <div>
                                <p><input type="number" placeholder="Цена" min=0 name="kitty_price" required> руб</p>
                            </div>
                            <div>
                                <p>Вес: <input type="number" placeholder="Вес" min=0 step="0.1" name="kitty_weight" required> кг</p>
                            </div>
                            <div>
                                <p>Рост: <input type="number" placeholder="Рост" min=0 name="kitty_height" required> см</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="--col-wrap">
                    <div class="--btn-block">
                        <input type="submit" style="font-weight: 700;" name="kittie_save" btn value="Сохранить">
                    </div>
                </div>
            </div>
        </section>
    </form>
    <footer>
        <a href="#">Выход из панели администратора</a>
    </footer>
</body>
</html>