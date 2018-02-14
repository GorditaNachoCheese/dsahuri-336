<?php
  
 
    $cards[] = "jack";
    array_push($cards, "queen", "king");
    
    $cards[2] = "ten";
    
    print_r($cards);
    echo "<hr>";
    $lastCard = array_pop($cards);
    displayCard($lastCard);
    echo "<hr>";
    print_r($cards);
    
    unset($cards[1]);
    echo "<hr>";
    print_r($cards);
    
    $cards = array_values($cards);
    echo "<hr>";
    print_r($cards);
    
    shuffle($cards);
    echo "<hr>";
    print_r($cards);
    echo "<hr>";
    
    $randomIndex = rand(0,count($cards)-1);
    displayCard($cards[$randomIndex]);
    echo "<hr>";
    $randomIndex = array_rand($cards);
    displayCard($cards[$randomIndex]);
    function displayCard($card)
    {
        global $cards;
        echo "<img src='img/cards/clubs/$card.png' />";
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>