<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERLIST</title>
    <link rel="stylesheet" href="subb.css">
</head>

    <body>
        <nav>
            <a class='hh ' href='dashboard.php'>DASH-BOARD</a>
            <a class='update hh ' href='update.php'>UPDATE</a>
            <a class='logout hh ' href='destroy.php'>LOGOUT</a>


        </nav>

        <form id="search" action="searchlist.php" method="GET">
            <input id="tosearch" type="search" name='name' placeholder="SEARCH NAME ">
            <!-- <input type="submit" name="submit" value="SEARCH" > -->

        </form>


        <?php
        session_start();
        include "configer.php";

        if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
            header('Location: login.php');
            exit;
        }

       // Set the number of items per page
    $items_per_page = 5;
    
    // Get the current page number from the URL
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    
    // Get the order of the data query from the URL
    $order = isset($_GET['order']) ? $_GET['order'] : 'asc';
    
    // Perform the data query
    if ($order == 'asc') {
    
      $query = "SELECT * FROM reg_form ORDER BY user_id ASC";
    } else {
    
    $query = "SELECT * FROM reg_form ORDER BY user_id DESC";
    }
  
   $result = mysqli_query($conn, $query);
    
    // Get the total number of rows
    $total_rows = mysqli_num_rows($result);
   
    // Calculate the total number of pages
    $total_pages = ceil($total_rows / $items_per_page);
    
    // Calculate the offset for the current page
    $offset = ($page - 1) * $items_per_page;
    
    // Modify the data query to include the LIMIT clause
    if ($order == 'asc') {
      $query .= " LIMIT $offset, $items_per_page";
    } else {
    
    $query .= " LIMIT $offset, $items_per_page";
    
    
    }
  
    $result = mysqli_query($conn, $query);
    
    // Display the items on the current page
   
           
  
           echo "<table class= 'usertbl' cellpadding='5px' cellspacing= '0px' >";
           echo "<caption>" . "USER-LIST" . "</caption>";
           echo "<tr class = 'trow' >" . "<th class='theader'>" . "ID" . "</th>";
           echo "<th class = 'theader'>" . "AVATAR" . "</th>";
           echo "<th class = 'theader'>" . "NAME" . "</th>";
           echo "<th class = 'theader' >" . "EMAIL" . "</th>";
           echo "<th class = 'theader' >" . "CITY" . "</th>";
           echo "<th class = 'theader'>" . "OCCUPATION" . "</th>" . "</tr>";
   
           while ($row = mysqli_fetch_assoc($result)) {
               //here goes the data
           
              
                   $id = $row['user_id'];
                   $name = $row['name'];
                   $email = $row['email'];
                   $city = $row['city'];
                   $occupation = $row['occupation'];
                   $avatar = $row['avatar'];
                   $loc = 'uploads/';
                   $select = $loc . $avatar;
                   echo "<tr class = 'trow' >" . "<td class = 'theader'>" . $id . "</td>";
                   echo "<td class = 'tdata' >" . "<img class='userimg' src ='$select'>" . "</td>";
                   echo "<td class = 'tdata' >" . $name . "</td>";
                   echo "<td class = 'tdata'>" . $email . "</td>";
                   echo "<td class = 'tdata'>" . $city . "</td>";
                   echo "<td class = 'tdata'>" . $occupation . "</td>" . "</tr>"  ;
                   
   
               }
               echo "<div class='sorter'>";
               echo "<form action='#' method='GET'> ";
               echo "<input type='submit' type='submit' name='order' class='button' value='DESCENDING'>";
               echo "<a class='asc' href='usertable.php' ><input type='button' class='button' value='ASCENDING'> </a>";
               
              echo "</form>";
               echo "</div>";
              
               echo "</table>";
            
                 
            
    
    // Generate links to the previous and next pages, as well as the first and last pages
    echo "<div class='pagediv'>";
    if ($page > 1) {
      echo "<a class='pagination' href=\"?page=" . ($page - 1) . "&order=$order\">Previous</a>";
    }
    for ($i = 1; $i <= $total_pages; $i++) {
      echo "<a class='pagination' href=\"?page=$i&order=$order\">$i</a>";
    }
    if ($page < $total_pages) {
      echo "<a class='pagination' href=\"?page=" . ($page + 1) . "&order=$order\">Next</a>";
    }
    echo "<a class='pagination' href=\"?page=$total_pages&order=$order\">Last</a> </div>";
    

   
    mysqli_close($conn);   

    ?>
    </body>

</html>