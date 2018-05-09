<?php
session_start();
include '../dbConnection.php';

$dbConn = getDatabaseConnection('finalproject');
$sql= "SELECT price FROM product WHERE name= ";
echo "<!DOCTYPE html>
<html>
    <head>
         <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
   <link rel='stylesheet' href='css/styles.css' type='text/css' />
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    </head>
    <body >
        <nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <ul class='nav navbar-nav'>
      <li><a href='guest.php'>Home</a></li>
      <li><a href='menu.php'>Menu</a></li>
      <li class='active'><a href='scart.php'>Shopping Cart</a></li>
      <li><a href='logout.php'>Logout</a></li>
    </ul>
  </div>
    </head>
    <body>
    <div class='container'>
        
                <h1> <b> La Conchita! </b></h1>

>";
echo "<ul>
<h2>";
$total=0;
if(isset($_GET['clear']))
{
    unset($_SESSION["cart"]);
}
else{
foreach($_SESSION["cart"] as $item )
{
    $sql= "SELECT DISTINCT * FROM allitems WHERE name= '".$item."'";
    $statement= $dbConn->prepare($sql); 
      $statement->execute(); //Always pass the named parameters, if any
      $records = $statement->fetch(PDO::FETCH_ASSOC); 
      echo"<li>".$records["name"]." ".$records["price"]."$</li>";
      $total+=$records["price"];
      
      
}
}
echo "total= ".$total."</h2>";
?>

        

<br/>
<a href="guest.php">Return Shopping</a>
<form>
<input type='submit' name='clear' value="clear">
</form>
</div>
    
</body>