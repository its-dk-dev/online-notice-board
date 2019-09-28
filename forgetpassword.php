<?php
	include('include/session.php');
	include('include/header.php');
	if(!$login){
		include('include/navbar.php');
		if(isset($_POST['user_id'])){
			isset($_POST['user_id']) ? $user_id=$_POST['user_id']:$user_id="";
			$result = mysqli_query($conn,"SELECT * FROM userdata where uname='$user_id'");
			$row = mysqli_fetch_array($result);
			if($row){
				$recoverpassword=$row['password'];
				/*$password=$row['password'];
				$to = $user_id;
				$subject = "Password";
				$msg = "Use this password to login";
				$txt = "Your password is : ".$password;
				$headers = "From: dnyanuknawade2713@gmail.com" . "\r\n" ;
				if(mail($to,$subject,$msg,$txt,$headers)){
					echo "Your password is suceesfully to mail";
				}
				else{
					echo 'Failed to recover password, please try again';
					$recoverpassword=$password;
				}*/
			}
			else{
				echo 'invalid userid';
			}
		}?>
	<div class="loginbox" style="display: initial;">
		<form action="" method="POST">
		<div>
			<h2><center><u>Forget Password</u></center></h2>
			<div class="boxalign">
				<label>User ID <br>
					<input type="email" name="user_id" class="textbox" style="width:350px;" value="<?php if(isset($_POST['user_id'])) echo $_POST['user_id'] ?>"  placeholder="Username">
				</label>
			</div>
			<div class="boxalign">
				<label>Your Password <br>
					<input type="text" class="textbox" style="width:350px;" value="<?php if(isset($recoverpassword)) echo $recoverpassword ?>" name="password1" placeholder="Recover Password" required disabled>
				</label>
			</div>
			<div style="display: flex; justify-content: space-evenly">
				<input type="submit" class="button" value="Recover">
				<a  href="studentsignup.php" ><input type="button" class="button" value="Login"></a>
			</div>
		</div>
		</form>
	</div>
	<?php
	}
?>
