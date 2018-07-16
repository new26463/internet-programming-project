<?php
	include "database.php";
	$num = 0;
	if($_SESSION){
		$user = $_SESSION['user'];
		$sel = "select * from cart where cust_email = '$user'";
		$run = mysqli_query($con,$sel);
		$num = mysqli_num_rows($run);
	}
?>