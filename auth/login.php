<?php
	include $_SERVER['DOCUMENT_ROOT'].'/database/auth.php';
	$account=$_POST['account'];
	$password=$_POST['password'];
	$auth = new Auth();
	$login = $auth->login($account, $password);
	if($login){
		session_start();
		$_SESSION['user']=$account;
	}
	header('Location: ' . '/home.php');
?>