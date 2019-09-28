<?php
	include("db.php");
	session_start();

	if(isset($_SESSION['login']))
		$_SESSION['login']==true?$login=true:$login=false;
	else
		$login=false;
?>
