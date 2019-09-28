<?php
	include('include/session.php');
	include('include/header.php');
	include('include/navbar.php');

	if(count($_POST)>0){
		isset($_POST['username']) ? $username=$_POST['username']:$username="";
		isset($_POST['password']) ? $password=$_POST['password']:$password="";
		isset($_POST['usertype']) ? $usertype=$_POST['usertype']:$usertype="";
		print_r($_POST);
		$email_data = mysqli_query($conn,"select * from userdata where uname='$username'");
		$email_available = mysqli_num_rows($email_data);
		if($email_available){
			$password_data = mysqli_query($conn,"select * from userdata where uname='$username' AND password='$password' AND usertype='$usertype'");
			$password_available = mysqli_num_rows($password_data);
			if($password_available){
				$user_data = mysqli_fetch_array($password_data);
				$_SESSION['login'] = true;
				$_SESSION['name'] = $user_data['fname']." ".$user_data['lname'];
				$_SESSION['id'] = $user_data['id'];
				$_SESSION['usertype'] = $user_data['usertype'];
				?>
				<div class="alert alert-success">
				 <strong>login!</strong> Login successfull.
				</div>
				<?php
				echo $user_data['usertype'];
				if($user_data['usertype'] === 'Student')
					header("Location: studentdashboard.php?usertype='student'");
				else
					header("Location: teacherdashboard.php?usertype='student'");
		  }
			else{
				?>
				<div class="alert alert-danger">
				 <strong>Ohh!</strong> Password or Usertype Do Not Matched, Try Again.
				</div>
				<?php
			}
		}
		else{
			?>
			<div class="alert alert-danger">
			 <strong>Ohh!</strong> Email Is Not Registered.
			</div>
			<?php
		}
	}
?>
