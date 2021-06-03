<style>
	#room_catagory{
		background: #222;
		width:1080px;
		height:auto;
	}
	#room{
		font-family: cursive;
		position:relative;
		height:460px;
		width:780px;
		background:#ddd;
		margin-bottom: 10px;
		margin-top: 10px;
		margin-left:290px;
		border-radius: 30px;
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
		width:730px;
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
<?php include("include_header.php");
include("auto_unbook.php"); ?>
<div id="room_catagory">
	<?php include("insert_nav.php");
	//from signup.php after signup this message is displayed here
	include("db_connect.php");
	$query5 = "SELECT * FROM room_type";
	$result5 = mysqli_query($connection,$query5);
	while($count5=mysqli_fetch_array($result5)){
		?>
		<div id="room">
			<h1><?php echo $count5['type_name']; ?></h1>
			<div class="room_pic">
				<img src="../admin/img/uploaded_images/<?php echo $count5['type_image']; ?>" height="350" width="730"/>
				<style>
					img{
						border-radius: 20px;
					}
				</style>
			</div><!--end of div room_pic-->
			<div class="viewmore">
				<br/><a href="insert_booking1.php?typeid=<?php echo $count5['type_id']; ?>">
				<?php echo $count5['type_name']; ?></a>
				<p>click here to reserve</p>
			</div><!--end of div status-->
		</div><!--end of div id room-->
		<?php
	}			
		?>
		<?php include("include_footer.php");?>
</div><!--end of div room_catagory--> 