<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: index.php");
}
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
                    <a href="#"><img src="./img/logo.svg" draggable="false" alt></a>
                </div>
            </div>
            <div class="nav-elem" style="justify-content: center; align-items: center; flex-direction: column;">
                <div class="--menu-block">
                    <p style="font-weight: 700;">Администратор</p>
                </div>
                <div class="--menu-block">
                    <p><span style="font-weight: 700;">Домики</span> | Бронирования</p>
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
            <a href="#">
                <img src="img/back-arrow.svg" draggable="false" alt>
                Вернуться
            </a>
        </div>
        <div class="t-requests">
            <table>
                <tr>
                    <th><p>Имя</p></th>
                    <th><p>Номер телефона</p></th>
                    <th><p>Название</p></th>
                    <th><p>День</p></th>
                    <th><p>Время</p></th>
                    <th><p>Комментарий</p></th>
                    <th><p>Статус</p></th>
                </tr>
                <?php $cont = $conn->query("SELECT * FROM contacts "); foreach($cont as $row){ ?>
                <tr>
                    <td><p><?php echo $row['name']; ?></p></td>
                    <td><p><?php echo $row['phonen']; ?></p></td>
                    <td><p><?php echo $row['product']; ?></p></td>
                    <td><p><?php echo date("g:i a",$row['date_time_begin']); ?> - <?php echo date("g:i a",$row['date_time_end']); ?></p></td>
                    <td><p><?php echo date("F j, Y",$row['date_day']); ?></p></td>
                    <td><p><?php echo $row['text_cont']; ?></p></td>
                    <td><p><?php if($row['svaz']!=1){echo 'Ждёт звонка';}else {echo 'Обслужен';} ?></p></td>
                

                <div class="--btn-cont">
                    <a href="editreq.php?id=<?php echo $row['id']; ?>">Изменить</a>
                    <a href="php/handlers/main.php?action=remove&id=<?php echo $row['id']; ?>&table=contacts">Удалить</a>
                </div>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <footer>
        <img src="img/logo.svg" draggable="false" alt>
        <a href="#">Авторизация администратора</a>
    </footer>
</body>
</html>