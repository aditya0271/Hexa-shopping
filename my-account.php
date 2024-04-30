<?php
include ('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">My Account</h1>
        <!-- Personal Information Section -->
        <div class="card mb-4">
            <div class="card-header">
                Personal Information
            </div>
            <div class="card-body">
                <p class="card-text">Name: <?php echo  $_SESSION['username']?></p>
                <p class="card-text">Email:<?php echo $_SESSION['email']; ?></p>
                <!-- Add more personal information as needed -->
            </div>
        </div>
        <!-- Order History Section -->
        <div class="card mb-4">
            <div class="card-header">
                Order History
            </div>
            <div class="card-body">
                <?php foreach ($orders as $order): ?>
                    <p class="card-text">Order ID: <?php echo $order['order_id']; ?> | Total: <?php echo $order['total']; ?></p>
                    <!-- Add more order details as needed -->
                <?php endforeach; ?>
            </div>
        </div>
        <!-- Account Settings Section -->
        <div class="card mb-4">
            <div class="card-header">
                Account Settings
            </div>
            <div class="card-body">
                <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
                <a href="change_password.php" class="btn btn-primary">Change Password</a>
                <!-- Add more settings options -->
            </div>
        </div>
        <!-- Logout Section -->
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
