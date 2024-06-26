
<?php
include('../includes/config.php');
include('../controller/login.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content='IE=edge' http-equiv=X-UA-Compatible>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MS Login Panel</title>
    <link rel="shortcut icon" type="image/png" href="#">

    <!-- Core Css -->
    <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- ########## START: Login Form ########## -->
    <section class="login-wrapper d-flex align-content-center justify-content-center p-3 flex-wrap">
        <a href="login.php" class="w-100 text-center mb-3 mb-lg-5"><img src="assets/image/logo.png"
                alt="MS Admin Panel" width="150" /></a>
        <div class="login-form bg-white p-3 p-lg-5 rounded">
            <div class="row">
                <div class="col-12 col-lg-6 d-none d-lg-flex pr-lg-2">
                    <img src="assets/image/login-mockup.svg" alt="">
                </div>
                <div class="col-12 col-lg-6 pl-lg-2">
                    <div class="pagetitle mb-4">
                        <h2>Component</h2>
                    </div>
                    <form action="login.php" method="post">
                        <div class="form-group mb-4">
                            <label>username</label>
                            <input type="text" class="form-control border-light input-h-42"
                                placeholder="username" name="username" required>
                        </div>
                        <div class="form-group mb-4">
                            <label>password</label>
                            <div class="input-group border border-light">
                                <input  id="password-field" type="password" class="form-control input-h-42"
                                    placeholder="Password" name="password" aria-label="Password" required>
                                <div class="input-group-prepend">
                                    <span toggle="#password-field" class="input-group-text la la-eye" id="Password"></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <!-- <a href="forgot.html" class="text-primary btn-link">Forgot password?</a> -->
                            <button type="submit"
                                class="btn btn-primary waves-effect waves-primary btn-md w-50">Login</button>
                        </div>
                        <!-- <hr class="mb-4">
                        <a href="register.html"
                            class="btn btn-outline-primary waves-effect waves-primary w-100 btn-md">Create an
                            account</a> -->
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ########## END: Login Form ########## -->
</body>

<script src="assets/scripts/jquery.min.js"></script>
<script src="assets/scripts/popper.min.js"></script>
<script src="assets/scripts/bootstrap-slider.min.js"></script>
<script src="assets/scripts/bootstrap.min.js"></script>
<script src="assets/scripts/bootstrap.bundle.min.js"></script>
<script src="assets/scripts/bootstrap-select.min.js"></script>
<script src="assets/scripts/bootstrap-tooltip-custom-class.js"></script>
<script src="assets/scripts/jquery.mCustomScrollbar.js"></script>
<script src="assets/scripts/datatables.min.js"></script>
<script src="assets/scripts/ripple.min.js"></script>
<script src="assets/scripts/custome.js"></script>

</html>