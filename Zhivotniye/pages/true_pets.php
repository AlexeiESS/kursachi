<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ищу Дом</title>
    <link rel="icon" href="../assets/images/doggy.png">
    <link rel="stylesheet" href="../assets/styles/main.css">
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
    <main class="main main__frame_2">
        <div class="main__menu"></div>
        <div class="wrapper">
            <section class="main__pets-photo">
                <div class="main__menu__content">
                    <a href="frame_1.html" class="btn">О нас</a>
                    <a href="#" class="btn">Ищут дом</a>
                    <a href="#" class="btn">Нашли дом</a>
                    <a href="frame_3.html" class="btn">Отзывы</a>
                    <a href="frame_4.html" class="btn">Контакты</a>
                    <a href="frame_11.html" class="btn">Ищу питомца</a>
                </div>
                <div class="main__pets-photo__content">
                    <!-- <a href="#" class="btn">Ищут дом</a> -->
                    <!-- <div class="main__pets-photo__photo-block">
                        <div class="main__pets-photo__photo-block__item">
                            <img src="../assets/images/frame_2/photo_1.png" alt="" class="main__pets-photo__photo-block__item__img">
                        </div>
                        <div class="main__pets-photo__photo-block__item">
                            <img src="../assets/images/frame_2/photo_2.png" alt="" class="main__pets-photo__photo-block__item__img">
                        </div>
                        <div class="main__pets-photo__photo-block__item">
                            <img src="../assets/images/frame_2/photo_3.png" alt="" class="main__pets-photo__photo-block__item__img">
                        </div>
                    </div> -->
                    <h1 class="main__pets__h1">Тоже хотите завести себе друга?<br>Оставьте заявку!</h1>
                    <div class="main__pets__content__form">
                        <!-- Форма обратной связи -->
                        <form id="contactform" name="contact" method="post" action="php/handlers/main.php">
                            <div class="row">
                                <div class="row__label__block">
                                    <label class="row__label" for="name">Имя</label>
                                </div>
                                <input type="text" name="name" id="name" class="txt" tabindex="1" placeholder="Введите имя" required>
                            </div>
                            
                            <div class="row">
                                <div class="row__label__block">
                                    <label class="row__label" for="number">Номер телефона:</label>
                                </div>
                                <input type="number" name="number" id="number" class="txt" tabindex="2" placeholder="Введите номер" required>
                            </div>
                            
                            <div class="center">
                                <input class="pets-btn" type="submit" id="submitbtn" name="add_cont" tabindex="3" value="Отправить">
                            </div>
                        </form>
                    </div>

                </div>
            </section>

            <section class="main__to-find">
                <a href="#" class="btn">Уже нашли хозяев</a>
                <div class="main__to-find__cards">
                    <!--card_1-->
                    <?php $pets = $conn->query("SELECT * FROM pets WHERE search = 1"); foreach($pets as $row){ ?>
                    <div class="main__to-find__card">
                        <div class="main__to-find__card__up-block">
                            <div class="main__to-find__card__up-block__img-block">
                                <img src="upload/<?php echo $row['img']; ?>" alt="" class="main__to-find__card__up-block__img-block__img">
                            </div>
                            <div class="main__to-find__card__up-block__text-block">
                                <div class="main__to-find__card__up-block__text-block__item">Кличка: <?php echo $row['name']; ?></div>
                                <div class="main__to-find__card__up-block__text-block__item">Порода: <?php echo $row['category']; ?></div>
                                <div class="main__to-find__card__up-block__text-block__item">Возраст: <?php echo $row['age']; ?></div>
                            </div>
                        </div>

                        <div class="main__to-find__card__down-block">
                            <?php echo $row['description']; ?>
                        </div>
                    </div>
                      <?php } ?>  
                    

                </div>
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