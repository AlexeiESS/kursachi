<?php session_start();if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {header("Location: auth.php");} ?>
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
     <main class="main main__frame_3">
        <div class="main__menu"></div>
        <div class="wrapper">
            <section class="main__otzyv">
                <div class="main__menu__content">
                    <a href="frame_1.html" class="btn">О нас</a>
                    <a href="#" class="btn">Ищут дом</a>
                    <a href="#" class="btn">Нашли дом</a>
                    <a href="frame_3.html" class="btn current-btn">Отзывы</a>
                    <a href="frame_4.html" class="btn">Контакты</a>
                    <a href="frame_11.html" class="btn">Ищу питомца</a>
                </div>

                <div class="main__otzyv__content">
                    <h1>Отзывы</h1>
                    <div class="main__otzyv__content__form">
                        <!-- Форма обратной связи -->
                        <?php if(isset($_SESSION['admin']) && isset($_GET['action']) && isset($_GET['id']) && $_GET['action']=='change_comm' && !empty($_GET['id'])){

                             $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM commentaries WHERE id = ".$_GET['id'].""));
                         ?>
                        <form class="main__otzyv__form" method="POST" action="php/handlers/main.php?comm=change&id=<?php echo $conn->arr['id']; ?>" enctype="multipart/form-data">
                            <div class="main__otzyv__form__windows">
                                <div class="main__otzyv__input-box">
                                    <input class="main__otzyv__input-box__btn" type="file" name="img_comm" value="Загрузить фото" required/>
                                </div>
                                <input type="text" name="comm_name" value="<?php echo $conn->arr['name']; ?>" required>
                                <div>
                                    <textarea name="text_comm" class="main__otzyv__message-box" placeholder="Оставить отзыв..." required><?php echo $conn->arr['text_com']; ?></textarea>
                                </div>
                            </div>
                            <div>
                                <input class="main__otzyv__button" name="edit_comm" type="submit" value="Отправить" />
                            </div>
                        </form>
                    <?php }else { ?>
                         <form class="main__otzyv__form" method="POST" action="php/handlers/main.php" enctype="multipart/form-data">
                            <div class="main__otzyv__form__windows">
                                <div class="main__otzyv__input-box">
                                    <input class="main__otzyv__input-box__btn" type="file" name="img_comm" value="Загрузить фото" required/>
                                </div>
                                <div>
                                    <textarea name="text_comm" class="main__otzyv__message-box" placeholder="Оставить отзыв..." required></textarea>
                                </div>
                            </div>
                            <div>
                                <input class="main__otzyv__button" name="add_comm" type="submit" value="Отправить" />
                            </div>
                        </form>
                    <?php } ?>
                    </div>
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