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
        if(isset($_POST['register']))
        {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $confpassword=$_POST['confpassword'];
            $user_type = $_POST['user_type'];
            
            if($name=='')
            {
                echo 'Please enter the name';
                exit();
            }
            if($email=='')
            {
                echo 'Please enter the email';
                exit();
            }
            if($password=='')
            {
                echo 'Please enter the password';
                exit();
            }
            $check_email_query="select * from `radiologists` WHERE email='$email'";
            $run_query=mysqli_query($dbcon,$check_email_query) or die(mysqli_error($dbcon)); 
            if(mysqli_num_rows($run_query)>0)  
            {  
                echo 'Email $email already exist. Please try another one!';  
                exit();  
            }
            elseif($password != $confpassword)
            {
                echo 'Password does not match';
            }
            else
            {
            $insert_user="insert into `radiologists` (name,email,password,confpassword,role) VALUE ('$name','$email','$password','$confpassword','$user_type')";
            if(mysqli_query($dbcon, $insert_user) or die(mysqli_error($dbcon)))
            {?>
                        
                        <h3>USER ADDED</h3>
                        <h4>Name : <?php echo $name; ?></h4>
                        <h4>ID : <?php $sql_query_res = mysqli_query($dbcon, "select * from `radiologists` where `email`='".$email."'") or die(mysqli_error($dbcon));
                                $res = mysqli_fetch_assoc($sql_query_res);
                                echo $res['rad_id'];?></h4>
                        <h4>User Type : <?php echo $user_type; ?></h4>
                        
            <?php }
            else
            {?>
                        <h3 style="color: #FFF;">SERVER ERROR</h3>
            <?php }
            }
        }
        ?>
        </div>                    
        </div>
                            </center>
                    </div>
</body>
</html>