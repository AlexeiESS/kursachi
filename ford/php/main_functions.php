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
function add_contact($name,$product,$phonen=''){
	global $conn;
	$conn->query("INSERT INTO contacts(id, user,phonen, product, buy) VALUES (NULL, '$name','$phonen','$product', 0)");
	return 1;
}
function add_buy_contact($user, $phone){
	global $conn;
	$conn->query("
		UPDATE contacts 
		SET buy = 1,
		phonen = '".$phone."'
		WHERE user = $user;");
		return 1;
}

function add_product($name, $price, $description, $img=''){
	global $conn;
	$conn->query("INSERT INTO products(id, name, price, description,img) VALUES (NULL, '$name','$price','$description','$img')");
	return 1;
}
function delete($table, $id){
	global $conn;
	$conn->query("DELETE FROM $table WHERE id = $id");
	return 1;
}
function edit_product($name, $price, $description, $img='', $id){
	global $conn;
	if(empty($img)){
		$conn->query("
		UPDATE products 
		SET name = '".$name."',
		price = '".$price."',
		description = '".$description."'
		WHERE id = $id;");
		return 1;
	}else {
		$conn->query("
		UPDATE products 
		SET name = '".$name."',
		price = '".$price."',
		description = '".$description."',
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