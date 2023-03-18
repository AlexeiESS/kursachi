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
	$conn->arr = $conn->fetchrow($conn->query("SELECT * FROM users WHERE login = '".mb_strtolower($login)."' AND password = '".md5(mb_strtolower($password))."';"));
	if(isset($conn->arr['password']))
	{
		return 1;
	}
	else {
		return 0;
	}
}
function add_comm($name, $img_comm, $text_comm){
	global $conn;
	$conn->query("INSERT INTO commentaries(id, name, text_com, img) VALUES (NULL, '$name','$text_comm','$img_comm')");
	return 1;
}
function add_contact($name,$tel){
	global $conn;
	$conn->query("INSERT INTO contacts(id, name, tel) VALUES (NULL, '$name','$tel')");
	return 1;
}

function edit_comm($name='', $img_comm='', $text_comm='', $id){
	global $conn;
	if(empty($img_comm)){
		$conn->query("
		UPDATE commentaries 
		SET name = '".$name."',
		text_com = '".$text_comm."',
		img = '".$img_comm."'
		WHERE id = $id;");
	return 1;}else {
		$conn->query("
		UPDATE commentaries 
		SET name = '".$name."',
		text_com = '".$text_comm."'
		WHERE id = $id;");
		return 1;
	}
}
function add_pet($name, $category, $age, $description, $img=''){
	global $conn;
	$conn->query("INSERT INTO pets(id, name, category, age, description, img, search) VALUES (NULL, '$name','$category','$age','$description', '$img', 0)");
	return 1;
}
function delete($table, $id){
	global $conn;
	$conn->query("DELETE FROM $table WHERE id = $id");
	return 1;
}
function edit_pets($name, $category, $age, $description, $img, $id){
	global $conn;
	if(empty($img)){
		$conn->query("
		UPDATE pets 
		SET name = '".$name."',
		category = '".$category."',
		age = '".$age."',
		description = '".$description."'
		WHERE id = $id;");
		return 1;
	}else {
		$conn->query("
		UPDATE pets 
		SET name = '".$name."',
		category = '".$category."',
		age = '".$age."',
		description = '".$description."',
		img = '".$img."'
		WHERE id = $id;");
		return 1;
	}
	
}


function change_pet($table, $id){
	global $conn;
		$conn->query("
		UPDATE $table 
		SET search = 1
		WHERE id = $id;");
	return 1;
}
function redirect($up='', $parm=''){
	header("Location: $up.php?$parm");
	return 1;
}
?>