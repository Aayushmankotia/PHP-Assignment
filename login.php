<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="subb.css">
    <title>login form</title>
</head>
<body>

<?php
session_start();
require_once "configer.php";

if (isset($_SESSION['authenticated']) || $_SESSION['authenticated']) {
    header('Location: dashboard.php');
    exit;
}

    echo $_SESSION['message'] ;

?>
    <!-- <form action="dashboard.php" method ="GET"> -->
    <form class="mainform" action="#" method ="GET">
        <div class="division">
        <fieldset>LOGIN FORM</fieldset>
        <table class="logintable">
            
                
                <td>  <label for="email"> EMAIL </label></td>
                <td>   <input type="email" placeholder="EMAIL" name="email" id="email"></td>
    
            </tr>
            <tr>
                
                <td>   
                    <label for="pass">PASSWORD  </label>
                </td>
                <td>    
                    <input type="password" placeholder="PASSWORD" name="pass" id="pass">
                </td>
        
            
        </table>
        <div class="sub">
            <input class= "btn" type="submit" name="submit" value="LOGIN">
        </div>
        <div class="sub">
            <a href='registration.php'>REGISTER</a>
        </div>    
        
        <div>

    </form>

    <?php
    session_start();

if (isset($_GET['submit'])) {
    $email = $_GET['email'];
    $pass = $_GET['pass'];
         
    $newsql = "SELECT * FROM reg_form WHERE email='$email' AND pass='$pass' ";
        
        $result = mysqli_query($conn, $newsql);
        $row = mysqli_num_rows($result);
       
        if($row == 1){
            while ($row = mysqli_fetch_array($result)) {

                $id = $row['user_id'];
                $name = $row['name'];
                $email = $row['email'];
                $pass = $row['pass'];
                $phone = $row['phone'];
                $occupation = $row['occupation'];
                $city = $row['city'];
                $pin = $row['pin_code'];
                $avatar= $row['avatar'];

               
            }

            $_SESSION['sid'] = $id;
            // $_SESSION['sname'] = $name;
            // $_SESSION['semail'] = $email;
            // $_SESSION['spass'] = $pass;
            // $_SESSION['sphone'] = $phone;
            // $_SESSION['soccupation'] = $occupation;
            // $_SESSION['scity'] = $city;
            // $_SESSION['spin_code'] = $pin;
                
            // echo "<h2>"."welcome "."</h2>" .$name;
            //     echo $_SESSION['id'];
            //     echo "<h1>"."WELOCME ".$_SESSION['id']."</h1>";
            //     echo "<h1>"."WELOCME ".$_SESSION['name']."</h1>";
            //     echo "<h1>"."WELOCME ".$_SESSION['email']."</h1>";
            //     echo "<h1>"."WELOCME ".$_SESSION['pass']."</h1>";
            //     echo "<h1>"."WELOCME ".$_SESSION['phone']."</h1>";
            //     echo "<h1>"."WELOCME ".$_SESSION['occupation']."</h1>";
            //     echo "<h1>"."WELOCME ".$_SESSION['city']."</h1>";
            //     echo "<h1>"."WELOCME ".$_SESSION['pin_code']."</h1>";
         $_SESSION['authenticated'] = $email;
            header("Location:dashboard.php");
   
        // header("Location:dashboard.php");
        
        }
        else{
            echo "<footer>";
            echo "INVALID USER"."<br>";
            echo "PLEASE REGISTER! ";
            echo "</footer>";
            

        }
}
       
?> 


    
</body>
</html> 