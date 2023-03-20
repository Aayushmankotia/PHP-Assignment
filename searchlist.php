<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="subb.css">
    <title>registeration form</title>
</head>

<body>
    <nav>
        <a class='hh ' href='dashboard.php'>DASH-BOARD</a>
        <a class='logout hh ' href='usertable.php'>BACK</a>
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

        $search = $_GET['name'];

        $sql = "SELECT * FROM reg_form WHERE `name` LIKE '{$search}%'";

        $result = mysqli_query($conn, $sql);

        $row = mysqli_num_rows($result);

        if ($row > 0) {

            echo "<table class= 'usertbl' cellpadding='5px' cellspacing= '0px' >";

            echo "<tr class = 'trow' >" . "<th class='theader'>" . "ID" . "</th>";
            echo "<th class = 'theader'>" . "NAME" . "</th>";
            echo "<th class = 'theader' >" . "EMAIL" . "</th>";
            echo "<th class = 'theader' >" . "CITY" . "</th>";
            echo "<th class = 'theader'>" . "OCCUPATION" . "</th>" . "</tr>";

            while ($row = mysqli_fetch_array($result)) {

                $id = $row['user_id'];
                $name = $row['name'];
                $email = $row['email'];
                $city = $row['city'];
                $occupation = $row['occupation'];

                echo "<tr class = 'trow' >" . "<td class = 'theader'>" . $id . "</td>";
                echo "<td class = 'tdata' >" . $name . "</td>";
                echo "<td class = 'tdata'>" . $email . "</td>";
                echo "<td class = 'tdata'>" . $city . "</td>";
                echo "<td class = 'tdata' >" . $occupation . "</td>" . "</tr>"  ;
            }
            echo "</table>";





        } else {
            echo "<footer >";
            echo "SOMETHING WRONG !!" . "<BR>";
            echo "SEARCH IS NOT FOUND";


            echo "</footer>";

        }


    ?>

</body>

</html>