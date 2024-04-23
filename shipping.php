<!-- config file -->
<?php
include ('includes/config.php');
include ('includes/header1.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
    <!-- ***** Main Banner Area End ***** -->
    <div class="container">
        <h2><i class="bi bi-geo-alt-fill"></i> Delivery Address</h2>
        <p>We will deliver your order to this address</p>


        <button class="btn btn-dark" onclick="toggleSidebar()">Add Address <i class="bi bi-plus"></i></button>

        <?php
        include ('includes/sidebar.php');
        ?>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2><i class="bi bi-truck"></i> Expected Delivery</h2>
                <p>Estimated delivery dates for your order</p>
            </div>
            <div class="col-md-4 border p-3">
                <?php calculate_order_summary(); ?>
                <a href="check-out.php" class="btn btn-dark mx-5 m-2">Proceed to Payment</a>
            </div>
        </div>
    </div>
</div>


    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            if (sidebar.style.display === "none") {
                sidebar.style.display = "block";
            } else {
                sidebar.style.display = "none";
            }
        }
    </script>

</html>

<?php
include ('includes/footer.php');
?>