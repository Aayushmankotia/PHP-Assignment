<?php
$n=1;
$m=5;
for($i=1; $i<=$m; $i++){

    for($j=1; $j<=$i; $j++){
      echo $n;
      $n = $n+1;
       
    }
    echo "<br>";
    
}

$n=15;
for($i=1; $i<=$m; $i++){

    for($j=1; $j<=$m-$i+1; $j++){
      
        echo $n;
        $n = $n-1;
    }
    echo "<br>";
    
}

?>