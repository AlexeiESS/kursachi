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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="address-block">
            <p>
                г. Кострома, ул. Магистральная, 20<br>3, 2 этаж, офис 4
            </p>
        </div>
        <img id="houseico" src="img/houseico.svg" draggable="false" alt>
        <div class="stripe-container">
            <div class="stripes">
                <div id="--stripe-1"></div>
                <div id="--stripe-2"></div>
                <div id="--stripe-3"></div>
                <p>стены</p>
            </div>
        </div>
        <div class="tel-block">
            <img src="img/tel.svg" draggable="false" alt><a href="tel:79125210012">7 (912) 521 00 12</a>
        </div>
    </nav>
    <div class="main">
        <div class="container">
            <section class="top-block">
                <div class="bar">
                    <a href="#"><img src="img/back.png" draggable="false" alt></a>
                    <a href="#">Преимущества</a>
                    <a href="#">Объекты</a>
                    <a href="#" style="font-weight: 700;">Оставить заявку</a>
                    <a href="#"><img src="img/exit.png" draggable="false" alt></a>
                </div>
                <table>
                    <tr>
                        <th>Имя</th>
                        <th>Номер телефона</th>
                        <th>Адрес</th>
                        <th>Статус</th>
                        <th>Управление</th>
                    </tr>
                    <tr>
                        <?php $cont = $conn->query("SELECT * FROM contacts "); foreach($cont as $row){ ?>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['phonen']; ?></td>
                        <td><?php echo $row['object']; ?></td>
                        <td><?php if($row['svaz']==0){echo 'Ждет звонка';}else {echo 'Обслужен';} ?></td>
                        <td>
                            <div class="--flex-block">
                                <a href="admin_requests_edit.php?id=<?php echo $row['id']; ?>">Редактировать</a>
                                <a href="php/handlers/main.php?action=remove&table=contacts&id=<?php echo $row['id']; ?>&returned=true"><img src="img/cross.png" draggable="false" alt></a>
                            </div>
                        </td>
                    <?php } ?>
                    </tr>
                </table>
                <div class="admin-bar">
                    <a href="admin.php">Администратор</a>
                </div>
            </section>
        </div>
    </div>
</body>
</html>