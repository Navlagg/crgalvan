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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 
    </head>
    <body ><div class="container">
        <div class="topnav">
             
                   <a href="guest.php">Home </a> 
                <a href="menu.php">Menu </a>
            </div>
                <h1> <b> Bakery </b></h1>
                <h2>Welcome Guest!</h2>
                <ul class="list-inline">
                 
    
                </ul>
            <?php
            displayAll();
            ?>
   <a href ="scart.php">shopping cart</a>  
            <form action="login.php">
        <button type="submit" name = "logout">Sign out</button>
        </div>
    </body>
</html>
