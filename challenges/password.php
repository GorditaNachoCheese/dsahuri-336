<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
    <?php    
        function randomPassword() {
            //$alphabet = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","1",
           // "2","3","4","5","6","7","8","9");
            $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 5; $i++) {
              
                $n = rand(0, $alphaLength);
                
                
                $pass[] = $alphabet[$n];
                    
                }
                echo implode($pass );
               
            }
            
        
      
        
        randomPassword();
    ?>
    </body>
</html>