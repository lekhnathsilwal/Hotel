<div id="container">
<style>
#header{position:relative;
	height:100px;
}
#header #home{
	position:absolute;
	right:90px;
	bottom:0px;
	display:block;
	background: brown;
	background:-webkit-linear-gradient(top,skyblue 15%,gray 30%, gray 80%);
	background:-moz-linear-gradient(top,skyblue 15%,gray 30%, gray 80%);
	background:-o-linear-gradient(top,skyblue 15%,gray 30%, gray 80%);

	color:brown;
	text-transform: capitalize;
	text-decoration: none;
	height:30px;
	padding-top: 20px;
	width:100px;
	text-align: center;
	font-size: 18px;
	transition:all 0.5s;
	font-weight: bold;
	border-top-right-radius: 20px;
	border-top-left-radius: 20px;
}
#header #home:hover{
	background: pink;
	height:70px;
	font-size: 24px;
	background:-webkit-linear-gradient(top,red 15%,gray 30%, gray 80%);
	background:-moz-linear-gradient(top,red 15%,gray 30%, gray 80%);
	background:-o-linear-gradient(top,red 15%,gray 30%, gray 80%);
	transition:all 0.5s;
}

</style>

<div id="header">

	<a href="index.php"><img style="margin-top: 80px;" src="images/vanja hotel.png"/></a>
	<a href="index.php" id="home">home</a>           
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
</div><!--end of div header-->


