<?php
require_once 'init.php';
$conn = new mysql($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
session_start();


function register($login='', $name='', $surename='', $password='')
{
	global $conn;
	$conn->query("INSERT INTO users(id, login, password, name, surename, admin) VALUES (NULL, '".mb_strtolower($login)."','".md5(mb_strtolower($password))."', '$name', '$surename' , 0)");
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


function redirect($up='', $parm=''){
	header("Location: $up.php?$parm");
	return 1;
}
function edit_user($id, $login, $password, $name,$surename){
	global $conn;
		$conn->query("
		UPDATE users 
		SET login = '".$login."',
		password = '".$password."',
		name = '".$name."',
		surename = '".$surename."'
		WHERE id = $id;");
	return 1;
}
function add_cont($name, $product, $size){
	global $conn;
	$conn->query("INSERT INTO contacts(id, who, product, size, ready) VALUES (NULL, '$name','$product','$size', 0)");
	return 1;
}
function edit_cont($name, $product, $size, $id){
	global $conn;
		$conn->query("
		UPDATE contacts 
		SET who = '".$name."',
		product = '".$product."',
		size = '".$size."'
		WHERE id = $id;");
	return 1;
}
function change($table, $id){
	global $conn;
		$conn->query("
		UPDATE $table 
		SET ready = 1
		WHERE id = $id;");
	return 1;
}
function delete($table, $id){
	global $conn;
	$conn->query("DELETE FROM $table WHERE id = $id");
	return 1;
}
function udelete($table, $id, $user){
	global $conn;
	$conn->query("DELETE FROM $table WHERE id = $id AND who = '".$user."'");
	return 1;
}
?>