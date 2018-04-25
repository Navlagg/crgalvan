<?php

include '../../dbConnection.php';

$conn = getDatabaseConnection("homework5");

$sql = "SELECT username 
        FROM users
        WHERE username = :username";
$statement = $conn->prepare($sql);
$statement->execute( array(":username"=> $_GET['username']) );
$result = $statement->fetch(PDO::FETCH_ASSOC);

//print_r($result);

echo json_encode($result);
?>