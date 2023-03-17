<?php
session_start();
if(isset($_SESSION['user']) || isset($_SESSION['admin'])){header("Location: index.php")}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ищу Дом</title>
    <link rel="icon" href="../assets/images/doggy.png">
    <link rel="stylesheet" href="../assets/styles/main.css">
    <link rel="stylesheet" href="../assets/styles/normalize/normalize.css">
</head>
<body>
    


       
    
    
        <!--MAIN-->
        <main class="main main__frame_8">
            <div class="main__menu__row"></div>
            <div class="wrapper">
                <section class="main__login">

                    

    
                    <div class="main__login__content">
                        <h1 class="main__login__h1">Авторизация</h1>
                        <div class="main__login__content__form">
                            <!-- Форма обратной связи -->
                            <form id="contactform" method="POST" action="php/handlers/main.php">
                                <div class="row">
                                    <div class="row__label__block">
                                        <label class="row__label" for="name">Логин:</label>
                                    </div>
                                    <input type="text" name="user_login" id="name" class="txt" tabindex="1" placeholder="Введите логин" required>
                                </div>
                                
                                <div class="row">
                                    <div class="row__label__block">
                                        <label class="row__label" for="number">Пароль:</label>
                                    </div>
                                    <input type="password" name="password" id="number" class="txt" tabindex="2" placeholder="Введите пароль" required>
                                </div>
                                
                                <div class="center">
                                    <input class="ishu-btn" type="submit" id="submitbtn" name="auth" tabindex="3" value="Войти">
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    
    
        

        

</body>
</html>