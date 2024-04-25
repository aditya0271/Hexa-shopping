<?php
include ('includes/config.php');
include ('includes/header1.php');
// Include the database configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the payment method is selected
    if (isset($_POST['payment_method'])) {
        $payment_method = $_POST['payment_method'];

        // Define variables for card details (if applicable)
        $card_number = '';
        $expiry_date = '';
        $cvv = '';

        // Check if the payment method is 'card' and retrieve card details
        if ($payment_method === 'card') {
            if (isset($_POST['card_number']) && isset($_POST['expiry_date']) && isset($_POST['cvv'])) {
                $card_number = $_POST['card_number'];
                $expiry_date = $_POST['expiry_date'];
                $cvv = $_POST['cvv'];

                // You should perform validation and sanitization of these values before inserting into the database
            }
        }

        // Insert payment details into the database
        $sql = "INSERT INTO payments (payment_method, card_number, expiry_date, cvv) 
                VALUES ('$payment_method', '$card_number', '$expiry_date', '$cvv')";

        if (mysqli_query($conn, $sql)) {
            echo "Payment details inserted successfully.";
            // Redirect or perform further actions as needed
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Payment method not selected.";
    }
} else {
    echo "Invalid request method.";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div>
        <div class="page-heading" id="top"></div>
        <h1 class="row justify-content-center mb-4z">Payment Details</h1>

        <!-- Display Order Summary -->

        <div class="row justify-content-center mb-4">
            <!-- Advertisements -->
            <div class="col-md-5 mx-4">
                <div class="alert alert-primary" role="alert">
                    <h4 class="alert-heading">Special Offer!</h4>
                    <p>Get 10% cashback on HDFC Bank cards.</p>
                    <hr>
                    <p class="mb-0">Limited time offer. Hurry!</p>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Exclusive Deal!</h4>
                    <p>Shop now and save big with our special offers.</p>
                    <hr>
                    <p class="mb-0">Explore more offers from our partners.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
    <div class="col-md-4">
        <!-- Payment Form -->
        <form method="POST" action="process_payment.php">
            <div class="form-group">
                <h4>Payment Method:</h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" required>
                    <label class="form-check-label" for="cod">Cash on Delivery</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" id="card" value="card" required>
                    <label class="form-check-label" for="card">Credit/Debit Card</label>
                </div>
            </div>
            <!-- Credit/Debit Card Details -->
            <!-- COD Details -->
            <div id="cod_details" style="display: none;">
                <p>Cash on Delivery selected. No further payment details required.</p>
            </div>
            <button type="submit" class="btn btn-dark">Pay Now</button>
        </form>
    </div>
    <div class="col-md-4 p-4 mx-4">
        <?php calculate_order_summary(); ?>
        <!-- <a href="check-out.php" class="btn btn-dark mx-5 m-2">Proceed to Payment</a> -->
    </div>
</div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const codRadio = document.getElementById('cod');
        const cardRadio = document.getElementById('card');
        const cardDetails = document.getElementById('card_details');
        const codDetails = document.getElementById('cod_details');

        // Function to handle radio button change
        function handlePaymentMethodChange() {
            if (cardRadio.checked) {
                cardDetails.style.display = 'block';
                codDetails.style.display = 'none';
            } else {
                cardDetails.style.display = 'none';
                codDetails.style.display = 'block';
            }
        }

        // Add event listeners to radio buttons
        codRadio.addEventListener('change', handlePaymentMethodChange);
        cardRadio.addEventListener('change', handlePaymentMethodChange);
    });
</script>


</html>