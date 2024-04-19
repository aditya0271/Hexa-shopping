<?php
include('includes/config.php');
include('includes/header1.php');
?>
<?php
// Assuming you have already established a database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $flat = $_POST['flat'];
    $street = $_POST['street'];
    $state = $_POST['state'];
    $origin = $_POST['origin'];
    $pincode = $_POST['pincode'];

    // SQL query to insert data into the table
    $sql = "INSERT INTO checkout_info (name, contact, email, flat, street, state, origin, pincode) 
            VALUES ('$name', '$contact', '$email', '$flat', '$street', '$state', '$origin', '$pincode')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Records inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Checkout</h1>
        <form method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" id="contact" name="contact" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="flat">Flat Number:</label>
                <input type="text" class="form-control" id="flat" name="flat" required>
            </div>
            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" class="form-control" id="street" name="street" required>
            </div>
            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" class="form-control" id="state" name="state" required>
            </div>
            <div class="form-group">
                <label for="origin">Origin:</label>
                <input type="text" class="form-control" id="origin" name="origin" required>
            </div>
            <div class="form-group">
                <label for="pincode">Pin Code:</label>
                <input type="text" class="form-control" id="pincode" name="pincode" required>
            </div>
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
