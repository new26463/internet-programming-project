<!-- หัวข้อที่เลือกข้างบน /// -->
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="index.php"><img alt="WhatWatch" src="img/logo/logo1.png" width="125px" height="35px" style="margin-top:-7px;"></a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li <?php echo (strpos($_SERVER['PHP_SELF'], 'gshock.php') !== FALSE) ? 'class="active"' : '' ?>><a href="gshock.php">G-shock</a></li>
			<li <?php echo (strpos($_SERVER['PHP_SELF'], 'babyg.php') !== FALSE) ? 'class="active"' : '' ?>><a href="babyg.php">Baby-G</a></li>
			<li <?php echo (strpos($_SERVER['PHP_SELF'], 'smartwatch.php') !== FALSE) ? 'class="active"' : '' ?>><a href="smartwatch.php">Smartwatch</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<?php
				include "numcart.php";
				if(!$_SESSION){// ยัง ไม่ login
					echo'<li data-toggle="modal" data-target="#signup"><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						 <li data-toggle="modal" data-target="#login"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>';
				}else if($_SESSION){ //login แล้ว
					if($_SESSION['user']== 'admin'){ //เป็น admin
						echo'<li class="dropdown">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> '.$_SESSION['user'].' <span class="caret"></span></a>
								  <ul class="dropdown-menu" role="menu">
									<li><a href="product.php" >Product</a></li>
									<li><a href="member.php" >Member</a></li>
									<li><a href="bill.php">Bill</a></li>
									<li data-toggle="modal" data-target="#add"><a href="#">Add</a></li>
								  </ul>
							</li>';
					}else{ //เป็น customer
						echo'<li data-toggle="modal" data-target="#cart"><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge">'.$num.'</span></a></li>
							 <li class="dropdown">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> '.$_SESSION['user'].' <span class="caret"></span></a>
								  <ul class="dropdown-menu" role="menu">
									<li data-toggle="modal" data-target="#info"><a href="#" >Info</a></li>
									<li data-toggle="modal" data-target="#change"><a href="#" >Change Password</a></li>
									<li ><a href="history.php" >History</a></li>
								  </ul>
							 </li>';
					}
					echo'<li data-toggle="modal" data-target="#logout"><a href="#"><span class="glyphicon glyphicon-log-out""></span> Logout </a></li>';
				}
			?>
		  </ul>
		</div>
	  </div>
	</nav>
