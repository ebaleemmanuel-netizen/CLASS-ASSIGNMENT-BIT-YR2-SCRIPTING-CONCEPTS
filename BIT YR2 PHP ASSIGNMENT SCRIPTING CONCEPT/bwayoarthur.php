<?php
$tuition_fee = 2000000;
$amount_paid = 700000;

$balance = $tuition_fee - $amount_paid;

if ($amount_paid == 0){
    $status = "No payment";
    }elseif ($amount_paid >= $tuition_fee){
        $status = "Cleared";
    }else {
        $status = "Partial payment";
    }

    echo "<h2>Fee Classification Report</h2>";
    echo"Tuition Fee: " .number_format($tuition_fee)."<br>";
    echo"Amount Paid: " .number_format($amount_paid)."<br>";
    echo"Balance: " .number_format($balance)."<br>";
    echo"Status: <b>" . $status . "</b><br>";
    ?>