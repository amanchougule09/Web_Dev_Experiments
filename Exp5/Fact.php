<?php
function factorial($n) {
    $fact = 1;
    for ($i = 1; $i <= $n; $i++) {
        $fact *= $i;
    }
    return $fact;
}

$num = 5;
echo "Factorial of $num is " . factorial($num);
?>