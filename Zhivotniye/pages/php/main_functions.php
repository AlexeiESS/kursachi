<?php
require_once 'init.php';
$conn = new mysql($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
session_start();


function register($login='', $name='', $email='', $password='')
{
	global $conn;
	$conn->query("INSERT INTO users(id, name, login, email, password, admin) VALUES (NULL, '$name', '".mb_strtolower($login)."','".$email."', '".md5(mb_strtolower($password))."', 0)");
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

function add_contact($name,$tel){
	global $conn;
	$conn->query("INSERT INTO contacts(id, name, tel) VALUES (NULL, '$name','$tel')");
	return 1;
}
function edit_comm($name='', $email='', $tel='',$product='',$svaz=0, $id){
	global $conn;
		$conn->query("
		UPDATE contacts 
		SET name = '".$name."',
		email = '".$email."',
		tel = '".$tel."',
		product = '".$product."',
		svaz = ".$svaz."
		WHERE id = $id;");
	return 1;
}
function add_product($name, $price, $description, $mass, $category, $img=''){
	global $conn;
	$conn->query("INSERT INTO products(id, name, price, description, mass, category, img) VALUES (NULL, '$name','$price','$description','$mass','$category', '$img')");
	return 1;
}
function delete($table, $id){
	global $conn;
	$conn->query("DELETE FROM $table WHERE id = $id");
	return 1;
}
function edit_product($name, $price, $description, $mass, $category, $img, $id){
	global $conn;
	if(empty($img)){
		$conn->query("
		UPDATE products 
		SET name = '".$name."',
		price = '".$price."',
		description = '".$description."',
		mass = '".$mass."',
		category = '".$category."'
		WHERE id = $id;");
		return 1;
	}else {
		$conn->query("
		UPDATE products 
		SET name = '".$name."',
		price = '".$price."',
		description = '".$description."',
		mass = '".$mass."',
		category = '".$category."',
		img = '".$img."'
		WHERE id = $id;");
		return 1;
	}
	
}

function add_comm($name, $img_comm, $text_comm){
	global $conn;
	$conn->query("INSERT INTO products(id, name, text_com, img) VALUES (NULL, '$name','$text_comm','$img_comm')");
	return 1;
}
function change_pet($table, $id){
	global $conn;
		$conn->query("
		UPDATE $table 
		SET search = 1,
		WHERE id = $id;");
	return 1;
}
function redirect($up='', $parm=''){
	header("Location: $up.php?$parm");
	return 1;
}
?>