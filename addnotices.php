<?php
	include('include/session.php');
	include('include/header.php');
	include('include/navbar.php');

	if(count($_POST)>0){
		isset($_POST['sem']) ? $sem=$_POST['sem']:$sem="";
		isset($_POST['title']) ? $title=$_POST['title']:$title="";
		isset($_POST['sub']) ? $sub=$_POST['sub']:$sub="";
		isset($_POST['desc']) ? $desc=$_POST['desc']:$desc="";
		isset($_POST['file']) ? $file=$_POST['file']:$file="";

		if(count($_POST)>0){
				$uid = $_SESSION['id'];
				$date = new DateTime();
				$time = $date->format('Y-m-d H:i:s');

				$rs=mysqli_query($conn, "INSERT INTO `notices` (`id`, `uid`, `sem`, `title`, `sub`, `desc`, `file`, `timestamp`) VALUES (NULL, '$uid', '$sem', '$title', '$sub', '$desc', '$file','$time')");
				if($rs){
						?>
						<div class="alert alert-success">
							<strong>Success!</strong> Your registration is successfull.
						</div>
						<?php
						$msg="Notice successfully added.";
						header("Location: teacherdashboard.php?msg='$msg'");
					}
					else{
						?>
						<div class="alert alert-danger">
							<strong>Sorry!</strong> You Are Unable To Add Notice.
						</div>
						<?php
						$msg="You Are Unable To Add Notice.";
					}
			}
	}
?>
