<?php include("include_header.php"); ?>
<div id="insert">
	<?php include('edit_nav.php');?>
	<div id="insert2">
		<h1 style="text-align:center;">Edit Administrator</h1>
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
		<?php include("db_connect.php");
		$query="select admin_id, user_name from administrator order by admin_id asc";
		$result=mysqli_query($connection,$query);
		while($count=mysqli_fetch_array($result)){
			$admin_id=$count['admin_id'];
			$admin=$count['user_name'];
			if($admin==$_SESSION['user_name']){
			?>
			<fieldset>
				<form action="edit_administrator1.php" method="post">
					<table>
						<tr>
							<td>admin ID:</td>
							<td>
								<select name="admin_id">
									<option selected> <?php echo "$admin_id"; ?></option>
								</select>
							</td>
							<td>admin Name:</td>
							<td>
								<select name="admin">
									<option selected> <?php echo "$admin"; ?></option>
								</select>
							</td>
							<td><input type="submit" name="edit" value="Edit"></td>
							<td><input type="submit" name="delete" value="delete"></td>
						</tr>
					</table>
				</form>
			</fieldset>
			<?php
            }
		}
			?>
	</div><!--end of div insert2-->
</div><!--end of div insert-->
<?php include('include_footer.php');?>
