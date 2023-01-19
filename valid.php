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
    
        <form action="#" method="POST">
        <fieldset> Login FORM</fieldset> 

        

        <label>E- mail </label>

        <input type="email" name="email" id="" placeholder="Username" required>
        <br>
        <label>Password</label>

        <input type="password" name="pass" id="" placeholder="Password" required>
        <br>
        <div class="division">
        <input class="btn" type="submit" value="submit" name="submit">
        </div >
        <div class="division">
            <a  href='distroysession.php'> LOG OUT</a>
        </div>
        </form>

        <?php

        require_once "configer.php";

        

        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
                    
                $newsql = "SELECT * FROM gmail WHERE email='$email' AND pass='$pass'";
                
                $result = mysqli_query($conn, $newsql);
                $row = mysqli_num_rows($result);

                if($rows==1){
                    header('location : textpost.php');
                }
                else{
                    echo " HAHAHAHH incorrect";
                }

//                 echo"aayush";      
//                     if($result = mysqli_query($conn, $newsql)){
// echo"aayush";
//                         if(mysqli_num_rows($result) > 0){

//                             echo 'USER LOGIN SUCESSFULL*'."<br>";
                            
//                             while($row = mysqli_fetch_array($result)){
//                                 // $_SESSION['name']=$row['name'];
//                                 // echo "welcome ".$_SESSION['name'];
                                 
                          
//                             $num = $row['num']."<br>";
                          
                           
//                             // header("Location: textpost.php");

//                             } 
                        
//                         } 
                        
//                         else{
//                             echo "<p class='para'>";
//                             echo "INVALID USER";
//                             echo "</p>";
                        
//                             echo "<pre>";
//                             echo " CHECK YOUR E-MAIL OR PASSWORD 
// AND TRY AGAIN ";
//                             echo "</pre>";
//                         }
//                     } 
                }

                
        ?> 
 
    
      
</body>
</html>

