<?php

include '../dbConnection.php';
session_start();
    if(!isset($_SESSION["cart"]))
    {
     $_SESSION["cart"]= array();
    }
    $dbConn = getDatabaseConnection('bakery');
    global $counter;
    $counter = 0;
    
    
    function displayAll()
    {
    global $dbConn;
    $sql = "SELECT * 
            FROM allitems
            WHERE 1" ;  //Getting all records 
            
        if (isset($_GET['submitRequest']) && $_GET['option'] == "Pan Dulce")
                getPanDulce();
            
            if (isset($_GET['submitRequest']) && $_GET['option'] == "Pastries")
                getPastries();
                
            if (isset($_GET['submitRequest']) && $_GET['option'] == "Drinks")
                getDrinks();
                
            if (isset($_GET['submitRequest']) && $_GET['option'] == "Sandwiches")
                getSandwich();
                
            if (isset($_GET['submitRequest']) && $_GET['option'] == "Vegetarian")
                getVegetarian();
            
            
      $statement= $dbConn->prepare($sql); 
      $statement->execute($namedParameters); //Always pass the named parameters, if any
      $records = $statement->fetchALL(PDO::FETCH_ASSOC);  
      
 

    }
    
   function getPanDulce()
    {
        global $dbConn;
        
        $sql = "SELECT * FROM
            Bread ORDER BY bread";
        
        if (isset($_GET['nameSort'])){
            if($_GET['nameSort'] == "ascending"){
                $sql = "SELECT * FROM Bread ORDER BY bread ASC";
            } else {
                $sql = "SELECT * FROM Bread ORDER BY bread DESC";
            }
        }
            
        if (isset($_GET['sort']))
            $sql = "SELECT * FROM Bread ORDER BY price";
          
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        $pan = $statement->fetchAll(PDO::FETCH_ASSOC);
        
       
        echo "<form >";
        echo "<table align='center'>";
        
        echo "<tr><td> </td>" . "<td>Item</td>" . "<td> Price </td>" . "<td> Image </td></tr>" ;
        
        foreach ($pan as $bread)
        {
            echo "<tr><td>". "<input type='submit' name='cartt'   value =" . $bread['bread'] . "> </td>" ;
            echo "<td>" .$bread['bread']. "</td> <td>" .$bread['price']. "</td><td><img src='img/bread/".$bread['bread'].".jpg'/></td></tr>";
        }
        
        echo "</table>";
        echo "</form>";
        
        
        
        
    }
    function getPastries()
    {
        
        global $dbConn;
        
        $sql = "SELECT * 
                FROM pastries
                ORDER BY name";
                
        if (isset($_GET['nameSort'])){
            if($_GET['nameSort'] == "ascending"){
                $sql = "SELECT * FROM pastries ORDER BY name ASC";
            } else {
                $sql = "SELECT * FROM pastries ORDER BY name DESC";
            }
        }
        
        if (isset($_GET['sort']))
            $sql = "SELECT * FROM pastries ORDER BY price";
            
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<form >";
        echo "<table align='center'>";
        
                echo "<tr><td> </td>" . "<td>Item</td>" . "<td> Price </td>" . "<td> Image </td></tr>" ;
        foreach ($records as $record)
        {
            echo "<tr><td>". "<input type='submit' name='cartt'  value =" . $record['name'] . "> </td>" ;
            echo "<td>" .$record['name']. "</td><td>" .$record['price']. "</td><td><img src='img/pastries/".$record['name'].".jpg'/></td></tr>";
        }
        
        echo "</table>";
        echo "</form>";
        
        
    }
    
     function getDrinks()
    {
        global $dbConn;
        
        $sql = "SELECT * 
                FROM drinks
                ORDER BY name";
                
        if (isset($_GET['nameSort'])){
            if($_GET['nameSort'] == "ascending"){
                $sql = "SELECT * FROM drinks ORDER BY name ASC";
            } else {
                $sql = "SELECT * FROM drinks ORDER BY name DESC";
            }
        }
        
        if (isset($_GET['sort']))
            $sql = "SELECT * FROM drinks ORDER BY price";
            
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<form>";
        echo "<table align='center'>";
        
                echo "<tr><td> </td>" . "<td>Item</td>" . "<td> Price </td>" . "<td> Image </td></tr>" ;
        
        foreach ($records as $record)
        {
            echo "<tr><td>". "<input type='submit' name='cartt' value ='".$record['name']."'> </td>" ;
            echo "<td>" .$record['name']. "</td><td>" .$record['price']. "</td><td><img src='img/drinks/".$record['name'].".jpg'/></td></tr>";
        }
        
        echo "</table>";
        echo "</form>";
}
      function getSandwich()
    {
        global $dbConn;
        
        $sql = "SELECT * 
                FROM sandwich
                ORDER BY name";
                
        if (isset($_GET['nameSort'])){
            if($_GET['nameSort'] == "ascending"){
                $sql = "SELECT * FROM sandwich ORDER BY name ASC";
            } else {
                $sql = "SELECT * FROM sandwich ORDER BY name DESC";
            }
        }
          
        
        if (isset($_GET['sort']))
            $sql = "SELECT * FROM sandwich ORDER BY price";   
            
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<form>";
        echo "<table align='center'>";
        
                echo "<tr><td> </td>" . "<td>Item</td>" . "<td> Price </td>" . "<td> Image </td></tr>" ;
        foreach ($records as $record)
        {
            echo "<tr><td>". "<input type='submit' name='cartt' value ='".$record['name']."'> </td>" ;
            echo "<td>" .$record['name']. "</td><td>" .$record['price']. "</td><td><img src='img/sanwiches/".$record['name'].".jpg'/></td></tr>";
        }
        
        echo "</table>";
        echo "</form>";
        
        foreach($records as $record) {
          echo "<input type='checkbox' name='cartt[]'    value =" . $record['name'] . ">";
          echo $record['name'] . " - ". $record['price'] . "<br/> ";
      }
    }
    
        function getVegetarian()
    {
        global $dbConn;
        
        $sql = "SELECT * 
                FROM vegetarian
                ORDER BY name";
        
        if (isset($_GET['nameSort'])){
            if($_GET['nameSort'] == "ascending"){
                $sql = "SELECT * FROM vegetarian ORDER BY name ASC";
            } else {
                $sql = "SELECT * FROM vegetarian ORDER BY name DESC";
            }
        }
         
         
        if (isset($_GET['sort']))
            $sql = "SELECT * FROM vegetarian ORDER BY price";    
            
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<form>";
        echo "<table align='center'>";
                echo "<tr><td> </td>" . "<td>Item</td>" . "<td> Price </td>" . "<td> Image </td></tr>" ;
        foreach ($records as $record)
        {
            echo "<tr><td>". "<input type='submit' name='cartt' value ='".$record['name']."'> </td>" ;
            echo "<td>" .$record['name']. "</td><td>" .$record['price']. "</td><td><img src='img/Vegetarian/".$record['name'].".jpg'/></td></tr>";
        }
        
        echo "</table>";
        echo "</form>";
        
    
    }
    // function addToCart(){
    //     if(isset($_GET['addCart'])){
    //         header("Location: shoppingCart.php");
    //     }
    // }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Guest </title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    </head>
    <body >
        
                <h1> <b> Bakery </b></h1>
                <h2>Welcome Guest!</h2>
        
        <form>
            <h2> Please choose from our wide selection: <select name="option"> </h2>
                <option>Choose one</option>
                <option>Pan Dulce</option>
                <option>Drinks</option>
                <option>Pastries</option>
                <option>Sandwiches</option>
                <option>Vegetarian</option>
            </select>
            
            </br>
           Order Alphabetically: <input type="radio" name="nameSort" value="ascending">
           Order Reverse Alphabetically: <input type="radio" name="nameSort" value="descending">
            </br>
            Order by price: <input type="checkbox" name="sort">
            </br>
            <input type='submit' name='submitRequest' value="Get Foods">
            <!--<input type='submit' name = "addCartt" value ="Submit">-->
            
        </form>
        
        <?php
            
            if($counter == 0){
                displayAll();
                $counter++;
            }
            ?>
            <form action="login.php">
        <button type="submit" name = "logout">Sign out</button>
    </body>
</html>
