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
            <div class="tour-edit-cont">
                <form class="f-add-tour" method="POST" action="php/handlers/main.php" enctype="multipart/form-data">
                    <div class="f-elem">
                        <div class="--subelem">
                            <div class="--tour-photo">
                                <label for="tour_photo">Загрузить фото</label>
                                <input type="file" name="tour_photo" id="tour_photo" style="display: none;">
                            </div>
                        </div>
                        <div class="--subelem">
                            <div style="position: relative;">
                                <label for="tour_name" id="inputlabel">Название:</label>
                                <input type="text" name="tour_name" id="tour_name">
                            </div>
                            <div>
                                <div style="position: relative;">
                                    <label for="tour_date_begin" id="inputlabel">Даты:</label>
                                    <input type="date" name="tour_date_begin" id="tour_date_begin">
                                    <input type="date" name="tour_date_end" id="tour_date_end">
                                </div>
                            </div>
                            <div style="position: relative;">
                                <label for="tour_desc" id="inputlabel">Описание:</label>
                                <input type="text" name="tour_desc" id="tour_desc">
                            </div>
                            <div style="position: relative;">
                                <label for="tour_price" id="inputlabel">Цена:</label>
                                <input type="number" name="tour_price" id="tour_price" min="0">
                            </div>
                        </div>
                    </div>
                    <div class="f-elem">
                        <input type="submit" name="tour_add">
                    </div>
                </form>
            </div>
            <div class="tours-table">
                <form>
                    <table>
                        <tr>
                            <th><p>Название</p></th>
                            <th style="width: 178px; box-sizing: border-box;"><p>Фото</p></th>
                            <th><p>Даты</p></th>
                            <th><p>Описание</p></th>
                            <th><p>Цена</p></th>
                            <th><p>Управление</p></th>
                        </tr>
                        <?php $tours = $conn->query("SELECT * FROM tours "); foreach($tours as $row){ 
                            $date_1 = date('j',$row['date_1']);
                            $date_2 = date('j',$row['date_2']);
                            $month_1 = date('F',$row['date_1']);  
                            $month_2 = date('F',$row['date_2']);
                            $year_1 = date('o',$row['date_1']);
                            $year_2 = date('o',$row['date_2']);
                            ?>
                        <tr>
                            <td><p><?php echo $row['name']; ?></p></td>
                            <td><img src="upload/<?php echo $row['img']; ?>" draggable="false" alt></td>
                            <td><p><?php echo $date_1; ?>-<?php echo $date_2; ?> <?php echo $month_1; if($month_1!=$month_2){echo '-'.$month_2;}?> <?php echo $year_1; if($year_1!=$year_2){echo '-'.$year_2;}?></p></td>
                            <td><p><?php echo $row['description']; ?></p></td>
                            <td><p><?php echo $row['price']; ?></p></td>
                            <td>
                                <div class="--flexblock">
                                    <a href="edittour.php?id=<?php echo $row['id']; ?>"><input value="Изменить" name="tour_edit"></a>
                                    <a href="php/handlers/main.php?action=remove&table=tours&id=<?php echo $row['id']; ?>"><input value="Удалить" name="tour_remove"></a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </form>
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
            <?php
if(isset($_GET['ok'])){
    if($_GET['ok']=='true'){
        echo '<script>alert("Успешно!");</script>';
    }else {
        echo '<script>alert("Ошибка.");</script>';
    }
}
?>
</body>
</html>