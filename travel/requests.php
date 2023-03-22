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
                            <tr>
                                <td><p>Имя Фамилия</p></td>
                                <td><p>abc@mail.ru</p></td>
                                <td><p>88005553535</p></td>
                                <td><p>Шерегеш</p></td>
                                <td><p>18-19 февраля 2023</p></td>
                                <td><p>Да</p></td>
                                <td>
                                    <div class="--flexblock">
                                        <input type="submit" value="Изменить" name="req_edit">
                                        <input type="submit" value="Удалить" name="req_remove">
                                    </div>
                                </td>
                            </tr>
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