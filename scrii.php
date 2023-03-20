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




	<script>
        //VALIDATION FOR NAME FIELD 
        function namevalidation(){
       var namefield = document.getElementById("inputname");
  var nameValue = namefield.value;
  
  
  if (nameValue.length == 0) {
    document.getElementById('errorName').innerHTML=" *REQUIRED FIELD (CAN'T BE EMPTY)";
    return false;
  }
  
  // Perform the second validation
//   if (!fieldValue.match(/^[a-zA-Z]+$/)) {
//   document.getElementById('errorMsg').innerHTML="FIELD MUST CONTAIN ONLY LETTERS";
//     return;
//   }
  if (!fieldValue.match(/^[A-Z]+$/)) {
  document.getElementById('errorName').innerHTML=" CONTAIN CAPITAL LETTERS ONLY";
  return false;
  }
  // If both validations pass, do something else
  document.getElementById('errorName').innerHTML="";
  return true;
        }




//VALIDATION FOR GMAIL FIELD 
function emailvalidation(){
       var emailfield = document.getElementById("inputemail");
  var emailValue = emailfield.value;
  
  
  // Perform the first validation
  if (emailValue.length == 0) {
    document.getElementById('errorEmail').innerHTML=" *REQUIRED FIELD (CAN'T BE EMPTY)";
    return false;
  }
 
  if (!emailValue.match(/^[^\s@]+@gmail\.com$/)) {
  document.getElementById('errorEmail').innerHTML=" @gmail.com REQUIRED";
  return false;
  }
  // If both validations pass, do something else
  document.getElementById('errorEmail').innerHTML="";
  return true;
        }



        //VALIDATION FOR PASSWORD
        function cpassvalidation(){
       var cpassfield = document.getElementById("inputcpass");
  var cpassValue = cpassfield.value;
  
  var pass = document.getElementById("inputpass");
  var passVal= pass.value;
  
  // Perform the first validation
  if (cpassValue.length == 0) {
    document.getElementById('errorCpass').innerHTML=" *REQUIRED FIELD (CAN'T BE EMPTY)";
    return false;
  }
 
  if (!cpassValue.match(/^[0-9]{5,5}$/)) {
  document.getElementById('errorCpass').innerHTML="NUMBER MUST BE '5' ONLY";
  return false;
  }
  if (cpassValue !== passVal) {
  document.getElementById('errorPass').innerHTML="PASSWORD ISN'T MATCH";
  return false;
  }
  // If both validations pass, do something else
  document.getElementById('errorCpass').innerHTML="";
return true;

        }

//    (!cpassValue.match(/^[a-zA-Z0-9]{5,7}$/)) 



   //VALIDATION FOR CONFIRM PASSWORD
   function passvalidation(){
        var cpass = document.getElementById("inputcpass");
    var cpassVal = cpass.value;
    
       var passfield = document.getElementById("inputpass");
  var passValue = passfield.value;
  
  // Perform the first validation
  if (passValue.length == 0) {
    document.getElementById('errorPass').innerHTML=" *REQUIRED FIELD (CAN'T BE EMPTY)";
    return false;
  }
 
  if (!passValue.match(/^[0-9]{5,5}$/)) {
  document.getElementById('errorPass').innerHTML="NUMBER MUST BE '5' ONLY";
  return false;
  }
  if (passValue !== cpassVal) {
  document.getElementById('errorPass').innerHTML="PASSWORD ISN'T MATCH";
  return false;
  }
  // If both validations pass, do something else
  document.getElementById('errorPass').innerHTML="";
return true;

        }


           //VALIDATION FOR PHONENUMBER
   function phonevalidation(){
   
       var phonefield = document.getElementById("inputphone");
  var phoneValue = phonefield.value;
  
  // Perform the first validation
//   if (phoneValue.length == 0) {
//     document.getElementById('errorPhone').innerHTML=" *REQUIRED FIELD (CAN'T BE EMPTY)";
//     return false;
//   }
 
  if (!phoneValue.match(/^[0-9]{10,10}$/)) {
  document.getElementById('errorPhone').innerHTML="INVALID PHONE-NUMBER";
  return false;
  }
  
  // If both validations pass, do something else
  document.getElementById('errorPhone').innerHTML="";
return true;

        }


        // VALIDATION ON PIN-CODE
        function pinvalidation(){
   
   var pinfield = document.getElementById("inputpin");
var pinValue = pinfield.value;

if (!pinValue.match(/^[0-9]{6,6}$/)) {
document.getElementById('errorpin').innerHTML="INVALID PIN";
return false;
}

// If both validations pass, do something else
document.getElementById('errorpin').innerHTML="";
return true;
    }

   </script>
    <?php
