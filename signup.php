<!DOCTYPE html>
<html>
    <head>
        <title>Sign up</title>
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
            include('includes/db_connection.php');
        ?>
        <div class="container" >
            <div class="row">
                <div class="col-xs-1 col-md-2 col-lg-3"></div>
                    <div class="col-xs-10 col-md-8 col-lg-6">
                        <h2><b>SIGN UP</b></h2>
                        <form method="POST" action="signup_script.php">                    
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" class="form-control" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" class="form-control" required="true" pattern=".{6,}">
                            </div>
                            <div class="form-group">
                                <input type="password" name="confpassword" placeholder="Confirm Password" class="form-control" required="true" pattern=".{6,}">
                            </div>
                            <button class="btn btn-primary" type="submit" value="register" name="register">Submit</button>
                        </form>
                    </div>
                <div class="col-xs-1 col-md-2 col-lg-3"></div>
            </div>
        </div>
        <footer style="margin-top:150px; position:relative">
            <div class="container" >
                <center>
                     <p>Copyright &copy; Mammography Image Corpus. All Rights Reserved  |  Contact Us: +91 90000 00000</p> 
                </center>
                <center><p><a href='admin_login.php'>Admin</a></p></center>
            </div>
        </footer>
    </body>
</html>