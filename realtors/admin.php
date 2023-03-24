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
                    <a href="#" style="font-weight: 700;">Объекты</a>
                    <a href="admin_requests.php">Оставить заявку</a>
                    <a href="exit.php"><img src="img/exit.png" draggable="false" alt></a>
                </div>
                <section class="features">
                    <div class="stripe-container">
                        <div class="stripes">
                            <div id="--stripe-1"></div>
                            <div id="--stripe-2"></div>
                            <div id="--stripe-3"></div>
                            <p>Редактор</p>
                        </div>
                    </div>
                    <section class="objects">
                        <?php $homes = $conn->query("SELECT * FROM objects "); foreach($homes as $row){ ?>
                        <div class="flat-container">
                            <div class="fc-elem">
                                <div class="--top-block">
                                    <img src="upload/<?php echo $row['img']; ?>" draggable="false" alt>
                                    <div class="--desc-rect">
                                        <p><?php echo $row['name']; ?></p>
                                    </div>
                                    <div class="--desc-rect">
                                        <p><?php echo $row['adress']; ?></p>
                                    </div>
                                    <div class="--desc-rect">
                                        <p><?php echo $row['price']; ?> ₽</p>
                                    </div>
                                </div>
                                <div class="--bottom-block">
                                    <p><?php echo $row['description']; ?></p>
                                </div>
                                <div class="--button-block">
                                    <a href="admin_houses_edit.php?id=<?php echo $row['id']; ?>">Изменить</a>
                                    <a href="php/handlers/main.php?id=<?php echo $row['id']; ?>&table=objects&action=remove">Удалить</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </section>
                    <div class="--button-block" style="margin-bottom: 45px;">
                        <a href="admin_houses_add.php" style="font-weight: 700;">Добавить ещё</a>
                    </div>
                </section>
                <div class="admin-bar">
                    <a href="#">Администратор</a>
                </div>
            </section>
        </div>
    </div>
</body>
</html>