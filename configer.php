 <?php
 
        // servername => localhost
        // username => admin
        // password => admin
        // database name => staff
        $conn = mysqli_connect("localhost", "admin", "admin", "aayush");
         
        // Check connection
      if ($conn->connect_error) {
 			die("Connection failed: " . $conn->connect_error );
		 }
         else{
		 	echo "";
         }