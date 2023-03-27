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
    <div class="container">
        <nav>
            <div class="nav-elem" style="justify-content: left; align-items: center; width: 192px;">
                <div class="--logo-block">
                    <a href="./"><img src="./img/logo.svg" draggable="false" alt></a>
                </div>
            </div>
            <div class="nav-elem" style="justify-content: center; align-items: end;">
                <div class="--menu-block">
                    <a href="#">Главная</a> |
                    <a href="#">Домики</a>  |
                    <a href="#">Наша команда</a>  |
                    <a href="#">Контакты</a>  |
                </div>
            </div>
            <div class="nav-elem" style="justify-content: right; width: 260px;">
                <div class="--contact-block">
                    <p>г. Калуга</p>
                    <a href="tel:+70000000000">+7(000)000-00-00</a>
                </div>
            </div>
        </nav>
        <section class="banner">
            <p class="banner-phrase" id="phrase-1">Тихий отдых вдали от городской суеты</p>
            <p class="banner-phrase" id="phrase-2">Домик в лесу</p>
            <a href="#" class="banner-book">Забронировать</a>
        </section>
        <section class="slogan">
            <h1>Там, где лес рассказывает сказки</h1>
            <div class="--sep-wrap">
                <div class="--sep-cont">
                    <div class="--sep"></div>
                    <div class="--sep"></div>
                </div>
            </div>
            <p>Вы можете сбежать от забот и насладиться спокойствием в нашем уютном домике в тихом сказочном лесу.<br>
                Погулять по тропинкам, поужинать на природе, выпить чашку чая на веранде под стрекот цикад, посмотреть фильм и просто выспаться.<br>
                Проведите свои выходные с близкими и друзьями.</p>
        </section>
        <section class="houses">
            <h1>Домики</h1>
            <div class="--sep-wrap">
                <div class="--sep-cont">
                    <div class="--sep"></div>
                    <div class="--sep"></div>
                </div>
            </div>
            <div class="grid-3">
                <?php $homes = $conn->query("SELECT * FROM homes "); foreach($homes as $row){ ?>
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
                        <a href="card.php?id=<?php echo $row['id']; ?>">Подробнее</a>
                        <a href="book.php?id=<?php echo $row['id']; ?>">Забронировать</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
        <section class="team">
            <h1>Наша команда</h1>
            <div class="--sep-wrap">
                <div class="--sep-cont">
                    <div class="--sep"></div>
                    <div class="--sep"></div>
                </div>
            </div>
            <div class="grid-3">
                <div class="grid-item">
                    <img src="img/team/man0.png" draggable="false" alt>
                    <p id="--house-name">Валерий Петров</p>
                    <div class="--desc-block">
                        <p>Основатель и идейный вдохновитель. Сторонник активного образа жизни и ярких эмоций. Может устроить вам прогулку по лесу на велосипедах по своим любимым местам. По образованию геолог и архитектор. Такой вот разносторонний Валерий.</p>
                    </div>
                </div>
                <div class="grid-item">
                    <img src="img/team/woman1.png" draggable="false" alt>
                    <p id="--house-name">Олеся Коробейникова</p>
                    <div class="--desc-block">
                        <p>Обеспечит Ваше комфортное времяпрепровождение на просторах базы отдыха. Активная, целеустремленная, любит макароны и путешествовать, волонтер и гид в разных городах. </p>
                    </div>
                </div>
                <div class="grid-item">
                    <img src="img/team/woman0.png" draggable="false" alt>
                    <p id="--house-name">Маша Силеверстова</p>
                    <div class="--desc-block">
                        <p>Менеджер сайта, занимается Вашими бронированиями для каждого подберет подходящий вариант. Душа компании, покорила стратовулкан Килиманджаро, Эверест и Эльбрус. </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="contacts">
            <h1>Контакты</h1>
            <div class="--sep-wrap">
                <div class="--sep-cont">
                    <div class="--sep"></div>
                    <div class="--sep"></div>
                </div>
            </div>
            <p>Найти нас можно тут: Автодорога -Калуга- Тула 97 км шоссе, 2\1</p>
            <div class="map" style="position:relative;margin-top:23px;overflow:hidden;"><a href="https://yandex.ru/maps/11133/kinel/?utm_medium=mapframe&amp;utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Кинель</a><a href="https://yandex.ru/maps/11133/kinel/geo/ulitsa_50_let_oktyabrya/771892505/?ll=50.628272%2C53.224185&amp;utm_medium=mapframe&amp;utm_source=maps&amp;z=16.07" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица 50 лет Октября — Яндекс&nbsp;Карты</a><iframe src="https://yandex.ru/map-widget/v1/?ll=50.628272%2C53.224185&amp;mode=search&amp;ol=geo&amp;ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgk3NzE4OTI1MDUSYtCg0L7RgdGB0LjRjywg0KHQsNC80LDRgNGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCDQmtC40L3QtdC70YwsINGD0LvQuNGG0LAgNTAg0LvQtdGCINCe0LrRgtGP0LHRgNGPIgoNUYNKQhVm5VRC&amp;z=16.07" width="786px" height="377px" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
            <div class="info-block">
                <div class="ib-container">
                    <div class="ib-elem --info-1">
                        <div class="--content">
                            <img src="img/phone.svg" draggable="false" alt>
                            <a href="#">7 (000) 000 - 00 - 00</a>
                        </div>
                        <div class="--content">
                            <img src="img/phone.svg" draggable="false" alt>
                            <a href="#">7 (982) 741 - 85 - 22</a>
                        </div>
                    </div>
                    <div class="ib-elem --info-2">
                        <div class="--content">
                            <p>Звонить можно:<br>
                                пн - пт: 8:00 - 20:00<br>
                                сб - вс: 9:00 - 21:00
                            </p>
                        </div>
                        <div class="--content">
                            <p>
                                Отдыхать можно:<br>
                                круглосуточно!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <img src="img/logo.svg" draggable="false" alt>
        <a href="auth.php">Авторизация администратора</a>
    </footer>
</body>
</html>