<?php
    $numPassword = $_GET['numPasswords'];
    $passLength = $_GET['numChar'];
    $letterExclude = $_GET['letterExclude'];
    
    $passwordList = array();
    
    if (!empty($numPassword) && !empty($passLength) && !empty($letterExclude)) {
        for ($i = 0; $i < $numPassword; $i++) {
            $tempString = "";
            
            for ($x = 0; $x < $passLength; $x++) {
                $letter = chr(64 + rand(1, 26));
                
                if ($letter == $letterExclude) {
                    $same = true;
                    while ($same) {
                        $letter = chr(64 + rand(1, 26));
                        
                        if ($letter != $letterExclude) {
                            $same = false;
                        }
                    }
                }
                
                $tempString = $tempString . $letter;
            }
            
            $passwordList[] = $tempString;
        }
        
        sort($passwordList);
        
        echo "<div style='position: absolute; margin-top: 200px'>";
        for ($i = 0; $i < count($passwordList); $i++) {
            echo $passwordList[$i] . "<br/>";
        }
        echo "</div>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Random Password Generator</title>
    </head>
    
    <body>
        <form method="get">
            
            How many passwords?
            <input type="number" name="numPasswords" min="1"/>
            
            <br/><br/>
            
            Password Length:
            <input type="radio" name="numChar" value="6" id="6" /><label for="6">6 characters</label>
            <input type="radio" name="numChar" value="8" id="8" /><label for="8">8 characters</label>
            <input type="radio" name="numChar" value="10" id="10" /><label for="10">10 characters</label>

            <br/><br/>

            Letter to Exlude:
            <select name="letterExclude">
               <option value="A"> A </option>    
               <option value="B"> B </option> 
               <option value="C"> C </option> 
               <option value="D"> D </option> 
               <option value="E"> E </option> 
               <option value="F"> F </option> 
               <option value="G"> G </option> 
               <option value="H"> H </option> 
               <option value="I"> I </option> 
               <option value="J"> J </option> 
               <option value="K"> K </option> 
               <option value="L"> L </option> 
               <option value="M"> M </option> 
               <option value="N"> N </option> 
               <option value="O"> O </option> 
               <option value="P"> P </option> 
               <option value="Q"> Q </option> 
               <option value="R"> R </option> 
               <option value="S"> S </option> 
               <option value="T"> T </option> 
               <option value="U"> U </option> 
               <option value="V"> V </option> 
               <option value="W"> W </option> 
               <option value="X"> X </option> 
               <option value="Y"> Y </option> 
               <option value="Z"> Z </option> 
            </select>
            
            <br/><br/>
            
            <input type="submit" name="submitForm" value="Generate!"/>
            
        </form>
    </body>
</html>