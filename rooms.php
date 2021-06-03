<style>
	#room_catagory{
		background: #333;
		background:-webkit-radial-gradient(top,orange 15%,skyblue 85%);
		background:-moz-radial-gradient(top,orange 15%,skyblue 85%);
		background:-o-radial-gradient(top,orange 15%,skyblue 85%);
		width:1080px;
		height:auto;
	}
	#room{
		font-family: cursive;
		position:relative;
		height:460px;
		width:850px;
		background:#ddd;
		margin-bottom: 10px;
		margin-top: 10px;
		border-radius: 30px
	}
	#room h1{
		text-align: center;
		color:brown;
		text-transform: uppercase;
		background:pink;
		border-top-left-radius: 30px;
		border-top-right-radius: 30px;
		font-size: 18px;
	}	
	.room_pic{
		position:absolute;
		top:40px;
		right:25px;
		height:350px;
		width:800px;
		background:black;
		border-radius:20px;
	}
	.viewmore{
		position:absolute;
		right:25px;
		bottom:5px;
		height:60px;
		width:250px;
		border-radius: 20px;
		background-color:#aaa;
	}
	.viewmore a:hover{
		color:red;
	}
	.viewmore a{
		display: block;
		position:absolute;
		left:60px;
		top:5px;
		font-size:22px;
		color:white;
		text-transform:capitalize;
		text-decoration:none;
		text-shadow:5px 5px 5px green;
	}
	.viewmore p{
		position:absolute;
		bottom:5px;
		left:50px;
	}
</style>
<div id="room_catagory">
	<?php include("header1.php");
	include("auto_unbook.php");
	//from signup.php after signup this message is displayed here
	if(isset($_GET['usercreated'])){
		echo "now you can book the rooms";
	}
	include("db_connect.php");
	$query5 = "SELECT * FROM room_type";
	$result5 = mysqli_query($connection,$query5);
	while($count5=mysqli_fetch_array($result5)){
		?>
		<div id="room">
			<h1><?php echo $count5['type_name']; ?></h1>
			<div class="room_pic">
				<img src="admin/img/uploaded_images/<?php echo $count5['type_image']; ?>" height="350" width="800"/>
				<style>
					#room img{
						border-radius: 20px;
					}
				</style>
			</div><!--end of div room_pic-->
			<div class="viewmore">
				<br/><a href="rooms1.php?typeid=<?php echo $count5['type_id']; ?>">
				<?php echo $count5['type_name']; ?></a>
				<p>Click here to reserve</p>
			</div><!--end of div status-->
		</div><!--end of div id room-->
		<?php
	}			
		?>
		<?php include("footer1.php");?>
</div><!--end of div room_catagory--> 