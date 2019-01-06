<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Mammography Image Corpus</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet"  href="mic.css" type="text/css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                padding-top:75px;
                position: relative;
            }
                        .button {
                background-color: #1677CB; /* Green */
                border: none;
                color: white;
                padding: 6px 12px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                cursor: pointer;
            }

            .button1 {
                background-color: #1677CB; 
                color: white; 
                border-color:#080808;
                border-radius: 4px;
            }
            .button1:hover {
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
        <?php
    require 'includes/db_connection.php';
    if (!$_SESSION['email']) {
        header("Location: login.php"); //redirect to login page to secure the welcome page without login access.  
    }
    $case_id = "";
    if (isset($_GET['case_id'])) {
        $case_id = $_GET['case_id'];
//$_SESSION['case_id']=$_GET['case_id'];
        $sql = "SELECT * FROM `case` WHERE `case_id`='" . $case_id . "'";
        $sql_res = mysqli_query($dbcon, $sql)or die("Unable to Select the Images");
        $row = mysqli_fetch_assoc($sql_res);
        $a = $row["birad"];
        
        $case_query= "SELECT case_id,case_name FROM `case`";
        $case_query_result= mysqli_query($dbcon, $case_query);
        
        if ($row) {
            ?>
            <body>
                <h3>it is woring</h3>< br /><br /><h3>it is woring</h3>
                        </body>
        <?php
    }
}
?>
</html> 
