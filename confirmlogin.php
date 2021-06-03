<?php include("db_connect.php");
	if(isset($_POST['submit'])){
		$user=$_POST['user_name'];
		$password=md5($_POST['password']);
		$sql = "SELECT user_name,password FROM customer WHERE user_name='$user' and password='$password'";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result)==1){
			while($fetch=mysqli_fetch_array($result)){
				$user=$fetch['user_name'];
			}
			$_SESSION['c_user_name']=$user;
			header('location:index.php');
			exit();
		}
		else{
			$_SESSION['msg']="invalid username or password!!!";
			header('location:userlogin.php');
			exit();
		}
	}
?>