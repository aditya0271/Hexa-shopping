<?php
include('includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);

    $delete_query = "DELETE FROM cart_details WHERE product_id = '$product_id'";
    if (mysqli_query($conn, $delete_query)) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
    exit;
}
?>
