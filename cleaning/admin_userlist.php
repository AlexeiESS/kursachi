<?php 
    //Обязательные строки
session_start(); if(!isset($_SESSION['admin'])){header("Location: auth.php");} require_once 'php/init.php'; 
$conn = new mysql($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Чистим Дом</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <nav>
            <div class="nav-elem" style="justify-content: left;">
                <div class="company-logo">
                    <img src="./img/Ellipse 1.svg" draggable="false" alt id="--logo-bg">
                    <img src="./img/чИСТИМ. ДОМ.svg" draggable="false" alt id="--logo-text">
                </div>
            </div>
            <div class="nav-elem" style="justify-content: right; gap: 30px;">
                <button look="btn1" class="btn-myreqs" style="width: 169px;"><a href="#">Просмотреть заявки</a></button>
                <button look="btn1" class="btn-myreqs" style="width: 169px;"><a href="#">Добавить пользователя</a></button>
                <button look="btn1" class="btn-myreqs btn-myreqs-active" style="width: 169px;"><a href="#">Список пользователей</a></button>
                <button look="btn1" class="btn-logout"><a href="#">Выход</a></button>
            </div>
        </nav>
        <div class="my-requests">
            <p id="some-note">Данные пользователей</p>
            <table>
                <tr>
                    <th><p>Имя</p></th>
                    <th><p>Фамилия</p></th>
                    <th><p>Логин</p></th>
                    <th><p>Пароль</p></th>
                    <th><p>Редактирование заявки</p></th>
                </tr>
                <?php $user = $conn->query("SELECT * FROM users "); foreach($user as $row){ ?>
                <tr>
                    <td><p><?php echo $row['name']; ?></p></td>
                    <td><p><?php echo $row['surename']; ?></p></td>
                    <td><p><?php echo $row['login']; ?></p></td>
                    <td><p><?php echo $row['password']; ?></p></td>
                    <td><div class="--action-container">
                        <div class="--elem" style="border-right: 1px solid #000;">
                            <input type="button" value="Изменить" class="edit-product<?php echo $row['id']; ?>">
                        </div>
                        <div class="--elem" style="border-left: 1px solid #000;">
                            <a href="php/handlers/main.php?action1=remove&id=<?php echo $row['id']; ?>&table=users"><input type="button" value="Удалить" class="delete-product"></a>
                        </div>
                    </div></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <script src="./dropdown.js"></script>
    <script>
        <?php $user = $conn->query("SELECT * FROM users "); foreach($user as $row){ ?>
        document.querySelectorAll('.edit-product<?php echo $row['id']; ?>').forEach(__btn=>{
            __btn.addEventListener('click',(ev)=>{
                __targetTR_elem= ev.target.parentElement.parentElement.parentElement.parentElement;
                document.body.insertAdjacentHTML('afterbegin',`
                <div class="fixed-cont">
                    <form class="f-user-edit" method="POST" action="php/handlers/main.php?id=<?php echo $row['id']; ?>">
                        <div class="tinyblock">
                            <div class="tb-elem">
                                <a href="javascript:void(0);" onclick="closeModal()"><img src="img/cross.svg" draggable="false" alt></a>
                            </div>
                        </div>
                        <label for="edit_user_name">Имя</label>
                        <input value="<?php echo $row['name']; ?>" type="text" name="edit_user_name">
                        <label for="edit_user_surname">Фамилия</label>
                        <input value="<?php echo $row['surename']; ?>"  type="text" name="edit_user_surname">
                        <label for="edit_user_login">Логин</label>
                        <input value="<?php echo $row['login']; ?>"  type="text" name="edit_user_login">
                        <label for="edit_user_password">Пароль</label>
                        <input value="<?php echo $row['password']; ?>"  type="password" name="edit_user_password">
                        <input type="submit" look="btn1" name="edit_user_save" value="Сохранить">
                    </form>
                </div>
                `);
            });
        });
        <?php } ?>
        function closeModal() {
            document.querySelector(".fixed-cont").remove();
        }
    </script>
</body>
</html>