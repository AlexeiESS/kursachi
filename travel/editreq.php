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
                    <form>
                        <table>
                            <tr>
                                <th><p>Имя</p></th>
                                <th><p>Эл. адрес</p></th>
                                <th><p>Номер телефона</p></th>
                                <th><p>Тур</p></th>
                                <th><p>Даты</p></th>
                                <th><p>Связь с менеджером</p></th>
                            </tr>
                            <tr>
                                <td><input type="text" value="Имя Фамилия" name="req_name"></td>
                                <td><input type="email" value="abc@mail.ru" name="req_email"></td>
                                <td><input type="tel" value="88005553535" name="req_tel"></td>
                                <td><input type="text" value="Шерегеш" name="req_tour"></td>
                                <td>
                                    <div class="--flexblock" style="background: #fff;">
                                        <input type="date" name="req_tour_date_start">
                                        <input type="date" name="req_tour_date_end">
                                    </div>
                                </td>
                                <td>
                                    <div class="--flexblock" style="background: #fff;">
                                        <label for="req_contact_manager-1">Да</label>
                                        <input type="radio" name="req_contact_manager" id="req_contact_manager-1">
                                        <label for="req_contact_manager-2">Нет</label>
                                        <input type="radio" name="req_contact_manager" id="req_contact_manager-2">
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="tour-edit-bar">
                            <div class="--flex">
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