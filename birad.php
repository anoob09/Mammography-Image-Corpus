                    <div style="width:100%">
                                <center>
                                    <h5><b>BI-RADS CATEGORY SELECTION</b></h5>
                                    <label > CAT 0
                                        <input id="level0" type="checkbox" name="birad" value="Level 6"  onclick="disable0();"
                                        <?php
                                               if ($b0 == "Yes") {
                                                   echo "checked";
                                               }
                                               ?>>
                                        </label>      
                                    <label> CAT 1 
                                        <input id="level1" type="checkbox" name="birad" value="Level 1" onclick="disable1();"
                                        <?php
                                               if ($b1 == "Yes") {
                                                   echo "checked";
                                               }
                                               ?>>
                                              </label>
                                        <label > CAT 2
                                        <input id="level2" type="checkbox" name="birad" value="Level 2" onclick="disable2();"
                                        <?php
                                               if ($b2 == "Yes") {
                                                   echo "checked";
                                               }
                                               ?>>
                                        </label>
                                               <label > CAT 3
                                                   <input id="level3" type="checkbox" name="birad" value="Level 3" onclick="disable3();"
                                        <?php
                                               if ($b3 == "Yes") {
                                                   echo "checked";
                                               }
                                               ?>>
                                               </label>
                                               <label > CAT 4a
                                                   <input id="level4a" type="checkbox" name="birad" value="Level 4" onclick="disable4a();"
                                        <?php
                                               if ($b4a == "Yes") {
                                                   echo "checked";
                                               }
                                               ?>>
                                        </label>
                                    <label > CAT 4b
                                        <input id="level4b" type="checkbox" name="birad" value="Level 4" onclick="disable4b();" 
                                        <?php
                                               if ($b4b == "Yes") {
                                                   echo "checked";
                                               }
                                               ?>>
                                        </label>
                                    <label > CAT 4c
                                        <input id="level4c" type="checkbox" name="birad" value="Level 4" onclick="disable4c();"
                                        <?php
                                               if ($b4c == "Yes") {
                                                   echo "checked";
                                               }
                                               ?>>
                                        </label>
                                               <label > CAT 5
                                                   <input id="level5" type="checkbox" name="birad" value="Level 5" onclick="disable5(); "
                                        <?php
                                               if ($b5 == "Yes") {
                                                   echo "checked";
                                               }
                                               ?>>
                                        </label>
                                                    <label > CAT 6
                                                   <input id="level6" type="checkbox" name="birad" value="Level 5" onclick="disable6(); "
                                        <?php
                                               if ($b6 == "Yes") {
                                                   echo "checked";
                                               }
                                               ?>>
                                        </label>
                                          </center>
                        <script>                    
        function disable0(){
            if(level0.checked === true){
            
            level2.checked = false;
            level3.checked = false;
            level4a.checked = false;
            level4b.checked = false;
            level4c.checked = false;
            level5.checked = false;
            level6.checked = false;
        }
        
    }
    function disable1(){
            if(level1.checked === true){    
            
            level3.checked = false;
            level4a.checked = false;
            level4b.checked = false;
            level4c.checked = false;
            level5.checked = false;
            level6.checked = false;
        }
      
    }
    function disable2(){
            if(level2.checked === true){
            
            level0.checked = false;
            level4a.checked = false;
            level4b.checked = false;
            level4c.checked = false;
            level5.checked = false;
            level6.checked = false;
        }
        
    }
    function disable3(){
            if(level3.checked === true){
            
            level0.checked = false;
            level1.checked = false;
            level4b.checked = false;
            level4c.checked = false;
            level5.checked = false;
        }
       
    }
     
    function disable4a(){
            if(level4a.checked === true){
            
            level0.checked = false;
            level1.checked = false;
            level2.checked = false;
            level4c.checked = false;
            level5.checked = false;
            level6.checked = false;
        }
        
    }
    function disable4b(){
            if(level4b.checked === true){
           
            level0.checked = false;
            level1.checked = false;
            level2.checked = false;
            level3.checked = false;
            level5.checked = false;
            level6.checked = false;
        }
       
    }
        function disable4c(){
            if(level4c.checked === true){
            
            level0.checked = false;
            level1.checked = false;
            level2.checked = false;
            level3.checked = false;
            level6.checked = false;
            level4a.checked = false;
        }
       
    }
            function disable5(){
            if(level5.checked === true){
            
            level0.checked = false;
            level1.checked = false;
            level2.checked = false;
            level3.checked = false;
            level4a.checked = false;
            level4b.checked = false;
            
        }
       
    }
    function disable6(){
            if(level6.checked === true){
            
            level0.checked = false;
            level1.checked = false;
            level2.checked = false;
            level3.checked = false;
            level4a.checked = false;
            level4b.checked = false;
            level4c.checked = false;
        }
       
    }
                            
            </script>
                            </div>