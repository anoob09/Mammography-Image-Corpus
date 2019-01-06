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
            $admin_password=$_POST['admin_password'];
            $admin_id = $_SESSION['rad_id'];
            if($email==='')
            {
                echo 'Please enter the email';
                exit();
            }
            if($admin_password==='')
            {
                echo  'Please enter the admin password';
                exit();
            }
            $admin_pass_query = "select * from `radiologists` where `rad_id` = ".$admin_id;
            $admin_pass_res = mysqli_query($dbcon, $admin_pass_query);
            if(mysqli_num_rows($admin_pass_res)>0)
            {
                $admin_pass = mysqli_fetch_assoc($admin_pass_res);
                if(!($admin_pass['password']===$admin_password))
                {
                    echo 'Admin Password did not match!';
                    exit();
                }
            }
            $check_email_query="select * from `radiologists` WHERE email='$email' and `rad_id`=".$unique;
            $run_query=mysqli_query($dbcon,$check_email_query) or die(mysqli_error($dbcon));
            if(mysqli_num_rows($run_query)<=0)  
            {
                echo 'User ID does not Exist!'; 
                exit();  
            }
            else
            {
                $pass = mysqli_fetch_assoc($run_query);
                if( $_SESSION['role'] === 'it admin' && $pass['role'] === 'scientific admin')
                {
                    echo 'Permission Denied';
                    exit();
                }
                else {
                    $update_user="delete from `radiologists` where email='$email' and `rad_id`=".$unique;
                    mysqli_query($dbcon, $update_user) or die(mysqli_error($dbcon));
                    {?>

                                <h3>USER REMOVED</h3>
                                <h4>Name : <?php echo $pass['name']; ?></h4>
                                <h4>ID : <?php echo $unique;?></h4>
                                <h4>User Type : <?php echo $pass['role'];?></h4>

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