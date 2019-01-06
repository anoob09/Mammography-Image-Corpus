<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="dist/js/jquery.min.js"></script>
        <script type="text/javascript">
            jQuery.noConflict();
        </script>
</head>
<style>
/* The container */
.container {
    display: block;
    position: relative;
    padding-left: 18px;
    margin-bottom: 6px;
    cursor: pointer;
    font-size: 14px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 12px;
    width: 12px;
    background-color: #777;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #668cff;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 4px;
	left: 4px;
	width: 4px;
	height: 4px;
	border-radius: 50%;
	background: white;
}
</style>
<body>
    <?php $start_query = mysqli_query($dbcon, "select sysdate() as `start` from dual");
            $start = mysqli_fetch_assoc($start_query);?>
    <form>
        <h5 id="label_masses">Masses<span id="fill_masses" style="color:#e60000;"></span></h5>
            <label class="container">
            <input  type="radio" value="Yes" name="masses" onclick="makeCookie('masses'); enableMasses();" id="masses1" <?php if($ques['mass']==='Yes') echo 'checked';?>>Yes<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input  class="sub" type="radio" value="No" name="masses" onclick="makeCookie('masses'); disablelMasses();" id="masses2" <?php if($ques['mass']==='No') echo 'checked';?>>No<br /> 
            <span class="checkmark"></span>
            </label>
    
            <h5 id="label_shape">Shape<span id="fill_shape" style="color:#e60000;"></span></h5>
            <label class="container">
            <input type="radio"  value="Oval" name="shape" id="shape1" onclick="makeCookie('shape');" <?php if(!($ques['mass']==='Yes')) echo 'disabled'; if($ques['shape']==='Oval') echo 'checked';?>>Oval<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Round" name="shape" id="shape2" onclick="makeCookie('shape');" <?php if(!($ques['mass']==='Yes')) echo 'disabled'; if($ques['shape']==='Round') echo 'checked';?>>Round<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Irregular" name="shape" id="shape3" onclick="makeCookie('shape');" <?php if(!($ques['mass']==='Yes')) echo 'disabled'; if($ques['shape']==='Irregular') echo 'checked';?>>Irregular<br /> 
            <span class="checkmark"></span>
            </label>
            
            <h5 id="label_margin">Margin<span id="fill_margin" style="color:#e60000;"></span></h5>
            <label class="container">
            <input type="radio"  value="Circumscribed" name="margin" id="margin1" onclick="makeCookie('margin');" <?php if(!($ques['mass']==='Yes')) echo 'disabled'; if($ques['margin']==='Circumscribed') echo 'checked';?>>Circumscribed<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio"  value="Obscured" name="margin" id="margin2" onclick="makeCookie('margin');"<?php if(!($ques['mass']==='Yes')) echo 'disabled'; if($ques['margin']==='Obscured') echo 'checked';?>>Obscured<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Indistinct" name="margin" id="margin3" onclick="makeCookie('margin');"<?php if(!($ques['mass']==='Yes')) echo 'disabled'; if($ques['margin']==='Indistinct') echo 'checked';?>>Indistinct<br /> 
            <span class="checkmark"></span>
            </label>
            
            <h5 id="label_density">Density<span id="fill_density" style="color:#e60000;"></span></h5>
            <label class="container">
            <input type="radio"  value="High density" name="density" id="density1" onclick="makeCookie('density');" <?php if(!($ques['mass']==='Yes')) echo 'disabled'; if($ques['density']==='High density') echo 'checked';?>>High density<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio"  value="Equal density" name="density" id="density2" onclick="makeCookie('density');" <?php if(!($ques['mass']==='Yes')) echo 'disabled'; if($ques['density']==='Equal density') echo 'checked';?>>Equal density<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio"  value="Low density" name="density" id="density3" onclick="makeCookie('density');" <?php if(!($ques['mass']==='Yes')) echo 'disabled'; if($ques['density']==='Low density') echo 'checked';?>>Low density<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio"  value="Fat-containing" name="density" id="density4" onclick="makeCookie('density');" <?php if(!($ques['mass']==='Yes')) echo 'disabled'; if($ques['density']==='Fat-containing') echo 'checked';?>>Fat-containing<br /> 
            <span class="checkmark"></span>
            </label>
            
            <h5 id="label_calcification">Calcification<span id="fill_calcification" style="color:#e60000;"></span></h5>
            <label class="container">
            <input type="radio"  value="Yes" name="calcification" id="calcification1" onclick="makeCookie('calcification'); enableCalcification();" <?php if($ques['calcification']==='Yes') echo 'checked';?>>Yes<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio"  value="No" name="calcification"  id="calcification2" onclick="makeCookie('calcification');disableCalcification();" <?php if($ques['calcification']==='No') echo 'checked';?>>No<br /> 
            <span class="checkmark"></span>
            </label>
            
            <h5 id="label_typically">Typically Benign<span id="fill_typically" style="color:#e60000;"></span></h5>
            <label class="container">
            <input type="radio" value="Skin"  name="typically" id="typically1" onclick="makeCookie('typically')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['typically']==='Skin') echo 'checked';?>>Skin<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Vascular"  name="typically" id="typically2" onclick="makeCookie('typically')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['typically']==='Vascular') echo 'checked';?>>Vascular<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Coarse or Popcorn like"  name="typically" id="typically3" onclick="makeCookie('typically')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['typically']==='Coarse or Popcorn like') echo 'checked';?>>Coarse or Popcorn like<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Large rod like" name="typically"  id="typically4" onclick="makeCookie('typically')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['typically']==='Large rod like') echo 'checked';?>>Large rod like<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Round" name="typically" id="typically5"  onclick="makeCookie('typically')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['typically']==='Round') echo 'checked';?>>Round<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Rim" name="typically" id="typically6"  onclick="makeCookie('typically')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['typically']==='Rim') echo 'checked';?>>Rim<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Dystrophic" name="typically" id="typically7"  onclick="makeCookie('typically')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['typically']==='Dystrophic') echo 'checked';?>>Dystrophic<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Milk of calcium" name="typically" id="typically8"  onclick="makeCookie('typically')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['typically']==='Milk of calcium') echo 'checked';?>>Milk of Calcium<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Suture" name="typically" id="typically9"  onclick="makeCookie('typically')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['typically']==='Suture') echo 'checked';?>>Suture<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="None" name="typically" id="typically10"  onclick="makeCookie('typically')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['typically']==='None') echo 'checked';?>>None<br /> 
             <span class="checkmark"></span>
            </label>
            
            <h5 id="label_suspicious">Suspicious Morphology<span id="fill_suspicious" style="color:#e60000;"></span></h5>
            <label class="container">
            <input type="radio" value="Amorphous" name="suspicious" id="suspicious1"  onclick="makeCookie('suspicious')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['suspicious']==='Amorphous') echo 'checked';?>>Amorphous<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Coarse heterogeneous" name="suspicious"  id="suspicious2"  onclick="makeCookie('suspicious')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['suspicious']==='Coarse heterogeneous') echo 'checked';?>>Coarse heterogeneous<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Fine pleomorphic" name="suspicious"  id="suspicious3"  onclick="makeCookie('suspicious')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['suspicious']==='Skin') echo 'checked';?>>Fine pleomorphic<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Fine linear or fine linear branching" name="suspicious"  id="suspicious4"  onclick="makeCookie('suspicious')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['suspicious']==='Fine linear or fine linear branching') echo 'checked';?>>Fine linear or fine linear branching<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="None" name="suspicious" id="suspicious5"  onclick="makeCookie('suspicious')"  <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['suspicious']==='None') echo 'checked';?>>None<br /> 
 <span class="checkmark"></span>
            </label>
            
            <h5 id="label_distribution">Distribution<span id="fill_distribution" style="color:#e60000;"></span></h5>
            <label class="container">
            <input type="radio" value="Diffuse" name="distribution"  id="distribution1" onclick="makeCookie('distribution')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['distribution']==='Diffuse') echo 'checked';?>>Diffuse<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Regional" name="distribution"  id="distribution2" onclick="makeCookie('distribution')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['distribution']==='Regional') echo 'checked';?>>Regional<br />
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Grouped" name="distribution"  id="distribution3" onclick="makeCookie('distribution')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['distribution']==='Grouped') echo 'checked';?>>Grouped<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Linear" name="distribution"  id="distribution4" onclick="makeCookie('distribution')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['distribution']==='Linear') echo 'checked';?>>Linear<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Segmental" name="distribution"  id="distribution5" onclick="makeCookie('distribution')" <?php if(!($ques['calcification']==='Yes')) echo 'disabled'; if($ques['distribution']==='Segmental') echo 'checked';?>>Segmental<br /> 
 <span class="checkmark"></span>
            </label>
            
            
            <h5 id="label_asymmetries">Asymmetries<span id="fill_asymmetries" style="color:#e60000;"></span></h5>
            <label class="container">
            <input type="radio" value="Asymmetry" name="asymmetries"  id="asymmetries1" onclick="makeCookie('asymmetries')" <?php if($ques['asymmetries']==='Asymmetry') echo 'checked';?>>Asymmetry<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Global asymmetry" name="asymmetries"  id="asymmetries2" onclick="makeCookie('asymmetries')" <?php if($ques['asymmetries']==='Global asymmetry') echo 'checked';?>>Global asymmetry<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Developing asymmetry" name="asymmetries"  id="asymmetries3" onclick="makeCookie('asymmetries')" <?php if($ques['asymmetries']==='Developing asymmetry') echo 'checked';?>>Developing asymmetry<br /> 
