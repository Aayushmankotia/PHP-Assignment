<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
        <div class="division col" >
                        <?php
                          $name = $_SESSION['name'];
                          $num = $_SESSION['num'];
                                    echo "<pre>"."<H2>"."ALL DATA ENTRIES IN DATABASE"."</H2>"."</pre>"."<BR>";
                            $newsql = "SELECT * FROM `gmail`INNER JOIN datainfo ON gmail.num = datainfo.numm ";
                            $result = $conn->query($newsql);
                                if($result = mysqli_query($conn, $newsql)){
                                    if(mysqli_num_rows($result) > 0){
                                        echo '<table border=2px, cellspacing=0px, cellpadding=5px >';
                                            echo "<thead>";
                                                echo "<tr>";
                                                    echo "<th>id</th>";
                                                   
                                                    echo "<th>content</th>";
                                                    echo "<th>numm</th>";
                                                    echo "<th>email</th>";
                                                    echo "<th>password</th>";
                                                  
                                                echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            while($row = mysqli_fetch_array($result)){
                                                echo "<tr>";
                                                    echo "<td>" . $row['id'] . "</td>";
                                                    echo "<td>" . $row['content'] . "</td>";
                                                    echo "<td>" . $row['numm'] . "</td>";
                                                    echo "<td>" . $row['email'] . "</td>";
                                                    echo "<td>" . $row['pass'] . "</td>";
                                                 
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";                            
                                        echo "</table>";
                                       
                                    } else{
                                        echo 'error';
                                    }
                                } else{
                                    echo "Oops! Something went wrong. Please try again later.";
                                }
                                
                          
                             
      
     include('distroysession.php');
                        // Close connection
                        mysqli_close($conn);
            ?>

            </div>
            <a href="distroysession.php">LOGOUT!</a>
                            </body>
                            </html>
        