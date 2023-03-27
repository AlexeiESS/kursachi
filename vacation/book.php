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
    <div class="container">
        <nav>
            <div class="nav-elem" style="justify-content: left; align-items: center; width: 192px;">
                <div class="--logo-block">
                <a href="./"><img src="./img/logo.svg" draggable="false" alt></a>
                </div>
            </div>
            <div class="nav-elem" style="justify-content: center; align-items: end;">
                <div class="--menu-block">
                    <p>Бронирование</p>
                </div>
            </div>
            <div class="nav-elem" style="justify-content: right; width: 260px;">
                <div class="--contact-block">
                    <p>г. Калуга</p>
                    <a href="tel:+70000000000">+7(000)000-00-00</a>
                </div>
            </div>
        </nav>
        <?php
                            $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM homes WHERE id = '".$_GET['id']."'"));
                            ?>
        <form class="f-book" method="POST" action="php/handlers/main.php">
            <div class="--container">
                <label name="book_name">Ваше имя:</label>
                <input required type="text" name="book_name" text>
                <label name="book_tel">Номер телефона:</label>
                <input required type="tel" name="book_tel" text>
                <label name="book_house">Название домика:</label>
                <h1><?php echo $conn->arr['name']; ?></h1>
                <input value="<?php echo $conn->arr['name']; ?>" required type="text" name="book_house" style="display: none;" text>
                <label name="book_date">Дата:</label>
                <input required type="date" name="book_date" >

                <label name="book_duration">Время:</label>
                <input required type="time" name="time_begin"> - <input required type="time" name="time_end" >
                <label name="book_comment" style="margin-top: 29px;">Комментарий к бронированию:</label>
                <input required type="text" name="book_comment" style="width: 835px; height: 133px;" placeholder="Введите комментарий или оставьте поле пустым..." text>
                <input name="add_cont" type="submit" value="Заказать звонок">
            </div>
        </form>
    </div>
    <footer>
        <img src="img/logo.svg" draggable="false" alt>
        <a href="auth.php">Авторизация администратора</a>
    </footer>
    <script src="dropdown.js"></script>
</body>
</html>