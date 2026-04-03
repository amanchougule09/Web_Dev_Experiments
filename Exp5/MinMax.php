<?php
$arr = array(10, 45, 23, 67, 12);

$max = $arr[0];
$min = $arr[0];

foreach ($arr as $value) {
    if ($value > $max)
        $max = $value;
    if ($value < $min)
        $min = $value;
}

echo "Maximum Element: $max <br>";
echo "Minimum Element: $min";
?>