<?php
	include('include/session.php');
	include('include/header.php');
	if(!$login){
		include('include/navbar.php');
		$fname_error=$lname_error=$father_name_error=$mother_name_error=$password_error=$mbno_error=$rollno_error=$condition_error=$teacherid_error="";
		if(count($_POST)>0){
			print_r($_POST);
			$error=0;
			isset($_POST['fname']) ? $fname=$_POST['fname']:$fname="";
			isset($_POST['lname']) ? $lname=$_POST['lname']:$lname="";
			isset($_POST['father_name']) ? $father_name=$_POST['father_name']:$father_name="";
			isset($_POST['mother_name']) ? $mother_name=$_POST['mother_name']:$mother_name="";
			isset($_POST['gender']) ? $gender=$_POST['gender']:$gender="";
			isset($_POST['dob']) ? $dob=$_POST['dob']:$dob="";
			isset($_POST['email']) ? $email=$_POST['email']:$email="";
			isset($_POST['cc']) ? $cc=$_POST['cc']:$cc="";
			isset($_POST['mbno']) ? $mbno=$cc.$_POST['mbno']:$mbno="";
			isset($_POST['dept']) ? $dept=$_POST['dept']:$dept="";
			isset($_POST['sem']) ? $sem=$_POST['sem']:$sem="";
			isset($_POST['rollno']) ? $rollno=$_POST['rollno']:$rollno="";
			isset($_POST['teacherid']) ? $teacherid=$_POST['teacherid']:$teacherid="";
			isset($_POST['condition']) ? $condition=$_POST['condition']:$condition="";
			isset($_POST['password1']) ? $password=$_POST['password1']:$password="";
			isset($_POST['usertype']) ? $usertype=$_POST['usertype']:$usertype="";

			if(isset($_POST['password1']) != isset($_POST['password2'])){
				$error=1;
				echo "Password Missmatched, Please try agian";
			}

			if(strlen($fname)<2){
				$error=1;
				$fname_error="first name is too short";
			}

			if(strlen($lname)<2){
				$error=1;
				$lname_error="last name is too short";
			}

			if(strlen($father_name)<2){
				$error=1;
				$father_name_error="father name is too short";
			}

			if(strlen($mother_name)<2){
				echo "hiiii";
				$error=1;
				$mother_name_error="mother name is too short";
			}

			if($condition!= 'on'){
				 $error=1;
				 $condition_error="must accept the term and condition";
			}

			if(strlen($password)< 5){
				 $error=1;
				 $password_error="password is too short";
			}

			if(!is_numeric($mbno) || strlen($mbno) != 12){
				$error=1;
				$mbno_error="mobile number must contain 10 digits";
			}

			if($rollno){
				if(!is_numeric($rollno) || $rollno<1){
					$error=1;
					$rollno_error="rollno should be greater than zero";
				}
				echo "ROll no";
			}
			else {
				if(!is_numeric($teacherid) || strlen($teacherid) == 0){
					$error=1;
					$teacherid_error="Teacher id must be numerical";
				}
				echo "Teacher Id";
			}

			echo $error."ERROR";
			if(!$error){
				if($rollno)
					$rs=mysqli_query($conn, "INSERT INTO `userdata` (`id`, `fname`, `lname`, `father_name`, `mother_name`, `gender`, `dob`, `email`, `mbno`, `dept`, `sem`, `rollno`, `uname`, `password` , `usertype`) VALUES (NULL, '$fname', '$lname', '$father_name', '$mother_name', '$gender', '$dob', '$email', '$mbno', '$dept', '$sem', '$rollno', '$email', '$password' ,'$usertype')");
				else {
					$rs=mysqli_query($conn, "INSERT INTO `userdata` (`id`, `fname`, `lname`, `father_name`, `mother_name`, `gender`, `dob`, `email`, `mbno`, `dept`, `teacherid`, `uname`, `password` , `usertype`) VALUES (NULL, '$fname', '$lname', '$father_name', '$mother_name', '$gender', '$dob', '$email', '$mbno', '$dept', '$teacherid', '$email', '$password' ,'$usertype')");
				}
					if($rs){
						$login_data=mysqli_query($conn,"select * from userdata where email='$email' AND password='$password'");
						$user_data=mysqli_fetch_array($login_data);
						$_SESSION['login'] = true;
						$_SESSION['name'] = $user_data['fname']." ".$user_data['lname'];
						$_SESSION['id']=$user_data['id'];
						$_SESSION['usertype'] = $user_data['usertype'];
						?>
						<div class="alert alert-success">
							<strong>Success!</strong> Your registration is successfull.
						</div>
						<?php
						$msg="You registration is successfull.";
						if($rollno)
							header("Location: studentdashboard.php?msg='$msg'");
						else
							header("Location: teacherdashboard.php?msg='$msg'");
					}
					else{
						?>
						<div class="alert alert-danger">
							<strong>Sorry!</strong> You Are Unable To Register.
						</div>
						<?php
						$msg="You Are Unable To Register.";
					}
				}
				else
					echo "Something Went Wrong,Please Check Information!";
			}
	?>


<div class="headings">
	<h2>
		Login
	</h2>
	<h2>
		Registration
	</h2>
</div>
<div class="container">
	<div class="loginbox">
		<form action="login.php" method="POST">
			<select name="usertype" class="dropdown">
				<option value="Student"> Student</option>
				<option value="Teacher">Teacher</option>
			</select>
			Username
			<input type="text" name="username" class="textbox" placeholder="User Name" required>
			<br>
			Password
			<input type="password" name="password" class="textbox" placeholder="Password" required>
			<input type="submit" class="button" value="Login Here">
			<a href="forgetpassword.php" >Forget Password</a>
		</form>
	</div>

	<div class="registerbox overflowTest">
	   <form action="studentsignup.php" method="POST">
			<div id="firstdiv" class="">
			<div class="subheadings">Personal Details</div>
			<div class="formbox">
			   <div class="boxalign">
					<label>First Name <br>
						<input type="text" class="textbox" name="fname" placeholder="First Name" required>
						<br><span class="text-danger"><?php echo $fname_error;?></span>
					</label>

					<label>Last Name <br>
						<input type="text" class="textbox"  name="lname" placeholder="Last Name" required>
						<br><span class="text-danger"><?php echo $lname_error;?></span>
					</label>
			   </div>

			   <div class="boxalign">
					<label >Father's Name <br>
						<input type="text" class="textbox" name="father_name" placeholder="Father's Name" required>
						<br><span class="text-danger"><?php echo $father_name_error;?></span>
					</label>

					<label>Mother's Name <br>
						<input type="text" class="textbox" name="mother_name"  placeholder="Mother's Name" required>
						<br><span class="text-danger"><?php echo $mother_name_error;?></span>
					</label>
			   </div>

			   <div class="boxalign">
					<label >Select Gender <br>
						<select name="gender" class="textbox" required>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</label>

					<label>Date Of Birth <br>
						<input type="date" class="textbox" name="dob"  placeholder="Mother's Name" required>
					</label>
			   </div>
		   </div>
		   <div class="subheadings">
			   Educational Details
		   </div>
		   <div class="formbox">
				<div class="boxalign">
					<label >Email ID <br>
						<input type="email" class="textbox" name="email" id="email" placeholder="Email ID" onblur="copymail()" required>
					</label>
				</div>

				<label >Mobile Number <br>
					<div class="boxalign">
						<input type="text"  name="cc" class="textbox" style="width:100px;" value="91">
						<input type="text" name="mbno" class="textbox" required>
						<span class="text-danger"><?php echo $mbno_error;?></span>
					</div>
				</label>
				<div class="boxalign">
					<label >User Type <br>
						<select name="usertype" class="dropdown boxalign" id="usertype">
							<option value="Student"> Student</option>
							<option value="Teacher">Teacher</option>
						</select>
					</label>
				</div>
		   </div>
		   <div class="formbox">
				<div style="display: flex; justify-content: space-evenly">
					<input type="button" class="button" value="Next" onclick="nextForm()">
				</div>
			</div>
			</div>
			<div id="seconddiv" class="" style="display:none">
			   <div class="subheadings">
					Department Details
				</div>
				<div class="formbox">
					<div class="boxalign">
						<label >Select Department <br>
						   <select name="dept" class="textbox">
							   <option value="CS">Computer Science</option>
							   <option value="Math">Mathematics</option>
							   <option value="Chemistry">Chemistry</option>
							   <option value="Physics">Physics</option>
						   </select>
						</label>
						<label id="studsem">Select Semester <br>
							<select name="sem" class="textbox">
								<option value="I">I</option>
								<option value="II">II</option>
								<option value="III">III</option>
								<option value="IV">IV</option>
							</select>
						</label>
					</div>

					<div class="boxalign" id="teacherid" style="display:none">
						<label>Teacher ID<br>
								<input type="text" class="textbox" id="teacherid" name="teacherid" placeholder="TeacherId" style="width:30%">
								<br><span class="text-danger"><?php echo $teacherid_error;?></span>
						</label>
					</div>

					<div class="boxalign" id="studid">
						<label>Roll Number<br>
							<input type="text" class="textbox" name="rollno" id="rollno" placeholder="Roll No" style="width:30%" required>
							<br><span class="text-danger"><?php echo $rollno_error;?></span>
						</label>
					</div>
				</div>
				<div class="subheadings">
					Login Details
				</div>
				<div class="formbox">
					<div class="boxalign">
						<label>User name <br>
							<input type="text" class="textbox" id="username" disabled >
						</label>
					</div>

					<div class="boxalign">
						<label>Password <br>
							<input type="password" class="textbox" name="password1" placeholder="Password" required>
							<br><span class="text-danger"><?php echo $password_error;?></span>
						</label>
						<label>Confirm Password<br>
							<input type="password" class="textbox" name="password2" placeholder="Confirm Password" required>
						</label>
					</div>
				</div>

				<input type="Checkbox" name="condition" class="checkbox">
				Accept
				<a href="">
					Terms And Conditions
				</a>
				<span class="text-danger"><?php echo $condition_error;?></span>
				<div class="">
					<div style="display: flex; justify-content: space-evenly">
						<input type="submit" class="button">
						<input type="reset" class="button">
					</div>
				</div>
			</div>
	   </form>
	</div>
</div>
<script src="js/javascript.js"></script>

	<?php
	}
	else{
		echo "Access Denied.";
	}
?>
