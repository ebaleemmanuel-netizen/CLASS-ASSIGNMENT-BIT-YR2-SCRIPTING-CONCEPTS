<?php
define("currency", "UGX");

$tuitionFee = 2000000;
$amountPaid = 700000;

$balance = $tuitionFee - $amountPaid;
echo"<h1>Student Fees structure.</h1>";
echo"<h3>Byekwaso Arthur BU/UP/2025/1635.</h3>";
if ($amountPaid==0){
    echo"Staus: No payment yet";
}elseif($amountPaid>= $tuitionFee){
    echo"Status: Cleared.";
}else{
    echo"Status: Patial Payment.";
}

echo"<br>Tuition Fee: " .currency ." " .$tuitionFee;
echo"<br>Anount Paid:  " .currency ." " .$amountPaid;
echo"<br>Balance:  " .currency ." ".$balance;
?>
