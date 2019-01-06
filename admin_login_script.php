<?php

require 'includes/db_connection.php';


if(isset($_POST['admin_login']))
{
    $admin_email=$_POST['admin_email'];
    $admin_pass=$_POST['admin_pass'];
    
    $check_admin = "select * from admin WHERE admin_email='$admin_email' AND admin_pass='$admin_pass'";
    
    $run_admin= mysqli_query($dbcon,$check_admin);
    
    if(mysqli_num_rows($run_admin))
    {
        //header('Location:welcome.php');
        $admin_name="";
        while($f=mysqli_fetch_assoc($run_admin)){
            $admin_name=$f['admin_name'];
        }
        $_SESSION['admin_email']=$admin_email;
        $_SESSION['admin_name']=$admin_name;
        echo "<script>window.open('admin.php','_self')</script>";
        
    }
    else
    {
        echo "<script>alert('Email or password is incorrect!')</script>";
    }
}
?>
