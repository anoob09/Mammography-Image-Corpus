<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
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
    <form>
        
            <h5>Masses</h5>
            <label class="container">
            <input class = "sub" type="radio" value="Yes" name="masses" id="masses1" <?php if($ques['mass']==='Yes') echo 'checked'; else echo 'disabled';?>>Yes<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input  class="sub" type="radio" value="No" name="masses" id="masses2" <?php if($ques['mass']==='No') echo 'checked'; else echo 'disabled';?>>No<br /> 
        <span class="checkmark"></span>
            </label>
            
            <h5>Shape</h5>
            <label class="container">
            <input type="radio" class = "sub" value="Oval" name="shape" id="shape1" <?php if($ques['shape']==='Oval') echo 'checked'; else echo 'disabled';?>>Oval<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Round" name="shape" id="shape2" <?php if($ques['shape']==='Round') echo 'checked'; else echo 'disabled';?>>Round<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Irregular" name="shape" id="shape3" <?php if($ques['shape']==='Irregular') echo 'checked'; else echo 'disabled';?>>Irregular<br /> 
            <span class="checkmark"></span>
            </label>
            
            <h5>Margin</h5>
            <label class="container">
            <input type="radio" class = "sub" value="Circumscribed" name="margin" id="margin1" <?php if($ques['margin']==='Circumscribed') echo 'checked'; else echo 'disabled';?>>Circumscribed<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" class = "sub" value="Obscured" name="margin" id="margin2" <?php if($ques['margin']==='Obscured') echo 'checked'; else echo 'disabled';?>>Obscured<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Indistinct" name="margin" id="margin3" <?php if($ques['margin']==='Indistinct') echo 'checked'; else echo 'disabled';?>>Indistinct<br /> 
            <span class="checkmark"></span>
            </label>
            
            <h5>Density</h5>
            <label class="container">
            <input type="radio" class = "sub" value="High density" name="density" id="density1" <?php if($ques['density']==='High density') echo 'checked'; else echo 'disabled';?>>High density<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" class = "sub" value="Equal density" name="density" id="density2" <?php if($ques['density']==='Equal density') echo 'checked'; else echo 'disabled';?>>Equal density<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" class = "sub" value="Low density" name="density" id="density3" <?php if($ques['density']==='Low density') echo 'checked'; else echo 'disabled';?>>Low density<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" class = "sub" value="Fat-containing" name="density" id="density4" <?php if($ques['density']==='Fat-containing') echo 'checked'; else echo 'disabled';?>>Fat-containing<br /> 
            <span class="checkmark"></span>
            </label>
            
            <h5>Calcification</h5>
            <label class="container">
            <input type="radio" class = "sub" value="Yes" name="calcification" id="calcification1" <?php if($ques['calcification']==='Yes') echo 'checked'; else echo 'disabled';?>>Yes<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" class = "sub" value="No" name="calcification"  id="calcification2" <?php if($ques['calcification']==='No') echo 'checked'; else echo 'disabled';?>>No<br /> 
            <span class="checkmark"></span>
            </label>
            <h5>Typically Benign</h5>
            <label class="container">
            <input type="radio" value="Skin" class = "sub" name="typically" id="typically1" <?php if($ques['typically']==='Skin') echo 'checked'; else echo 'disabled';?>>Skin<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Vascular" class = "sub" name="typically" id="typically2" <?php if($ques['typically']==='Vascular') echo 'checked'; else echo 'disabled';?>>Vascular<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Coarse or Popcorn like" class = "sub" name="typically" id="typically3" <?php if($ques['typically']==='Coarse or Popcorn like') echo 'checked'; else echo 'disabled';?>>Coarse or Popcorn like<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Large rod like" name="typically" class = "sub" id="typically4" <?php if($ques['typically']==='Large rod like') echo 'checked'; else echo 'disabled';?>>Large rod like<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Round" name="typically" id="typically5" class = "sub" <?php if($ques['typically']==='Round') echo 'checked'; else echo 'disabled';?>>Round<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Rim" name="typically" id="typically6" class = "sub" <?php if($ques['typically']==='Rim') echo 'checked'; else echo 'disabled';?>>Rim<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Dystrophic" name="typically" id="typically7" class = "sub" <?php if($ques['typically']==='Dystrophic') echo 'checked'; else echo 'disabled';?>>Dystrophic<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Milk of calcium" name="typically" id="typically8" class = "sub" <?php if($ques['typically']==='Milk of calcium') echo 'checked'; else echo 'disabled';?>>Milk of Calcium<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Suture" name="typically" id="typically9" class = "sub" <?php if($ques['typically']==='Suture') echo 'checked'; else echo 'disabled';?>>Suture<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="None" name="typically" id="typically10" class = "sub" <?php if($ques['typically']==='None') echo 'checked'; else echo 'disabled';?>>None<br /> 
            <span class="checkmark"></span>
            </label>
            
            <h5>Suspicious Morphology</h5>
            <label class="container">
            <input type="radio" value="Amorphous" name="suspicious" id="suspicious1" class = "sub" <?php if($ques['suspicious']==='Amorphous') echo 'checked'; else echo 'disabled';?>>Amorphous<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Coarse heterogeneous" name="suspicious"  id="suspicious2" class = "sub" <?php if($ques['suspicious']==='Coarse heterogeneous') echo 'checked'; else echo 'disabled';?>>Coarse heterogeneous<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Fine pleomorphic" name="suspicious"  id="suspicious3" class = "sub" <?php if($ques['suspicious']==='Skin') echo 'checked'; else echo 'disabled';?>>Fine pleomorphic<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Fine linear or fine linear branching" name="suspicious" class = "sub" id="suspicious4" <?php if($ques['suspicious']==='Fine linear or fine linear branching') echo 'checked'; else echo 'disabled';?>>Fine linear or fine linear branching<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="None" name="suspicious" id="suspicious5" class = "sub" <?php if($ques['suspicious']==='None') echo 'checked'; else echo 'disabled';?>>None<br /> 
            <span class="checkmark"></span>
            </label>
            <h5>Distribution</h5>
            <label class="container">
            <input type="radio" value="Diffuse" name="distribution" class = "sub" id="distribution1" <?php if($ques['distribution']==='Diffuse') echo 'checked'; else echo 'disabled';?>>Diffuse<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Regional" name="distribution" class = "sub" id="distribution2" <?php if($ques['distribution']==='Regional') echo 'checked'; else echo 'disabled';?>>Regional<br />
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Grouped" name="distribution" class = "sub" id="distribution3" <?php if($ques['distribution']==='Grouped') echo 'checked'; else echo 'disabled';?>>Grouped<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Linear" name="distribution" class = "sub" id="distribution4" <?php if($ques['distribution']==='Linear') echo 'checked'; else echo 'disabled';?>>Linear<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Segmental" name="distribution" class = "sub" id="distribution5" <?php if($ques['distribution']==='Segmental') echo 'checked'; else echo 'disabled';?>>Segmental<br /> 
            <span class="checkmark"></span>
            </label>
            
            <h5>Architectural Distortion</h5>
            <label class="container">
            <input type="radio" value="Yes" name="architectural" class = "sub" id="architectural1" <?php if($ques['architectural']==='Yes') echo 'checked'; else echo 'disabled';?>>Yes<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="No" name="architectural" class = "sub" id="architectural2" <?php if($ques['architectural']==='No') echo 'checked'; else echo 'disabled';?>>No<br /> 
            <span class="checkmark"></span>
            </label>
            
            <h5>Asymmetries</h5>
            <label class="container">
            <input type="radio" value="Asymmetry" name="asymmetries" class = "sub" id="asymmetries1" <?php if($ques['asymmetries']==='Asymmetry') echo 'checked'; else echo 'disabled';?>>Asymmetry<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Global asymmetry" name="asymmetries" class = "sub" id="asymmetries2" <?php if($ques['asymmetries']==='Global asymmetry') echo 'checked'; else echo 'disabled';?>>Global asymmetry<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Developing asymmetry" name="asymmetries" class = "sub" id="asymmetries3" <?php if($ques['asymmetries']==='Developing asymmetry') echo 'checked'; else echo 'disabled';?>>Developing asymmetry<br /> 
            <span class="checkmark"></span>
            </label>
            
            <h5>Intramammary Lymph Node</h5>
            <label class="container">
            <input type="radio" value="Yes" name="intramammary" id="intramammary1" class = "sub" <?php if($ques['intramammary']==='Yes') echo 'checked'; else echo 'disabled';?>>Yes<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="No" name="intramammary" id="intramammary2" class = "sub" <?php if($ques['intramammary']==='No') echo 'checked'; else echo 'disabled';?>>No<br /> 
            <span class="checkmark"></span>
            </label>
            
            <h5>Skin Lesion</h5>
            <label class="container">
            <input type="radio" value="Yes" name="skin" id="skin1" class = "sub" <?php if($ques['skin']==='Yes') echo 'checked'; else echo 'disabled';?>>Yes<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="No" name="skin" id="skin2" class = "sub" <?php if($ques['skin']==='No') echo 'checked'; else echo 'disabled';?>>No<br /> 
            <span class="checkmark"></span>
            </label>
            
            <h5>Solitary Dilated Duct</h5>
            <label class="container">
            <input type="radio" value="Yes" name="solitary" class = "sub" id="solitary1" <?php if($ques['solitary']==='Yes') echo 'checked'; else echo 'disabled';?>>Yes<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="No" name="solitary" class = "sub" id="solitary2" <?php if($ques['solitary']==='No') echo 'checked'; else echo 'disabled';?>>No<br /> 
            <span class="checkmark"></span>
            </label>
            <h5>Associated Features</h5>
            <label class="container">
            <input type="radio" value="Skin retraction" name="associated" class = "sub" id="associated1" <?php if($ques['associated']==='Skin retraction') echo 'checked'; else echo 'disabled';?>>Skin retraction<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Nipple retraction" name="associated" class = "sub" id="associated2" <?php if($ques['associated']==='Nipple retraction') echo 'checked'; else echo 'disabled';?>>Nipple retraction<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Skin thickening" name="associated" class = "sub" id="associated3" <?php if($ques['associated']==='Skin thickening') echo 'checked'; else echo 'disabled';?>>Skin thickening<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Trabecular thickening" name="associated" class = "sub" id="associated4" <?php if($ques['associated']==='Trabecular thickening') echo 'checked'; else echo 'disabled';?>>Trabecular thickening<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Axillary adenopathy" name="associated" class = "sub" id="associated5" <?php if($ques['associated']==='Axillary adenopathy') echo 'checked'; else echo 'disabled';?>>Axillary adenopathy<br /> 
            <span class="checkmark"></span>
            </label>
            
            <h5>Location of Lesion</h5>
            <label class="container">
            <input type="radio" value="Laterality" name="location" class = "sub" id="location1" <?php if($ques['location']==='Laterality') echo 'checked'; else echo 'disabled';?>>Laterality<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Quadrant and clock face" name="location" class = "sub" id="location2" <?php if($ques['location']==='Quadrant and clock face') echo 'checked'; else echo 'disabled';?>>Quadrant and clock face<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Depth" name="location" id="location3" class = "sub" <?php if($ques['location']==='Depth') echo 'checked'; else echo 'disabled';?>>Depth<br /> 
            <span class="checkmark"></span>
            </label>
            <label class="container">
            <input type="radio" value="Distance from the nipple" name="location" class = "sub" id="location4" <?php if($ques['location']==='Distance from the nipple') echo 'checked'; else echo 'disabled';?>>Distance from the nipple<br /> 
            <span class="checkmark"></span>
            </label>
            
            
    </form>
</body>
</html>