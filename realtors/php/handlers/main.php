<?php 
require_once '../main_functions.php';


if(isset($_SESSION['admin']) && isset($_GET['action']) && $_GET['action']='remove'){
	if(delete($_GET['table'],$_GET['id'])==1){
		if(isset($_GET['returned'])){
			redirect('../../admin_requests', 'ok=true');
		}else {
		redirect('../../admin', 'ok=true');
	}
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

if(isset($_POST['house_save'])){
	if(add_product($_POST['house_desc'], $_POST['house_location'],$_POST['house_price'],$_POST['house_full_desc'] ,$_FILES['house_photo_add']['name'])==1){
		if(!move_uploaded_file($_FILES['house_photo_add']['tmp_name'], "../../upload/".$_FILES['house_photo_add']['name'])==1)
		{
			redirect('../../admin', 'ok=false');
		}else {redirect('../../admin', 'ok=true');}
	}
}
if(isset($_POST['house_save_edit'])){
	if(edit_product($_POST['house_desc'], $_POST['house_location'],$_POST['house_price'],$_POST['house_full_desc'] ,$_FILES['house_photo_new']['name'], $_GET['id'])==1){
		if(empty($_FILES['house_photo_new']['name'])){redirect('../../admin', 'ok=true');}else {
		if(!move_uploaded_file($_FILES['house_photo_new']['tmp_name'], "../../upload/".$_FILES['house_photo_new']['name']))
		{
			redirect('../../admin', 'ok=false');
		}else {redirect('../../admin', 'ok=true');}}
	}
}

if(isset($_POST['cont_send'])){
	if(add_contact($_POST['user_name'],$_POST['user_phone'],$_POST['adress_obj'])==1){
		redirect("../../index", "ok=true");
	}
}
if(isset($_POST['house_save_req'])){
	if(edit_cont($_POST['user_name'],$_POST['user_phone'],$_POST['adress_obj'],$_POST['req_waiting'],$_GET['id'])==1){
		redirect("../../admin_requests", "ok=true");
	}
}













?>