<?php
    session_start();

    print_r($_POST); //displays values passed in the form
    
    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
    
    
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    //echo $password;
    
    //following sql does not prevent SQL injection
    $sql = "SELECT *
            FROM om_admin
            WHERE username = '$username'
            AND password = '$password'";
            
    $sql = "SELECT *
            FROM om_admin
            WHERE username = :$username
            AND password = :$password";
            
    $np = array();
    $np[":username"] = $username;
    $np[":password"] = $password;
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting one single record
    
    
    print_r($record);

    if(empty($record)){
        
        echo "Wrong username or password";
    }
    else{
        
        header("Location:admin.php");
    }



?>