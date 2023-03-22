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
function add_contact($name,$email,$phonen,$tour,$date_1,$date_2){
	global $conn;
	$conn->query("INSERT INTO contacts(id, name,email, phonen, tour, date_1,date_2, svaz) VALUES (NULL, '$name','$email','$phonen', '$tour','$date_1','$date_2',0)");
	return 1;
}
function edit_contact($name,$email,$phonen,$tour,$date_1,$date_2,$svaz, $id){
	global $conn;
	$conn->query("
		UPDATE contacts 
		SET name = '".$name."',
		email = '".$email."',
		phonen = '".$phonen."',
		tour = '".$tour."',
		date_1 = '".$date_1."',
		date_2 = '".$date_2."',
		svaz = $svaz
		WHERE id = $id;");
		return 1;
}

function add_tours($name, $description, $price, $date_1, $date_2, $img=''){
	global $conn;
	$conn->query("INSERT INTO tours(id, name, description, price,date_1,date_2,img) VALUES (NULL, '$name','$description','$price','$date_1','$date_2','$img')");
	return 1;
}
function delete($table, $id){
	global $conn;
	$conn->query("DELETE FROM $table WHERE id = $id");
	return 1;
}
function edit_tours($name, $description, $price, $date_1, $date_2, $img='', $id){
	global $conn;
	if(empty($img)){
		$conn->query("
		UPDATE tours 
		SET name = '".$name."',
		description = '".$description."',
		price = '".$price."',
		date_1 = '".$date_1."',
		date_2 = '".$date_2."'
		WHERE id = $id;");
		return 1;
	}else {
		$conn->query("
		UPDATE tours 
		SET name = '".$name."',
		description = '".$description."',
		price = '".$price."',
		date_1 = '".$date_1."',
		date_2 = '".$date_2."',
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