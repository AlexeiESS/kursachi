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
                    <a href="#">Объекты</a>
                    <a href="#" style="font-weight: 700;">Оставить заявку</a>
                    <a href="#"><img src="img/exit.png" draggable="false" alt></a>
                </div>
                <?php
                            $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM contacts WHERE id = '".$_GET['id']."'"));
                            ?>
                <form class="f-request-edit" method="POST" action="php/handlers/main.php?id=<?php echo $conn->arr['id']; ?>">
                    <div class="stripe-container">
                        <div class="stripes">
                            <div id="--stripe-1"></div>
                            <div id="--stripe-2"></div>
                            <div id="--stripe-3"></div>
                            <p style="font-size: 30px; font-family: 'Open Sans', sans-serif;">Редактор</p>
                        </div>
                    </div>
                    <table>
                        
                        <tr>
                            <th>Имя</th>
                            <td><input type="text" name="user_name" value="<?php echo $conn->arr['name']; ?>" required></td>
                        </tr>
                        <tr>
                            <th>Номер телефона</th>
                            <td><input type="text" name="user_phone" value="<?php echo $conn->arr['phonen']; ?>" required></td>
                        </tr>
                        <tr>
                            <th>Адрес</th>
                            <td><input type="text" name="adress_obj" value="<?php echo $conn->arr['object']; ?>" required></td>
                        </tr>
                        <tr>
                            <th>Статус</th>
                            <td>
                                <div class="--flex-block">
                                    <div>
                                        <label for="req_waiting-0">Ждет звонка</label>
                                        <input type="radio" <?php if($conn->arr['svaz']==0){echo 'checked';} ?> value="0" name="req_waiting" id="req_waiting-0">
                                    </div>
                                    <div>
                                        <label for="req_waiting-1">Связались</label>
                                        <input type="radio" <?php if($conn->arr['svaz']==1){echo 'checked';} ?> name="req_waiting" value="1" id="req_waiting-1">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="--button-block" style="margin-bottom: 45px;">
                        <input type="submit" value="Сохранить" name="house_save_req" btn style="font-weight: 700;">
                    </div>
                </form>
                <div class="admin-bar">
                    <a href="#">Администратор</a>
                </div>
            </section>
        </div>
    </div>
</body>
</html>