<?php include("headerall.php");
include("db_connect.php");
    if(!isset($_SESSION['c_user_name'])){
        echo $_SESSION['c_user_name'].header("location:index.php");
    }

if (isset($_POST['change'])) {
    $user_name = $_SESSION['c_user_name'];
    $pswrd = $_POST['password'];
    $new_pswrd = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    //updating value to costumer table if c_id is true and fields are not blank
    if ($confirm_password == $new_pswrd && $pswrd !== '' && $new_pswrd !== '' && $confirm_password !== '') {
        $qry = "select * from customer where user_name='$user_name'";
        $db_pswrd = mysqli_query($connection, $qry);
        $chpwd=mysqli_fetch_array($db_pswrd);
        if ($chpwd['password'] == md5($pswrd)) {
            $password = md5($new_pswrd);
            $db11 = "UPDATE customer SET password='$password' WHERE user_name='$user_name'";
            $result11 = mysqli_query($connection, $db11);
            if ($result11) {
                $_SESSION['msg'] = "Password Updated Succesfully";
                header('location:profile.php');
                exit();
            } else {
                $_SESSION['msg'] = "Can not update the password";
                header('location:changePassword.php');
                exit();
            }
        } else {
            $_SESSION['msg'] = "Current Password Doesn't match!!";
            header('location:changePassword.php');
            exit();
        }
    } else {
        $_SESSION['msg'] = "Password Confirmation Doesn't match!!";
            header('location:changePassword.php');
            exit();
    }
}

?>
    <link href="css/forms.css" rel="stylesheet" type="text/css">
    <link href="css/main1.css" rel="stylesheet" type="text/css">
    <style>
        .login{
            position:absolute;
            right:0px;
            height:120px;
            width:400px;
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
            width:70px;
            color:#333;
            background-color:orange;
            background:-webkit-linear-gradient(top,skyblue 7%,white 87%);
            background:-moz-linear-gradient(top,skyblue 7%,white 87%);
            background:-o-linear-gradient(top,skyblue 7%,white 87%);
        }

        .login input[type=submit]:hover{
            color:white;
            background: #666666;
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
        <form action="changePassword.php" method="post">
            <h2><label for="userid">Change Your Password</label></h2>
            <table>
                <tr>
                    <td><label for="password"> Current Password:</label></td><td><input type="password"  name="password" placeholder="**********"  id="password" required/></td>
                </tr>
                <tr>
                    <td><label for="new_password"> New Password:</label></td><td><input type="password"  name="new_password" placeholder="**********"  id="new_password" required/></td>
                </tr>
                <tr>
                    <td><label for="confirm_password"> Confirm Password:</label></td><td><input type="password"  name="confirm_password" placeholder="**********"  id="confirm_password" required/></td>
                </tr>
                <tr>
                    <td><input type="submit"  name="change" value="change" /></td>
                </tr>
            </table>
        </form>
    </div><!--end of div login-->
<?php unset($_SESSION['msg']);?>