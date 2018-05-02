<?php

//Check that the session is active

    include "../dbConnection.php";
    
    $conn = getDatabaseConnection('bakery');
    
    function getDepartments() {
        global $conn;
        $sql = "SELECT deptName, departmentId 
                FROM department 
                ORDER BY deptName ASC";
                
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    function displayAll()
    {
    global $conn;
    $sql = "SELECT * 
            FROM allitems
            WHERE 1" ;  //Getting all records 
                
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<form>";
        echo "<table align='center'>";
        
                echo "<tr><td> </td>" . "<td>Item</td>" . "<td> Price </td>" . "<td> Image </td></tr>" ;


        foreach ($records as $record)
        {
            echo "<tr><td>". "<input type='checkbox' name='cartt[]'  value =" . $record['name'] . "> </td>" ;
            echo "<td>" .$record['name']. "</td><td>" .$record['price']. "</td><td><img src='img/pastries/".$record['name'].".jpg'/></td></tr>";
        }
        
        echo "</table>";
        echo "</form>";
        if(isset($_GET['cartt[]'])){
            update
        }
        // if (isset($_GET['submitRequest']) && $_GET['option'] == "Pan Dulce")
        //         getPanDulce();
            
        //     if (isset($_GET['submitRequest']) && $_GET['option'] == "Pastries")
        //         getPastries();
                
        //     if (isset($_GET['submitRequest']) && $_GET['option'] == "Drinks")
        //         getDrinks();
                
        //     if (isset($_GET['submitRequest']) && $_GET['option'] == "Sandwiches")
        //         getSandwich();
                
        //     if (isset($_GET['submitRequest']) && $_GET['option'] == "Vegetarian")
        //         getVegetarian();
            
            
      $statement= $conn->prepare($sql); 
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
    function update(){
        
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Update User</title>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    </head>
    <body>


       <h1> Tech Checkout System</h1>
       <fieldset>
        <legend> Update User</legend>
            <input type="submit" value="Update User" name="updateUser">
        </form>
        </fieldset>


    </body>
</html>