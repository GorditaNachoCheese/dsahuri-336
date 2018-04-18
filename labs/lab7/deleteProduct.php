<?php
 include '../../dbConnection.php';
    
 $connection = getDatabaseConnection("heroku_99b01dd7d4929b2");
    
 $sql = "DELETE FROM om_product WHERE productId =  " . $_GET['productId'];
 $statement = $connection->prepare($sql);
 //$statement->execute();
 
 header("Location: admin.php");
?>