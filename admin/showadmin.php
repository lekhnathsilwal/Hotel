<?php include("include_header.php"); ?>
<div id="insert">
    <?php include("customer_nav.php"); ?>
    <div id="insert2">
        <h1 style="text-align:center;">Admins</h1>
        <center><span style="font-size:20"><?php echo $msg;?></span></center>
        <?php include("db_connect.php");
        $query="select * from administrator order by admin_id asc";
        $result=mysqli_query($connection,$query); ?>
        <fieldset>
            <table border="1" style="text-align:center">
                <tr>
                    <th>admin ID</th>
                    <th>User Name</th>
                </tr>
                <?php
                while($count=mysqli_fetch_array($result)){
                    $admin_id=$count['admin_id'];
                    $user_name=$count['user_name'];
                    ?>
                    <tr>
                        <td> <?php echo "$admin_id"; ?> </td>
                        <td> <?php echo "$user_name"; ?> </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </fieldset>
    </div><!--end of div insert2-->
</div><!--end of div insert-->
<?php include('include_footer.php');?>
