<?php session_start();?>
<html><!DOCTYPE html>
<html>
<head>
	<?php require'include/head.php'; ?>
	<script type="text/javascript" src="event.js"></script><!--event การกดไป pop up ทั้งหมด/// -->
</head>

<body>
	<?php require'include/nav_index.php'; ?> <!--include ช่องที่กดต่างๆ /// -->
	<?php require'include/popup_login.php';?> <!--include ป๊อบอัพกล่อง login /// -->
	<?php require'include/popup_signup.php';?> <!--include ป๊อบอัพกล่อง signup /// -->
	<?php require'include/popup_info.php';?> <!--include ป๊อบอัพกล่อง info /// -->
	<?php require'include/popup_logout.php';?> <!--include ป๊อบอัพกล่อง logout /// -->
	<?php require'admin/popup_additem.php';?> <!--include ป๊อบอัพกล่อง additem /// -->
	<?php require'admin/all_member.php';?> <!--include body/// -->

</body>

</html>