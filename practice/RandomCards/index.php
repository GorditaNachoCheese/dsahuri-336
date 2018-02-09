<!DOCTYPE html>
<html>
    <head>
        <title> Challenge Activity 2 </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        
        
        
        <meta charset = "utf-8"/>
    </head>
    <body>
        
        <h1>Random Card Game</h1>
        <div>
            <h3 id="Human">Human</h3>
            <h3 id="Computer">Computer</h3>
        </div>
         <?php
         
        for($i = 0; $i < 2; $i++){
        
            $randomSuit = rand(0,3);
    
            $randomCard = rand(0,4);
            
            displaySuit($randomSuit, $randomCard);
            
        
        }
        
        
        function displaySuit($randomSuit, $randomCard)
        {
            
            switch ($randomSuit)
            {
                case 0: $suit = "clubs";
                    break;
                case 1: $suit = "spades";
                    break;
                case 2: $suit = "hearts";
                    break;
                case 3: $suit = "diamonds";
                    break;
            
            }
            
             switch ($randomCard)
            {
                case 0: $card = "ace";
                    break;
                case 1: $card = "jack";
                    break;
                case 2: $card = "king";
                    break;
                case 3: $card = "queen";
                    break;
                case 4: $card = "ten";
                    break;
            }
            
            echo "<img src='img/cards/$suit/$card.png' alt='$card' width='100' />";
            
       
        }
        
       
        
        
        
        
        
        ?>

    </body>
</html>