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
        <a href="#" style="font-weight: 700;">Каталог</a>
        <a href="#">Заявки</a>
    </div>
    <form>
        <div class="separator">
            <div class="--rect">
                <p>Каталог</p>
            </div>
        </div>
        <section class="kitties card admin-kitties">
            <?php $product = $conn->query("SELECT * FROM products "); foreach($product as $row){ ?>
            <div class="kittie-elem">
                <div class="--col-wrap">
                    <div class="--elem --photo-elem">
                        <img id="--photo" src="upload/<?php echo $row['img']; ?>" draggable="false" alt>
                    </div>
                    <div class="--elem --desc-elem">
                        <p id="--title"><?php echo $row['name']; ?></p>
                        <p id="--desc"><?php echo $row['description']; ?></p>
                        <div class="--flex-block">
                            <div>
                                <p><?php echo $row['price']; ?> руб</p>
                            </div>
                            <div>
                                <p>Вес: <?php echo $row['masse']; ?> кг</p>
                            </div>
                            <div>
                                <p>Рост: <?php echo $row['height']; ?> см</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="--col-wrap">
                    <div class="--btn-block">
                        <a href="admin_kitty_edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">Изменить</a>
                        <a href="php/handlers/main.php?action=remove&id=<?php echo $row['id']; ?>&table=products" class="btn-remove">Удалить</a>
                    </div>
                </div>
                
            </div>
            <?php } ?>
            <div class="--col-wrap">
                    <div class="--btn-block">
                        <a href="admin_kitty_add.php" class="btn-edit" style="font-weight: 700;">Добавить</a>
                    </div>
                </div>
        </section>
    </form>
    <footer>
        <a href="#">Выход из панели администратора</a>
    </footer>
</body>
</html>