<?php
session_start();

if (!isset($_SESSION['username'])) {  //checks whether the admin is logged in
    header("Location: index.php");
}

   include 'database.php'; 
  

   
   function shoeList() {
       
       
      
       
       if (isset($_GET['submit'])) {
           
           if (!empty($_GET['shoe_brand'])) {
               
               
               $sql =  "SELECT count(*) as a from f_shoes WHERE shoe_brand = '". $_GET['shoe_brand'] . "'"; 
               
           }
           
        
       
       $dbConn = getDatabaseConnection(); 
   
       
       $statement = $dbConn->prepare($sql);
       $statement->execute();
        
       $records = $statement->fetchAll(); 
        
       foreach ($records as $record) {
            echo "<div class='tittle'> Number of Shoes: ".$record["a"]."</div><br>"; 
       }
   } }
   
   function shoebrand() {
        $dbConn = getDatabaseConnection(); 
        $sql = 'SELECT DISTINCT(brand_name), brand_id  FROM f_brand;'; 
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        
        $records = $statement->fetchAll(); 
        
        foreach ($records as $record) {
            echo "<option value='". $record['brand_id']. "'>". $record['brand_name']. "</option>"; 
        }
   }
  
  ?>
  
 
<html>
      <head>
        <link href="style.css" rel="stylesheet" type="text/css" />   
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
        <h1> Shoes per Brand </h1>
        <h2> Select Brand</h2>
        </header>
        </br>
        </br>
        </br>
          <form>
               
               
               Shoe Brand: 
               <select name="shoe_brand">
                     <option value=""></option>
                     <?=shoebrand()?>
               </select>
               </br>
               
               <input type="submit" value="Search" name="submit">
          </form>
          
          <?=ShoeList()?>
      </body>
  </html>