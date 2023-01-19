<?php
echo "hellow world"."<br>";
$a =[
[91, 16, 29],
[42, 45, 34],
[23, 82, 211]
];

  $b= $a[0][1]+ $a[1][0]+ $a[1][2]+ $a[2][1]; 
  $l=$a[0][0]+ $a[0][2]+ $a[1][1]+ $a[2][0]+ $a[2][2];
 echo $b."<br>";
 echo $l."<br>";
 echo"<ul>";
foreach($a as $x){
	echo "<li>"$a = $x "</li>";
  echo"</ul>";

}

$f=array( 5, 7, 9);
 foreach($f as $v){
 	echo $v."<br>";
 }

?>