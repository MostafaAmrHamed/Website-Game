<!DOCTYPE html>
<html>
    <head>
        <title> Battlefield </title>
        <link rel="stylesheet" href="../css/Style.css">
        <?php require_once "../HTML/Nav.html";?>
        <?php require_once "../php/code.php";?>
        <?php require_once "../Javascript/Code.js";?>
        <?php
            if(isset($_COOKIE['user']))
            {
                $name = $_COOKIE['user'];
                echo"<script>logged('$name');</script>";
            }
        ?>
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
            
            <form method="POST">
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
                        
                        <tr class="spaceUnder">
                            <th>New Password</th>
                            <td> <input  type="password" name="pw2"></td>
                        </tr>
                        
                    </table>
                    
                    <button class="button" style="vertical-align:middle" name="confirm">
                        <span>Confirm</span>
                    </button><br>
                    
                    <?php
                        if(isset($_POST['confirm']))
                        {
                            $username = $_POST['email'];
                            $pass = $_POST['pw'];
                            $newpass = $_POST['pw2'];
                            
                            //Checking from  email and pw you have entered are right or not
                            $sql2 = "SELECT pw FROM register1 WHERE email = ?";
                            
                            $stmt2 = $conn -> prepare($sql2);
                            $stmt2 -> execute(array($username));
                            $row2 = $stmt2 -> fetch();
                            $DB_Password =$row2["pw"];
                            if($DB_Password == $pass)//Check if your pw is right or not
                            {
                                //Changing the old password to new password
                                $sql = "UPDATE register1 SET pw = ? WHERE email = ?";
                                $stmt = $conn -> prepare($sql);
                                $stmt -> execute(array($newpass,$username));
                                $row = $stmt-> fetch();
                                echo "<span id='color1'>Password Changed Successfully <span>";
                            }
                            else {
                                echo "<span style='color:red'>*The Old Password is Wrong* <span>";
                            }
                        }
                    ?>
               </font>
            </form>
        </div>
   
            

       
    </body>
</html>