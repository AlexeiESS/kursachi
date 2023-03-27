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
                    <p><span style="font-weight: 700;">Запросы</span> | Редактирование</p>
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
            <a href="requests.php">
                <img src="img/back-arrow.svg" draggable="false" alt>
                Вернуться
            </a>
        </div>
         <?php
                            $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM contacts WHERE id = '".$_GET['id']."'"));
                            ?>
        <form class="f-edit-req" method="POST" action="php/handlers/main.php?id=<?php echo $conn->arr['id']; ?>">
            <table>
                <tr>
                    <th><p>Имя</p></th>
                    <td><p><input type=text name="req_name" value="<?php echo $conn->arr['name']; ?>"></p></td>
                </tr>
                <tr>
                    <th><p>Номер телефона</p></th>
                    <td><p><input type="tel" name="req_tel" value="<?php echo $conn->arr['phonen']; ?>"></p></td>
                </tr>
                <tr>
                    <th><p>Название</p></th>
                    <td><p><input type="text" name="req_housename" value="<?php echo $conn->arr['product']; ?>"></p></td>
                </tr>
                <tr>
                    <th><p>День</p></th>
                    <td><p><input value="<?php echo date("Y-m-d",$conn->arr['date_day']); ?>" type="date" name="req_day_begin"></p></td>
                </tr>
                <tr>
                    <th><p>Время</p></th>
                    <td><p><input type="time" value="<?php echo date('H:i',$conn->arr['date_time_begin']); ?>" name="req_time_begin"> - <input type="time" value="<?php echo date('H:i',$conn->arr['date_time_end']); ?>" name="req_time_end"></p></td>
                </tr>
                <tr>
                    <th style="height: 112px;"><p>Комментарий</p></th>
                    <td><input type="text" style="width: 100%;" name="req_comment" value="<?php echo $conn->arr['text_cont']; ?>"></td>
                </tr>
                <tr>
                    <th><p>Статус</p></th>
                    <td>
                        <div class="--flex-col-block">
                            <label for="req_contacted-1">Связались</label>
                            <input <?php if($conn->arr['svaz']==1){echo 'checked';} ?> type="radio" value="1" name="req_contacted" id="req_contacted-1">
                            <label for="req_contacted-2">Ждёт звонка</label>
                            <input <?php if($conn->arr['svaz']==0){echo 'checked';} ?> type="radio" value="0"  name="req_contacted" id="req_contacted-2">
                        </div>
                    </td>
                </tr>
            </table>
            <div class="--btn-cont">
                <input type="submit" value="Сохранить изменения" name="req_save">
            </div>
        </form>
    </div>
    <footer>
        <img src="img/logo.svg" draggable="false" alt>
        <a href="auth.php">Авторизация администратора</a>
    </footer>
</body>
</html>