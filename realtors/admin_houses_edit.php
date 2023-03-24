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
                    <a href="#" style="font-weight: 700;">Объекты</a>
                    <a href="#">Оставить заявку</a>
                    <a href="#"><img src="img/exit.png" draggable="false" alt></a>
                </div>
                <?php
                            $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM objects WHERE id = '".$_GET['id']."'"));
                            ?>
                <form class="f-house-edit" method="POST" enctype="multipart/form-data" action="php/handlers/main.php?id=<?php echo $conn->arr['id']; ?>">
                    <div class="stripe-container">
                        <div class="stripes">
                            <div id="--stripe-1"></div>
                            <div id="--stripe-2"></div>
                            <div id="--stripe-3"></div>
                            <p style="font-size: 30px; font-family: 'Open Sans', sans-serif;">Редактор</p>
                        </div>
                    </div>
                    <section class="objects">
                        <div class="flat-container">
                            <div class="fc-elem">
                                <div class="--top-block">
                                    <img src="upload/<?php echo $conn->arr['img']; ?>" draggable="false" alt>
                                    <div class="--button-block" style="margin-top: 0; margin-bottom: 20px;">
                                        <label btn style="width: 100%;" for="house_photo_new">Добавить новое фото</label>
                                        <input type="file" style="display: none;" id="house_photo_new" name="house_photo_new">
                                    </div>
                                    <div class="--desc-rect">
                                        <p><input type="text" value="<?php echo $conn->arr['name']; ?>" name="house_desc"></p>
                                    </div>
                                    <div class="--desc-rect">
                                        <p><input type="text" value="<?php echo $conn->arr['adress']; ?>" name="house_location"></p>
                                    </div>
                                    <div class="--desc-rect">
                                        <p><input type="number" value="<?php echo $conn->arr['price']; ?>" min=0 name="house_price"> ₽</p>
                                    </div>
                                </div>
                                <div class="--bottom-block">
                                    <p><input type="text" value='<?php echo $conn->arr['description']; ?>' name="house_full_desc"></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="--button-block" style="margin-bottom: 45px;">
                        <input type="submit" value="Сохранить" name="house_save_edit" btn style="font-weight: 700;">
                    </div>
                </form>
                <div class="admin-bar">
                    <a href="admin.php">Администратор</a>
                </div>
            </section>
        </div>
    </div>
</body>
</html>