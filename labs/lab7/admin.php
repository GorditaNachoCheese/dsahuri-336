<?php

session_start();
include '../../dbConnection.php';
$conn = getDatabaseConnection("ottermart");
function displayAllProducts(){
    global $conn;

    $sqlone = "SELECT productName, productDescription 
               FROM om_product";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);           
    echo $sqlone;
               
}   
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Admin Main Page</title>
    </head>
    <body>
        <h1> Admin Main Page</h1>
        <h3> Welcome <?$_SESSION['adminName']?> </h3>
        
        <br />
        
        <?=displayAllProducts()?>
    </body>
</html>