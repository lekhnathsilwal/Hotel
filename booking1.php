<?php include("db_connect.php");
if(isset($_POST['reserve'])){
	$room_number=$_POST['room_number'];
	$room_capacity=$_POST['room_capacity']; 
	$status=$_POST['status'];
	$in_date=$_POST['in_date'];
	$out_date=$_POST['out_date'];
	$adults=$_POST['adults'];
	$childrens=$_POST['childrens'];
	$user_name=$_POST['user_name'];
	$password=$_POST['password'];
	$totals=$adults+$childrens;
	$current_date=date("Y-m-d");
	$statusquery="SELECT * FROM rooms WHERE room_number='$room_number'";
	$res=mysqli_query($connection,statusquery);
	while($res=mysqli_fetch_array($res)){
		if($res['status']=='booked'){
			$params = http_build_query(array('alreadybooked' => 1, 'roomid' => $room_id), '', '&');
			header( "Location: booking.php?".$params);
			exit(0);
		}
	}
	$sql="SELECT * FROM customer WHERE user_name='$user_name'";
	$result=mysqli_query($connection,$sql);
	while($count=mysqli_fetch_array($result)){
		$username=$count['user_name'];
		$pwd=$count['password'];
	}
	if($user_name=='' && $password==''){
		$params = http_build_query(array('emptylogin' => 1, 'roomnumber' => $room_number), '', '&');
		header( "Location: booking.php?".$params);
	}
	elseif($user_name==''){
		$params = http_build_query(array('emptyuser' => 1, 'roomnumber' => $room_number), '', '&');
		header( "Location: booking.php?".$params);
	}
	elseif($password==''){
		$params = http_build_query(array('emptypassword' => 1, 'roomnumber' => $room_number), '', '&');
		header( "Location: booking.php?".$params);
	}
	elseif($in_date=='' && $out_date==''){
		$params = http_build_query(array('emptydates' => 1, 'roomnumber' => $room_number), '', '&');
		header( "Location: booking.php?".$params);
	}
	elseif($in_date==''){
		$params = http_build_query(array('emptyindate' => 1, 'roomnumber' => $room_number), '', '&');
		header( "Location: booking.php?".$params);
	}
	elseif($out_date==''){
		$params = http_build_query(array('emptyoutdate' => 1, 'roomnumber' => $room_number), '', '&');
		header( "Location: booking.php?".$params);
	}
	elseif($in_date>=$out_date){
		$params = http_build_query(array('indate>outdate' => 1, 'roomnumber' => $room_number), '', '&');
		header( "Location: booking.php?".$params);
	}
	elseif($out_date<=$current_date){
		$params = http_build_query(array('current_date>out_date' => 1, 'roomnumber' => $room_number), '', '&');
		header( "Location: booking.php?".$params);
	}
	elseif($in_date<$current_date){
		$params = http_build_query(array('current_date>in_date' => 1, 'roomnumber' => $room_number), '', '&');
		header( "Location: booking.php?".$params);
	}
	elseif($user_name!==$username || md5($password)!==$pwd){
		$params = http_build_query(array('erroruserpwd' => 1, 'roomnumber' => $room_number), '', '&');
		header( "Location: booking.php?".$params);
	}
	elseif($user_name!=$username){
		$params = http_build_query(array('erroruser' => 1, 'roomnumber' => $room_number), '', '&');
		header( "Location: booking.php?".$params);
	}
	elseif(md5($password)!=$pwd){
		$params = http_build_query(array('errorpassword' => 1, 'roomnumber' => $room_number), '', '&');
		header( "Location: booking.php?".$params);
	}
	elseif($room_capacity<$totals){
		$params = http_build_query(array('room_capacity' => 1, 'roomnumber' => $room_number), '', '&');
		header( "Location: booking.php?".$params);
	}
	elseif($room_number==''){
		$params = http_build_query(array('noroomid' => 1, 'roomnumber' => $room_number), '', '&');
		header( "Location: booking.php?".$params);
	}
	else{
		$sql3="SELECT status FROM rooms WHERE room_number='$room_number'";
		$result3=mysqli_query($connection,$sql3);
		while($count3=mysqli_fetch_array($result3)){
			$stat=$count3['status'];
		}
		if($stat!==$status){
			$params = http_build_query(array('alreadybooked' => 1, 'roomnumber' => $room_number), '', '&');
			header( "Location: booking.php?".$params);
		}
		elseif($user_name==$username && md5($password)==$pwd){
		    $pswrd=md5($password);
			$sql2="SELECT * FROM customer WHERE user_name='$user_name' AND password='$pswrd'";
			$result2=mysqli_query($connection,$sql2);
			while($count2=mysqli_fetch_array($result2)){
				$costumer_id=$count2['cid'];
			}
			$query="INSERT into room_booking(costumer_id,room_id,in_date,out_date,adults,childrens,totals,booked_time)
			VALUES('$costumer_id','$room_number','$in_date','$out_date','$adults','$childrens','$totals',now())";
			$result2=mysqli_query($connection,$query);
			$query1="UPDATE rooms
			SET status='booked' where room_number='$room_number'";
			$result3=mysqli_query($connection,$query1);
			$params = http_build_query(array('booked' => 1, 'roomnumber' => $room_number), '', '&');
			header( "Location: booking.php?".$params);
		}
	}
}
?>