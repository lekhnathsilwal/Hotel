<style>
	#wrap{

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
		height:400px;
		width:780px;
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
		width:760px;
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
		height:190px;
		width:200px;
		background:#bbb;
		border-radius:20px;
	}
	.room_detail p{
		text-align: center;
		line-height: 60px;
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
		top:240px;
		height:50px;
		width:200px;
		border-radius: 20px;
		background-color:pink;
		text-align: center;
	}
</style>
<?php include("include_header.php"); 
 include("insert_nav.php"); 
?>
<div id="wrap">
	<?php include("db_connect.php");
	if(isset($_GET['booked'])){
		$room_number=$_GET['roomnumber'];
		$sql5="SELECT * from rooms WHERE room_number=$room_number";
		$result5=mysqli_query($connection,$sql5);
		$sql6="SELECT * from room_booking WHERE room_id=$room_number";
		$result6=mysqli_query($connection,$sql6);
		while($count6=mysqli_fetch_array($result6)){
			$customer_id=$count6['costumer_id'];
		}
		$sql7="SELECT * from customer WHERE cid=$customer_id";
		$result7=mysqli_query($connection,$sql7);
		while($count7=mysqli_fetch_array($result7)){
			$f_name=$count7['f_name'];
		}
		while($count5=mysqli_fetch_array($result5)){
		?>
			<center>
			<div id="room">
				<h1><?php echo $count5['room_name']; ?></h1>
				<div class="room_pic">
				    <img src="../admin/img/uploaded_images/<?php echo $count5['room_image']; ?>" height="250" width="550"/>
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
					<p>Booked By:<span style="font-size:25;text-transform:capitalize;"><?php echo $f_name; ?><span></p>
					<p>Room number:<span><?php echo $count5['room_number']; ?></span></p>
					<p>Price:<span><?php echo $count5['price'];?></span></p>
				</div><!--end of div class room_detail-->
				<div class="status">
					<p>status:<span style="color:red;font-size:25;text-transform:capitalize;"><?php echo $count5['status'];  ?></span></p>
				</div><!--end of div status-->
			</div><!--end of div id room--></center>
		<?php
		}	
	}
	else if(isset($_GET['roomnumber'])){
		$room_number=$_GET['roomnumber']; 
		$sql="SELECT * FROM rooms where room_number='$room_number'";
		$result=mysqli_query($connection,$sql);
		while($row=mysqli_fetch_array($result)){
			$room_number=$row['room_number'];
			$room_capacity=$row['room_capacity'];
			$price=$row['price'];
			$status=$row['status'];
		}
	?>
	<fieldset style="width:auto;max-width:800px;border:none;">
		<style>
			td{
				height: 40px;
			}
			input[type=text],input[type=password],input[type=number],input[type=date],input[type=submit],select{
				height:30px;
				margin-right:35px;
				margin-left:15px;
			}
		</style>
		<center>
		<table>
			<form action="insert_booking3.php" method="post">
				<tr>
					<select name="room_number" hidden>
						<option selected><?php echo $room_number; ?></option>
					</select>
					<td>room capacity</td>
					<td>
						<select name="room_capacity"  style="width:200px;">
							<option selected><?php echo $room_capacity; ?></option>
						</select>
					</td>
					<td hidden>
						<select name="status"  style="width:200px;">
							<option selected><?php echo $status; ?> </option>
						</select>
					</td>
					<td style="color:red;">
						<?php
						if(isset($_GET['noroomid'])){
							echo "internal error occured.Please go back once and reload once";
						}
						if(isset($_GET['alreadybooked'])){
							echo "sorry the room is already booked";
						}
						?>
					</td>
				</tr>
				<tr>
					<td>In Date:</td>
					<td><input type="date" name="in_date" style="width:200px;"/></td>
					<td>Out Date:</td>
					<td><input type="date" name="out_date" style="width:200px;"/></td>
					<td style="color:red;">
						<?php
						if(isset($_GET['emptyindate'])){
							echo "indate is empty.";
						}
						if(isset($_GET['emptyoutdate'])){
							echo "outdate is empty.";
						}
						if(isset($_GET['emptydates'])){
							echo "date fields are empty.";
						}
						if(isset($_GET['indate>outdate'])){
							echo "outdate is earlier or equal.indate date must me earlier";
						}
						if(isset($_GET['current_date>out_date'])){
							echo "out date cannot be equal or current date.atleast the next day";
						}
						if(isset($_GET['current_date>in_date'])){
							echo "room cannot be reserved before current date";
						}
						?> 
					</td>
				</tr>
				<tr>
					<td>adults</td>
					<td>
						<select name="adults" style="width:200px;">
						<?php
						for($highest=1;$highest<=$room_capacity;$highest++){
						?>
							<option><?php echo $highest;?></option>
						<?php
						}
						?>
						</select>
					<td>childrens</td>
					<td>
						<select name="childrens" style="width:200px;">
							<option selected disabled>select for childrens</option>
							<?php 	
							for($highest=1;$highest<=$room_capacity;$highest++){
								?>
								<option><?php echo $highest; ?></option>
								<?php
							}
								?>
						</select>
					</td>
					<td style="color:red;">
						<?php
						if(isset($_GET['room_capacity'])){
							echo "Total Room capacity is exceeded.";
						}
						?>
					</td>
				</tr>
				<tr>
					<td>username:</td>
					<td><input type="text" name="user_name" style="width:200px;"/></td>
					<td>password:</td>
					<td><input type="password" name="password" style="width:200px;"/></td>
					<td style="color:red;">
						<?php 
						if(isset($_GET['erroruser'])){
							echo "username didn't match";
						}
						if(isset($_GET['errorpassword'])){
							echo "password didn't match";
						}
						if(isset($_GET['erroruserpwd'])){
							echo "username and password didn't match";
						}
						if(isset($_GET['emptypassword'])){
							echo "password field is empty";
						}
						if(isset($_GET['emptyuser'])){
							echo "user field is empty";
						}
						if(isset($_GET['emptylogin'])){
							echo "user and password field empty";
						}
						?>
					</td>
				</tr>
				<tr>
					<td colspan="4"><input type="submit" value="reserve" name="reserve" style="float:right;"/></td>
					<td style="color:green;">
						<?php 
						if(isset($_GET['booked'])){
							echo "room is booked .!!!";
						}
						?>
					</td>
				</tr>
			</form>
		</table>
		</center>
	</fieldset>
	<?php 
	}		
	?>
</div><!--wrap-->