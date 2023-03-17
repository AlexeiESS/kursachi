<?php
require_once 'php/init.php';
require_once 'php/main_functions.php';


if(!isset($_SESSION['admin'])){
    redirect('auth');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./admin.css">
</head>
<body>
    <div style="padding: 20px;">
        <a href="./exit.php" style="font-size: 24px; color: brown;">Выход</a>
    </div>
    <fieldset>
        <legend><h1>Управление товарами</h1></legend>
        <button class="btn-add" look="btn1" style="margin-bottom: 30px;">Добавить товар</button>
        <div class="products">
            <?php $product = $conn->query("SELECT * FROM products "); foreach($product as $row){ ?>
            <div class="product-item">
                <img src="upload/<?php echo $row['img']; ?>" draggable="false" alt>
                <div class="--content">
                    <p id="--name"><?php echo $row['name']; ?></p>
                    <p id="--weight"><?php echo $row['mass']; ?>г.</p>
                    <p id="--price"><?php echo $row['price']; ?>руб.</p>
                    <button class="btn-edit<?php echo $row['id']; ?>" look="btn1">Изменить</button>
                    <button class="btn-remove" look="btn2"><a href="php/handlers/main.php?action=remove&table=products&id=<?php echo $row['id']; ?>">Удалить</a></button>
                </div>
            </div>
        <?php } ?>

        </div>
    </fieldset>
    <fieldset>
        <legend><h1>Управление контактами</h1></legend>
        <div class="contact-list">
            <?php $cont = $conn->query("SELECT * FROM contacts "); foreach($cont as $okt){ ?>
            <div class="contact-item">
                <button class="btn-edit-contact<?php echo $okt['id']; ?>" look="btn1">Изменить</button>
                <button class="btn-remove" look="btn2"><a href="php/handlers/main.php?action=remove&table=contacts&id=<?php echo $okt['id']; ?>">Удалить</a></button>
                <p id="--name"><?php echo $okt['name']; ?></p> 
                <p id="--email"><?php echo $okt['email']; ?></p>
                <p id="--phone"><?php echo $okt['tel']; ?></p>
                <p id="">Продукт клиента: <?php echo $okt['product']; ?></p>
                <p id=""><?php if($okt['svaz']==1){echo 'С клиентом связались!';}else { echo 'Клиент ждёт обсуживания.'; } ?></p>
            </div>
            <?php } ?>
        </div>
    </fieldset>
    <script>
        document.querySelectorAll(".btn-add").forEach(__btn=>{
            __btn.addEventListener('click',()=>{
                document.body.insertAdjacentHTML('afterbegin',`
                <div class="fixed-cont">
                    <form class="f-prod-add" enctype="multipart/form-data" action="php/handlers/main.php">
                        <a href="javascript:void(0);" onclick="closeModal()">[X]</a>
                        <input type="text" placeholder="Имя" name="ed-addprod-name">
                        <input type="text" placeholder="Вес" name="ed-addprod-weight">
                        <input type="text" placeholder="Цена" name="ed-addprod-price">
                        <input type="text" placeholder="Описание" name="ed-addprod-desc">
              <select name="category">

                  <option value="klub">Клубника в шоколаде</option>
                  <option value="kruas">Круассаны</option>
                  <option value="deserts">Десерты</option>
                  <option value="lunch">Ланч</option>
              </select>
                        <fieldset>
                            <legend>Картинка</legend>
                            <input type="file" name="ed-addprod-pic">
                        </fieldset>
                        <input type="submit" value="Сохранить" name="ed-addprod-done">
                    </form>
                </div>
                `);
            });
        });
        <?php $product = $conn->query("SELECT * FROM products "); foreach($product as $row){ ?>
        document.querySelectorAll(".btn-edit<?php echo $row['id']; ?>").forEach(__btn=>{
            __btn.addEventListener('click',()=>{
                document.body.insertAdjacentHTML('afterbegin',`
                <div class="fixed-cont">
                    <form enctype="multipart/form-data" class="f-prod-edit" method="POST" action="php/handlers/main.php?id=<?php echo $row['id']; ?>">
                        <a href="javascript:void(0);" onclick="closeModal()">[X]</a>
                        <input type="text" value="<?php echo $row['name']; ?>" placeholder="Имя" name="ed-prod-name" required>
                        <input type="text" value="<?php echo $row['mass']; ?> "placeholder="Вес" name="ed-prod-weight" required>
                        <input type="text" value="<?php echo $row['price']; ?>" placeholder="Цена" name="ed-prod-price" required>
                        <input type="text" value="<?php echo $row['description']; ?> "placeholder="Описание" name="ed-prod-desc" required>
              <select name="category">

                  <option <?php if($row['category']=='klub'){echo 'selected';} ?> value="klub">Клубника в шоколаде</option>
                  <option <?php if($row['category']=='kruas'){echo 'selected';} ?> value="kruas">Круассаны</option>
                  <option <?php if($row['category']=='deserts'){echo 'selected';} ?> value="deserts">Десерты</option>
                  <option <?php if($row['category']=='lunch'){echo 'selected';} ?> value="lunch">Ланч</option>
              </select>
                        <fieldset>
                            <legend>Картинка</legend>
                            <img src="upload/<?php echo $row['img']; ?>" draggable="false" id="pic-current" height="150px" alt>
                            <label for="ed-prod-pic">Новая картинка</label>
                            <input type="file" name="ed-prod-pic">
                        </fieldset>
                        <input type="submit" value="Сохранить" name="ed-prod-done">
                    </form>
                </div>
                `);
            });
        });
    <?php } ?>
    <?php $cont = $conn->query("SELECT * FROM contacts "); foreach($cont as $okt){ ?>
        document.querySelectorAll(".btn-edit-contact<?php echo $okt['id']; ?>").forEach(__btn=>{
            __btn.addEventListener('click',()=>{
                document.body.insertAdjacentHTML('afterbegin',`
                <div class="fixed-cont">
                    <form class="f-user-edit" method="POST" action="php/handlers/main.php?id=<?php echo $okt['id']; ?>">
                        <a href="javascript:void(0);" onclick="closeModal()">[X]</a>
                        <input value="<?php echo $okt['name']; ?>" type="text" placeholder="Имя" name="ed-user-name" required>
                        <input value="<?php echo $okt['email']; ?> "type="email" placeholder="Почта" name="ed-user-email" required>
                        <input value="<?php echo $okt['tel']; ?>" type="tel" placeholder="Телефон" name="ed-user-tel" required>
                        <input value="<?php echo $okt['product']; ?>" type="text" placeholder="Продукт" name="ed-user-product" required>
                        <p>Связались ли с пользователем?</p>
                             <div class="radio-wrap">
                            <input <?php if($okt['svaz']==1){echo 'checked';} ?> value="1" type="radio" name="user_contacted-2">
                              <label  for="user_contacted-2">Да</label>
                             </div>
                             <div class="radio-wrap">
                                <input value="0" <?php if($okt['svaz']==0){echo 'checked';} ?> type="radio" name="user_contacted-2">
                             <label for="user_contacted-2">Нет</label>
                          </div>

                        <input type="submit" value="Сохранить" name="ed-user-done">
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
    <?php  if(isset($_GET['ok'])){
    if($_GET['ok']=='true'){
echo '<script>alert("Успешно!");</script>';}else {
    echo '<script>alert("Неизвестная ошибка.");</script>';
}

}
    ?>
</body>
</html>