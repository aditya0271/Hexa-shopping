<!-- config file -->
<?php
// Assuming you have already established a database connection
include ('includes/config.php');
?>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate form data (you can add more validation as needed)
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        // Assuming you have a table named 'customer' with columns: id, username, email, password
        $query = "INSERT INTO customer(username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('$success');</script>";
        } else {
            $error = "Registration failed. Please try again.";
        }
    }
}
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
    <link rel="stylesheet" type="text/css" href="admin/assets/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/style.min.css">

</head>

<body>
    <!-- Your HTML body content -->
    <section class="login-wrapper d-flex align-content-center justify-content-center p-3 flex-wrap">
        <a href="login.php" class="w-100 text-center mb-4 mb-lg-8 mt-5"><img src="admin/assets/image/logo.png"
                alt="MS Admin Panel" width="150" /></a>
        <div class="login-form bg-white p-3 p-lg-5 rounded">
            <div class="row">
                <div class="col-12 col-lg-6 d-none d-lg-flex pr-lg-2">
                    <img src="admin/assets/image/login-mockup.svg" alt="">
                </div>
                <div class="col-12 col-lg-6 pl-lg-2">
                    <div class="pagetitle mb-4">
                        <h2></h2>
                        <h5>Welcome to HEXASHOP</h5>
                    </div>
                    <div class="container">
                        <h2>Create Account</h2>
                        <?php if (isset($error))
                            echo "<p>$error</p>"; ?>
                        <?php if (isset($success))
                            echo "<p>$success</p>"; ?>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>
                            <div class="form-group checkbox">
                                <input type="checkbox" name="checkbox" id="check1">
                                <label for="check1">I accept the terms & conditions.</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="login.php" class="btn btn-outline-primary waves-effect waves-primary">Login</a>
                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-primary">Register</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
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