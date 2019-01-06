<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css" media="all">@import "css/annotation.css";</style>
        <script type="text/javascript" src="dist/js/jquery.min.js"></script>
        <script type="text/javascript" src="dist/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.annotate.js"></script>
        <style>
            /* Dropdown Button */
.dropbtn {
    color: white;
    border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
            /* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    color: #fff;
}
        </style>
    </head>
    <body>
        <?php $role = $_SESSION['role']; ?>
        <div>
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                <div class="navbar-header col-xs-9">
                    <a href="caselist.php" class="navbar-brand">Mammography Image Corpus</a>
                    
                    <div class="collapse navbar-collapse" id="newNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <?php if ($role == 'scientific admin') {?>
                        <li><a href="add_case.php"><span class="glyphicon glyphicon-list"></span>Add Case</a></li>
                        <?php } ?>
                        <li><a href="caselist.php"><span class="glyphicon glyphicon-list"></span>Case List</a></li>
                        <?php if($role==='it admin' || $role==='scientific admin'){ ?>
                        <li class="dropdown"><a href="add_radiologist.php" class="dropbtn"><span class="glyphicon glyphicon-wrench"></span>Manage Users</a><div class="dropdown-content">
                                                                                        <a href="add_radiologist.php">Add User</a>
                                                                                        <a href="change_pass.php">Manage Existing Users</a>
                                                                                        <a href="delete_radiologist.php">Remove User</a>
                                                                                      </div></li>
                        <?php } ?>
                    </ul>
                    </div>
                
                </div>
                <div class="collapse navbar-collapse col-xs-2" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>Howdy <?php echo $_SESSION['rad_name']; ?></a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
    </body>
</html>