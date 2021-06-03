<?php include("include_header.php"); ?>
<div id="insert">
  <?php include("edit_nav.php"); ?>
  <div id="insert2">
    <h1 style="text-align:center;">Edit Receptionist</h1>
    <?php include("db_connect.php");
        //for editing costumer table to bring value to costumer table
    if(isset($_POST['edit'])){              //fetching variables of the form which travels in url
      $rid=$_POST['rid'];
      $user=$_POST['user'];
      $query1="select * from receptionist where rid='$rid' and user_name='$user'";
      $result1=mysqli_query($connection,$query1);
      while($count1=mysqli_fetch_array($result1)){
        ?>
        <fieldset>
          <form action="edit_receptionist1.php" method="post">
            <table>
              <tr>
                <td><input hidden type="number" name="rid" id="rid" value="<?php echo $count1['rid']; ?>" required/></td>
              </tr>
              <tr>
                <td><label for="f_name">F_name:</label></td>
                <td><input type="text" name="f_name" id="f_name" value="<?php echo $count1['f_name']; ?>" required/></td>
              </tr>
              <tr>
                <td><label for="m_name">M_name:</label></td>
                <td><input type="text" name="m_name" placeholder="enter last name" id="m_name" value="<?php echo $count1['m_name']; ?>"/></td>
              </tr>
              <tr>
                <td><label for="l_name">L_name:</label></td>
                <td><input type="text" name="l_name" placeholder="enter last name" id="l_name" value="<?php echo $count1['l_name']; ?>" required/></td>
              </tr>
              <tr>
                <td><label for="address">Address:</label></td>
                <td><input type="text" name="address" id="address" value="<?php echo $count1['address']; ?>" required/></td>
              </tr>
              <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="text" name="email" id="email" value="<?php echo $count1['email']; ?>" required/></td>
              </tr>
              <tr>
                <td><label for="contact">Contact No:</label></td>
                <td><input type="text" name="contact" id="contact" value="<?php echo $count1['contact']; ?>" required/></td>
              </tr>
              <tr>
                <td>Gender:<br/></td>
              </tr>
              <tr>
                <?php
                if ($fetch['gender'] = male){
                  echo "<td><input type='radio' name='gender' value='male' id='sex' checked> Male <input type='radio' name='gender' value='female' id='sex'> Female </td>";
                }
                else{
                  echo "<td><input type='radio' name='gender' value='male' id='sex'> Male <input type='radio' name='gender' value='female' id='sex' checked> Female </td>";
                }
                ?>
              </tr>
              <tr>
                <td><label for="country">Country:</label></td>
                <td>
                  <select id="country" name="country" required>
                    <option selected><?php echo $count1['country']; ?></option>
                    <option>nepal</option>
                    <option>china</option>
                    <option>india</option>
                    <option>srilanka</option>
                    <option>bangladesh</option>
                    <option>bhutan</option>
                    <option>afganistan</option>
                    <option>pakistan</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td><label for="user_name">User_name:</label></td>
                <td><input type="text" name="user_name" id="user_name" value="<?php echo $count1['user_name']; ?>" required/></td>
              </tr>
              <tr>
                <td><label for="passwd">New Password:</label></td>
                <td><input type="password" name="password"  id="passwd" required/></td>
              </tr>
              <tr>
                <td><label for="confirm_passwd">Confirm Password:</label></td>
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
      // update costumer
    if(isset($_POST['update'])){ 
      $rid=$_POST['rid'];         //fetching variables of the form which travels in url
      $f_name=$_POST['f_name'];
      $m_name=$_POST['m_name'];
      $l_name=$_POST['l_name'];
      $address=$_POST['address'];
      $email=$_POST['email'];
      $contact=$_POST['contact'];
      $gender=$_POST['gender'];
      $country=$_POST['country'];
      $user_name=$_POST['user_name'];
      $pswrd=$_POST['password'];
      $confirm_password= $_POST['confirm_password'];
      //first checking c_id if edited because it is primary key
      $query4="select * from receptionist where rid != $rid";
      $result10=mysqli_query($connection,$query4);
      while($fetch=mysqli_fetch_array($result10)){
        if($user_name==$fetch['user_name']){
          $_SESSION['msg']="The user name $user_name already exist try with another name";
          header('location:edit_receptionist.php?errmsg=try again with different username');
          exit();
        }
        if($email==$fetch['email']){
          $_SESSION['msg']="The user name $email already exist try with another name";
          header('location:edit_receptionist.php?errmsg=try again with different email');
          exit();
        }
      }
      //updating value to costumer table if c_id is true and fields are not blank
      if($f_name!=='' && $l_name!=='' && $email!=='' && contact!=='' && $gender!=='' && $confirm_password==$pswrd && $pswrd!=='' && $user_name!=='' && $address!==''){
        $password=md5($pswrd);
        $db11="UPDATE receptionist
        SET f_name='$f_name', m_name='$m_name', l_name='$l_name', address='$address', email='$email', contact='$contact', gender='$gender', country='$country',user_name='$user_name',user_password='$password'
        WHERE rid='$rid'";
        $result11=mysqli_query($connection,$db11);
        if($result11){
					$_SESSION['msg']="receptionist $user_name Succesfully updated";					
					header('location:edit_receptionist.php');
					exit();
				}
				else{
					$_SESSION['msg']="Can not update the receptionist $user_name";
					header('location:edit_receptionist.php');
					exit();
				}
      }
      else{
        echo "some fields are empty check it and try again";
        print "some fields may be missing";
        print "may be username is matched to others";
      }
    }
    //delete costumer
    if(isset($_POST['delete'])){                           //fetching variables of the form which travels in url
      $rid=$_POST['rid'];
      $user=$_POST['user'];
      $db="DELETE FROM receptionist WHERE rid='$rid' and user_name='$user'";
      $result3=mysqli_query($connection,$db);
      if($result3){
        $_SESSION['msg']="Receptionist $user_name Succesfully deleted";					
        header('location:edit_receptionist.php');
        exit();
      }
      else{
        $_SESSION['msg']="Can not delete the receptionist $user_name";
        header('location:edit_receptionist.php');
        exit();
      }
    }
    ?>
  </div><!--end of div insert2-->
</div><!--end of div insert-->
<?php include('include_footer.php');?>