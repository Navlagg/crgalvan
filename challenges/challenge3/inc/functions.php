<?php
    $passwords = array();
    $current_password;
    $digit_num = rand(1,3);
    $alphas = range('A', 'Z');
    $digits = range(1,9);
    $size = rand(5,10);
    $rand_position = rand(1,10);
    $currentnum = 0;
   
    function createpassword(){
        global $passwords, $current_password, $alphas, $currentnum;
        for($i = 1; $i <= $size; $i++){
            if($rand_position <= 7){
                $current_password . $alphas[rand(0, count($alphas) - 1)];
            }
            else if($rand_position > 7 && $currentnum <= $digit_num){
                $current_password . $digits[rand(0, count($digits) - 1)];
                $currentnum++;
            }
            else{
                $current_password . $alphas[rand(0, count($alphas) - 1)];            }
        }
        echo " " . $current_password . " ";
       return $current_password;
    }
    function createTable(){
        
        for($i = 0 ; $i < 25; $i++){
            $passwords[] = createpassword();
            
        }
        echo "<table>";
        for($j = 0; $j <5; $j++){
            echo "<tr>";
            for($k = 0; $k <5; $k++){
                echo "<td>";
                echo array_pop($passwords);
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

?>