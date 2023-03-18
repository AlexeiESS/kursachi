<?php 
require_once '../main_functions.php';



if(isset($_SESSION['admin']) && isset($_GET['action1']) && $_GET['action1']='remove'){
	if(delete($_GET['table'],$_GET['id'])==1){
		redirect('../../admin', 'ok=true');
	}else {
		redirect('../../admin', 'ok=false');
	}
	
}
if(isset($_SESSION['admin']) && isset($_GET['action']) && $_GET['action']='change'){
	if(change_pet($_GET['table'],$_GET['id'])==1){
		redirect('../../admin', 'ok=true');
	}else {
		redirect('../../admin', 'ok=false');
	}

}

if(isset($_POST['auth'])){
	if(qeury_search($_POST['user_login'],$_POST['password'])==1){
		$conn->arr = $conn->fetchrow($conn->query("SELECT * FROM users WHERE login = '".mb_strtolower($_POST['user_login'])."' AND password = '".md5(mb_strtolower($_POST['password']))."'"));
		if($conn->arr['admin']==1){
			$_SESSION['admin'] = $conn->arr['name'];
			redirect('../../admin', $_SESSION['admin']);
		}else {
			$_SESSION['user'] = $conn->arr['name'];
			redirect('../../index', 'ok=true&'.$_SESSION['user']);
		}
	}else {redirect('../../index', 'ok=false');}
}

if(isset($_POST['reg'])){
	if(qeury_search($_POST['user_login'],$_POST['password'])==0){
		if(register($_POST['user_login'],$_POST['name'],$_POST['tel'],$_POST['password'])==1){
			redirect('../../auth');
		}
	}else {redirect('../../reg');}
}
if(isset($_POST['add_cont'])){
	if(add_contact($_POST['name'],$_POST['number'])==1){
		redirect('../../index', 'ok=true');
	}
}
if(isset($_POST['add_comm'])){
	if(isset($_SESSION['admin'])){ $name=$_SESSION['admin'];}else{$name=$_SESSION['user']; }
	if(add_comm($name, $_FILES['img_comm']['name'],$_POST['text_comm'])==1){

		if(!move_uploaded_file($_FILES['img_comm']['tmp_name'], "../../upload/".$_FILES['img_comm']['name']))
	{
		redirect('../../index', 'ok=false');
	}else {redirect('../../index', 'ok=true');}
	}
}

if(isset($_POST['add_pet'])){
	if(add_pet($_POST['pet_name'], $_POST['pet_category'],$_POST['pet_age'],$_POST['desc_pet'],$_FILES['pet_img']['name'])==1){

		if(!move_uploaded_file($_FILES['pet_img']['tmp_name'], "../../upload/".$_FILES['pet_img']['name']))
	{
		redirect('../../admin', 'ok=false');
	}else {redirect('../../admin', 'ok=true');}
	}
}
if(isset($_POST['edit_pet'])){
	if(edit_pets($_POST['pet_name'], $_POST['pet_category'],$_POST['pet_age'],$_POST['desc_pet'],$_FILES['pet_img']['name'], $_GET['id'])==1){
		if(empty($_FILES['pet_img']['name'])){redirect('../../admin', 'ok=true');}else {
			if(!move_uploaded_file($_FILES['pet_img']['tmp_name'], "../../upload/".$_FILES['pet_img']['name']))
	{
		redirect('../../admin', 'ok=false');
	}else {redirect('../../admin', 'ok=true');}

		}
	}
}
if(isset($_POST['edit_comm'])){
	if(edit_pets($_POST['comm_name'], $_POST['comm_text'],$_FILES['comm_img']['name'], $_GET['id'])==1){
		if(empty($_FILES['comm_img']['name'])){redirect('../../admin', 'ok=true');}else {
			if(!move_uploaded_file($_FILES['comm_img']['tmp_name'], "../../upload/".$_FILES['comm_img']['name']))
	{
		redirect('../../admin', 'ok=false');
	}else {redirect('../../admin', 'ok=true');}

		}
	}
}
?>