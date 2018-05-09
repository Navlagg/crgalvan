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
    
   if (isset($_GET['updateprice'])){
    
        //UPDATE  `tcp`.`user` SET  `phone` =  '8315552022' WHERE  `user`.`userId` =0;
        $sql = "UPDATE allitems
                SET price = :price,
                WHERE name = :name";
        $namedParameters = array();
        $namedParameters[":price"] = $_GET['newprice'];
        $namedParameters[":name"] = $_GET['item'];
        $statement = $conn->prepare($sql);
        $statement->execute($namedParameters);
   }
    // function addToCart(){
    //     if(isset($_GET['addCart'])){
    //         header("Location: shoppingCart.php");
    //     }
    // }
    function displaybyPrice(){
        global $conn;
        $sql = "SELECT p.name, ct.catName, cm.companyName, p.description, p.price
                FROM products p 
                INNER JOIN category ct ON p.catId = ct.catId 
                INNER JOIN company cm ON p.comId = cm.comId
                ORDER BY p.price, p.name";  //Getting all records 
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
        $sql = "SELECT AVG(price) avg
                FROM products
                WHERE 1";  //Getting all records 
        $statement= $conn->prepare($sql); 
      $statement->execute($namedParameters); //Always pass the named parameters, if any
      $records = $statement->fetchALL(PDO::FETCH_ASSOC);
      foreach ($records as $record)
        {
         echo "<tr><td><b>Average</td><td></td><td></td><td></td><td>" .  number_format((float)$record['avg'], 2, '.', '') . "</td></tr>";
        }
        echo "</table>";
        echo "</form>";

    }
    
    function getTotal(){
        $avg = 0;
        global $conn;
        $sql = "SELECT p.name, ct.catName, cm.companyName, p.description, p.price
                FROM products p 
                INNER JOIN category ct ON p.catId = ct.catId 
                INNER JOIN company cm ON p.comId = cm.comId
                ORDER BY p.price";  //Getting all records 
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
       $avg += $record['price'];
        }
        echo "<tr><td><b>Total</td><td></td><td></td><td></td><td>" . $avg . "</td></tr>";
        echo "</table>";
        echo "</form>";
    }
    function addItem(){
        
        global $conn;
        
        
        $sql = "INSERT INTO products 
                (name, price, description, catId, comId)
                VALUES
                (:name, :price, :description, :catId, :comId)"; 
                 
        $required = array('item', 'price', 'description', 'companyName', 'catName');

            // Loop over field names, make sure each one exists and is not empty
            $error = false;
            foreach($required as $field) {
              if (empty($_POST[$field])) {
                $error = true;
              }
            }
            
            if ($error) {
              echo "All fields are required.";
              exit;
            } 
        $namedParameters = array();
        $namedParameters[':name']    = $_POST['item'];
        $namedParameters[':price'] = $_POST['price'];
        $namedParameters[':description'] = $_POST['description'];
        
        if($_POST['companyName'] == "Adrian's Panaderia"){
            $com = 1;
        } 
        else if($_POST['companyName'] == "Cristian's Corner"){
            $com = 2;
        } 
        else{
            $com = 3;
        }
        $namedParameters[':comId'] = $com;
        
        if($_POST['catName'] == "Bread"){
            $cat = 1;
        } 
        else if($_POST['catName'] == "Drinks"){
            $cat = 2;
        } 
        else if($_POST['catName'] == "Pastries"){
            $cat = 3;
        } 
        else if($_POST['catName'] == "Sandwiches"){
            $cat = 4;
        } 
        else{
            $cat = 5;
        }
        
        $namedParameters[':catId']    = $cat;
        
        $statement = $conn->prepare($sql);
        $statement->execute($namedParameters);
        
        echo "Product was added! <br />";
        
    }
    
    if(isset($_POST['addItem'])){
        //echo "Form was submitted!";
        addItem();
    }
    function deleteItem(){
        
        global $conn; 
        
        $sql = "DELETE FROM allitems
                WHERE name= :name"; 
                 
        $namedParameters = array();
        $namedParameters[':name']    = $_POST['item'];
        $statement = $conn->prepare($sql);
        $statement->execute($namedParameters);
        
        echo "Item was deleted! <br />";
        
    }
    
    if(isset($_POST['deleteItem'])){
        //echo "Form was submitted!";
        deleteItem();
    }
    function updateItem(){
        global $conn;
        $required = array('item', 'price', 'companyName', 'catName');

            // Loop over field names, make sure each one exists and is not empty
            $error = false;
            foreach($required as $field) {
              if (empty($_POST[$field])) {
                $error = true;
              }
            }
            
            if ($error) {
              echo "All fields are required.";
              exit;
            } 
        $sql = "UPDATE products
                SET price= :price, catId =:catId, comId=:comId
                WHERE name = :name;";
        $namedParameters = array();
        $namedParameters[':name']    = $_POST['item'];
        $namedParameters[':price'] = $_POST['price'];
        
        
        if($_POST['companyName'] == "Adrian's Panaderia"){
            $com = 1;
        } 
        else if($_POST['companyName'] == "Cristian's Corner"){
            $com = 2;
        } 
        else{
            $com = 3;
        }
        $namedParameters[':comId'] = $com;
        
        if($_POST['catName'] == "Bread"){
            $cat = 1;
        } 
        else if($_POST['catName'] == "Drinks"){
            $cat = 2;
        } 
        else if($_POST['catName'] == "Pastries"){
            $cat = 3;
        } 
        else if($_POST['catName'] == "Sandwiches"){
            $cat = 4;
        } 
        else{
            $cat = 5;
        }
        
        $namedParameters[':catId']    = $cat;
        $statement = $conn->prepare($sql);
        $statement->execute($namedParameters);
    }
    if(isset($_POST['updateItem'])){
        updateItem();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin </title>
       
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link rel="stylesheet" href="css/styles.css" type="text/css" />
       <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="logout.php">Logout</a></li>
    </ul>
  </div>
        <div class="container">
          
                <h1> <b> Bakery </b></h1>
                <h2>Welcome Admin</h2>
                <h1>Admin Tables</h1>
                <br /><h2>Get All Products and Categories in alphabetical order</h2>
                <?=displayAll()?>
                <br /> <h2>Get All Products by Price and Average</h2>
                <?=displaybyPrice()?>
                <br /> <h2>Total Price of Store</h2>
                <?=getTotal()?>
                
            <h1> Admin Options<h1/>
            <h2>Admin - Add Item</h2>
            
            <h3>Items are listed below, please refer to the list and select an item to update:</h3>
            
        
           
            <form method = "POST">
                <strong>Item (e.g. Conchitas):</strong> <input type='text' name = "item"> <br/>
                
               <strong>Company:</strong> <select name="companyName"> </h2>
                <option>Choose one</option>
                <option>Adrian's Panaderia</option>
                <option>Cristian's Corner</option>
                <option>Joshua's Pastries</option>
                <br />
                </select>
               <strong>Category:</strong> <select name="catName"> </h2>
                <option>Choose one</option>
                <option>Bread</option>
                <option>Drinks</option>
                <option>Pastries</option>
                <option>Sandwiches</option>
                <option>Vegetarian</option>
                <br />
                </select>
                <br />
                <strong>Description:</strong> <input type='text' name = 'description'><br />
                <strong>Price:</strong> <input type='text' name = 'price'><br />
                <input type="submit" value="Add Item" name="addItem">
            
                
            </form>
            <br/> <br/>
            <h2>Admin - Delete Item</h2>
            <form method = "POST">
                <strong>Item (e.g. Conchitas):</strong> <input type='text' name = "item"> 
                <input type="submit" value="Delete Item" name="deleteItem">
                
            </form>
            <br /><br />
            <h2>Admin - Update Item</h2>
            
            <form method = "POST">
                 <strong>Item (e.g. Conchitas):</strong> <input type='text' name = "item"> <br/>
                
               <strong>Company: </strong><select name="companyName"> </h2>
                <option>Choose one</option>
                <option>Adrian's Panaderia</option>
                <option>Cristian's Corner</option>
                <option>Joshua's Pastries</option>
                <br />
                </select>
               <strong>Category</strong><select name="catName"> </h2>
                <option>Choose one</option>
                <option>Bread</option>
                <option>Drinks</option>
                <option>Pastries</option>
                <option>Sandwiches</option>
                <option>Vegetarian</option>
                <br />
                </select>
                <br />
                <strong>Price:</strong> <input type='text' name = 'price'><br />
                <input type="submit" value="Update Item" name="updateItem">
                
            </form>
            <br />
            <br />
        <form action="logout.php">
        <button type="submit" name = "logout">Sign out</button>
    </form>
                
    </div>    
    
    </body>
</html>
