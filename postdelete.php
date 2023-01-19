<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href ="register.css">
    <title>Document</title>
</head>
<body>
    

<?php
require_once "configer.php";
 
if (isset($_GET['id'])) {

    $id = $_GET['id'];

$sql = "DELETE FROM datainfo WHERE id ='$id'";

if ($conn->query($sql) === TRUE) {
  echo "<script> alert('RECORD DELETED SUCESSFULLY')</script>";
  echo "<div class='division col'>";
  echo "your record id ". $id ." is deleted sucessfully"."<br>";
  echo "<pre> click back to go back </pre>";

  echo "</div>";
} else {
  echo "Error deleting record: " . $conn->error;
}
}
$conn->close();

?>
<a href="textpost.php" >BACK</a>
</body>
</html>
