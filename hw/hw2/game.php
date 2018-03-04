<?php
            function display_items($item = null)
            {
                $items = array(
                    "rock"      => '<a id="left-element" href="?item=rock">Rock<br/><img src="img/rock.png" width="135" height="135" alt="rock"></a>',
                    "paper"     => '<a href="?item=paper">paper<br/><img src="img/paper.png" width="135" height="135" alt="paper"></a>',
                    "scissors"  => '<a href="?item=scissors">scissors<br/><img src="img/scissors.png" width="135" height="135" alt="scissors"></a>'
                    );
                    
                if($item == null):
                    foreach( $items as $item => $value):
                        echo $value;
                    endforeach;
                else:
                    echo str_replace("?item={$item}", "#", $items[$item]);
                endif;
            }
            
            function game()
            {
                if(isset($_GET['item']) == TRUE):
                    $items = array('rock', 'paper', 'scissors'); //valid items
                    $user_item = strtolower($_GET['item']); //user items
                    $comp_item = $items[rand(0,2)];
                    echo $comp_item;
                    
                    if(in_array($user_item, $items) == FALSE):
                        echo "<h1>Choose ROCK | PAPER | SCISSORS</h1>" ;
                        die;
                    endif;
                    
                    if($user_item == 'scissors' && $comp_item == 'paper' ||$user_item == 'paper' && $comp_item == 'rock' || $user_item == 'rock' && $comp_item == 'scissors'):
                        echo '<h2> You Win!</h2>';
                    endif;
                    
                    if($comp_item == 'scissors' && $user_item == 'paper' ||$comp_item == 'paper' && $user_item == 'rock' || $comp_item == 'rock' && $user_item == 'scissors'):
                        echo '<h2> Computer Wins!</h2>';
                    endif;
                    
                    if($user_item == $comp_item):
                        echo '<h2>Tie!</h2>';
                    endif;
                    
                    display_items($user_item);
                    
                    display_items($comp_item);
                    
                    echo '<div><a href="./">Play Again!</a></div>';
                else:
                    display_items();
                endif;
            }
?>