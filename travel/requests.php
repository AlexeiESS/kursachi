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
                    <div class="--elem" style="justify-content: center;"><h1>Заявки</h1></div>
                    <div class="--elem" style="justify-content: right;"><a href="#">Выйти</a></div>
                    <span id="some-sep"></span>       
                </div>          
            </header>
            <div class="tour-edit-cont" style="margin-top: 66px; padding: 0 50px;">
                <div class="tours-table" style="width: 100%;">
                    <form>
                        <table>
                            <tr>
                                <th><p>Имя</p></th>
                                <th><p>Эл. адрес</p></th>
                                <th><p>Номер телефона</p></th>
                                <th><p>Тур</p></th>
                                <th><p>Даты</p></th>
                                <th><p>Связь с менеджером</p></th>
                                <th><p>Управление</p></th>
                            </tr>
                            <?php $cont = $conn->query("SELECT * FROM contacts "); foreach($cont as $row){ 
                                $date_1 = date('j',$row['date_1']);
                            $date_2 = date('j',$row['date_2']);
                            $month_1 = date('F',$row['date_1']);  
                            $month_2 = date('F',$row['date_2']);
                            $year_1 = date('o',$row['date_1']);
                            $year_2 = date('o',$row['date_2']);
                            ?>
                            <tr>
                                <td><p><?php echo $row['name']; ?></p></td>
                                <td><p><?php echo $row['email']; ?></p></td>
                                <td><p><?php echo $row['phonen']; ?></p></td>
                                <td><p><?php echo $row['tour']; ?></p></td>
                                <td><p><?php echo $date_1; ?>-<?php echo $date_2; ?> <?php echo $month_1; if($month_1!=$month_2){echo '-'.$month_2;}?> <?php echo $year_1; if($year_1!=$year_2){echo '-'.$year_2;}?></p></td>
                                <td><p><?php if($row['svaz']!=0){echo 'Да';}else {echo 'Нет';} ?></p></td>
                                <td>
                                    <div class="--flexblock">
                                        <a href="editreq.php?id=<?php echo $row['id']; ?>"><input value="Изменить" name="req_edit"></a>
                                        <a href="php/handlers/main.php?action=remove&table=contacts&id=<?php echo $row['id']; ?>"><input value="Удалить" name="req_remove"></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </table>
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