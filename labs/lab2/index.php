<!DOCTYPE html>
<?php
    include 'inc/functions.php';
?>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <meta charset = "utf-8"/>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        
            <div id="machine">
                <?php
                
                play();
                
                ?>
                
                <form>
                    <input type="submit" value="Spin!" />
                </form>
            </div>
            
            <footer>
                <img src="img/buddy.jpg" alt="buddy">
            </footer>
    </body>
</html>