<?php

 include 'database.php';
 $conn = getDatabaseConnection();
function getShoeInfo() {
  global $conn;
    
    $sql = "SELECT * 
            FROM f_shoes
            WHERE shoe_id = " . $_GET['shoeId']; 
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
      
    return $record;
    
}

 if (isset($_GET['updateShoes'])) { //checks whether admin has submitted form.
     
     //echo "Form has been submitted!";
     
      $sql = "UPDATE f_shoes
              SET  
                   shoe_brand  = :shoe_brand,
                   shoe_name = :shoe_name,
                   shoe_availability = :shoe_availability,
                   Price = :Price
            WHERE shoe_id = :shoe_id";

     $np = array();
    
   
    $np[':shoe_brand'] = $_GET['shoe_brand'];
    $np[':shoe_name'] = $_GET['shoe_name'];
    $np[':shoe_availability'] = $_GET['shoe_availability'];
    $np[':Price'] = $_GET['Price'];
    $np[':shoe_id'] = $_GET['shoeId'];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
     
    echo "The Shoe has been updated!";
    
 }

 if (isset($_GET['shoeId'])) {
     
    $userInfo = getShoeInfo(); 
     
     
 }
 
 
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Update Shoes </title>
         <link href="style.css" rel="stylesheet" type="text/css"/>
         <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet"> 
    </head>
    <body>
    <header>
   
        <nav>
        <hr width= "50%" />
        
        <a href="info_u.php">Back</a>
        
        </nav>
        </br>
        <header>

        <h1> Update Shoes </h1>
                
        <form method="GET">
            <input type="hidden" name="shoeId" value="<?=$userInfo['shoe_id']?>" />
            Shoe Name:<input type="text" name="shoe_name" value="<?=$userInfo['shoe_name']?>" />
            <br />
           
            
            <br />
            Shoe Brand:
            <select name="shoe_brand">
            <option value="" > - Select One - </option>
            <option value="Reebok"  <?=($userInfo['shoe_brand']=='1')?" selected":"" ?>  > Reebok</option>
            <option value="Adidas"  <?=($userInfo['shoe_brand']=='11')?" selected":"" ?>  >Adidas</option>
            <option value="Nike"  <?=($userInfo['shoe_brand']=='21')?" selected":"" ?>  >Nike</option>
            <option value="UnderArmour"  <?=($userInfo['shoe_brand']=='31')?" selected":"" ?>  >UnderArmour</option>
            <option value="Puma"  <?=($userInfo['shoe_brand']=='41')?" selected":"" ?>  >Puma</option>
            <option value="Vans"  <?=($userInfo['shoe_brand']=='71')?" selected":"" ?>  >Vans</option>
            <option value="New Balance"  <?=($userInfo['shoe_brand']=='81')?" selected":"" ?>  >New Balance</option>
            <option value="Champion"  <?=($userInfo['shoe_brand']=='91')?" selected":"" ?>  >Champion</option>
            <option value="Converse"  <?=($userInfo['shoe_brand']=='101')?" selected":"" ?>  >Converse</option>
          
           
            </select>
            </br>
            Shoe Price:<input type="text" name="Price"value="<?=$userInfo['Price']?>"/>
            </br>
           Availability:
           <select name="shoe_availability">
                <option value=""> - Select One - </option>
                <option value="yes" <?=($userInfo['shoe_availability']=='yes')?" selected":"" ?> >Yes</option>
                <option value="no" <?=($userInfo['shoe_availability']=='no')?" selected":"" ?> >No</option>
                
            </select>
           <input type="submit" value="Update Shoe" name="updateShoes">
        </form>

    </body>
</html>