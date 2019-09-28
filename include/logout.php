<?php
	include('session.php');
	print_r($_SESSION);
	session_destroy();
	$_SESSION['login'] = false;
	$_SESSION['name'] ="";
	header("Location: ../")
?>
