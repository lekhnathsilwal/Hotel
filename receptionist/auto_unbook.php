<?php include("db_connect.php");
		$db="SELECT * FROM room_booking";
		$result=mysqli_query($connection,$db);
		while($count=mysqli_fetch_array($result)){
			$cid=$count['costumer_id'];
			$room_number=$count['room_id'];
			$db1="SELECT * FROM rooms where room_number='$room_number'";
			$result1=mysqli_query($connection,$db1);
			while($count1=mysqli_fetch_array($result1)){
                //for getting status from rooms
                if($count1['status']=="booked"){
                    if($count['in_date']==date("Y-m-d")){
                        $date=new DateTime($count['booked_time']);
                    }
                    else{
                        $date=new DateTime($count['in_date']);
                    }
                    $date->modify('+14 hours');
                    $current_date=date("Y-m-d H:i:s");
                    $booking_id=$count['booking_id'];
                    if($current_date>=($date->format("Y-m-d H:i:s"))){
                        $room_number=$count1['room_number'];
	                    $db5="DELETE * FROM room_booking WHERE booking_id=$booking_id";
	                    $result5=mysqli_query($connection,$db5);
	                    $db6="UPDATE rooms
	                    SET status='available'
                        WHERE room_number=$room_number";
                        $result6=mysqli_query($connection,$db6);
                        if($result5 && $result6){
                            $_SESSION['msg']="booking id $booking_id Unbooked Successfully!!!";
                            header('location:booking_confirmation.php');	
                            exit();
                        }
                        else{
                            $_SESSION['msg']="bookingn id $booking_id can not Unbook!!!";
                            header('location:booking_confirmation.php');	
                            exit();
                        }
                    }
                }
            }
        }
        ?>