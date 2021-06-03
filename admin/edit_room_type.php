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
	<?php include("edit_nav.php"); ?>	
	<div id="insert2">
		<center><h1>room type</h1></center>
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
		<?php include("db_connect.php");
		$randno=rand(999,1111);
		if(isset($_POST['update'])){
			$type_id=$_POST['type_id'];
			$type_name=$_POST['type_name'];
			if(is_uploaded_file($_FILES['image']['tmp_name'])){
				move_uploaded_file($_FILES['image']['tmp_name'], "img/uploaded_images/".$randno.$_FILES['image']['name']);
			}
			$path=$randno.$_FILES['image']['name'];
			if(($_FILES['image']['name'])==''){
				$sql="UPDATE room_type SET
				type_name='$type_name'
				WHERE type_id='$type_id'";
				$result=mysqli_query($connection,$sql);
				if($result){
					$_SESSION['msg']="Room type succesfully updated";					
					header('location:edit_room_type.php');
					exit();
				}
				else{
					$_SESSION['msg']="Can not update";
					header('location:edit_room_type.php');
					exit();
				}
			}
			else{
				$query="SELECT type_image from room_type WHERE type_id='$type_id'";
				$file=mysqli_query($connection,$query);
				while($count=mysqli_fetch_array($file)){
					$file_name=$count['type_image'];
					$full_file="img/uploaded_images/".$file_name;
					unlink($full_file);
				}
				$sql="UPDATE room_type SET
				type_name='$type_name',type_image='$path'
				WHERE type_id='$type_id'";
				$result=mysqli_query($connection,$sql);
				if($result){
					$_SESSION['msg']="Room type succesfully updated";					
					header('location:edit_room_type.php');
					exit();
				}
				else{
					$_SESSION['msg']="Can not update the room type";
					header('location:edit_room_type.php');
					exit();
				}
			}
		}
		if(isset($_POST['delete'])){
			$type_id=$_POST['type_id'];
			$query="SELECT room_image FROM rooms WHERE type_id='$type_id'";
			$file=mysqli_query($connection,$query);
			while($count=mysqli_fetch_array($file)){
				$file_name=$count['room_image'];
				$full_file="img/uploaded_images/".$file_name;
				unlink($full_file);
			}
			$sql2="DELETE FROM rooms WHERE type_id='$type_id'";
			$result2=mysqli_query($connection,$sql2);
			$query="SELECT type_image from room_type WHERE type_id='$type_id'";
			$file=mysqli_query($connection,$query);
			while($count=mysqli_fetch_array($file)){
				$file_name=$count['type_image'];
				$full_file="img/uploaded_images/".$file_name;
				unlink($full_file);	
			}	
			$sql1="DELETE FROM room_type WHERE type_id='$type_id'";
			$result1=mysqli_query($connection,$sql1);
			if($result1){
				$_SESSION['msg']="Room type is succesfully deleted";					
				header('location:edit_room_type.php');
				exit();
			}
			else{
				$_SESSION['msg']="Can not delete the room type";
				header('location:edit_room_type.php');
				exit();
			}
		}
		$sql="SELECT * FROM room_type";
		$result=mysqli_query($connection,$sql);
		while($row=mysqli_fetch_array($result)){
			?>
			<fieldset>
				<table>
					<form action="edit_room_type.php" method="post" enctype="multipart/form-data">
						<tr>
							<td rowspan="4" colspan="3">
								<img src="img/uploaded_images/<?php echo $row['type_image']; ?>" height="200" width="300"/>
							</td>
						</tr>
						<tr>
							<td>type_id</td>
							<td>
								<select name="type_id">
									<option selected><?php echo $row['type_id']; ?></option>
								</select>
							</td>
						</tr>
						<tr>
							<td>room type</td>
							<td><input type="text" name="type_name" value="<?php echo $row['type_name']; ?>"/></td></tr>
							<td>image:</td>
							<td><input type="file" name="image" style="width:250px;"/></td>
							<td><input type="submit" name="update" value="update"/></td>
							<td><input type="submit" name="delete" value="delete"/></td>
						</tr>
					</form>
				</table>
			</fieldset>
			<?php 
		}
			?>
	</div><!--end of div insert2-->
</div><!--end of div insert-->\
<?php include('include_footer.php');