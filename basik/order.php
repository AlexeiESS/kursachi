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
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <nav>
        <a href="#"><img src="img/logo.png" draggable="false" alt></a>
        <p>г. Тюмень, ул. Пионеров, 24<br>
            Тел. 7 (5522) 84-56-23</p>
    </nav>
    <div class="nav-small">
        <a href="#">Basik Baby</a>
        <a href="#">Каталог</a>
        <a href="#">Контакты</a>
        <a href="#">Оставить заявку</a>
    </div>
    <div class="f-container">
        <div class="separator">
            <div class="--rect --longrect">
                <p>Оставить заявку</p>
            </div>
        </div>
        <form method="POST" action="php/handlers/main.php?id=<?php echo $_GET['id']; ?>">
            <div>
                <label for="order_name">Ваш продукт:</label>
            </div>
            <div>
                <label for="order_name">Имя:</label>
                <input type="text" id="order_name" name="order_name">
            </div>
            <div>
                <label for="order_city">Город:</label>
                <input type="text" id="order_city" name="order_city">
            </div>
            <div>
                <label for="order_city">Колличество</label>
                <input type="number" id="order_city" name="summary_product">
            </div>
            <div>
                <label for="order_tel">Номер телефона:</label>
                <input type="tel" id="order_tel" name="order_tel">
            </div>
            <input type="submit" name="order_send" value="Отправить">
        </form>
    </div>
    <footer>
        <a href="#">Войти как администратор</a>
    </footer>
</body>
</html>