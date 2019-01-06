    <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mammography Image Corpus</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet"  href="mic.css" type="text/css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
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


            .caption{
                text-align: center;

            }
            .jumbotron{
                height: 50px;
                padding-bottom: 0px !important;
                background-color:#222 !important;

            }
            .sidenav {
                height: 100%;
                width:25%;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                right:0;
                background-color: #111;
                overflow-x: hidden;
                padding-top: 3em;
            }

            .sidenav h3 {
                padding: 2px 6px 0px 30px;
                text-decoration: none;
                font-size: 15px;
                color: #818181;
                display: block;
            }

            .sidenav h3:hover {
                color: #f1f1f1;
            }
            
            .sidenav th{
                background-color: #f5f5f5;
            }

            .main {
                margin-left: 200px; /* Same as the width of the sidenav */
            }
            .rightbar{
                height: 100%;
                width:34%;
                position: fixed;
                z-index: 1;
                top: 0px;
                right: 0px;
                background-color: #111;
                overflow-x: hidden;
                /*padding-top: 40px;*/
                padding: 42px 0px 0px 0px;
                text-decoration: none;
                font-size: 15px;
                color: #818181;
                display: block;
            }

            @media screen and (max-height: 450px) {
                .sidenav {padding-top: 15px;}
                .sidenav h3 {font-size: 18px;}
            }
            .container1 {
	-webkit-appearance: none;
	background-color: #111;
	border: 1px solid #cacece;
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05);
	padding: 9px;
	border-radius: 3px;
	display: inline-block;
	position: relative;
}
.container1:checked {
	background-color: #e9ecee;
	border: 1px solid #adb8c0;
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05), inset 15px 10px -12px rgba(255,255,255,0.1);
	color: #99a1a7;
}
.questions{
    margin: 5%;
    padding-left: 30%;
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
                <nav class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                            </button>
                            <a href="caselist.php" class="navbar-brand">Mammography Image Corpus</a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Hello, <?php echo @$_SESSION['user_name']; ?></a></li>
                                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
<div class="sidenav">
    <div>

      <h3>Name : <?php echo $row["case_name"]; ?></h3>
      <h3>Age : <?php echo $row["age"]; ?></h3>
      <h3>Parity : <?php echo $row["parity"]; ?></h3>
      <h3>Family History : <?php echo $row["family_history"]; ?></h3>
      <h3>Contact : <?php echo $row["contact_no"]; ?></h3>
    </div>
    <div style="overflow:auto;height:70%;">
        <table class="table table-responsive table-bordered table-hover">
                    <tbody>
                        <tr id="tab"><th>CASE ID</th><th>CASE NAMES</th><th>STATUS</th></tr>
                        <?php 
                          while($rows =  mysqli_fetch_assoc($case_query_result)){
                        ?>
                        <tr  onclick="window.location='sidenav.php?case_id=<?php echo $rows['case_id'];?>'" 
                             style="background-color:<?php if($case_id==$rows['case_id']){echo "#f1f1f1";} else {echo "#111";}?>;">
                            <td> <?php echo $rows['case_id'];?></td>
                            <td><?php echo $rows['case_name'];?></td>
                            <td></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
    </div>
</div>
 <?php
        $squery = "SELECT * FROM `case` WHERE `case_id`='" . $case_id . "'";
        $query = mysqli_query($dbcon, $squery)or die("Unable to Select the Images");
        $row = mysqli_fetch_assoc($query);
        $a = $row["birad"];
        $c = explode(",", $a);
        ?>
                <div class="rightbar">
                    <div class="container1" style="width:100%">
                                <center>
                                    <h4>BI-RAD SELECTION</h4>
                                    <form method="POST">
                                          <label class="container1"> Level 1
                                              <input type="checkbox" name="birad[]" value="Level 1" id="birad1"
                                        <?php
                                        if (in_array("Level 1", $c)) {
                                            echo "checked";
                                        }
                                        ?>>
                                              <span class="checkmark"></span></label>
                                        <label class="container1"> Level 2
                                            <input type="checkbox" name="birad[]" value="Level 2" id="birad2"
                                        <?php
                                               if (in_array("Level 2", $c)) {
                                                   echo "checked";
                                               }
                                               ?>>
                                        
                                        <span class="checkmark"></span></label>
                                               <label class="container1"> Level 3 
                                                   <input type="checkbox" name="birad[]" value="Level 3" id="birad3" 
                                        <?php
                                               if (in_array("Level 3", $c)) {
                                                   echo "checked";
                                               }
                                               ?>>
                                        <span class="checkmark"></span></label> 
                                        <br />
                                               <label class="container1"> Level 4 
                                                   <input type="checkbox" name="birad[]" value="Level 4" id="birad4" 
                                        <?php
                                               if (in_array("Level 4", $c)) {
                                                   echo "checked";
                                               }
                                               ?>>
                                        <span class="checkmark"></span></label>
                                               <label class="container1"> Level 5
                                                   <input type="checkbox" name="birad[]" value="Level 5" id="birad5"
                                        <?php
                                               if (in_array("Level 5", $c)) {
                                                   echo "checked";
                                               }
                                               ?>>
                                        <span class="checkmark"></span></label>
                                               <label class="container1"> Level 6 
                                                   <input type="checkbox" name="birad[]" value="Level 6" id="birad6" 
                                        <?php
                                               if (in_array("Level 6", $c)) {
                                                   echo "checked";
                                               }
                                               ?>>
                                        <span class="checkmark"></span></label>
                                        <center>
                                            <button class="button button1" type="submit" value='submit' name='submit'>Submit</button>                                               
                                        </center>
                                    </form>
                                          </center>
                        <script type="text/javascript">
                         window.onload = function(){
                            var cb1 = document.getElementById('birad1');
                            var cb2 = document.getElementById('birad2');
                            var cb3 = document.getElementById('birad3');
                            var cb4 = document.getElementById('birad4');
                            var cb5 = document.getElementById('birad5');
                            var cb6 = document.getElementById('birad6');

                            if (cb1.checked == true)
                            {
                              cb2.checked = false;
                              cb3.checked = false;
                              cb4.checked = false;
                              cb5.checked = false;
                              cb6.checked = false;
                            }
                            else if (cb2.checked == true){
                                
                              cb1.checked = false;
                              cb3.checked = false;
                              cb4.checked = false;
                              cb5.checked = false;
                              cb6.checked = false;
                            }
                             else if (cb3.checked == true){
                                
                              cb1.checked = false;
                              cb2.checked = false;
                              cb5.checked = false;
                              cb6.checked = false;
                            }
                            else if (cb5.checked ==  true){
                              cb1.checked = false;
                              cb2.checked = false;
                              cb3.checked = false;
                              cb6.checked = false;
                            }
                            else if(cb6.checked == true){ 
                              cb2.checked = false;
                              cb3.checked = false;
                              cb4.checked = false;
                              cb5.checked = false;
                              cb1.checked = false;
                            }
                         }
                        </script>
                <?php
                    if (isset(filter_input_array(INPUT_POST)["submit"])) {
                    $birad = filter_input_array(INPUT_POST)["birad"];
                    $b = implode(",", $birad);
                    $sql = "update `case` set `birad`='" . $b . "' WHERE `case_id`='" . $case_id . "'";
                    $sql_res = mysqli_query($dbcon, $sql)or die("Unable to execute");
                }
                ?>
                                    </form>
                            </div>
                    <div class="questions">
                            <div>
    <!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script>
    var pos = 0, test, question, choice, choices, chA, chB, chC, chD, chE, chF, chG,chH, chI, chJ, ques;
var questions = [
    [ "Masses", "Yes", "No" ],
    [ "Shape", "Oval", "Round", "Irregular" ],
    [ "Margin", "Circumscribed", "Obscured", "Indistinct"],
    [ "Density", "High density", "Equal density", "Low density", "Fat-containing"],
    [ "Calcification", "Yes", "No" ],
    [ "Typically Benign", "Skin", "Vascular", "Coarse or Popcorn like", "Large rod like", "Round", "Rim", "Dystrophic", "Milk of calcium", "Suture", "None" ],
    [ "Suspicious Morphology", "Amorphous", "Coarse heterogeneous", "Fine pleomorphic", "Fine linear or fine linear branching", "None" ],
    [ "Distribution", "Diffuse", "Regional", "Grouped", "Linear", "Segmental" ],
    [ "Architectural Distortion", "Yes", "No" ],
    [ "Asymmetries", "Asymmetry", "Global asymmetry", "Developing asymmetry" ],
    [ "Intramammary Lymph Node", "Yes", "No" ],
    [ "Skin Lesion", "Yes", "No" ],
    [ "Solitary Dilated Duct", "Yes", "No" ],
    [ "Associated Features", "Skin retraction", "Nipple retraction", "Skin thickening", "Trabecular thickening", "Axillary adenopathy" ],
    [ "Location of Lesion", "Laterality", "Quadrant and clock face", "Depth", "Distance from the nipple"]
];
function _(x){
	return document.getElementById(x);
}

function renderQuestion(){
	test = _("test");
	if(pos >= questions.length){
		return false;
	}
	else if(pos === 0){
        masses();
    }
    else if(pos === 1){
        shape();
    }
    else if(pos === 2){
        margin();
    }
    else if(pos === 3){
        density();
    }
    else if(pos === 4){
        calcification();
    }
    else if(pos === 5){
        typically();
    }
    else if(pos === 6){
        suspicious();
    }
    else if(pos === 7){
        distribution();
    }
    else if(pos === 8){
        architectural();
    }
    else if(pos === 9){
        asymmetries();
    }
    else if(pos === 10){
        intramammary();
    }
    else if(pos === 11){
        skin();
    }
    else if(pos === 12){
        solitary();
    }
    else if(pos === 13){
        associated();
    }
    else if(pos === 14){
        loc();
    }
}

function masses() {
    document.getElementById("c1").style.color = "#4d94ff";
    document.getElementById("c2").style.color = "#f1f1f1";
    document.getElementById("c3").style.color = "#f1f1f1";
    document.getElementById("c4").style.color = "#f1f1f1";
    document.getElementById("c5").style.color = "#f1f1f1";
    document.getElementById("c6").style.color = "#f1f1f1";
    document.getElementById("c7").style.color = "#f1f1f1";
    document.getElementById("c8").style.color = "#f1f1f1";
    document.getElementById("c9").style.color = "#f1f1f1";
    pos=0;
    question = questions[pos][0];
	chA = questions[pos][1];
    chB = questions[pos][2];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chA+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chB+"<br />";
    test.innerHTML += "<button class='button1' onclick='checkmass()'>Submit Answer</button>";
}

function checkmass(){
	choices = document.getElementsByName("choices");
	for(var i=0; i<choices.length; i++){
		if(choices[i].checked){
			choice = choices[i].value;
		}
	}
        if(choice === "Yes")
        {
            pos++;
            }
        else{
            pos+=4;
        }
        renderQuestion();
    }

function shape() {
    pos=1;
    question = questions[pos][0];
	chA = questions[pos][1];
    chB = questions[pos][2];
    chC = questions[pos][3];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chA+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chB+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chC+"<br />";
    test.innerHTML += "<button class='button1' onclick='checkAns()'>Submit Answer</button>";
}

function margin() {
    pos=2;
    question = questions[pos][0];
	chA = questions[pos][1];
    chB = questions[pos][2];
    chC = questions[pos][3];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chA+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chB+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chC+"<br />";
    test.innerHTML += "<button class='button1' onclick='checkAns()'>Submit Answer</button>";
}

function density() {
    pos=3;
    question = questions[pos][0];
	chA = questions[pos][1];
    chB = questions[pos][2];
    chC = questions[pos][3];
    chD = questions[pos][4];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chA+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chB+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chC+"<br />";
	test.innerHTML += "<input type='radio' name='choices' value='No'> "+chD+"<br />";
	test.innerHTML += "<button class='button1' onclick='checkAns()'>Submit Answer</button>";
}

function calcification() {
    document.getElementById("c1").style.color = "#f1f1f1";
    document.getElementById("c2").style.color = "#4d94ff";
    document.getElementById("c3").style.color = "#f1f1f1";
    document.getElementById("c4").style.color = "#f1f1f1";
    document.getElementById("c5").style.color = "#f1f1f1";
    document.getElementById("c6").style.color = "#f1f1f1";
    document.getElementById("c7").style.color = "#f1f1f1";
    document.getElementById("c8").style.color = "#f1f1f1";
    document.getElementById("c9").style.color = "#f1f1f1";
    pos=4;
    question = questions[pos][0];
	chA = questions[pos][1];
    chB = questions[pos][2];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chA+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chB+"<br />";
    test.innerHTML += "<button class='button1' onclick='checkcalicification()'>Submit Answer</button>";
}

function checkcalicification(){
	choices = document.getElementsByName("choices");
	for(var i=0; i<choices.length; i++){
		if(choices[i].checked){
			choice = choices[i].value;
		}
	}
        if(choice === "Yes")
        {
            pos++;
            }
        else{
            pos+=4;
        }
        renderQuestion();
    }

function typically() {
    pos=5;
    question = questions[pos][0];
	chA = questions[pos][1];
    chB = questions[pos][2];
    chC = questions[pos][3];
    chD = questions[pos][4];
    chE = questions[pos][5];
    chF = questions[pos][6];
    chG = questions[pos][7];
    chH = questions[pos][8];
    chI = questions[pos][9];
    chJ = questions[pos][10];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chA+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chB+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chC+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chD+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chE+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chF+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chG+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chH+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chI+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chJ+"<br />";
	test.innerHTML += "<button class='button1' onclick='checkAns()'>Submit Answer</button>";
}

function suspicious() {
    pos=6;
    question = questions[pos][0];
	chA = questions[pos][1];
    chB = questions[pos][2];
    chC = questions[pos][3];
    chD = questions[pos][4];
    chE = questions[pos][5];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chA+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chB+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chC+"<br />";
	test.innerHTML += "<input type='radio' name='choices' value='No'> "+chD+"<br />";
        test.innerHTML += "<input type='radio' name='choices' value='No'> "+chE+"<br />";
	test.innerHTML += "<button class='button1' onclick='checkAns()'>Submit Answer</button>";
}

function distribution() {
    pos=7;
    question = questions[pos][0];
	chA = questions[pos][1];
    chB = questions[pos][2];
    chC = questions[pos][3];
    chD = questions[pos][4];
    chE = questions[pos][5];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chA+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chB+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chC+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chD+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chE+"<br />";
	test.innerHTML += "<button class='button1' onclick='checkAns()'>Submit Answer</button>";
}

function architectural() {
    document.getElementById("c1").style.color = "#f1f1f1";
    document.getElementById("c2").style.color = "#f1f1f1";
    document.getElementById("c3").style.color = "#4d94ff";
    document.getElementById("c4").style.color = "#f1f1f1";
    document.getElementById("c5").style.color = "#f1f1f1";
    document.getElementById("c6").style.color = "#f1f1f1";
    document.getElementById("c7").style.color = "#f1f1f1";
    document.getElementById("c8").style.color = "#f1f1f1";
    document.getElementById("c9").style.color = "#f1f1f1";
    pos=8;
    question = questions[pos][0];
	chA = questions[pos][1];
    chB = questions[pos][2];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chA+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chB+"<br />";
    test.innerHTML += "<button class='button1' onclick='checkAns()'>Submit Answer</button>";
}

function asymmetries() {
    document.getElementById("c1").style.color = "#f1f1f1";
    document.getElementById("c2").style.color = "#f1f1f1";
    document.getElementById("c3").style.color = "#f1f1f1";
    document.getElementById("c4").style.color = "#4d94ff";
    document.getElementById("c5").style.color = "#f1f1f1";
    document.getElementById("c6").style.color = "#f1f1f1";
    document.getElementById("c7").style.color = "#f1f1f1";
    document.getElementById("c8").style.color = "#f1f1f1";
    document.getElementById("c9").style.color = "#f1f1f1";
    pos=9;
    question = questions[pos][0];
	chA = questions[pos][1];
    chB = questions[pos][2];
    chC = questions[pos][3];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chA+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chB+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chC+"<br />";
    test.innerHTML += "<button class='button1' onclick='checkAns()'>Submit Answer</button>";
}

function intramammary() {
    document.getElementById("c1").style.color = "#f1f1f1";
    document.getElementById("c2").style.color = "#f1f1f1";
    document.getElementById("c3").style.color = "#f1f1f1";
    document.getElementById("c4").style.color = "#f1f1f1";
    document.getElementById("c5").style.color = "#4d94ff";
    document.getElementById("c6").style.color = "#f1f1f1";
    document.getElementById("c7").style.color = "#f1f1f1";
    document.getElementById("c8").style.color = "#f1f1f1";
    document.getElementById("c9").style.color = "#f1f1f1";
    pos=10;
    question = questions[pos][0];
	chA = questions[pos][1];
    chB = questions[pos][2];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chA+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chB+"<br />";
    test.innerHTML += "<button class='button1' onclick='checkAns()'>Submit Answer</button>";
}

function skin() {
    document.getElementById("c1").style.color = "#f1f1f1";
    document.getElementById("c2").style.color = "#f1f1f1";
    document.getElementById("c3").style.color = "#f1f1f1";
    document.getElementById("c4").style.color = "#f1f1f1";
    document.getElementById("c5").style.color = "#f1f1f1";
    document.getElementById("c6").style.color = "#4d94ff";
    document.getElementById("c7").style.color = "#f1f1f1";
    document.getElementById("c8").style.color = "#f1f1f1";
    document.getElementById("c9").style.color = "#f1f1f1";
    pos=11;
    question = questions[pos][0];
	chA = questions[pos][1];
    chB = questions[pos][2];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chA+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chB+"<br />";
    test.innerHTML += "<button class='button1' onclick='checkAns()'>Submit Answer</button>";
}

function solitary() {
    document.getElementById("c1").style.color = "#f1f1f1";
    document.getElementById("c2").style.color = "#f1f1f1";
    document.getElementById("c3").style.color = "#f1f1f1";
    document.getElementById("c4").style.color = "#f1f1f1";
    document.getElementById("c5").style.color = "#f1f1f1";
    document.getElementById("c6").style.color = "f1f1f1";
    document.getElementById("c7").style.color = "#4d94ff";
    document.getElementById("c8").style.color = "#f1f1f1";
    document.getElementById("c9").style.color = "#f1f1f1";
    pos=12;
    question = questions[pos][0];
	chA = questions[pos][1];
    chB = questions[pos][2];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chA+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chB+"<br />";
    test.innerHTML += "<button class='button1' onclick='checkAns()'>Submit Answer</button>";
}

function associated() {
    document.getElementById("c1").style.color = "#f1f1f1";
    document.getElementById("c2").style.color = "#f1f1f1";
    document.getElementById("c3").style.color = "#f1f1f1";
    document.getElementById("c4").style.color = "#f1f1f1";
    document.getElementById("c5").style.color = "#f1f1f1";
    document.getElementById("c6").style.color = "f1f1f1";
    document.getElementById("c7").style.color = "f1f1f1";
    document.getElementById("c8").style.color = "#4d94ff";
    document.getElementById("c9").style.color = "#f1f1f1";
    pos=13;
    question = questions[pos][0];
	chA = questions[pos][1];
    chB = questions[pos][2];
    chC = questions[pos][3];
    chD = questions[pos][4];
    chE = questions[pos][5];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chA+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chB+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chC+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chD+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chE+"<br />";
	test.innerHTML += "<button class='button1' onclick='checkAns()'>Submit Answer</button>";
}

function loc() {
    document.getElementById("c1").style.color = "#f1f1f1";
    document.getElementById("c2").style.color = "#f1f1f1";
    document.getElementById("c3").style.color = "#f1f1f1";
    document.getElementById("c4").style.color = "#f1f1f1";
    document.getElementById("c5").style.color = "#f1f1f1";
    document.getElementById("c6").style.color = "#f1f1f1";
    document.getElementById("c7").style.color = "#f1f1f1";
    document.getElementById("c8").style.color = "#f1f1f1";
    document.getElementById("c9").style.color = "#4d94ff";
    pos=14;
    question = questions[pos][0];
	chA = questions[pos][1];
    chB = questions[pos][2];
    chC = questions[pos][3];
    chD = questions[pos][4];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chA+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='No'> "+chB+"<br />";
    test.innerHTML += "<input type='radio' name='choices' value='Yes'> "+chC+"<br />";
	test.innerHTML += "<input type='radio' name='choices' value='No'> "+chD+"<br />";
	test.innerHTML += "<button class='button1' onclick='checkAns()'>Submit Answer</button>";
}

function checkAns(){
    pos++;
        renderQuestion();
    }
window.addEventListener("load", renderQuestion, false);
</script>
</head>
<body>
<div id="test"></div>
</body>
</html>
                            </div>
                    </div>
                    
</div>
            <center>
                <div class="container" style="margin-right: 150px;">
                    <div class="col-lg-4 col-md-5 col-sm-4 col-xs-2"></div>
                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-6 jumbotron" style="margin-bottom:10px; text-align:center;">
                            <h3 style="font-size:20px; color:white; margin-bottom: 50px; margin-top:-30px;"><?php
        echo $row["case_name"];
        ?>
                            </h3>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-4 col-xs-2"></div>
                </div>
            
                <div class="col-lg-3 col-md-2 col-sm-2 col-xs-2"></div>
                <div style="margin-bottom:50px;">
                    <div class="container">
                        <div class="col-lg-3 col-md-5 col-sm-5 column_s">
                                <img id='myImg' class="images" src="<?php echo $row["imgLMLO"] ?>" alt="LEFT MLO" height="150px" width="100%"
                                     onclick="window.location='enlarge1.php?case_id=<?php echo $row['case_id'];?>'">
                                <div class="caption" >
                                    <h3 style="font-size:15px;"><?php echo $row["case_name"]; ?> LEFT MLO</h3>
                                </div>
                        </div>


                        <div class="col-lg-3 col-md-5 col-sm-5 column_s">
                                <img class="images" src="<?php echo $row["imgRMLO"] ?>" alt="RIGHT MLO" height="150px" width="100%"
                                     onclick="window.location='enlarge2.php?case_id=<?php echo $row['case_id'];?>'">
                                <div class="caption">
                                    <h3 style="font-size:15px;"><?php echo $row["case_name"]; ?> RIGHT MLO</h3>
                                </div>
                        </div>
                    </div>
                    <!--<div id="boxedit"></div>-->
                    <div class="col-lg-3 col-md-2 col-sm-2 col-xs-2"></div>
                    <div class="container">
                        <div class="col-lg-3 col-md-5 col-sm-5 column_s">
                                <img class="images" src="<?php echo $row["imgLCC"] ?>" alt="LEFT CC" height="150px" width="100%"
                                     onclick="window.location='enlarge3.php?case_id=<?php echo $row['case_id'];?>'">
                                <div class="caption" >
                                    <h3 style="font-size:15px;"><?php echo $row["case_name"]; ?> LEFT CC</h3>
                                </div>
                        </div>
                        <div class="col-lg-3 col-md-5 col-sm-5 column_s">
                                <img class="images" src="<?php echo $row["imgRCC"] ?>" alt="RIGHT CC" height="150px" width="100%"
                                     onclick="window.location='enlarge4.php?case_id=<?php echo $row['case_id'];?>'">
                                <div class="caption">
                                    <h3 style="font-size:15px;"><?php echo $row["case_name"]; ?> RIGHT CC</h3>
                                </div>
                        </div>
                        </center>
                        <footer style="margin-top:400px; position:fixed;">
                            <center>
            <div style="padding:5px;">
                <a onclic="masses()"><span id="c1">Masses</span></a>
                <a onclick="calcification()"><span id="c2">Calcifications</span></a>
                <a onclick="architectural()"><span id="c3">Architectural Distortion</span></a><br />
                <a onclick="asymmetries()"><span id="c4">Asymmetries</span></a>
                <a onclick="intramammary()"><span id="c5">Intramammary Lymph Node</span></a>
                <a onclick="skin()"><span id="c6">Skin Lesion</span></a><br />
                <a onclick="solitary()"><span id="c7">Solitary Dilated Duct</span></a>
                <a onclick="associated()"><span id="c8">Associated Features</span></a>
                <a onclick="loc()"><span id="c9">Location Of Lesion</span></a>
                    </div>
                                    </center>
                                
                        </footer>
                        </body>
        <?php
    }
}
?>
</html> 
