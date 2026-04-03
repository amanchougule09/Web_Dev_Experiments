<?php
$units = 180;
$bill = 0;

if ($units <= 50) {
    $bill = $units * 3;
} elseif ($units <= 150) {
    $bill = (50 * 3) + (($units - 50) * 4);
} else {
    $bill = (50 * 3) + (100 * 4) + (($units - 150) * 5);
}

echo "Total Electricity Bill = Rs. " . $bill;
?>