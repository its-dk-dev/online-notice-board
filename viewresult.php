<?php
	include('include/session.php');
	include('include/header.php');
	if($login){
		include('include/navbar.php');
		?>
		<div class="subheadings">
			<h2>
				View Result
			</h2>
		</div>
		<?php
		if($_SESSION['usertype']==="Student")
			$uid=$_SESSION['id'];
		else {
			$rno=$_GET['rollno'];
			$sem=$_GET['sem'];

			$tid=$_SESSION['id'];
			$tdata = mysqli_query($conn,"select * from userdata where id='$tid'");
			$tuser_data=mysqli_fetch_array($tdata);
				$dept=$tuser_data['dept'];
			$studsdata = mysqli_query($conn,"select * from userdata where rollno='$rno' AND sem='$sem' AND dept='$dept'");
			$studdata=mysqli_fetch_array($studsdata);
				$uid=$studdata['id'];
		}
			$data = mysqli_query($conn,"select * from userdata where id='$uid'");
			$user_data=mysqli_fetch_array($data);

			$rollno=$user_data['rollno'];
			$mother_name=$user_data['mother_name'];
			$name=$user_data['fname']." ".$user_data['father_name']." ".$user_data['lname'];

			$rs=mysqli_query($conn, "select * from `results_data` where rollno='$rollno' ");
			$rs_data=mysqli_fetch_array($rs);
			if($rs_data){
				$dept = $rs_data['dept'];
				$sem = $rs_data['sem'];
			}
			else{?>
				<div class="status" style="margin-left: 40%;">
					<h3>Result Not Found Yet.</h3>
				</div>
			<?php
				die();
			}


			$subarray = array();
			$subdata=mysqli_query($conn, "select * from `sub_list` where dept='$dept' AND sem='$sem'");
			while($subname=mysqli_fetch_array($subdata)){
				array_push($subarray,$subname['subject']);
			}
			?>
				<div class="studdetails">
					<div class="studcontent">
						<p><strong>Name: </strong> <?php echo $name ?></p>
						<p><strong>Roll No.: </strong>	<?php echo $rollno ?></p>
					</div>
					<div class="studcontent">
						<p><strong>	College : </strong><?php echo "Sangamner College Sangamner" ?></p>
						<p><strong>	Mother: </strong><?php echo "$mother_name";?></p>
					</div>
				</div>
				<?php
				 	$total=0;
					for($i=0;$i<7;$i++) {
						$index = "sub".($i+1);
						if($i<6){
							$total+=$rs_data[$index];
						}
					 ?>
				<div class="results_data">
					<div class="srno">
						<?php if($i === 0) {?>
						<div class="rsheadings">
								Sr.No.:
						</div>
						<?php } ?>
						<div class="result_row" <?php if($i>0) {?> style="margin-top:65px;" <?php }?>>
							<?php if($i<6) echo $i+1 ?>
						</div>
					</div>
					<div class="subjects">
						<?php if($i === 0) {?>
						<div class="rsheadings">
								Subject
						</div>
						<?php } ?>
						<div class="result_row" <?php if($i>0) {?> style="margin-top:65px;" <?php }?>>
							<?php if($i<6) echo $subarray[$i]; else echo "<strong>Total (Out of 300)</strong>" ?>
						</div>
					</div>
					<div class="marks">
						<?php if($i === 0) {?>
						<div class="rsheadings">
							Total (Out of 50)
						</div>
					<?php } ?>
						<div class="result_row"  <?php if($i>0) {?> style="margin-top:65px;" <?php }?>>
							<?php if($i<6) echo $rs_data[$index]; else echo "<strong>".$total."</strong>"?>
						</div>
					</div>
				</div>
		<?php
		}
	}
	else{
		header("Location: studentsignup.php");
	}
?>
<div class="status">
	<?php
		$per = $total/3;
		if($per >= 70)
			$status = "Congradulation!! First Class With Distinction";
		else if($per >=60 && $per <70)
			$status = "First Class";
		else if($per >=50 && $per <60)
			$status = "Higher Second Class";
		else if($per >=40 && $per <50)
			$status = "Second Class";
		else {
			$status = "Fail";
		}
		?>
		<h3>Result : <?php echo $status ?></h3>
</div>
