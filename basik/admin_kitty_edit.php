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
        <a href="#" style="font-weight: 700;">Каталог</a>
        <a href="#">Заявки</a>
    </div>
    <?php
                            $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM products WHERE id = '".$_GET['id']."'"));
                            ?>
    <form method="POST" action="php/handlers/main.php?id=<?php echo $conn->arr['id']; ?>" enctype="multipart/form-data">
        <div class="separator">
            <div class="--rect">
                <p>Внесение изменений</p>
            </div>
        </div>
        <section class="kitties card admin-kitties">
            <div class="kittie-elem">
                <div class="--col-wrap">
                    <div class="--elem --photo-elem">
                        <img id="--photo" src="upload/<?php echo $conn->arr['img']; ?>" draggable="false" alt>
                    </div>
                    <div class="--elem --desc-elem">
                        <p id="--title"><input type="text" value="<?php echo $conn->arr['name']; ?>" name="kitty_name"></p>
                        <input type="file" name="kitty_photo" id="kitty_photo" >
                        <p id="--desc"><textarea name="kitty_desc"><?php echo $conn->arr['description']; ?></textarea></p>
                        <div class="--flex-block">
                            <div>
                                <p><input type="number" value="<?php echo $conn->arr['price']; ?>" min=0 name="kitty_price"> руб</p>
                            </div>
                            <div>
                                <p>Вес: <input type="number" value="<?php echo $conn->arr['masse']; ?>" min=0 step="0.1" name="kitty_weight"> кг</p>
                            </div>
                            <div>
                                <p>Рост: <input type="number" value="<?php echo $conn->arr['height']; ?>" min=0 name="kitty_height"> см</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="--col-wrap">
                    <div class="--btn-block">
                        <input type="submit" name="kittie_save_edit" btn value="Изменить"> 
                       
                    </div>
                </div>
            </div>
        </section>
    </form>
    <footer>
        <a href="#">Выход из панели администратора</a>
    </footer>
</body>
</html>