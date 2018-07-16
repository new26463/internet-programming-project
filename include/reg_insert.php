<?php	
	include "database.php";
	session_start();
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	$tel = $_POST['tel'];
	$address = $_POST['address'];
	$b_day = $_POST['b_day'];
	
	$err = "";
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$err .= "•กรุณากรอกอีเมล์ใหม่ให้ตัวตามรูปแบบ \n";
	}
	$pass_pattern= "/^[a-zA-Z0-9]{8,20}$/";
	if($pass1 == $pass2){
		if(!preg_match($pass_pattern,$pass1)){
			$err .= "•กรุณากรอกรหัสผ่านต้องประกอบด้วยตัวอักษร a-z หรือ A-Z หรือ 0-9 จำนวน 8-15 ตัว \n";
		}
	}else{
		$err .= "•กรุณากรอกรหัสผ่านให้เหมือนกัน \n";
	}
	$tel_pattern= "/^0[0-9]{9}$/";
	if(!preg_match($tel_pattern,$tel)){
		$err .= "•กรุณากรอกเบอร์โทรศัทพ์ตามรูปแบบ (ex.0891234567) \n";
	}
	
	if($err != ""){
			echo "$err";
	}else{
		$sel_user = "select * from customer ";
		$run = mysqli_query($con,$sel_user);
		$check_email=0;
		while($data_login = mysqli_fetch_array($run)){
			if($data_login['cust_email']==$email){
				$check_email=1;
			}
		}
		if(!$check_email){
			$insert_customer = "insert into customer (cust_email,cust_pass,cust_name,cust_tel,cust_address,cust_birthdate)
								values ('$email','$pass1','$name','$tel','$address','$b_day')";
			$run_insert_customer = mysqli_query($con,$insert_customer);
			if($run_insert_customer){$_SESSION['user']=$email;$_SESSION['status']='customer';echo "yes";}
		}else{
			echo "อีเมล์ซ้ำ";
		}
	}
	mysqli_close($con);
?>