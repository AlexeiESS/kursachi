<?php 
require_once '../main_functions.php';


if(isset($_SESSION['admin']) && isset($_GET['action1']) && $_GET['action1']='remove'){
	if(delete($_GET['table'],$_GET['id'])==1){
		redirect('../../admin_viewreqs', 'ok=true');
	}else {
		redirect('../../admin_viewreqs', 'ok=false');
	}
	
}//Для юзера
if(isset($_SESSION['user']) && isset($_GET['action']) && $_GET['action']='remove'){
	if(udelete($_GET['table'],$_GET['id'], $_SESSION['user'])==1){
		redirect('../../myrequests', 'ok=true');
	}else {
		redirect('../../myrequests', 'ok=false');
	}
	
}
if(isset($_SESSION['admin']) && isset($_GET['action']) && $_GET['action']='change'){
	if(change($_GET['table'],$_GET['id'])==1){
		redirect('../../admin_viewreqs', 'ok=true');
	}else {
		redirect('../../admin_viewreqs', 'ok=false');
	}

}

if(isset($_POST['sign_in'])){
	if(qeury_search($_POST['user_login'],$_POST['password'])==1){
		$conn->arr = $conn->fetchrow($conn->query("SELECT * FROM users WHERE login = '".mb_strtolower($_POST['user_login'])."' AND password = '".md5(mb_strtolower($_POST['password']))."'"));
		if($conn->arr['admin']==1){
			$_SESSION['admin'] = $conn->arr['name'].' | '.$conn->arr['surename'];
			redirect('../../admin_viewreqs', $_SESSION['admin']);
		}else {
			$_SESSION['user'] = $conn->arr['name'].' | '.$conn->arr['surename'];
			redirect('../../index', 'ok=true&'.$_SESSION['user']);
		}
	}else {redirect('../../index', 'ok=false');}
}

if(isset($_POST['add_user'])){
	if(qeury_search($_POST['user_login'],$_POST['password'])==0){
		if(register($_POST['user_login'], $_POST['user_name'],$_POST['user_surname'],$_POST['password'])==1){
			redirect('../../admin_viewreqs', 'ok=true');
		}
	}
}
if(isset($_POST['add_cont'])){ 
	if(!isset($_SESSION['admin'])){$name=$_SESSION['user'];}else {$name=$_SESSION['admin'];}
	if(add_cont($name, $_POST['product'],$_POST['size'])==1){
		redirect('../../index', 'ok=true');
	}
}
if(isset($_POST['edit_user_save'])){
	if(edit_user($_GET['id'], $_POST['edit_user_login'], $_POST['edit_user_password'], $_POST['edit_user_name'], $_POST['edit_user_surname'])==1){
		redirect('../../admin_viewreqs', 'ok=true');
	}
}
if(isset($_POST['myreq_edit_save'])){
	if(!isset($_SESSION['admin'])){$name=$_SESSION['user'];}else {$name=$_SESSION['admin'];}
	if(edit_cont($name, $_POST['product'], $_POST['myreq_item_amount'], $_GET['id'])==1){
	redirect('../../index', 'ok=true');
	}
}
?>