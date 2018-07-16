<?php
	include "database.php";
	$product = $_POST['product'];
	$user = $_POST['user'];
	if($user != "admin"){
		$sel_user = "select * from cart where (prod_id = $product) and (cust_email = '$user')";
		$run_select_user = mysqli_query($con,$sel_user);
		$check_user = mysqli_num_rows($run_select_user);
		
		if(!$check_user){
			$insert_user = "insert into cart (cust_email,prod_id)
							values ('$user',$product)";
			$run_insert_user = mysqli_query($con,$insert_user);
			if($run_insert_user){echo "yes";}else{echo "error";}
		}else{
			echo "yes";
		}
	}else{
		echo "You are admin not but.!";
	}
	mysqli_close($con);
?>