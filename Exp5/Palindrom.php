<?php
function checkPalindrome($num) {
    $original = $num;
    $reverse = 0;

    while ($num > 0) {
        $rem = $num % 10;
        $reverse = ($reverse * 10) + $rem;
        $num = (int)($num / 10);
    }

    if ($original == $reverse)
        echo "$original is Palindrome";
    else
        echo "$original is Not Palindrome";
}

checkPalindrome(121);
?>