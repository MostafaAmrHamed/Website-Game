<!DOCTYPE html>
<html>
    <head>
        <title> Battlefield </title>
        <link rel="stylesheet" href="../css/Style.css">
        <?php require_once "../HTML/Nav.html";?>
        <?php require_once "../Javascript/Code.js";?>
        <?php
        //check if a coockie for the user is set to change the login button to the username
            if(isset($_COOKIE['user']))
            {
                $name = $_COOKIE['user'];
                echo"<script>logged('$name');</script>";
            }
        ?>
    </head>
    <body background="../BG2.jpg">
        
        <!----------------------[Bottom]---------------------->

        <div id="div1" align="center">
            
                    <!-- This video show  you our game -->
            <video width="60%" controls >
                <source src="../Game Trailer.mp4" type="video/mp4">
            </video><br>
            
            <form action="Register.php">
                
                <!-- This button take you to register to our game -->
                <button class="button" style="vertical-align:middle">
                    <span>Join us! </span>
                </button>
                
            </form>
        </div>
            

       
    </body>
</html>