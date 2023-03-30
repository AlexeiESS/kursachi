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
    <div class="main">
        <nav>
            <div class="nav-module">
                <div class="--top-block">
                    <a href="#">Вход для администраторов сайта</a>
                </div>
            </div>
            <div class="nav-module">
                <div class="--bigtitle">
                    <h1>SERVICE</h1>
                </div>
            </div>
            <div class="nav-module">
                <div class="--bottom-block">
                    <p>На сайте Вы можете выбрать любого специалиста в сфере массажа.</p>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="topbar">
                <a href="#">Авторизация</a>
                <a href="#">Регистрация</a>
            </div>
            <section class="masters">
                <h1 id="title">Карточка специалиста:</h1>
                <div class="masters-cont">
                    <div class="master-elem">
                        <div class="--subelem --photo">
                            <img src="img/image 1.png" draggable="false" alt>
                        </div>
                        <div class="--subelem">
                            <div>
                                <p id="--name">Мария Гребенкина</p>
                            </div>
                            <div>
                                <p id="--desc">Частная массажистка с медицинским образованием, опыт работы в санатории и салоне красоты. Приглашаю женщин и мужчин на сеансы профессионального массажа в уютной, комфортной обстановке. Принимаю в частном кабинете рядом с метро Октябрьская. Предлагаю спортивный, классический, антицеллюлитный массаж и комплексные программы, есть так же фитосауна кедровая бочка, возможны спа программы. Цена за 1 час любого массажа или спа процедур 2500. Выезд на дом к Вам возможен, но это будет дороже.</p>
                            </div>
                            <div>
                                <div class="info-block">
                                    <div class="--elem-row" style="max-width: 384px;">
                                        <div class="--elem-col">
                                            <img src="img/image 5.svg" draggable="false" alt><p>7 (9852) 841 - 63 - 20</p>
                                         </div>
                                         <div class="--elem-col">
                                            <img src="img/image 8.svg" draggable="false" alt><p>от 1000 р/час</p>
                                         </div>
                                    </div>
                                    <div class="--elem-row">
                                        <div class="--elem-col">
                                            <img src="img/image 7.svg" draggable="false" alt><p>Г. Москва, Ул. Октябрьская, 85, 5 Этаж</p>
                                        </div>
                                        <div class="--elem-col">
                                            <details>
                                                <summary><img src="img/image 6.svg" draggable="false" alt><p>Типы массажа</p></summary>
                                                <div class="--content">
                                                    <p>Классический массаж спины</p>
                                                    <p>Антицеллюлитный массаж</p>
                                                    <p>Массаж шеи и рук</p>
                                                    <p>Массаж ног полностью</p>
                                                    <p>Расслабляющий массаж всего тела</p>
                                                </div>
                                            </details>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="reviews">
                <h1 id="title">Отзывы о специалисте:</h1>
                <div class="review-cont">
                    <div class="review-elem">
                        <div class="--elem">
                            <p id="--title">Пользователь: Anton_222</p>
                        </div>
                        <div class="--elem">
                            <p id="--desc">Отличный массаж, болела спина после работы в огороде, все как рукой сняло! Рекомендую</p>
                        </div>
                    </div>
                    <div class="review-elem">
                        <div class="--elem">
                            <p id="--title">Пользователь: Mariaaa</p>
                        </div>
                        <div class="--elem">
                            <p id="--desc">Регулярно посещаю фитосауну кедровая бочка и делаю массаж шеи. Прекрасная перезагрузка после рабочей недели.</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="leave-review">
                <h1 id="title">Оставить отзыв:</h1>
                <form>
                    <textarea name="review_msg" required placeholder="Введите текст"></textarea>
                    <div class="center">
                        <input type="submit" value="Отправить" class="btn-1" name="review_send">
                    </div>
                </form>
            </section>
        </div>
        <footer>
            <p>SERVICE</p>
        </footer>
    </div>
</body>
</html>