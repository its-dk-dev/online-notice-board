<?php
	include('include/session.php');
	include('include/header.php');
	if($login && $_SESSION['usertype']==="Teacher"){
		include('include/navbar.php');
	?>
<div class="container">
    <div class="loginbox" id="myloginbox" style="margin-top:80px; align-content:center; width:20%;  ">
         <div onclick="viewblock('viewnotice1')"  class="button" >View Notices</div>
         <div onclick="viewblock('addnotice1')"  class="button" >Add Notices</div>
         <div onclick="viewblock('viewresult1')"  class="button" >View Result</div>
         <div onclick="viewblock('addresult1')"  class="button" >Add Result</div>

    </div>
<div class="registerbox" id="addresult">
    <div class="subheadings" style="border:none;">
        <h2>
            Add Result
        </h2>
    </div>

    <form action="addresults.php" method="POST" style="margin-left:px;">
		<div class="formbox">
            <div class="formbox">
                <div class="boxalign">
                    <label >Select Semester <br>
                        <select id="" name="sem" class="textbox" required>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                        </select>
                    </label>
                </div>
								<div class="boxalign">
									<label >Enter Roll No. <br>
										<input type="text" name="rollno" class="textbox">
									</label>
								</div>
            </div>
            <input type="submit" class="button" value="Next" style="width: 200px">
				</div>
    </form>
</div>


<div class="registerbox" id="addnotice">
    <div class="subheadings" style="border:none;">
        <h2>
            Add Notice
        </h2>
    </div>
    <form action="addnotices.php" method="POST" style="margin-left:px;">
        <div class="formbox">
            <div class="formbox">
                <div class="boxalign">
                    <label >Select Semester <br>
                        <select id="" name="sem" class="textbox" required>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                        </select>
                    </label>
                </div>
            </div>
           <div class="boxalign">
                <label>Title <br>
                    <input type="text" class="textbox" name="title" placeholder="Add Notice Title" required>
                    <br>
                </label>
           </div>
           <div class="boxalign">
                <label>Notice Subject <br>
                    <input type="text" class="textbox" name="sub" placeholder="Add Notice Subject like syllabus,attendance etc" required>
                    <br>
                </label>
           </div>
            <div class="boxalign">
                    <label >Description <br>
                        <textarea class="textbox" style="height: 25%" name="desc" placeholder="Add Description Here" required></textarea>
                        <br>
                    </label>
            </div>
            <div class="boxalign">
                <div class="file ">
                        <label for="">
                            <input type="file" name="file">
                        </label>
                </div>
            </div>
            <div class="formbox">
                <div style="display: flex; justify-content: space-evenly">
                    <input type="submit" class="button">
                    <input type="reset" class="button">
                </div>
            </div>
        </div>
    </form>
</div>

<div class="registerbox" id="viewnotice">
    <div class="subheadings" style="border:none;">
        <h2>
            View Notice
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

			<div style="margin-top: 35px">
				<a href="viewnotice.php?notice_id=<?php echo $notice_data['id']?>" class="button" >View Notice</a>
				<!-- <?php if($_SESSION['id'] === $notice_data['uid']) {?><a href="editnotice.php?id=<?php echo $notice_data['id'] ?>" class="button">Edit Notice</a> <?php } ?> -->
				<?php if($_SESSION['id'] === $notice_data['uid']) {?><a href="deletenotice.php?id=<?php echo $notice_data['id'] ?>" class="button">Delete Notice</a> <?php } ?>
			</div>
		</div>
	<?php } ?>
</div>

<div class="registerbox" id="viewresult">
    <div class="subheadings" style="border:none;">
        <h2>
            View Result
        </h2>
    </div>
    <form action="viewresult.php" method="GET" style="margin-left:px;">
        <div class="formbox">
            <div class="formbox">
                <div class="boxalign">
                    <label >Select Semester <br>
                        <select id="" name="sem" class="textbox" required>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                        </select>
                    </label>
                </div>
            </div>

            <div class="formbox">
                <div class="boxalign">
                    <label >Enter RollNo<br>
                       <input type="text" name="rollno" class="textbox" >
                    </label>
                </div>
            </div>

            <div class="formbox">
                <div style="display: flex; justify-content: space-evenly">
                    <input type="button" value="Submit" class="button" >
                    <input type="reset" class="button" >
                </div>
            </div>
        </div>
    </form>
</div>
<script src="js/javascript.js"></script>
<?php }
	else {
		echo "Access Denied";
	}
?>
