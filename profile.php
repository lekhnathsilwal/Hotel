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
            background: rgb(221,221,221);
            position:relative;
            height:auto;
            width:1080px;
        }
        #event_container .about_eventpage h1{
            text-align: center;
            font-size:25px;
            padding-top: 10px;
        }
        #events{
            background:rgba(43,54,22);
            height:auto;
            width:800px;
            border-bottom-right-radius: 50px;
            border-top-left-radius: 50px;
        }
        #events h1{
            color:black;
            font-size:5px;
            text-align: center;
        }
        #events h1 span{
            font-size: 12px;
        }
        #events table{
            background:rgb(67,67,67);
            height:auto;
            width:720px;
            color:white;
        }
        #events table td{
            border:1;
            font-size:18px;
            text-align:center;
        }
        #events table span{
            color:white;
            font-size:18px;
            font-weight: bolder;
            text-transform:none;
        }
        .edit-profile ol{
            top:30px;
            right:5px;
            list-style:none;
            line-height:40px;
        }
        .edit-profile ol li{
            display: inline-block;
            width: 150px;
            margin-left: 200px;
            background-color: #c1810d;
            border: #ffffff solid 3px;
            margin-bottom: 10px;
            padding-left: 50px;
        }
        .edit-profile ol li a{
            color:white !important;
            font-size: 15px;
            text-decoration: none;
        }
    </style>
    <div id="event_container">
        <div class="about_eventpage">
            <h1>Your Profile</h1>
            <h3 style="color:green; text-align:center;"><?php echo $msg; ?></h3>
        </div><!--end of div about_eventpage-->
        <?php include("db_connect.php");
        $user_name=$_SESSION['c_user_name'];
        $sql="select * from customer where user_name='$user_name'";
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
                            <table border="1" cellpadding="4" width="300">
                                <tr><td>	User Name:			<span>	<?php echo $row['user_name']; 		 ?>		</span>	 </td>	</tr>
                                <tr><td>	First Name:<span>	<?php echo $row['f_name']; 	 ?>		</span>	 </td>	</tr>
                                <tr><td>	Middle Name:			<span>	<?php echo $row['m_name']; 		 ?>		</span>	 </td>	</tr>
                                <tr><td>	Last Name:			<span>	<?php echo $row['l_name']; 		 ?>		</span>	 </td>	</tr>
                                <tr><td>	Email:			<span>	<?php echo $row['email']; 		 ?>		</span>	 </td>	</tr>
                                <tr><td>	Contact:			<span>	<?php echo $row['contact']; 		 ?>		</span>	 </td>	</tr>
                                <tr><td>	Gender:		<span>	<?php echo $row['gender']; 		 ?>		</span>	 </td>	</tr>
                                <tr><td>	Country:			<span>	<?php echo $row['country']; 		 ?>		</span>	 </td>	</tr>
                                <tr><td>	Address:			<span>	<?php echo $row['address']; 		 ?>		</span>	 </td>	</tr>
                            </table>
                        </div><!--end of div events-->
                    </td><br/>
                </tr>
            </table>
            <div class="edit-profile">
                <ol>
                    <li><a type="button" href="changePassword.php">Change Password</a></li>
                    <li><a type="submit" href="editProfile.php">Edit Your Profile</a></li>
                </ol>
            </div>
            <?php
        }
        ?>
    </div><!--end of div event container-->
    <?php unset($_SESSION['msg']);?>
<?php include("footer1.php");?>