<?php
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
        <a href="#">Каталог</a>
        <a href="#">Контакты</a>
        <a href="#">Оставить заявку</a>
    </div>
    <?php
                            $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM settings "));
                            ?>
    <section class="banner">
        <div class="banner-elem" id="block-1" style="height: 55px;">
            <img src="upload/<?php echo $conn->arr['img']; ?>" draggable="false" alt>
        </div>
        <div class="banner-elem" id="block-2">
            <div class="--rect">
                <p><?php echo $conn->arr['title']; ?></p>
            </div>
            <p><?php echo $conn->arr['description']; ?></p>
        </div>
    </section>
    <div class="separator">
        <div class="--rect">
            <p>Каталог</p>
        </div>
    </div>
    <section class="kitties">
        <?php $product = $conn->query("SELECT * FROM products "); foreach($product as $row){ ?>
        <div class="kittie-elem">
            <div class="--col-wrap">
                <div class="--elem">
                    <img id="--photo" src="upload/<?php echo $row['img']; ?>" draggable="false" alt>
                </div>
                <div class="--elem">
                    <p id="--title"><?php echo $row['name']; ?></p>
                    <p id="--desc"><?php echo $row['description']; ?></p>
                </div>
            </div>
            <div class="--col-wrap">
                <div class="--price">
                    <p><?php echo $row['price']; ?> руб</p>
                </div>
            </div>
            <div class="--col-wrap">
                <div class="--btn-block">
                    <a href="card.php?id=<?php echo $row['id']; ?>">Подробнее</a>
                    <a href="order.php?id=<?php echo $row['id']; ?>">Заказать</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </section>
    <div class="separator">
        <div class="--rect">
            <p>Контакты</p>
        </div>
    </div>
    <section class="contacts">
        <div class="map" style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/11133/kinel/?utm_medium=mapframe&amp;utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Кинель</a><a href="https://yandex.ru/maps/11133/kinel/geo/ulitsa_50_let_oktyabrya/771892505/?ll=50.628272%2C53.224185&amp;utm_medium=mapframe&amp;utm_source=maps&amp;z=16.07" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица 50 лет Октября — Яндекс&nbsp;Карты</a><iframe src="https://yandex.ru/map-widget/v1/?ll=50.628272%2C53.224185&amp;mode=search&amp;ol=geo&amp;ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgk3NzE4OTI1MDUSYtCg0L7RgdGB0LjRjywg0KHQsNC80LDRgNGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCDQmtC40L3QtdC70YwsINGD0LvQuNGG0LAgNTAg0LvQtdGCINCe0LrRgtGP0LHRgNGPIgoNUYNKQhVm5VRC&amp;z=16.07" width="592" height="412" frameborder="0" allowfullscreen="true" style="position:relative;"></iframe></div>
        <div class="--info">
            <p style="font-weight: 600;">Режим работы:<br>
                пн: 10:00-19:00<br>
                вт: 10:00-19:00<br>
                ср: 10:00-19:00<br>
                чт: 10:00-19:00<br>
                пт: 10:00-19:00<br>
                сб: 10:00-17:00<br>
                вс: выходной</p>
            <p style="font-weight: 400;">г. Барнаул, ул. Пионеров, 24<br>      
                Тел. 7 (5522) 84-56-23</p>
        </div>
    </section>
    <footer>
        <a href="#">Войти как администратор</a>
    </footer>
</body>
</html>