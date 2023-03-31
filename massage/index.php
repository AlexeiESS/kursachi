<?php
session_start();
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
    <div class="main">
        <nav>
            <div class="nav-module">
                <div class="--top-block">
                    <a href="adminauth.php">Вход для администраторов сайта</a>
                </div>
            </div>
            <div class="nav-module">
                <div class="--bigtitle">
                    <h1>SERVICE</h1>
                </div>
            </div>
            <div class="nav-module">
                <div class="--bottom-block">
                    <p>На сайте Вы можете выбрать любого специалиста в сфере массажа.</p>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="topbar">
                <?php if(isset($_SESSION['user']) || isset($_SESSION['admin'])){ ?>
                    <a href="exit.php">Выход</a>
                <?php }else { ?>
                <a href="signin.php">Авторизация</a>
                <a href="signup.php">Регистрация</a>
            <?php } ?>
            </div>
            <section class="masters">
                <h1 id="title">Специалисты</h1>
                <div class="masters-cont">
                    <?php $worker = $conn->query("SELECT * FROM workers"); foreach($worker as $row){ ?>
                    <div class="master-elem">
                        <div class="--subelem --photo">
                            <img src="upload/<?php echo $row['img']; ?>" draggable="false" alt>
                        </div>
                        <div class="--subelem">
                            <div>
                                <p id="--name"><?php echo $row['name']; ?></p>
                            </div>
                            <div>
                                <p id="--desc"><?php echo $row['description']; ?></p>
                            </div>
                            <div>
                                <div class="right">
                                    <a href="card.php?id=<?php echo $row['id']; ?>" class="btn-1">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </section>
        </div>
        <footer>
            <p>SERVICE</p>
        </footer>
    </div>
</body>
</html>