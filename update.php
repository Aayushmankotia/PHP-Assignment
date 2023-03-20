<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>                                 
    <link rel="stylesheet" href="subb.css">
    <script src="jsvalidation.js"></script>


</head>

<body>
        <?php
        session_start();
        include_once 'configer.php';

        if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
            header('Location: login.php');
            exit;
        }

        $sid = $_SESSION['sid'];

        //    $name = $_SESSION['name'] ;
    //  $email= $_SESSION['email'] ;
    //  $pass= $_SESSION['pass'] ;
    //  $phone= $_SESSION['phone'] ;
    //  $occupation= $_SESSION['occupation'] ;
    //  $city= $_SESSION['city'] ;
    //  $pin= $_SESSION['pin_code'] ;
        function test($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return ($data);
        }

        $nameerr = $emailerr = $passerr = $phoneerr = $occupationerr = $cityerr = $pin_codeerr = $imgerror = null;


        $flag = TRUE;
        $_SESSION['savatar'];
        if (isset($_POST['submit'])) {

            // name validation
            if (empty($_POST["name"])) {

                $nameerr = "* REQUIRED FIELD NAME ";
                $flag = false;
            } elseif (!preg_match("/^[A-Z]*$/", $_POST['name'])) {

                $nameerr = "CAPITAL LETTER CHARACTER ONLY ";
                $flag = false;
            } else {

                $name = test($_POST['name']);
            }
            // name validation ends^^^^^
        
            // email validation ^^^^^
        
            $email = test($_POST['email']);
            if (empty($_POST["email"])) {
                $emailerr = "* REQUIRED FIELD EMAIL";

                $flag = false;
            } elseif
            (!preg_match('/^[a-zA-Z0-9_.+-]+@gmail\.com$/', $_POST['email'])) {
                $emailerr = "@gmail.com REQUIRED ";
                $flag = false;
            } else {
                $email = test($_POST['email']);
            }

            //email validation end
        
            //pass-word validation 
            $cpass = test($_POST['cpass']);

            if (empty($_POST["cpass"])) {
                $passerr = "* REQUIRED FIELD EMAIL PASSWORD";

                $flag = false;

            } elseif
            (!preg_match('/^[0-9]*$/', $_POST['cpass'])) {
                $passerr = "INVALID PASSWORD NUMBER ";
                $flag = false;
            } else {
                $pass = test($_POST['cpass']);
            }


            if (empty($_POST["pass"])) {
                $passerr = "* REQUIRED FIELD PASSWORD";

                $flag = false;

            } elseif
            (!preg_match('/^[0-9]*$/', $_POST['pass'])) {
                $passerr = "INVALID PASSWORD NUMBER ";
                $flag = false;
            } elseif
            ($_POST['pass'] !== $cpass) {
                $cpasserr = "PASSWORD DOESN'T MATCH ";
                $flag = false;
            } else {
                $pass = test($_POST['pass']);
            }


            if (!preg_match('/^[0-9]{10}+$/', $_POST['phone'])) {
                $phoneerr = "INVALID PHONE NUMBER ";
                $flag = false;
            } else {
                $phone = test($_POST['phone']);
            }

            $occupation = $_POST['occupation'];
            $city = test($_POST['city']);

            if (!preg_match("/^[0-9]{6}+$/", $_POST['pin_code'])) {
                $pin_codeerr = "PIN-CODE SHOULD BE OF 6 CHARACTERS  ";
            } else {
                // echo $pin;
                $pin = test($_POST['pin_code']);
            }




            if (!empty($updateavatar = $_FILES["avatar"]["name"])) {


                $target_dir = "uploads/"; // directory where the image will be uploaded
                $target_file = $target_dir . basename($_FILES["avatar"]["name"]); // full path of the uploaded file
                $avatarFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // get the file extension
        
                // Check if the file is an avatar
                $check = getimagesize($_FILES["avatar"]["tmp_name"]);
                if ($check === false) {
                    $avatarerror = "File is not an avatar.";
                    $flag = false;
                }

                // Check if the file already exists in the directory
                if (file_exists($target_file)) {
                    $avatarerror = "IMAGE IS ALREADY EXIST";
                    $flag = false;
                }

                // Check file size
                if ($_FILES["avatar"]["size"] > 2000000) {
                    $avatarerror = "TOO LARGE FILE";
                    $flag = false;
                }

                // Allow certain file formats
                if (
                    $avatarFileType != "jpg" && $avatarFileType != "png" && $avatarFileType != "jpeg"
                    && $avatarFileType != "gif"
                ) {
                    $avatarerror = "ONLY JPG, JPEG, PNG & GIF IMAGES ";
                    $flag = false;
                }

                // Upload the file
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                    // echo "The file ". ($_FILES["avatar"]["name"]). " has been uploaded.";
                } else {
                    $avatarerror = "SORRY, ERROR IN UPLOADING";
                    $flag = false;
                }

            }
            // display piture using url 
            elseif (!empty($file_url = $_POST['avatar'])) {
                // $imgname =(END(explode('/',$avatar)));
                $target_dir = "uploads/";


                $updateavatar = basename($file_url);
                $folder_path = $target_dir . basename($file_url);


                if (file_put_contents($folder_path, file_get_contents($file_url))) {
                    
                } else {
                    $imgerror = "File can't be moved!";
                }
            } else {
                $updateavatar = $_SESSION['savatar'];


            }

            if ($flag) {
                $sql = "UPDATE `reg_form` SET `name`='$name',`email`='$email',`pass`='$pass',`phone`='$phone',`occupation`='$occupation',`city`='$city',`pin_code`='$pin',`avatar`='$updateavatar' WHERE `user_id`='$sid'";

                $result = $conn->query($sql);

                if ($result == TRUE) {
                    echo "<footer>";
                    echo "UPDATED SUCESSFULLY";
                    echo "</footer>";
                    // echo "<script>"."alert('UPDATED SUCESSFULLY')"."</script>"."<br>";
                    // header("Location:log.php");
                } else {

                    echo "Error: ";
                }

            }
        }


        $sname = $_SESSION['sname'];
        $semail = $_SESSION['semail'];
        $spass = $_SESSION['spass'];
        $sphone = $_SESSION['sphone'];
        $soccupation = $_SESSION['soccupation'];
        $scity = $_SESSION['scity'];
        $spin = $_SESSION['spin_code'];
        $savatar = $_SESSION['savatar'];
        mysqli_close($conn);

        ?>

    <form class="mainform" action="#" method="POST" enctype="multipart/form-data">
        <div class="division">
            <fieldset>UPDATE FORM</fieldset>
            <table>
                <tr>
                    <td> <label for="name"> NAME </label>
                    </td>

                    <td> <input type="text" placeholder="NAME  (capital characters)" value='<?php echo $sname; ?>'
                            name="name" id="name"> <?php echo "<span>" . $nameerr . "</span>"; ?>

                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="email"> EMAIL </label>
                    </td>
                    <td>
                        <input type="email" placeholder="EMAIL" value='<?php echo $semail; ?>' name="email"
                            id="email"><?php echo "<span>" . $emailerr . "</span>"; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="cpass">PASSWORD </label>
                    </td>
                    <td>
                        <input type="password" placeholder="PASSWORD" value='<?php echo $spass; ?>' name="cpass"
                            id="cpass"><?php echo "<span>" . $passerr . "</span>"; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="pass">CONFIRM </label>
                    </td>
                    <td>
                        <input type="password" placeholder="CONFIRM-PASSWORD" value='<?php echo $spass; ?>' name="pass"
                            id="pass"><?php echo "<span>" . $cpasserr . "</span>"; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="phone">PHONE NO. </label>
                    </td>
                    <td>
                        <input type="tel" placeholder="PHONE NUMBER" value='<?php echo $sphone; ?>' name="phone"
                            id="phone"><?php echo "<span>" . $phoneerr . "</span>"; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="occup">OCCUPATION</label>
                    </td>
                    <td>
                        <input type="text" placeholder="OCCUPATION" value='<?php echo $soccupation; ?>'
                            name="occupation" id="occup">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="city ">CITY </label>
                    </td>
                    <td>
                        <select name="city">

                            <option value='<?php echo $scity; ?>'> <?php echo $scity; ?></option>
                            <option value="SHIMLA">SHIMLA</option>
                            <option value="DHARAMSHALA">DHARAMSHALA</option>
                            <option value="PALAMPUR">PALAMPUR</option>
                            <option value="KANGRA">KANGRA</option>
                            <option value="BAIJNATH">BAIJNATH</option>
                            <option value="NURPUR">NURPUR</option>
                            <option value="DALHOUSIE">DALHOUSIE</option>
                            <option value="NAHAN">NAHAN</option>

                        </select>
                        <!-- <input type="text" placeholder="CITY" name="city" id="city"> -->
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="pin"> PIN-CODE </label>
                    </td>
                    <td>
                        <input type="text" placeholder="PIN" name="pin_code" value='<?php echo $spin; ?>'
                            id="pin"><?php echo "<span>" . $pin_codeerr . "</span>"; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="avatar"> AVATAR </label>
                    </td>
                    <td>
                        <input type="file" placeholder="IMAGE URL" value='<?php echo $_SESSION['savatar'] ; ?>' name="avatar" id="avatar">
                        <?php
                        // echo "<span>".$updateavatar."</span>";
                        // echo "<span class='errorimg'>" . 'CHOOSEN- ' .  . "</span>";
                        echo "<span >" . $avatarerror . "</span>";
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>

                    </td>
                    <td class="box">
                        <input type="checkbox" name="check" id="inputchk">
                        <span id="checktext"> CHECK TO CHOOSE IMAGE <br>  BY URL OR BY FILE</span>
                            
                    </td>
                </tr>

            </table>
            <div class="sub">
                <input class="btn" type="submit" name="submit" value="UPDATE">
            </div>
            <div class="sub">
                <a href="dashboard.php">DASH-BOARD</a>
                <a href='destroy.php'>LOGOUT</a>
            </div>
            <div>
    </form>

</body>

</html>