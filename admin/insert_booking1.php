<style>
	#room_catagory{
		background: #222;
		width:1080px;
		height:auto;
	}
	#room{
		font-family: cursive;
		position:relative;
		height:400px;
		width:800px;
		background:#ddd;
		margin-bottom: 10px;
		margin-top: 10px;
		margin-left: 290px;
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
	.room_description{
		position:absolute;
		bottom:5px;
		right:10px;
		height:100px;
		width:780px;
		background:#bbb;
		border-radius:20px;
	}
	.room_description p{
		text-align: center;
		text-transform: capitalize;
	}
	.room_pic{
		position:absolute;
		top:40px;
		right:10px;
		height:250px;
		width:550px;
		background:black;
		border-radius:20px;
	}
	.room_detail{
		position:absolute;
		top:40px;
		left:10px;
		height:160px;
		width:200px;
		background:#bbb;
		border-radius:20px;
	}
	.room_detail p{
		text-align: center;
		line-height: 50px;
		color:#666;
	}
	.room_detail p span{
		color:#111;
		font-family: monospace;
		font-size: 18px;
		text-transform: lowercase;}
	.status{
		position:absolute;
		left:10px;
		top:210px;
		height:80px;
		width:200px;
		border-radius: 20px;
		background-color:pink;
		text-align: center;
	}
	.status a:hover{
		color:red;
	}
	.status a{
		font-size:25px;
		color:white;
		text-transform:capitalize;
		text-decoration:none;
		text-shadow:5px 5px 5px green;
	}
</style>
<?php include("db_connect.php"); ?>
<?php 
//code for booking page.checks if time of booked room is exceeded .then making the room available on status
$sql="SELECT room_id,out_date FROM room_booking";
$output=mysqli_query($connection,$sql);
$current_date=date("Y-m-d");
while($fetch=mysqli_fetch_array($output)){
	$out_date=$fetch['out_date'];
	$room_number=$fetch['room_id'];
	if($out_date<$current_date){
		$sql2="UPDATE rooms 
		SET status='available'
		WHERE room_number='$room_number'";
		$output2=mysqli_query($connection,$sql2);
		$sql3="DELETE from room_booking where room_number=$room_number";
        $output3=mysqli_query($connection,$sql3);
	}
}
?>
<?php include("include_header.php");
        include("insert_nav.php");?>
<div id="room_catagory">
    <?php
		if(isset($_GET['typeid'])){
			$typeid=$_GET['typeid'];
		}
	?>
	<?php				
	$query5 = "SELECT * FROM rooms WHERE type_id='$typeid'";
	$result5 = mysqli_query($connection,$query5);
	while($count5=mysqli_fetch_array($result5)){
	?>
		<div id="room">
			<h1><?php echo $count5['room_name']; ?></h1>
			<div class="room_pic">    
				<img src="img/uploaded_images/<?php echo $count5['room_image']; ?>" height="250" width="550"/>
				<style>
					img{
						border-radius: 20px;
					}
				</style>
   			</div><!--end of div room_pic-->
			<div class="room_description">
				<p><?php echo $count5['description']; ?></p>
			</div><!--end of div class room_description-->			
			<div class="room_detail">
				<p>room number:<span><?php echo $count5['room_number']; ?></span></p>	 
				<p>room capacity:<span><?php echo $count5['room_capacity']; ?><span></p>
				<p>price:<span><?php echo $count5['price'];?></span></p>
			</div><!--end of div class room_detail-->
			<div class="status">
				<?php
				if($count5['status']=='available'){
				?>
					<p>status:<a href="insert_booking2.php?roomnumber=<?php echo $count5['room_number']; ?>" ><span><?php echo $count5['status'];  ?></a></span></p>
					<h4 style="position:absolute;right:20px;">Click to reserve</h4>
				<?php 
				}
				else if($count5['status']=='Under maintenance'){ ?> 
					<p>status:<span style="color:red; font-size:14px;"><?php echo $count5['status'];  ?></span></p>
				<?php }
				else{
				?>
					<p>status:<span style="color:red;font-size:25;text-transform:capitalize;"><?php echo $count5['status'];  ?></span></p>
				<?php
				}
				?>
			</div><!--end of div status-->
		</div><!--end of div id room-->
	<?php
	}			
	?>
	<?php include("include_footer.php"); ?>
</div><!--end of div room_catagory-->