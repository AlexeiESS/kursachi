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

if(isset($_POST['house_add'])){
	if(add_product($_POST['house_name'],$_POST['house_desc'], $_POST['house_price_workdays'],$_POST['house_price_holidays'],$_POST['sale_type'] ,$_FILES['house_photo']['name'])==1){
		if(!move_uploaded_file($_FILES['house_photo']['tmp_name'], "../../upload/".$_FILES['house_photo']['name'])==1)
		{
			redirect('../../admin', 'ok=false');
		}else {redirect('../../admin', 'ok=true');}
	}else {redirect('../../admin', 'ok=false');}
}
if(isset($_POST['add_cont'])){
	$date = strtotime($_POST['book_date']);
	$time_1 = strtotime($_POST['time_begin']);
	$time_2 = strtotime($_POST['time_end']);
	if(add_contact($_POST['book_name'],$_POST['book_house'],$_POST['book_tel'],$date, $time_1,$time_2,$_POST['book_comment'])==1) 
	{
		redirect('../../index', 'ok=true');
	}else {redirect('../../index', 'ok=false');}
}

if(isset($_POST['house_edit'])){
	if(edit_product($_POST['house_name'],$_POST['house_desc'], $_POST['house_price_workdays'],$_POST['house_price_holidays'],$_POST['sale_type'] ,$_FILES['house_photo']['name'], $_GET['id'])==1){

		if(empty($_FILES['house_photo']['name'])){redirect('../../admin', 'ok=true');}else {
		if(!move_uploaded_file($_FILES['house_photo']['tmp_name'], "../../upload/".$_FILES['house_photo']['name']))
		{
			redirect('../../admin', 'ok=false');
		}else {redirect('../../admin', 'ok=true');}}
	}
}
if(isset($_POST['req_save'])){
	$date = strtotime($_POST['req_day_begin']);
	$time_1 = strtotime($_POST['req_time_begin']);
	$time_2 = strtotime($_POST['req_time_end']);
	if(edit_cont($_POST['req_name'],$_POST['req_housename'],$_POST['req_tel'],$date, $time_1,$time_2,$_POST['req_comment'],$_POST['req_contacted'],$_GET['id'])==1)
	{
		redirect('../../requests', 'ok=true');
	}else {redirect('../../requests', 'ok=false');}
}







?>