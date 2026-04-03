<?php
$arr = array(10, 21, 32, 45, 56, 67);

$even = 0;
$odd = 0;

foreach ($arr as $num) {
    if ($num % 2 == 0)
        $even++;
    else
        $odd++;
}

echo "Count of Even Numbers in array: $even <br>";
echo "Count of Odd Numbers in array: $odd";
?>