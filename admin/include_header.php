<html>
	<head><title>Admin</title>
		<link href="css/dsgn.css" rel="stylesheet" type="text/css"/>
		<title>Administration</title>
	</head>
	<body>
		<div id="wrapper">
		<div id="header">
			<h1>Administrator pannel</h1>
		</div><!--end of div admin header-->
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