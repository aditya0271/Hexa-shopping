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

            <h2 class="mb-4"> My Wishlist <span style="font-size: 0.4em;">(
                        <?php echo wish_item(); ?> item)
                    </span></h2>

                <!-- Display cart items using the cart_items() function -->
                <!-- <?php wish_items();?> -->
        

</body>
</html>

   </div>

        <!-- footer -->
        <?php include ('includes/footer.php'); ?>
</body>


