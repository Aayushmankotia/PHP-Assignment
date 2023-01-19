<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<style>
		*{
			text-align: center;
		}
		form{
			background: gray;
			height: 370px;
			width: 15%;
			margin:2% auto;
			padding: 10px 20px ;
			border: solid black 1px;
			border-radius: 16px;

		}
		.enter{
			width:97%;
			height: 30px;
			margin:25px auto 0px;
			color: black;
			border:solid blue 3px ;

		}
		.btn{
			height: 65px;
			width: 65px;
			font-size: 42px;
			border-radius: 50%;
		}
		span{
			height: 30px;
			margin-top: 35px;
			background: white;
			padding: 15px;
			border-radius: 45%;
			border:solid #17e717 3px ;
		}
		P{
			color: #17e717;

		}
		.btndiv{
			display: flex;
			justify-content: space-around;
			margin: 22% auto 0px ;

		}
		h1{
			margin-top: 10%;


		}
	</style>
	<h1>CALCULATOR</h1>
	<form action="" method="post">
		<input class="enter" type="number" name="firstnumber" placeholder="FIRSTNUMBER">
		<input class="enter" type="number" name="secondnumber" placeholder="SECONDNUMBER">
	<div class="btndiv">
		<input class="btn" type="submit" name="click" value="+">
		<input class="btn" type="submit" name="click" value="-">
		<input class="btn" type="submit" name="click" value="*">
		<input class="btn" type="submit" name="click" value="/">
	</div>
	
	<p>ANSWER IS :</p>

		<?php 

 if (isset($_POST['click'])) {

//$_POST['firstnumber'];
//$_POST['secondnumber'];
//$_POST['click'];
$click= $_POST['click'];
$fnum = $_POST['firstnumber'];
$snum = $_POST['secondnumber'];

switch ($click) {
	case '+':
	$ans= $fnum + $snum;
		
		break;
	case '-':
	$ans= $fnum - $snum;
		break;
	case '*':
		$ans= $fnum * $snum;
		break;
	case '/':
		$ans= $fnum / $snum;
		break;
	default:
		$ans= "invalid";
		break;
}


}

echo " <span> $ans </span> ";

?>
</form>

</body>
</html>
