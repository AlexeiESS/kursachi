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
                    <p><span style="font-weight: 700;">Домики</span></p>
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
            <a href="./">
                <img src="img/back-arrow.svg" draggable="false" alt>
                Вернуться
            </a>
        </div>
        <section class="houses">
            <div class="grid-3">
                <?php $homes = $conn->query("SELECT * FROM homes "); foreach($homes as $row){  ?>
                <div class="grid-item">
                    <img src="upload/<?php echo $row['img']; ?>" draggable="false" alt>
                    <p id="--house-name"><?php echo $row['name']; ?></p>
                    <div class="--desc-block">
                        <p><?php echo $row['description']; ?></p>
                    </div>
                    <div class="--price-block">
                        <p>от <?php echo $row['price']; ?> руб/<?php if($row['sale_type']!=1){echo 'час';}else {echo 'сутки';} ?></p>
                    </div>
                    <div class="--action-block">
                        <a href="edithouse.php?id=<?php echo $row['id']; ?>">Изменить</a>
                        <a href="php/handlers/main.php?action=remove&id=<?php echo $row['id']; ?>&table=homes">Удалить</a>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </section>
        <div class="some-block">
            <a href="addhouse.php">Добавить новый домик</a>
        </div>
        <div class="some-block">
            <a href="requests.php">Запросы</a>
        </div>
    </div>
    <footer>
        <img src="img/logo.svg" draggable="false" alt>
        <a href="auth.php">Авторизация администратора</a>
    </footer>
</body>
</html>