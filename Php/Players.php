<!DOCTYPE html>
<html>
    <head>
        <title> Battlefield  </title>
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
            input[type=text] {
            width: 20%;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.678);
            padding: 5px 5px 3px 20px;
            }
        </style>
    </head>
    <body background="../BG2.jpg">
        <!----------------------[Bottom]---------------------->
        
        <div id="div1" align="center">
            
            <form method="POST">
                <input style="font-size:20px;" type="text"  name="SIGN" placeholder="Search By IGN"><br>
                <button class="button" style="vertical-align:middle" name="Search" onclick="ch()">
                    <span>Search</span>
                </button>
                <?php
                   if(isset($_POST['Search']))
                   {
                       $Player = $_POST['SIGN'];
                        $sql = "SELECT IGN FROM register1 WHERE IGN = ?";
                        $stmt = $conn -> prepare($sql);
                        $stmt -> execute(array($Player));
                        $row = $stmt -> fetch();
                        echo"<font size='5' face='sans-serif'>";
                        echo"<table id='tp' border='1'>";
                        echo"<tr> <th> Player Name </th> </tr>";
                        echo"<tr align='center'><td>";
                        echo $row['IGN'];
                        echo"</td> </tr></table></font><hr>";

                   }

                ?>
            </form><br><br><br>
            <font size="5" face="sans-serif">
                
                <table border="1" id="tp">
                    
                    <tr> <th>No.</th><th> Player Name </th> </tr>
                    
                        <?php
                    
                            $i=1;//To arrangement number of players
                    
                            $dis=$conn->query("SELECT * FROM register1");//Display all players have registered By IGN
                            while($row=$dis->fetch(PDO::FETCH_ASSOC))
                            {
                                echo"<tr align='center'><td>";
                                echo$i;
                                echo"</td><td>";
                                echo$row['IGN'];
                                echo"</td></tr>";
                                $i++;
                            }
                        ?>
                    
                </table>
                
            </font>
                
        </div>
    </body>
</html>