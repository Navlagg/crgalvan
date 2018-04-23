<?php
    session_start();
    $go = false;
    if(!isset($_GET['guessnum'])){
        echo "done";
        $_SESSION['random_numbers'] = rand(1, 10);
         $correct = false;
         $counttries = 0;
         
    }
    
    
    
   
    if(!empty($_GET['guess'])){
        if($_GET['guess'] == $_SESSION['random_numbers']){
            $correct = true;
            $go = true;
            
        }
        else{
            $correct = false;
            $counttries = $counttries + 1;
            $go = true;
        }
    }
    
    function reset(){
      $_SESSION['random_numbers'] = rand(1, 10);
      $counttries = 0;
    }
    function check($correct){
        
        if($correct == true){
        echo "<p style='color:green;'>You've guessed the number</p>";
            reset();
        }
        if($_SESSION['random_numbers']  < $_GET['guess'] && $correct == false){
            echo "<p style='color:red;'>The number should be lower.</p>";
        }
        
        if($_SESSION['random_numbers']  > $_GET['guess'] && $correct == false){
            echo "<p style='color:red;'>The number should be higher.</p>";
        }
            
        
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title> Guess a random number </title>
    </head>
    <body>
        <h1>Guess the number between 1 and 100!</h1><br />
        <form>
        Guess: <input type="text" name="guess"> <br />
        <input type="submit" name="guessnum" value="Guess Number">
        <br /><br />
        <input type="submit" name="giveup" value="Give Up">
        
        <input type="submit" name="retry" value="Play Again">
        </form>
        
        <br /><br />
        <?php if(isset($_GET['guessnum'])){echo " Number of tries: "; if (empty($counttries)){echo "0";} else{echo $counttries;} } ?>
        <br />
        <?php if($go == true){ check($correct); }?>
        
    </body>
</html>