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
		<h1><center>insert feedback</center></h1>
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
		<?php include("db_connect.php");
		if(isset($_POST['submit'])){							//fetching variables of the form which travels in url
			$name=$_POST['name'];
			$email=$_POST['email'];
			$telephone=$_POST['telephone'];
			$comments=$_POST['comments'];
			if($name!=='' && $email!=='' && $comments!==''){
				//insert query of sql
				$query="insert into contacts(name,email,telephone,comments,date) values
				('$name','$email','$telephone','$comments',now())";
				$result=mysqli_query($connection,$query);
				if($result){
					$_SESSION['msg']="Thanks for your feedback";					
					header('location:insert_feedback.php');
					exit();
				}
				else{
					$_SESSION['msg']="Sorry your feedback is not sent";
					header('location:insert_feedback.php');
					exit();
				}
			}
			else{
				print "<p> insertion failed<br/>
				some fields are blank...</p>";
			}
		}
		?>
		<style>
			fieldset{position:relative;left:-70px;
			width:600px;border: none;}
		</style>
		<fieldset>
			<form method="post" action="insert_feedback.php">
				<table>	
					<tr>
						<td>*Name</td>
						<td><input type="text" name="name" placeholder="enter your name" required/></td>
					</tr>
					<tr>
						<td>*E-mail</td>
						<td><input type="email" name="email" placeholder="enter your email" required/></td>
					</tr>
					<tr>
						<td>Telephone</td>
						<td><input type="text" name="telephone" placeholder="Your Telephone No"/></td>
					</tr>
					<tr>
						<td>Questions/Comments</td>
						<td>
							<textarea name="comments" placeholder="add your comments here" maxlength="300" required 
								style="height:200px; width:400px;resize:none;">
							</textarea>
						</td>
					</tr>
					<tr>
						<td>Submit</td>
						<td><input type="submit" value="post" name="submit"/></td>
					</tr>
				</table>
			</form>
		</fieldset>
	</div> <!--end of div container-->
</div><!--end of div insert2-->
<?php include("include_footer.php"); ?>
