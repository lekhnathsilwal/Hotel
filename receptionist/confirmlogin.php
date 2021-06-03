<?php
include("db_connect.php");
if(isset($_POST['submit'])){
	$user_name=$_POST['user_name'];
	$user_password=md5($_POST['user_password']);
	$sql = "SELECT user_name,user_password FROM receptionist WHERE user_name='$user_name' and user_password='$user_password'";
	$result = mysqli_query($connection,$sql);
	while($count=mysqli_fetch_array($result)){  		
			 $user=$count['user_name'];
			 $password=$count['user_password'];
	}
	if($user_name==$user && $user_password==$user_password){
		$_SESSION['r_user_name']=$user;
		header('location:index.php');	
		exit();
	}	
	else{		
		$_SESSION['msg']="invalid username and password";
		header('location:login.php?errmsg=try again');
		exit();
	}
}
?>