<?php 
require 'includes/db_connection.php';
 if(isset($_SESSION['admin_email'])){
     header("Location:admin.php");
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="mic.css" type="text/css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                padding-top:150px;
            }
        </style>
    </head>
    <body>
        <?php
            include('includes/header.php');
        ?>
        <div class="container" style="max-height:100%">
            <div class="row row_style">
                <div class="col-xs-1 col-md-2 col-lg-3"></div>
                <div class="col-xs-10 col-md-8 col-lg-6 ">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3>Admin Login</h3>
                        </div>
                        <div class="panel-body">
                            <p class='text-warning'><i>Login to review the cases</i></p>
                            <form method="POST" action="admin_login_script.php">
                             <div class="form-group">   
                                 <input type="email" name='admin_email' placeholder="Email" class="form-control" >
                             </div>
                            <div class="form-group">    
                                <input type="password" name='admin_pass' placeholder="Password" class="form-control" autocomplete="off">
                            </div>
                                <button class='btn btn-primary' type="submit" value='login' name='admin_login'>Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-md-2 col-lg-3"></div>
            </div>
        </div>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>