<?php include("header.php");
include("navigation.php"); ?>
<style>
	*{
		margin:0 auto;
		}

	body{
		background:#aaa;
		}
		#event_container{
			background:#fff;
			position:relative;
			opacity:0.6;
			height:auto;
			width:1080px;
		}
		#event_container .about_eventpage h1{
			text-align: center;
			text-transform: capitalize;
		}
	#events{
		background:rgba(433,534,223);
		height:auto;
		width:800px;
		border-bottom-right-radius: 50px;
		border-top-left-radius: 50px;
	}
	#events h1{
		color:black;
		font-size:20px;
		text-align: center;
	}
	#events h1 span{
		font-size: 28px;
		text-transform: uppercase;
	}
	#events table{
		text-transform: capitalize;
		background:black;
		height:auto;
		width:720px;
		color:white;
	}
	#events table td{
		border:1;
		font-size:28px;
		text-align:center;
	}
	#events table span{
		color:white;
		font-weight: bolder;
	}
</style>
<div id="event_container">
	<div class="about_eventpage">
		<h1>Vanja hotel event gallary</h1>
	</div><!--end of div about_eventpage-->
	<?php include("db_connect.php");
	$sql="select * from events order by date asc";
	//echo $sql;
	$rs=mysqli_query($connection,$sql);
	//$count=1;
	while($row=mysqli_fetch_array($rs))
	{
		//$image=$row['image'];
		?>
		<table>
			<tr>
				<td>
					<div id="events">
						<h1> Event Name:<span><?php echo $row['event_name']; ?></span></h1>
						<table border="1" cellpadding="4" width="300">
							<tr><td>	event organizer:<span>	<?php echo $row['organizer']; 	 ?>		</span>	 </td>	</tr>
							<tr><td>	place:			<span>	<?php echo $row['place']; 		 ?>		</span>	 </td>	</tr>
							<?php if($row['room_no']!=''){?>
							<tr><td>	Room Number:	<span>	<?php echo $row['room_no'];		 ?>		</span>	 </td>	</tr>
							<?php }?>
							<tr><td>	Time:			<span>	<?php echo $row['time']; 		 ?>  	</span>	 </td>	</tr>
							<tr><td>	Date:			<span>	<?php echo $row['date'];		 ?>		</span>	 </td>	</tr>
							<?php if($row['ticket']!=''){?>
							<tr><td>	Tickets:		<span>	<?php echo $row['ticket'];		 ?>	   	</span>	 </td>	</tr>
							<?php }?>
							<?php if($row['rate']!=''||$row['rate']!=0){?>
							<tr><td>	Rate:			<span>	<?php echo $row['rate']; 		 ?>		</span>	 </td>	</tr>
							<?php }?>
						</table>
					</div><!--end of div events-->
				</td><br/>
			</tr>
		</table>
		<?php
	}
		?>
</div><!--end of div event container-->
<?php include("footer1.php");?>