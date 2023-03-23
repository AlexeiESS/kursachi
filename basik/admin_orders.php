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
    <section class="admin-orders">
        <div class="separator">
            <div class="--rect">
                <p>Список заявок</p>
            </div>
        </div>
        <table>
            <tr>
                <th>Имя</th>
                <th>Город</th>
                <th>Номер телефона</th>
                <th>Статус</th>
                <th>Описание</th>
                <th style="width: 329px;">Управление</th>
            </tr>
            <?php $cont = $conn->query("SELECT * FROM contacts "); foreach($cont as $row){ ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><?php echo $row['phonen']; ?></td>
                <td><?php if($row['svaz']==0){echo 'Не связались';}else {echo 'Cвязались';} ?></td>
                <td><?php echo $row['product']; ?> - <?php echo $row['summary']; ?> шт</td>
                <td>
                    <div class="--flex-block">
                        <a href="admin_orders_edit.php?id=<?php echo $row['id']; ?>">Редактировать</a>
                        <a href="php/handlers/main.php?action=remove&id=<?php echo $row['id']; ?>&table=contacts">Удалить</a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </table>
    </section>
    <footer>
        <a href="#">Выход из панели администратора</a>
    </footer>
</body>
</html>