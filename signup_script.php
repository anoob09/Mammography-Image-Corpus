<?php
        //session_start();
        require 'includes/db_connection.php';
        if(isset($_POST['register']))
        {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $confpassword=$_POST['confpassword'];
            
            if($name=='')
            {
                echo"<script>alert('Please enter the name')</script>";
                exit();
            }
            if($email=='')
            {
                echo"<script>alert('Please enter the email')</script>";
                exit();
            }
            if($password=='')
            {
                echo"<script>alert('Please enter the password')</script>";
                exit();
            }
            $check_email_query="select * from user WHERE email='$email'";
            $run_query=mysqli_query($dbcon,$check_email_query) or die(mysqli_error($dbcon)); 
            if(mysqli_num_rows($run_query)>0)  
            {  
                echo "<script>alert('Email $email already exist. Please try another one!')</script>";  
                exit();  
            }
            elseif($password != $confpassword)
            {
                echo "<script>alert('Password doesn't match)</script>";
            }
            else
            {
            $insert_user="insert into user (name,email,password,confpassword) VALUE ('$name','$email','$password','$confpassword')";
            if(mysqli_query($dbcon, $insert_user))
            {
                $_SESSION['email']=$email;
                $_SESSION['user_name']=$name;
                echo"<script>window.open('caselist.php','_self')</script>";  
            }
            }
        }
        
        
        ?>