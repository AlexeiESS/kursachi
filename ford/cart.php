<?php
session_start();
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

			<div class="cart-container">
				<div class="feat_products">Cart</div>
				<div class="cart-prod-list">
                    <table style="width:100%">
                        <tr class="cart-list-categories">
                          <th>Name</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Photo</th>
                          <th>Remove from cart</th>
                        </tr>
                        <?php 
                        if(isset($_SESSION['admin'])){$name=$_SESSION['admin'];}else{$name=$_SESSION['user'];}
                        $conn->arr = $conn->fetchrow($conn->query("SELECT * FROM contacts WHERE user = '".$name."'")); 
                        $product = $conn->query("SELECT * FROM products WHERE name = '".$conn->arr['product']."'"); foreach($product as $row){ ?>
                        <tr class="clc-prod-item" id="0">
                            <td class="--item-name"><?php echo $row['name']; ?></td>
                            <td class="--item-desc"><?php echo $row['description']; ?></td>
                            <td class="--item-price"><?php echo $row['price']; ?></td>
                            <td class="--item-photo"><div class="--img-container"><img src="upload/<?php echo $row['img']; ?>" draggable="false" alt="product-photo"></div></td>
                            <?php
                            $cont = $conn->query("SELECT * FROM contacts WHERE user = '".$name."'"); foreach($cont as $contt){ if($contt['buy']!=1){ ?>
                            <td class="--item-rm"><a href="php/handlers/main.php?action=remove_cart&table=products&id=<?php echo $row['id']; ?>"><input type="button" value="Remove" name="cart_prod_remove"></a></td>
                        <?php } }?>
                        </tr>
                        <?php } ?>
                    </table>
				</div>
                <div style="padding: 40px; display: flex; justify-content: center; align-items: center;">
                    <input type="button" value="Checkout" class="btn-checkout" name="btn_checkout">
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
                    <form method="POST" action="php/handlers/main.php?user=<?php echo $name; ?>" class="checkout-form">
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
                            <input type="submit" class="btn-call" name="btn_co_call" value="Wait for the manager's call">
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
    	if($_GET['ok']=='ok'){
    		echo '<script>alert("Успешно, ожидайте, с вами скоро свяжется наш оператор!");</script>';
    	}
    }

    ?>
</body>
</html>