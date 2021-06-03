<?php
include("include_header.php");
include("auto_unbook.php");
include("include_nav.php"); 
?>
<div style="height:500px; width:480px;" class="welcome">
<h1 style="color: white; font-size:30px; padding:0px; margin-left:0px; margin-top:250px;"> WELCOME TO VANJA HOTEL </h1>
</div>
<?php
include("include_footer.php");
if(!isset($_SESSION['user_name'])){
  header("location:login.php");
}
else{
  echo $_SESSION['user_name'];
}
?>
