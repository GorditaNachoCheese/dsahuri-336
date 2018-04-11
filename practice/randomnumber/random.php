<?php
session_start();
if(!isset($_SESSION['randomNumbers'])){
    $_SESSION['guessHistory'] = array();
    $_SESSION['randomNumbers'] = array();
    $_SESSION['randomNumbers'][] = rand(1,100);
    $_SESSION['trys'] = 0;
    $result;
}
   if($_SERVER['REQUEST_METHOD']==='POST')
   {
        if(isset($_POST["guessForm"]))
    {
        $_SESSION['trys'] = $_SESSION['trys'] + 1;
        $n1=0;
        
        if($_SESSION['randomNumbers'][0] == $_POST['number1'])
        {
            $n1=1;
            echo '<h3>';
            $result = "Your guess for the first number was correct";
            echo $result;
            array_push($_SESSION['guessHistory'],$result);
            echo '</h3>';
            echo '<br/>';
        }
        else 
        {
            if($_SESSION['randomNumbers'][0] < $_POST['number1'])
            {
                echo '<h3>';
                echo "Your guess for the first number was too high";
                echo '</h3>';
                echo '<br/>';
            }
            else if($_SESSION['randomNumbers'][0] > $_POST['number1'])
            {
                echo '<h3>';
                echo "Your guess for the first number was too low";
                echo '</h3>';
                echo '<br/>';
            }
        }
       
        if($n1 == 1 )
        {
            echo "<h2>The Numbers were: ";
            echo $_SESSION['randomNumbers'][0];
        
            echo "</h2>";
            $result = "<br/><h3>It took you ".$_SESSION['trys']." guesses</h3>";
            echo $result;
            array_push($_SESSION['guessHistory'],$result);
            session_unset();
        }
    }
    else if(isset($_POST["giveUp"]))
    {
        echo "<h2>YOU GAVE UP<br/>The Number was: ";
        echo $_SESSION['randomNumbers'][0];
        echo $_SESSION['guessHistory'];
        echo "</h2>";
        session_unset();
        
    }
    else if(isset($_POST["reset"]))
    {
        session_unset ();
        header("Location: random.php");
    }
    
}

// function printHistory(){
//     global $result;
    
//     foreach ($_SESSION['guessHistory'] as $result){
//         echo $result;
//     };
// };
//   printHistory();

?>
<!DOCTYPE html>
<html>
    <head>
        
        <title>Guess the Number</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        
    </head>
    
    <body>
       
        <blockquote>
            <h1> Guess the Numbers </h1>
            <h3> Guess a number between 1 and 100!</h3>
            <form method="POST">
                Number: <input type="text" name="number1"/>
                <br />
                <input type="submit" value="Guess Numbers" name="guessForm"/>
                <br /><br />
                <input type="submit" value="Give Up" name="giveUp"/>
                <input type="submit" value="Reset" name="reset"/>
            </form>
            <?php
            echo '<h3>';
            echo "Guesses: ".$_SESSION['trys'];
            echo '</h3>';
            echo '<br/>';
            ?>
        </blockquote>

    </body>
        
</html>