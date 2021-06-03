<div id="nav">
    <ul>
        <li><a href="index.php">home</a></li>
        <li><a href="rooms.php">reservation</a></li>
        <li><a href="facilities.php">facilities</a></li>
        <li><a href="events.php">events</a></li>
        <?php if(isset($_SESSION['c_user_name'])){ ?>
            <li><a href="profile.php">Profile</a></li>
        <?php }?>
        <li><a href="contact.php">contacts</a></li>
    </ul>
    <ol id="signup">
        <?php if(isset($_SESSION['c_user_name'])){ ?>
            <li><a href="logout.php">Log-out</a></li>
        <?php }else{ ?>
            <li><a href="userlogin.php">Log-in</a></li>
        <?php } ?>
    </ol>
</div><!--end of div nav-->
