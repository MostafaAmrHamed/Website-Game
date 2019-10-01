<!DOCTYPE html>
<html>
    <head>
        <title> Battlefield </title>
        <link rel="stylesheet" href="../css/Style.css">
        <?php require_once "../HTML/Nav.html";?>
        <?php require_once "../php/code.php";?>
        <?php require_once "../Javascript/Code.js";?>
        <?php ob_start() ?>

        <style>
                /* Design  input form  */
            input[type=password],input[type=email] 
            {
                width: 80%;
                box-sizing: border-box;
                border: 2px solid #ccc;
                border-radius: 10px;
                font-size: 16px;
                background-color: rgba(255, 255, 255, 0.678);
                padding: 5px 50px 3px 20px;
            }
        </style>
    </head>
    <body background="../BG2.jpg">
        <!----------------------[Bottom]---------------------->

        <div id="div1" align="center">
            
            <form method="post">
                
                <font size="5" face="sans-serif">
                    <table id="color1">

                        <tr class="spaceUnder">
                            <th>Email</th>
                            <td> <input  type="email" name="email"></td>
                        </tr>

                        <tr class="spaceUnder">
                            <th>Password</th>
                            <td> <input  type="password" name="pw"></td>
                        </tr>
                        
                    </table>
                </font>
                
                <button class="button" style="vertical-align:middle;" name="login" onclick="action" id="togglee">
                    <span>Login </span>
                </button>
                
                <a href="Change.php" style="font-size:21px;"> Change Password </a><br>
                
               
                <?php
                if(isset($_COOKIE['user']))
                {
                    $name = $_COOKIE['user'];
                    echo"<script>alert('$name');</script>";
                    echo"<script>logged('$name');</script>";
                }
                if(isset($_POST['login']))
                {
                    $username = $_POST['email'];
                    $pass = $_POST['pw'];
                    
                    //Checking from email and pw you have entered are right or not
                    $sql = "SELECT COUNT(*) FROM  register1 WHERE email = ? AND pw = ?";
                    
                    $sql2 = "SELECT IGN FROM register1 WHERE email = ?"; //Return IGN =(In Game Name) 
                    
                    $IGN = $conn -> prepare($sql2);
                    $stmt = $conn -> prepare($sql);
                    
                    $stmt -> execute(array($username,$pass));
                    $IGN -> execute(array($username));
                    
                    $row2 = $IGN-> fetch();
                    $row = $stmt-> fetch();
                    $name = $row2[0];
                    $count = (int)$row[0];
                    if($count > 0)
                    {
                        echo "<br><h1><a href='#'> Welcome ".$row2[0]." </a></h1>";
                        setcookie('user',$name, time() + 86400 * 3);
                        echo"<script>window.location='Home.php';</script>";
                    }
                    else 
                    echo "<font color='red' size='5'> *Check your Email and Password* </font>";
                    
                    ob_end_flush();
                }
                ?>
                
            </form>
        </div>
    </body>
</html>