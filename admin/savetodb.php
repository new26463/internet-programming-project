<?php	
	include "database.php";
	$name = $_POST['item-name'];
	$price = $_POST['item-price'];
	$color = $_POST['item-color'];
	$type = $_POST['item-type'];
	$brand = $_POST['item-brand'];
	$details = $_POST['item-details'];
	$img = $_FILES['item-img']['name'];
	$img_type = $_FILES['item-img']['type'];
	$img_tmp_name = $_FILES['item-img']['tmp_name'];
	if($name && $price && $color && $type && $brand && $details && $img ){
	move_uploaded_file($img_tmp_name,"../img/watch/$img");
	$insert_watch = "insert into product (prod_name,prod_price,prod_color,prod_type,prod_brand,prod_details,prod_img)
				values ('$name','$price','$color','$type','$brand','$details','$img')";
	$run_insert_watch = mysqli_query($con,$insert_watch);
	
	echo " Insert watch to database Success!!!";
	}
	else {echo "ERROR!!!!!!!!!! Insert watch to database Failed!!!";}
?>