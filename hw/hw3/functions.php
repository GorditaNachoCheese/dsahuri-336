




<?php

// define variables and set to empty values
$pet_nameErr = $ageErr = $typeErr = $breedErr = $genderErr = $nameErr = $emailErr = "";
$pet_name = $age = $type = $breed = $gender = $name = $email =  "";

global $pet_nameErr, $ageErr, $typeErr, $breedErr, $genderErr, $nameErr, $emailErr;

if (empty($_POST["pet_name"])) {
    $pet_nameErr = "Name is required";
  } 
  else {
    $pet_name = test_input($_POST["pet_name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$pet_name)) {
      $pet_nameErr = "Only letters and white space allowed"; 
    }
  }
  
  
  if (empty($_POST["age"])) {
    $ageErr = "Age is required";
  } 
  else {
  }
   
  
  if (empty($_POST["type"])) {
    $typeErr = "Type is required";
  } 
  else {
    $type = test_input($_POST["type"]);
  }
  
  
  if (empty($_POST["breed"])) {
    $breedErr = "Breed is required";
  } 
  else {
    $breed = test_input($_POST["breed"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$breed)) {
      $breed = "Only letters and white space allowed"; 
    }
  }
  
  
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function display(){
    
    global $pet_name, $age, $type, $breed, $gender, $name, $email;
   
    echo "<div id='input'><h2>Thank you for registering your pet <strong style='color:gold;'></strong> !</h2>
    <h4>Please review the information. </h4> <br><br>
    Your name is: <p id='response'<strong>$name</strong></p> <br>
    Your email is: <p id='response'<strong>$email</strong></p> <br>
    Your companion's name is:<p id='response'<strong>$pet_name</strong></p><br>
    Their age is: <p id='response'<strong>$age</strong><p> <br> 
    Their type is: <p id='response'<strong>$type</strong></p><br>
    Their breed is: <p id='response'<strong>$breed</strong></p> <br>
    Their gender is: <p id='response'<strong>$gender</strong></p><br>
    </div>";
  }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pet Registration</title>
        
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet"> 
    </head>
    <body>
            <?php 
            
              include "index.php"; 
              
              if (isset($_POST['pet_name']) && isset($_POST['age']) && isset($_POST['type'])
              && isset($_POST['breed']) && isset($_POST['gender']) && isset($_POST['name'])
              && isset($_POST['email']) && !empty($_POST['pet_name']) && !empty($_POST['age']) 
              && !empty($_POST['type']) && !empty($_POST['breed']) && !empty($_POST['gender'])
              && !empty($_POST['name']) && !empty($_POST['email']) 
              && strcmp($pet_nameErr,"Name is required") && strcmp($pet_nameErr,"Only letters and white space allowed")
              && strcmp($ageErr,"Age is required")
              && strcmp($typeErr,"Type is required") 
              && strcmp($breedErr,"Breed is required") && strcmp($breedErr,"Only letters and white space allowed")
              && strcmp($genderErr,"Gender is required")
              && strcmp($nameErr,"Name is required") && strcmp($nameErr,"Only letters and white space allowed")
              && strcmp($emailErr,"Email is required")  && strcmp($emailErr,"Invalid email format")){
                  display(); // if form was submitted, then display information.
              }
              else{
                // do nothing (don't display results).
              }
              
              
            ?>
  </body>
</html>