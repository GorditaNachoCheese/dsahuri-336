<?php

 //print_r($_GET); //displaying all content submitted in the form using the GET method

  $backgroundImage = "img/sea.jpg";
    
  if (isset($_GET['keyword'])) { //if form was submitted
      
      include 'api/pixabayAPI.php';
      
      echo "<h3>You searched for " . $_GET['keyword'] . "</h3>";
      
      $orientation = "horizontal";
      $keyword = $_GET['keyword'];
      
      if (isset($_GET['layout'])) { // user checked for layout.
        
        $orientation = $_GET['layout'];
        
      }
      
      if (!empty($_GET['categoy'])) { // user select a category.
          
        $keyword = $_GET['category'];
      }
      
      $imageURLs = getImageURLs($_GET['keyword'], $orientation);
      
      //$backgroundImage = $imageURLs[rand(0, count($imageURLs)-1];
      $backgroundImage = $imageURLs[array_rand($imageURLs)];
      
      //print_r($imageURLs);
      
      
  }      
  
  
  function checkCategory($category){
      
      if ($category == $_GET['category']){
          echo "selected";
      }
      
  }
 

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4: Pixabay Carousel </title>
    </head>
    <style>
        @import url("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
        @import url("css/styles.css");
        body {
            background-image: url(<?=$backgroundImage?>);
            background-size: 100% 100%;
            -moz-background-size: 100% 100%; /* Gecko 1.9.2 (Firefox 3.6) */
            -o-background-size: 100% 100%; /* Opera 9.5 */
            -webkit-background-size: 100% 100%;/* Safari 3.0 */
            -khtml-background-size: 100% 100%; /* Konqueror 3.5.4 */
            -moz-border-image: url(mtn.jpg) 0; /* Gecko 1.9.1 (Firefox 3.5) */
            
        }
        
        #carouselExampleIndicators {
            width: 20%;
            padding-top:100px;
            margin: 0 auto; /*centers a div container*/
        }
         
    </style>
    <body>

        <?php
        
            if (!isset($_GET['keyword'])) {
        
              echo "<h2> You must type a keyword or select a category </h2>";
            
            }  
        ?>

        

        <form method="GET">
            
             <input type="text" size="20" name="keyword" placeholder="Keyword to search for" value="<?=$_GET['keyword']?>"/>
             
            <input type="radio" name="layout" value="horizontal" id="hlayout" 
            <?php
                if($_GET['layout'] == "horizontal") {
                    echo "checked";
                }
            ?>
            >
            <label for="hlayout"> Horizontal </label>
            
            
            <input type="radio" name="layout" value="vertical" id="vlayout"  <?= ($_GET['layout']=="vertical")?"checked":"" ?>>>
            <label for="vlayout"> Vertical </label>
            
            
            
            
            <select id ="chooseCategory" name="category">
              <option value="">  Select One </option> 
              <option value="fashion" <?=checkCategory('fashion')?>>  Fashion </option>
              <option value="music" <?=checkCategory('music')?>>  Music </option>
              <option value="sports" <?=checkCategory('sports')?>>  Sports </option>
              <option value="places" <?=checkCategory('places')?>>  Places </option>
            </select>
            
            
            <input type="submit" value="Submit!"/>
                    
        </form>
        
        <?php
          
           if (isset($_GET['keyword'])) {
        ?>
        
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="<?=$imageURLs[0]?>" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="<?=$imageURLs[1]?>" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="<?=$imageURLs[2]?>" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="<?=$imageURLs[3]?>" alt="Fourth slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="<?=$imageURLs[4]?>" alt="Fifth slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="<?=$imageURLs[5]?>" alt="Sixth slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="<?=$imageURLs[6]?>" alt="Seventh slide">
                </div>
              </div>
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>
        
        <?php
            }//endIf
        ?>
        
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>