<span class="checkmark"></span>
            </label>
            <h5 id="label_intramammary">Intramammary Lymph Node<span id="fill_intramammary" style="color:#e60000;"></span></h5>
            <label class="container">
            <input type="radio" value="Yes" name="intramammary" id="intramammary1"  onclick="makeCookie('intramammary')" <?php if($ques['intramammary']==='Yes') echo 'checked';?>>Yes<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="No" name="intramammary" id="intramammary2"  onclick="makeCookie('intramammary')" <?php if($ques['intramammary']==='No') echo 'checked';?>>No<br /> 
<span class="checkmark"></span>
            </label>
            
            <h5 id="label_skin">Skin Lesion<span id="fill_skin" style="color:#e60000;"></span></h5>
            <label class="container">
            <input type="radio" value="Yes" name="skin" id="skin1"  onclick="makeCookie('skin')" <?php if($ques['skin']==='Yes') echo 'checked';?>>Yes<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="No" name="skin" id="skin2"   onclick="makeCookie('skin')" <?php if($ques['skin']==='No') echo 'checked';?>>No<br /> 
<span class="checkmark"></span>
            </label>
            
            <h5 id="label_solitary">Solitary Dilated Duct<span id="fill_solitary" style="color:#e60000;"></span></h5>
            <label class="container">
            <input type="radio" value="Yes" name="solitary"  id="solitary1" onclick="makeCookie('solitary')" <?php if($ques['solitary']==='Yes') echo 'checked';?>>Yes<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="No" name="solitary"  id="solitary2" onclick="makeCookie('solitary')" <?php if($ques['solitary']==='No') echo 'checked';?>>No<br /> 
