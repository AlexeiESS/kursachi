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
        <main class="main main__frame_5">
            <div class="main__menu__row"></div>
            <div class="wrapper">
                <section class="main__pets__admin">
                    <div class="main__menu__content__row">
                        <a href="frame_5.html" class="btn current-btn">Уже нашли дом</a>
                    <a href="frame_5.html" class="btn">Еще ищут дом</a>
                    <a href="frame_7.html" class="btn">Отзывы</a>
                    <a href="frame_10.html" class="btn">Заявки</a>
                    </div>
    
                    <div class="main__pets__admin__content">
                        <h1 class="main__pets__admin__h1">Еще ищут дом</h1>
                        <div class="main__pets__admin__content__form">
                            
                            <!-- Форма обратной связи -->
                            <?php
                            if(isset($_GET['action']) && $_GET['action']=='change'){
 $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM pets WHERE id = ".$_GET['id'].""));
                    ?>
                            <form method="POST" enctype="multipart/form-data" class="main__pets__admin__form" action="php/handlers/main.php?id=<?php echo $conn->arr['id']; ?>">
                                <div class="main__pets__admin__form__windows">
                                    <div class="main__pets__admin__input-box">
                                        <input class="main__pets__admin__input-box__btn" name="pet_img" type="file" value="Загрузить фото" />
                                     <!--   <img class="main__pets__admin__img" src="upload/<?php //echo $conn->arr['img']; ?>" alt="">-->
                                    </div>
                                    <div class="row__pets__admin">
                                        

                                        <input type="text" value="<?php echo $conn->arr['name']; ?>" class="pets__admin__txt" name="pet_name" tabindex="1" placeholder="Кличка..." required>
                                        <input type="text" class="pets__admin__txt" value="<?php echo $conn->arr['category']; ?>" name="pet_category" tabindex="2" placeholder="Порода..." required>
                                        <input type="text" class="pets__admin__txt" value="<?php echo $conn->arr['age']; ?>" tabindex="3" placeholder="Возраст..." name="pet_age"required>
                                        <textarea 
                                        
                                        class=" main__pets__admin__message-box" tabindex="4" name="desc_pet" placeholder="Описание..."><?php echo $conn->arr['description']; ?></textarea>
                                    </div>
                                </div>
                                
                                <div>
                                    <input class="main__pets__admin__button" type="submit" name="edit_pet" value="Добавить" />
                                </div>
                            </form>
                            <?php }else { ?>

                            <form enctype="multipart/form-data" class="main__pets__admin__form" method="POST" action="php/handlers/main.php">
                                <div class="main__pets__admin__form__windows">
                                    <div class="main__pets__admin__input-box">
                                        <input class="main__pets__admin__input-box__btn" name="pet_img" type="file" value="Загрузить фото" />
                                    </div>
                                    <div class="row__pets__admin">
                                        

                                        <input type="text" class="pets__admin__txt" tabindex="1" placeholder="Кличка..." name="pet_name" required>
                                        <input type="text" class="pets__admin__txt" tabindex="2" placeholder="Порода..." name="pet_category" required>
                                        <input type="text" class="pets__admin__txt" tabindex="3" placeholder="Возраст..." name="pet_age" required>
                                        <textarea class="main__pets__admin__message-box" tabindex="4" name="desc_pet" placeholder="Описание..." required></textarea>
                                    </div>
                                </div>
                                
                                <div>
                                    <input class="main__pets__admin__button" type="submit" name="add_pet" value="Добавить" />
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </section>
    
                <section class="main__pets__admin__table__section">
                    <div class="table__wrapper">
                        <table class="main__pets__admin__table">
                            <thead class="main__pets__admin__thead">
                                <tr class="main__pets__admin__tr">
                                    <th class="main__pets__admin__th">Фото</th>
                                    <th class="main__pets__admin__th">Кличка</th>
                                    <th class="main__pets__admin__th">Порода</th>
                                    <th class="main__pets__admin__th">Возраст</th>
                                    <th class="main__pets__admin__th">Описание</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $pets = $conn->query("SELECT * FROM pets WHERE search = 0"); foreach($pets as $row){ ?>
                                <tr class="main__pets__admin__tr">
                                    <td class="main__pets__admin__td">
                                        <img class="main__pets__admin__img" src="upload/<?php echo $row['img']; ?>" alt="">
                                    </td>
                                    <td class="main__pets__admin__td td1"><?php echo $row['name']; ?></td>
                                    <td class="main__pets__admin__td td2"><?php echo $row['category']; ?></td>
                                    <td class="main__pets__admin__td td3"><?php echo $row['age']; ?></td>
                                    <td class="main__pets__admin__td td4"><?php echo $row['description']; ?></td>
                                </tr>
                                <tr class="main__pets__admin__tr">
                                    <td colspan="5" class="main__pets__admin__td__btn-row">
                                        <div class="btn-container">
                                            <div class="btn btn-table"><a href="?action=change&id=<?php echo $row['id']; ?>">Изменить</a></div>
                                            <div class="btn btn-table"><a href="php/handlers/main.php?action1=remove&table=pets&id=<?php echo $row['id']; ?>">Удалить</a></div>
                                            <div  class="btn btn-table"><a href="php/handlers/main.php?action=change&table=pets&id=<?php echo $row['id']; ?>">Дом найден</a></div>
                                            
                                        </div>
                                    </td>
                                </tr>
                               <?php } ?>
                            </tbody>
                        </table>
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
        <?php
if(isset($_GET['ok'])){
    if($_GET['ok']=='true'){
        echo '<script>alert("Успешно!");</script>';
    }else {
        echo '<script>alert("Ошибка.");</script>';
    }
}
?>
</body>
</html>