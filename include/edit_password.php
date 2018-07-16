<?php	
	include "database.php";
	session_start();
	$email = $_SESSION['user'];
	$passo1 = $_POST['passwordo'];
	$passo2 = $_POST['passwordo1'];
	$passn1 = $_POST['passwordn'];
	$passn2 = $_POST['passwordn1'];
	
	$err = "";
	$pass_pattern= "/^[a-zA-Z0-9]{8,20}$/";
	if($passo1 == $passo2){
		if(!preg_match($pass_pattern,$passo1)){
			$err .= "•กรุณากรอกรหัสผ่านเก่าต้องประกอบด้วยตัวอักษร a-z หรือ A-Z หรือ 0-9 จำนวน 8-15 ตัว \n";
		}
	}else{
		$err .= "•กรุณากรอกรหัสผ่านเก่าให้เหมือนกัน \n";
	}
	if($passn1 == $passn2){
		if(!preg_match($pass_pattern,$passn1)){
			$err .= "•กรุณากรอกรหัสผ่านใหม่ต้องประกอบด้วยตัวอักษร a-z หรือ A-Z หรือ 0-9 จำนวน 8-15 ตัว \n";
		}
	}else{
		$err .= "•กรุณากรอกรหัสผ่านใหม่ให้เหมือนกัน \n";
	}
	
	if($err != ""){
			echo "$err";
	}else{
		$sel_user = "select * from customer where (cust_email = '$email') and (cust_pass = '$passo1')";
		$run_select_user = mysqli_query($con,$sel_user);
		$check_user = mysqli_num_rows($run_select_user);
		if($check_user){
			$update_user = "update customer 
							set cust_pass='$passn1' 
							where cust_email='$email'";
			$run_update = mysqli_query($con,$update_user);
			if($run_update){echo "yes";}else{echo "error";}
		}else{
			echo "รหัสผ่านเก่าไม่ถูกต้อง";
		}
	}
	mysqli_close($con);
?>