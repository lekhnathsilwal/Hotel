<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>index</title>
		<link href="css/forms.css" rel="stylesheet" type="text/css">
		<link href="css/main1.css" rel="stylesheet" type="text/css">
		<link href="css/reservation.css" rel="stylesheet" type="text/css">
	</head>
	<style>
#header{position:relative;
	height:100px;
	background:rgb(15, 14, 17);
	background:-webkit-linear-gradient(top,skyblue 15%,gray 30%, skyblue 80%);
	background:-moz-linear-gradient(top,skyblue 15%,gray 30%, skyblue 80%);
	background:-o-linear-gradient(top,skyblue 15%,gray 30%, skyblue 80%);
}
#header ul{
	position:absolute;
	right:90px;
	bottom:0px;
}
#header ul li{
	display:inline-block;
	background: brown;
	background:-webkit-linear-gradient(top,skyblue 15%,gray 30%, pink 90%);
	background:-moz-linear-gradient(top,skyblue 15%,gray 30%, gray 80%);
	background:-o-linear-gradient(top,skyblue 15%,gray 30%, gray 80%);
	height:30px;
	padding-top: 20px;
	width:130px;
	transition:all 0.5s;
	font-weight: bold;
}
#header ul li a{
	display:block;
	color:brown;
	text-transform: capitalize;
	text-decoration: none;
	text-align: center;
	font-size: 18px;
}
#header ul a{
	color:brown;
	text-transform: capitalize;
	text-decoration: none;
	text-align: center;
	font-size: 18px;
}
#header ul li:hover{
	background: pink;
	height:70px;
	background:-webkit-linear-gradient(top,red 15%,gray 30%, gray 80%);
	background:-moz-linear-gradient(top,red 15%,gray 30%, gray 80%);
	background:-o-linear-gradient(top,red 15%,gray 30%, gray 80%);
	transition:all 0.5s;
	}
		#header img{
			height:100px;
			width:75px;
			margin-top:0px;
			margin-left:20px;
		}
</style>
	<body>
		<div id="container">
			<div id="header">
				<img src="images/Untitled-7.png"/>
				<ul>
					<a href="index.php" ><li style="border-top-left-radius:20px;">home</li></a>
					<a href="edit_booking.php"><li>my reservation</li></a>					
					<a href="events.php"><li>events</li></a>
					<a href="facilities.php"><li style="border-top-right-radius:20px;">facilities</li></a>
				</ul>         
			</div><!--end of div header-->
		</div>