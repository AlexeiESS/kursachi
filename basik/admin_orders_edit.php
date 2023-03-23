<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: index.php");
}if(!isset($_GET['id'])){header("Location: index.php");}

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
        <a href="#" style="font-weight: 700;">Заявки</a>
    </div>
    <?php
                            $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM contacts WHERE id = '".$_GET['id']."'"));
                            ?>
    <form class="admin-orders f-order-edit" action="php/handlers/main.php?id=<?php echo $conn->arr['id']; ?>" method="POST"> 
        <div class="separator">
            <div class="--rect">
                <p>Внесение изменений</p>
            </div>
        </div>
        <table>
            <tr>
                <th>Имя</th>
                <td><input type="text" value="<?php echo $conn->arr['name']; ?>" name="order_name"></td>
            </tr>
            <tr>
                <th>Город</th>
                <td><input type="text" value="<?php echo $conn->arr['city']; ?>" name="order_city"></td>
            </tr>
            <tr>
                <th>Номер телефона</th>
                <td><input type="tel" value="<?php echo $conn->arr['phonen']; ?>" name="order_tel"></td>
            </tr>
            <tr>
                <th>Продукт</th>
                <td><input type="text" value="<?php echo $conn->arr['product']; ?>" id="order_city" name="product"></td>
            </tr>
            <tr>
                <th>Колличество</th>
                <td><input type="number" value="<?php echo $conn->arr['summary']; ?>" id="order_city" name="summary_product"></td>
            </tr>
            <tr>
                <th>Статус</th>
                <td>
                    <div class="--flex-block">
                        <div>
                            <label for="order_waiting-0">Не связались</label>
                            <input <?php if($conn->arr['svaz']==0){echo 'checked';} ?> type="radio" value="0" name="order_waiting" id="order_waiting-0">
                        </div>
                        <div>
                            <label for="order_waiting-1">Связались</label>
                            <input <?php if($conn->arr['svaz']==1){echo 'checked';} ?> type="radio" value="1" name="order_waiting" id="order_waiting-1">
                        </div>
                    </div>
                </td>
            </tr>
            <!--<tr>
                <th>Описание</th>
                <td><input type="text" name="order_desc"></td>
            </tr>-->
        </table>
        <div class="--col-wrap">
            <div class="--btn-block">
                <input type="submit" name="order_save" btn value="Сохранить" style="font-weight: 700;">
            </div>
        </div>
    </form>
    <footer>
        <a href="#">Выход из панели администратора</a>
    </footer>
</body>
</html>