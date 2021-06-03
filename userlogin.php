<?php include("headerall.php");
include("db_connect.php"); ?>
<title>login</title>
<?php
  if(isset($_SESSION['c_user_name'])){ ?>
    <?php  echo $_SESSION['c_user_name'].header("location:index.php");
  }
?>
<link href="css/forms.css" rel="stylesheet" type="text/css">
<link href="css/main1.css" rel="stylesheet" type="text/css">
<style>
  .login{
    position:absolute;
    right:0px;
    height:120px;
    width:300px;
    color:white;
    font-weight:bold;
    font-size:20px;
  } 
  .login h2{
    padding:5px;
    width:295px;
    color:black;
    font-size:23px;
    font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
  }
  .login input[type=text]{
    text-align:center;
    background-color:#ccc;
    padding:5px;
    color:black;
    border-radius: 10px;
    font-size:15px;
    background:-webkit-linear-gradient(top,skyblue 7%,white 87%);
    background:-moz-linear-gradient(top,skyblue 7%,white 87%);
    background:-o-linear-gradient(top,skyblue 7%,white 87%);
  }
  .login input[type=password]{
    text-align:center;
    background-color:#ccc;
    padding:5px;
    color:black;
    border-radius: 10px;
    font-size:15px;
    background:-webkit-linear-gradient(top,skyblue 7%,white 87%);
    background:-moz-linear-gradient(top,skyblue 7%,white 87%);
    background:-o-linear-gradient(top,skyblue 7%,white 87%);
  }
  .login input[type=text],input[type=password]:focus{
    outline:none;
  }
  .login input[type=submit]{
    position:absolute; 
    right:10px;
    font-size:15px;
    border-radius: 10px;
    height:25px;
    width:60px;
    color:#333;
    background-color:orange;
    background:-webkit-linear-gradient(top,skyblue 7%,white 87%);
    background:-moz-linear-gradient(top,skyblue 7%,white 87%);
    background:-o-linear-gradient(top,skyblue 7%,white 87%);
  }

  .login input[type=submit]:hover{
    color:white;
  }

  .login{
    position:absolute;
    top:250px;
    left:-50px;
  }
  h3{
    text-align: center;
    text-transform: capitalize;
  }
</style>
  <div class="login">
  <h3 style="color:red;"><?php echo $msg; ?></h3>  
    <form action="confirmlogin.php" method="post">
      <h2><label for="userid">Login For Booking Rooms</label></h2>
      <table>
        <tr>
          <td><label for="user_name"> UserId:</label></td><td><input type="text"  name="user_name" placeholder="input username" id="user_name" required/></td>
        </tr>
        <tr>
          <td><label for="password"> Password:</label></td><td><input type="password"  name="password" placeholder="**********"  id="password" required/></td>
        </tr>
        <tr>
          <td><input type="submit"  name="submit" value="login" /></td>
        </tr>
      </table>
    </form>            
  </div><!--end of div login-->
  <?php unset($_SESSION['msg']);?>