<?php
session_start();
include '../dbConnection.php';

$dbConn = getDatabaseConnection('finalproject');
$sql= "SELECT price FROM allitems WHERE name= ";
echo "<!DOCTYPE html>
<html>
    <head>
        <title> Menu </title>
        <link rel='stylesheet' href='css/styles.css' type='text/css' />
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
    
    </head>
    <body>
    
        
                <h1> <b> La Conchita! </b></h1>


<ul class='topnav'>
   <li> <a href='guest.php'>Menu </a>  </li>
        

</ul>";
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

    
</body>