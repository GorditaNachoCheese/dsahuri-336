<!DOCTYPE html>
<html>
    <head>
        <title>CSUMB - Official Survey</title>
        
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet"> 
    </head>
  
    <body>
        <div id="banner" >
          <img src='img/petregistration.jpg' />
        </div>
  
        <form method="post" action="functions.php" target="_self">  
        
          <p><span class="required"><strong>* required field</strong></span></p>
          
          <h3>Pet Information</h3>
          
          <br>
          
          <label for="pet_name"><b>Pet Name:</b></label>
          <input id="pet_name" type="text" name="pet_name" value="<?php echo $pet_name;?>">
          <span class="error"><b>*</b> <?php echo $pet_nameErr;?></span>
          
          <br><br>
          
          <label for="age"><strong>Pet's Age:</strong></label>
          <input id="age" type="number" value="<?php echo $age;?>" name="age" step="1"min="0" max="30" placeholder="1">
          <span class="error"><b>*</b> <?php echo $ageErr;?></span>
          
          <br><br>
          
          <b>Type:   </b>
          <label for="dog">Dog</label>
          <input id="dog" type="radio" name="type" <?php if (isset($type) && $type=="dog") echo "checked";?> value="dog">
          <label for="cat">Cat</label>
          <input id="cat" type="radio" name="type" <?php if (isset($type) && $type=="cat") echo "checked";?> value="cat">
          <label for="other">Other</label>
          <input id="other" type="radio" name="type" <?php if (isset($type) && $type=="other") echo "checked";?> value="other">
          <span class="error"><b>*</b> <?php echo $typeErr;?></span>
          
          <br><br>
          
          <label for="breed"><b>Breed/Species:</b></label>
          <input id="breed" type="text" name="breed" value="<?php echo $breed;?>">
          <span class="error"><b>*</b> <?php echo $breedErr;?></span>
          
          <br><br>
          
          <b>Gender:   </b>
          <label for="male">Male</label>
          <input id="male" type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">
          <label for="female">Female</label>
          <input id="female" type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">
          <span class="error"><b>*</b> <?php echo $genderErr;?></span>
          
          <br><br>
           
           <h3>Owner Information</h3>
           
           <br>
           
          <label for="name"><b>Name:</b></label>
          <input id="name" type="text" name="name" value="<?php echo $name;?>">
          <span class="error"><b>*</b> <?php echo $nameErr;?></span>
          
          <br><br>
          
          <label for="email"><b>E-mail:</b></label>
          <input id="email" type="text" name="email" value="<?php echo $email;?>">
          <span class="error"><b>*</b> <?php echo $emailErr;?></span>
          
          <br><br>
          
          <input id="button" type="submit" name="submit" value="Submit"> 
          
        </form>

    </body>

    <footer>
        <p style="color:white">CST 336 Internet Programming &copy;2018. All rights reserved. <br>
                        Danial Sahuri</p>
    </footer>
</html>

