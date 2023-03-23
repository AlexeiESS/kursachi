<?php
require_once 'init.php';
$conn = new mysql($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
session_start();


function register($login='', $name='', $phonen='', $password='')
{
	global $conn;
	$conn->query("INSERT INTO users(id, name, login, phonen, password, admin) VALUES (NULL, '$name', '".mb_strtolower($login)."','".$phonen."', '".md5(mb_strtolower($password))."', 0)");
	return 1;
}


function qeury_search($login, $password)
{
	global $conn;
	$conn->arr = $conn->fetchrow($conn->query("SELECT * FROM users WHERE login = '".mb_strtolower($login)."' AND password = '".md5(mb_strtolower($password))."'"));
	if(isset($conn->arr['password']))
	{
		return 1;
	}
	else {
		return 0;
	}
}



function add_product($name, $description, $price,$masse,$height, $img=''){
	global $conn;
	$conn->query("INSERT INTO homes(id, name, description, price,masse, height, img) VALUES (NULL, '$name','$description','$price','$masse','$height','$img')");
	return 1;
}
function edit_product($name, $description, $price,$masse,$height, $img='', $id){
	global $conn;
	if(empty($img)){
		$conn->query("
		UPDATE homes 
		SET name = '".$name."',
		description = '".$description."',
		price = '".$price."',
		masse = '".$masse."',
		height = '".$height."'
		WHERE id = $id;");
		return 1;
	}else {
		$conn->query("
		UPDATE homes 
		SET name = '".$name."',
		description = '".$description."',
		price = '".$price."',
		masse = '".$masse."',
		height = '".$height."',
		img = '".$img."'
		WHERE id = $id;");
		return 1;
	}
	
}




function add_contact($name,$product, $phonen, $date_day, $date_time_begin, $date_time_end, $text){
	global $conn;
	$conn->query("INSERT INTO contacts(id, name,product, phonen, date_day,date_time_begin,date_time_end, text_cont, svaz) VALUES (NULL, '$name','$product','$phonen','$date_day','$date_time_begin','$date_time_end','$text', 0)");
	return 1;
}


function edit_cont($name,$product, $phonen, $date_day, $date_time_begin, $date_time_end, $text,$svaz, $id){
	global $conn;
	$conn->query("
		UPDATE contacts 
		SET name = '".$name."',
		product = '".$product."',
		phonen = '".$phonen."',
		date_day = '".$date_day."',
		date_time_begin = '".$date_time_begin."',
		date_time_end = '".$date_time_end."',
		text_cont = '".$text."',
		svaz = '".$svaz."'
		WHERE id = $id;");
		return 1;
}





function delete($table, $id){
	global $conn;
	$conn->query("DELETE FROM $table WHERE id = $id");
	return 1;
}

function redirect($up='', $parm=''){
	header("Location: $up.php?$parm");
	return 1;
}
?>