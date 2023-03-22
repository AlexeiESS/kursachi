<?php
require_once 'php/init.php';
$conn = new mysql($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
?>
<!DOCTYPE html>

<html>

<head>
    <title>Pandatravel</title>
    <meta charset = "UTF-8">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
        <div class="wrapper">
            <!-- Шапка сайта -->
            <header>
                <span><a href="#">PANDATRAVEL</a></span>                 
            </header>
            <!-- Меню навигации -->
            <nav>
                <a href="#ту">Туры</a>     |                 
                <a href="#ком">Команда</a>     |
                <a href="#кон">Контакты</a>
            </nav>
            <!-- Основной раздел сайта -->
            <main>
                <!-- Раздел с картинкой и слоганом -->
                <div class="picture">
                    <div class="slogan">Когда горы зовут</div>
                    <input type="submit" name="buttom" value="Подобрать тур">     
                </div> 
                <!-- Раздел с текстовыми фразами --> 
                <div class="text">
                    <p>Ходим. Водим. Показываем красивое</p>
                    <p>От Урала до Сибири</p>
                    <p>Когда хочется активно провести выходные</p>
                    <p>Проветрить голову и глотнуть свежего воздуха</p>
                    <p>Зимой и летом</p>
                    <p>Доступные маршруты и малоизвестные тропки</p>
                </div>
                <!-- Раздел с турами -->
                <div class="allgoods">
                    <h2 id="ту"> Туры </h2>
                    <?php $tours = $conn->query("SELECT * FROM tours "); foreach($tours as $row){ 
                            $date_1 = date('j',$row['date_1']);
                            $date_2 = date('j',$row['date_2']);
                            $month_1 = date('F',$row['date_1']);  
                            $month_2 = date('F',$row['date_2']);
                            $year_1 = date('o',$row['date_1']);
                            $year_2 = date('o',$row['date_2']);
                            ?>
                    <div class="good">
                        <div class="good_image" url='upload/<?php echo $row['img']; ?>'><?php echo $row['name']; ?></div>
                        <div class="good_text">
                            <h3><?php echo $date_1; ?>-<?php echo $date_2; ?> <?php echo $month_1; if($month_1!=$month_2){echo '-'.$month_2;}?> <?php echo $year_1; if($year_1!=$year_2){echo '-'.$year_2;}?></h3>
                            <p><?php echo $row['description']; ?></p>
                        </div>
                        <input type="submit" name="buttom" value="Подробнее" class="tour-more<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>"> 
                        <input type="submit" name="buttom" value="Забронировать" class="btn-buy<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>"> 
                    </div>
                    <?php } ?>
                </div>
                <!-- Раздел с описанием команды -->
                <div class="team">
                   <h2 id="ком"> Команда </h2>
                    <div class="team_o">
                        <h2>Ольга "Сова" Эчкалова</h2>
                        <ul>
                          <li>Стаж катания: с 2007г</li>
                          <li>Специализация: фрирайд, лавинная безопасность</li>
                          <li>Инструктор по сноуборду категории С</li>
                          <li>Сертификаты курсов первой помощи</li>
                          <li>Сертификаты курсов лавинной безопасности</li>
                          <li>Постоянное совершенствование мастерства в школах фрирайд катания</li>
                        </ul>                       
                    </div>
                    <div class="team_pic"></div>
                    <div class="team_a">                        
                        <h2>Александр "Панда" Эчкалов</h2>
                        <ul>
                          <li>Стаж катания: с 2000г</li>
                          <li>Специализация: карвинг, флэт фристайл</li>
                          <li>Инструктор по сноуборду категории С</li>
                          <li>Сертификаты курсов первой помощи</li>

                          <li>Постоянное совершенствование мастерства в специализированных школах</li>
                        </ul>                      
                    </div>
                </div>
                <!-- Раздел с нашими контактами -->
                <div class="contacts">
                    <h2 id="кон" > Контакты </h2>   
                    <div class="map" style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/11133/kinel/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Кинель</a><a href="https://yandex.ru/maps/11133/kinel/geo/ulitsa_50_let_oktyabrya/771892505/?ll=50.628272%2C53.224185&utm_medium=mapframe&utm_source=maps&z=16.07" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица 50 лет Октября — Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/?ll=50.628272%2C53.224185&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgk3NzE4OTI1MDUSYtCg0L7RgdGB0LjRjywg0KHQsNC80LDRgNGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCDQmtC40L3QtdC70YwsINGD0LvQuNGG0LAgNTAg0LvQtdGCINCe0LrRgtGP0LHRgNGPIgoNUYNKQhVm5VRC&z=16.07" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
                    <div class="info">
                        <div>г.Тюмень, ул.50 лет Октября, 56</div>
                        <div>пн-сб 10:00-19:00</div>
                        <div>+7(922) 000-00-00</div>
                        <div id="vk">
                            <a href="https://vk.com/">
                                <img src="images/custom_transp/vkontakte.png">
                            </a>
                        </div> 
                        <div id="telega">
                            <a href="https://web.telegram.org/">
                                <img src="images/custom_transp/telegram.png">
                            </a>
                        </div>       
                    </div>
                </div>
            </main>
            <!-- Подвал -->
            <footer>
                <div class="copyright">
                        <span>2023 © Pandatravel - туры выходного дня.</span>
                        <span>Дизайн и разработка: команда ДиП</span>
                </div>
            </footer>        
        </div>
        <script>
            <?php $tours = $conn->query("SELECT * FROM tours "); foreach($tours as $row){ 
                            $date_1 = date('j',$row['date_1']);
                            $date_2 = date('j',$row['date_2']);
                            $month_1 = date('F',$row['date_1']);  
                            $month_2 = date('F',$row['date_2']);
                            $year_1 = date('o',$row['date_1']);
                            $year_2 = date('o',$row['date_2']);
                            ?>
            let productcards<?php echo $row['id']; ?>= [];
            
            let contactform<?php echo $row['id']; ?>= `
                        <div class="fixed-cont">
                            <form class="checkout-form" method="POST" action="php/handlers/main.php?id=<?php echo $row['id']; ?>">
                                <div class="tb-elem">
                                    <a href="javascript:void(0);" onclick="closeModal()"><img src="images/custom/cross.svg" draggable="false" alt></a>
                                </div>
                                <div class="form-elem">
                                    <label for="user_name">Ваше имя</label>
                                    <input type="text" name="user_name" id="user_name" required>
                                </div>
                                <div class="form-elem">
                                    <label for="user_email">Электронный адрес</label>
                                    <input type="email" name="user_email" id="user_email" required>
                                </div>
                                <div class="form-elem">
                                <label for="user_tel">Ваш номер телефона</label>
                                <input type="tel" name="user_tel" id="user_tel" required>
                                </div>
                                <div class="form-elem">
                                    <input type="submit" value="Отправить заявку" name="buy_product">
                                </div>
                            </form>
                        </div>
                        `;
            document.querySelectorAll('.good').forEach(__good=>{
                productcards<?php echo $row['id']; ?>.push(`<div class="fixed-cont">
                            <div class="product-card">
                                <div class="tinyblock">
                                    <div class="tb-elem">
                                        <a href="javascript:void(0);" onclick="closeModal()"><img src="images/custom/cross.svg" draggable="false" alt></a>
                                    </div>
                                </div>
                                <div class="product-card-elem" style="width: 700px; display: flex; justify-content: center;">
                                    <img src="upload/<?php echo $row['img']; ?>" draggable="false" alt>
                                </div>
                                <div class="product-card-elem">
                                    <p style="font-weight: 700;font-size: 24px; color: #555555;"><?php echo $row['name']; ?></p>
                                    <p style="font-weight: 600; color: gray; font-size: 18px;"><span style="font-weight: 400;">Цена:</span> $<?php echo $row['price']; ?></p>
                                    <p style="font-weight: 600; color: #d57426; font-size: 18px; margin-bottom: 14px;"><span style="font-weight: 400;">Дата проведения:</span> <?php echo $date_1; ?>-<?php echo $date_2; ?> <?php echo $month_1; if($month_1!=$month_2){echo '-'.$month_2;}?> <?php echo $year_1; if($year_1!=$year_2){echo '-'.$year_2;}?></p>
                                    <button class="btn-buy<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>" look="btn1">Забронировать</button>
                                    <p style="font-weight: 400; color: gray; font-size: 16px; margin-top: 10px;"><?php echo $row['description']; ?></p>
                                </div>
                            </div>
                        </div>`);
            });
            document.querySelectorAll('.btn-buy<?php echo $row['id']; ?>').forEach(__btn=>{
                __btn.addEventListener('click',(ev)=>{
                        closeModal();
                        document.body.insertAdjacentHTML('afterbegin',contactform<?php echo $row['id']; ?>);
                    });
            });
            document.querySelectorAll('.tour-more<?php echo $row['id']; ?>').forEach(__btn=>{
                __btn.addEventListener('click',(ev)=>{
                    document.body.insertAdjacentHTML('afterbegin',productcards<?php echo $row['id']; ?>[parseInt(ev.target.getAttribute('id'))]);
                    document.querySelector('.btn-buy<?php echo $row['id']; ?>').addEventListener('click',(ev)=>{
                        closeModal();
                        document.body.insertAdjacentHTML('afterbegin',contactform<?php echo $row['id']; ?>);
                    });
                });
            });
            <?php } ?>
            function closeModal() {
                if (document.querySelector('.fixed-cont')!=null) {
                    document.querySelector(".fixed-cont").remove();
                }
            }
        </script>
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