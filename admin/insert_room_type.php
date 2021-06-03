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
		<h1><center>insert rooms type</center></h1>
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
		<?php include("db_connect.php");
		$randno=rand(999,1111); 
		if(isset($_POST['insert'])){
			$type_name=$_POST['type_name'];
			if($type_name!==''){
				$sql="SELECT * FROM room_type";
				$result1=mysqli_query($connection,$sql);
				while($fetch=mysqli_fetch_array($result1)){
					if($type_name==$fetch['type_name']){
						$_SESSION['msg']="The room type is already inserted";
						header('location:insert_room_type.php?errmsg=The room type is already inserted');
						exit();
					}
				}
				if(is_uploaded_file($_FILES['image']['tmp_name'])){
					move_uploaded_file($_FILES['image']['tmp_name'], "img/uploaded_images/".$randno.$_FILES['image']['name']);
				}
				$path=$randno.$_FILES['image']['name'];
				$sql="INSERT INTO room_type(type_id,type_name,type_image) values('','$type_name','$path')";
				$result=mysqli_query($connection,$sql);
				if($result){
					$_SESSION['msg']="The Room Type $type_name Succesfully Inserted";					
					header('location:insert_room_type.php');
					exit();
				}
				else{
					$_SESSION['msg']="Can not insert the room type $type_name";
					header('location:insert_room_type.php');
					exit();
				}
		  	}
		}
		?>
		<fieldset>
			<table>
				<form action="insert_room_type.php" method="post" enctype="multipart/form-data">
					<tr>
						<td>type_name</td>
						<td><input type="text" name="type_name" required/></td>
						<td>image:</td>
						<td><input type="file" name="image" required style="width:250px;"/></td>
					</tr>
					<tr>
						<td><input type="submit" name="insert" value="insert"/></td>
					</tr>
				</form>
			</table>
		</fieldset>
	</div><!--end of div insert2-->
</div><!--end of div insert-->