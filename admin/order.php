<?php
// Include the database configuration file
include('../includes/config.php');

// Start the session
session_start();

// Check if the user is logged in as an admin (you can modify this based on your admin authentication logic)
// Fetch order details from the database
$sql = "SELECT * FROM order_details";
$result = mysqli_query($conn, $sql);

// Check if query executed successfully
if (!$result) {
    echo "Error fetching order details: " . mysqli_error($conn);
    exit;
}

// Initialize the message variable
$message = "";

// Include your database connection code here

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_status"])) {
    $order_id = $_POST["order_id"];
    $new_status = $_POST["new_status"];

    // Perform input validation and sanitization if needed

    // Update the order status in the database
    $sql = "UPDATE order_details SET order_status = '$new_status' WHERE order_id = $order_id";

    if (mysqli_query($conn, $sql)) {
        $message = "Order status updated successfully.";
    } else {
        $message = "Error updating order status: " . mysqli_error($conn);
    }
}

// Fetch order details from the database (assuming $result is your query result)
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Area - Order Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <h2 class="my-4 text-center">Order Details</h2>
    <!-- Display the message if it's not empty -->
    <?php if (!empty($message)) : ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Subtotal Price</th>
                    <th>Status</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["order_id"] . "</td>";
                        echo "<td>" . $row["user_id"] . "</td>";
                        echo "<td>" . $row["product_id"] . "</td>";
                        echo "<td>" . $row["quantity"] . "</td>";
                        echo "<td>" . $row["subtotal"] . "</td>";
                        echo "<td>" . $row["order_status"] . "</td>"; // Assuming 'status' is the column name for confirmation/cancellation
                        echo "<td>
                        <form method='post' action='" . $_SERVER['PHP_SELF'] . "'>
                            <input type='hidden' name='order_id' value='" . $row["order_id"] . "'>
                            <select name='new_status'>
                                <option value='confirmed'>Confirmed</option>
                                <option value='cancelled'>Cancelled</option>
                                <!-- Add more status options as needed -->
                            </select>
                            <button type='submit' name='update_status' class='btn btn-primary'>Update</button>
                        </form>
                    </td>";
                        // Add more columns as needed
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No order details found.</td></tr>"; // Colspan increased to accommodate the new column
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


</body>

</html>
