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
                <a  href='distroysession.php'> LOGOUT</a>
            </div>
        </form>

        <?php

        require_once "configer.php";

        

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
                 
                $newsql = "SELECT * FROM gmail WHERE email='$email' AND pass='$pass' ";
                
                $result = mysqli_query($conn, $newsql);
                $row = mysqli_num_rows($result);

                if($row == 1){
                    while($row = mysqli_fetch_array($result)){
                        $name = $row['name'];
                        $_SESSION['name']= $name; 
                        $num = $row['num'];
                        $_SESSION['num']= $num;

                    }

                    $_SESSION['email'] = $email;
                    $_SESSION['pass']=$pass;
                    header("Location:textpost.php");
                }
                else{
                    echo " LOGIN FAIL";
                }
        }

                
        ?> 
 
    
      
</body>
</html>

