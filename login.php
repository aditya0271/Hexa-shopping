<?php
include ('includes/config.php');

// Initialize the error variable
$error = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    echo($username) ;
    echo($password);
    // Validate form data (you can add more validation as needed)
    if (empty($username) || empty($password)) {
        $error = "Username/Email and password are required";
    } else {
        // Check if the username/email exists in the database
        $query = "SELECT * FROM customer WHERE username = '$username' OR email = '$username'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Password is correct, set session variables or redirect to dashboard
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                // Redirect to dashboard or any other page after successful login
                header("Location: index.php");
                exit();
            } else {
                $error = "Incorrect password";
            }
        } else {
            $error = "Username/Email not found";
        }
    }
}
?>

<head>
    <!-- Core Css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/style.min.css">

 
</head>

<body>
    <section class="login-wrapper d-flex align-content-center justify-content-center p-3 flex-wrap">
        <a href="login.php" class="w-100 text-center mb-3 mb-lg-5"><img src="admin/assets/image/logo.png"
                alt="MS Admin Panel" width="150" /></a>
        <div class="login-form bg-white p-3 p-lg-5 rounded">
            <div class="row">
                <div class="col-12 col-lg-6 d-none d-lg-flex pr-lg-2">
                    <img src="admin/assets/image/logo1.webp" alt="" width="300">
                </div>
                <div class="col-12 col-lg-6 pl-lg-2">
                    <div class="pagetitle mb-4">
                        <h2></h2>
                        <h5>Welcome to HEXASHOP</h5>

                        <h5>Login</h5>
                    </div>
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                    <?php endif; ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label for="username">Username/Email</label>
                            <div class=" input-group border border-light">
                                <input type="text" id="username" name="username" class="form-control"
                                    placeholder="Username/Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group border border-light">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Password" aria-label="Password" required>
                                <div class="input-group-prepend">
                                    <span toggle="#password" class="input-group-text la la-eye" id="Password"></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <a href="forgot.html" class="text-primary btn-link">Forgot password?</a>
                            <button type="submit"
                                class="btn btn-primary waves-effect waves-primary btn-md w-50">Login</button>
                        </div>
                    </form>
                    <p>Don't have an account? <a href="register.php">Register here</a></p>
                </div>
            </div>
        </div>
    </section>
   </body>

</html>

<script src="admin/assets/scripts/jquery.min.js"></script>
<script src="admin/assets/scripts/popper.min.js"></script>
<script src="admin/assets/scripts/bootstrap-slider.min.js"></script>
<script src="admin/assets/scripts/bootstrap.min.js"></script>
<script src="admin/assets/scripts/bootstrap.bundle.min.js"></script>
<script src="admin/assets/scripts/bootstrap-select.min.js"></script>
<script src="admin/assets/scripts/bootstrap-tooltip-custom-class.js"></script>
<script src="admin/assets/scripts/jquery.mCustomScrollbar.js"></script>
<script src="admin/assets/scripts/datatables.min.js"></script>
<script src="admin/assets/scripts/ripple.min.js"></script>
<script src="admin/assets/scripts/custome.js"></script>

</html>