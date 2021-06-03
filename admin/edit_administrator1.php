<?php include("include_header.php"); ?>
<div id="insert">
  <?php include("edit_nav.php");?>
  <div id="insert2">
    <h1 style="text-align:center;">Change your password</h1>
    <center><span style="font-size:20"><?php echo $msg;?></span></center>
    <?php include("db_connect.php");
    //for editing admin table to bring value to admin table
    if(isset($_POST['edit'])){              //fetching variables of the form which travels in url
      $admin_id=$_POST['admin_id'];
      $admin=$_POST['admin'];
      $query1="select * from administrator where admin_id='$admin_id' and user_name='$admin'";
      $result1=mysqli_query($connection,$query1);
      while($count1=mysqli_fetch_array($result1)){
        ?>
        <fieldset>
          <form action="edit_administrator1.php" method="post">
            <table>
              <tr>
                <td><input hidden type="number" name="admin_id" id="admin_id" value="<?php echo $count1['admin_id']; ?>" required/></td>
              </tr>
              <tr>
                <td><label for="user_name">User Name:</label></td>
                <td><input type="text" name="user_name" id="user_name" value="<?php echo $count1['user_name']; ?>" required/></td>
              </tr>
              <tr>
                <td><label for="user_passwd">Password:</label></td>
                <td><input type="password" name="user_password" id="user_passwd" required/></td>
              </tr>
              <tr>
                <td><label for="confirm_passwd">Confirm_Password:</label></td>
                <td><input type="password" name="confirm_password" id="confirm_passwd" required/></td>
              </tr>
              <tr>
                <td><input type="submit" name="update" value="update" /></td>
              </tr>
            </table>
          </form>
        </fieldset>
        <?php
      }
    }
    // update admin
    if(isset($_POST['update'])){ 
      $admin_id=$_POST['admin_id'];         //fetching variables of the form which travels in url
      $user_name=$_POST['user_name'];
      $pswrd= $_POST['user_password'];
      $confirm_password= $_POST['confirm_password'];      
      //first checking admin_id if edited because it is primary key
      $query4="select * from administrator where admin_id != $admin_id";
      $result10=mysqli_query($connection,$query4);
      while($fetch=mysqli_fetch_array($result10)){
        if($user_name==$fetch['user_name']){
        $_SESSION['msg']="The user name $user_name is already exist try with diffrent user name";
        header('location:edit_administrator.php?errmsg=try again with different username');
        exit();
        }
      }
      //updating value to administrator table if admin_id is true and fields are not blank
      if($user_name!==''&& $user_password!=='' && $pswrd==$confirm_password){
          $password=md5($pswrd);
        $db11="UPDATE administrator
        SET user_name='$user_name',user_password='$password'
        WHERE admin_id='$admin_id'";
        $result11=mysqli_query($connection,$db11);
        if($result11){
					$_SESSION['msg']="admin $user_name Succesfully updated";					
					header('location:edit_administrator.php');
					exit();
				}
				else{
					$_SESSION['msg']="Can not update the admin $user_name";
					header('location:edit_administrator.php');
					exit();
				}
      }
      else{       
        print "some fields may be missing";
        print "may be username is matched to others";
      }
    }
    //deleting admin
    if(isset($_POST['delete'])){                           //fetching variables of the form which travels in url
      $admin_id=$_POST['admin_id'];
      $admin=$_POST['admin'];
      $db="DELETE FROM administrator WHERE admin_id='$admin_id' and user_name='$admin'";
      $result3=mysqli_query($connection,$db);
      if($result3){
        $_SESSION['msg']="admin $admin Succesfully deleted";					
        header('location:edit_administrator.php');
        exit();
      }
      else{
        $_SESSION['msg']="Can not delete the admin $admin";
        header('location:edit_administrator.php');
        exit();
      }
    }
    ?>
  </div><!--end of div insert2-->
</div><!--end of div insert-->
<?php include('include_footer.php');?>