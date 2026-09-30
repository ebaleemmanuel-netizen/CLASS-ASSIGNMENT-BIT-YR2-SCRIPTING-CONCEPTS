<?php

// STEP 1: SET THE TOTAL TUITION FEE
// ---------------------------------------------------------

// The total tuition fee is UGX 2,200,000.

$tuition_fee = 2200000;


// ---------------------------------------------------------
// STEP 2: CREATE VARIABLES
// ---------------------------------------------------------

// These variables will store the values entered and
// calculated by the program.

$amount_paid = "";
$balance = "";
$status = "";
$status_class = "";


// ---------------------------------------------------------
// STEP 3: CHECK IF THE USER HAS SUBMITTED THE FORM
// ---------------------------------------------------------

/*
The program checks whether the form has been submitted.

The form uses the POST method.

If the user clicks the "Calculate Fee" button,
the amount entered will be sent to PHP.
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // -----------------------------------------------------
    // STEP 4: GET THE AMOUNT PAID FROM THE USER
    // -----------------------------------------------------

    /*
    $_POST["amount_paid"] gets the amount entered
    by the user.

    Example:

    If the user enters 700000,

    $amount_paid = 700000;
    */

    $amount_paid = $_POST["amount_paid"];


    // -----------------------------------------------------
    // STEP 5: CALCULATE THE BALANCE
    // -----------------------------------------------------

    /*
    The balance is calculated using:

    Balance = Tuition Fee - Amount Paid

    Example:

    2,200,000 - 700,000
    = 1,500,000
    */

    $balance = $tuition_fee - $amount_paid;


    // -----------------------------------------------------
    // STEP 6: CLASSIFY THE PAYMENT
    // -----------------------------------------------------

    /*
    The program uses IF, ELSEIF and ELSE.

    IF the amount paid is 0:
        The student has made No Payment.

    ELSEIF the amount paid is less than the tuition fee:
        The student has made a Partial Payment.

    ELSE:
        The student has paid the full tuition fee
        or more, therefore the student is Cleared.
    */


    if ($amount_paid == 0) {

        // No money has been paid.
        $status = "No Payment";

    } elseif ($amount_paid < $tuition_fee) {

        // Some money has been paid, but the full
        // tuition fee has not been completed.
        $status = "Partial Payment";

    } else {

        // The full tuition fee has been paid
        // or exceeded.
        $status = "Cleared";
    }


    // -----------------------------------------------------
    // STEP 7: CHOOSE THE STATUS STYLE
    // -----------------------------------------------------

    /*
    Different CSS classes are used to make each payment
    status appear differently on the webpage.
    */

    if ($status == "Cleared") {

        $status_class = "cleared";

    } elseif ($status == "Partial Payment") {

        $status_class = "partial";

    } else {

        $status_class = "none";
    }

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Fee Classification - Class Activity 2</title>


    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #eef2f7;
            color: #333;
        }

        .container {
            max-width: 850px;
            margin: auto;
        }

        .header {
            background: #1f3c88;
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 12px 12px 0 0;
        }

        .header h1 {
            margin: 0 0 8px;
        }

        .header p {
            margin: 5px;
            opacity: 0.95;
        }

        .card {
            background: white;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            border-radius: 8px;
        }

        .card h2 {
            color: #1f3c88;
            margin-top: 0;
        }

        .row {
            display: flex;
            justify-content: space-between;
            padding: 15px 5px;
            border-bottom: 1px solid #ddd;
        }

        .row:last-child {
            border-bottom: none;
        }

        .row strong {
            color: #222;
        }

        /* Input form */

        .input-form {
            background: #f7f9fc;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .input-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .input-form input {
            width: 100%;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            margin-bottom: 12px;
        }

        .input-form button {
            width: 100%;
            padding: 13px;
            background: #1f3c88;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        .input-form button:hover {
            background: #162d68;
        }

        .status-box {
            text-align: center;
            margin-top: 25px;
        }

        .status-box p {
            font-weight: bold;
        }

        .status {
            display: inline-block;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 18px;
        }

        .cleared {
            background: #d4edda;
            color: #155724;
        }

        .partial {
            background: #fff3cd;
            color: #856404;
        }

        .none {
            background: #f8d7da;
            color: #721c24;
        }

        .explanation {
            line-height: 1.7;
        }

        .code-box {
            background: #f4f6f8;
            border-left: 5px solid #1f3c88;
            padding: 15px;
            margin: 15px 0;
            font-family: monospace;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background: #1f3c88;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background: #f7f7f7;
        }

        .note {
            background: #e8f1ff;
            border-left: 5px solid #1f3c88;
            padding: 15px;
            margin-top: 15px;
        }

        footer {
            text-align: center;
            color: #777;
            padding: 20px;
        }

        @media (max-width: 600px) {

            body {
                padding: 10px;
            }

            .row {
                flex-direction: column;
                gap: 5px;
            }

            table {
                font-size: 14px;
            }

        }

    </style>

</head>


<body>

