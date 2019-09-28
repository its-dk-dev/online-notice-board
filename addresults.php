<?php
	include('include/session.php');
	include('include/header.php');
	if($login){
		include('include/navbar.php');
		isset($_POST['sem']) ? $sem=$_POST['sem']:$sem="";
		isset($_POST['rollno']) ? $rollno=$_POST['rollno']:$rollno="";
		$tid = $_SESSION['id'];
		$tusertype = $_SESSION['usertype'];
		$dept=$tdept=$name=$mother_name="";

		$sub_array = array();
		$users_data = mysqli_query($conn,"select * from userdata where rollno='$rollno'");
		$user_data = mysqli_fetch_array($users_data);
		if($user_data){
			$dept = $user_data['dept'];
			$name = $user_data['fname']." ".$user_data['father_name']." ".$user_data['lname'];
			$mother_name = $user_data['mother_name'];
		}

		$rs=mysqli_query($conn, "select * from `results_data` where rollno='$rollno' AND dept='$dept'");
		$rs_data=mysqli_fetch_array($rs);
		if($rs_data){
			echo "Result Was Already Added Or Provided Info Is Incorrect";
			die();
		}

		$tusers_data = mysqli_query($conn,"select * from userdata where usertype='$tusertype' AND id='$tid'");
		$tuser_data = mysqli_fetch_array($tusers_data);
		if($tuser_data)
			$tdept = $tuser_data['dept'];

		if(isset($_POST) && $dept && $tdept && $sem && $tdept === $dept){
			$subjects = mysqli_query($conn,"select * from sub_list where sem='$sem' AND dept='$dept'");
			while($subject=mysqli_fetch_array($subjects)){
				array_push($sub_array,$subject['subject']);
			}
		}
		else{
			?>
		<div class="alert alert-danger">
		 	<strong>Ohh!</strong> You Can't Fillup The Marks of Other Department Student.
		</div>
		<?php
		}

		if($sub_array){
	?>
	<form action="storeresult.php" method="POST" style="margin-top:30px">
		<div class="studdetails" style="grid-template-columns: 30% 50%;width: 68%;">
			<div class="studcontent">
				<p><strong>Name: </strong> <?php echo $name ?></p>
				<p><strong>	Roll No : </strong><?php echo $rollno ?></p>
			</div>
			<div class="studcontent">
				<p style="  display: flex;justify-content: space-between;"><strong>Department: </strong> <?php echo $dept ?>
				<strong>Semester: </strong> <?php echo $sem ?></p>
				<p><strong>	Mother: </strong><?php echo "$mother_name";?></p>
			</div>
		</div>
		<div class="table" style="margin-top: 2px;margin-left: 15%">
				<table>
						<tr>
							<th>Sr.No:</th>
							<th>Subjects</th>
							<th>Internal Marks (Out Of 10)</th>
							<th>External Marks (Out Of 40)</th>
							<th>Total Marks (Out Of 50)</th>
						</tr>
					<?php
					for($i=0;$i<6;$i++){ ?>
						<tr>
								<td><?php echo $i+1?></td>
								<td><?php echo $sub_array[$i] ?></td>
								<td><input type="text" id="internal<?php echo $i+1 ?>" name="internal<?php echo $i+1 ?>" placeholder="Internal Mark" class="textbox" onblur="caltotal(<?php echo $i+1?>)" ></td>
								<td><input type="text" id="external<?php echo $i+1 ?>" name="external<?php echo $i+1 ?>" placeholder="External Marks" class="textbox"  onblur="caltotal(<?php echo $i+1?>)"></td>
								<td><input type="text" id="total<?php echo $i+1 ?>" name="total<?php echo $i+1 ?>" placeholder="Total Marks" class="textbox"></td>
								<!-- <?php echo "hiiii" ?> -->
						</tr>
				<?php	} ?>
				</table>
			</div>
		 <div class="formbox">
				 <div style="display: flex; justify-content: space-evenly">
						 <input type="submit" class="button" >
						 <input type="reset" class="button" >
				 </div>
			 </div>
		 </form>
<script src="js/javascript.js"></script>
<?php }
	}
	else {
		"Access Denied";
	}
?>
