<?php
	include('include/session.php');
	include('include/header.php');
	if($login && $_SESSION['usertype']==="Student"){
		include('include/navbar.php');
		?>
		<div class="subheadings">
			<h2>
				Notices
			</h2>
		</div>

		<?php
		$notices_data = mysqli_query($conn,"select * from notices order by timestamp desc");
		while($notice_data = mysqli_fetch_array($notices_data)){
			$tid = $notice_data['uid'];
			$tusers_data = mysqli_query($conn,"select * from userdata where usertype='Teacher' AND id='$tid'");
			$tuser_data = mysqli_fetch_array($tusers_data);
			if($tuser_data)
				$name = $tuser_data['fname']." ".$tuser_data['father_name']." ".$tuser_data['lname'];
		?>
    <div class="textbox" style="margin-left:7%; height: 150px;   ">
				<strong>Notice By:</strong> <?php echo $name ?><br><br>
				<strong> Description: </strong> <?php echo  $notice_data['title']?><br><br>
				<strong> Posted On: </strong> <?php echo  $notice_data['timestamp']?>

			<div style="margin-top: 45px">
				<a href="viewnotice.php?notice_id=<?php echo $notice_data['id']?>" class="button" >View Notice</a>
				<!-- <?php if($_SESSION['id'] === $notice_data['uid']) {?><a href="editnotice.php?id=<?php echo $notice_data['id'] ?>" class="button">Edit Notice</a> <?php } ?> -->
				<?php if($_SESSION['id'] === $notice_data['uid']) {?><a href="deletenotice.php?id=<?php echo $notice_data['id'] ?>" class="button">Delete Notice</a> <?php } ?>
			</div>
		</div>
	<?php } ?>
		<?php
	}
	else{
		header("Location: studentsignup.php");
	}
?>
