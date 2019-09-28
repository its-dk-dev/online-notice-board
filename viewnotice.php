<?php
	include('include/session.php');
	include('include/header.php');
	if($login){
		include('include/navbar.php');
    $nid = $_GET['notice_id'];
    $notices_data = mysqli_query($conn,"select * from notices where id='$nid'");
    $notice_data = mysqli_fetch_array($notices_data);
      $tid = $notice_data['uid'];
      $tusers_data = mysqli_query($conn,"select * from userdata where usertype='Teacher' AND id='$tid'");
      $tuser_data = mysqli_fetch_array($tusers_data);
      if($tuser_data)
        $name = $tuser_data['fname']." ".$tuser_data['lname'];
		?>
    <div class="ph1">
      <div class="class">
        <strong>Department : </strong><?php echo $tuser_data['dept'] ?>
        <strong>Semester : </strong><?php echo $notice_data['sem'] ?>
      </div>
      <div class="desc">
        <strong>Title : </strong><?php echo $notice_data['title'] ?>
      </div>
      <div class="desc">
        <strong>Subject :</strong><?php echo $notice_data['sub'] ?>
      </div>
      <div class="desc">
        <strong>Description :</strong>
        <?php echo $notice_data['desc']?>
      </div>
      <div class="noticeby">
        <b> <?php echo "by ".$name." on ".$notice_data['timestamp']?></b>
      </div>
    </div>
  <?php }
  	else {
  		echo "Access Denied";
  	}
  ?>
