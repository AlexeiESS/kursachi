<?php 
    //Обязательные строки
session_start(); if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){header("Location: auth.php");} require_once 'php/init.php'; 
$conn = new mysql($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Чистим Дом</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <nav>
            <div class="nav-elem" style="justify-content: left;">
                <div class="company-logo">
                    <img src="./img/Ellipse 1.svg" draggable="false" alt id="--logo-bg">
                    <img src="./img/чИСТИМ. ДОМ.svg" draggable="false" alt id="--logo-text">
                </div>
            </div>
            <div class="nav-elem" style="justify-content: right; gap: 30px;">
                <button look="btn1" class="btn-myreqs"><a href="#">Мои заявки</a></button>
                <button look="btn1" class="btn-logout"><a href="#">Выход</a></button>
            </div>
        </nav>
        <form class="f-request" method="POST" action="php/handlers/main.php">
            <p id="some-note">Заполните заявку для получения оборудования</p>
            <div class="--container">
                <label for="user_login" style="margin-bottom: 6px;">Выберите тип оборудования</label>
                <div class="input-wrap">
                    <select name="product">
                    <?php $product = $conn->query("SELECT * FROM products "); foreach($product as $row){ ?>
                    <div><option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option></div>
                    <!-- В Value инпута передаваться должно имя продукта, например,
                    <select name="product">
                    <option value="<?php //echo $row['']; ?>"> Option 1 </option>
                    </select>
                    --->
                    <?php } ?>
                    </select>
                </div>
                <label for="password" style="margin-top: 20px; margin-bottom: 6px;">Введите количество</label>
                <div class="input-wrap">
                    <img src="./img/Plus.svg" draggable="false" alt>
                    <input type="number" name="size" min="1">
                </div>
            </div>
            <input type="submit" name="add_cont" value="Оформить заявку" style="width: 251px; height: 44px; margin-top: 30px;" look="btn1">
        </form>
    </div>
    <script src="./dropdown.js"></script>
</body>
</html>