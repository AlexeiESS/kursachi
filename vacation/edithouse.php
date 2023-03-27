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
    <div class="container">
        <nav>
            <div class="nav-elem" style="justify-content: left; align-items: center; width: 192px;">
                <div class="--logo-block">
                <a href="./"><img src="./img/logo.svg" draggable="false" alt></a>
                </div>
            </div>
            <div class="nav-elem" style="justify-content: center; align-items: center; flex-direction: column;">
                <div class="--menu-block">
                    <p style="font-weight: 700;">Администратор</p>
                </div>
                <div class="--menu-block">
                    <p><span style="font-weight: 700;">Домики</span> | Редактирование</p>
                </div>
            </div>
            <div class="nav-elem" style="justify-content: right; width: 260px;">
                <div class="--contact-block">
                    <p>г. Калуга</p>
                    <a href="tel:+70000000000">+7(000)000-00-00</a>
                </div>
            </div>
        </nav>
        <div class="tinyblock">
            <a href="admin.php">
                <img src="img/back-arrow.svg" draggable="false" alt>
                Вернуться
            </a>
        </div>
        <?php
                            $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM homes WHERE id = '".$_GET['id']."'"));
                            ?>
        <form class="f-edit-house" method="POST" action="php/handlers/main.php?id=<?php echo $conn->arr['id']; ?>" enctype="multipart/form-data">
            <table>
                <tr>
                    <th><p>Название</p></th>
                    <th style="width: 182px;"><p>Фото</p></th>
                    <th><p>Изменить фото</p></th>
                    <th><p>Тип цены</p></th>
                    <th><p>Цена в будни, руб</p></th>
                    <th><p>Цена в вых. дни, руб</p></th>
                    <th><p>Описание</p></th>
                </tr>
                <tr>
                    <td><input type="text" name="house_name" value="<?php echo $conn->arr['name']; ?>"></td>
                    <td>
                        <div class="--photo-cont">
                            <label><img src="upload/<?php echo $conn->arr['img']; ?>" draggable="false" alt></label>
                            
                        </div>
                    </td>
                    <td>
                        <input type="file" id="house_photo" name="house_photo">
                    </td>
                    <td>
                        <select name="sale_type">
                            <option <?php if($conn->arr['sale_type']!=0){echo 'selected';} ?> value="1">Оплата в сутки</option>
                            <option <?php if($conn->arr['sale_type']==0){echo 'selected';} ?> value="0">Оплата в час</option>
                        </select>
                    </td>
                    <td><input type="number" name="house_price_workdays" value="<?php echo $conn->arr['price']; ?>" min=0><p></p></td>
                    <td><input type="number" name="house_price_holidays" value="<?php echo $conn->arr['price_2']; ?>" min=0><p></p></td>
                    <td><input type="text" name="house_desc" value="<?php echo $conn->arr['description']; ?>"></td>
                </tr>
            </table>
            <div class="--btn-cont">
                <input type="submit" value="Готово" name="house_edit" user="house_edit">
            </div>
        </form>
    </div>
    <footer>
        <img src="img/logo.svg" draggable="false" alt>
        <a href="auth.php">Авторизация администратора</a>
    </footer>
</body>
</html>