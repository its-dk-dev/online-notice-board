<?php
	include('include/session.php');
	include('include/header.php');
	var_dump($_POST);
	if($login){
    include('include/navbar.php');
    isset($_POST['name']) ? $name=$_POST['name']:$name="";
    isset($_POST['total1']) ? $total1=$_POST['total1']:$total1="";
    isset($_POST['total2']) ? $total2=$_POST['total2']:$total2="";
    isset($_POST['total3']) ? $total3=$_POST['total3']:$total3="";
    isset($_POST['total4']) ? $total4=$_POST['total4']:$total4="";
    isset($_POST['total5']) ? $total5=$_POST['total5']:$total5="";
    isset($_POST['total6']) ? $total6=$_POST['total6']:$total6="";
    isset($_POST['dept']) ? $dept=$_POST['dept']:$dept="";
    isset($_POST['sem']) ? $sem=$_POST['sem']:$sem="";
    isset($_POST['rollno']) ? $rollno=$_POST['rollno']:$rollno="";
    $tid = $_SESSION['id'];
    $total = $total1+$total2+$total3+$total4+$total5+$total6;


    $rs=mysqli_query($conn, "INSERT INTO `results_data` (`rid`, `uid`, `dept`, `sem`, `rollno`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `total`) VALUES (NULL, '$tid', '$dept', '$sem', '$rollno', '$total1', '$total2', '$total3', '$total4', '$total5', '$total6', '$total')");
    if($rs){
      ?>
      <div class="alert alert-success">
        <strong>Success!</strong> Record Inserted Successfully.
      </div>
      <?php
      $msg="Record Inserted Successfully.";
        header("Location: teacherdashboard.php?msg='$msg'");
    }
    else {
      $msg= "Something Went Wrong";
      header("Location: teacherdashboard.php?msg='$msg'");
    }
  }
?>
