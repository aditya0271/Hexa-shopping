<?php
include ('includes/config.php');
include ('includes/header1.php');
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
    <div class="">
        <div class="page-heading" id="top"></div>
        <h1 class="mt-4 mb-4 align-item-center">Payment Details</h1>

        <!-- Display Order Summary -->

        <div class="row justify-content-between mb-4 d-flex">
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
        <div class="row d-flex">
    <div class="col-md-4 mx-5 mt-4">
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
            <div id="card_details">
                <div class="form-group">
                    <label for="card_number">Card Number:</label>
                    <input type="text" class="form-control" id="card_number" name="card_number" required>
                </div>
                <div class="form-group">
                    <label for="expiry_date">Expiry Date:</label>
                    <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV:</label>
                    <input type="text" class="form-control" id="cvv" name="cvv" maxlength="3" required>
                </div>
            </div>
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