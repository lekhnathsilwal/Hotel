<?php include("include_header.php"); ?>
<div id="insert">
  <?php include("edit_nav.php"); ?>
  <div id="insert2">
    <h1 style="text-align:center;">Edit feedbacks</h1>
    <center><span style="font-size:20"><?php echo $msg;?></span></center>
    <?php include("db_connect.php");
      // update contacts
    if(isset($_POST['update'])){ 
      $contacts_id=$_POST['contacts_id'];
      $name=$_POST['name'];
      $email=$_POST['email'];
      $telephone=$_POST['telephone'];
      $comments=$_POST['comments'];
      $date=$_POST['date'];
      //updating value to contacts table if fields are true and  not blank
      if($name!=='' || $email!=='' || $comments!==''){
        $db3="UPDATE contacts
        SET name='$name', email='$email',telephone='$telephone',comments='$comments',date=now()
        WHERE contacts_id='$contacts_id'";
        $result3=mysqli_query($connection,$db3);
        if($result3){
          $_SESSION['msg']="feedback updated Succesfully";					
          header('location:edit_feedback.php');
          exit();
        }
        else{
          $_SESSION['msg']="Can not update feedback";
          header('location:edit_feedback.php');
          exit();
        }
      }
      else{
        echo "some fields are empty check it and try again";
        print "some fields may be missing";
        print "may be username is matched to others";
      }
    }
      //delete contacts
    if(isset($_POST['delete'])){                           //fetching variables of the form which travels in url
      $contacts_id=$_POST['contacts_id'];
      $db2="DELETE FROM contacts WHERE contacts_id='$contacts_id'";
      $result2=mysqli_query($connection,$db2);
      if($result2){
				$_SESSION['msg']="Feedback Succesfully Deleted";					
				header('location:edit_feedback.php');
				exit();
			}
			else{
				$_SESSION['msg']="Can not delete the Feedback";
				header('location:edit_feedback.php');
				exit();
			}
    }
    ?>
  </div><!--end of div insert2-->
</div><!--end of div insert-->