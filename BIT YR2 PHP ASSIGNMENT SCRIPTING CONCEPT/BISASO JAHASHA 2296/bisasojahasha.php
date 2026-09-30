<?php
$tuitionFee = 2000000;
$amountPaid = 700000;

$balance = $tuitionFee - $amountPaid;

if ($amountPaid==0){
    echo"Staus: No payment yet";
}elseif($amountPaid>= $tuitionFee){
    echo"Status: Cleared.";
}else{
    echo"Status: Patial Payment.";
}
echo"<br>Tuition Fee: UGX " .$tuitionFee;
echo"<br>Anount Paid: UGX " .$amountPaid;
echo"<br>Balance: UGX " .$balance;
?>
