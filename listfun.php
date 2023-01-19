<?php

$arr=[
[3, 7, 8, 3],
[8, 4, 6, 1],
[7, 2, 9, 0],
];
echo "<table table border='3px' cellpadding='15px' cellspacing='0px' style='color:red; border-radius:15px; background:cyan;'>";

foreach($arr as list($x, $y, $z, $m)){
	echo "<tr>";
	echo "<td>$x</td><td> $y</td><td> $z</td><td>$m</td>";
	echo "</tr>";
}
echo"</table>"

?>