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
        <!-- <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Single Product Page</h2>
                        <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Product Area Starts ***** -->
    <?php
    // Check if product ID is provided in the URL
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $product_id = mysqli_real_escape_string($conn, $_GET['id']);

        // Fetch product details from the database based on the product ID
        $sql = "SELECT * FROM products WHERE product_id = '$product_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_assoc($result);
            ?>
            <!-- HTML structure to display product details -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src=".<?php echo $product['product_image']; ?>" alt=".<?php echo $product['product_name']; ?>">
                    </div>
                    <div class="col-lg-6">
                        <h2>
                            <?php echo $product['product_name']; ?>
                            <br>
                        </h2>
                        <h5>
                            <?php echo $product['product_description']; ?>
                        </h5>
                        <h3>RS.
                            <?php echo $product['product_price']; ?>
                        </h3>
                        <span>
                            <p>inclusive of all taxes</p>
                        </span><br>
                        <br>
                        <form action="single-product.php" method="GET">
                            <input type="hidden" name="add_to_cart" value="<?php echo $product['product_id']; ?>">
                            <button type="submit" class="btn btn-dark"><i class="bi bi-cart-fill"></i> Add to Cart</button>
                            <br>
                            <br>
                        </form>


                        <a href="#" class="btn btn-secondary"><i class="bi bi-heart-fill"></i> Wishlist <br></a>
                        <a href="#" class="btn btn-secondary"><i class="bi bi-heart-fill"></i> Go back <br></a>
                        <h6>
                            <strong> <br>DELIVERY OPTIONS <i class="bi bi-truck"></i></strong>
                        </h6>

                        <ul>
                            <li>
                                <p>Availability 100% Original Products</p>
                            </li>
                            <li>
                                <p>Pay on delivery might be available</p>
                            </li>
                            <li>
                                <p>Easy 14 days returns and exchanges</p>
                            </li>
                            <li>
                                <p>Try & Buy might be available</p>
                            </li>
                            </p>
                        </ul>
                        <!-- Additional product details can be displayed here -->
                    </div>
                </div>
            </div>
            
            <?php
        } else {
            echo "Product not found.";
        }
    }
    ?>



    <!-- Footer Area -->
    <?php
    include ('includes/footer.php');
    ?>
    <!-- Footer Area ends -->


</body>

</html>