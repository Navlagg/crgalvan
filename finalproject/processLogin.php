<?php
session_start();  //MUST be included whenever $_SESSION is used in the program

include '../dbConnection.php';

$conn = getDatabaseConnection("bakery");

$username = $_POST['username'];
$password =  hash("sha1", $_POST['password']);//sha1($_POST['password']);  // hash("sha1", $_POST['password']);

$sql = "SELECT * 
        FROM admin
        WHERE username = :username
          AND password = :password";

$namedParameters = array();          
$namedParameters[':username'] = $username;  
$namedParameters[':password'] = $password;  

$statement = $conn->prepare($sql);
$statement->execute($namedParameters);
$record = $statement->fetch(PDO::FETCH_ASSOC);
print_r($record);

    if (empty($record)) {  //it didn't find any record
        
        echo "Wrong username or password!";
        echo "<a href='login.php'> Try again </a>";
        
    } else {
        
        $_SESSION['username'] = $record['username'];
        $_SESSION['password'] = $record['password'];
        
        header('Location: admin.php');  //redirects to another program        
        
    }
?>
<?php
//if($_POST['username'] == "admin" && $_POST['password'] == "password")
               // header('Location: admin.php');
 ?>
            
<html>
    <head>
        <title>Process Login</title>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    </head>
    <body>
    </body>
</html>