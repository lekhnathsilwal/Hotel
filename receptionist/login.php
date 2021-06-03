<?php include("include_header.php"); ?>
<style>
	#container{
		height:310px;
	}
	</style>
<div id="container">
	<h1 style="color:red;position:absolute;top:-20px;left:270px;"><?php echo $msg; ?></h1> 
	<fieldset>
		<form action="confirmlogin.php" method="post">
			<h1 align="center"><label for="userid">Receptionist Login</label></h1>
			<table>
				<tr>
					<td id="a"><label for="userName"> User Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text"  name="user_name" placeholder="input username" id="userName" required/></td>
				</tr>
				<tr>
					<td id="a"> <label for="password"> Password:</label></td>
					<td><input type="password"  name="user_password" placeholder="**********"  id="password" required/></td>
				</tr>
				<tr>
					<td> <input type="submit"  name="submit" value="login" /></td>
				</tr>
			</table>
		</form>
    </fieldset>
</div> <!--end of div container-->  
<?php include("include_footer.php"); ?>
