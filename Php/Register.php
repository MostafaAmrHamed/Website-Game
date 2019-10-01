<!DOCTYPE html>
<html>
    <head>
        <title> Battlefield </title>
        <link rel="stylesheet" href="../css/Style.css">
        <?php require_once "../HTML/Nav.html";?>
        <?php require_once "../php/code.php";?>
        <?php require_once "../Javascript/Code.js";?>
        <style>
                /* Design  input form  */
            input[type=text],input[type=password],input[type=email] 
            {
                width: 80%;
                box-sizing: border-box;
                border: 2px solid #ccc;
                border-radius: 10px;
                font-size: 16px;
                background-color: rgba(255, 255, 255, 0.678);
                padding: 5px 25px 3px 20px;
            }
        </style>
    </head>
    <body background="../BG2.jpg">
        <!----------------------[Bottom]---------------------->

        <div id="div1" align="center">
            
            <form method="post">
                <font size="5" face="sans-serif">
                    <table style="color:rgba(255, 255, 255, 0.678);">
                        
                        <tr class="spaceUnder">
                            <th>First Name</th>
                            <td> <input  type="text" name="fname"></td>
                        </tr>
                        
                        <tr class="spaceUnder">
                            <th>Last Name</th>
                            <td> <input type="text" name="lname"></td>
                        </tr>
                        
                        <tr class="spaceUnder">
                            <th>Email</th>
                            <td> <input type="email" name="email"></td>
                        </tr>
                        
                        <tr class="spaceUnder">
                            <th>Password</th>
                            <td>
                                <input type="password" name="pw">
                                    <?php 
                                            //MSG (pw is required)
                                         if(isset($_POST['Register']))
                                         {
                                            if(empty($_POST['pw']))
                                            {
                                                echo"<font color='red' size='3'>*PW is required*</font>";
                                            }
                                         }
                                    ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th>IGN</th>
                            <td> <input class="input" type="text" name="IGN" maxlength="12"></td>
                        </tr>
                        
                    </table>
                </font>
                
                <button class="button" style="vertical-align:middle" name="Register">
                    <span>Register </span>
                </button><br>
                
                <?php
                     if(isset($_COOKIE['user']))
                     {
                         $name = $_COOKIE['user'];
                         echo"<script>logged('$name');</script>";
                     }
                    if(isset($_POST['Register']))
                    {
                        
                    //-----------------------------------------------------------------------------------------
                        
                            //Check if email and  IGN are exist or not,because email & IGN are (Unique)
                        $IGN = $_POST['IGN'];
                        $email = $_POST['email'];
                        
                        $sql = "SELECT COUNT(*) FROM  register1 WHERE email = ?";
                        $sql2 = "SELECT COUNT(*) FROM  register1 WHERE IGN = ?";
                        
                        $stmt = $conn -> prepare($sql);
                        $stmt2 = $conn -> prepare($sql2);
                        
                        $stmt -> execute(array($email));
                        $stmt2 -> execute(array($IGN));
                        
                        $row = $stmt-> fetch();
                        $row2 = $stmt2-> fetch();
                        $count = (int)$row[0];
                        $count2 = (int)$row2[0];
                        
                       
                        if( $count >0 || $count2 >0)
                        {
                            if($count > 0 )
                                echo"<font color='red' size='5'>*email is already used*</font><br>";
                            
                            elseif( $count2 > 0)
                                echo"<font color='red' size='5'>*IGN is already used*</font>";
                        }
                    //-----------------------------------------------------------------------------------------   
                            
                                            //----[Insertion]----
                        elseif(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) 
                            && !empty($_POST['pw']) && isset($_POST['IGN']))
                        {   
                            $ins= $conn ->prepare("INSERT register1(IGN,fname,lname,email,pw) VALUES(:I,:f,:l,:e,:p)");
                            $ins->bindParam(':I',$_POST['IGN']);
                            $ins->bindParam(':f',$_POST['fname']);
                            $ins->bindParam(':l',$_POST['lname']);
                            $ins->bindParam(':e',$_POST['email']);
                            $ins->bindParam(':p',$_POST['pw']);
                            $ins->execute();
                            echo"<h1 id='color1'> You have registered successfully </h1>";
                        }
                        
                    }
                    
                ?>
            </form>
        </div>

    </body>
</html>