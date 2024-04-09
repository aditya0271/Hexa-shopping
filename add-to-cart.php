<!-- config file -->
<?php
include ('includes/config.php');
include ('includes/header1.php');
?>
<script>
.image-wrapper {
    border: 1px solid #ccc;
}

.product-details {
    padding-left: 20px; /* Adjust as needed */
}
.image-container {
    border: 1px solid #ccc; /* Add border */
    padding: 5px; /* Add padding for visual clarity */
    max-width: 100px; /* Set maximum width for the container */
    max-height: 100px; /* Set maximum height for the container */
    overflow: hidden; /* Hide overflow content */
}

.image-container img {
    max-width: 100%; /* Ensure image does not exceed container width */
    max-height: 100%; /* Ensure image does not exceed container height */
}

</script>


<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <!-- ***** Main Banner Area Start ***** -->
                <div class="page-heading" id="top">
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <h2 class="mb-4">My Bag <span style="font-size: 0.4em;">(<?php echo cart_item(); ?> item)</span></h2>
    <div class="row">
        <div class="col-md-8">
            <?php
            // Fetch and display cart items
            $cartItems = cart_items(); // Assuming cart_items() function returns an array of items
            foreach ($cartItems as $item) {
                ?>
                <div class="cart-item border p-2 mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="image-container">
                                <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['product_name']; ?>" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="product-details">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <h5><?php echo $item['product_name']; ?></h5>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <p>$<?php echo $item['price']; ?></p>
                                    </div>
                                </div>
                                <p><?php echo $item['description']; ?></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" value="<?php echo $item['quantity']; ?>" min="1">
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" id="size" name="size">
                                            <option value="" disabled selected hidden>Size</option>
                                            <option value="xs">XS</option>
                                            <option value="s">S</option>
                                            <option value="m">M</option>
                                            <option value="l">L</option>
                                            <option value="xl">XL</option>
                                            <!-- Add more size options as needed -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>



                </div>
            <div class="col-md-4">
                <div class="border p-3">
                    <h4>Order Summary</h4>
                    <p><strong>Subtotal:</strong> $XXX.XX</p>
                    <p><strong>Estimated Shipping:</strong> $XX.XX</p>
                    <p><strong>Estimated Total:</strong> $XXX.XX</p>
                    <button type="button" class="btn btn-dark mt-3">Proceed to Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero End -->



    <!-- ***** Social Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->
    <!-- footer  -->
    <?php
    include ('includes/footer.php');
    ?>

</body>