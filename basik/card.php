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
    <nav>
        <a href="#"><img src="img/logo.png" draggable="false" alt></a>
        <p>г. Тюмень, ул. Пионеров, 24<br>
            Тел. 7 (5522) 84-56-23</p>
    </nav>
    <div class="nav-small">
        <a href="#">Basik Baby</a>
        <a href="index.php">Каталог</a>
        <a href="#">Контакты</a>
        <a href="#">Оставить заявку</a>
    </div>
    <div class="container">
        <div class="separator">
            <div class="--rect --longrect">
                <p>Басик BABY в вязаной шапке</p>
            </div>
        </div>
        <section class="kitties card">
            <?php
                            $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM products WHERE id = '".$_GET['id']."'"));
                            ?>
            <div class="kittie-elem">
                <div class="--col-wrap">
                    <div class="--elem">
                        <img id="--photo" src="upload/<?php echo $conn->arr['img']; ?>" draggable="false" alt>
                        <div class="--price">
                            <p><?php echo $conn->arr['price']; ?> руб</p>
                        </div>
                    </div>
                    <div class="--elem">
                        <p id="--desc"><?php echo $conn->arr['description']; ?></p>
                        <div class="--flex-block">
                            <div>
                                <p>Вес: <?php echo $conn->arr['masse']; ?> кг</p>
                            </div>
                            <div>
                                <p>Рост: <?php echo $conn->arr['height']; ?> см</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="--col-wrap">
                    <div class="--btn-block">
                        <a href="order.php?id=<?php echo $conn->arr['id']; ?>" class="btn-order">Заказать</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <a href="#">Войти как администратор</a>
    </footer>
</body>
</html>