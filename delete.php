<?php
require_once "configer.php";
 
if (isset($_GET['id'])) {

    $id = $_GET['id'];

// sql to delete a record
$sql = "DELETE FROM students WHERE id =$id";

if ($conn->query($sql) === TRUE) {
  echo "<div class='container'> RECORD DELETED SUCESSFULLY</div>";
} else {
  echo "Error deleting record: " . $conn->error;
}
}
$conn->close();

?>
<style type="text/css">
    
.container{
    text-align: center;
    
    font-size: 40px;
    margin:15% auto;
    color: green;
}

</style>