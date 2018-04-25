<?php
    include '../../dbConnection.php';
    $dbConn = getDatabaseConnection('homework5');

    function checkLogin() {
        global $dbConn;
        
        $sql = "SELECT * 
                FROM users";
                
        $statement= $dbConn->prepare($sql); 
        $statement->execute();
        $records = $statement->fetchALL(PDO::FETCH_ASSOC);  
        
        if (validateLogin($records)) {
            print_r("Success");
            
            $id = 0;
            
            foreach ($records as $record) {
                if ($record['username'] == $_GET['username']) {
                    $id = $record['userId'];
                }
            }
            
            $newLoc = "quiz.php?userId=" . $id;
            
            header('Location: ' . $newLoc);
            //jump to next page, pass userId as GET    
        }
        
        echo "<table>";
        
        echo "<tr>";
            echo "<th>User ID</th>";
            echo "<th>Username</th>";
            echo "<th>Password</th>";
        echo "</tr>";
        
        
        foreach($records as $record) {
            echo "<tr>";
                echo "<td>" . $record['userId'] . "</td>";
                echo "<td>" . $record['username'] . "</td>";
                echo "<td>" . $record['password'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }
    
    function validateLogin($records) {
        if (!isset($_GET['submit'])) {
            return false;
        }
        
        if (empty($_GET['username']) || empty($_GET['password'])) {
            print_r("Missing field.");
        }
        
        $username = $_GET['username'];
        
        foreach ($records as $record) {
            if ($username == $record['username']) {
                if ($_GET['password'] == $record['password']) {
                    return true;
                }
                return false;
            }
        }
        
        return false;
    }
?>