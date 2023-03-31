<?php
require_once 'init.php';
$conn = new mysql($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
session_start();


function register($login='', $password='',$email='',$name='')
{
	global $conn;
	$conn->query("INSERT INTO users(id, login, password, email, name) VALUES (NULL,  '".mb_strtolower($login)."','".md5(mb_strtolower($password))."','".$email."','$name')");
	return 1;
}


function qeury_search($table, $login, $password)
{
	global $conn;
	$conn->arr = $conn->fetchrow($conn->query("SELECT * FROM $table WHERE login = '".mb_strtolower($login)."' AND password = '".md5(mb_strtolower($password))."';"));
	if(isset($conn->arr['password']))
	{
		return 1;
	}
	else {
		return 0;
	}
}


function add_comm($text_com, $login, $id_worker){
	global $conn;
	$conn->query("INSERT INTO comm(id, text_com, login, id_worker) VALUES (NULL, '$text_com','$login','$id_worker')");
	return 1;
}


function add_prod($name, $description, $phonen, $price,$adress, $img=''){
	global $conn;
	$conn->query("INSERT INTO workers(id, name, description, phonen, price,adress, img) VALUES (NULL, '$name','$description','$phonen','$price','$adress', '$img')");
	return 1;
}
function delete($table, $id){
	global $conn;
	$conn->query("DELETE FROM $table WHERE id = $id");
	return 1;
}



function edit_prod($name, $description, $phonen, $price,$adress, $img, $id){
	global $conn;
	if(empty($img)){
		$conn->query("
		UPDATE workers 
		SET name = '".$name."',
		description = '".$description."',
		phonen = '".$phonen."',
		price = '".$price."',
		adress = '".$adress."'
		WHERE id = $id;");
		return 1;
	}else {
		$conn->query("
		UPDATE workers 
		SET name = '".$name."',
		description = '".$description."',
		phonen = '".$phonen."',
		price = '".$price."',
		adress = '".$adress."',
		img = '".$img."'
		WHERE id = $id;");
		return 1;
	}
	
}



function redirect($up='', $parm=''){
	header("Location: $up.php?$parm");
	return 1;
}
?>