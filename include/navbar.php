<div class="navbar" style="background-color: #f5f4f4">
	<h1><img src="img/logo.jfif" style="vertical-align: bottom;border-radius:50%;height:50px"/>nline Notice Board</h1>
	<?php
		if($login){
		?>
		<ul>
			<li><?php echo $_SESSION['name']?></li>
			<li><a href="<?php if($_SESSION['usertype'] === "Student") echo "studentdashboard.php"; else echo "teacherdashboard.php" ?>">
				<?php if($_SESSION['usertype'] === "Student") echo "Notices"; else echo "Dashboard" ?></a></li>
			<?php if($_SESSION['usertype'] === "Student") { ?> <li><a href="viewresult.php">Results</a</li> <?php } ?>
			<li><a href="include/logout.php">Log Out</a></li>
		</ul>
		<?php }
	?>
</div>
