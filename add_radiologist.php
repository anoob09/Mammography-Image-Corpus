<!DOCTYPE html>
<html style="background-color: #111;">
<head>
    <title>Add Case</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="mic.css" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .btn
        {
            background-color:#1677CB !important;
            border-color:#080808 !important;
        }
        .sidenav {
            padding-top: 100px;
            height: 100%;
            width: 18%;
            z-index: 1;
            overflow-x: hidden;
        }
        .sidenav h3{
            font-size: 16px;
            color :#818181
        }
        .sidenav h3:hover{
            color :#f1f1f1;
        }
    </style>
</head>
<body>
    <?php
    require 'includes/db_connection.php';
    if(!isset($_SESSION['email']))
    {
        header('Location:index.php');
    }
    include 'includes/all_headers.php';
    if(isset($_SESSION['role']))
    {
        $role = $_SESSION['role'];
        if($role === 'scientific admin' || $role === 'it admin')
        {
    ?>
    <div class="sidenav col-xs-2"></div>
    <div class="container col-xs-8" style="padding-top:50px;">
        <div class="row">
                <div class="col-xs-1 col-md-2 col-lg-3"></div>
                    <div class="col-xs-10 col-md-8 col-lg-6">
                        <h2 style="color:#eee"><b>ADD CASE</b></h2>
                        <form method="POST" action="add_case_script.php">                   
                            <div class="form-group">
                                <input type="text" name="case_name" placeholder="Case Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="parity" placeholder="Parity" class="form-control" required="true" >
                            </div>
                            <div class="form-group">
                                <input type="text" name="contact" placeholder="Contact Number" class="form-control" required="true" >
                            </div>
                            <div class="form-group">
                                <input type="text" name="family_history" placeholder="Family History" class="form-control" required="true" >
                            </div>
                            <h3>Upload Images</h3>
                            <div class="form-group">
                                <label><b>LMLO</b></label> <input type="file" name="upload_lmlo">
                                <label><b>RMLO</b></label> <input type="file" name="upload_rmlo">
                                <label><b>LCC</b></label> <input type="file" name="upload_lcc">
                                <label><b>RCC</b></label> <input type="file" name="upload_rcc">
                            </div>
                            <button class="btn-info btn" type="submit" value="register" name="register">Submit</button>
                        </form>
                    </div>
                <div class="col-xs-1 col-md-2 col-lg-3"></div>
            </div>
    </div>
    <div class="col-xs-2"></div>
    <?php }
    else{
        header('Location:index.php');
        }
    }?>
</body>
</html>