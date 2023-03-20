<?php 
require_once '../main_functions.php';


if(isset($_SESSION['admin']) && isset($_GET['action1']) && $_GET['action1']='remove'){
	if(delete($_GET['table'],$_GET['id'])==1){
		redirect('../../admin', 'ok=true');
	}else {
		redirect('../../admin', 'ok=false');
	}
	
}
if(isset($_SESSION['user']) && isset($_GET['action']) && $_GET['action']='remove_cart'){
	if(delete($_GET['table'],$_GET['id'])==1){
		redirect('../../cart', 'ok=true');
	}else {
		redirect('../../cart', 'ok=false');
	}
	
}



if(isset($_POST['sign_in'])){
	if(qeury_search($_POST['user_login'],$_POST['password'])==1){
		$conn->arr = $conn->fetchrow($conn->query("SELECT * FROM users WHERE login = '".mb_strtolower($_POST['user_login'])."' AND password = '".md5(mb_strtolower($_POST['password']))."'"));
		if($conn->arr['admin']==1){
			$_SESSION['admin'] = $conn->arr['name'].' | '.$conn->arr['surename'];
			redirect('../../admin', $_SESSION['admin']);
		}else {
			$_SESSION['user'] = $conn->arr['name'];
			redirect('../../index', 'ok=true&'.$_SESSION['user']);
		}
	}else {redirect('../../index', 'ok=false');}
}
if(isset($_POST['sign_up'])){
	if(qeury_search($_POST['user_login'],$_POST['password'])!=1){
		if($_POST['new_password']==$_POST['repeat_new_password']){
		if(register($_POST['user_login'],$_POST['user_name'], $_POST['user_tel'],$_POST['new_password'])==1){
			redirect('../../index', 'ok=true');
		}else {
			redirect('../../index', 'ok=false');
		}
		}else {
			redirect('../../index', 'ok=false');
		}
	}
}



if(isset($_POST['buy_product'])){
		$test = $conn->fetchrow($conn->query("SELECT * FROM products WHERE id =".$_GET['id']." "));
		$product = $test['name'];
		if(isset($_SESSION['admin'])){$name=$_SESSION['admin'];}else{$name=$_SESSION['user'];}
	if(add_contact($name, $product)==1){
		redirect('../../index', 'ok=true');
	}else {redirect('../../index', 'ok=false');}
	
}


if(isset($_POST['add_product'])){
	if(add_product($_POST['name_product'], $_POST['price_product'],$_POST['description_product'], $_FILES['img_product']['name'])==1){
		if(!move_uploaded_file($_FILES['img_product']['tmp_name'], "../../upload/".$_FILES['img_product']['name']))
		{
			redirect('../../admin', 'ok=false');
		}else {redirect('../../admin', 'ok=true');}
	}else {redirect('../../admin', 'ok=false');}
}

if(isset($_POST['edd_product'])){
	/*
	$_FILES['img_product']['name']
	$_POST['name_product']
	$_POST['description_product']
	$_POST['price_product']
	*/
	if(edit_product($_POST['name_product'], $_POST['price_product'],$_POST['description_product'], $_FILES['img_product']['name'], $_GET['id'])==1){
		if(empty($_FILES['img_product']['name'])){redirect('../../admin', 'ok=true');}else {
		if(!move_uploaded_file($_FILES['img_product']['tmp_name'], "../../upload/".$_FILES['img_product']['name']))
		{
			redirect('../../admin', 'ok=false');
		}else {redirect('../../admin', 'ok=true');}}
	}
}


if(isset($_POST['btn_co_call'])){
	if(isset($_SESSION['admin'])){$name=$_SESSION['admin'];}else{$name=$_SESSION['user'];}
	if(add_buy_contact($name, $_POST['user_phone'])==1){
		redirect('../../cart', 'ok=ok');
	}
}


?>