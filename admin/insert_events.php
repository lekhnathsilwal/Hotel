<?php include("include_header.php"); ?>
<div id="insert">
	<?php include("insert_nav.php"); ?>	
	<div id="insert2">
		<h1><center>insert events</center></h1>		
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
		<?php include("db_connect.php");
		if(isset($_POST['submit'])){							//fetching variables of the form which travels in url
			$event_name=$_POST['event_name'];
			$organizer=$_POST['organizer'];
			$place=$_POST['place'];
			$room_no=$_POST['room_no'];
			$time=$_POST['time'];
			$date=$_POST['date'];
			$ticket=$_POST['ticket'];
			$rate=$_POST['rate'];
			if($organizer!=='' && $event_name!=='' && $place!='' && $time!=='' && $date!==''){
				//insert query of sql
				$query="insert into events(event_name,organizer,place,room_no,time,date,ticket,rate) values
				('$event_name','$organizer','$place','$room_no','$time','$date','$ticket','$rate')";
				$result=mysqli_query($connection,$query);
				if($result){
					$_SESSION['msg']="The event  $event_name Succesfully Inserted";					
					header('location:insert_events.php');
					exit();
				}
				else{
					$_SESSION['msg']="Can not insert the event $event_name";
					header('location:insert_events.php');
					exit();
				}
			}
			else{
				print "<p> insertion failed<br/>
				some fields are blank...</p>";
			}
		}
		?>
		<fieldset>
			<legend>Add events</legend>
			<form action="insert_events.php" method="post">
				<table>
					<tr>
						<td><label for="event_name">Event_name:</label></td>
						<td><input type="text" name="event_name" placeholder="enter event name" id="event_name" value="" required/></td>
					</tr>
					<tr>
						<td><label for="organizer">Organizer:</label></td>
						<td><input type="text" name="organizer" placeholder="enter organizer name" id="organizer" value="" required/></td>
					</tr>
					<tr>
						<td><label for="place">Place:</label></td>
						<td><input type="text" name="place" placeholder="enter place name" id="place" value="" required/></td>
					</tr>
					<tr>
					<td><label for="room">Room_no:</label></td>
						<td><input type="text" name="room_no" placeholder="enter room-no" id="room" value=""/></td>
					</tr>
					<tr>
						<td><label for="time">Time:</label></td>
					<td><input type="time" name="time" placeholder="enter time" id="time" value="" required/></td>
					</tr>
					<tr>
						<td><label for="date">Date:</label></td>
						<td><input type="date" name="date" placeholder="enter date" id="date" value="" required/></td>
					</tr>
					<tr>
						<td><label for="ticket">Ticket status:</label></td>
						<td><input type="text" name="ticket" placeholder="ticket status" id="ticket" value=""/></td>
					</tr>
					<tr>
						<td><label for="rate">Rate:</label></td>
						<td><input type="number" name="rate" placeholder="enter rate" id="rate" value="" /></td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="store"/></td>
					</tr>
				</table>
			</form>
		</fieldset>
	</div><!-- end of div insert2-->
</div>
<?php include('include_footer.php');?>
