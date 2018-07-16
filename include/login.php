<?php
	include 'database.php';
	session_start();
		$user_login = $_POST['email'];
		$user_pass = $_POST['password'];
		
		//เข้าสู่ระบบ
		if($user_login != "" && $user_pass != ""){
			$select_login = "select * from customer ";
			$run_select = mysqli_query($con,$select_login);
			$check = 0;
			if($run_select){
				while($data_login = mysqli_fetch_array($run_select)){
					if($data_login['cust_email']==$user_login && $data_login['cust_pass']==$user_pass){
						$_SESSION['user']=$user_login;
						if($data_login['cust_status']== 'admin'){
							$_SESSION['status']=$data_login['cust_status'];
							echo "admin";
						}else {
							$_SESSION['status']=$data_login['cust_status'];
							echo "customer";
						}
						$check = 0;break;
					}else{
						$check = 1;
					}
				}
				if($check == 1){echo "email or password wrong";}
			}
		}
?>
