<?php
if(!isset($_GET['id'])){header("Location: index.php");}
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
            <div class="nav-elem" style="justify-content: center; align-items: end;">
                <div class="--menu-block">
                    <p>Подробнее</p>
                </div>
            </div>
            <div class="nav-elem" style="justify-content: right; width: 260px;">
                <div class="--contact-block">
                    <p>г. Калуга</p>
                    <a href="tel:+70000000000">+7(000)000-00-00</a>
                </div>
            </div>
        </nav>
        <?php
                            $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM homes WHERE id = '".$_GET['id']."'"));
                            ?>
        <div class="card">
            <div class="card-elem">
                <img src="upload/<?php echo $conn->arr['img']; ?>" draggable="false" alt>
            </div>
            <div class="card-elem">
                <p id="--title"><?php echo $conn->arr['name']; ?></p>
                <div class="--desc-block">
                    <p><?php echo $conn->arr['description']; ?></p>
                </div>
                <div class="--price-block">
                    <div class="--elem">
                        <p>будни: <?php $conn->arr['price']; ?> руб/<?php if($conn->arr['sale_type']!=1){echo 'час';}else {echo 'сутки';} ?></p>
                    </div>
                    <div class="--elem">
                        <p>праздники: <?php $conn->arr['price_2']; ?> руб/<?php if($conn->arr['sale_type']!=1){echo 'час';}else {echo 'сутки';} ?></p>
                    </div>
                </div>
                <div class="--btn-cont">
                    <a href="book.php?id=<?php echo $conn->arr['id']; ?>" class="btn-book">Забронировать</a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <img src="img/logo.svg" draggable="false" alt>
        <a href="auth.php">Авторизация администратора</a>
    </footer>
</body>
</html>