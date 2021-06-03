<?php include("include_header.php"); ?>
<div id="insert">
	<?php include("customer_nav.php"); ?>
	<div id="insert2">
		<h1 style="text-align:center;">Receptionists</h1>
		<center><span style="font-size:20"><?php echo $msg;?></span></center>
		<?php include("db_connect.php");
		$query="select * from receptionist order by rid asc";
        $result=mysqli_query($connection,$query); ?>
        <fieldset>
            <table border="1" style="text-align:center">
                <tr>
                    <th>Receptionist ID</th>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Gender</th>
                </tr>
            <?php
		    while($count=mysqli_fetch_array($result)){
                $rid=$count['rid'];
                $f_name=$count['f_name'];
				$user_name=$count['user_name'];
				$contact=$count['contact'];
				$address=$count['address'];
				$email=$count['email'];                 
				$gender=$count['gender'];
            ?>
				<tr>
                    <td> <?php echo "$rid"; ?> </td>
                    <td> <?php echo "$f_name"; ?> </td>
                    <td> <?php echo "$user_name"; ?> </td>
                    <td> <?php echo "$contact"; ?> </td>
                    <td> <?php echo "$address"; ?> </td>
                    <td> <?php echo "$email"; ?> </td>
                    <td> <?php echo "$gender"; ?> </td>
				</tr>
			<?php
		}	
			?>
        </table>
	</fieldset>
	</div><!--end of div insert2-->
</div><!--end of div insert-->
<?php include('include_footer.php');?>
