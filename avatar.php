<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST">
    <input type="text" name='name' placeholder='name' ><br>
    <input type="file" name='img'  ><br>
    <input type="submit" name='submit' value="submit" >
</form>
<?php
 include 'configer.php';

    if(isset($_POST['submit'])){
       $name = $_POST['name'] ;
    //   $img =  $_POST['img'];

      // add to avatar image ******************************
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["img"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      echo  $target_dir ;
      print_r( $target_file );
       $uploadOk;
      print_r($imageFileType) ;
      
   
      
      // Check if image file is a actual image or fake image
      
        $tempname = getimagesize($_FILES["img"]["tmp_name"]);
        if($tempname!== false) {
          $imgerror ="File is an image - " . $tempname["mime"] . ".";
          $uploadOk = 1;
        } else {
          $imgerror ="File is not an image.";
          $uploadOk = 0;
        }
      
      
      // Check if file already exists
      if (file_exists($target_file)) {
          $imgerror = "Sorry, file already exists.";
        $uploadOk = 0;
      }
      
      // Check file size
      if ($_FILES["img"]["size"] > 15000000) {
          $imgerror = "Sorry, your file is too large.";
        $uploadOk = 0;
      }
      
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        $imgerror = "Sorry, your file was not uploaded.";
        $flag= false;
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
          $imgerror = "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
        } else {
          $imgerror = "Sorry, there was an error uploading your file.";
        }
      
      


        $sql = "INSERT INTO avatar (name, img) VALUES('$name','$target_file')";
        echo $sql;
       
        if (mysqli_query($conn, $sql)) {
         echo "<script>"."alert('YOUR REGISTRATION IS COMPLETE, PLEASE LOGIN !')"."</script>";
             
           
        } 
        else {
            echo "error";
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
    }
    }
    
    $newsql = "SELECT * FROM avatar ";

    $result = mysqli_query($conn, $newsql);
    $row = mysqli_num_rows($result);
    
    if($row > 0){
    
        echo "<table class= 'usertbl' cellpadding='5px' cellspacing= '0px' >";
        echo "<caption>"."USER-LIST"."</caption>";
            echo "<tr class = 'trow' >"."<th class='theader'>"."ID"."</th>";
                echo "<th class = 'theader'>"."NAME"."</th>";
                echo "<th class = 'theader' >"."img"."</th>";
              
                while($row = mysqli_fetch_array($result)){
                    
                    $id = $row['id'];
                    $name = $row['name'];
                    $img= $row['img'];
                   
                    
                    echo "<tr class = 'trow' >"."<td class = 'theader'>".$id."</td>";
                        echo "<td class = 'tdata' >".$name."</td>";
                        echo "<td class = 'tdata'>".$img."</td>";
                
                } 
                        echo "</table>";
                    
                    
                    
       
     
                }
                else{
                    echo " ERROR";
                }
                
                mysqli_close($conn);

    ?>
</body>
</html>