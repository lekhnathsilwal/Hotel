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
include("auto_unbook.php"); ?>
<div id="insert">
	<?php include("edit_nav.php"); ?>
	<div id="insert2">
		<center><h1>Edit Room</h1></center>	
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
		<?php include("db_connect.php"); 
		$sql="SELECT * FROM room_type";
		$result=mysqli_query($connection,$sql);
		while($row=mysqli_fetch_array($result)){
			?>
			<fieldset>
				<table>
					<form action="edit_editrooms.php" method="post">
						<tr>
							<td>Type id</td>
							<td>
								<select name="type_id">
									<option selected><?php echo $row['type_id']; ?></option>
								</select>
							</td>
							<td>Room Type</td>
							<td>
								<select name="type_name"  style="width:230px;">
									<option selected><?php echo $row['type_name']; ?></option>
								</select>
							</td>
							<td><input type="submit" name="edit" value="Edit"></td>
							<td>
								<input type="submit" name="delete_all_rooms" value="Delete all rooms of this type">
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