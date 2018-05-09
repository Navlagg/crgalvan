<?php

include '../dbConnection.php';
session_start();
    if(!isset($_SESSION["cart"]))
    {
     $_SESSION["cart"]= array();
    }
    $conn = getDatabaseConnection('finalproject');
    global $counter;
    $counter = 0;
    
    /*
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
    // }*/
    
    
    
    function displayCategories(){
        global $conn;
        
        $sql = "SELECT catId, catName FROM category ORDER BY catName";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //print_r($records);
        
        foreach ($records as $record) {
            
            echo "<option value='".$record["catId"]."' >" . $record["catName"] . "</option>";
            
        }
        
    }
    
    function displaySearchResults(){
        global $conn;
        
        if (isset($_GET['searchForm'])) { //checks whether user has submitted the form
            
            echo "<h3>Products Found: </h3>"; 
            
            //following sql works but it DOES NOT prevent SQL Injection
            //$sql = "SELECT * FROM om_product WHERE 1
            //       AND productName LIKE '%".$_GET['product']."%'";
            
            //Query below prevents SQL Injection
            
            $namedParameters = array();
            
            $sql = "SELECT * FROM products WHERE 1";
            
            if (!empty($_GET['product'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND name LIKE :productName";
                 $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
            }
                  
                  
             if (!empty($_GET['category'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND catId = :categoryId";
                 $namedParameters[":categoryId"] =  $_GET['category'];
            }        
            if (!empty($_GET['priceFrom'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND price >= :priceFrom";
                 $namedParameters[":priceFrom"] =  $_GET['priceFrom'];
            }    
              if (!empty($_GET['priceTo'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND price <= :priceTo";
                 $namedParameters[":priceTo"] =  $_GET['priceTo'];
            }    
            if(isset($_GET['orderBy'])){
                if($_GET['orderBy'] == "price"){
                    $sql .= " ORDER BY price";
                }
                else {
                    $sql .= " ORDER BY name";
                }
            }
            //echo $sql; //for debugging purposes
            
             $stmt = $conn->prepare($sql);
             $stmt->execute($namedParameters);
             $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
         echo "<form >";
        echo "<table align='center'>";
        
        echo "<tr><td> </td>" . "<td>Item</td>" . "<td> Price </td>" . "<td> Description </td></tr>" ;
         foreach ($records as $record) {
                
                echo "<tr><td>". "<input type='submit' name='cartt'   value =" . $record['name'] . "> </td>" ;
                echo "<td>" . $record['name']. "</td> <td>" . $record['price']. "</td><td>" . $record['description']. "</td></tr>";
            
            }
          
        
        
        echo "</table>";
        echo "</form>";
        
        
        
        
    
           
        }
        
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
        <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="guest.php">Home</a></li>
      <li><a href="menu.php">Menu</a></li>
      <li><a href="scart.php">Shopping Cart</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
  
        
        
        <div class="container">
        
                <h1> <b> Bakery </b></h1>
                <h2>Welcome Guest!</h2>
                
        <form>
            
            Product: <input type="text" name="product" /><br />
            
            Category: 
                <select name="category">
                    <option value=""> Select One </option>
                    <?=displayCategories()?>
                </select>
            <br />
            
            Price:  From <input type="text" name="priceFrom" size="7"/>
                    To   <input type="text" name="priceTo" size="7"/>
                    
            <br />
            
             Order result by:<br />
             
             <input type="radio" name="orderBy" value="price"/> Price <br />
             <input type="radio" name="orderBy" value="name"/> Name
             
             <br />
             <input type="submit" value="Search" name="searchForm" />
             
        </form>
        
        <br />
        <hr>
        
        <?= displaySearchResults() ?>
      <!--  <form>
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
            
        <!--</form>-->
        
        <form>
            <?php
            //displayAll();
            if(isset($_GET["cartt"]))
            {
            array_push( $_SESSION["cart"],$_GET['cartt']);
            } 
            
            
            //print_r($_SESSION["cart"]);
            
            if(isset($_GET['addCart']))
            {
                $list=$_POST['cartt'];
                print_r($list);
               foreach($_POST['cartt'] as $item)
                {
                array_push( $_SESSION["cart"],$item);
                }
            }
            
                    if(isset($_GET['submitRequest']))
            {
            ?> 
            
           
           
           <?php
           }
           ?>
           
         </form>  
         
              <a href ="scart.php">shopping cart</a>  
            <form action="login.php">
        <button type="submit" name = "logout">Sign out</button>
        </div>
    </body>
</html>
