<?php
// Include the database configuration file
include('../includes/config.php');

// Check if product_id is set and not empty
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    // Get the product_id from the URL
    $product_id = $_GET['product_id'];

    // Prepare a delete statement
    $sql = "DELETE FROM product_details WHERE id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $product_id);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Product deleted successfully, redirect to the same page
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error deleting product: " . mysqli_error($conn);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="my-4">Product Details</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product ID</th>
                        <th>Brand Name</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Categories</th>
                        <th>Images</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch product details from the database again after deletion
                    $sql = "SELECT * FROM product_details";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["product_id"] . "</td>";
                            echo "<td>" . $row["brand_name"] . "</td>";
                            echo "<td>" . $row["product_name"] . "</td>";
                            echo "<td>" . $row["product_description"] . "</td>";
                            echo "<td>" . $row["product_price"] . "</td>";
                            echo "<td>" . $row["categories"] . "</td>";
                            echo "<td>
                                <img src='" . $row["image1"] . "' alt='Image 1' style='max-width: 100px;'>
                                <img src='" . $row["image2"] . "' alt='Image 2' style='max-width: 100px;'>
                                <img src='" . $row["image3"] . "' alt='Image 3' style='max-width: 100px;'>
                            </td>";
                            echo "<td>" . $row["created_at"] . "</td>";

                            echo "<td>
                                <a href='" . $_SERVER['PHP_SELF'] . "?product_id=" . $row["id"] . "' class='btn btn-danger'>Delete</a>
                                <a href='edit_product.php?product_id=" . $row["id"] . "' class='btn btn-primary'>Edit</a>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No products found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
