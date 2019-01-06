<html>
    <head>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </head>
<body style="background-color: grey; opacity: 10%;">
    <div style="z-index: 10000;padding-top: 10%;">
    <center>
    <div style="opacity: 50%; padding: 15px; border: 2px solid white; background-color: #111;">
    <div style="color: #FFF; text-align: left;">
<?php
        //session_start();
        require 'includes/db_connection.php';
        include 'includes/all_headers.php';
        if(isset($_POST['change']))
        {
            $unique=$_POST['unique'];
            $email=$_POST['email'];
            $curr_password = $_POST['curr_password'];
            $password=$_POST['password'];
            $confpassword=$_POST['confpassword'];
            $user_type = $_POST['user_type'];
            if($email=='')
            {
                echo 'Please enter the email';
                exit();
            }
            if($curr_password==' ')
            {
                echo 'Please enter current password';
                exit();
            }
            if($password=='')
            {
                echo  'Please enter the password';
                exit();
            }
            if($confpassword=='')
            {
                echo 'Please enter confirn the password';
                exit();
            }
            if (!($password === $confpassword))
            {
                echo 'Password doesn\'t match';
                exit();
            }
            $check_email_query="select * from `radiologists` WHERE email='$email' and `rad_id`=".$unique;
            $run_query=mysqli_query($dbcon,$check_email_query) or die(mysqli_error($dbcon));
            if(mysqli_num_rows($run_query)<=0)  
            {
                echo 'Email ID or User ID does not Exist!'; 
                exit();  
            }
            else
            {
                $pass = mysqli_fetch_assoc($run_query);
                if($pass['password'] != $curr_password)
                {
                    echo 'Wrong current password! Enter correct current password!';
                    exit(); 
                }
                else
                {
            $update_user="update `radiologists` set `password`='".$password."', `confpassword`='".$confpassword."', `role`='".$user_type."' where email='$email' and `rad_id`=".$unique;
            mysqli_query($dbcon, $update_user) or die(mysqli_error($dbcon));
            {?>
                        
                        <h3>PASSWORD CHANGED</h3>
                        <h4>Name : <?php echo $pass['name']; ?></h4>
                        <h4>ID : <?php echo $unique;?></h4>
                        <h4>User Type : <?php echo $user_type; ?></h4>
                        
            <?php }
                }
            }
        }
        ?>
                        </div>
                            </div>
                            </center>
                    </div>
</body>
</html>