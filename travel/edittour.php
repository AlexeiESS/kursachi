<?php 
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: index.php");
}
require_once 'php/init.php';
$conn = new mysql($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
 ?>
<!DOCTYPE html>

<html>

<head>
    <title>Pandatravel</title>
    <meta charset = "UTF-8">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="css/ordered.css" rel="stylesheet" type="text/css">
</head>

<body>
        <div class="wrapper">
            <!-- Шапка сайта -->
            <header>
                <span><a href="#">PANDATRAVEL</a></span>
                <div class="top-block">
                    <div class="--elem" style="justify-content: left;"><a href="#">Назад</a></div>
                    <div class="--elem" style="justify-content: center;"><h1>Карточка тура</h1></div>
                    <div class="--elem" style="justify-content: right;"><a href="#">Выйти</a></div>
                    <span id="some-sep"></span>       
                </div>          
            </header>
            <div class="tour-edit-cont" style="margin-top: 66px; padding: 0 50px;">
                <div class="tours-table" style="width: 100%;">
                    <?php
                            $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM tours WHERE id = '".$_GET['id']."'")); 
                            ?>
                    <form method="POST" action="php/handlers/main.php?id=<?php echo $conn->arr['id']; ?>" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <th><p>Название</p></th>
                                <th style="width: 178px; box-sizing: border-box;"><p>Фото</p></th>
                                <th><p>Даты</p></th>
                                <th><p>Описание</p></th>
                                <th><p>Цена</p></th>
                            </tr>
                            
                            <tr>
                                <td><input type="text" value="<?php echo $conn->arr['name']; ?>" name="tour_name"></td>
                                <td><img src="upload/<?php echo $conn->arr['img']; ?>" draggable="false" alt></td>
                                <td>
                                    <div class="--flexblock" style="background: #fff;">
                                        <input type="date" <?php echo 'value="'.date("Y-m-d", $conn->arr['date_1']).'"'; ?>  name="tour_date_start">
                                        <input <?php echo 'value="'.date("Y-m-d", $conn->arr['date_2']).'"'; ?> type="date" name="tour_date_end">
                                    </div>
                                </td>
                                <td>
                                    <div class="--flexblock">
                                        <input type="text" value="<?php echo $conn->arr['description']; ?>" name="tour_desc">
                                    </div>
                                </td>
                                <td>
                                    <div class="--flexblock" style="background: #fff;">
                                        <input type="number" min="0" value="<?php echo $conn->arr['price']; ?>" name="tour_price"><p></p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="tour-edit-bar">
                            <div class="--flex">
                                <label id="--newphoto" for="tour_photo" class="btn-st">Новое фото</label>
                                <input type="file" name="tour_photo" style="display: none;" id="tour_photo">
                                <input type="submit" value="Изменить" name="tour_edit" class="btn-st">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Меню навигации -->
            <!-- Основной раздел сайта -->
            <!-- Подвал -->
            <div class="admin_container">
                 
            </div>
            <footer>
                <div class="copyright">
                        <span>2023 © Pandatravel - туры выходного дня.</span>
                        <span>Дизайн и разработка: команда ДиП</span>
                </div>
            </footer>        
        </div>
</body>
</html>