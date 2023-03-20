 <?php
 
        // servername => localhost
        // username => admin
        // password => admin
        // database name => staff
        $conn = mysqli_connect("localhost", "admin", "admin", "aayush");
         
        // Check connection
        if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
        else{
          echo "";
        }

         
        ?>