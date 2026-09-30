<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Classification System</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f7;
            text-align: center;
            padding: 30px;
        }

        .container {
            background: white;
            max-width: 400px;
            margin: auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
        }

        h2 {
            color: #003366;
        }

        input {
            width: 90%;
            padding: 12px;
            margin: 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background: #003366;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #0055aa;
        }

        .result {
            background: #eaf2f8;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            line-height: 1.8;
            text-align: left;
        }

        .status {
            font-weight: bold;
            color: #003366;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Fee Classification System</h2>

    <p>Tuition Fee: UGX 200,000</p>

    <form method="POST">

        <label for="amountPaid">Enter Amount Paid:</label>

        <input
            type="number"
            name="amountPaid"
            id="amountPaid"
            min="0"
            step="1"
            placeholder="Enter amount paid"
            required
        >

        <br>

        <button type="submit" name="calculate">
            Calculate Fees
        </button>

    </form>

    <?php

    if (isset($_POST['calculate'])) {

        // Declare variables
        $tuitionFee = 200000;
        $amountPaid = (float) $_POST['amountPaid'];

        // Validate input
        if (!is_numeric($_POST['amountPaid']) || $amountPaid < 0) {

            echo "<p>Please enter a valid amount.</p>";

        } else {

            // Calculate balance
            $balance = max($tuitionFee - $amountPaid, 0);
					$overpayment=max($amountPaid-$tuitionFee,0);

            // Classify payment status
            if ($amountPaid == 0) {

                $status = "No Payment";

            } elseif ($amountPaid >= $tuitionFee) {

                $status = "Cleared";

            } else {

                $status = "Partial Payment";

            }

            // Display results
            echo "<div class='result'>";

            echo "<h3>Fee Statement</h3>";

            echo "Tuition Fee: UGX " .
                number_format($tuitionFee) . "<br>";

            echo "Amount Paid: UGX " .
                number_format($amountPaid) . "<br>";

            echo "Balance: UGX " .
                number_format($balance) . "<br>";

            echo "Payment Status: <span class='status'>" .
                htmlspecialchars($status) . "</span>";

            echo "</div>";
        }
    }

    ?>

</div>

</body>
</html>