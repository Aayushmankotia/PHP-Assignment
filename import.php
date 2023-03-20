<?php

include('configer.php');

if(isset($_POST["Export"])){
       

        echo $filename=$_FILES["file"]["tmp_name"];
         if($_FILES["file"]["size"] > 0)
         {
              $file = fopen($filename, "r");
             while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
             {

              $sql = "INSERT into reg_form (name,email,pass,phone,occupation,city,pin_code,avatar) values
                ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."')";
              
                var_dump($sql);
                   
             //we are using mysql_query function. it returns a resource on true else False on error
               $result = $conn->query($sql);
                if(!$result )
                {
                    echo "dj";
                    // echo "<script type=\"text/javascript\">
                    //         alert(\"Invalid File:Please Upload CSV File.\");
                    //         window.location = \"index.php\"
                    //     </script>";        
                }

             }
             fclose($file);
             echo "dfghbj";
             //throws a message if data successfully imported to mysql database from excel file
            //  echo "<script type=\"text/javascript\">
            //             alert(\"CSV File has been successfully Imported.\");
            //             window.location = \"index.php\"
            //         </script>";    
            
         }

    }     
    if(isset($_POST["Export"])){
         
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('name','email','pass','phone','occupation','city','pin_code','avatar'));  
      $query = "SELECT * from reg_form ORDER BY user_id DESC";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
?>