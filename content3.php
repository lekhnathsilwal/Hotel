<div id="content3">
	<script type="text/javascript" src="js/cyclejs/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="js/cyclejs/jquery.cycle.all.js"></script>
	<script>
		$(document).ready(function(){
			$(".slider_main1 img").mouseover(function(){
				$( ".previous1,.next1" ).css('display','block').mouseout(function() {
					$( ".previous1,.next1" ).css('display','none');
				});
			});
			$('#main_slider').cycle({
				fx:'fade',
				next:'.next1',
				prev:'.previous1',
				delay:3000,
				timeout:3000,
			});

		});
	</script>
	<style>
		#content3_slider{
			position: relative;
			height:165px;
			width:365px;
			background:#ccc;
			border: 5px solid #ddd;
			border-radius:20px;

		}
		#main_slider{
			position:relative;
			height:165px;
			width:365px;
			z-index:1;
			background:#aaa;
			border-radius:20px;
		}
		.slider_main1 img{
			height:165px;
			width:365px;
			border-radius:20px;
		}
		.content3_header{
			position:absolute;
			top:0px;
			left:0px;
			height:20px;
			width:365px;
			background:rgba(255,255,255,0.7);
			border-top-right:20px;
			border-top-left:20px;
		}
		.content3_header h1{
			color:rgba(255,55,44,0.6);
			text-transform: capitalize;
			font-size:20px;
		}
		.slider_main1{
			position:relative;
			height:165px;
			width:365px;
			background:#666;
			border-radius:20px;
		}
		.previous1{
			position:absolute;
			top:80px;
			left:0px;
			z-index: 99;
			height:20px;
			width:20px;
			text-align: left;
			display: none;
			color:#111;
		}
		.previous1 h2{
			background-color: #ccc;
			line-height:20px;
		}
		.next1{
			position:absolute;
			top:80px;
			right:0px;
			z-index: 99;
			height:20px;
			width:20px;
			display:none;
			text-align: right;
			color:#111;
		}
		.next1 h2{
			background-color: #ccc;
			line-height:20px;
		}
		.previous1 h2:hover{
			background-color:red;

		}
		.next1 h2:hover{
			background-color: red;

		}
	</style>
	<?php include("db_connect.php");?>
	<div id="content3_slider">
		<div id="main_slider">
			<?php				
			$query5 = "SELECT * FROM room_type";
			$result5 = mysqli_query($connection,$query5);
			while($count5=mysqli_fetch_array($result5)){
			 	?>
				<div class="slider_main1">
					<img src="admin/img/uploaded_images/<?php echo $count5['type_image']; ?>" height="350" width="800"/>
					<div class="content3_header">
						<center><h1><?php echo $count5['type_name']; ?></h1></center>
					</div><!--end of div content3_header-->
				</div><!--end of div slider_main1-->
				<?php
			}
				?>
		</div><!--end of div slider_main-->
		<div class="previous1">
			<h2><</h2>
		</div><!--end of div previous1-->
		<div class="next1">
			<h2>></h2>
		</div><!--end of div next1-->
	</div><!--end of div  content3_slider-->
</div><!--end of div content3-->
