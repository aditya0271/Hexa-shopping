<!-- config file -->
<?php
include ('includes/config.php');
include ('includes/header1.php');
?>

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
    <div class="container ">
        <h2 class="mb-4">My Bag <span style="font-size: 0.4em;">(
                <?php cart_item(); ?> item)
            </span></h2>
        <div class="row">
            <div class="col-md-8">
            

                <div class="cart-item border p-4">
                    <div class="row">
                        <div class="col-md-2    ">
                            <img src="assets/images/men-01.jpg" alt="Item Name" class="img-fluid">
                        </div>
                        <div class="col-md-4">
                            <h5>The Bear House</h5>
                            <p>Description of the item.</p>
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" value="1" min="1">
                        </div>
                        <div class="form-group col-md-13">
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
                        <div class="col-md text-md-end">
                            <p>$Price:-
                            </p>
                        </div>
                    </div>

                </div>
                <!-- Repeat the above block for each item in the cart -->
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