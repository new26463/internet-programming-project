<?php	
	include "database.php";
	session_start();
	$name = $_POST['name'];
	$id_ch = $_POST['email'];
	$email = $_SESSION['user'];
	$tel = $_POST['tel'];
	$address = $_POST['address'];
	$b_day = $_POST['b_day'];
	
	$err = "";
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$err .= "•กรุณากรอกอีเมล์ใหม่ให้ตัวตามรูปแบบ \n";
	}
	$tel_pattern= "/^0[0-9]{9}$/";
	if(!preg_match($tel_pattern,$tel)){
		$err .= "•กรุณากรอกเบอร์โทรศัทพ์ตามรูปแบบ (ex.0891234567) \n";
	}
	
	if($err != ""){
			echo "$err";
	}else{
		$update_user = "update customer 
						set cust_email='$id_ch', cust_name='$name' , cust_tel='$tel' ,
							cust_address='$address', cust_birthdate='$b_day' 
						where cust_email='$email'";
		$run_update = mysqli_query($con,$update_user);
		if($run_update){$_SESSION['user']=$id_ch;echo "yes";}else{echo "error";}
	}
	mysqli_close($con);
?>