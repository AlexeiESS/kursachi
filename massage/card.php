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
                <h1 id="title">Карточка специалиста:</h1>
                <div class="masters-cont">
                    <div class="master-elem">
                        <?php
                            $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM workers WHERE id = '".$_GET['id']."'"));
                            ?>
                        <div class="--subelem --photo">
                            <img src="upload/<?php echo $conn->arr['img']; ?>" draggable="false" alt>
                        </div>
                        <div class="--subelem">
                            <div>
                                <p id="--name"><?php echo $conn->arr['name']; ?></p>
                            </div>
                            <div>
                                <p id="--desc"><?php echo $conn->arr['description']; ?></p>
                            </div>
                            <div>
                                <div class="info-block">
                                    <div class="--elem-row" style="max-width: 384px;">
                                        <div class="--elem-col">
                                            <img src="img/image 5.svg" draggable="false" alt><p><?php echo $conn->arr['phonen']; ?></p>
                                         </div>
                                         <div class="--elem-col">
                                            <img src="img/image 8.svg" draggable="false" alt><p>от <?php echo $conn->arr['price']; ?> р/час</p>
                                         </div>
                                    </div>
                                    <div class="--elem-row">
                                        <div class="--elem-col">
                                            <img src="img/image 7.svg" draggable="false" alt><p><?php echo $conn->arr['adress']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="reviews">
                <h1 id="title">Отзывы о специалисте:</h1>
                <div class="review-cont">
                    <?php $comm = $conn->query("SELECT * FROM comm WHERE id_worker=".$_GET['id']); foreach($comm as $row){ { ?>
                    <div class="review-elem">
                        <div class="--elem">
                            <p id="--title">Пользователь: <?php echo $row['login']; ?></p>
                        </div>
                        <div class="--elem">
                            <p id="--desc"><?php echo $row['text_com']; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </section>
            <?php if(isset($_SESSION['user'])){ ?>
            <section class="leave-review">
                <h1 id="title">Оставить отзыв:</h1>
                <form method="POST" action="php/handlers/main.php?id=<?php echo $_GET['id']; ?>">
                    <textarea name="review_msg" required placeholder="Введите текст"></textarea>
                    <div class="center">
                        <input type="submit" value="Отправить" class="btn-1" name="review_send">
                    </div>
                </form>
            </section>
        <?php }else { ?>
            <section class="leave-review">
                <h1 id="title">Вам надо авторизоваться, чтобы оставить отзыв</h1>
            </section>
        <?php } ?>
        </div>
        <footer>
            <p>SERVICE</p>
        </footer>
    </div>
</body>
</html>