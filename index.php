<?php
	include('include/session.php');
	include('include/header.php'); 
	if(!$login){
		?>
		<img src="img/cover.jpg" style="height:100vh; width:100%">
		<div style="margin-top: -750px;	margin-bottom: 185px;">
			<h1 class="welcome">Welcome To Online Notice Board</h1>
			<div class="loginbtn">
			  <a href="studentsignup.php"><button type="button" name="button">Let's Start</button></a>
			</div>
		</div>
		<?php
	}
	else
		header("Location: studentdashboard.php");
?>
