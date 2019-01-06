<?php

require 'includes/db_connection.php';


if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $check_user = "select * from radiologists WHERE email='$email' AND password='$password'";
    
    $run= mysqli_query($dbcon,$check_user);
    
    if(mysqli_num_rows($run))
    {
        //header('Location:welcome.php');
        $rad_name="";
        while($f=mysqli_fetch_assoc($run)){
            $rad_name=$f['name'];
            $role = $f['role'];
            $radiologist = $f['rad_id'];
        }
        $_SESSION['email']=$email;
        $_SESSION['rad_name']=$rad_name;
        $_SESSION['role'] = $role; 
        $_SESSION['rad_id'] = $radiologist;
            echo "<script>window.open('caselist.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('Email or password is incorrect!');</script>";
    }
}
?>
