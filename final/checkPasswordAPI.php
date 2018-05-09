<?php 
include '../dbConnection.php';
$conn = getDatabaseConnection('finalproject');


$password =  hash("sha1", $_POST['password']);//sha1($_POST['password']);  // hash("sha1", $_POST['password']);
//sql injection because of single quotes
//$sql = "SELECT * FROM lab9_user WHERE username = '$username'";
$sql = "SELECT * FROM admin WHERE password = :password";


$stmt = $conn->prepare($sql);
$stmt->execute( array(":password"=>$password));
$record = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($record);


?>