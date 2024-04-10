<!-- config file -->
<?php
include ('includes/config.php');
include ('includes/header1.php');
?>
<!-- Your CSS styles -->

<body>
 
    <div class="container">
        <div class="row col-lg-12">
            <div class="container">
                <!-- ***** Main Banner Area Start ***** -->
                <div class="page-heading" id="top"></div>

                <h2 class="mb-4">My Bag <span style="font-size: 0.4em;">(
                        <?php echo cart_item(); ?> item)
                    </span></h2>

                <!-- Display cart items using the cart_items() function -->
                <?php cart_items(); ?>

            </div>

            <div class="col-md-8">
                <div class="border p-2">
                    <h4>Order Summary</h4>
                    <p><strong>Subtotal:</strong> $XXX.XX</p>
                    <p><strong>Estimated Shipping:</strong> $XX.XX</p>
                    <p><strong>Estimated Total:</strong> $XXX.XX</p>
                    <button type="button" class="btn btn-dark mt-3">Proceed to Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include ('includes/footer.php'); ?>
</body>
