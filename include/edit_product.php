<?php
	include "database.php";
	$id = $_POST['item-id'];
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
	$update_product = "update product 
					   set prod_name='$name', prod_price='$price' , prod_color='$color' , prod_brand='$brand' , 
						   prod_details='$details' , prod_img='$img'  , prod_type='$type'
					   where prod_id=$id";
	$run_update = mysqli_query($con,$update_product);
	if($run_update){echo "yes";}else{echo "error";}
	}
	else {echo "ERROR!!!!!!!!!! Insert watch to database Failed!!!";}
?>