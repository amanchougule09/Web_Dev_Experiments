<?php
$num = 17;
$flag = 0;

if ($num <= 1) {
    echo "Not a Prime Number";
} else {
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            $flag = 1;
            break;
        }
    }

    if ($flag == 0)
        echo "$num is Prime Number";
    else
        echo "$num is Not Prime Number";
}
?>