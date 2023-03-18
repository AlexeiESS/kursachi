<?php session_start(); if(!isset($_SESSION['admin'])){header("Location: auth.php");} require_once 'php/init.php'; 
$conn = new mysql($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

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
                        <a href="frame_8.html" class="btn">Авторизация</a>
                        <a href="frame_9.html" class="btn">Регистрация</a>
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
    <main class="main main__frame_10">
        <div class="main__menu__row"></div>
        <div class="wrapper">
            <section class="main__zapros__admin">
                <div class="main__menu__content__row">
                    <a href="frame_5.html" class="btn current-btn">Уже нашли дом</a>
                    <a href="frame_5.html" class="btn">Еще ищут дом</a>
                    <a href="frame_7.html" class="btn">Отзывы</a>
                    <a href="frame_10.html" class="btn">Заявки</a>
                </div>

            </section>

            <section class="main__zapros__admin__table__section">
                <h1 class="main__zapros__admin__h1">Запросы</h1>
                    <table class="main__zapros__admin__table">
                        <thead class="main__zapros__admin__thead">
                            <tr class="main__zapros__admin__tr">
                                <th class="main__zapros__admin__th">Имя</th>
                                <th class="main__zapros__admin__th">Номер телефона</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php $cont = $conn->query("SELECT * FROM contacts "); foreach($cont as $row){ ?>
                            <tr class="main__zapros__admin__tr">
                                <td class="main__zapros__admin__td td1__zapros"><?php echo $row['name']; ?></td>
                                <td class="main__zapros__admin__td td2__zapros"><?php echo $row['tel']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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