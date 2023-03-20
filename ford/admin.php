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
	<title>Ford_Perf</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>
	<div class="wrapper">
		<!-- Шапка -->
		<header>
			
			<a href="#"><img src="images/header/Nav-Logo-FRP.png" alt="Ford_Perf"></a>
			<div class="searchbar">
                <input type="text" name="search">
                <img src="./images/custom/magnifier.png" draggable="false" alt>
            </div>
			<div class="some-stuff">
			<?php if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){ ?>
			<button class="sign_in">Вход</button>
			<button class="sign_up">Регистрация</button>
			<?php }else { ?>
			<a href="exit.php">Выход</a>
            <a href="cart.php"><img src="./images/custom/cart.png" draggable="false" alt></a>
        	<?php } ?>
			</div>

		</header>

		<!-- Меню -->
		<nav>
			<a href="#">PARTS</a>      |    
			<a href="#">VEHICLES</a>     |     
			<a href="#">COMPETITION</a>     |     
			<a href="#">DEALERS</a>     |     
			<a href="#">CONTACT US</a>     |     
			<a href="#">GALLERY</a>     |      
			<a href="#">LINKS</a>

		</nav>
		
		<main>	

			<div class="admin-container">
				<div class="feat_products" style="font-size: 32px;">Admin Panel</div>
                <div class="feat_products">Add products</div>
                <?php if(isset($_GET['id'])){ 
                	$conn->arr = $conn->fetchrow($conn->query("SELECT * FROM products")); 
                ?>
                <form enctype="multipart/form-data" class="f-admin-prod-add" method="POST" action="php/handlers/main.php?id=<?php echo $conn->arr['id']; ?>">
                    <label for="name_product">Enter a name</label>
                    <input value="<?php echo $conn->arr['name']; ?>" type="text" name="name_product" field>
                    <label for="description_product">Enter a description</label>
                    <input value="<?php echo $conn->arr['description']; ?>" type="textarea" name="description_product" field>
                    <label for="price_product">Enter a price</label>
                    <input value="<?php echo $conn->arr['price']; ?>" type="number" name="price_product" min="0" field>
                    <fieldset style="padding: 20px;">
                        <legend>Choose a photo</legend>
                        <input type="file" name="img_product">
                    </fieldset>
                    <input type="submit" value="Edit product" name="edd_product">
                </form>
                <?php }else { ?>
                <form enctype="multipart/form-data"  class="f-admin-prod-add" method="POST" action="php/handlers/main.php">
                    <label for="name_product">Enter a name</label>
                    <input type="text" name="name_product" field>
                    <label for="description_product">Enter a description</label>
                    <input type="textarea" name="description_product" field>
                    <label for="price_product">Enter a price</label>
                    <input type="number" name="price_product" min="0" field>
                    <fieldset style="padding: 20px;">
                        <legend>Choose a photo</legend>
                        <input type="file" name="img_product">
                    </fieldset>
                    <input type="submit" value="Add product" name="add_product">
                </form>
                <?php } ?>
                <div class="feat_products">All products</div>
				<div class="cart-prod-list">
                    <table style="width:100%">
                        <tr class="cart-list-categories">
                          <th>Name</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Photo</th>
                          <th>Actions with product</th>
                        </tr>
                        <?php $product = $conn->query("SELECT * FROM products"); foreach($product as $row){ ?>
                        <tr class="clc-prod-item" id="0">
                            <td class="--item-name"><?php echo $row['name']; ?></td>
                            <td class="--item-desc"><?php echo $row['description']; ?></td>
                            <td class="--item-price"><?php echo $row['price']; ?></td>
                            <td class="--item-photo"><div class="--img-container"><img  src="upload/<?php echo $row['img']; ?>" draggable="false" alt="product-photo"></div></td>
                            <td class="--item-rm"><div class="--wrap"><a href="?id=<?php echo $row['id']; ?>"><input type="button" value="Edit" name="cart_prod_edit"></a><a href="php/handlers/main.php?action1=remove&table=products&id=<?php echo $row['id']; ?>"><input type="button" value="Remove" name="cart_prod_remove"></a></div></td>
                        </tr>
                        <?php } ?>
                    </table>
				</div>
			</div>

		</main>
		<footer>
			<div class="quick_links">
				<div class="link">
				<h3>FEATURED SALES</h3>
				<a href="#"> Engines</a>
				<a href="#"> Transmission</a>
				<a href="#"> Suspension</a>
				<a href="#"> Wheels</a>
				<a href="#"> Electrical equipment</a>
				<a href="#"> Exterior</a>
				</div>
				<div class="link">
				<h3>ENGINE</h3>
				<a href="#"> Pistons kit</a>
				<a href="#"> Crankshafts</a>
				<a href="#"> Short bloks</a>
				<a href="#"> Cooling</a>
				<a href="#"> Fuel delivery</a>
				<a href="#"> Superchargers</a>
				</div>
				<div class="link">
				<h3>CHASSIS</h3>
				<a href="#"> Springs</a>
				<a href="#"> Shocks</a>
				<a href="#"> Brake</a>
				<a href="#"> Control arms</a>
				<a href="#"> Axle components</a>
				<a href="#"> Differentials</a>
				</div>
				<div class="link">
				<h3>Link to friends</h3>
				<a href="https://2126.ru"> IZH club</a>
				<a href="https://www.youtube.com/@MoskvichnaMoskvichah"> Azlk club</a>
				<a href="https://www.youtube.com/channel/UCdHUfWRiuGs1qhWgqUBqtvg"> Zaz club</a>
				<a href="https://www.drive2.ru/r/lada/2108/288230376151747562/"> Lada club</a>
				<a href="https://www.mopedist.ru/"> Mopedist</a>
				<a href="http://www.dyr4ik.ru/"> Dyr4ik</a>
				</div>
			</div>
			<div class="copyright">Copyright © 2023 Ford club</div>
		</footer>
	</div>
    <script>
        document.getElementsByName('buynow').forEach(__btn=>{
            __btn.addEventListener('click',()=>{
                document.body.insertAdjacentHTML('afterbegin',`
                <div class="fixed-cont">
                        <div class="product-card">
                            <div class="tinyblock">
                                <div class="tb-elem">
                                    <a href="javascript:void(0);" onclick="closeModal()"><img src="images/custom/cross.svg" draggable="false" alt></a>
                                </div>
                            </div>
                            <div class="product-card-elem" style="width: 700px; display: flex; justify-content: center;">
                                <img src="images/goods/302-384_1.jpg" draggable="false" alt>
                            </div>
                            <div class="product-card-elem">
                                <p style="font-weight: 700;font-size: 18px; color: #555555;">Product</p>
                                <p style="font-weight: 600; color: gray;">$0</p>
                                <button class="btn-buy" look="btn1">BUY NOW</button>
                                <p style="font-weight: 400; color: gray; font-size: 14px;">Description</p>
                            </div>
                        </div>
                    </div>
                `);
            });
        });
        document.getElementsByName('btn_checkout').forEach(__btn=>{
            __btn.addEventListener('click',()=>{
                document.body.insertAdjacentHTML('afterbegin',`
                <div class="fixed-cont">
                    <form class="checkout-form">
                        <div class="tinyblock">
                            <div class="tb-elem">
                                <a href="javascript:void(0);" onclick="closeModal()"><img src="images/custom/cross.svg" draggable="false" alt></a>
                            </div>
                        </div>
                        <div class="f-container">
                            <label for="user_name">Name:</label>
                            <input type="text" name="user_name">
                            <label for="user_name">Phone number:</label>
                            <input type="tel" name="user_phone">
                            <input type="button" class="btn-call" name="btn_co_call" value="Wait for the manager's call">
                        </div>
                    </form>
                </div>
                `);
            });
        });
        
        function closeModal() {
            document.querySelector(".fixed-cont").remove();
        }
    </script>
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