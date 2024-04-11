<?php
$servername = "localhost";
$username = "root";
$password = "Admin@123";
$database = "shopping";
//database
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";



session_start(); // Start the session


function get_session_id()
{
    return session_id(); // Returns the session ID
}

function cart()
{
    global $conn; // Assuming $conn is your database connection
    if (isset($_GET['add_to_cart'])) {
        $session_id = get_session_id();
        $get_product_id = $_GET['add_to_cart'];

        // Sanitize input to prevent SQL injection
        $session_id = mysqli_real_escape_string($conn, $session_id);
        $get_product_id = mysqli_real_escape_string($conn, $get_product_id);

        // Check if the quantity is provided by the user
        if (isset($_POST['quantity']) && is_numeric($_POST['quantity']) && $_POST['quantity'] > 0) {
            $quantity = $_POST['quantity'];
        } else {
            // Default to 1 if quantity is not provided or invalid
            $quantity = 1;
        }

        $select_query = "SELECT * FROM `cart_details` WHERE session_id='$session_id' AND product_id=$get_product_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already in your cart')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            // Insert the item into the cart_details table
            $insert_query = "INSERT INTO `cart_details` (session_id, product_id, quantity) VALUES ('$session_id', $get_product_id, $quantity)";

            $result_insert = mysqli_query($conn, $insert_query);
            if ($result_insert) {
                echo "<script>alert('Item added to cart successfully')</script>";
                echo "<script>window.open('index.php', '_self')</script>";
            }
        }
    }
}

function cart_item()
{
    global $conn; // Assuming $conn is your database connection

    // Get the session ID
    $session_id = get_session_id();

    // Fetch the current cart items count
    $select_query = "SELECT * FROM `cart_details` WHERE session_id='$session_id'";
    $result_query = mysqli_query($conn, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);

    // Display the count of cart items
    echo $count_cart_items;
}

// Call the cart function after form submission
cart();
?>
<?php
function cart_price()
{
    global $conn;
    $session_id = get_session_id();
    $total = 0;

    // Query to fetch cart items and their prices
    $cart_query = "SELECT p.product_price FROM cart_details c
                    JOIN product p ON c.product_id = p.product_id
                    WHERE c.session_id ='$session_id'";
    $result_query = mysqli_query($conn, $cart_query);

    // Calculate total price
    while ($row = mysqli_fetch_array($result_query)) {
        $product_price = $row['product_price'];
        $total += $product_price;
        echo "Product Price: " . $product_price . "<br>";
    }

    // echo "Total Price: " . $total . "<br>";
    echo $total; // Output total price
}
?>
<?php
function cart_items() {
    global $conn;

    // Get the session ID
    $session_id = get_session_id();

    // Query to fetch cart items
    $cart_query = "SELECT p.image1, p.brand_name, p.product_id, p.product_name, p.product_price, c.quantity FROM cart_details c JOIN product_details p ON c.product_id = p.product_id WHERE c.session_id ='$session_id'";
    $result_query = mysqli_query($conn, $cart_query);

    // Start of the table
    echo '<table class="table">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>';

    // Display cart items
    while ($row = mysqli_fetch_assoc($result_query)) {
        $total_price = $row['product_price'] * $row['quantity'];

        echo '<tr>
                <td><img class="img-fluid" style="max-width: 100px;" src="./image/' . $row['image1'] . '"></td>
                <td>' . $row['brand_name'] . '</td>
                <td>' . $row['product_name'] . '</td>
                <td>
                <input type="number" class="quantity-input" value="' . $row['quantity'] . '" min="1">
            </td>
            <td>RS. ' . $total_price . '</td>
                <td><a href="#" class="remove-item"><i class="fas fa-trash-alt"></i></a></td>

            </tr>';
    }

    // End of the table
    echo '</tbody>
        </table>';
}


?>
<?php
function calculate_order_summary() {
    global $conn;
    $session_id = get_session_id();
    $subtotal = 0.00;
    $shippingCost = 5.00; // Flat rate shipping
    $freeShippingThreshold = 50.00; // Free shipping for orders over $50

    // Query to fetch cart items
    $cart_query = "SELECT p.product_price, c.quantity FROM cart_details c JOIN product_details p ON c.product_id = p.product_id WHERE c.session_id ='$session_id'";
    $result_query = mysqli_query($conn, $cart_query);

    while ($row = mysqli_fetch_assoc($result_query)) {
        $subtotal += ($row['product_price'] * $row['quantity']);
    }

    // Apply shipping logic
    if ($subtotal > $freeShippingThreshold) {
        $shippingCost = 5.00; // Free shipping
    }

    $total = $subtotal + $shippingCost;

    // Format numbers to 2 decimal places for display
    $subtotal = number_format($subtotal, 2);
    $shippingCost = number_format($shippingCost, 2);
    $total = number_format($total, 2);

    // Display the order summary
    echo '<div class="border mx-2 p-3">
            <h4>Order Summary</h4>
            <p><strong>Subtotal:</strong> RS. ' .  $subtotal . '</p>
            <p><strong>Estimated Shipping:</strong> RS. ' .  $shippingCost . '</p>
            <p><strong>Estimated Total:</strong> RS. ' .  $total . '</p>
            <button type="button" class="btn btn-dark mt-3">Proceed to Checkout</button>
          </div>';
}
?>