include_once 'configer.php';

    $nameerr = $emailerr = $passerr = $phoneerr = $occupationerr = $cityerr = $pin_codeerr =$cpasserr = null;
    

    $flag = TRUE;
    if (isset($_POST['submit'])) {

        // name validation
        if (empty($_POST["name"])) {
            $nameerr = "**REQUIRED FIELD NAME ";
            $flag=false;
        } 
        elseif
        (!preg_match("/^[A-Z]*$/", $_POST['name'])){
            $nameerr = "CAPITAL LETTER CHARACTER ONLY ";
        $flag = false;
        }
       
        else {
            $name = test($_POST['name']);
        }
        // name validation ends^^^^^

        // email validation ^^^^^

        $email = test($_POST['email']);
        if (empty($_POST["email"])) {
            $emailerr = "*REQUIRED FIELD EMAIL";
        
            $flag=false;
        }
        // "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$"
        // (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)
        // if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
            // '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/'
            // "~([a-zA-Z0-9!#$%&'*+-/=?^_`{|}~])@([a-zA-Z0-9-]).([a-zA-Z0-9]{2,4})~" 
        elseif
        (!preg_match('/^[a-zA-Z0-9_.+-]+@gmail\.com$/' , $_POST['email'])){
            $emailerr = "@gmail.com REQUIRED ";
        $flag = false;
        }
       
        else{

        $check ="SELECT *FROM reg_form WHERE email='$email' ";
        $check_result = mysqli_query($conn, $check);

            if(mysqli_num_rows($check_result)>0){
                $emailerr = "EMAIL ALREADY EXIST !!";
                $flag = false;
            }
            else {
                $email = test($_POST['email']);
            }
        }
            //email validation end


             //pass-word validation 
                $cpass= test($_POST['cpass']);

                if (empty($_POST["cpass"])) {
                    $passerr = "*REQUIRED FIELD PASSWORD";
                    
                    $flag=false;
       
                } 
                elseif
                    (!preg_match('/^[0-9]*$/', $_POST['cpass'])){
                        $passerr = "INVALID PASSWORD NUMBER ";
                    $flag = false;
                    }
                else {
                    $pass = test($_POST['cpass']);
                }


        if (empty($_POST["pass"])) {
            $passerr = "*REQUIRED FIELD PASSWORD";
            
            $flag=false;

        } 
        elseif
            (!preg_match('/^[0-9]*$/', $_POST['pass'])){
                $passerr = "INVALID PASSWORD NUMBER ";
            $flag = false;
            }
            elseif
            ($_POST['pass'] !== $cpass){
                $cpasserr = "PASSWORD DOESN'T MATCH ";
            $flag = false;
            }
        
        else {
            $pass = test($_POST['pass']);
        }

       
        if(!preg_match('/^[0-9]{10}+$/', $_POST['phone'])){
            $phoneerr = "INVALID PHONE NUMBER ";    
            $flag = false;
        }
        else{
            $phone = test($_POST['phone']);
        }
        
        $occupation = test($_POST['occupation']);
        $city = test($_POST['city']);

        if(!preg_match("/^[0-9]{6}+$/", $_POST['pin_code'])){
            $pin_codeerr = "PIN-CODE SHOULD BE OF 6 CHARACTERS  ";
        }
        else{
            // echo $pin;
            $pin = test($_POST['pin_code']);
        }
        

        if ($flag) {
            $sql = "INSERT INTO reg_form (name, email, pass, phone, occupation, city, pin_code)
                 VALUES ('$name', '$email','$pass', '$phone', '$occupation', '$city', '$pin')";

            if (mysqli_query($conn, $sql)) {
                
                echo "<script>"."alert('NEW RECORD INSERTED !')"."</script>"."<br>";
            } else {
                echo "error";
                echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
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
 
 <form action="#" method ="POST" id="forms" name="myForm"> 
    <div class="division">
        <fieldset>REGISTRATION FORM</fieldset>
        <table>
            <tr>
                <td> <label for="name"> NAME  </label>
                </td>
            
                <td>  <input type="text"  placeholder="NAME  (capital characters)"  name="name" id="inputname" onblur="namevalidation()" autofocus="true">  <span id ="errorName"> </span><?php echo "<span>". $nameerr."<span>";?> 
            
            </td>
            </tr>

            <tr> 
                <td>  
                    <label for="email"> EMAIL </label>
                </td>
                <td>   
                    <input type="email" placeholder="EMAIL" name="email" id="inputemail" onblur="emailvalidation()" ><span id ="errorEmail"></span><?php echo "<span>". $emailerr."<span>";?> 
                </td>
            </tr>

            <tr> 
                <td>   
                    <label for="cpass">PASSWORD  </label>
                </td>
                <td>    
                    <input type="password" placeholder="PASSWORD" name="cpass"  id="inputcpass" onblur="cpassvalidation()" ><span id ="errorCpass"></span><?php echo "<span>". $cpasserr."<span>";?> 
                </td>
            </tr>

            <tr> 
                <td>   
                    <label for="pass">CON-PASSWORD  </label>
                </td>
                <td>    
                    <input type="password" placeholder="CONFIRM-PASSWORD" name="pass"  id="inputpass" onblur="passvalidation()" ><span id ="errorPass"></span><?php echo "<span>". $passerr."<span>";?> 
                </td>
            </tr>

            <tr>
                <td>
                    <label for="phone">PHONE NO. </label>
                </td>
                <td>   
                    <input type="tel" placeholder="PHONE NUMBER" name="phone" id="inputphone" onchange="phonevalidation()"  ><span id ="errorPhone"></span><?php echo "<span>". $phoneerr."<span>";?> 
                </td>
            </tr>

            <tr>
                <td> 
                    <label for="occup">OCCUPATION</label>
                </td>
                <td>      
                    <input type="text" placeholder="OCCUPATION" name="occupation" id="occup"><span id =" occup_error"></span><?php echo "<span>". $occupationerr."<span>";?> 
                </td>
            </tr>

            <tr> 
                <td>  
                    <label for="city ">CITY  </label> 
                </td>
                <td>  
                    <select name="city" >
                        <option value="SHIMLA" >SHIMLA</option>
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
                    <label for ="pin"> PIN-CODE  </label>
                </td>
                <td>  
                    <input type="text" placeholder="PIN" name="pin_code"  onchange="pinvalidation()" id="inputpin" ><span id ="errorpin"></span><?php echo "<span>". $pin_codeerr."<span>";?> 
                </td>
            </tr>
        
        </table>
        <div class="sub">
            <input class= "btn" type="submit" name="submit" value="SUBMIT">
        </div>
        <div class="sub">
            <a href="log.php">LOGIN</a>
        </div>
    </div>
    </form>
    
</body>
</html> 