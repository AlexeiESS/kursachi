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
                    <div class="--elem"><h1>Авторизация</h1></div>
                    <span id="some-sep"></span>       
                </div>          
            </header>
            <!-- Меню навигации -->
            <!-- Основной раздел сайта -->
            <!-- Подвал -->
            <div class="auth_container">
                <form method="POST" action="php/handlers/main.php">
                    <div style="position: relative;">
                        <label for="user_login">Логин:</label>
                        <input type="text" name="user_login" required>
                    </div>
                    <div style="position: relative; margin-top: 42px;">
                        <label for="user_login">Пароль:</label>
                        <input type="password" name="password" required>
                    </div>
                    <div style="display: flex; justify-content: center;">
                        <input type="submit" name="sign_in">
                    </div>
                </form>
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