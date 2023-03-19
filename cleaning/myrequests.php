<?php 
    //Обязательные строки
session_start(); if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){header("Location: auth.php");} require_once 'php/init.php'; 
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
                <button look="btn1" class="btn-myreqs" style="width: 203px;"><a href="#">Оставить заявку</a></button>
                <button look="btn1" class="btn-logout"><a href="#">Выход</a></button>
            </div>
        </nav>
        <div class="my-requests">
            <p id="some-note">Мои заявки</p>
            <table>
                <tr>
                    <th><p>Название оборудования</p></th>
                    <th><p>Количество</p></th>
                    <th><p>Статус</p></th>

                    <th><p>Редактирование заявки</p></th>
                </tr>
                 <?php
                    if(!isset($_SESSION['admin'])){$name=$_SESSION['user'];}else {$name=$_SESSION['admin'];}
                  $product = $conn->query("SELECT * FROM contacts WHERE who = '".$name."'"); foreach($product as $row){ ?> 
                <tr>
                    <td><p><?php echo $row['product']; ?></p></td>
                    <td><p><?php echo $row['size']; ?></p></td>
                    <td><p><?php if($row['ready']==1){echo 'Выдано';}else {echo 'Не выдано';} ?></p></td>
                    <?php if($row['ready']!=1){ ?>
                    <td><div class="--action-container">
                        <div class="--elem" style="border-right: 1px solid #000;">
                            <input type="button" value="Изменить" class="edit-product<?php echo $row['id']; ?>"> 
                        </div>
                        <div class="--elem" style="border-left: 1px solid #000;">
                            <a href="php/handlers/main.php?action=remove&table=contacts&id=<?php echo $row['id']; ?>"><input type="button" value="Удалить" class="delete-product"></a>
                        </div>
                    </div></td><?php } ?>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <script src="./dropdown.js"></script>
    <script>
        <?php
                    if(!isset($_SESSION['admin'])){$name=$_SESSION['user'];}else {$name=$_SESSION['admin'];}
                  $product = $conn->query("SELECT * FROM contacts WHERE who = '".$name."'"); foreach($product as $row){ ?> 
        document.querySelectorAll('.edit-product<?php echo $row['id']; ?>').forEach(__btn=>{
            __btn.addEventListener('click',(ev)=>{
                __targetTR_elem= ev.target.parentElement.parentElement.parentElement.parentElement;
                document.body.insertAdjacentHTML('afterbegin',`
                <div class="fixed-cont">
                    <form method="POST" class="f-myrequest-edit" action="php/handlers/main.php?id=<?php echo $row['id']; ?>">
                        <div class="tinyblock">
                            <div class="tb-elem">
                                <a href="javascript:void(0);" onclick="closeModal()"><img src="img/cross.svg" draggable="false" alt></a>
                            </div>
                        </div>
                        <label for="myreq_item_name">Название оборудования</label>
                        <select name="product">
                        <?php $product = $conn->query("SELECT * FROM products"); foreach($product as $tt){ ?>
                            <option <?php if($row['product']==$tt['name']){echo 'selected';} ?> value="<?php echo $tt['name']; ?>"><?php echo $tt['name']; ?></option>
                        <?php } ?>
                        </select>
                        <label for="myreq_item_name">Количетво оборудования</label>
                        <input value="<?php echo $row['size']; ?>" type="number" name="myreq_item_amount" min="1">
                        <input type="submit" look="btn1" name="myreq_edit_save" value="Сохранить">
                    </form>
                </div>
                `);
            });
        });<?php } ?>
        function closeModal() {
            document.querySelector(".fixed-cont").remove();
        }
    </script>
</body>
</html>