<span class="checkmark"></span>
            </label>
            <h5 id="label_associated">Associated Features<span id="fill_associated" style="color:#e60000;"></span></h5>
            <label class="container">
            <input type="radio" value="Skin retraction" name="associated"  id="associated1" onclick="makeCookie('associated')" <?php if($ques['associated']==='Skin retraction') echo 'checked';?>>Skin retraction<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Nipple retraction" name="associated"  id="associated2" onclick="makeCookie('associated')" <?php if($ques['associated']==='Nipple retraction') echo 'checked';?>>Nipple retraction<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Skin thickening" name="associated"  id="associated3" onclick="makeCookie('associated')" <?php if($ques['associated']==='Skin thickening') echo 'checked';?>>Skin thickening<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Trabecular thickening" name="associated"  id="associated4" onclick="makeCookie('associated')" <?php if($ques['associated']==='Trabecular thickening') echo 'checked';?>>Trabecular thickening<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Axillary adenopathy" name="associated"  id="associated5" onclick="makeCookie('associated')" <?php if($ques['associated']==='Axillary adenopathy') echo 'checked';?>>Axillary adenopathy<br /> 
            <span class="checkmark"></span>
            </label>
            
            <h5 id="label_location">Location of Lesion<span id="fill_location" style="color:#e60000;"></span></h5>
            <label class="container">
            <input type="radio" value="Laterality" name="location"  id="location1" onclick="makeCookie('location')" <?php if($ques['location']==='Laterality') echo 'checked';?>>Laterality<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Quadrant and clock face" name="location"  id="location2" onclick="makeCookie('location')" <?php if($ques['location']==='Quadrant and clock face') echo 'checked';?>>Quadrant and clock face<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Depth" name="location" id="location3"  onclick="makeCookie('location')" <?php if($ques['location']==='Depth') echo 'checked';?>>Depth<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Distance from the nipple" name="location"  id="location4" onclick="makeCookie('location')" <?php if($ques['location']==='Distance from the nipple') echo 'checked';?>>Distance from the nipple<br /> 
        <span class="checkmark"></span>
            </label>
    </form>
    <div style="padding: 10%;"></div>
    <script>
        resetCookie();
        var value_change = "No";
    	var masses1 = document.getElementById('masses1');
    	var masses2 = document.getElementById('masses2');
    	var shape1 = document.getElementById('shape1');
        var shape2 = document.getElementById('shape2');
        var shape3 = document.getElementById('shape3');
        var margin1 = document.getElementById('margin1');    
        var margin2 = document.getElementById('margin2'); 
        var margin3 = document.getElementById('margin3');
        var density1 = document.getElementById('density1');
        var density2 = document.getElementById('density2');
        var density3 = document.getElementById('density3');
        var density4 = document.getElementById('density4');
        var calcification1 = document.getElementById('calcification1'); 
        var calcification2 = document.getElementById('calcification2');
        var typically1 = document.getElementById('typically1');
        var typically2 = document.getElementById('typically2');
        var typically3 = document.getElementById('typically3');
        var typically4 = document.getElementById('typically4');
        var typically5 = document.getElementById('typically5');
        var typically6 = document.getElementById('typically6');
        var typically7 = document.getElementById('typically7');
        var typically8 = document.getElementById('typically8');
        var typically9 = document.getElementById('typically9');
        var typically10 = document.getElementById('typically10');
        var suspicious1 = document.getElementById('suspicious1');
        var suspicious2 = document.getElementById('suspicious2');
        var suspicious3 = document.getElementById('suspicious3');
        var suspicious4 = document.getElementById('suspicious4');
        var suspicious5 = document.getElementById('suspicious5');
        var distribution1 = document.getElementById('distribution1');
        var distribution2 = document.getElementById('distribution2');
        var distribution3 = document.getElementById('distribution3');
        var distribution4 = document.getElementById('distribution4');
        var distribution5 = document.getElementById('distribution5');
        var asymmetries1 = document.getElementById('asymmetries1');
        var asymmetries2 = document.getElementById('asymmetries2');
        var asymmetries3 = document.getElementById('asymmetries3');
        var intramammary1 = document.getElementById('intramammary1');
        var intramammary2 = document.getElementById('intramammary2');
        var skin1 = document.getElementById('skin1');
        var skin2 = document.getElementById('skin2');
        var solitary1 = document.getElementById('solitary1');
        var solitary2 = document.getElementById('solitary2');
        var associated1 = document.getElementById('associated1');
        var associated2 = document.getElementById('associated2');
        var associated3 = document.getElementById('associated3');
        var associated4 = document.getElementById('associated4');
        var associated5 = document.getElementById('associated5');
        var location1 = document.getElementById('location1');
        var location2 = document.getElementById('location2');
        var location3 = document.getElementById('location3');
        var location4 = document.getElementById('location4');
        function enableMasses(){
        	shape1.disabled = false;
        	shape2.disabled = false;
        	shape3.disabled = false;
        	margin1.disabled = false;
        	margin2.disabled = false;
        	margin3.disabled = false;
        	density1.disabled = false;
        	density2.disabled = false;
        	density3.disabled = false;
        	density4.disabled = false;
                shape1.checked = false;
        	shape2.checked = false;
        	shape3.checked = false;
        	margin1.checked = false;
        	margin2.checked = false;
        	margin3.checked = false;
        	density1.checked = false;
        	density2.checked = false;
        	density3.checked = false;
        	density4.checked = false;
        }
        function enableCalcification(){
        	typically1.disabled = false;
        	typically2.disabled = false;
        	typically3.disabled = false;
        	typically4.disabled = false;
        	typically5.disabled = false;
        	typically6.disabled = false;
        	typically7.disabled = false;
        	typically8.disabled = false;
        	typically9.disabled = false;
        	typically10.disabled = false;
        	typically1.disabled = false;
        	suspicious1.disabled = false;
        	suspicious2.disabled = false;
        	suspicious3.disabled = false;
        	suspicious4.disabled = false;
        	suspicious5.disabled = false;
        	distribution1.disabled = false;
        	distribution2.disabled = false;
        	distribution3.disabled = false;
        	distribution4.disabled = false;
        	distribution5.disabled = false;
                typically1.checked = false;
        	typically2.checked = false;
        	typically3.checked = false;
        	typically4.checked = false;
        	typically5.checked = false;
        	typically6.checked = false;
        	typically7.checked = false;
        	typically8.checked = false;
        	typically9.checked = false;
        	typically10.checked = false;
        	typically1.checked = false;
        	suspicious1.checked = false;
        	suspicious2.checked = false;
        	suspicious3.checked = false;
        	suspicious4.checked = false;
        	suspicious5.checked = false;
        	distribution1.checked = false;
        	distribution2.checked = false;
        	distribution3.checked = false;
        	distribution4.checked = false;
        	distribution5.checked = false;
                
        }
        function disablelMasses(){
            document.cookie = "margin =; expires= Tue, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "shape =; expires= Tue, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "density =; expires= Tue, 18 Dec 2018 12:00:00 UTC; path=/";
        	shape1.disabled = true;
        	shape2.disabled = true;
        	shape3.disabled = true;
        	margin1.disabled = true;
        	margin2.disabled = true;
        	margin3.disabled = true;
        	density1.disabled = true;
        	density2.disabled = true;
        	density3.disabled = true;
        	density4.disabled = true;
                shape1.checked = false;
        	shape2.checked = false;
        	shape3.checked = false;
        	margin1.checked = false;
        	margin2.checked = false;
        	margin3.checked = false;
        	density1.checked = false;
        	density2.checked = false;
        	density3.checked = false;
        	density4.checked = false;
        }
        function disableCalcification(){
            document.cookie = "typically =; expires= Tue, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "suspicious =; expires= Tue, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "distribution =; expires= Tue, 18 Dec 2018 12:00:00 UTC; path=/";
        	typically1.disabled = true;
        	typically2.disabled = true;
        	typically3.disabled = true;
        	typically4.disabled = true;
        	typically5.disabled = true;
        	typically6.disabled = true;
        	typically7.disabled = true;
        	typically8.disabled = true;
        	typically9.disabled = true;
        	typically10.disabled = true;
        	typically1.disabled = true;
        	suspicious1.disabled = true;
        	suspicious2.disabled = true;
        	suspicious3.disabled = true;
        	suspicious4.disabled = true;
        	suspicious5.disabled = true;
        	distribution1.disabled = true;
        	distribution2.disabled = true;
        	distribution3.disabled = true;
        	distribution4.disabled = true;
        	distribution5.disabled = true;
                typically1.checked = false;
        	typically2.checked = false;
        	typically3.checked = false;
        	typically4.checked = false;
        	typically5.checked = false;
        	typically6.checked = false;
        	typically7.checked = false;
        	typically8.checked = false;
        	typically9.checked = false;
        	typically10.checked = false;
        	typically1.checked = false;
        	suspicious1.checked = false;
        	suspicious2.checked = false;
        	suspicious3.checked = false;
        	suspicious4.checked = false;
        	suspicious5.checked = false;
        	distribution1.checked = false;
        	distribution2.checked = false;
        	distribution3.checked = false;
        	distribution4.checked = false;
        	distribution5.checked = false;
        }
        
        
        var i, ch, choices;
        function makeCookie(tab)
        {
            choices = document.getElementsByName(tab);
            for (i=0;i<choices.length;i++)
            {
                if(choices[i].checked)
                {
                    ch = choices[i].value;
                }
            }
            document.cookie = tab + " = " + ch + "; expires= Tue, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "value_change=Yes; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            value_change = "Yes";
        }
        

        function resetCookie()
        {
            document.cookie = "masses=<?php echo $ques['mass'];?>; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "shape=<?php echo $ques['shape'];?>; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "margin=<?php echo $ques['margin'];?>; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "density=<?php echo $ques['density'];?>; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "calcification=<?php echo $ques['calcification'];?>; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "typically=<?php echo $ques['typically'];?>; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "suspicious=<?php echo $ques['suspicious'];?>; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "distribution=<?php echo $ques['distribution'];?>; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "architectural=<?php echo $ques['architectural'];?>; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "asymmetries=<?php echo $ques['asymmetries'];?>; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "intramammary=<?php echo $ques['intramammary'];?>; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "skin=<?php echo $ques['skin'];?>; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "solitary=<?php echo $ques['solitary'];?>; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "associated=<?php echo $ques['associated'];?>; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "location=<?php echo $ques['location'];?>; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
            document.cookie = "value_change=No; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
        }
                    $(document).ready(function(){
            $("#submitbutton").click(function(e){
                e.preventDefault();
                var massesCheck = false;
                var calcificationCheck = false;
                var asymmetriesCheck = false;
                var intramammaryCheck = false;
                var skinCheck = false;
                var solitaryCheck = false;
                var associatedCheck = false;
                var locationCheck = false;
                var resp = "<span style='padding-left:25px;' class='glyphicon glyphicon-arrow-left'></span>Fill This";
                if(masses1.checked == true){
                    if((shape1.checked == true || shape2.checked ==  true || shape3.checked == true) && (margin1.checked == true  || margin2.checked == true || margin3.checked == true) && (density1.checked == true || density2.checked == true || density3.checked == true || density4.checked == true))
                    massesCheck = true;
                    if(!(shape1.checked == true || shape2.checked ==  true || shape3.checked == true)){
                        document.getElementById('label_shape').style.color = "#e60000";
                        document.getElementById('fill_shape').innerHTML = resp;
                    }
                    if(!(margin1.checked == true  || margin2.checked == true || margin3.checked == true)){
                        document.getElementById('label_margin').style.color = "#e60000";
                        document.getElementById('fill_margin').innerHTML = resp;
                    }
                    if(!(density1.checked == true || density2.checked == true || density3.checked == true || density4.checked == true)){
                        document.getElementById('label_density').style.color = "#e60000";
                        document.getElementById('fill_density').innerHTML = resp;
                    }
                }
                else if(masses2.checked == true){
                    massesCheck = true;
                }

                if(calcification1.checked == true){
                    if((typically1.checked == true || typically2.checked == true || typically3.checked == true || typically4.checked == true || typically5.checked == true || typically6.checked == true || typically7.checked == true || typically8.checked == true || typically9.checked == true || typically10.checked == true)&& (suspicious1.checked == true || suspicious2.checked == true || suspicious3.checked == true || suspicious4.checked == true || suspicious5.checked == true)&&(distribution1.checked == true || distribution2.checked == true || distribution3.checked == true || distribution4.checked == true || distribution5.checked == true))
                    calcificationCheck = true;
                    if(!(typically1.checked == true || typically2.checked == true || typically3.checked == true || typically4.checked == true || typically5.checked == true || typically6.checked == true || typically7.checked == true || typically8.checked == true || typically9.checked == true || typically10.checked == true)){
                        document.getElementById('label_typically').style.color = "#e60000";
                        document.getElementById('fill_typically').innerHTML = resp;
                    }
                    if(!(suspicious1.checked == true || suspicious2.checked == true || suspicious3.checked == true || suspicious4.checked == true || suspicious5.checked == true)){
                        document.getElementById('label_suspicious').style.color = "#e60000";
                        document.getElementById('fill_suspicious').innerHTML = resp;
                    }
                    if(!(distribution1.checked == true || distribution2.checked == true || distribution3.checked == true || distribution4.checked == true || distribution5.checked == true)){
                        document.getElementById('label_distribution').style.color = "#e60000";
                        document.getElementById('fill_distribution').innerHTML = resp;
                    }
                }
                else if(calcification2.checked == true){
                     calcificationCheck = true;
                }

                if(asymmetries1.checked == true || asymmetries2.checked == true || asymmetries3.checked == true){
                    asymmetriesCheck = true;
                }
                else {
                    document.getElementById('label_asymmetries').style.color = "#e60000";
                    document.getElementById('fill_asymmetries').innerHTML = resp;
                }

                if(intramammary1.checked == true || intramammary2.checked == true){
                 intramammaryCheck = true;   
                }
                else {
                    document.getElementById('label_intramammary').style.color = "#e60000";
                    document.getElementById('fill_intramammary').innerHTML = resp;
                }
                
                if(skin1.checked == true || skin2.checked == true){
                    skinCheck = true;
                }
                else {
                    document.getElementById('label_skin').style.color = "#e60000";
                    document.getElementById('fill_skin').innerHTML = resp;
                }

                if(solitary1.checked == true || solitary2.checked == true){
                    solitaryCheck = true;
                }
                else {
                    document.getElementById('label_solitary').style.color = "#e60000";
                    document.getElementById('fill_solitary').innerHTML = resp;
                }

                if(associated1.checked == true || associated2.checked == true || associated3.checked == true || associated4.checked == true || associated5.checked == true){
                    associatedCheck = true; 
                }
                else {
                    document.getElementById('label_associated').style.color = "#e60000";
                    document.getElementById('fill_associated').innerHTML = resp;
                }
                
                if(location1.checked == true || location2.checked == true || location3.checked == true || location4.checked == true){
                    locationCheck = true;
                }
                else {
                    document.getElementById('label_location').style.color = "#e60000";
                    document.getElementById('fill_location').innerHTML = resp;
                }
                    
                
        if(massesCheck != true)
        {
          document.getElementById('label_masses').style.color = "#e60000";
          document.getElementById('fill_masses').innerHTML = resp;
        }

        if(calcificationCheck != true)
        {
            document.getElementById('label_calcification').style.color = "#e60000";
            document.getElementById('fill_calcification').innerHTML = resp;
        }

if(massesCheck == true && calcificationCheck == true && asymmetriesCheck == true && intramammaryCheck == true && skinCheck == true && solitaryCheck == true && associatedCheck  == true && locationCheck == true) {   
            
                if(value_change == "Yes")
                {
                    e.preventDefault();        
                    var case_id = "<?php echo $case_id;?>";
                    var image = "<?php echo $image;?>";
                    var view_id = "<?php echo $view_id;?>";
                    var start_time = "<?php echo $start['start']?>";
                    $.post("storeData.php", //Required URL of the page on server
                    { // Data Sending With Request To Server
                    case_id : case_id,
                    image : image,
                    view_id : view_id,
                    start_time : start_time
                    },
                    function(response){
                        document.getElementById('response').innerHTML = response;
                    });

                }
            }
            else{
                alert("Please answer all the questions!!")
            }
             });
             });
             
             
             
             
        <?php if($type === 'report') {?>

            $(document).ready(function(){
            $("#submitbutton").click(function(e){
                e.preventDefault();
                var birad0 = "No";
                var birad1 = "No";
                var birad2 = "No";
                var birad3 = "No";
                var birad4a = "No";
                var birad4b = "No";
                var birad4c = "No";
                var birad5 = "No";
                var birad6 = "No";
                var level0 = document.getElementById('level0');
                var level1 = document.getElementById('level1');
                var level2 = document.getElementById('level2');
                var level3 = document.getElementById('level3');
                var level4a = document.getElementById('level4a');
                var level4b = document.getElementById('level4b');
                var level4c = document.getElementById('level4c');
                var level5 = document.getElementById('level5');  
                var level6 = document.getElementById('level6'); 
                if(level0.checked === true){
                    birad0 = "Yes";
                }
                if(level1.checked === true){
                    birad1 = "Yes";
                }
                if(level2.checked === true){
                    birad2 = "Yes";
                }
                if(level3.checked === true){
                    birad3 = "Yes";
                }
                if(level4a.checked === true){
                    birad4a = "Yes";
                }
                if(level4b.checked === true){
                    birad4b = "Yes";
                }
                if(level4c.checked === true){
                    birad4c = "Yes";
                }
                if(level5.checked === true) {
                    birad5 = "Yes";
                }
                 if(level6.checked === true) {
                    birad6 = "Yes";
                }
                var case_id = "<?php echo $case_id;?>";
                var view_id = "<?php echo $view_id;?>";
                $.post("birad_script.php", //Required URL of the page on server
                    { // Data Sending With Request To Server
                    case_id : case_id,
                    view_id : view_id,
                    birad0 : birad0,
                    birad1 : birad1,
                    birad2 : birad2,
                    birad3 : birad3,
                    birad4a : birad4a,
                    birad4b : birad4b,
                    birad4c : birad4c,
                    birad5 : birad5,
                    birad6 : birad6
                });
            });
            });
      
<?php }?>
    </script>
</body>
</html>