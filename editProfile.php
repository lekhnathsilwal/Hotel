<?php include("header.php"); ?>
<div id="insert">
  <div id="insert2">
    <h1 style="text-align:center;">Edit Profile</h1>
    <?php include("db_connect.php");
        //for editing costumer table to bring value to costumer table
      $user=$_SESSION['c_user_name'];
      $query1="select * from customer where user_name ='$user'";
      $result1=mysqli_query($connection,$query1);
      while($count1=mysqli_fetch_array($result1)){
        ?>
        <fieldset>
        <h3 style="color:red;"><?php echo $msg; ?></h3>
          <form action="editProfile.php" method="post">
            <table>
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
                <td><input type="submit" name="update" value="update" /></td>
              </tr>
            </table>
          </form>
        </fieldset>
        <?php
    }
      // update costumer
    if(isset($_POST['update'])){ 
      $f_name=$_POST['f_name'];
      $m_name=$_POST['m_name'];
      $l_name=$_POST['l_name'];
      $address=$_POST['address'];
      $email=$_POST['email'];
      $contact=$_POST['contact'];
      $gender=$_POST['gender'];
      $country=$_POST['country'];
      $user_name=$_SESSION['c_user_name'];
      $query4="select * from customer where user_name != '$user_name'";
      $result10=mysqli_query($connection,$query4);
      while($fetch=mysqli_fetch_array($result10)){
        // if($user_name==$fetch['user_name']){
        //   $_SESSION['msg']="The user name $user_name already exist try with another name";
        //   header('location:edit_customer.php?errmsg=try again with different username');
        //   exit();
        // }
        if($email==$fetch['email']){
          $_SESSION['msg']="The email $email already exist try with another email";
          header('location:editProfile.php?errmsg=try again with different email');
          exit();
        }
      }
      //updating value to costumer table if c_id is true and fields are not blank
      if($f_name!=='' && $l_name!=='' && $email!=='' && contact!=='' && $gender!=='' && $address!==''){
        $password=md5($pswrd);
          $db11="UPDATE customer
        SET f_name='$f_name', m_name='$m_name', l_name='$l_name', address='$address', email='$email', contact='$contact', gender='$gender', country='$country'
        WHERE user_name='$user_name'";
        $result11=mysqli_query($connection,$db11);
        if($result11){
					$_SESSION['msg']="Dear $f_name your profile is succesfully updated";					
					header('location:profile.php');
					exit();
				}
				else{
					$_SESSION['msg']="Can not update the customer $user_name";
					header('location:editProfile.php');
					exit();
				}
      }
      else{
        echo "some fields are empty check it and try again";
      }
    }
    ?>
  </div><!--end of div insert2-->
</div><!--end of div insert-->
<?php unset($_SESSION['msg']);?>
<?php include('footer.php');?>