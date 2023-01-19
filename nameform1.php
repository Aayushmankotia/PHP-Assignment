<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title></title>

<head>
	<style>
		*{
			margin:unset ;

		}
		.division{
			margin:0% auto ;
			box-shadow: 0PX 1PX 6PX 2PX white;
			background-color: transparent;
			font-size: 20px;
			height:240px;
			width:20%;
			padding: 2%;
			border-radius: 10px;
			z-index: 1;
			color: white;
			
			
		}
		.btn{
			width: 120px;
			text-align: center;
			margin: 0px auto;
			height: 30px;
			background-color: #fe700521;
			box-shadow: 0PX 1PX 6PX 2PX white;
			color: white;
			border-radius: 9px;
		}
		.fname{
			margin: 10% auto;


		}
		.maindiv{
			padding-top:4%;
		}
		.head{
    	margin-bottom: 26px;
		}
		
		table{

			align: center;
			margin:5% auto 0px auto ;
			background-color: #fe700521;
			font-size: 20px;
			height:330px;
			width:24%;
			z-index: 1;
			color: white;
			border-radius: 10px;	
		}
		
		td,tr,th{
			text-align: center;
			padding-top: 1px;
			box-shadow: 0PX 1PX 6PX 2PX white;
			border-radius: 7px;
			opacity: 0.9;
		}
		input{
			border-radius: 10PX;
			font-size:16px;
			padding-left: 15px;
		}
		
		.into{
			height: 20px;
			margin-left: 20px;	
		}
		img{
			position:absolute;
			z-index:-1;
			height: 100vh;
			width: 100%;
			margin: 0px auto ;
			filter: brightness(70%);
		}
		h2{
			text-align: center;
			border-bottom: solid red 2px;
			color: red;
			border-radius:7px;
			background-color: #ffffffa1;
		}
	</style>
</head>
<?php 
if(isset( $_POST['first']) && isset($_POST['second'] )){
	$_POST['first'];
	$x=  $_POST['first'];
	$_POST['second'];
	$y = $_POST['second'];
}
?>


<body>

    <img src="projects/image/f1.jpg" alt="img">
    <div class="maindiv">
	<div  class= "division">
		<h2>SUBMITION FORM</h2>
		
		<form action="nameform1.php" method="post"> 
			<div class="fname"> <label>FIRSTNAME</label>
				<input class="into" type="text" name="first" placeholder="ENTER FIRSTNAME" required>
			</div>
			<div class="fname">
			<label>LAST NAME</label>
				<input class="into" type="text" name="second" placeholder="ENTER LASTNAME" required>
				</div>
			<div class="btn">
			<input class="btn" type="submit" value="SUBMIT" onclick="" >
		</div>
			
		</form>
		
    </div>

	
	<table>
		<caption class="head"> TABLE DATA </caption>
		
			<tr>

				<th>FIRST NAME </th>
				<th>LAST NAME </th>
				
			</tr>
			<tr>
				<?php 
				
				echo "<td> $x </td>";
				 echo "<td> $y </td>";
			 ?>
			</tr>
			<tr>
				<?php 
				echo "<td></td>";
				 echo "<td> </td>";
				 		
				 ?>
			</tr>
			
		
	</table>
	
	
</div>
</body>

  
</html>

