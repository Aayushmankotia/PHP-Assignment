<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <style>
        .hov:hover{
            background: lightcyan;
        }
    </style>
 
        <?php
        require_once "configer.php";

        // Taking all 5 values from the form data(input)
        if (isset($_POST['first_name'])) {

        $first_name =  $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender =  $_POST['gender'];
        $address = $_POST['address'];
        $email = $_POST['email'];
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO students (first_name, last_name, gender, address, email)
		VALUES ('".$first_name."', '".$last_name."', '".$gender."', '".$address."', '".$email."')";
			if ($conn->query($sql) === TRUE) {
  				echo "New record created successfully";
			} else {
  				echo "Error: " . $sql . "<br>" . $conn->error;
			}
}
            


                $newsql = "SELECT *  FROM students";
                $result = $conn->query($newsql);
                    if($result = mysqli_query($conn, $newsql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>id</th>";
                                        echo "<th>First Name</th>";
                                        echo "<th>Last Name</th>";
                                        echo "<th>Gender</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Address</th>";
                                        echo "<th>View</th>";
                                        echo "<th>Update</th>";
                                        echo "<th>Delete</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr class='hov'>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['first_name'] . "</td>";
                                        echo "<td>" . $row['last_name'] . "</td>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>" .'<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>'.
                                            "</td>";

                                            echo "<td>".'<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>'."</td>";
                                            echo "<td>".'<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>'."</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            // mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                   
                         
  
 
                    // Close connection
                    mysqli_close($conn);
        ?>
</body>
</html>

