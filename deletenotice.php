<?php
	include('include/session.php');
	include('include/header.php');
	if($login && $_SESSION['usertype']==="Teacher"){
		include('include/navbar.php');
    $noticeid=$_GET['id'];

    $notices_data = mysqli_query($conn,"select * from notices where id='$noticeid'");
    if($notice_data = mysqli_fetch_array($notices_data)){
      if($_SESSION['id'] === $notice_data['uid'])
      {
        $rs=mysqli_query($conn, "DELETE from notices where id='$noticeid'");
        if($rs){
          ?>
          <div class="alert alert-success">
            <strong>Success!</strong> Record Deleted Successfully.
          </div>
          <?php
          $msg="Record Deleted Successfully.";
          header("Location: teacherdashboard.php?msg='$msg'");
        }
        else {
          $msg= "Something Went Wrong";
          header("Location: teacherdashboard.php?msg='$msg'");
        }
      }
      else {
        $msg= "You Have Not Permited";
        header("Location: studentsignup.php?msg='$msg'");
      }
    }
  }
?>
