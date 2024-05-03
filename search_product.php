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
    <div class="container">
    <div class="row">
        <!-- Product Items -->
        <?php
        if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
            $search_query = mysqli_real_escape_string($conn, $_GET['search_query']);
            $sql = "SELECT * FROM product_details WHERE product_name LIKE '%$search_query%'";
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="item" style="height: 400px; width: 300px;">
                            <div class="thumb" style="height: 300px; width: 100%; display: flex; align-items: center; overflow: hidden;">
                                <img src="./images/<?php echo $row['image1']; ?>" alt="<?php echo $row['product_name']; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="down-content">
                                <p style="width: 301px; font-size: 14px; color: #2a2a2a; height: 25px; overflow: hidden; word-wrap: none; text-overflow: ellipsis;">
                                    <?= $row["brand_name"] ?>
                                </p>
                                <p style="width: 301px; font-size: 14px; color: #2a2a2a; height: 25px; overflow: hidden; word-wrap: none; text-overflow: ellipsis;">
                                    <?= $row["product_name"] ?>
                                </p>
                                <span>RS. <?= $row["product_price"] ?></span>
                            </div>
                        </div>
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