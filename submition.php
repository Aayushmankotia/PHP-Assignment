
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Document</title>
    <style>
      

    </style>
</head>
<body>
    
        <form action="" method="POST">
        <fieldset> REGISTRATION FORM</fieldset> 

        <label>NAME </label>

        <input type="text" name="name" id="" placeholder="Firstname" required>
        <br>

        <label>E- mail </label>

        <input type="email" name="email" id="" placeholder="Username" required>
        <br>
        <label>Password</label>

        <input type="password" name="pass" id="" placeholder="Password" required>
        <br>
        <div class="division">
        <input class="btn" type="submit" value="submit" name="submit">
        </div >
        <div class="division ">
        <a href="tologin.php">click to login </a>
        </div>
        </form>
        <?php
     
            require_once "configer.php";

            if (isset($_POST['submit'])) {

                $name = $_POST['name'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];

                $sql = "INSERT INTO gmail (name, email, pass)
                        VALUES ('".$name."', '".$email."', '".$pass."')";
                        if ($conn->query($sql) === TRUE) {
                                echo "<h2>"."New record created successfully "."<br>";
                                }
                            
                            else {
                                echo 'error';
                            } 
                }
            // else {
            //     ECHO"ALREADY EXIST";
            // }
                
                mysqli_close($conn);
            
        ?>
    
</body>
</html>

