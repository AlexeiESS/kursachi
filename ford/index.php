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

			<div class="slider"></div>

			<div class="pop_goods">
				<a href="#">
					<div class="pop_product">
					<div class="pop_image_1"></div>
					<div class="pop_text">Mustang Parts</div>
					</div>
				</a>
				<a href="#">
					<div class="pop_product">
					<div class="pop_image_2"></div>
					<div class="pop_text">Crate Engines</div>
					</div>
				</a>
				<a href="#">
					<div class="pop_product">
					<div class="pop_image_3"></div>
					<div class="pop_text">Packs</div>
					</div>
				</a>
				<a href="#">
					<div class="pop_product">
					<div class="pop_image_4"></div>
					<div class="pop_text">Superchargers</div>
					</div>
				</a>
				<a href="#">
					<div class="pop_product">
					<div class="pop_image_5"></div>
					<div class="pop_text">Emissions Legal</div>
					</div>
				</a>
				<a href="#">
					<div class="pop_product">
					<div class="pop_image_6"></div>
					<div class="pop_text">Competition</div>
					</div>
				</a>	
			</div>
				

			<div class="goods">
				<div class="feat_products">Featured Products</div>
				<div class="products">
					<?php $product = $conn->query("SELECT * FROM products"); foreach($product as $row){ ?>
					<div class="product">
						<!---<div  class="prod_image"></div>--->
						<div class="--img-container"><img width="150px" height="200px" src="upload/<?php echo $row['img']; ?>" draggable="false" alt="product-photo"></div>
						<h3><?php echo $row['name']; ?></h3>
						<span><?php echo $row['price']; ?></span>
						<?php if(isset($_SESSION['user']) || isset($_SESSION['admin'])){ ?>
						<input type="submit" name="buynow<?php echo $row['id']; ?>" value="BUY NOW">
					<?php } ?>
					</div>
					<?php } ?>
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
			<div class="adminpanel-link"><a href="admin.php">Admin Panel</a></div>
			<div class="copyright">Copyright © 2023 Ford club</div>
		</footer>
	</div>
    <script>
    	<?php $product = $conn->query("SELECT * FROM products"); foreach($product as $row){ ?>
        document.getElementsByName('buynow<?php echo $row['id']; ?>').forEach(__btn=>{
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
                                <img src="upload/<?php echo $row['img']; ?>" draggable="false" alt>
                            </div>
                            <div class="product-card-elem">
                                <p style="font-weight: 700;font-size: 18px; color: #555555;"><?php echo $row['name']; ?></p>
                                <p style="font-weight: 600; color: gray;"><?php echo $row['price']; ?></p>
                                <form method="post" action="php/handlers/main.php?id=<?php echo $row['id']; ?>">
                                <button name="buy_product" type="submit" class="btn-buy" look="btn1">BUY NOW</button></form>
                                <p style="font-weight: 400; color: gray; font-size: 14px;"><?php echo $row['description']; ?></p>
                            </div>
                        </div>
                    </div>
                `);
            });
        }); <?php } ?>
		document.querySelector(".sign_in").addEventListener('click',()=>{
			__osignin();
		});

		function __osignin() {
			closeModal();
			document.body.insertAdjacentHTML('afterbegin',`
			<div class="fixed-cont">
                    <form method="POST" action="php/handlers/main.php" class="checkout-form">
                        <div class="tinyblock">
                            <div class="tb-elem">
                                <a href="javascript:void(0);" onclick="closeModal()"><img src="images/custom/cross.svg" draggable="false" alt></a>
                            </div>
                        </div>
                        <div class="f-container">
                            <label for="user_login">Login:</label>
                            <input type="text" name="user_login" required>
                            <label for="user_password">Password:</label>
                            <input type="password" name="password" required>
                            <input type="submit" class="btn-auth" name="sign_in" value="Sign in">
							<a href="javascript:void(0);" style="color: #555555;" onclick="__osignup()">Don't have an account? Sign up instead</a>
							</div>
                    </form>
                </div>
			`);
		}
		function __osignup() {
			closeModal();
			document.body.insertAdjacentHTML('afterbegin',`
			<div class="fixed-cont">
                    <form method="POST" action="php/handlers/main.php" class="checkout-form">
                        <div class="tinyblock">
                            <div class="tb-elem">
                                <a href="javascript:void(0);" onclick="closeModal()"><img src="images/custom/cross.svg" draggable="false" alt></a>
                            </div>
                        </div>
                        <div class="f-container">
							<label for="user_name">Name:</label>
                            <input type="text" name="user_name" required>
                            <label for="user_login">Login:</label>
                            <input type="text" name="user_login" required>
							<label for="user_tel">Phone number:</label>
                            <input type="tel" name="user_tel" required>
                            <label for="new_password">Password:</label>
                            <input type="password" name="new_password" required>
							<label for="repeat_new_password">Password again:</label>
                            <input type="password" name="repeat_new_password" required>
                            <input type="submit" class="btn-auth" name="sign_up" value="Sign up">
							<a href="javascript:void(0);" style="color: #555555;" onclick="__osignin()">Already have an account? Sign in instead</a>
							</div>
                    </form>
                </div>
			`);
		}
		document.querySelector(".sign_up").addEventListener('click',()=>{
			__osignup();
		});
        function closeModal() {
			if (document.querySelector(".fixed-cont")!= null) document.querySelector(".fixed-cont").remove();
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