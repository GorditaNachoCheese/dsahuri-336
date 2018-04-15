<?php
session_start();
if(!isset($_SESSION['randomNumbers'])){
    $_SESSION['randomNumbers'] = array();
    $_SESSION['randomNumbers'][] = rand(1,100);
    $_SESSION['trys'] = 0;
    $history = array();
    $_SESSION['history'] = $history;
}

// if(!isset($_SESSION['history'])){
//     $_SESSION['history'] = array();
// }

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST["guessForm"]))
    {
        $_SESSION['trys'] = $_SESSION['trys'] + 1;
        $n1=0;
        $n2=0;
        if($_SESSION['randomNumbers'][0] == $_POST['number1'])
        {
            $n1=1;
            echo '<h3>';
            
            echo "Your guess is correct";
            // array_push($_SESSION['history'],$_SESSION['trys']);
            echo '</h3>';
            echo '<br/>';
            array_push($_SESSION['history'], $_POST['number1']);
        }
        else 
        {
            if($_SESSION['randomNumbers'][0] < $_POST['number1'])
            {
                echo '<h3>';
                echo "Your guess is too high";
                echo '</h3>';
                echo '<br/>';
                array_push($_SESSION['history'], $_POST['number1']);
            }
            else if($_SESSION['randomNumbers'][0] > $_POST['number1'])
            {
                echo '<h3>';
                echo "Your guess is too low";
                echo '</h3>';
                echo '<br/>';
                array_push($_SESSION['history'], $_POST['number1']);
            }
        }
        
    }
    else if(isset($_POST["giveUp"]))
    {
        echo "<h2>YOU GAVE UP<br/>The Correct Number is: ";
        echo $_SESSION['randomNumbers'][0];
       
        echo "</h2>";
        session_unset();
        
    }
    else if(isset($_POST["reset"]))
    {
        array_push($_SESSION['history'],$_SESSION['trys']);
        session_unset ($_SESSION['trys']);
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Guess the Number</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <blockquote>
        <h1> Guess the Number </h1>
        <h3> Guess the right number between 1 and 100!</h3>
        <form method="POST">
            
            Number 1: <input type="text" name="number1"/>
            <br />
            <input type="submit" value="Guess Number" name="guessForm"/>
            <br /><br />
             <input type="submit" value="Give Up" name="giveUp"/>
             <input type="submit" value="Reset" name="reset"/>
            
        </form>
        <?php
            echo '<h3>';
            echo "Guesses: ".$_SESSION['trys']; 
            echo '<br/>';
            // print_r($_SESSION['history']); //"Attempts: ".$_SESSION['history'];
            echo '</h3>';
            echo '<br/>';
            echo "Attempts: ";
            
            foreach($_SESSION['history'] as $try){
                echo $try;
                echo ", ";
            }
        ?>
                </blockquote>
    </body>
</html>