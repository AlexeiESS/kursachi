<?php
require_once 'php/init.php';
$conn = new mysql($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ищу Дом</title>
    <link rel="icon" href="../assets/images/doggy.png">
    <link rel="stylesheet" href="../assets/styles/main.css">
    <link rel="stylesheet" href="../assets/styles/normalize/normalize.css">
</head>
<body>
    <!--HEADER-->
    <header class="header">
        <div class="wrapper">
            <div class="header__content">
                <div class="header__left-content">
                    <a href="frame_1.html" class="header__logo-block">
                        ИЩУ Д<img src="../assets/images/doggy-logo.svg" alt="" class="header__logo-block__img">М!
                    </a>
                    <div class="header__left-content__btns-block">
                        <?php if(isset($_SESSION['admin']) || isset($_SESSION['user'])){ ?>
                        <a href="exit.php" class="btn">Выйти</a>
                        <?php }else { ?>
                        <a href="auth.php" class="btn">Авторизация</a>
                        <a href="reg.php" class="btn">Регистрация</a>
                        <?php } ?>
                    </div>
                </div>
        
                <div class="header__right-content">
                    <img src="../assets/images/header-doggy.png" alt="" class="header__right-content__img">
                    <div class="header__right-content__soc-items">
                        <div class="header__right-content__soc-items__item">
                            <a href="#" class="header__right-content__soc-items__item__link">
                                <img src="../assets/images/inst.svg" alt="" class="header__right-content__soc-items__item__img">
                            </a>
                        </div>
                        <div class="header__right-content__soc-items__item">
                            <a href="#" class="header__right-content__soc-items__item__link">
                                <img src="../assets/images/vk.svg" alt="" class="header__right-content__soc-items__item__img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!--MAIN-->
    <main class="main">
        <div class="main__menu"></div>
        <div class="wrapper">
            <section class="main__about">
                <div class="main__menu__content">
                    <a href="frame_1.html" class="btn current-btn">О нас</a>
                    <a href="#" class="btn">Ищут дом</a>
                    <a href="#" class="btn">Нашли дом</a>
                    <a href="frame_3.html" class="btn">Отзывы</a>
                    <a href="frame_4.html" class="btn">Контакты</a>
                    <a href="frame_11.html" class="btn">Ищу питомца</a>
                </div>
                <div class="main__about-content">
                    <h1>О нас</h1>
                    <div class="main__about-block">
                        Наш приют для животных  “ИЩУ ДОМ”  организован волонтерами региона 14 апреля 2016 года.
                        Сейчас на территории проживает <br> около 45 собак, 30 кошек и 1 ворон.
                        Все животные привиты <br> и регулярно посещают ветеринара.
                        <br><br>
                        Приют существует благодаря волонтерам и постоянным друзьям. 
                        Малышей разбирают быстро, остаются чаще всего только совсем старые собаки. 
                        Но старые не значит глупые!<br><br>
    
                    </div>
                </div>
            </section>
            <section class="main__pets">
                <h2>Так мы живем</h2>
                <div class="main__pets__img-block">
                    <div class="main__pets__img-block__item">
                        <img src="../assets/images/frame_1/kitties.png" alt="" class="main__pets__img-block__item__img">
                    </div>
                    <div class="main__pets__img-block__item">
                        <img src="../assets/images/frame_1/dogs.png" alt="" class="main__pets__img-block__item__img">
                    </div>
                    <div class="main__pets__img-block__item">
                        <img src="../assets/images/frame_1/bird.png" alt="" class="main__pets__img-block__item__img">
                    </div>
                </div>
            </section>
            <section class="main__feedback">
                <h3>Отзывы пользователей</h3>
                <?php $comm = $conn->query("SELECT * FROM commentaries"); foreach($comm as $row){ ?>
                <div class="main__feedback__content">
                    <div class="main__feedback__content__item">
                        <div class="main__feedback__content__item__title">
                            <img src="upload/<?php echo $row['img']; ?>" alt="" class="main__feedback__content__item__title__img">
                            <div class="main__feedback__content__item__title__name">
                                <?php echo $row['name']; ?>
                            </div>
                        </div>
                        <div class="main__feedback__content__item__text">
                            <?php echo $row['text_com']; ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <a href="#" class="main__feedback__content_dop">Ещё</a>
            </section>
        </div>
        
    </main>


    <!--FOOTER-->
    <footer class="footer">
        <div class="wrapper">
            <div class="footer__content">
                <div class="footer__left">
                    <div class="footer__left__menu">
                        <ul class="footer__left__menu__list">
                            <li class="footer__left__menu__list-item">
                                <a href="frame_1.html" class="footer__left__menu__list-item__link">О нас</a></li>
                            <li class="footer__left__menu__list-item">
                                <a href="frame_2.html" class="footer__left__menu__list-item__link">Питомцы</a></li>
                            <li class="footer__left__menu__list-item">
                                <a href="frame_3.html" class="footer__left__menu__list-item__link">Отзывы</a></li>
                            <li class="footer__left__menu__list-item">
                                <a href="frame_4.html" class="footer__left__menu__list-item__link">Контакты</a></li>
                        </ul>
                    </div>
                    <div class="footer__left__menu__log-reg">
                        <ul class="footer__left__menu__log-reg__list">
                            <li class="footer__left__menu__log-reg__list-item">
                                <a href="frame_8.html" class="footer__left__menu__log-reg__list-item__link">Авторизация</a></li>
                            <li class="footer__left__menu__log-reg__list-item">
                                <a href="frame_9.html" class="footer__left__menu__log-reg__list-item__link">Регистрация</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer__right">
                    <div class="footer__right__map-block">
                        <img src="../assets/images/map.png" alt="" class="footer__right__map-block__img">
                    </div>
                    <div class="footer__right__adress">г. Ижевск, ул. Воткинское шоссе, 251</div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>