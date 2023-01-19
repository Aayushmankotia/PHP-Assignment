<?php 

require_once "configer.php";

    if (isset($_POST['update'])) {

        $first_name =  $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender =  $_POST['gender'];
        $address = $_POST['address'];
        $email = $_POST['email'];
         


        $sql = "UPDATE `students` SET `first_name`='$first_name',`last_name`='$last_name',`gender`='$gender',`address`='$address',`email`='$email' WHERE  'id'='$id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $id = $_GET['id']; 

    $sql = "SELECT * FROM `students` WHERE id =$id";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $first_name = $row['first_name'];

            $last_name = $row['last_name'];

             $gender =  $row['gender'];
       
             $address = $row['address'];
        
            $email = $row['email'];


        } 

    ?>

        <!DOCTYPE html>
<html lang="en">
<head>
    <title>upadate data</title>
</head>
<body>
    <style type="text/css">
        BODY{
            background:#56f7fe38;
        }
        h1{
            background:blue;
            margin: 0px;
            color: white;
            text-align:center;
          
            
            
        }
        center{
            background-image:linear-gradient(215deg, black, black ,black, cyan, cyan, white, white, white);
           
            border: solid gray 2px;
            width: 20%;
            
            margin:10% auto;
        }
        label{
            position: absolute;
            padding: 3px 10px;
            height: 25px;
             font-size:18px ;

        }
        p{
           text-align:left;
        }
         input{
            margin-left: 20px;
           color: black;
            margin-left: 40%;
            height: 25px;
             border-radius: 7px;
        }
        .btn {
            height: 30px;
            width: 100%;
            margin-left: 0%;
            border-radius: 7px;
            background: blue;
            color: white;
            font-size:18px ;
        }
        input:hover{
            background: lightgray ;
            color: black;
            border-color: blue;
         }

    </style>
    <center>
    
        <h1>UPDATION FORM</h1>
        <form action="action.php" method="post">
        
            
<p>
            <label for="firstName">First Name:</label>
         <input type="text" name="first_name" id="firstName" placeholder="ENTER FIRSTNAME" required>
            </p>

            
<p>
            <label for="lastName">Last Name:</label>
            <input type="text" name="last_name" id="lastName" placeholder="ENTER LASTNAME" required>
            </p>

            
<p>
            <label for="Gender">Gender:</label>
            <input type="text" name="gender" id="Gender"placeholder=" ENTER GENDER" required>
            </p>

            
<p>
            <label for="Address">Address:</label>
            <input type="text" name="address" id="Address" placeholder="ADDRESS" required>
            </p>

            
<p>
            <label for="emailAddress">Email Address:</label>
            <input type="text" name="email" id="emailAddress" placeholder=" ENTER USERNAME" required>
            </p>

            <input class="btn" type="submit" value="update" name="update">
            
        </form>
    </center>

  
</body>
 
</html>


    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?> 