<?php include("include_header.php"); ?>
<div id="insert">
	<?php include("edit_nav.php"); ?>
	<div id="insert2">
		<h1 style="text-align:center;">Edit Receptionist</h1>
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
		<?php include("db_connect.php");
		$query="select rid, user_name from receptionist order by rid asc";
		$result=mysqli_query($connection,$query);
		while($count=mysqli_fetch_array($result)){
			$rid=$count['rid'];
			$user=$count['user_name'];
			?>
			<fieldset>
				<form action="edit_receptionist1.php" method="post">
					<table>
						<tr>
							<td>Costumer ID:</td>
							<td>
								<select name="rid">
									<option selected> <?php echo "$rid"; ?> </option>
								</select>
							</td>
							<td>User Name:</td>
							<td>
								<select name="user">
									<option selected> <?php echo "$user"; ?> </option>
								</select>
							</td>
							<td>
								<input type="submit" name="edit" value="Edit"></td>
								<td><input type="submit" name="delete" value="delete">
							</td>
						</tr>
					</table>
				</form>
			</fieldset>
			<?php
		}	
			?>
	</div><!--end of div insert2-->
</div><!--end of div insert-->
<?php include('include_footer.php');?>
