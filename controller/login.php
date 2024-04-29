<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Include database connection
    include("includes/config.php");

    // Query to check admin credentials
    $get_admin = "SELECT * FROM admin_user WHERE username = '$username' AND password = '$password'";
    $run_admin = mysqli_query($conn, $get_admin);
    $count = mysqli_num_rows($run_admin);

    if ($count == 1) {
        $_SESSION['username'] = $username;
        echo "<script>alert('You are Logged in into admin panel')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";

        exit; // Make sure to exit after successful login
    } else {
        echo "<script>alert('Email or Password is Wrong')</script>";
    }

    // Close the database connection
    mysqli_close($con);
}
?>
