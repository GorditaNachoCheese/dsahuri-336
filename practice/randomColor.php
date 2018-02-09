<?php

    function getRandomColor(){
        
        echo "background-color: rgba($red,$green,$blue,1)"
        
    }

?>


<!DOCTYPE html>


<html>
    <head>
        <title> Random Color </title>
        
    </head>
        <style>
        
        
        
            body{
                
                <?php
                
                $red= rand(0,255);
                $blue= rand(0,255);
                $green= rand(0,255);
                echo "background-color: rgba($red,$green,$blue,1)"
                
                
                ?>
                
                /*alpha (a in rgba) = opacity (3rd value) */
            }
            
        </style>
    </head>
        
    <body>
        <?php
       
        
        
        
        ?>
    </body>
    
</html>