<?php include("include_header.php"); ?>
<div id="insert">
	<?php include("edit_nav.php"); ?>
	<div id="insert2">
		<h1 style="text-align:center;">Edit feedback</h1>
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
		<?php include("db_connect.php");
		$query="select * from contacts";
		$result=mysqli_query($connection,$query);
		while($count=mysqli_fetch_array($result)){
			?>
			<fieldset>
				<form action="edit_feedback1.php" method="post">
					<table>
						<tr>
							<td>Contacts Id:</td><td>
								<select id="contacts_id" name="contacts_id">
									<option selected> <?php echo $count['contacts_id']; ?></option>
								</select></td>
							<td>Name:</td>
							<td>
								<input type="text" name="name" value="<?php echo $count['name']; ?>" required/>
							</td>
						</tr>
						<tr>
							<td>Email:</td>
							<td>
								<input type="email" name="email" value="<?php echo $count['email']; ?>" required/>
							</td>
						</tr>
						<tr>
							<td>Telephone:</td>
							<td>
								<input type="number" name="telephone" value="<?php echo $count['telephone']; ?>"/>
							</td>
						</tr>
						<tr>
							<td>comments:</td>
							<td>
								<textarea name="comments" style="width:200px;height:100px;"/><?php echo $count['comments']; ?></textarea>
							</td>
						</tr>
						<tr>
							<td>date:</td>
							<td>
								<select name="date">
									<option selected disabled>select any to update timestamp </option>
									<option> <?php echo $count['date']; ?></option>
								</select>
							</td>
							<td>
								<input type="submit" name="update" value="update"></td>
							<td><input type="submit" name="delete" value="delete"></td>
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
