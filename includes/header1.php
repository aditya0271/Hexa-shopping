<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap & Icons CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
        integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar Start -->
    <div class="container-fluid fixed-top" style="width: 67rem;">
        <div class="">
            <div class="topbar bg-dark d-none d-lg-block">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-info ps-2">
                            <small><i class="fas fa-map-marker-alt me-2 text-secondary"></i><a href="#"
                                    class="text-white">123
                                    Street, New York</a></small>
                            <small><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                                    class="text-white">hexashop.com</a></small>
                        </div>
                        <div class="top-link pe-2">
                            <a href="#" class="text-white"><small>Privacy Policy</small>/</a>
                            <a href="#" class="text-white"><small>Terms of Use</small>/</a>
                            <a href="#" class="text-white"><small>Sales and Refunds</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid px-0">
            <nav class="navbar navbar-light bg-secondary navbar-expand-xl">
                <a href="index.html" class="navbar-brand">
                    <h1 class="text-light display-6">HEXASHOP</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white shadow-lg" id="navbarCollapse">
                    <div class="navbar-nav mx-auto ">
                        <a href="#top" class="nav-item nav-link active">Home</a>
                        <a href="#men" class="nav-item nav-link">Men's</a>
                        <a href="#women" class="nav-item nav-link">Women's</a>
                        <a href="#kids" class="nav-item nav-link">Kid's</a>
                        <div class="nav-item dropdown">
                            <!-- <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-2 bg-secondary rounded-0">
                        <a href="cart.html" class="dropdown-item">About Us</a>
                        <a href="chackout.html" class="dropdown-item">Products</a>
                        <a href="add-to-cart.php" class="dropdown-item">Single Products</a>
                        <a href="404.html" class="dropdown-item">Contact Us</a>
                    </div> -->
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Categories</a>
                    </div>

                    <div class="d-flex align-items-center justify-content-end my-3">
                        <form action="search_product.php" method="GET" class="d-flex my-4">
                            <input class="form-control me-2 shadow-lg" type="search" name="search_query"
                                placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-dark" id="search-addon" type="submit">Search</button>
                        </form>
                        <a href="add-to-cart.php" class="position-relative my-1 text-dark">
                            <i class="fa fa-shopping-bag fa-2x mx-2"></i>
                            <span
                                class="position-absolute bg-secondary bg-outline-dark rounded-circle d-flex align-items-center justify-content-center text-white"
                                style="top: -9px; left: 24px; height: 25px; min-width: 22px;">
                                <sup>
                                    <?php cart_item(); ?>
                                </sup>
                            </span>
                        </a>
                        <a href="wishlist.php" class="position-relative my-1 text-dark" id="add-to-cart">
                            <!-- Added wishlist.php as the wishlist page -->
                            <i class="fa fa-heart fa-2x mx-1 "></i> <!-- Changed the icon to a heart -->
                        </a>


                        <div class="dropdown mx-2">
                            <a href="#" class="me-4 text-dark" id="dropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user fa-2x mx-2"></i>
                            </a>

                            <ul class="dropdown-menu mx-2 my-" aria-labelledby="dropdownMenuLink">
                                <!-- Display username and email -->
                                <li><a class="dropdown-item" href="#">Hello <?php echo $_SESSION['username']; ?></a>
                                </li>
                                <li><a class="dropdown-item" href="#">Email: <?php echo $_SESSION['email']; ?></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
</body>

</html>