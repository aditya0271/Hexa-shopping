<!-- config file -->
<?php
include ('includes/config.php');
include ('includes/header1.php');
?>
<!-- Your CSS styles -->

<body>

    <div class="container">
        <div class="row col-lg-12">
            <div class="container mx-20px">
                <!-- ***** Main Banner Area Start ***** -->
                <div class="page-heading" id="top"></div>

                <h2 class="mb-4">My Bag <span style="font-size: 0.4em;">(
                        <?php echo cart_item(); ?> item)
                    </span></h2>

                <!-- Display cart items using the cart_items() function -->
                <?php cart_items(); ?>

            </div>

            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <a href="index.php" class="btn btn-dark mt-3">Continue Shopping</a>
                    </div>
                    <div class="col-md-6 text-center">
                        <?php calculate_order_summary(); ?>
                        <a href="shipping.php" class="btn btn-dark mt-3">Proceed to Checkout</a>
                    </div>
                </div>
            </div>




            <!-- footer -->
            <?php include ('includes/footer.php'); ?>
</body>

<script>
    function updatePrice(elem, productId) {
        var price = elem.dataset.price;
        var quantity = elem.value;
        var total = parseFloat(price) * parseInt(quantity);
        document.getElementById('total_' + productId).innerText = 'RS. ' + total.toFixed(2);
    }
</script>