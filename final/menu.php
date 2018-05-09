<?php

include '../dbConnection.php';

    session_start();
    
    $conn = getDatabaseConnection('finalproject');
    
    
    function displayAll()
    {
    global $conn;
    $sql = "SELECT p.name, ct.catName, cm.companyName, p.description, p.price
            FROM products p 
            INNER JOIN category ct ON p.catId = ct.catId 
            INNER JOIN company cm ON p.comId = cm.comId
            ORDER BY p.name" ;  //Getting all records 
    $statement= $conn->prepare($sql); 
      $statement->execute($namedParameters); //Always pass the named parameters, if any
      $records = $statement->fetchALL(PDO::FETCH_ASSOC);
    echo "<form>";
    echo "<table align='center'>";
        
    echo "<tr>" . "<td>Product</td>" . "<td>Category</td>" . "<td>Company</td>" . "<td>Product Description</td>" . "<td> Price </td>" ;


        foreach ($records as $record)
        {
            //echo "<tr><td>". "<input type='text' name='cart'  value =" . $record['name'] . "> </td>" ;
            echo "<tr><td>" .$record['name']. "</td><td>" .$record['catName']. "</td><td>" .$record['companyName']. "</td><td>" .$record['description']. "</td><td>" .$record['price']. "</td></tr>";
        }
        
        echo "</table>";
        echo "</form>";

    }
    
    ?>
    
    <!DOCTYPE html>
<html>
    <head>
        <title> Guest </title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
           <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body >
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="guest.php">Home</a></li>
      <li><a href="menu.php">Menu</a></li>
      <li><a href="scart.php">Shopping Cart</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
    </head>
    <body ><div class="container">
        
            <?php
            displayAll();
            ?>
   <a href ="scart.php">shopping cart</a>  
            <form action="login.php">
        <button type="submit" name = "logout">Sign out</button>
        </div>
    </body>
</html>
