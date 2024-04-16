<?php
include('includes/config.php');
include('includes/header1.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <div class="container">
        <!-- <h1 class="text-center mt-8 mb-4">Checkout</h1> -->

        <!-- Customer Information Section -->
        <div class="row">
            <div class="col-md-6">
                <h2>Customer Information</h2>
                <form id="customer-info-form">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact:</label>
                        <input type="text" class="form-control" id="contact" name="contact" required>
                    </div>
                    <!-- Other form inputs -->
                </form>
            </div>
            <!-- Shipping Details -->
            <div class="col-md-6 d-flex flex-column">
                <h2>Shipping Details</h2>
                <form id="shipping-form">
                    <div class="form-group">
                        <label for="shipping-method">Shipping Method:</label>
                        <select class="form-control" id="shipping-method" name="shipping-method">
                            <option value="standard">Standard Shipping</option>
                            <option value="express">Express Shipping</option>
                        </select>
                    </div>
                    <!-- Shipping Address Fields -->
                    <div class="form-group">
                        <label for="flat">Flat Number:</label>
                        <input type="text" class="form-control" id="flat" name="flat" required>
                    </div>
                    <div class="form-group">
                        <label for="locality">Locality:</label>
                        <input type="text" class="form-control" id="locality" name="locality" required>
                    </div>
                    <div class="form-group">
                        <label for="street">Street:</label>
                        <input type="text" class="form-control" id="street" name="street" required>
                    </div>
                    <div class="form-group">
                        <label for="pincode">Pin Code:</label>
                        <input type="text" class="form-control" id="pincode" name="pincode" required>
                    </div>
                    <!-- Other shipping details -->
                </form>
            </div>
        </div>

        <!-- Order Summary -->
        <h2 class="col-md-6">Order Summary</h2>
        <div id="order-summary">
            <!-- Display order items dynamically -->
            <?php calculate_order_summary(); ?>
        </div>

        <!-- Payment Options -->
        <h2 class="mt-4 col-md-6">Payment Options</h2>
        <form id="payment-form">
            <div class="form-group">
                <label for="payment-method">Choose a payment method:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="upi" value="upi" checked>
                    <label class="form-check-label" for="upi">
                        UPI
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="cod" value="cod">
                    <label class="form-check-label" for="cod">
                        Cash on Delivery
                    </label>
                </div>
            </div>
            <!-- UPI ID Entry (Shown if UPI is selected) -->
            <div class="form-group" id="upiInput" style="display: block;">
                <label for="upiId">Enter your UPI ID:</label>
                <input type="text" class="form-control" id="upiId" name="upiId" placeholder="example@upi">
            </div>
            <button type="submit" class="btn btn-dark mt-3">Proceed to Payment</button>
        </form>


        <!-- Order Review and Confirmation -->
        <form id="order-review-form" class="mt-4 col-md-6">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="terms-agree" name="terms-agree" required>
                <label class="form-check-label" for="terms-agree">I agree to the Terms and Conditions</label>
            </div>
            <button type="submit" class="btn btn-dark mt-3">Place Order</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const paymentOptions = document.querySelectorAll('input[name="paymentMethod"]');
            const upiInput = document.getElementById('upiInput');

            function toggleUPIInput() {
                if (document.getElementById('upi').checked) {
                    upiInput.style.display = 'block';
                } else {
                    upiInput.style.display = 'none';
                }
            }

            paymentOptions.forEach(option => {
                option.addEventListener('change', toggleUPIInput);
            });
        });
    </script>

     <!-- Footer Area -->
     <?php
    include ('includes/footer.php');
    ?>
    <!-- Footer Area ends -->

</body>

</html>