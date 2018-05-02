<?php

include '../dbConnection.php';

    session_start();
    
    $conn = getDatabaseConnection('bakery');
    
    
    function displayAll()
    {
    global $conn;
    $sql = "SELECT * 
            FROM allitems
            WHERE 1
            ORDER BY name" ;  //Getting all records 
    $statement= $conn->prepare($sql); 
      $statement->execute($namedParameters); //Always pass the named parameters, if any
      $records = $statement->fetchALL(PDO::FETCH_ASSOC);
    echo "<form>";
    echo "<table align='center'>";
        
    echo "<tr>" . "<td>Item</td>" . "<td> Price </td>" ;


        foreach ($records as $record)
        {
            //echo "<tr><td>". "<input type='text' name='cart'  value =" . $record['name'] . "> </td>" ;
            echo "<tr><td>" .$record['name']. "</td><td>" .$record['price']. "</td></tr>";
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
        $sql = "SELECT * 
            FROM allitems
            ORDER BY price";  //Getting all records 
            $statement= $conn->prepare($sql); 
      $statement->execute($namedParameters); //Always pass the named parameters, if any
      $records = $statement->fetchALL(PDO::FETCH_ASSOC);
    echo "<form>";
    echo "<table align='center'>";
        
    echo "<tr>" . "<td>Item</td>" . "<td> Price </td>" ;


        foreach ($records as $record)
        {
            //echo "<tr><td>". "<input type='text' name='cart'  value =" . $record['name'] . "> </td>" ;
            echo "<tr><td>" .$record['name']. "</td><td>" .$record['price']. "</td></tr>";
        }
        
        echo "</table>";
        echo "</form>";
    }
    function getAverage(){
        $avg = 0;
        global $conn;
        $sql = "SELECT * 
            FROM allitems
            ORDER BY price";  //Getting all records 
            $statement= $conn->prepare($sql); 
      $statement->execute($namedParameters); //Always pass the named parameters, if any
      $records = $statement->fetchALL(PDO::FETCH_ASSOC);
       echo "<form>";
    echo "<table align='center'>";
        
    echo "<tr>" . "<td>Item</td>" . "<td> Price </td>" ;


        foreach ($records as $record)
        {
            //echo "<tr><td>". "<input type='text' name='cart'  value =" . $record['name'] . "> </td>" ;
            echo "<tr><td>" .$record['name']. "</td><td>" .$record['price']. "</td></tr>";
            $avg += $record['price'];
        }
        echo "<tr><td><b>Total</td><td>" . $avg . "</td></tr>";
        echo "</table>";
        echo "</form>";
    }
    function addItem(){
        
        global $conn; 
        
        $sql = "INSERT INTO allitems 
                (name, price)
                VALUES
                (:name, :price)"; 
                 
        $namedParameters = array();
        $namedParameters[':name']    = $_POST['item'];
        $namedParameters[':price'] = $_POST['price'];
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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    </head>
    <body>
        
                <h1> <b> Bakery </b></h1>
                <h2>Welcome Admin</h2>
                <h1>Admin Tables</h1>
                <br />Get All Products in alphabetical order
                <?=displayAll()?>
                <br /> Get All Products by Price
                <?=displaybyPrice()?>
                <br /> Total Price of Store
                <?=getAverage()?>
                
            <h1> Admin Options<h1/>
            <h2>Admin - Add Item</h2>
            
            <h3>Items are listed below, please refer to the list and select an item to update:</h3>
            
        
           
            <form method = "POST">
                 Item (e.g. Conchitas): <input type='text' name = "item"> <br/>
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
                
                
    </body>
</html>
