<?php
	include "database.php";
	$product = $_POST['product'];
	$user = $_POST['user'];
	
	$insert_user = "delete from cart 
					where (prod_id = $product) and (cust_email = '$user')";
	$run_insert_user = mysqli_query($con,$insert_user);
	if($run_insert_user){echo "yes";}else{echo "error";}

	mysqli_close($con);
?>