<?php 
require 'includes/db_connection.php';
 if(isset($_SESSION['email'])){
     header("Location:caselist.php");
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
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
            .panel-heading
            {
                background-color: #222 !important;
                border-color: #080808 !important;
            }
            .panel
            {
                border-color:#080808 !important;
            }
            .btn
            {
                background-color:#222 !important;
                border-color:#080808 !important;
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
                            <h3>Login</h3>
                        </div>
                        <div class="panel-body">
                            <p class='text-warning'><i>Login to review the cases</i></p>
                            <form method="POST" action="login_submit.php">
                             <div class="form-group">   
                                 <input type="email" name='email' placeholder="Email" class="form-control" >
                             </div>
                            <div class="form-group">    
                                <input type="password" name='password' placeholder="Password" class="form-control" autocomplete="off">
                            </div>
                                <button class='btn btn-primary' type="submit" value='login' name='login'>Submit</button>
                            </form>
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 col-md-2 col-lg-3"></div>
            </div>
        </div>
        <footer style="margin-top:100px;position:relative;">
            <div class="container" >
                <center>
                     <p>Copyright &copy; Mammography Image Corpus. All Rights Reserved  |  Contact Us: +91 90000 00000</p> 
                </center>
            </div>
        </footer>
        <script>
            document.cookie = "value_change=No; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/"; 
        </script>
    </body>
</html>