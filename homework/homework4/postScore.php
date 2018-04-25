<?php
    include '../../dbConnection.php';
    $dbConn = getDatabaseConnection('homework5');
    
    $userId = $_GET["userId"];
    $score = $_GET["score"];
    
    $sql = "INSERT INTO scores
            (userId, score)
            VALUES
            (" . $userId . ", " . $score . ")";
    
    $statement= $dbConn->prepare($sql); 
    $statement->execute();
    
    $sql = "SELECT *
            FROM scores
            WHERE userId = " . $userId;
    
    $statement= $dbConn->prepare($sql); 
    $statement->execute();
    $records = $statement->fetchALL(PDO::FETCH_ASSOC);  
    
    $timesTaken = 0;
    $totalScore = 0;
    
    foreach($records as $record) {
        $timesTaken++;
        $totalScore += $record["score"];
    }
    
    $totalScore /= $timesTaken;
    
    
    echo "Score Taken Successfully\n\nYou've taken the test " . $timesTaken . " times.\n\nYour average score is " . $totalScore . " points.";
?>