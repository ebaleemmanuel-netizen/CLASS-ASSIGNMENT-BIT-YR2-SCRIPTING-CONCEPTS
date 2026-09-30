<?php

$tuitionFee = 2000000;

$testAmounts = [0, 700000, 2000000, 2200000];

echo "<h2>Class Activity 2: Fee Classification</h2>";
echo "<p>Tuition Fee: UGX " . number_format($tuitionFee) . "</p>";

foreach ($testAmounts as $amountPaid) {

    $balance = $tuitionFee - $amountPaid;

    if ($amountPaid >= $tuitionFee) {
        $status = "Cleared";
    } elseif ($amountPaid > 0) {
        $status = "Partial payment";
    } else {
        $status = "No payment";
    }

    echo "<hr>";
    echo "<strong>Amount Paid:</strong> UGX " . number_format($amountPaid) . "<br>";
    echo "<strong>Balance:</strong> UGX " . number_format($balance) . "<br>";
    echo "<strong>Status:</strong> " . $status . "<br>";
}
?>
