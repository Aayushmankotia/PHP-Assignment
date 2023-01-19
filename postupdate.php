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
             

                        <form action="" method="GET">
                                <fieldset>welcome <?php echo $_SESSION['name']; ?> !</fieldset> 

                                <label>UPDATE YOUR POST </label>

                                <input class="tp" type="text" name="content" value = '<?php echo $_row['content']; ?>' id="" placeholder="" required>
                                 <br>
                                <div class="division">
                                        <input class="btn" type="submit" value="submit" name="submit">
                                        <br>
                                        <a href="distroysession.php">LOGOUT!</a>
                                        <a href="textpost.php" >BACK</a>
                                </div>
        
                        </form>
                <br>
                <br>

        
                <div class="division col ">
                <?php 
               session_start();

                require_once "configer.php";

                if (isset($_GET['submit'])) {
            
                    $content = $_GET['content'];
                    $id = $_SESSION['id'];
                    
                            
                    $sql = "UPDATE `datainfo` SET `content`='$content' WHERE  id =$id"; 
                   
       
                    $result = $conn->query($sql); 
            
                    if ($result == TRUE) {
                        echo "<script> alert('RECORD UPDATED SUCESSFULLY')</script>";
                        echo "Record updated successfully.";
            
                    }else{
            
                        echo "Error:" . $sql . "<br>" . $conn->error;
            
                    }
            
                } 

if (isset($_GET['id'])) {

    $id = $_GET['id']; 

    $sql = "SELECT * FROM `datainfo` WHERE id ='$id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {
            
            $id = $row['id'];
            $content = $row['content'];
            $numm = $row['numm'];

        } 
    }
}
    ?>
  
                </div>


        
                          
                <?php
                //  include('distroysession.php');
                                // Close connection
                                mysqli_close($conn);
                ?>

                
                      
        </body>
</html>
        


