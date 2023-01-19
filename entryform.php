
<html>
<head>
<style>
	form{
		
	}
	table{
		margin:5% auto;
		border: solid black 2px;
		background-image:linear-gradient(25deg ,white ,white, cyan, cyan, black, black);
		font-size: 20px;
		height: 70%;
		width:25%;
		padding: 2%;


	}
	input{
		height: 55%;
		border-radius: 10PX;
	}
	.sub:click ~ table{
	     background: red;
	     font-size: 20px;
	}
	.center{
    display: flex;
    align-items: center;
    height: 100%;
}
    
</style>

</head>


<body>

<table align="center">
	<caption></caption>
	<form method="post" action=""> 
<tr>
<td><label>NAME</label></td>
<td><input type="text" name="fname" placeholder="name" required>
</td>
</tr>
<tr>
<td><label>LASTNAME</label></td>
<td><input type="text" name="lname" placeholder="lastname" required>
</td>
</tr>
<tr>
<td><label>E-MAIL</label></td>
<td><input type="mail" name="email" placeholder="gamil" required>
</td>
</tr>
<tr>
<td><label>PASSWORD</label></td>
<td><input type="password" name="password" placeholder="password" required>
</td>
</tr>
<tr>
<td><label>PHONE</label></td>
<td><input type="number" name="num" placeholder="contact" required>
</td>
</tr>
<tr >
<td><label>GENDER</label></td>
<td class="center"><input type="radio" name="gender">
	<label for>male</label>
<input type="radio" name="gender">
	<label for>female</label>
</td>
</tr>
<tr>
<td><label>ADDRESS</label></td>
<td><input type="text" name="addr" placeholder="name" required>
</td>
</tr>
<tr>
	<br>
<td></td>
<td><input id="sub" type="submit" value="submit" name="click">
</td>
</tr>
</form>
<?php




// Create connection
$conn =mysqli_connect('localhost','root','','examform');
if(isset($_POST['click']))
{
	$fname= $_POST['fname'];
	$sname=$_POST['lname'];
    $mail=$_POST['email'];	
	$stars=$_POST['password'];	
	$pnum=$_POST['num'];	
	$gen=$_POST['gender'];	
	$ress=$_POST['addr'];	
	$query="INSERT INTO entryform (name, secondname, email, pass, phone, gender, address) VALUES('$fname','$sname','$mail','$stars','$pnum','$gen','$ress')";
	$run= mysqli_query($conn,$query);

	}
 ?>
<p id="max"></p>
</table>
</body>
</html>


