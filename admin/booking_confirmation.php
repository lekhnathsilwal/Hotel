<?php include("db_connect.php"); ?>
<?php
if(isset($_POST['update'])){
	$booking_id=$_POST['booking_id'];
	$room_number=$_POST['room_number'];
	$user_name=$_POST['user_name'];
	$in_date=$_POST['in_date'];
	$out_date=$_POST['out_date'];
	$adults=$_POST['adults'];
	$childrens=$_POST['childrens'];
	$total=$adults+$childrens;
	$booked_time=$_POST['booked_time'];
	$db="SELECT * FROM customer where user_name='$user_name'";
	$result=mysqli_query($connection,$db);
	while($count=mysqli_fetch_array($result)){
		$user=$count['user_name'];
		$customer_id=$count['cid'];
	}
	$db1="SELECT room_number,room_capacity,status FROM rooms WHERE room_number='$room_number'";
	$result1=mysqli_query($connection,$db1);
	while($count1=mysqli_fetch_array($result1)){
		$room_no=$count1['room_number'];
		$room_capacity=$count1['room_capacity'];
		$status=$count1['status'];
	}
	if($user_name!=$user){
		$_SESSION['msg']="please enter valid user name";
		header('location:confirmation.php');	
		exit();
	}
	if($room_no!=$room_number){
		$_SESSION['msg']="please enter valid room_number";
		header('location:confirmation.php');	
		exit();
	}
	if($total>$room_capacity){
		$_SESSION['msg']="room cannot be booked for all these people...please reduce some";
		header('location:confirmation.php');	
		exit();
	}
	if($in_date>=$out_date){
		$_SESSION['msg']="your outgoing date is equal or earlier than booking date!!! ";
		header('location:confirmation.php');	
		exit();
	}
	if($user_name=$user && $room_number=$room_no && $total<=$room_capacity && $in_date<=$out_date){
		$db1="UPDATE room_booking
        SET costumer_id='$customer_id',room_id='$room_no', in_date='$in_date', out_date='$out_date',adults='$adults',childrens='$childrens',totals='$total',booked_time='$booked_time'
        WHERE booking_id='$booking_id'";
		$result1=mysqli_query($connection,$db1);
		$query="UPDATE rooms
		SET status='booked' 
		WHERE room_number='$room_number'";
		$result=mysqli_query($connection,$query);
		if($result){
			$_SESSION['msg']="booking id $booking_id updated Successfully!!!";
			header('location:confirmation.php');	
			exit();
		}
	}
}
?>
<?php //deleting booked user
if(isset($_POST['unbook'])){
	$booking_id=$_POST['booking_id'];
	$room_number=$_POST['room_number'];
	$db5="DELETE FROM room_booking WHERE booking_id='$booking_id'";
	$result5=mysqli_query($connection,$db5);
	$db6="UPDATE rooms
	SET status='available'
	WHERE room_number=$room_number";
	$result6=mysqli_query($connection,$db6);
	if($result5 && $result6){
		$_SESSION['msg']="booking id $booking_id Unbooked Successfully!!!";
		header('location:confirmation.php');	
		exit();
	}
	else{
		$_SESSION['msg']="bookingn id $booking_id can not Unbook!!!";
		header('location:confirmation.php');	
		exit();
	}
}
if(isset($_POST['confirm'])){
	if($_POST['status']=="booked"){
		$room_number=$_POST['room_number'];
		$booking_id=$_POST['booking_id'];
		$db6="UPDATE rooms
		SET status='reserved'
		WHERE room_number=$room_number";
		$result6=mysqli_query($connection,$db6);
		if($result6){
			$_SESSION['msg']="booking id $booking_id confirmed Successfully!!!";
			header('location:confirmation.php');	
			exit();
		}
		else{
			$_SESSION['msg']="bookingn id $booking_id can not confirmed!!!";
			header('location:confirmation.php');	
			exit();
		}
	}
}
?>