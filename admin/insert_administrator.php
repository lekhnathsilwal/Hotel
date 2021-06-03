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
		<h1><center>insert administrator</center></h1>
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
s		<?php
		include("db_connect.php");
		if(isset($_POST['submit'])){							//fetching variables of the form which travels in url
			$user_name=$_POST['user_name'];
			$pswrd=$_POST['user_password'];
			$re_password=$_POST['re_password'];
			if($user_name!=='' && $user_password!=='' && $re_password!=='' && $pswrd==$re_password){
			    $password=md5($pswrd);
				$sql="SELECT * FROM administrator";
				$result1=mysqli_query($connection,$sql);
				while($fetch=mysqli_fetch_array($result1)){
					if($user_name==$fetch['user_name']){
						$_SESSION['msg']="Try with another name";
						header('location:insert_administrator.php?errmsg=The user name user name is already exist');
						exit();
					}
				}				
				//insert query of sql
				$query="insert into administrator values('','$user_name','$password')";
				$result=mysqli_query($connection,$query);
				if($result){
					$_SESSION['msg']="User $user_name Succesfully Inserted";					
					header('location:showadmin.php');
					exit();
				}
				else{
					$_SESSION['msg']="Can not insert the user $user_name";
					header('location:insert_administrator.php');
					exit();
				}
			}
			else{
				print "<p> insertion failed<br/>
				some fields are blank...</p>";
			}
		}
				?>
		<div id="container">
			<fieldset>
			    <form id="admin_form" action="insert_administrator.php" method="post">
			        <h1 align="center"><label for="userid">Add New Admin</label></h1>
		            <table>
			        	<tr>
			            	<td id="a"><label for="userName"> User name:</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			            	<td><input type="text"  name="user_name" placeholder="input username" id="userName" required/></td>
			            </tr>
			            <tr>
			            	<td id="a"> <label for="user_password"> Password:</label></td>
			                <td><input type="password"  name="user_password" placeholder="**********"  id="user_password" required/></td>
			            </tr>
						<tr>
			            	<td id="a"> <label for="re_password"> Confirm Password:</label></td>
			                <td><input type="password"  name="re_password" placeholder="**********"  id="re_password" required/></td>
			            </tr>
			            <tr>
			            	<td> <input type="submit"  name="submit" value="submit" /></td>
			            </tr>
		            <table>
		        </form>
            </fieldset>
		</div> <!--end of div container-->
	</div><!--end of div insert2-->
</div>
<?php include("include_footer.php"); ?>