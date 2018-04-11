<?php
    session_start();
    $go = false;
    if(!isset($_GET['guessnum'])){
        $_SESSION['random_numbers'] = rand(1, 10);
         $correct = false;
         $counttries = 0;
         
    }
    echo $_SESSION['random_numbers'];
    
   
    if(!empty($_GET['guess'])){
        if($_GET['guess'] == $_SESSION['random_numbers']){
            $correct = true;
            $go = true;
        }
        else{
            $correct = false;
            $counttries++;
            $go = true;
        }
    }
    function check($correct){
        echo "done";
        if($correct == true){
        echo "<p style='color:green;'>You've guessed the number</p>";
        }
        if($random_numbers < $_GET['guess'] && $correct == false){
            echo "<p style='color:red;'>The number should be lower.</p>";
        }
        
        if($random_numbers > $_GET['guess'] && $correct == false){
            echo "<p style='color:red;'>The number should be false.</p>";
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
        <?php if(isset($_GET['guessnum'])){echo " Number of tries: " . $counttries; } ?>
        <br />
        <?php if($go == true){ check($correct); }?>
        
    </body>
</html>