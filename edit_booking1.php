<style>
	#room_catagory{
		background: #333;
		background:-webkit-radial-gradient(top,orange 15%,skyblue 85%);
		background:-moz-radial-gradient(top,orange 15%,skyblue 85%);
		background:-o-radial-gradient(top,orange 15%,skyblue 85%);
		width:1080px;
		height:auto;
	}
	#room{
		font-family: cursive;
		position:relative;
		height:400px;
		width:900px;
		background:#ddd;
		margin-bottom: 10px;
		margin-top: 10px;
		border-radius: 30px
	}
	#room h1{
		text-align: center;
		color:brown;
		text-transform: uppercase;
		background:pink;
		border-top-left-radius: 30px;
		border-top-right-radius: 30px;
		font-size: 18px;
	}
	.room_description{
		position:absolute;
		bottom:5px;
		right:10px;
		height:100px;
		width:880px;
		background:#bbb;
		border-radius:20px;
	}
	.room_description p{
		text-align: center;
		text-transform: capitalize;
	}
	.room_pic{
		position:absolute;
		top:40px;
		right:10px;
		height:250px;
		width:600px;
		background:black;
		border-radius:20px;
	}
	.room_detail{
		position:absolute;
		top:40px;
		left:10px;
		height:160px;
		width:250px;
		background:#bbb;
		border-radius:20px;
	}
	.room_detail p{
		text-align: center;
		line-height: 40px;
		color:#666;
	}
	.room_detail p span{
		color:#111;
		font-family: monospace;
		font-size: 18px;
		text-transform: lowercase;}
		.status{
		position:absolute;
		left:10px;
		top:210px;
		height:80px;
		width:200px;
		border-radius: 20px;
		background-color:pink;
		text-align: center;
	}
	.status a:hover{
		color:red;
	}
	.status a{
		font-size:25px;
		color:white;
		text-transform:capitalize;
		text-decoration:none;
		text-shadow:5px 5px 5px green;
	}
</style>
<?php include("db_connect.php"); ?>
<link href="css/main1.css" rel="stylesheet" type="text/css">
<div id="room_catagory">
    <?php include("headerall.php");
    if(isset($_GET['roomnumber'])){
        $room_number=$_GET['roomnumber'];
        $user_name=$_SESSION['c_user_name'];
        $db2="SELECT * FROM customer where user_name='$user_name'";
		$result2=mysqli_query($connection,$db2);
		while($count2=mysqli_fetch_array($result2)){
			$cid=$count2['cid'];
        }
        $db="SELECT * FROM room_booking where costumer_id='$cid'";
		$result=mysqli_query($connection,$db);
		while($count=mysqli_fetch_array($result)){
            $db1="SELECT * FROM rooms where room_number='$room_number'";
            $result1=mysqli_query($connection,$db1);
            while($count1=mysqli_fetch_array($result1)){
                //for getting status from rooms
                ?>
                <fieldset>
                    <form action="edit_booking2.php" method="post">
                        <table>
                            <tr>
                                <td>booking ID</td>
                                <td>
                                    <select name="booking_id">
                                        <option selected><?php echo $count['booking_id']; ?></option>
                                    </select>
                                </td>
                                <td>room number</td>
                                <td>
                                    <select name="room_number">
                                        <option selected><?php echo $count1['room_number']; ?></option>
                                        <option disabled>other available rooms</option>
                                        <?php
                                        $query="SELECT room_number FROM rooms WHERE status='available'";
                                        $result2=mysqli_query($connection,$query);
                                        while($count2=mysqli_fetch_array($result2)){?> 
                                            <option><?php echo $count2['room_number']; ?></option>
                                            <?php
                                        }
                                            ?>
                                    </select>
                                </td>
                                <td>status</td>
                                <td>
                                    <select name="status">
                                        <option selected><?php echo $count1['status']; ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>user_name</td>
                                <td>   
                                    <select name="user_name">
                                        <option selected><?php echo $user_name; ?></option>
                                    </select>
                                </td>
                                <td>in_date</td>
                                <td><input type="date" name="in_date" value="<?php echo $count['in_date']; ?>" required/></td>
                                <td>out_date</td>
                                <td><input type="date" name="out_date" value="<?php echo $count['out_date']; ?>" required/></td>
                            </tr>
                            <tr>
                                <td>adults</td>
                                <td>
                                    <select name="adults" required>
                                        <option selected><?php echo $count['adults']; ?></option>
                                        <?php 	
                                        for($highest=1;$highest<=$count1['room_capacity'];$highest++){
                                        ?>
                                                <option><?php echo $highest; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>childrens</td>
                                <td>
                                    <select name="childrens">
                                        <option selected><?php echo $count['childrens']; ?></option>
                                        <?php 	
                                        for($highest=1;$highest<=$count1['room_capacity'];$highest++){
                                        ?>
                                                <option><?php echo $highest; ?></option>
                                        <?php
                                        }
                                        ?>
                                <td>total</td>
                                <td>
                                    <select name="total">
                                        <option><?php echo $count['totals']; ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Booked Time</td>
                                    <td>
                                    <select name="booked_time">
                                    <option><?php echo $count['booked_time']; ?></option>
                                        </select>
                                </td>
                                <td colspan="2"><input type="submit" name="update" value="update"/></td>
                            </tr>
                        </table>
                    </form>
                </fieldset>
                <?php
            }
        }
    }
    else{
        echo "No room number";
    }
    ?>
    </div><!--end of div room_catagory-->
<?php include("footer.php"); ?>