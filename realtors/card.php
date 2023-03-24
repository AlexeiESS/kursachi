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
    <link rel="stylesheet" href="style.css">
</head>
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
                    <a href="#">Преимущества</a>
                    <a href="#">Объекты</a>
                    <a href="#">Оставить заявку</a>
                </div>
                <div class="banner">
                    <div class="--slogan">
                        <p>
                            Свой дом - уверенность в завтрашнем дне!
                        </p>
                    </div>
                </div>
                <div class="admin-bar">
                    <a href="#">Войти как администратор</a>
                </div>
            </section>
            <?php
                            $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM objects WHERE id = '".$_GET['id']."'"));
                            ?>
            <section class="objects">
                <div class="stripe-container">
                    <div class="stripes">
                        <div id="--stripe-1"></div>
                        <div id="--stripe-2"></div>
                        <div id="--stripe-3"></div>
                        <p>Объект</p>
                    </div>
                </div>
                <div class="flat-container">
                    <div class="fc-elem">
                        <div class="--top-block">
                            <img src="upload/<?php echo $conn->arr['img']; ?>" draggable="false" alt>
                            <div class="--desc-rect">
                                <p><?php echo $conn->arr['name']; ?></p>
                            </div>
                            <div class="--desc-rect">
                                <p><?php echo $conn->arr['adress']; ?></p>
                            </div>
                            <div class="--desc-rect">
                                <p><?php echo $conn->arr['price']; ?> ₽</p>
                            </div>
                        </div>
                        <div class="--bottom-block">
                            <p><?php echo $conn->arr['description']; ?></p>
                        </div>
                        <div class="--button-block">
                            <a href="order.php?id=<?php echo $conn->arr['id']; ?>">Связаться с риэлтором</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <footer>
        <div class="ft-links">
            <a href="#">Наши преимущества</a>
            <a href="#">Объекты</a>
            <a href="#">Оставить заявку</a>
            <a href="#">Контакты</a>
            <div class="--tel">
                <img src="img/tel.svg" draggable="false" alt><a href="tel:79125210012">7 (912) 521 00 12</a>
            </div>
        </div>
        <div class="ft-info">
            <div class="--schedule">
                <p>Режим работы:</p>
                <p>пн-пт: 9:00 - 20:00</p>
                <p>сб-вс: 10:00 - 21:00</p>
            </div>
            <div class="--location">
                <p>г. Кострома, ул. Магистральная, 20,<br>2 этаж, офис 4</p>
            </div>
        </div>
        <div class="map" style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/11133/kinel/?utm_medium=mapframe&amp;utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Кинель</a><a href="https://yandex.ru/maps/11133/kinel/geo/ulitsa_50_let_oktyabrya/771892505/?ll=50.628272%2C53.224185&amp;utm_medium=mapframe&amp;utm_source=maps&amp;z=16.07" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица 50 лет Октября — Яндекс&nbsp;Карты</a><iframe src="https://yandex.ru/map-widget/v1/?ll=50.628272%2C53.224185&amp;mode=search&amp;ol=geo&amp;ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgk3NzE4OTI1MDUSYtCg0L7RgdGB0LjRjywg0KHQsNC80LDRgNGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCDQmtC40L3QtdC70YwsINGD0LvQuNGG0LAgNTAg0LvQtdGCINCe0LrRgtGP0LHRgNGPIgoNUYNKQhVm5VRC&amp;z=16.07" width="500" height="252" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
    </footer>
</body>
</html>