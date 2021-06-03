<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>index</title>
		<link href="css/forms.css" rel="stylesheet" type="text/css">
		<link href="css/main1.css" rel="stylesheet" type="text/css">
		<link href="css/reservation.css" rel="stylesheet" type="text/css">		
	</head>
	<?php
		session_start();
		if(isset($_SESSION['msg'])){
			$msg=$_SESSION['msg'];
		}
		else{
			error_reporting(0);
			session_start();
		}
	?>
	<style>
		#header img{
			height:150px;
			width:100px;
			margin-top:45px;
			margin-left:20px;
		}
	</style>
	<body>
		<div id="container">
			<div id="header">
				<a href="index.php"><img src="images/Untitled-7.png"/></a>
				<ol id="sign-up">
                    <?php if(isset($_SESSION['c_user_name'])){
                        echo $_SESSION['c_user_name']
                        ?>
                    <?php }else{ ?>
                        <li>Don't have ID:</li>
                        <a href="signup.php"><li>Sign-up</li></a>
                    <?php } ?>
				</ol>
			</div><!--end of div header-->
		</div>