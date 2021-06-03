<?php include("include_header.php");
include("db_connect.php"); 
?>
<div id="insert">
	<?php include("insert_nav.php"); ?>
	<div id="insert2">
		<h1><center>Insert Customers</center></h1>
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
		<?php
		if(isset($_POST['submit'])){							//fetching variables of the form which travels in url
			$f_name=$_POST['f_name'];
			$m_name=$_POST['m_name'];
			$l_name=$_POST['l_name'];
			$address=$_POST['address'];
			$email=$_POST['email'];
			$contact=$_POST['contact'];
			$gender=$_POST['gender'];
			$country=$_POST['country'];
			$user_name=$_POST['user_name'];
			$password=$_POST['password'];
			$confirm_password= $_POST['confirm_password'];
			if($f_name!=='' && $l_name!=='' && $email!=='' && $confirm_password==$password && $user_name!==''){
				$sql="SELECT * FROM customer";
				$result1=mysqli_query($connection,$sql);
				while($fetch=mysqli_fetch_array($result1)){
					  if($user_name==$fetch['user_name']){
						$_SESSION['msg']="try again with different username";
						header('location:insert_customers.php?errmsg=try again with different username');
						exit();
					}
					if($email==$fetch['email']){
						$_SESSION['msg']="the email is already exist";
						header('location:insert_customers.php?errmsg=the email is already exist');
						exit();
					}
				}
				//insert query of sql
				$query="insert into customer(f_name,m_name,l_name,address,email,contact,gender,country,user_name,password) values
				('$f_name','$m_name','$l_name','$address','$email','$contact','$gender','$country','$user_name','$password')";
				$result=mysqli_query($connection,$query);
				if($result){
					$_SESSION['msg']="Customer $user_name Succesfully Inserted";					
					header('location:insert_customers.php');
					exit();
				}
				else{
					$_SESSION['msg']="Can not insert the customer $user_name";
					header('location:insert_customers.php');
					exit();
				}
			}
			else{
				print "<p> insertion failed<br/>
				some fields are blank...</p><br/>
				OR username matched to others..";
			}
		} 
		?>
		<fieldset>
			<legend>Customer table </legend>
			<form action="insert_customers.php" method="post">
				<table>
					<tr>
						<td><label for="f_name">F_name:</label></td>
						<td><input type="text" name="f_name" placeholder="enter first name" id="f_name" value="" required/></td>
					</tr>
					<tr>
						<td><label for="m_name">M_name:</label></td>
						<td><input type="text" name="m_name" placeholder="enter middle name" id="m_name" value=""/></td>
					</tr>
					<tr>
						<td><label for="l_name">L_name:</label></td>
						<td><input type="text" name="l_name" placeholder="enter last name" id="l_name" value="" required/></td>
					</tr>
					<tr>
						<td><label for="address">Address:</label></td>
						<td><input type="text" name="address" placeholder="enter address" id="address" value="" required/></td>
					</tr>
					<tr>
						<td><label for="email">Email:</label></td>
						<td><input type="email" name="email" placeholder="enter email" id="email" value="" required/></td>
					</tr>
					<tr>
						<td><label for="contact">Contact No:</label></td>
						<td><input type="text" name="contact" placeholder="enter contact number" id="contact" value="" required/></td>
					</tr>
					<tr>
						<td>Gender:<br/></td><td></td>
					</tr>
					<tr>
						<td><input type="radio" id="male" name="gender" value="male" checked/><label for="male">male</label></td>
						<td><input type="radio" id="female" name="gender" value="female"/><label for="female">female</label></td>
					</tr>
					<tr>
						<td><label for="country">Country:</label></td>
						<td>
							<select id="country" name="country" value="" required>
								<option selected disabled>select any</option>
								<option>nepal</option>
								<option>china</option>
								<option>india</option>
								<option>srilanka</option>
								<option>bangladesh</option>
								<option>bhutan</option>
								<option>afganistan</option>
								<option>pakistan</option>
							</select>
						</td>
					+</tr>
					<tr>
						<td><label for="user_name">User_name:</label></td>
						<td><input type="text" name="user_name" placeholder="enter login name" id="user_name" value="" required/></td>
					</tr>
					<tr>
						<td><label for="passwd">Password:</label></td>
						<td><input type="password" name="password" placeholder="enter new password" id="passwd" value="" required/></td>
					</tr>
					<tr>
						<td><label for="confirm_passwd">Confirm Password:</label></td>
						<td><input type="password" name="confirm_password" placeholder="confirm password" id="confirm_passwd" value="" required/></td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="submit" /></td>
					</tr>
				</table>
			</form>
		</fieldset>
	</div><!--end of div insert2-->
</div><!--end of div insert-->
<?php include('include_footer.php');?>