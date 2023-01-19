<?php 


$x=1;

$Name = array("anuj"=> "Gai", "vishal" => "Google","nitin" => "microsoft","pankuj" => "Apple","anu" => "Gladhand");

foreach ($Name as $key => $value) {
	echo  $x++ . '. ' . ucfirst("$key") ." works at ". $value ;
	echo "<br>";
}



 ?>