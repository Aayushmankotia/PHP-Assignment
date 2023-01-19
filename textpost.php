<?php
        session_start();
?>
        
<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" type="" href="register.css">
                <title>Document</title>
                <style></style>      
        
        </head>
        <body>
                <div class="division col">
                        <?php
                
                        echo "SUCESSFULLY LOGIN"."<br>";
                        echo "<pre>";
                        echo $_SESSION['name']."<br>"; 
                        echo "user id = ". $_SESSION['num'];
                        echo "</pre>";
                        ?>
                </div>   

                        <form action="" method="POST">
                                <fieldset>welcome <?php echo $_SESSION['name']; ?> !</fieldset> 

                                <label>SUBMIT YOUR POST </label>

                                <input class="tp" type="text" name="content" id="" placeholder="" required>
                                 <br>
                                <div class="division">
                                        <input class="btn" type="submit" value="submit" name="submit">
                                        <br>
                                        <a href="distroysession.php">LOGOUT!</a>
                                </div>
        
                        </form>
                <br>
                <br>

        
                <div class="division col ">
                        <?php
                        session_start();

                                include('configer.php');

                                if (isset($_POST['submit'])) {
                        
                                        $content = $_POST['content'];
                                        $numm = $_SESSION['num'];

                                
                                        $sql = "INSERT INTO datainfo (content, numm)
                                                VALUES ('".$content."', '".$numm."')";
                                                
                                
                                        if ($conn->query($sql) === TRUE) {
                                                echo "<script>"."alert('New record created successfully')"."</script>"."<br>";
                                             echo "<PRE>"."<h2>"."ENTRIES of ". $_SESSION['name']. " ARE :"."</h2>"."</PRE>";
                                        }
                                                
                                        else {
                                                echo 'error 123';
                                        } 
                                }
                        ?>
                </div>
                <div class="division col">
                        <?php
                        session_start();

                        $numm = $_SESSION['num'];
            
                        $newsql = "SELECT * FROM datainfo where numm =(SELECT num FROM gmail where num='$numm')";
                        $result = $conn->query($newsql);
                            if($result = mysqli_query($conn, $newsql)){
                                if(mysqli_num_rows($result) > 0){
                                    echo '<table border=2px, cellspacing=0px, cellpadding=5px,>';
                                    echo "<caption>"."ALL POSTS ARE:"."</caption>";
                                        
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>Content_id</th>";
                                                echo "<th>Content</th>"; 
                                                echo "<th>Update</th>";
                                                echo "<th>Delete</th>";
                                                                                        
                                            echo "</tr>";
                                        echo "</thead>";

                                        echo "<tbody>";
                                                while($row = mysqli_fetch_array($result)){
                                                echo "<tr>";
                                                        echo "<td>" . $row['id'] . "</td>";
                                                        echo "<td>" . $row['content'] . "</td>";
                                                        $_SESSION['id']=$row['id'];
                                                        $_SESSION['content']=$row['content'];
                                            echo "<td>".'<a href="postupdate.php?id='. $row['id'] .'" >UPDATE</a>'."</td>";
                                            echo "<td>".'<a href="postdelete.php?id='. $row['id'] .'" >DELETE</a>'."</td>";
                                      
                                                        // echo "<td>".'<a href="update.php?ID='. $row['id'] ."UPDATE".'</a>'."</td>";
                                                        // echo "<td>".'<a href="delete.php?id='. $row['id'] ."DELETE".'</a>'."</td>";
                                                echo "</tr>";
                                                }
                                        echo "</tbody>"; 

                                    echo "</table>";
                                   
                                } 
                                else{
                                    echo 'PLEASE! ENTER NEW POST FIRST ';
                                }
                            } 
                            else{
                                echo "Oops! Something went wrong. Please try again later.";
                            }
                        ?>
                          <a href="forkey.php"> database</a>
                </div>


        
                          
                             
                <?php
                //  include('distroysession.php');
                                // Close connection
                                mysqli_close($conn);
                ?>

                
                      
        </body>
</html>
        


