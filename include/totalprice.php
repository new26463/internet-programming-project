<?php 
	include "database.php";
	$email = $_SESSION['user'];
	$select = "select * from cart join product on cart.prod_id = product.prod_id where cust_email = '$email'";
	$run = mysqli_query($con,$select);
	$sum=0;
	while($data = mysqli_fetch_array($run)){
		$price = $data['prod_price'];
		$sum+=$price;
	}
	echo $sum;
?>