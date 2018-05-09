<?php

function getDatabaseConnection()
{
    
$servername = "us-cdbr-iron-east-05.cleardb.net";
$username = "ba8be324ea87c8";
$password = "c00d271b";
$dbname = "heroku_99b01dd7d4929b2";

// $servername = "localhost";
// $username = "root";
// $password = "secret";
// $dbname = "shoes";

// Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    return $conn;
    
  }

// function getDatabaseConnection($dbName) {

// $host = "localhost";
// $dbname = $dbName;
// $username = "root";
// $password = "secret";

// //checks whether the URL contains "herokuapp" (using Heroku)
// if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
//   $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
//   $host = $url["host"];
//   $dbname = substr($url["path"], 1);
//   $username = $url["user"];
//   $password = $url["pass"];
// }

// $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
// $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// return $dbConn;

// }

  
 function getUsersThatMatchUserName() {
    
    $username = $_GET['username']; 

    
     $dbConn = getDatabaseConnection(); 

     $sql = "SELECT * from f_users WHERE username='$username'"; 
     
     $statement = $dbConn->prepare($sql); 
    
     $statement->execute(); 
     $records = $statement->fetchAll(); 
     echo json_encode($records); 
}




function signUp() {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $Email = $_POST['Email'];
    $username = $_POST['username']; 
    $password = $_POST['password'];
    
    
    
    $dbConn = getDatabaseConnection(); 

    $sql = "INSERT INTO f_users (firstname, lastname, username, password, Email) 
    VALUES 
    (:firstname, :lastname,:username, SHA1(:password), :Email)"; 
    
  
    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(array(
        firstname =>$firstname,
        lastname => $lastname,
        username => $username, 
        password => $password,
        Email => $Email,
        
    )); 
    
    // $records = $statement->fetchAll(); 
    echo json_encode(array(
        'success' => true
    )); 
}

if ($_GET['action'] == 'validate-username' ) {
    getUsersThatMatchUserName(); 
} else if ($_POST['action'] == 'signup' ) {
    signUp(); 
}
?>

