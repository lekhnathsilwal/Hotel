<title>Contact Us</title>
<style>
	#contact_container{
		position:relative;
		width:1080px;
		background:#aaa;
	}
	#contact_container h1{
		background:#000;
		color:#fff;
		text-align: center;
	}
	#contact_container span{
		color:blue;
		font-weight: bold;
		font-size: 18px;
	}
	#contact_container p{
		text-align: center;
		color:green;
	}
	#contact_container fieldset input[type=text],input[type=number],input[type=email]{
		width:300px;
		height:30px;
		text-align: center;
		font-size: 16px;
		border:2px inset #ccc;
	}
	#contact_container fieldset textarea{
		height:170px;
		width:300px;
		text-align: center;
		font-size: 16px;
		resize:none;
		border:2px inset #ccc;
	}
	#contact_container fieldset input[type=submit]{
		width:100px;
		height:30px;
		background:-webkit-radial-gradient(top,#ccc 25%,#666 80%);
		border-radius:14px;
		font-weight: bold;
		color:#444;
		font-size: 16px;
	}
	#contact_container fieldset input[type=submit]:hover{
		color:red;
	}
</style>
<link href="css/main1.css" rel="stylesheet" type="text/css">
<?php include("header1.php"); ?>
<div id="contact_container">
			<h1>Contact Us</h1>
				<p><span>Vanja Hotel</span></br>
				300 Vanja Street, kathmandu, CA 93940<br/>
				Local: 01-373-5700 Fax: 831-373-6921 <br/>
				Email: Reservations@Vanjahotel.com<br/></p>
	<?php include("db_connect.php");
	if(isset($_POST['submit'])){							//fetching variables of the form which travels in url
			$name=$_POST['name'];
			$email=$_POST['email'];
			$telephone=$_POST['telephone'];
			$comments=$_POST['comments'];
			if($name!=='' && $email!=='' && $comments!==''){
				//insert query of sql
				$query="insert into contacts(name,email,telephone,comments,date) values
				('$name','$email','$telephone','$comments',now())";
				$result=mysqli_query($connection,$query);
				if($result){				
					header('location:contact.php?Thanks for your feedback');
					exit();
				}
				else{
					header('location:contact.php?msg=Sorry your feedback is not sent');
					exit();
				}
			}
			else{
				print "<p> insertion failed<br/>
				some fields are blank...</p>";
			}
		}
		?>


								<style>
								fieldset{position:relative;left:-70px;
								width:600px;border: none;}
								</style>
		<fieldset>
			<form method="post" action="contact.php">
		<table>	
		<tr><td>*Name</td> <td><input type="text" name="name" placeholder="enter your name" required/></td></tr>
		<tr><td>*E-mail</td><td><input type="email" name="email" placeholder="enter your email" required/></td></tr>
		<tr><td>Telephone</td><td><input type="number" name="telephone" placeholder="Your Telephone No"/></td></tr>
		<tr><td>Questions/Comments</td><td><textarea name="comments" placeholder="add your comments here" maxlength="300" required></textarea></td></tr>
		 
		<tr><td></td><td><input type="submit" value="post" name="submit"/>
		</table>
		</form>

		</fieldset>

								<style>
								#comment_box{

									position:relative;
									background:#777;
									height:130px;
									border-left: 2px solid #ccc;
									border-right: 2px solid #ccc;
									margin:5px 0px;
								}
								#comment_box h1{
									color: blue;
									background:none;
									font-size: 17px;
									float:left;
									padding-left:25px;
									text-transform: capitalize;
								}
								#comment_box .comments{
									position:absolute;
									top:20px;
									left:120px;
									color:black;
									font-family: sans-serif;
									font-size: 16px;
								}
								#comment_box .date_time{
									position:absolute;
									bottom:0px;
									left:450px;
									font-size: 13px;
									color:white;
								}
								#comment_box h1 a{
									text-decoration: none;
								}


								</style>

	<?php

		$sql="select * from contacts order by date desc";
		$rs=mysqli_query($connection,$sql);
		while($row=mysqli_fetch_array($rs))
		{
			
			?>
		
			
			<div id="comment_box">
				
				
				<h1><a href="#"><?php echo $row['name']; ?>	</a>:</h1>
				<p class="comments">			<?php echo $row['comments']; ?> </p>
				<p class="date_time">			<?php echo $row['date']; ?>		</p>
			</div><!--end of div comment_box-->
			
		<?php }
		?>

</div><!--end of div contact_container-->