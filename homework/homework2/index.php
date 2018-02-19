<?php
    class Card {
        public $cardType = "";
        public $cardValue = "";
        
        function __construct($card) {
            $cardTypes = array("clubs", "diamonds", "hearts", "spades");
            $this->cardType = $cardTypes[$card / 13];
            $this->cardValue = $card % 13;
            if ($this->cardValue == 0) {
                $this->cardValue++;
            }
        }
    }

    function drawCards() {
        $deck = array();
        
        $colors = array("#F44336", "#9C27B0", "#2196F3", "#009688", "#EF6C00");
        $colorHelpers = array("#B71C1C", "#4A148C", "#0D47A1", "#00796B", "#E65100");
        
        //Sorts color arrays
        asort($colors);
        asort($colorHelpers);
        
        $colorNum = rand(0, sizeof($colors));
        
        echo '<style type="text/css">
                #top {
                    background-color: ' . $colors[$colorNum] . ';
                }
            </style>';
            
        echo '<style type="text/css">
            #shadow {
                background-color: ' . $colorHelpers[$colorNum] . ';
            }
        </style>';
        
        for ($i = 1; $i < 53; $i++) {
            $deck[] = $i;
        }
        
        shuffle($deck);
        
        echo "Computer Cards<br><br>";
        
        $computerPoints = 0;
        $userPoints = 0;
        
        for ($i = 1; $i < 7; $i++) {
            echo "<script>console.log('Processing Card $i of 6');</script>";
        }
        
        //Cards 1, 2, 3 are computer cards
        $card1 = new Card(array_pop($deck));
        $card2 = new Card(array_pop($deck));
        $card3 = new Card(array_pop($deck));
        
        //Cards 4, 5, 6 are player cards
        $card4 = new Card(array_pop($deck));
        $card5 = new Card(array_pop($deck));
        $card6 = new Card(array_pop($deck));
        
        //Deciding game win
        if ($card1->cardValue > $card4->cardValue) {
            $computerPoints++;
        } else if ($card1->cardValue < $card4->cardValue) {
            $userPoints++;
        }
        
        if ($card2->cardValue > $card5->cardValue) {
            $computerPoints++;
        } else if ($card2->cardValue < $card5->cardValue) {
            $userPoints++;
        }
        
        if ($card3->cardValue > $card6->cardValue) {
            $computerPoints++;
        } else if ($card3->cardValue < $card6->cardValue) {
            $userPoints++;
        }
        
        echo "<img src='img/cards/$card1->cardType/$card1->cardValue.png' style='margin-right: 12px'/>";
        
        echo "<img src='img/cards/$card2->cardType/$card2->cardValue.png' style='margin-right: 12px'/>";
        
        echo "<img src='img/cards/$card3->cardType/$card3->cardValue.png'/>";
        
        echo "<br><hr>Your Cards<br><br>";
        
        echo "<img src='img/cards/$card4->cardType/$card4->cardValue.png' style='margin-right: 12px'/>";
        
        echo "<img src='img/cards/$card5->cardType/$card5->cardValue.png' style='margin-right: 12px'/>";
        
        echo "<img src='img/cards/$card6->cardType/$card6->cardValue.png'/>";
        
        echo "<br><br><hr><br>";
        
        if ($computerPoints > $userPoints) {
            echo "Computer Wins!";
        } else if ($computerPoints < $userPoints) {
            echo "You Win!";
        } else if ($computerPoints == $userPoints) {
            echo "Tie Game!";
        }
        
        echo "<br><br><input type='button' onclick='javascript:history.go(0)' value='Play again!'><br><br>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> War - Best of 3 </title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="top">
            <p id="title">War</p>
            <h4>Cristian Galvan - Homework 2</h4>
            <p>This simulates 3 games of war. Each game is vertical. To win you need at least 2 games. Aces are 1.<br> If a card image does not load, please refresh the page.</p>
        </div>
        
        <div id="shadow"></div>
        
        <div id="main">
            <?php drawCards() ?>
            <br>
        </div>
    </body>
</html>



