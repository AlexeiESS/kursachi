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


if(isset($_POST['tour_add'])){
	$date_1 = strtotime($_POST['tour_date_begin']);
	$date_2 = strtotime($_POST['tour_date_end']);
	if(add_tours($_POST['tour_name'],$_POST['tour_desc'],$_POST['tour_price'],$date_1,$date_2,$_FILES['tour_photo']['name'])==1){
		if(!move_uploaded_file($_FILES['tour_photo']['tmp_name'], "../../upload/".$_FILES['tour_photo']['name']))
			{
				redirect('../../admin', 'ok=false');
			}else {redirect('../../admin', 'ok=true');}
	}
}


if(isset($_POST['buy_product'])){
	$conn->arr = $conn->fetchrow($conn->query("SELECT * FROM tours WHERE id = '".$_GET['id']."'"));
 	if(add_contact($_POST['user_name'],$_POST['user_email'],$_POST['user_tel'], $conn->arr['name'], $conn->arr['date_1'],$conn->arr['date_2'])==1){
 		redirect('../../ordered');
 	}else {redirect('../../index', 'ok=false');}
}

if(isset($_POST['cont_edit'])){
	$date_1 = strtotime($_POST['req_tour_date_start']);
	$date_2 = strtotime($_POST['req_tour_date_end']);
	if($_POST['req_contact_manager']==1){
	if(edit_contact($_POST['req_name'], $_POST['req_email'], $_POST['req_tel'], $_POST['req_tour'], $date_1, $date_2, 1, $_GET['id'])==1){
		redirect('../../requests');
	}}
	else {
		if(edit_contact($_POST['req_name'], $_POST['req_email'], $_POST['req_tel'], $_POST['req_tour'], $date_1, $date_2, 0, $_GET['id'])==1){
			redirect('../../requests');
	}
	}
}
if(isset($_POST['tour_edit'])){
	$date_1 = strtotime($_POST['tour_date_start']);
	$date_2 = strtotime($_POST['tour_date_end']);
	if(edit_tours($_POST['tour_name'],$_POST['tour_desc'],$_POST['tour_price'],$date_1,$date_2,$_FILES['tour_photo']['name'],$_GET['id'])==1){
	if(empty($_FILES['tour_photo']['name'])){redirect('../../admin', 'ok=true');}else {
		if(!move_uploaded_file($_FILES['tour_photo']['tmp_name'], "../../upload/".$_FILES['tour_photo']['name']))
		{
			redirect('../../admin', 'ok=false');
		}else {redirect('../../admin', 'ok=true');}}
	}else {redirect('../../admin', 'ok=false');}
}
?>