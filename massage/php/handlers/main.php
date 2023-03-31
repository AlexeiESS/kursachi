<?php 
require_once '../main_functions.php';



if(isset($_SESSION['admin']) && isset($_GET['action']) && $_GET['action']='remove'){
	if(delete($_GET['table'],$_GET['id'])==1){
		redirect('../../admin', 'ok=true');
	}else {
		redirect('../../admin', 'ok=false');
	}
	
}

//signinUsers
if(isset($_POST['sign_in'])){
	if(qeury_search('users', $_POST['user_login'],$_POST['password'])==1){

		$conn->arr = $conn->fetchrow($conn->query("SELECT * FROM users WHERE login = '".mb_strtolower($_POST['user_login'])."' AND password = '".md5(mb_strtolower($_POST['password']))."'"));

		$_SESSION['user'] = $conn->arr['login'];
 		redirect('../../index', 'ok=false');
	}else {redirect('../../index', 'ok=false');}
}

//signinAdmin
if(isset($_POST['sign_in_admin'])){
	if(qeury_search('admin', $_POST['user_login'],$_POST['password'])==1){
		$conn->arr = $conn->fetchrow($conn->query("SELECT * FROM admin WHERE login = '".mb_strtolower($_POST['user_login'])."' AND password = '".md5(mb_strtolower($_POST['password']))."'"));
		$_SESSION['admin'] = $conn->arr['login'];
 		redirect('../../admin', 'ok=false');
	}else {redirect('../../adminauth', 'ok=false');}
}
//reg
if(isset($_POST['sign_up'])){
	if(qeury_search('users',$_POST['user_login'],$_POST['password'])==0){
		if(register($_POST['user_login'],$_POST['password'],$_POST['user_email'],$_POST['user_name'])==1){
			redirect('../../signin');
		}
	}else {redirect('../../signup');}
}

if(isset($_POST['review_send'])){
	if(isset($_SESSION['admin'])){$name=$_SESSION['admin'];}else {$name=$_SESSION['user'];}
	if(add_comm($_POST['review_msg'],$name,$_GET['id'])==1){
		redirect('../../card', 'id='.$_GET['id']);
	}else {
		redirect('../../card', 'id='.$_GET['id']);
	}
}

if(isset($_POST['add_prod'])){ 
	if(add_prod($_POST['master_name'],$_POST['master_desc'],$_POST['master_tel'],$_POST['price'],$_POST['master_location'],$_FILES['master_photo']['name'])==1){

		if(!move_uploaded_file($_FILES['master_photo']['tmp_name'], "../../upload/".$_FILES['master_photo']['name']))
	{
		redirect('../../admin', 'ok=false');
	}else {redirect('../../admin', 'ok=true');}
	}
}

if(isset($_POST['edit_master'])){
	if(edit_prod($_POST['master_name'],$_POST['master_desc'],$_POST['master_tel'],$_POST['price'],$_POST['master_location'],$_FILES['master_photo']['name'], $_GET['id'])==1){
		if(empty($_FILES['master_photo']['name'])){redirect('../../admin', 'ok=true');}else {
			if(!move_uploaded_file($_FILES['master_photo']['tmp_name'], "../../upload/".$_FILES['master_photo']['name']))
	{
		redirect('../../admin', 'ok=false');
	}else {redirect('../../admin', 'ok=true');}

		}
	}
}


?>