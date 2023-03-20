<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="subb.css">
    <title>registeration form</title>
    <script src="jsvalidation.js"></script>
</head>

<body>

    <?php
    session_start();

    include_once 'configer.php';

    if (isset($_SESSION['authenticated']) || $_SESSION['authenticated']) {
        header('Location:dashboard.php');
        exit;
    }


    $nameerr = $emailerr = $passerr = $phoneerr = $occupationerr = $cityerr = $pin_codeerr = $cpasserr = null;


    $flag = TRUE;


    if (isset($_POST['submit'])) {

        // name validation
        if (empty($_POST["name"])) {
            $nameerr = "**REQUIRED FIELD NAME ";
            $flag = false;
        } elseif
        (!preg_match("/^[A-Z]*$/", $_POST['name'])) {
            $nameerr = "CAPITAL LETTERS ONLY ";
            $flag = false;
        } else {
            $name = test($_POST['name']);
        }
        // name validation ends^^^^^
    
        // email validation ^^^^^
    
        $email = test($_POST['email']);
        if (empty($_POST["email"])) {
            $emailerr = "*REQUIRED FIELD EMAIL";

            $flag = false;
        } elseif
        (!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/', $_POST['email'])) {
            $emailerr = "INVALID EMAIL";
            $flag = false;
        } else {

            $check = "SELECT *FROM reg_form WHERE email='$email' ";
            $check_result = mysqli_query($conn, $check);

            if (mysqli_num_rows($check_result) > 0) {
                $emailerr = "EMAIL ALREADY EXIST !!";
                $flag = false;
            } else {
                $email = test($_POST['email']);
            }
        }
        //email validation end
    

        //pass-word validation 
        $cpass = test($_POST['cpass']);

        if (empty($_POST["cpass"])) {
            $passerr = "*REQUIRED FIELD PASSWORD";

            $flag = false;

        } elseif
        (!preg_match('/^[0-9]*$/', $_POST['cpass'])) {
            $passerr = "INVALID PASSWORD NUMBER ";
            $flag = false;
        } else {
            $pass = test($_POST['cpass']);
        }


        if (empty($_POST["pass"])) {
            $passerr = "*REQUIRED FIELD PASSWORD";

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

        $occupation = test($_POST['occupation']);
        $city = test($_POST['city']);

        if (!preg_match("/^[0-9]{6}+$/", $_POST['pin_code'])) {
            $pin_codeerr = "PIN-CODE SHOULD BE OF 6 CHARACTERS  ";
            $flag = false;
        } else {
            // echo $pin;
            $pin = test($_POST['pin_code']);
        }

        if (!empty($avatar = $_FILES["avatar"]["name"])) {
            

            $target_dir = "uploads/"; // directory where the image will be uploaded
            $target_file = $target_dir . basename($_FILES["avatar"]["name"]); // full path of the uploaded file
            $avatarFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // get the file extension
    
            // Check if the file is an avatar
            $check = getimagesize($_FILES["avatar"]["tmp_name"]);
            if ($check === false) {
                $imgerror = "File is not an avatar.";
                $flag = false;
            }

            // Check if the file already exists in the directory
            if (file_exists($target_file)) {
                $imgerror = "IMAGE IS ALREADY EXIST";
                $flag = false;
            }

            // Check file size
            if ($_FILES["avatar"]["size"] > 5000000) {
                $imgerror = "TOO LARGE FILE";
                $flag = false;
            }

            // Allow certain file formats
            if (
                $avatarFileType != "jpg" && $avatarFileType != "png" && $avatarFileType != "jpeg"
                && $avatarFileType != "gif"
            ) {
                $imgerror = "ONLY JPG, JPEG, PNG & GIF IMAGES ";
                $flag = false;
            }

            // Upload the file
            if ($flag) {
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                    // echo "The file ". ($_FILES["avatar"]["name"]). " has been uploaded.";
                } else {
                    $imgerror = "SORRY, ERROR IN UPLOADING";
                    $flag = false;
                }
            }

        }
        // display piture using url 
        elseif (!empty($file_url = $_POST['avatar'])) {
            // $imgname =(END(explode('/',$avatar)));
            $target_dir = "uploads/";


            $avatar = basename($file_url);
            $folder_path = $target_dir . basename($file_url);


            if (file_put_contents($folder_path, file_get_contents($file_url))) {
                echo "";
            } else {
                $imgerror = "File can't be moved!";
            }
        } else {
            $avatar = "person-gb066ca900_640.png";

            // $imgerror= "*IMAGE IS REQUIRED ";
            // $flag= false;
        }

        if ($flag) {


            $sql = "INSERT INTO reg_form (name, email, pass, phone, occupation, city, pin_code, avatar)
                 VALUES ('$name', '$email','$pass', '$phone', '$occupation', '$city', '$pin', '$avatar')";


            if (mysqli_query($conn, $sql)) {

                $_SESSION['message'] = "<script>" . "alert('YOUR REGISTRATION IS COMPLETE, PLEASE LOGIN !')" . "</script>" . "<br>";


                // die();
            } else {
                echo "error";
                echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
            header("Location: login.php");
            mysqli_close($conn);
        }

    }

    function test($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return ($data);
    }

    ?>
    <form class="mainform" action="#" method="POST" id="forms" name="myForm" enctype="multipart/form-data">
        <div class="division">
            <fieldset>REGISTRATION FORM</fieldset>
            <table>
                <tr>
                    <td> <label for="name"> NAME </label>
                    </td>

                    <td> <input type="text" placeholder="NAME  (capital characters)" name="name" id="inputname"
                            onblur="namevalidation()"> <span id="errorName"> </span>
                        <?php echo "<span>" . $nameerr . "<span>"; ?>

                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="email"> EMAIL </label>
                    </td>
                    <td>
                        <input type="email" placeholder="EMAIL" name="email" id="inputemail"
                            onblur="emailvalidation()"><span id="errorEmail"></span>
                        <?php echo "<span>" . $emailerr . "<span>"; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="cpass">PASSWORD </label>
                    </td>
                    <td>
                        <input type="password" placeholder="PASSWORD" name="cpass" id="inputcpass"
                            onblur="cpassvalidation()"><span id="errorCpass"></span>
                        <?php echo "<span>" . $cpasserr . "<span>"; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="pass">CONFIRM </label>
                    </td>
                    <td>
                        <input type="password" placeholder="CONFIRM-PASSWORD" name="pass" id="inputpass"
                            onblur="passvalidation()"><span id="errorPass"></span>
                        <?php echo "<span>" . $passerr . "<span>"; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="phone">PHONE NO. </label>
                    </td>
                    <td>
                        <input type="tel" placeholder="PHONE NUMBER" name="phone" id="inputphone"
                            onchange="phonevalidation()"><span id="errorPhone"></span>
                        <?php echo "<span>" . $phoneerr . "<span>"; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="occup">OCCUPATION</label>
                    </td>
                    <td>
                        <input type="text" placeholder="OCCUPATION" name="occupation" id="occup"><span
                            id=" occup_error"></span>
                        <?php echo "<span>" . $occupationerr . "<span>"; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="city ">CITY </label>
                    </td>
                    <td>
                        <select name="city">
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
                        <input type="text" placeholder="PIN" name="pin_code" onchange="pinvalidation()"
                            id="inputpin"><span id="errorpin"></span>
                        <?php echo "<span>" . $pin_codeerr . "<span>"; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="avatar"> AVATAR </label>
                    </td>
                    <td>
                        <input class='file' type="file" placeholder="IMAGE URL" name="avatar" id="avatar">

                        <?php echo "<span>" . $imgerror . "</span>"; ?>
                    </td>

                </tr>

                <tr>
                    <td>

                    </td>
                    <td class="box">
                        <input type="checkbox" name="check" id="inputchk">
                        <span id="checktext"> CHECK TO CHOOSE IMAGE <br> BY URL OR BY FILE</span>

                    </td>
                </tr>

            </table>
            <div class="sub">
                <input class="btn" type="submit" name="submit" value="SUBMIT">
            </div>
            <div class="sub">
                <a href="login.php">LOGIN</a>
            
                
            </div>
        </div>
    </form>



</body>

</html>