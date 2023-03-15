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
function redirect($up=''){
	header("Location: $up.php");
	return 1;
}
?>