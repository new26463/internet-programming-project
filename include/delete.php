<?php 
	include 'database.php';
	$del = $_POST['id'];
	if($_POST['type']==1){
		$delete = "delete from product where prod_id ='$del'";
		$run_del = mysqli_query($con,$delete);
	}else if($_POST['type']==2){
		$delete = "delete from customer where cust_id ='$del'";
		$run_del = mysqli_query($con,$delete);
	}
	mysqli_close($con);
	if($run_del){
		echo "yes";
	}else{
		echo "error";
	}
?>