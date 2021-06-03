<div id="sliding_banner">
	<script type="text/javascript" src="js/cyclejs/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="js/cyclejs/jquery.cycle.all.js"></script>
	<script>
		$(document).ready(function(){
			$('#slider').cycle({
				fx:'fade',
				next:'.next',
				prev:'.previous',
				delay:1000,
				timeout:1000,
				pager:'.pager'
			});
			$('#slider_container').on('mouseover',function(){
				$('.next').addClass('disp');
				$('.previous').addClass('disp');
			})
			$('#slider_container').on('mouseout',function(){
				$('.next').removeClass('disp');
				$('.previous').removeClass('disp');
			})
		});
	</script>
	<style>
		#slider_container{
			position: relative;
			height:505px;
			width:1070px;
			background:#ccc;
			border: 5px solid #ddd;

		}
		#slider{
			position:relative;
			height:505px;
			width:1070px;
			z-index:1;
			background:#aaa;
		}
		.slider1 img{
			height:400px;
			width:1070px;
		}
		.info{
			position:absolute;
			bottom:-225px;
			height:85px;
			width:1070px;
			background-color: red;
			background:rgba(255,255,255,0.3);
			color:black;
			
		}
		.info h1{
			position:absolute;
			top:-400px;
			left:0px;
			height:40px;
			width:1070px;
			background:rgba(255,255,255,0.7);
			color:rgba(255,55,44,0.6);
			text-transform: capitalize;
		}
		.info p{
			position:absolute;
			top:0px;
			font-size: 20px;
			padding:10px 10px 10px 10px;
		}
		.slider1{
			position:relative;
			height:260px;
			width:1070px;
			background:#666;
		}
		.previous{
			position:absolute;
			top:170px;
			left:0px;
			z-index: 99;
			height:60px;
			width:30px;
			text-align: left;
			display: none;
		}
		.previous h2{
			background-color: #ccc;
			line-height:60px;
		}
		.next{
			position:absolute;
			top:170px;
			right:0px;
			z-index: 99;
			height:60px;
			width:30px;
			display:none;
			text-align: right;
		}
		.disp{
			display: inline-block;

		}
		.next h2{
			background-color: #ccc;
			line-height:60px;
		}
		.previous h2:hover{
			background-color:red;

		}
		.next h2:hover{
			background-color: red;

		}
		.pager{
			position:absolute;
			bottom:0px;
			z-index: 100;
			height:20px;
			width:1070px;
			background: green;
			text-align: center;
		}
		.pager a{
				margin:2px 0 0 5px;
				display:inline-block;
				color:transparent;
				border:2px solid white;
				height:10px;
				width:10px;
				border-radius:20px;
		}
		.pager a.activeSlide{
			background-color:white;
		}
	</style>
	<?php include("db_connect.php"); ?>
	<div id="slider_container">
		<div id="slider">
			<?php				
			$query5 = "SELECT * FROM facilities";
			$result5 = mysqli_query($connection,$query5);
			while($count5=mysqli_fetch_array($result5)){
				?>
				<div class="slider1">
                <img src="admin/img/uploaded_images/<?php echo $count5['facility_image']; ?>"/>
					<div class="info">
						<center><h1><?php echo $count5['facility_name']; ?></h1></center>
						<p class="description"><?php echo $count5['description']; ?></p>
					</div><!--end of div info-->
				</div><!--end of div slider1-->
				<?php
			}
				?>
		</div><!--end of div slider-->
		<div class="previous">
			<h2><</h2>
		</div><!--end of div previous-->
		<div class="next">
			<h2>></h2>
		</div><!--end of div next-->
		<div class="pager">
		</div><!--end of div pager-->
	</div><!--end of div slider_container-->
</div><!--end of div sliding_banner-->