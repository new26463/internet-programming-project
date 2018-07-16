<?php
	include "database.php";
	session_start();
	$user = $_SESSION['user'];
	$sel_user = "select * from cart where cust_email = '$user'";
	$run= mysqli_query($con,$sel_user);
	$date = date("d-m-Y");
	date_default_timezone_set('asia/bangkok');
	$time = date("h-ia");
	$order = rand(1000000, 9999999);
	while($data = mysqli_fetch_array($run)){
		$cust_email = $data['cust_email'];
		$prod_id = $data['prod_id'];	
		$insert = "insert into bill (cust_email,prod_id,bill_date,bill_time,bill_order)
						values ('$cust_email',$prod_id,'$date','$time','$order')";
		$run_insert = mysqli_query($con,$insert);
	}
		$delete = "delete from cart where cust_email ='$cust_email'";
		$run_del = mysqli_query($con,$delete);
		if($run_del)echo "Are delivered";

	mysqli_close($con);		
?>