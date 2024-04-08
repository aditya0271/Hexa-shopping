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

    <!-- Main Content Section -->
    <div class="container">
        <div class="row">
            <!-- Product Items -->
            <?php
            if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
                $search_query = mysqli_real_escape_string($conn, $_GET['search_query']);
                $sql = "SELECT * FROM product_details WHERE product_name LIKE '%$search_query%'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <img src="./images/<?php echo $row['image1']; ?>" alt="<?php echo $row['product_name']; ?>">
                                    </div>
                                    <br>
                                    <div class="down-content">
                                                <h5>
                                                    <?= $row["brand_name"] ?>
                                                </h5>
                                                <p>
                                                    <?= $row["product_name"] ?>
                                                </p>
                                                <span>RS.
                                                    <?= $row["product_price"] ?>
                                                </span>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><a
                                                    href="single-product.php?id=<?php echo $row['product_id']; ?>"><i
                                                        class="fa fa-eye"></i></a></li>
                                            <li class="list-inline-item"><a
                                                    href="single-product.php?id=<?php echo $row['product_id']; ?>"><i
                                                        class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a
                                                    href="add-to-cart.php?id=<?php echo $row['product_id']; ?>"><i
                                                        class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <br><br><br><br>
                        </div>
                        <?php
                    }
                } else {
                    echo "<div class='col-12'>No results found.</div>";
                }
            } else {
                echo "<div class='col-12'>Please enter a search query.</div>";
            }
            ?>
        </div>
    </div>
</body>

<!-- Footer Section -->
<?php include ('includes/footer.php'); ?>