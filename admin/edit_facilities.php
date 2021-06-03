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
		<center><h1>Edit Facilities</h1></center>
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
		<?php include("db_connect.php");
		$randno=rand(999,1111);
		if(isset($_POST['delete'])){
			$facility_id=$_POST['facility_id'];
            $facility_name=$_POST['facility_name'];
            $query1="SELECT facility_image from facilities where facility_id='$facility_id'";
			$file=mysqli_query($connection,$query1);
			while($count=mysqli_fetch_array($file)){
				$file_name=$count['facility_image'];
				$full_file="img/uploaded_images/".$file_name;
				unlink($full_file);	
			}
			$query="DELETE FROM facilities WHERE facility_id=$facility_id";
			$result=mysqli_query($connection,$query);
			if($result){
				$_SESSION['msg']="the facility $facility_name is deleted";					
				header('location:edit_facilities.php');
				exit();
			}
			else{
				$_SESSION['msg']="Can not delete the facility $facility_name";
				header('location:edit_facilities.php');
				exit();
			}
		}
		if(isset($_POST['send'])){
			$facility_id=$_POST['facility_id'];
			$facility_name=$_POST['facility_name'];
			$description=$_POST['description'];
			if(is_uploaded_file($_FILES['image']['tmp_name'])){
				move_uploaded_file($_FILES['image']['tmp_name'], "img/uploaded_images/".$randno.$_FILES['image']['name']);
			}
			$path=$randno.$_FILES['image']['name'];
			if(($_FILES['image']['name'])==''){
				$sql1="UPDATE facilities SET
				facility_name='$facility_name',description='$description'
				WHERE facility_id='$facility_id'";
				$result1=mysqli_query($connection,$sql1);
			}
			else{
				$query="SELECT facility_image from facilities WHERE facility_id='$facility_id'";
				$file=mysqli_query($connection,$query);
				while($count=mysqli_fetch_array($file)){
					$file_name=$count['facility_image'];
					$full_file="img/uploaded_images/".$file_name;
					unlink($full_file);	
				}
				$sql1="UPDATE facilities SET
				facility_name='$facility_name',facility_image='$path',description='$description'
				WHERE facility_id='$facility_id'";
				$result1=mysqli_query($connection,$sql1);
			} 
			if($result1){
				$_SESSION['msg']="facility $facility_name Succesfully updated";					
				header('location:edit_facilities.php');
				exit();
			}
			else{
				$_SESSION['msg']="Can not update the facility $facility_name";
				header('location:edit_facilities.php');
				exit();
			}
		}
		$sql="SELECT * FROM facilities";
		$result=mysqli_query($connection,$sql);
		while($row=mysqli_fetch_array($result)){
			?>
			<fieldset>
				<table>
					<form action="edit_facilities.php" method="post"  enctype="multipart/form-data">
						<tr>
							<td>facility id:</td>
							<td>
								<select name="facility_id" style="width:250px;">
									<option selected><?php echo $row['facility_id']; ?> </option>
								</select>
							</td>
							<td rowspan="5" colspan="3">
								<img src="img/uploaded_images/<?php echo $row['facility_image']; ?>" height="200" width="390"/>
							</td>
						</tr>
                        <tr>
							<td>Facility Name:</td>
							<td>
                                <input type="text" value="<?php echo $row['facility_name']; ?>" name="facility_name" required />
							</td>
						</tr>
						<tr>
							<td>Description:</td>
							<td>
								<textarea name="description" required style="width:250px;height:90px;resize:none;">
								<?php echo $row['description']; ?></textarea>
							</td>
						</tr>
						<tr>
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