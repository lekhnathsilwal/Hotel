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
<?php include("include_header.php"); 
	include("auto_unbook.php");
?>
<div id="insert">
	<?php include("edit_nav.php"); ?>
	<div id="insert2">
		<center><h1>Edit Room</h1></center>
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
		<?php include("db_connect.php");
		$randno=rand(999,1111);
		if(isset($_POST['delete'])){
			$room_id=$_POST['room_id'];
			$room_name=$_POST['room_name'];
			$query1="SELECT room_image from rooms where room_id='$room_id'";
			$file=mysqli_query($connection,$query);
			while($count=mysqli_fetch_array($file)){
				$file_name=$count['room_image'];
				$full_file="img/uploaded_images/".$file_name;
				unlink($full_file);	
			}
			$query="DELETE FROM rooms WHERE room_id=$room_id";
			$result=mysqli_query($connection,$query);
			if($result){
				$_SESSION['msg']="the room $room_name is deleted";					
				header('location:edit_rooms.php');
				exit();
			}
			else{
				$_SESSION['msg']="Can not delete the room $room_name";
				header('location:edit_rooms.php');
				exit();
			}
		}
		if(isset($_POST['delete_all_rooms'])){
			$type_id=$_POST['type_id'];
			$type_name=$_POST['type_name'];
			$sql2="DELETE FROM rooms WHERE type_id='$type_id'";
			$result2=mysqli_query($connection,$sql2);
			$query="SELECT room_image from rooms WHERE type_id='$type_id'";
			$file=mysqli_query($connection,$query);
			while($count=mysqli_fetch_array($file)){
				$file_name=$count['room_image'];
				$full_file="img/uploaded_images/".$file_name;
				unlink($full_file);	
			}
			if($result2){
				$_SESSION['msg']="All rooms of the type $type_name is deleted";					
				header('location:edit_room_type.php');
				exit();
			}
			else{
				$_SESSION['msg']="Can not delete the rooms of type $type_name";
				header('location:edit_room_type.php');
				exit();
			}
		}
		if(isset($_POST['send'])){
			$room_id=$_POST['room_id'];
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
			if(($_FILES['image']['name'])==''){
				$sql1="UPDATE rooms SET
				room_name='$room_name',room_number='$room_number',description='$description',room_capacity='$room_capacity',price='$price',status='$status' 
				WHERE room_id='$room_id'";
				$result1=mysqli_query($connection,$sql1);
			}
			else{
				$query="SELECT room_image from rooms WHERE room_id='$room_id'";
				$file=mysqli_query($connection,$query);
				while($count=mysqli_fetch_array($file)){
					$file_name=$count['room_image'];
					$full_file="img/uploaded_images/".$file_name;
					unlink($full_file);	
				}
				$sql1="UPDATE rooms SET
				room_name='$room_name',room_number='$room_number',room_image='$path',description='$description',room_capacity='$room_capacity',price='$price',status='$status' 
				WHERE room_id='$room_id'";
				$result1=mysqli_query($connection,$sql1);
			} 
			if($result1){
				$_SESSION['msg']="room $room_name Succesfully updated";					
				header('location:edit_rooms.php');
				exit();
			}
			else{
				$_SESSION['msg']="Can not update the room $room_name";
				header('location:edit_rooms.php');
				exit();
			}
		}
		if(isset($_POST['edit'])){
			$type_id=$_POST['type_id'];
		} 
		$sql="SELECT * FROM rooms where type_id='$type_id'";
		$result=mysqli_query($connection,$sql);
		while($row=mysqli_fetch_array($result)){
			?>
			<fieldset>
				<table>
					<form action="edit_editrooms.php" method="post"  enctype="multipart/form-data">
						<tr>
							<td>room id:</td>
							<td>
								<select name="room_id" style="width:250px;">
									<option selected><?php echo $row['room_id']; ?> </option>
								</select>
							</td>
							<td rowspan="5" colspan="3">
								<img src="img/uploaded_images/<?php echo $row['room_image']; ?>" height="200" width="390"/>
							</td>
						</tr>
						<tr>
							<td>room name:</td>
							<td>
								<input type="text" name="room_name" required value="<?php echo $row['room_name']; ?>" style="width:250px;"/>
							</td>
						</tr>
						<tr>
							<td>room number:</td>
							<td>
								<input type="text" name="room_number" required value="<?php echo $row['room_number']; ?>" style="width:250px;"/>
							</td>
						</tr>
						<tr>
							<td>room capacity:</td>
							<td>
								<input type="number" name="room_capacity" value="<?php echo $row['room_capacity']; ?>" required style="width:250px;"/>
							</td>
						</tr>
						<tr>
							<td>price:</td>
							<td>
								<input type="number" name="price" required value="<?php echo $row['price']; ?>" style="width:250px;"/>
							</td>
						</tr>
						<tr>
							<td>description:</td>
							<td>
								<textarea name="description" required style="width:250px;height:90px;resize:none;">
								<?php echo $row['description']; ?></textarea>
							</td>
						</tr>
						<tr>
							<td>status:</td>
							<td>
								<select name="status" style="width:250px;">
									<option selected><?php echo $row['status']; ?></option>
									<option>Available</option>
									<option>Reserved</option>
									<option>Under maintenance</option>
									<option>Booked</option>
								</select>
							</td>
							<td>image:</td>
							<td>
								<input type="file" name="image" style="width:250px;"/>
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" name="delete" value="Delete"/>
							</td>
							<td>
								<input type="submit" name="send" value="Update"/>
							</td>
						</tr>
					</form>
				</table>
			</fieldset>
			<?php 
		}
			?>
	</div><!--end of div insert2-->
</div><!--end of div insert-->
<?php include('include_footer.php');?>