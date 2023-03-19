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
    <title>CourseWork</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <section class="banner-bg">
        
    </section>
    <section class="banner-cover">
        
    </section>
    <section class="banner-content">
        <p id="--title">Cake for the soul</p>
        <p id="--inspire">Для самых сладких моментов</p>
        <p id="--slogan">счастье с ароматом булочек с корицей</p>
        <svg role="presentation" class="arrow-down" style="fill:#ffffff;" x="0px" y="0px" width="38.417px" height="18.592px" viewBox="0 0 38.417 18.592"><g><path d="M19.208,18.592c-0.241,0-0.483-0.087-0.673-0.261L0.327,1.74c-0.408-0.372-0.438-1.004-0.066-1.413c0.372-0.409,1.004-0.439,1.413-0.066L19.208,16.24L36.743,0.261c0.411-0.372,1.042-0.342,1.413,0.066c0.372,0.408,0.343,1.041-0.065,1.413L19.881,18.332C19.691,18.505,19.449,18.592,19.208,18.592z"></path></g></svg>
    </section>
    <section class="company-logo">
        <img src="img/tild3932-6632-4238-a536-323166323237__22.png" draggable="false" alt="logotype">
    </section>
    <nav>
        <div class="nav-elem"><a href="#">О компании</a></div>
        <div class="nav-elem">
            <div class="nav-elem">
                <a href="#">Продукция</a>
                <div class="dropdown">
                    <div class="dd-elem"><a href="?category=klub">Клубника в шоколаде NEW!!!</a></div>
                    <div class="dd-elem"><a href="?category=kruas">Круассаны</a></div>
                    <div class="dd-elem"><a href="?category=deserts">Десерты</a></div>
                    <div class="dd-elem"><a href="?category=lunch">Ланч</a></div>
                </div>
            </div>
        </div>
        <div class="nav-elem"><a href="#">Доставка</a></div>
        <div class="nav-elem"><a href="#">Контакты</a></div>
    </nav>
    <section class="information">
        <div class="info-elem">
            <p>Мы верим: каждая семья в России должна иметь возможность питаться здоровой и полезной пищей. Мы стремимся сделать так, чтобы качественные, полезные и вкусные продукты постоянно были на столе в каждом доме.</p>
        </div>
        <div class="info-elem" style="justify-content: right;">
            <img class="--picture" src="img/tild6138-6462-4333-b564-646164393366__rhefccfy.png" draggable="false" alt>
        </div>
    </section>
    <section class="products">
        <div class="prod-wrap" style="height: 125px; margin-bottom: 60px;">
            <div class="companylogo-sc">
                <img src="img/tild3932-6632-4238-a536-323166323237__22.png" draggable="false" alt="logotype">
            </div>
        </div>
        <div class="prod-wrap prod-container">
            <?php 
            if(!isset($_GET['category'])){$product = $conn->query("SELECT * FROM products "); foreach($product as $row){ ?>
            <div class="product-item">
                
                <img src="upload/<?php echo $row['img']; ?>" draggable="false" alt>
                <div class="--content">
                    <p id="--name"><?php echo $row['name']; ?></p>
                    <p id="--weight"><?php echo $row['mass']; ?>г.</p>
                    <p id="--price"><?php echo $row['price']; ?>руб.</p>
                    <button class="btn-more<?php echo $row['id']; ?>" look="btn1">Подробнее</button>
                    <button class="btn-buy<?php echo $row['id']; ?>" look="btn2">Купить</button>
                </div>
            </div>

        <?php } } else {
            $product = $conn->query("SELECT * FROM products WHERE category='".$_GET['category']."'"); foreach($product as $row){ 

         ?>
            <div class="product-item">
                
                <img src="upload/<?php echo $row['img']; ?>" draggable="false" alt>
                <div class="--content">
                    <p id="--name"><?php echo $row['name']; ?></p>
                    <p id="--weight"><?php echo $row['mass']; ?>г.</p>
                    <p id="--price"><?php echo $row['price']; ?>руб.</p>
                    <button class="btn-more<?php echo $row['id']; ?>" look="btn1">Подробнее</button>
                    <button class="btn-buy<?php echo $row['id']; ?>" look="btn2">Купить</button>
                </div>
            </div>
        <?php } } ?>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="cont-elem">
                <a href="#"><svg class="sociallinks" width="48px" height="48px" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M50 100c27.6142 0 50-22.3858 50-50S77.6142 0 50 0 0 22.3858 0 50s22.3858 50 50 50Zm3.431-73.9854c-2.5161.0701-5.171.6758-7.0464 2.4577-1.5488 1.4326-2.329 3.5177-2.5044 5.602-.0534 1.4908-.0458 2.9855-.0382 4.4796.0058 1.1205.0115 2.2407-.0085 3.3587-.6888.005-1.3797.0036-2.0709.0021-.9218-.0019-1.8441-.0038-2.7626.0096 0 .8921.0013 1.7855.0026 2.6797.0026 1.791.0052 3.5853-.0026 5.3799.9185.0134 1.8409.0115 2.7627.0096.6912-.0015 1.382-.0029 2.0708.0021.0155 3.5565.0127 7.1128.0098 10.669-.0036 4.4452-.0072 8.8903.0252 13.3354 1.8903-.0134 3.7765-.0115 5.6633-.0095 1.4152.0014 2.8306.0028 4.2484-.0022.0117-4.0009.0088-7.9986.0058-11.9963-.0029-3.9979-.0058-7.9957.0059-11.9964.9533-.005 1.9067-.0036 2.86-.0021 1.2713.0019 2.5425.0038 3.8137-.0096.396-2.679.7335-5.3814.9198-8.0947-1.2576-.0058-2.5155-.0058-3.7734-.0058-1.2578 0-2.5157 0-3.7734-.0059 0-.4689-.0007-.9378-.0014-1.4066-.0022-1.4063-.0044-2.8123.0131-4.2188.198-1.0834 1.3158-1.9104 2.3992-1.8403h5.1476c.0117-2.8069.0117-5.602 0-8.4089-.6636 0-1.3273-.0007-1.9911-.0014-1.9915-.0022-3.9832-.0044-5.975.0131Z" fill="#ffffff"></path></svg></a>
                <a href="#"><svg class="sociallinks" width="48px" height="48px" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M50 100c27.614 0 50-22.386 50-50S77.614 0 50 0 0 22.386 0 50s22.386 50 50 50Zm19.091-63.636c2.046-.227 4.09-.682 5.909-1.591-1.364 2.045-2.954 3.863-5.228 5v1.364c0 13.636-10.227 29.09-29.09 29.09-5.909 0-11.137-1.59-15.682-4.545.909.227 1.59.227 2.5.227 4.773 0 9.318-1.59 12.727-4.318-4.545 0-8.181-2.955-9.545-7.046.455.227 1.137.227 1.818.227.907 0 1.814-.226 2.72-.453l.008-.002c-4.772-.909-8.182-5-8.182-10v-.227a8.196 8.196 0 0 0 4.546 1.364c-2.727-1.819-4.546-4.773-4.546-8.41 0-2.045.455-3.636 1.364-5.226 5.227 6.136 12.727 10.227 21.136 10.682-.227-.682-.227-1.364-.227-2.273A10.184 10.184 0 0 1 59.546 30c2.954 0 5.681 1.136 7.5 3.181 2.5-.454 4.545-1.362 6.59-2.5-.909 2.501-2.5 4.319-4.545 5.683Z" fill="#ffffff"></path></svg></a>
                <a href="#"><svg class="sociallinks" width="48px" height="48px" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M50 100C77.6142 100 100 77.6142 100 50C100 22.3858 77.6142 0 50 0C22.3858 0 0 22.3858 0 50C0 77.6142 22.3858 100 50 100ZM25 39.3918C25 31.4558 31.4566 25 39.3918 25H60.6082C68.5442 25 75 31.4566 75 39.3918V60.8028C75 68.738 68.5442 75.1946 60.6082 75.1946H39.3918C31.4558 75.1946 25 68.738 25 60.8028V39.3918ZM36.9883 50.0054C36.9883 42.8847 42.8438 37.0922 50.0397 37.0922C57.2356 37.0922 63.0911 42.8847 63.0911 50.0054C63.0911 57.1252 57.2356 62.9177 50.0397 62.9177C42.843 62.9177 36.9883 57.1252 36.9883 50.0054ZM41.7422 50.0054C41.7422 54.5033 45.4641 58.1638 50.0397 58.1638C54.6153 58.1638 58.3372 54.5041 58.3372 50.0054C58.3372 45.5066 54.6145 41.8469 50.0397 41.8469C45.4641 41.8469 41.7422 45.5066 41.7422 50.0054ZM63.3248 39.6355C65.0208 39.6355 66.3956 38.2606 66.3956 36.5646C66.3956 34.8687 65.0208 33.4938 63.3248 33.4938C61.6288 33.4938 60.2539 34.8687 60.2539 36.5646C60.2539 38.2606 61.6288 39.6355 63.3248 39.6355Z" fill="#ffffff"></path></svg></a>
            </div>
            <div class="cont-elem">
                <p style="font-weight: 800;font-size: 32px;text-transform: uppercase;">Свяжитесь с нами по интересующим вопросам:</p>
            </div>
            <div class="cont-elem" style="font-weight: 300;font-size: 18px; flex-direction: column;">
                <a href='auth.php'>Админ Панель</a>
                <p>г.Самара, ул. Мичурина д. 149</p>
                <p>тел. +7 (846) 958 47 89</p>
                <p>Email: soulcake@gmail.com</p>
            </div>
        </div>
    </footer>
    <?php $product = $conn->query("SELECT * FROM products "); foreach($product as $row){ ?>
    <script>
        document.querySelector(".arrow-down").addEventListener('click',()=>{
            document.querySelector(".company-logo").scrollIntoView(); 
        });
        document.querySelectorAll(".btn-more<?php echo $row['id']; ?>").forEach(__elem=> {
            __elem.addEventListener('click',()=>{
                document.body.insertAdjacentHTML('afterbegin',`
                <div class="fixed-cont">
                    <div class="product-card">
                        <div class="tinyblock">
                            <div class="tb-elem">
                                <a href="#">← Больше товаров</a>
                            </div>
                            <div class="tb-elem">
                                <a href="javascript:void(0);" onclick="closeModal()"><img src="img/cross.svg" draggable="false" alt></a>
                            </div>
                        </div>
                        <div class="product-card-elem" style="width: 700px; display: flex; justify-content: center;">
                            <img src="upload/<?php echo $row['img']; ?>" draggable="false" alt>
                        </div>
                        <div class="product-card-elem">
                            <p style="font-weight: 800;font-size: 18px;"><?php echo $row['name']; ?></p>
                            <p style="font-weight: 400; color: gray;"><?php echo $row['price']; ?> р.</p>
                            <button class="btn-buy<?php echo $row['id']; ?>" look="btn1">BUY NOW</button>
                            <p style="font-weight: 400; color: gray; font-size: 14px;">Описание</p><p><?php echo $row['description']; ?></p>
                        </div>
                    </div>
                </div>
                `);
                assignbuybtn(document.querySelector(".product-card .btn-buy<?php echo $row['id']; ?>"));
            });
        });
        document.querySelectorAll(".btn-buy<?php echo $row['id']; ?>").forEach(__btn=>{
            assignbuybtn(__btn);
        });
        function assignbuybtn(element) {
            element.addEventListener('click',()=>{
                if (document.querySelector(".fixed-cont")!=null) {
                    document.querySelector(".fixed-cont").remove();
                }
                document.body.insertAdjacentHTML('afterbegin',`
                <div class="fixed-cont">
                    <form class="checkout-form" method="POST" action="php/handlers/main.php?action=buy&id=<?php echo $row['id']; ?>">
                        <div class="tb-elem">
                            <a href="javascript:void(0);" onclick="closeModal()"><img src="img/cross.svg" draggable="false" alt></a>
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
                `);
            });
        }
        function closeModal() {
            document.querySelector(".fixed-cont").remove();
        }
    </script>
<?php } if(isset($_GET['ok'])){
    if($_GET['ok']=='true'){
echo '<script>alert("Успешно! Ожидайте, с вами свяжутся!");</script>';}else {
    echo '<script>alert("Неизвестная ошибка.");</script>';
}

}
    ?>
</body>
</html>