<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="subb.css">
    <title>registeration form</title>
    <script src="jsvalidation.js"></script>
</head>
<body>
<?php
include('configer.php');


session_start();

if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('Location: login.php');
    exit;
}

$flag=true;
$count = 0;
   if(isset($_POST["Import"])){        
      $filename=$_FILES["file"]["tmp_name"];    
 $m = basename($_FILES["file"]["name"]);
  $CSVFileType = strtolower(pathinfo($m, PATHINFO_EXTENSION));

 if (
    $CSVFileType === "csv"
) {
 
         if($_FILES["file"]["size"] > 0)
         {
              $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            
             {
               $check = "SELECT * FROM reg_form WHERE email='$getData[1]' ";
              $check;
               $check_result = mysqli_query($conn, $check);
   
               if (mysqli_num_rows($check_result) > 0) {
                   $emailerr = "EMAIL ALREADY EXIST !!";
                   
               } else {
               $sql = "INSERT into reg_form (name,email,pass,phone,occupation,city,pin_code,avatar) values
                ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."')";
              
               $result = mysqli_query($conn, $sql);
               
                    $count++;
              
             }
          }
          
          echo "<script>
                        alert(('.$count. ROWS ARE INSERTED'));
                      
                    </script>";
             fclose($file);   
           
         }
}
else{
    $flag = false;
 
}

         
    }     
    
 
function records(){
   include 'usertable.php';  
}
if($flag){
 records();
}
else{
    echo  $imgerror = "CHOOSE CSV FILE ONLY ";
   
}


?>
<BR>
 <a class='reg ' href='index.php'>BACK</a>
</body>
</html>