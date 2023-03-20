<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="subb.css">
    <title>registeration form</title>
</head>
<body>
    <?php

    session_start();
    include "configer.php";

   

    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
        header('Location: login.php');
        exit;
    }
    $sid = $_SESSION['sid'] ;
    $newsql = "SELECT * FROM reg_form WHERE user_id='$sid' ";


   
    $result = mysqli_query($conn, $newsql);
    $row = mysqli_num_rows($result);
    
   
   
    if($row == 1){
        // $_SESSION['logged_in'] = true;
        while ($row = mysqli_fetch_array($result)) {
            // print_r($row);
          
            $id = $row['user_id'];
            $name = $row['name'];
            $email = $row['email'];
            $pass = $row['pass'];
            $phone = $row['phone'];
            $occupation = $row['occupation'];
            $city = $row['city'];
            $pin = $row['pin_code'];
            $avatar = $row['avatar'];
      
        //  $image_src =$avatar;
           
        }

       
        $_SESSION['sname'] = $name;
        $_SESSION['semail'] = $email;
        $_SESSION['spass'] = $pass;
        $_SESSION['sphone'] = $phone;
        $_SESSION['soccupation'] = $occupation;
        $_SESSION['scity'] = $city;
        $_SESSION['spin_code'] = $pin;
        $_SESSION['savatar'] = $avatar;
       

    // header("Location:dashboard.php");
 
  
  
    
    }
    else{
        
        echo "<footer>";
        
        echo  "INVALID USER"."<br>";
        echo $_SESSION['sname']."<br>";
        echo "PLEASE REGISTER! OR LOGIN AGAIN "."<br>";
        echo "<a class='reg' href='destroy.php'>"."LOGIN"."</a>";
        echo "</footer>";
        

    }
     
   
?>
    <h1>DASH-BOARD </h1>
    <header>
<nav>
    <a class ='hh ' href='usertable.php'>USERS</a>
    <a class='update hh ' href='update.php'>UPDATE</a>
    <a class='logout hh ' href='destroy.php'>LOGOUT</a>
    <a class='logout hh ' href='deleteuser.php'>DELETE</a>
    <a class='logout hh ' href='searchlist.php'>SEARCH</a>
         <?php  if( $_SESSION['semail'] =='test@gmail.com' || $_SESSION['semail'] =='nitin@gmail.com'){
        echo "<a class='logout hh' href='index.php' >INSERT</a>";
       
    }
          ?>
</nav>
</header>


<h2> <img class='profileimg' src='<?PHP echo 'uploads/'.$_SESSION['savatar'];?>' alt="xyz"></h2>
  <h2>WELCOME - <?PHP echo $_SESSION['sname'];?> </h2>
        <?php   






        echo "<section>";
            echo "<div class='division'>";
                echo"<header>"." ALL INFORMATION "."</header>"."<br>";

                 echo "<p>"." USER_ID : ".$_SESSION['sid']."</p>"."<br>";

                  echo "<p>"."USERNAME : ".$_SESSION['sname']."</p>"."<br>"; 

                  echo "<p>"."  EMAIL : ".$_SESSION['semail']."</p>"."<br>"; 

                  echo  "<p>"."PASSWORD : ". $_SESSION['spass']."</p>"."<br>"; 

                 echo "<p>"."PHONE-NUMBER : ".$_SESSION['sphone']."</p>"."<br>"; 

                  echo "<p>"." OCCUPATION : ".$_SESSION['soccupation']."</p>"."<br>"; 

                 echo"<p>"."CITY : ".$_SESSION['scity']."</p>"."<br>"; 

                 echo "<p>"."PIN-CODE : ". $_SESSION['spin_code']."</p>"."<br>";

                //  echo "<p>". "<a class='update' href='update.php'>"."UPDATE"."</a>"."</p>"."<br>";

                //  echo "<p>"."<a class='logout' href='deleteuser.php'>"."DELETE"."</a>"."</p>"."<br>";
                
                //  echo "<p>"."<a class='logout' href='destroy.php'>"."LOGOUT"."</a>"."</p>"."<br>";

                //  echo "<p>"."<a href='usertable.php'>".'ALL-USERS'."</a>"."</p>"."<br>";
                 
                 
            echo "</div>";
        echo "</section>";

        
       
       
               ?>
               
   
<div>
    
</div>
</body> 
</html>