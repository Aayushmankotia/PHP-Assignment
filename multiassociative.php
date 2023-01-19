<?php


$result=
[
"Aman" => [
	"Math" => 65,
	"english" => 87, 
	"hindi" => 90
],
"Raman" => ["Math" => 98, "english" => 88, "hindi" => 82 ],
"Ram" => ["Math" => 67, "english" => 56, "hindi" => 72
]

];



echo "<pre>";
print_r($result);
echo "<pre>";

echo "<table border='2px' cellspacing='10px'cellpadding='5px'>";
foreach( $result as $v =>$num){
	echo "<tr>
	<td> $v </td>";
	foreach($num as $x){
		echo "<td> $x </td> ";
	
	}
	echo "</tr>";
	
}
	echo "</table>";

?>