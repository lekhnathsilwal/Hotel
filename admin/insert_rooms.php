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
	<?php include("insert_nav.php"); ?>
	<div id="insert2">
		<h1><center>insert rooms</center></h1>
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
		<?php include("db_connect.php"); 
		$sql="SELECT * FROM room_type";
		$result=mysqli_query($connection,$sql);
		while($row=mysqli_fetch_array($result)){
		?>
		<fieldset>
			<table>
				<form action="insert_rooms1.php" method="post">
					<tr>
						<td>type_id</td>
						<td>
							<select name="type_id">
								<option selected><?php echo $row['type_id']; ?> </option>
							</select>
						</td>
					</tr>
					<tr>
						<td>room type_name</td>
						<td>
							<select name="type_name">
								<option selected><?php echo $row['type_name']; ?> </option>
							</select>
						</td>
						<td><input type="submit" name="insert" value="insert"/></td>
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