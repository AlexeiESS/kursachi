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
	if(qeury_search($_POST['user_login'],$_POST['password'])==1){
		$_SESSION['admin'] = true;
		redirect('../../admin', 'ok=true');
	}else {redirect('../../auth', 'ok=false');}
}

if(isset($_POST['kittie_save'])){
	if(add_product($_POST['kitty_name'],$_POST['kitty_desc'], $_POST['kitty_price'],$_POST['kitty_weight'],$_POST['kitty_height'] ,$_FILES['kitty_photo']['name'])==1){
		if(!move_uploaded_file($_FILES['kitty_photo']['tmp_name'], "../../upload/".$_FILES['kitty_photo']['name'])==1)
		{
			redirect('../../admin', 'ok=false');
		}else {redirect('../../admin', 'ok=true');}
	}else {redirect('../../admin', 'ok=false');}
}
if(isset($_POST['kittie_save_edit'])){
	if(edit_product($_POST['kitty_name'],$_POST['kitty_desc'], $_POST['kitty_price'],$_POST['kitty_weight'],$_POST['kitty_height'] ,$_FILES['kitty_photo']['name'], $_GET['id'])==1){

		if(empty($_FILES['kitty_photo']['name'])){redirect('../../admin', 'ok=true');}else {
		if(!move_uploaded_file($_FILES['kitty_photo']['tmp_name'], "../../upload/".$_FILES['kitty_photo']['name']))
		{
			redirect('../../admin', 'ok=false');
		}else {redirect('../../admin', 'ok=true');}}
	}
}





if(isset($_POST['order_send'])){
	$conn->arr = $conn->fetchrow($conn->query("SELECT * FROM products WHERE id = '".$_GET['id']."'"));
	$product = $conn->arr['name'];
	if(add_contact($_POST['order_name'],$product,$_POST['order_city'], $_POST['order_tel'],$_POST['summary_product'])==1) 
	{
		redirect('../../index', 'ok=true');
	}else {redirect('../../index', 'ok=false');}
}

if(isset($_POST['order_save'])){
	if(edit_cont($_POST['order_name'],$_POST['product'],$_POST['order_city'], $_POST['order_tel'],$_POST['summary_product'], $_POST['order_waiting'],$_GET['id'])==1){
		redirect('../../admin', 'ok=true');
	}else {redirect('../../admin', 'ok=false');}
}
if(isset($_POST['banner_edit'])){
	if(edit_banner($_POST['banner_title'],$_POST['banner_desc'], $_FILES['banner_photo']['name'])==1){
		if(empty($_FILES['banner_photo']['name'])){redirect('../../admin', 'ok=true');}else {
		if(!move_uploaded_file($_FILES['banner_photo']['tmp_name'], "../../upload/".$_FILES['banner_photo']['name']))
		{
			redirect('../../admin', 'ok=false');
		}else {redirect('../../admin', 'ok=true');}}
	}
}







?>