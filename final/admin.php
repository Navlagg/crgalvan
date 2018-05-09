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
        $sql = "SELECT AVG(price)
                FROM products";  //Getting all records 
        $statement= $conn->prepare($sql); 
      $statement->execute($namedParameters); //Always pass the named parameters, if any
      $records = $statement->fetchALL(PDO::FETCH_ASSOC);
         echo "<tr><td><b>Total</td><td></td><td></td><td></td><td>" . $records[0] . "</td></tr>";
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
        $sql = "UPDATE allitems
                SET price= :price
                WHERE name = :name;";
        $namedParameters = array();
        $namedParameters[':name']    = $_POST['item'];
        $namedParameters[':price'] = $_POST['newprice'];
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
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 
    </head>
    <body>
        <div class="container">
                <h1> <b> Bakery </b></h1>
                <h2>Welcome Admin</h2>
                <h1>Admin Tables</h1>
                <br />Get All Products and Categories in alphabetical order
                <?=displayAll()?>
                <br /> Get All Products by Price and Average
                <?=displaybyPrice()?>
                <br /> Total Price of Store
                <?=getTotal()?>
                
            <h1> Admin Options<h1/>
            <h2>Admin - Add Item</h2>
            
            <h3>Items are listed below, please refer to the list and select an item to update:</h3>
            
        
           
            <form method = "POST">
                 Item (e.g. Conchitas): <input type='text' name = "item"> <br/>
                
               <select name="companyName"> </h2>
                <option>Choose one</option>
                <option>Adrian's Panaderia</option>
                <option>Cristian's Corner</option>
                <option>Joshua's Pastries</option>
                <br />
                </select>
               <select name="catName"> </h2>
                <option>Choose one</option>
                <option>Bread</option>
                <option>Drinks</option>
                <option>Pastries</option>
                <option>Sandwiches</option>
                <option>Vegetarian</option>
                <br />
                </select>
                Description: <input type='text' name = 'description'><br />
                Price: <input type='text' name = 'price'><br />
                <input type="submit" value="Add Item" name="addItem">
            
                
            </form>
            <br/> <br/>
            <h2>Admin - Delete Item</h2>
            <form method = "POST">
                Item (e.g. Conchitas): <input type='text' name = "item"> 
                <input type="submit" value="Delete Item" name="deleteItem">
                
            </form>
            <br /><br />
            <h2>Admin - Update Item</h2>
            
            <form method = "POST">
                Item (e.g. Conchitas): <input type='text' name = "item"><br />
                New Price: <input type='text' name = 'newprice'><br />
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