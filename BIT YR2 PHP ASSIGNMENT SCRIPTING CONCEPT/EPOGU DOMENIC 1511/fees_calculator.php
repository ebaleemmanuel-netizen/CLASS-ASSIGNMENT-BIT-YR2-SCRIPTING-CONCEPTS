<?php

// -------------------------------
// FEE CLASSIFICATION PROGRAM
// -------------------------------

// Total tuition fee
$tuitionFee = 2000000;

// Default values
$amountPaid = 0;
$balance = $tuitionFee;
$status = "No payment";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get amount paid from the form
    $amountPaid = (float) $_POST["amountPaid"];

    // Calculate balance
    $balance = $tuitionFee - $amountPaid;

    // Determine payment status
    if ($amountPaid == 0) {

        $status = "No payment";

    } elseif ($amountPaid < $tuitionFee) {

        $status = "Partial payment";

    } else {

        $status = "Cleared";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fee Classification</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0f172a, #1e3a8a);
            color: #ffffff;
            min-height: 100vh;
            padding: 30px 15px;
        }

        .container {
            width: 95%;
            max-width: 1100px;
            margin: auto;
        }

        /* HEADER */

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .header p {
            color: #cbd5e1;
            font-size: 16px;
        }

        /* MAIN GRID */

        .main-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        /* CARDS */

        .card {
            background: rgba(255, 255, 255, 0.10);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 18px;
            padding: 25px;
            backdrop-filter: blur(10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
        }

        .card h2 {
            margin-bottom: 20px;
            color: #fbbf24;
        }

        /* FORM */

        .fee-box {
            margin-bottom: 20px;
        }

        .fee-box label {
            display: block;
            margin-bottom: 8px;
            color: #cbd5e1;
        }

        .fee-display {
            background: rgba(0, 0, 0, 0.25);
            padding: 15px;
            border-radius: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 14px;
            border: none;
            outline: none;
            border-radius: 10px;
            font-size: 16px;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #fbbf24;
            color: #111827;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #f59e0b;
            transform: translateY(-2px);
        }

        /* RESULT */

        .result {
            margin-top: 20px;
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            padding: 13px 0;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }

        .result-row:last-child {
            border-bottom: none;
        }

        .status {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 20px;
            background: #fbbf24;
            color: #111827;
            font-weight: bold;
        }

        /* EXPLANATION */

        .explanation {
            margin-top: 25px;
        }

        .explanation p {
            line-height: 1.7;
            color: #dbeafe;
            margin-bottom: 15px;
        }

        .code-box {
            background: #020617;
            border-left: 4px solid #fbbf24;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
            overflow-x: auto;
        }

        code {
            color: #e2e8f0;
            font-family: Consolas, monospace;
            line-height: 1.6;
        }

        /* TEST TABLE */

        .test-section {
            margin-top: 25px;
        }

        .test-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .test-table th,
        .test-table td {
            padding: 13px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }

        .test-table th {
            color: #fbbf24;
        }

        /* FOOTER */

        footer {
            text-align: center;
            margin-top: 35px;
            color: #94a3b8;
            font-size: 14px;
        }

        /* RESPONSIVE */

        @media (max-width: 750px) {

            .main-grid {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 28px;
            }

            .card {
                padding: 20px;
            }

            .test-table {
                font-size: 13px;
            }
        }

    </style>

</head>

<body>

<div class="container">

    <!-- HEADER -->

    <div class="header">

        <h1>💰 Fee Classification System</h1>

        <p>
            Class Activity 2 — PHP Conditional Statements
        </p>

    </div>


    <!-- MAIN CONTENT -->

    <div class="main-grid">


        <!-- INPUT CARD -->

        <div class="card">

            <h2>💳 Enter Payment</h2>

            <form method="POST">

                <div class="fee-box">

                    <label>Total Tuition Fee</label>

                    <div class="fee-display">
                        UGX 2,000,000
                    </div>

                </div>


                <div class="fee-box">

                    <label for="amountPaid">
                        Amount Paid
                    </label>

                    <input
                        type="number"
                        name="amountPaid"
                        id="amountPaid"
                        placeholder="Enter amount paid"
                        min="0"
                        required
                    >

                </div>


                <button type="submit">
                    Check Fee Status
                </button>

            </form>

        </div>


        <!-- RESULT CARD -->

        <div class="card">

            <h2>📊 Payment Result</h2>

            <div class="result">

                <div class="result-row">

                    <span>Tuition Fee</span>

                    <strong>
                        UGX <?php echo number_format($tuitionFee); ?>
                    </strong>

                </div>


                <div class="result-row">

                    <span>Amount Paid</span>

                    <strong>
                        UGX <?php echo number_format($amountPaid); ?>
                    </strong>

                </div>


                <div class="result-row">

                    <span>Balance</span>

                    <strong>
                        UGX <?php echo number_format($balance); ?>
                    </strong>

                </div>


                <div class="result-row">

                    <span>Status</span>

                    <span class="status">
                        <?php echo $status; ?>
                    </span>

                </div>

            </div>

        </div>

    </div>


    <!-- EXPLANATION -->

    <div class="card explanation">

        <h2>📚 Explanation of the Program</h2>


        <p>
            This PHP program is used to classify a student's tuition
            payment. The program takes the tuition fee and the amount
            paid by the student and calculates the remaining balance.
        </p>


        <h3>1. Creating the Tuition Fee</h3>

        <div class="code-box">

            <code>
                $tuitionFee = 2000000;
            </code>

        </div>

        <p>
            This variable stores the total tuition fee. In this example,
            the tuition fee is <strong>UGX 2,000,000</strong>.
        </p>


        <h3>2. Getting the Amount Paid</h3>

        <div class="code-box">

            <code>
                $amountPaid = (float) $_POST["amountPaid"];
            </code>

        </div>

        <p>
            This gets the amount entered by the student from the HTML
            form. The value is converted into a number so that PHP can
            perform calculations with it.
        </p>


        <h3>3. Calculating the Balance</h3>

        <div class="code-box">

            <code>
                $balance = $tuitionFee - $amountPaid;
            </code>

        </div>

        <p>
            The balance is calculated by subtracting the amount paid
            from the total tuition fee.
        </p>

        <p>
            For example:
            <strong>2,000,000 - 700,000 = 1,300,000</strong>.
        </p>


        <h3>4. Using if, elseif and else</h3>

        <div class="code-box">

            <code>

                if ($amountPaid == 0) {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;$status = "No payment";<br>
                } elseif ($amountPaid &lt; $tuitionFee) {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;$status = "Partial payment";<br>
                } else {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;$status = "Cleared";<br>
                }

            </code>

        </div>

        <p>
            The <strong>if</strong> statement checks whether the student
            has paid nothing.
        </p>

        <p>
            The <strong>elseif</strong> statement checks whether the
            student has paid something but has not completed the tuition.
        </p>

        <p>
            The <strong>else</strong> statement is used when none of the
            previous conditions is true. In this program, it means the
            student has paid the full tuition fee or more.
        </p>


        <h3>5. Why Does Condition Order Matter?</h3>

        <p>
            PHP checks conditions from <strong>top to bottom</strong>.
            When it finds a condition that is true, it executes that
            block and skips the remaining conditions.
        </p>

        <p>
            Therefore, the conditions should be arranged carefully.
            First we check for no payment, then partial payment, and
            finally cleared payment.
        </p>

    </div>


    <!-- TEST RESULTS -->

    <div class="card test-section">

        <h2>🧪 Required Test Results</h2>

        <table class="test-table">

            <thead>

                <tr>
                    <th>Amount Paid</th>
                    <th>Balance</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td>UGX 0</td>
                    <td>UGX 2,000,000</td>
                    <td>No payment</td>
                </tr>

                <tr>
                    <td>UGX 700,000</td>
                    <td>UGX 1,300,000</td>
                    <td>Partial payment</td>
                </tr>

                <tr>
                    <td>UGX 2,000,000</td>
                    <td>UGX 0</td>
                    <td>Cleared</td>
                </tr>

                <tr>
                    <td>UGX 2,200,000</td>
                    <td>UGX -200,000</td>
                    <td>Cleared</td>
                </tr>

            </tbody>

        </table>

    </div>


    <!-- CONCLUSION -->

    <div class="card explanation">

        <h2>📝 Conclusion</h2>

        <p>
            The program demonstrates how PHP can use variables,
            arithmetic operations, HTML forms and conditional statements
            to classify student fee payments.
        </p>

        <p>
            The three possible classifications are
            <strong>No payment</strong>,
            <strong>Partial payment</strong>, and
            <strong>Cleared</strong>.
        </p>

    </div>


    <footer>

        Class Activity 2 — Fee Classification |
        PHP Programming

    </footer>

</div>

</body>

</html>