<?php
class Card {
    public $cardType = "";
    public $cardValue = "";
    
    function __construct($card) {
        $cardTypes = array("clubs", "diamonds", "hearts", "spades");
        $temp = $card / 13;
        if ($temp == 4) {
            $temp--;
        }
        
        $this->cardType = $cardTypes[$temp];
        $this->cardValue = $card % 14;
        if ($this->cardValue == 0) {
            $this->cardValue++;
        }
    }
}
class Student {
    public $studentName = "";
    public $studentNumber = "";
    
    function __construct($name, $number) {
        $this->studentName = $name;
        $this->studentNumber = $number;
    }
}

function displayRandomCard() {
    $players = array();
    
    $players[0] = new Student("Cristian", 1);
    $players[1] = new Student("Conner", 2);
    $players[2] = new Student("David", 3);
    $players[3] = new Student("Jordi", 4);
    
    shuffle($players);
    
    $cardTypes = array("clubs", "diamonds", "hearts", "spades");
    $deck = array();
    $cards = array();
    
    //Fill Deck
    for ($i = 1; $i < 53; $i++) {
        $deck[] = $i;
    }
    
    //Randomizes the deck
    shuffle($deck);
    
    //Assigns a card to each Card object in $cards
    for ($i = 1; $i < 53; $i++) {
        $cards[] = new Card(array_pop($deck));
    }
    
    $highestScore = 0;
    $whosHighest = array(0,0,0,0);
    $runningTotal = 0;
    
    for ($i = 0; $i < sizeof($players); $i++) {
        echo "<div class='cardsRow'>";
        echo "<div style='display: inline-block;width: 150px;'><img src='img/students/" . $players[$i]->studentNumber . ".jpg'/><br>" . $players[$i]->studentName . "</div>";
        $score = 0;
        
        while (true) {
            $card = array_pop($cards);
            echo "<img src='img/cards/" . $card->cardType . "/" . $card->cardValue . ".png' style='margin-bottom: 0px;margin-left: 12px;'>";
            
            $score += $card->cardValue;
            
            if ($score > 36) {
                break;
            }
        }
        
        $whosHighest[$i] += $score;
        
        if ($score > $highestScore && $score < 43) {
            $highestScore = $score;
        }
        
        $runningTotal += $score;
        echo "<br>Score: $score<br>";
        //Output
        echo "</div><hr>";
    }
    
    $and = 0;
    
    for($j = 0; $j < sizeof($players); $j++)
    {
        
        if($whosHighest[$j] == $highestScore)
        {
            $and++;
            
            if($and > 1)
            {
                echo "<div id='results'> and </div>";
            }
        
                echo "<div id='results' > ".$players[$j]->studentName . " </div>";
            
        }
        
    }
    
    
    //Display winner
    echo "<div id='results'> wins $runningTotal points! </div>";
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Lab 3</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    
    <body>
        </br>
        <div id="top">
            SilverJack
            <a style="font-size: .3em">by Cristian, Jordi, Conner, David</a>
        </div>
    
        
     
        <div id="main">
            <?php displayRandomCard() ?>
        </div>
        
        
        </br>
        
        <audio src='https://hydra-media.cursecdn.com/dota2.gamepedia.com/a/a5/Multicast_x4.mp3' autoplay> </audio>
        
    </body>
</html>