<?php 
include '../dbConnection.php';
$conn = getDatabaseConnection('finalproject');

$username = $_POST['username'];

//sql injection because of single quotes
//$sql = "SELECT * FROM lab9_user WHERE username = '$username'";
$sql = "SELECT * FROM admin WHERE username = :username";


$stmt = $conn->prepare($sql);
$stmt->execute( array(":username"=>$username));
$record = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($record);


?>