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



function add_product($name, $adress, $price,$description, $img=''){
	global $conn;
	$conn->query("INSERT INTO objects(id, name, adress, price,description, img) VALUES (NULL, '$name','$adress','$price','$description','$img')");
	return 1;
}
function edit_product($name, $adress, $price,$description, $img='', $id){
	global $conn;
	if(empty($img)){
		$conn->query("
		UPDATE objects 
		SET name = '".$name."',
		adress = '".$adress."',
		price = '".$price."',
		description = '".$description."'
		WHERE id = $id;");
		return 1;
	}else {
		$conn->query("
		UPDATE objects 
		SET name = '".$name."',
		adress = '".$adress."',
		price = '".$price."',
		description = '".$description."'
		img = '".$img."'
		WHERE id = $id;");
		return 1;
	}
	
}




function add_contact($name,$phonen,$object){
	global $conn;
	$conn->query("INSERT INTO contacts(id, name,phonen, object, svaz) VALUES (NULL, '$name','$phonen','$object', 0)");
	return 1;
}


function edit_cont($name,$phonen,$object, $svaz, $id){
	global $conn;
	$conn->query("
		UPDATE contacts 
		SET name = '".$name."',
		phonen = '".$phonen."',
		object = '".$object."',
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