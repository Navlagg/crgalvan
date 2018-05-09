<?php

$sql1 = "SELECT COUNT(user_id) FROM `om_purchase`
        WHERE purchaseDate <= '2018-02-28' 
        AND purchaseDate >= '2018-02-01'";

$sql2 = "SELECT productName, email from om_product pr 
        INNER JOIN om_purchase p on pr.productId = p.productId 
        INNER JOIN om_user u on p.user_id = u.userId 
        WHERE u.email LIKE '%aol.com'";
        
$sql3 = "SELECT COUNT(user_id), sex from om_user u 
        INNER JOIN om_purchase p 
        on p.user_id = u.userId 
        GROUP BY sex";
        
$sql4 = "SELECT catName FROM om_purchase p
        INNER JOIN om_product pr 
        ON p.productId = pr.productId
        INNER JOIN om_category c 
        ON pr.catId = c.catId
        WHERE p.purchaseDate >= '2018-02-01' 
        AND p.purchaseDate <= '2018-02-28'
        ORDER BY catName";

 $host = "localhost";
 $dbname = "ottermart";
 $username = "root";
 $password = "";
 $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
 
 $stmt = $dbConn->prepare($sql2);
 $stmt->execute();
 $records = $stmt->fetchall(PDO::FETCH_ASSOC);
 print_r($records);
 
  echo "<br/><br/>Products bought by users with an AOL account: <br />";
 
 foreach ($records as $record) {
  
     echo $record['productName']  . "<br />";
   
 }
 
?>