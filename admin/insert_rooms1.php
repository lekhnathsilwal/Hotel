<style>
	#container{
		position:relative;
		height:495px;
		width:775px;
		background:#666;
	} 
	#container fieldset{
		color:#fff;
		position:absolute;
		top:130px;
		left:150px;
	}
</style>
<?php include("include_header.php"); ?>
<div id="insert">
	<?php include("insert_nav.php"); ?>
	<div id="insert2">
		<h1><center>insert rooms</center></h1>
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
		<?php include("db_connect.php");
		if(isset($_POST['insert'])){
			$type_id=$_POST['type_id'];
		}
		$randno=rand(999,1111);
		if(isset($_POST['send'])){
			$type_id=$_POST['type_id'];
			$room_name=$_POST['room_name'];
			$room_number=$_POST['room_number'];
			$description=$_POST['description'];
			$room_capacity=$_POST['room_capacity'];
			$price=$_POST['price'];
			$status=$_POST['status'];
			if(is_uploaded_file($_FILES['image']['tmp_name'])){
				move_uploaded_file($_FILES['image']['tmp_name'], "img/uploaded_images/".$randno.$_FILES['image']['name']);
			}
			$path=$randno.$_FILES['image']['name'];
			$sql="INSERT INTO rooms(room_id,room_name,room_number,description,room_image,room_capacity,price,status,type_id) VALUES
			('','$room_name','$room_number','$description','$path','$room_capacity','$price','$status','$type_id')";
			$result=mysqli_query($connection,$sql);
			if($result){
				$_SESSION['msg']="The Room  $room_name Succesfully Inserted";					
				header('location:insert_rooms.php');
				exit();
			}
			else{
				$_SESSION['msg']="Can not insert the room $room_name";
				header('location:insert_rooms.php');
				exit();
			}
		}
	?>
		<fieldset>
			<table>
				<form action="insert_rooms1.php" method="post"  enctype="multipart/form-data">
					<tr>
						<td>room type id:</td>
						<td>
							<select name="type_id" style="width:250px;">
								<option selected><?php echo $type_id; ?></option>
							</select>
						</td>
						<td>room name:</td>
						<td><input type="text" name="room_name" required style="width:250px;"/></td>
					</tr>
						<td>room capacity:</td>
						<td><input type="number" name="room_capacity" required style="width:250px;"/></td>
						<td>price:</td>
						<td><input type="number" name="price" required style="width:250px;"/></td>
					</tr>
					<tr>
						<td>description:</td>
						<td><textarea name="description" required  style="width:250px;height:90px;resize:none;"></textarea></td>
						<td>image:</td>
						<td><input type="file" name="image" required style="width:250px;"/></td>
					</tr>
					<tr>
						<td>status:</td>
						<td>
							<select name="status" style="width:250px;">
								<option selected>available</option>
								<option>booked</option>
							</select>
						</td>
						<td>room number:</td>
						<td><input type="text" name="room_number" required style="width:250px;"/></td>
					</tr>
						<td><input type="submit" name="send" value="Insert"/></td>
					</tr>
				</form>
			</table>
		</fieldset>
	</div><!--end of div insert2-->
</div><!--end of div insert--> 
<?php include('include_footer.php');?>