<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="subb.css">
  <title>Document</title>
</head>
<body>
  

<?php
   session_start();
   include "configer.php";
   
   if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('Location: login.php');
    exit;
}


$id = $_SESSION['id'];
$sname= $_SESSION['sname'];


if (isset($_SESSION['sid'])) {

    $sid = $_SESSION['sid'];

$sql = "DELETE FROM reg_form WHERE user_id ='$sid'";

if ($conn->query($sql) === TRUE) {
  echo "<script> alert('RECORD DELETED SUCESSFULLY')</script>";
  
  echo "<section>";
  echo "<div class='division'>";
  echo "<br>";
  echo "<br>";
  echo "<h2>"."WELCOME"."<br>".$sname."</h2>";
  echo "<br>";
  echo "YOUR RECORD ID ". $sid ." IS DELETED SUCESSFULLY"."<br>"."<br>";
  echo "<a href='destroy.php'>"."<h2 class = 'reg'>"."BACK"."</h2>"."</a>"."<br>"."<br>";

  echo "</div>";

  echo "</section>";

} else {
  echo "Error deleting record: " ;
}
}
$conn->close();

?>


</body>
</html>