<div class="container">


    <!-- =================================================
         HEADER
         ================================================= -->

    <div class="header">

        <h1>Fee Classification</h1>

        <p>Class Activity 2 - PHP Conditional Statements</p>

        <p>
            <b>EBALE EMMANUEL BU/UP/2025/2297</b>
        </p>

    </div>


    <!-- =================================================
         STUDENT FEE INFORMATION
         ================================================= -->

    <div class="card">

        <h2>Student Fee Information</h2>


        <!--
        The user enters the amount paid below.
        The form sends the information to this same
        PHP file using the POST method.
        -->

        <div class="input-form">

            <form method="POST" action="">

                <label for="amount_paid">

                    Enter Amount Paid:

                </label>


                <input
                    type="number"
                    name="amount_paid"
                    id="amount_paid"
                    placeholder="Enter amount paid in UGX"
                    min="0"
                    required
                >


                <button type="submit">

                    Calculate Fee

                </button>

            </form>

        </div>


        <!-- Display tuition fee -->

        <div class="row">

            <span>Tuition Fee</span>

            <strong>

                UGX
                <?php echo number_format($tuition_fee); ?>

            </strong>

        </div>


        <?php

        /*
        Only display the payment information after
        the user has entered an amount.
        */

        if ($amount_paid !== "") {

        ?>


            <!-- Display amount paid -->

            <div class="row">

                <span>Amount Paid</span>

                <strong>

                    UGX
                    <?php echo number_format($amount_paid); ?>

                </strong>

            </div>


            <!-- Display balance -->

            <div class="row">

                <span>Balance</span>

                <strong>

                    UGX
                    <?php echo number_format($balance); ?>

                </strong>

            </div>


            <!-- Display payment status -->

            <div class="status-box">

                <p>Payment Status</p>


                <div class="status <?php echo $status_class; ?>">

                    <?php echo $status; ?>

                </div>

            </div>


        <?php

        }

        ?>

    </div>


    <!--  SECTION 2: PROGRAM EXPLANATION -->

    <div class="card explanation">

        <h2>Program Explanation</h2>


        <p>

            The program first creates a variable for the
            <strong>tuition fee</strong>.

        </p>


        <p>

            The student then enters the
            <strong>amount paid</strong> using the input form.

        </p>


        <p>

            The program calculates the remaining balance
            by subtracting the amount paid from the tuition
            fee.

        </p>


        <div class="code-box">

            Balance = Tuition Fee - Amount Paid

        </div>


        <p>

            The program then uses
            <strong>if, elseif and else</strong>
            statements to determine the payment status.

        </p>

    </div>


    <!-- SECTION 3: HOW THE CONDITIONS WORK-->

    <div class="card explanation">

        <h2>How the Conditions Work</h2>


        <p>

            <strong>1. IF condition:</strong>

        </p>


        <div class="code-box">

            if ($amount_paid == 0)

        </div>


        <p>

            This checks whether the student has paid
            nothing.

            If the amount paid is zero, the result is
            <strong>No Payment</strong>.

        </p>


        <p>

            <strong>2. ELSEIF condition:</strong>

        </p>


        <div class="code-box">

            elseif ($amount_paid &lt; $tuition_fee)

        </div>


        <p>

            This checks whether the student has paid some
            money but has not completed the tuition fee.

            The result is
            <strong>Partial Payment</strong>.

        </p>


        <p>

            <strong>3. ELSE condition:</strong>

        </p>


        <div class="code-box">

            else

        </div>


        <p>

            If the first two conditions are false, the
            program classifies the student as
            <strong>Cleared</strong>.

        </p>


        <div class="note">

            <strong>Important:</strong>

            PHP checks the conditions from top to bottom.

            When it finds a condition that is true, it
            executes that condition and does not continue
            checking the remaining conditions.

        </div>

    </div>


    <!--SECTION 4: REQUIRED TEST VALUES-->

    <div class="card">

        <h2>Required Test Values</h2>


        <p>

            The program can be tested using the following
            amounts:

        </p>


        <table>

            <tr>

                <th>Amount Paid</th>

                <th>Balance</th>

                <th>Expected Status</th>

            </tr>


            <tr>

                <td>UGX 0</td>

                <td>UGX 2,200,000</td>

                <td>No Payment</td>

            </tr>


            <tr>

                <td>UGX 700,000</td>

                <td>UGX 1,500,000</td>

                <td>Partial Payment</td>

            </tr>


            <tr>

                <td>UGX 2,000,000</td>

                <td>UGX 200,000</td>

                <td>Partial Payment</td>

            </tr>


            <tr>

                <td>UGX 2,200,000</td>

                <td>UGX 0</td>

                <td>Cleared</td>

            </tr>

        </table>

    </div>


    <!-- SECTION 5: CONCLUSION-->

    <div class="card explanation">

        <h2>Conclusion</h2>


        <p>

            The PHP program successfully calculates the
            student's fee balance and classifies the payment
            according to the amount entered.

        </p>


        <p>

            The <strong>if, elseif and else</strong>
            conditions make it possible for the program to
            automatically identify whether the student has
            made no payment, partial payment, or completed
            the tuition fee.

        </p>

    </div>


    <!--  FOOTER -->

    <footer>

        PHP Class Activity 2 &copy; 2026

        <p>

            <b>EBALE EMMANUEL BU/UP/2025/2297</b>

        </p>

    </footer>


</div>

</body>

</html>