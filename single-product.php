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
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <div class="inner-content"> -->
                                <!-- <h2>Single Product Page</h2> -->
                                <!-- <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span> -->
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
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
        $sql = "SELECT * FROM product_details WHERE product_id = '$product_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_assoc($result);
            ?>
            <!-- HTML structure to display product details -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="" style="display: flex">
                            <div class="" style="display:flex; flex-direction:column; flex: 20%">
                                <img src="./images/<?php echo $product['image1']; ?>" class="d-block w-100"
                                    alt="<?php echo $product['product_name']; ?>" id="image1">

                                <img src="./images/<?php echo $product['image2']; ?>" class="d-block w-100"
                                    alt="<?php echo $product['product_name']; ?>" id="image2">

                                <img src="./images/<?php echo $product['image3']; ?>" class="d-block w-100"
                                    alt="<?php echo $product['product_name']; ?>" id="image3">

                            </div>
                            <div class="w-80" style="display:flex; flex: 80%">
                                <div class="">
                                    <div class="w-100" id="largeImage">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <h2>
                            <?php echo $product['brand_name']; ?>
                            <br>
                            <span>
                                <h5>
                                    <span style="color: #808080;"> <?php echo $product['product_name']; ?></span>
                                    <br>
                                </h5>
                            </span>
                        </h2>
                        <br>
                        <h4>RS.
                            <?php echo $product['product_price']; ?>
                            <p style="color: #008000;">inclusive of all taxes</p>
                        </h4> 
                        <br>
                        <label for="size-selector" class="mt-8 d-inline">
                            <h6>Select Size:</h6><br>
                        </label>
                        <div class="btn-group size-selector mt-6 " role="group" aria-label="Size Selector">
                            <button type="button" class="btn btn-outline-dark rounded-circle mr-2">38</button>
                            <button type="button" class="btn btn-outline-dark rounded-circle mr-2">40</button>
                            <button type="button" class="btn btn-outline-dark rounded-circle mr-2">42</button>
                            <button type="button" class="btn btn-outline-dark rounded-circle">46</button>
                        </div>
                        <br>
                        <br>
                        <form action="index.php?add_to_cart=<?php echo $product_id; ?>" method="POST" class="mb-3 mt-2">
                            <div class="row mt-2">
                                <div class="col-md-2">
                                    <input type="number" name="quantity" value="1" min="1" class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-md-8"> <!-- Added a column to hold the buttons -->
                                <div class="row mt-2 ">
                                    <div class="col-md-6"> <!-- Each button takes half of the space -->
                                        <button type="submit" name="add_to_cart" class="btn btn-dark btn-block"><i
                                                class="bi bi-cart-fill"></i>Add to Cart</button>
                                    </div>

                                    <div class="col-md-6"> <!-- Adjust the columns as needed -->
                                        <form action="index.php?add_to_wish=<?php echo $product_id; ?>" method="POST"
                                            class="display-flex">
                                            <input type="hidden" name="add_to_wishlist" value="1">
                                            <button type="submit" class="btn btn-dark btn-block"><i
                                                    class="bi bi-cart-fill"></i>Wishlist</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </form>


                        <br><br>
                        <h5>Product Description: </h5><br>
                        <p>
                            <?php $desc = explode('|', $product['product_description']);
                            for ($i = 0; $i <= count($desc); $i++) {
                                echo $desc[$i] . '<br>';
                            }
                            ?>


                        </p>

                        <h6 class="mt-4">
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
    <script>
        const image1 = document.getElementById("image1");
        const image2 = document.getElementById("image2");
        const image3 = document.getElementById("image3");
        const largeImage = document.getElementById("largeImage");
        let selectedImage = image1;
        largeImage.innerHTML = `<img src=${selectedImage.currentSrc} class='d-block w-100' >`

        image1.addEventListener("click", function () {
            selectedImage = image1;
            largeImage.innerHTML = `<img src=${selectedImage.currentSrc} class='d-block w-100' >`;
        }, false)

        image2.addEventListener("click", function () {
            selectedImage = image2;
            largeImage.innerHTML = `<img src=${selectedImage.currentSrc} class='d-block w-100' >`;
        }, false)

        image3.addEventListener("click", function () {
            selectedImage = image3;
            largeImage.innerHTML = `<img src=${selectedImage.currentSrc} class='d-block w-100' >`;
        }, false)



    </script>

</body>

</html>