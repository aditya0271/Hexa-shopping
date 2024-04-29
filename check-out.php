<?php
// Include the database configuration file and any other necessary includes
include('includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the payment method is selected
    if (isset($_POST['payment_method'])) {
        $payment_method = $_POST['payment_method'];

        // Assuming the user ID is stored in the session when the user is logged in
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            // Insert payment details into the database
            $sql_payment = "INSERT INTO payments (payment_method, user_id) 
                            VALUES ('$payment_method', $user_id)";

            if (mysqli_query($conn, $sql_payment)) {
                // Payment details inserted successfully
                // Retrieve product IDs from the hidden input field
                $product_ids = $_POST['product_ids']; // Assuming 'product_ids' is the name of the hidden input field

                // Explode the product IDs into an array
                $product_ids_array = explode(',', $product_ids);

                // Insert order details into the order_details table
                foreach ($product_ids_array as $product_id) {
                    // Get product details for calculating subtotal price
                    $product_query = "SELECT product_price FROM product_details WHERE product_id = $product_id";
                    $product_result = mysqli_query($conn, $product_query);
                    $product_row = mysqli_fetch_assoc($product_result);
                    $product_price = $product_row['product_price'];

                    // Calculate subtotal price
                    $subtotal_price = 1 * $product_price; // Assuming quantity is fixed at 1

                    $sql_order = "INSERT INTO order_details (user_id, product_id, quantity, subtotal_price) 
                                    VALUES ($user_id, $product_id, 1, $subtotal_price)";
                    mysqli_query($conn, $sql_order);
                }

                // Redirect to success page or display success message
                echo "<script>alert('Your order has been placed.');</script>";
                echo "<script>window.location.href = 'index.php';</script>";
                exit; // Stop further execution
            } else {
                echo "Error: " . $sql_payment . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "User ID not set in session. Please log in first.";
        }
    } else {
        echo "Payment method not selected.";
    }
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
        <!-- Assume calculate_order_summary() function generates order summary -->

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
                <form method="POST">
                    <div class="form-group">
                        <h4>Payment Method:</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" required>
                            <label class="form-check-label" for="cod">Cash on Delivery</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="card" value="card" required>
                            <label class="form-check-label" for="card">Card Payment</label>
                        </div>
                    </div>
                    <!-- Credit/Debit Card Details -->
                    <div id="card_details" style="display: none;">
                        <div class="form-group">
                            <label for="card_number">Card Number:</label>
                            <input type="text" class="form-control" id="card_number" name="card_number">
                        </div>
                        <div class="form-group">
                            <label for="expiry_date">Expiry Date:</label>
                            <input type="text" class="form-control" id="expiry_date" name="expiry_date">
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV:</label>
                            <input type="text" class="form-control" id="cvv" name="cvv">
                        </div>
                    </div>
                    <input type="hidden" name="product_ids" value="1,2,3"> <!-- Example product IDs -->
                    <button type="submit" class="btn btn-dark">Pay Now</button>
                </form>
            </div>
            <div class="col-md-4 p-4 mx-4">
                <!-- Order Summary -->
                <?php calculate_order_summary(); ?> <!-- Assuming this function generates order summary -->
            </div>
        </div>
    </div>
    <!-- JavaScript for handling payment method selection -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const codRadio = document.getElementById('cod');
            const cardRadio = document.getElementById('card');
            const cardDetails = document.getElementById('card_details');

            // Function to handle radio button change
            function handlePaymentMethodChange() {
                if (cardRadio.checked) {
                    cardDetails.style.display = 'block';
                } else {
                    cardDetails.style.display = 'none';
                }
            }

            // Add event listeners to radio buttons
            codRadio.addEventListener('change', handlePaymentMethodChange);
            cardRadio.addEventListener('change', handlePaymentMethodChange);
        });
    </script>
</body>

</html>
