<?php //deleting booked user
include("db_connect.php");
if(isset($_GET['roomnumber'])){
    $room_number=$_GET['roomnumber'];
	$db5="DELETE FROM room_booking WHERE room_id='$room_number'";
	$result5=mysqli_query($connection,$db5);
	$db6="UPDATE rooms
	SET status='available' 
	WHERE room_number=$room_number";
	$result6=mysqli_query($connection,$db6);
	if($result5 && $result6){
		$_SESSION['msg']="Room number $room_number is unbooked";
		header('location:edit_booking.php');	
		exit();
	}
	else{
		$_SESSION['msg']="Room number $room_number cannot unbook!!!";
		header('location:edit_booking.php');	
		exit();
	}
}
?>