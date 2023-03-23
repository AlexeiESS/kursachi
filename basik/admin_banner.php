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
        <a href="#" style="font-weight: 700;">Basik Baby</a>
        <a href="#">Каталог</a>
        <a href="#">Заявки</a>
    </div>
    <?php
                            $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM settings "));
                            ?>
    <form method="POST" action="php/handlers/main.php" enctype="multipart/form-data">
        <section class="banner">
            <div class="banner-elem" id="block-1" style="height: 55px;">
                <img src="upload/<?php echo $conn->arr['img']; ?>" draggable="false" alt>
            </div>
            <div class="banner-elem" id="block-2">
                <div class="--rect">
                    <p><input type="text" name="banner_title" value="<?php echo $conn->arr['title']; ?>"></p>
                </div>
                <p><textarea name="banner_desc" style="width: 100%; height: 100%;"><?php echo $conn->arr['description']; ?></textarea></p>
            </div>
        </section>
        <div class="--btn-block">
            <label btn for="banner_photo">Загрузить новое фото</label>
            <input type="file" style="display: none;" id="banner_photo" btn name="banner_photo">
            <input type="submit" btn name="banner_edit" value="Изменить">
        </div>
    </form>
    <footer>
        <a href="#">Выход из панели администратора</a>
    </footer>
</body>
</html>