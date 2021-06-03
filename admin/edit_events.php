<?php include("include_header.php"); ?>
<div id="insert">
<?php include("edit_nav.php"); ?>
	<div id="insert2">
		<h1 style="text-align:center;">Edit events</h1>
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
		<?php include("db_connect.php");
		if(isset($_POST['delete'])){
			$event_id=$_POST['event_id']; 
			$event_name=$_POST['event_name'];
			$sql1="DELETE FROM events WHERE event_id='$event_id'";
			$result1=mysqli_query($connection,$sql1);
			if($result1){
				$_SESSION['msg']="Event $event_name Succesfully Deleted";					
				header('location:edit_events.php');
				exit();
			}
			else{
				$_SESSION['msg']="Can not delete the event $event_name";
				header('location:edit_events.php');
				exit();
			}
		}
		if(isset($_POST['update'])){
			$event_id=$_POST['event_id'];							//fetching variables of the form which travels in url
			$event_name=$_POST['event_name'];
			$organizer=$_POST['organizer'];
			$place=$_POST['place'];
			$room_no=$_POST['room_no'];
			$time=$_POST['time'];
			$date=$_POST['date'];
			$ticket=$_POST['ticket'];
			$rate=$_POST['rate'];
			if($organizer!=='' && $event_name!=='' && $place!=='' && $time!=='' && $date!==''){
				//insert query of sql
				$query3="UPDATE events
				SET event_name='$event_name', organizer='$organizer', place='$place', room_no='$room_no', time='$time', date='$date',
				ticket='$ticket',rate='$rate'
				WHERE event_id='$event_id'";  
				$result3=mysqli_query($connection,$query3);
				if($result3){
					$_SESSION['msg']="Event $event_name Succesfully Updated";					
					header('location:edit_events.php');
					exit();
				}
				else{
					$_SESSION['msg']="Can not update the event $event_name";
					header('location:edit_events.php');
					exit();
				}
			}
			else{
				print "check the empty fields and try again!!!";
			}
		}
		$query="SELECT * FROM events ORDER BY date DESC";
		$result=mysqli_query($connection,$query);
		while($count=mysqli_fetch_array($result)){
			?>
			<fieldset>
			<legend>events</legend>
				<table>
					<form action="edit_events.php" method="post">
						<tr>
							<td>Event Id</td><td>
								<select id="event_id" name="event_id" required>
									<option selected><?php echo $count['event_id']; ?></option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="event_name">Event_name:</label></td>
							<td><input type="text" name="event_name" placeholder="enter event name" id="event_name" value="<?php echo $count['event_name']; ?>" required/></td>
							<td><label for="organizer">Organizer:</label></td>
							<td><input type="text" name="organizer" placeholder="enter organizer name" id="organizer" value="<?php echo $count['organizer']; ?>" required/></td>
						</tr>
						<tr>
								<td><label for="place">Place:</label></td>
							<td><input type="text" name="place" placeholder="enter place name" id="place" value="<?php echo $count['place']; ?>" required/></td>
							<td><label for="room">Room_no:</label></td>
							<td><input type="text" name="room_no" placeholder="enter room-no" id="room" value="<?php echo $count['room_no']; ?>"/></td>
						</tr>
						<tr>
							<td><label for="time">Time:</label></td>
							<td><input type="time" name="time" placeholder="enter time" id="time" value="<?php echo $count['time']; ?>" required/></td>
							<td><label for="date">Date:</label></td>
							<td><input type="date" name="date" placeholder="enter date" id="date" value="<?php echo $count['date']; ?>" required/></td>
						</tr>
						<tr>
							<td><label for="ticket">Ticket status:</label></td>
							<td><input type="text" name="ticket" placeholder="ticket status" id="ticket" value="<?php echo $count['ticket']; ?>"/></td>
							<td><label for="rate">Rate:</label></td>
							<td><input type="number" name="rate" placeholder="enter rate" id="rate" value="<?php echo $count['rate']; ?>"/></td>
							<td><input type="submit" name="update" value="update"/></td>
							<td><input type="submit" name="delete" value="delete"/></td>							
						</tr>
					</table>
				</form>
			</fieldset>
			<?php
		}	
			?>
	</div><!--end of div insert2-->
</div><!--end of div insert-->
<?php include('include_footer.php');?>