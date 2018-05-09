<?php


  include 'database.php';
  $conn = getDatabaseConnection(shoes);
  
  $sql = "DELETE FROM f_shoes 
          WHERE shoe_id = " . $_GET['shoeId'];
          
  $stmt = $conn->prepare($sql);
  //$stmt->execute($sql);
  
  header("Location: info_u.php");
  
?>



