
    <!doctype html>
    <html>
    <head>
    <title>Pagination</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="subb.css">
</head>
<!DOCTYPE html>
<html>
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


?>
    <tbody>
  </table>
 
</body>
</html>
        
    </body>
    </html>
     

      
