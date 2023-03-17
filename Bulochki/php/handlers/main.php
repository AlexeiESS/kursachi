<?php 
require_once '../main_functions.php';


if(isset($_SESSION['admin']) && isset($_GET['action']) && $_GET['action']='remove'){
	if(delete($_GET['table'],$_GET['id'])==1){
		redirect('../../admin', 'ok=true');
	}else {
		redirect('../../admin', 'ok=false');
	}
	
}

if(isset($_POST['sign_in'])){
	if(qeury_search($_POST['user_login'], $_POST['password'])==1)
	{
		$_SESSION['admin'] = true;
		redirect('../../admin', 'ok=true');
	}else {redirect('../../auth', 'ok=false');}
}

if(isset($_POST['buy_product'])){
	if(isset($_GET['action']) && $_GET['action']=='buy' && isset($_GET['id'])){
		$test = $conn->fetchrow($conn->query("SELECT * FROM products WHERE id =".$_GET['id']." "));
		$product = $test['name'];
	if(add_contact($_POST['user_name'], $_POST['user_email'],$_POST['user_tel'], $product)==1){
		redirect('../../index', 'ok=true');
	}else {redirect('../../index', 'ok=false');}
	}
}
if(isset($_POST['ed-user-done'])){
	if(edit_contact($_POST['ed-user-name'], $_POST['ed-user-email'], $_POST['ed-user-tel'], $_POST['ed-user-product'], $_POST['user_contacted-2'], $_GET['id'])==1){
		redirect('../../admin', 'ok=true');
	}else {
		redirect('../../admin', 'ok=false');
	}
}
if(isset($_POST['ed-addprod-done'])){
	if(empty($_FILES['image_book']['name']))
	if(add_product($_POST['ed-addprod-name'],$_POST['ed-addprod-price'],$_POST['ed-addprod-desc'],$_POST['ed-addprod-weight'],$_POST['category'], $_FILES['ed-addprod-pic']['name'])==1){
		if(!move_uploaded_file($_FILES['ed-addprod-pic']['tmp_name'], "../../upload/".$_FILES['ed-addprod-pic']['name']))
	{
		redirect('../../admin', 'ok=false');
	}else {redirect('../../admin', 'ok=true');}


	}else {redirect('../../admin', 'ok=false');}
}
if(isset($_POST['ed-prod-done'])){
	if(edit_product($_POST['ed-prod-name'],$_POST['ed-prod-price'],$_POST['ed-prod-desc'],$_POST['ed-prod-weight'],$_POST['category'], $_FILES['ed-prod-pic']['name'], $_GET['id'])==1)
	{
		if(empty($_FILES['ed-prod-pic']['name'])){redirect('../../admin', 'ok=true');}else {
		if(!move_uploaded_file($_FILES['ed-prod-pic']['tmp_name'], "../../upload/".$_FILES['ed-prod-pic']['name']))
		{
			redirect('../../admin', 'ok=false');
		}else {redirect('../../admin', 'ok=true');}}
	}else {redirect('../../admin', 'ok=false');}
}
?>