<!-- config file -->
<?php
include ('includes/config.php');
include ('includes/header1.php');
?>

<body>

    <!-- Hero Start -->
    <div class="container-fluid py-5 mb-5 hero-header"
        style="background-image: url('assets/images/bg.webp');filter: blur(0px);">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-3 text-light">Dress to impress, shop with finesse!</h4>
                    <h1 class="mb-2 display-10 text-light">Step into style, step into our collection</h1>
                    <div class="position-relative mx-auto">
                        <input class="form-control border-2 border-secondary w-75 py-4 px-2 rounded-pill" type="number"
                            placeholder="Search">
                        <button type="submit"
                            class="btn btn-dark border-2 border-dark py-3 px-4 position-absolute rounded-pill text-white h-100"
                            style="top: 0; right: 20%;">Submit Now</button>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active rounded">
                                <img src="assets/images/slider1.webp" class="img-fluid w-100 h-100" alt="First slide">
                                <!-- <a href="#" class="btn px-4 py-2 text-white rounded"></a> -->
                            </div>
                            <div class="carousel-item rounded">
                                <img src="assets/images/slider2.webp" class="img-fluid w-100 h-100 rounded"
                                    alt="Second slide">
                                <!-- <a href="#" class="btn px-4 py-2 text-white rounded"></a> -->
                            </div>
                            <div class="carousel-item rounded">
                                <img src="assets/images/slider3.webp" class="img-fluid w-100 h-100 rounded"
                                    alt="Third slide">
                                <!-- <a href="#" class="btn px-4 py-2 text-white rounded"></a> -->
                            </div>
                        </div>
                        <button class="carousel-control-prev bg-dark" type="button" data-bs-target="#carouselId"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden"></span>
                        </button>
                        <button class="carousel-control-next bg-dark" type="button" data-bs-target="#carouselId"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero End -->



    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>We Are Hexashop</h4>
                                <span>Discover Your Style with Hexashop</span>
                                <div class="main-border-button">
                                    <a href="#">Purchase Now!</a>
                                </div>
                            </div>
                            <img src="assets/images/left-banner-image.jpg" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Women</h4>
                                            <span>Women's Fashion Delights</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Women's Fashion Delights</h4>
                                                <p>Discover a world of chic and stylish women's clothing.
                                                </p>
                                                <div class="main-border-button">
                                                    <a href="#">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-01.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Men</h4>
                                            <span>Shop Men's Collection</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Men's Style Essentials</h4>
                                                <p>Upgrade your wardrobe with our latest men's fashion trends.
                                                </p>
                                                <div class="main-border-button">
                                                    <a href="#">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-02.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Kids</h4>
                                            <span>Kids' Fashion Wonderland</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Fun and Fashion for Kids</h4>
                                                <p>Explore our playful and vibrant collection of kids' clothing.
                                                </p>
                                                <div class="main-border-button">
                                                    <a href="#">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-03.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Accessories</h4>
                                            <span>Best Trend Accessories</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Complete Your Look with Accessories</h4>
                                                <p>Discover a world of accessories that complement your personality.
                                                </p>
                                                <div class="main-border-button">
                                                    <a href="#">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-04.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Men Area Starts ***** -->
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Men's Latest</h2>
                        <span>We Offer Shirts, Trousers And Other Products For Men.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            <?php
                            // Fetch product data
                            $sql = "SELECT * FROM product_details WHERE categories= 'm' ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <div class="item" style="height: 400px; width: 300px;">
                                        <!-- Adjust height and width as needed -->
                                        <div class="thumb"
                                            style="height: 300px; width: 100%; display: flex; align-items: center; overflow: hidden;">
                                            <!-- Make the image clickable and redirect to single-product.php -->
                                            <a href="single-product.php?id=<?= $row["product_id"] ?>"
                                                style="height: 100%; width: 100%;">
                                                <img src="./images/<?= $row["image1"] ?>" alt="<?= $row["product_name"] ?>"
                                                    style="height: 100%; width: 100%; object-fit: cover;">
                                            </a>
                                            <div class="hover-content">
                                                <div class="mt-2 align-items-center">
                                                    <a href="single-product.php?id=<?= $row["product_id"] ?>"
                                                        class="btn btn-light btn-lg btn-block position-relative">
                                                        <span class="ms-">QUICK VIEW</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="down-content">
                                            <p
                                                style="width: 301px; font-size: 14px; color: #2a2a2a; height: 25px; overflow: hidden; word-wrap: none; text-overflow: ellipsis;">
                                                <?= $row["brand_name"] ?>
                                            </p>
                                            <p
                                                style="width: 301px; font-size: 14px; color: #2a2a2a; height: 25px; overflow: hidden; word-wrap: none; text-overflow: ellipsis;">
                                                <?= $row["product_name"] ?>
                                            </p>
                                            <span>RS. <?= $row["product_price"] ?></span>
                                        </div>

                                    </div>
                                    <?php
                                }
                            } else {
                                ?>
                                <p>No products found.</p>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <!-- ***** Men Area Ends ***** -->

    <!-- ***** Women Area Starts ***** -->
    <!-- ***** Women Area Starts ***** -->
    <section class="section" id="women">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Women's Latest</h2>
                        <span>Select a Category To View Our Collection Of Products For Women.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                            <?php
                            // Fetch product data
                            $sql = "SELECT * FROM product_details WHERE categories='w'";
                            $result = $conn->query($sql);

                            if ($result === false) {
                                // Error executing the SQL query
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            } else {
                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <div class="item" style="height: 400px; width: 300px;">
                                            <!-- Adjust height and width as needed -->
                                            <div class="thumb"
                                                style="height: 300px; width: 100%; display: flex; align-items: center; overflow: hidden;">
                                                <!-- Make the image clickable and redirect to single-product.php -->
                                                <a href="single-product.php?id=<?= $row["product_id"] ?>"
                                                    style="height: 100%; width: 100%;">
                                                    <img src="./images/<?= $row["image1"] ?>" alt="<?= $row["product_name"] ?>"
                                                        style="height: 100%; width: 100%; object-fit: cover;">
                                                </a>
                                                <div class="hover-content">
                                                    <div class="mt-2 align-items-center">
                                                        <a href="single-product.php?id=<?= $row["product_id"] ?>"
                                                            class="btn btn-light btn-lg btn-block position-relative">
                                                            <span class="ms-">QUICK VIEW</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="down-content">
                                            <p
                                                style="width: 301px; font-size: 14px; color: #2a2a2a; height: 25px; overflow: hidden; word-wrap: none; text-overflow: ellipsis;">
                                                <?= $row["brand_name"] ?>
                                            </p>
                                            <p
                                                style="width: 301px; font-size: 14px; color: #2a2a2a; height: 25px; overflow: hidden; word-wrap: none; text-overflow: ellipsis;">
                                                <?= $row["product_name"] ?>
                                            </p>
                                            <span>RS. <?= $row["product_price"] ?></span>
                                        </div>

                                    </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    // No products found
                                    echo "<p>No products found.</p>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- ***** Women Area Ends ***** -->

    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Kid's Latest</h2>
                        <span>Select a Category To Explore Our Range Of Apparel For Kids.</span>
                    </div>
                </div>
            </div>
        </div>
       <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="kid-item-carousel">
                <div class="owl-kid-item owl-carousel">
                    <?php
                    // Fetch product data
                    $sql = "SELECT * FROM product_details WHERE categories='k'";
                    $result = $conn->query($sql);

                    if ($result === false) {
                        // Error executing the SQL query
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    } else {
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <div class="item" style="height: 400px; width: 300px;">
                                    <div class="thumb" style="height: 300px; width: 100%; display: flex; align-items: center; overflow: hidden;">
                                        <a href="single-product.php?id=<?= $row["product_id"] ?>" style="height: 100%; width: 100%;">
                                            <img src="./images/<?= $row["image1"] ?>" alt="<?= $row["product_name"] ?>" style="height: 100%; width: 100%; object-fit: cover;">
                                        </a>
                                        <div class="hover-content">
                                            <div class="mt-2 align-items-center">
                                                <a href="single-product.php?id=<?= $row["product_id"] ?>" class="btn btn-light btn-lg btn-block position-relative">
                                                    <span class="ms-">QUICK VIEW</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="down-content">
                                        <p style="width: 301px; font-size: 14px; color: #2a2a2a; height: 25px; overflow: hidden; word-wrap: none; text-overflow: ellipsis;"><?= $row["brand_name"] ?></p>
                                        <p style="width: 301px; font-size: 14px; color: #2a2a2a; height: 25px; overflow: hidden; word-wrap: none; text-overflow: ellipsis;"><?= $row["product_name"] ?></p>
                                        <span>RS. <?= $row["product_price"] ?></span>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            // No products found
                            echo "<p>No products found.</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

    </section>

    <!-- ***** Kids Area Ends ***** -->

    <!-- ***** Explore Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>Explore Our Products</h2>
                        <span>You are allowed to use this HexaShop HTML CSS template. You can feel free to modify or
                            edit this layout. You can convert this template as any kind of ecommerce CMS theme as you
                            wish.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>You are not allowed to redistribute this template ZIP file on any other website.</p>
                        </div>
                        <p>There are 5 pages included in this HexaShop Template and we are providing it to you for
                            absolutely free of charge at our TemplateMo website. There are web development costs for us.
                        </p>
                        <p>If this template is beneficial for your website or business, please kindly <a rel="nofollow"
                                href="https://paypal.me/templatemo" target="_blank">support us</a> a little via PayPal.
                            Please also tell your friends about our great website. Thank you.</p>
                        <div class="main-border-button">
                            <a href="products.html">Discover More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="leather">
                                    <h4>Leather Bags</h4>
                                    <span>Latest Collection</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="first-image">
                                    <img src="assets/images/explore-image-01.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="second-image">
                                    <img src="assets/images/explore-image-02.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="types">
                                    <h4>Different Types</h4>
                                    <span>Over 304 Products</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Explore Area Ends ***** -->

    <!-- ***** Social Area Starts ***** -->
    <section class="section" id="social">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Social Media</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row images">
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Fashion</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-01.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>New</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-02.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Brand</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-03.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Makeup</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-04.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Leather</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-05.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Bag</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-06.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Social Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>By Subscribing To Our Newsletter You Can Get 30% Off</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                    <form id="subscribe" action="" method="post">
                        <div class="row">
                            <div class="col-lg-5">
                                <fieldset>
                                    <input name="name" type="text" id="name" placeholder="Your Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-5">
                                <fieldset>
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Your Email Address" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-2">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-dark-button"><i
                                            class="fa fa-paper-plane"></i></button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li>Store Location:<br><span>Sunny Isles Beach, FL 33160, United States</span></li>
                                <li>Phone:<br><span>010-020-0340</span></li>
                                <li>Office Location:<br><span>North Miami Beach</span></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                                <li>Email:<br><span>info@company.com</span></li>
                                <li>Social Media:<br><span><a href="#">Facebook</a>, <a href="#">Instagram</a>, <a
                                            href="#">Behance</a>, <a href="#">Linkedin</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer  -->
    <?php
    include ('includes/footer.php');
    ?>

</body>