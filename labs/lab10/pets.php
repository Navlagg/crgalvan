<?php

    include 'inc/header.php';
    
    include '../../dbConnection.php';
    
    function getAllPets(){
        
      $conn = getDatabaseConnection('pets');
      
      $sql = "SELECT id, name, type FROM pets ORDER BY name";
      
      $stmt = $conn->prepare($sql);  
      $stmt->execute();
      $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $records;  
    }
    
?>

<script>
    
    $(document).ready(function(){
        
            $(".petLink").click(function(){
                
                alert( $(this).attr("id") );
                
            });
        
        
    }); //document ready
    
    
</script>


<?php
    $petList = getAllPets();
    
    //print_r($petList);
    
    foreach ($petList as $pet) {
        
        echo "Name: <a href='#' class='petLink' id='".$pet['id']."'  > " . $pet['name'] . " </a> <br>";
        echo "Type: " . $pet['type'] . "<br><br>";
        
    }

?>


<div id="petInfo"></div>


<?php

    include 'inc/footer.php';

?>