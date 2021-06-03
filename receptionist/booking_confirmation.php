<?php
include("include_header.php");
include("include_nav.php"); 
if(!isset($_SESSION['r_user_name'])){
    header("location:login.php");
    exit();
} 
include("auto_unbook.php");
?>
<style>
#insert2 {
    width:1075px;
}
</style>
<div id="insert2">
		<h1 style="text-align:center;">View Booking</h1>
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
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
                 ?>
				<fieldset>
					<form action="edit_booking.php" method="post">
						<table>
							<tr>
								<td>Booking ID</td>
								<td>
									<select name="booking_id">
										<option selected><?php echo $count['booking_id']; ?></option>
									</select>
								</td>
								<td>Room Number</td>
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
								<td>In_date</td>
								<td><input type="date" name="in_date" value="<?php echo $count['in_date']; ?>" required/></td>
                                <td rowspan="4" colspan="3">
								    &nbsp;&nbsp;&nbsp;<img src="../admin/img/uploaded_images/<?php echo $count1['room_image']; ?>" height="200" width="390"/>
							    </td>
                            </tr>
							<tr>
								<td>User Name</td>
								<?php $db2="SELECT * FROM customer where cid='$cid'";
								$result2=mysqli_query($connection,$db2);
								while($count2=mysqli_fetch_array($result2)){
									$user_name=$count2['user_name'];
								} ?>
								<td>
									<select name="user_name">
										<option><?php echo $user_name; ?></option>
									</select>
								</td>
                                <td>Status</td>
								<td>
									<select name="status">
										<option selected><?php echo $count1['status']; ?>
									</select>
								</td>
                                <td>Out_date</td>
								<td><input type="date" name="out_date" value="<?php echo $count['out_date']; ?>" required/></td>
                            </tr>
							<tr>
								<td>Adults</td>
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
								<td>Childrens</td>
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
                                <td>Booked Time</td>
								<td>
									<select name="booked_time">
                                        <option><?php echo $count['booked_time'] ?></option>
									</select>
								</td>
							</tr>
							<tr>
                                <td>Total</td>
								<td>
									<select name="total">
										<option><?php echo $count['totals']; ?></option>
									</select>
								</td>
								<td colspan="6"><input type="submit" name="update" value="Update"/>&nbsp;&nbsp;
                                <input type="submit" name="unbook" value="Unbook"/> &nbsp; &nbsp;
									<?php if($count1['status']=="booked"){ ?> <input type="submit" name="confirm" value="Confirm"/> <?php } ?> </td>
                            </tr>
						</table>
					</form>
				</fieldset>
				<?php
			}
		}
				?>
	</div>
<?php include("include_footer.php"); ?>