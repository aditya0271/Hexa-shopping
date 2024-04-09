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


function get_session_id() {
    return session_id(); // Returns the session ID
}

function cart() {
    global $conn; // Assuming $conn is your database connection
    if (isset($_GET['add_to_cart'])) {
        $session_id = get_session_id();
        $get_product_id = $_GET['add_to_cart'];

        // Sanitize input to prevent SQL injection
        $session_id = mysqli_real_escape_string($conn, $session_id);
        $get_product_id = mysqli_real_escape_string($conn, $get_product_id);

        $select_query = "SELECT * FROM `cart_details` WHERE session_id='$session_id' AND product_id=$get_product_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already in your cart')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            // Insert the item into the cart_details table
            $insert_query = "INSERT INTO `cart_details` (session_id, product_id, quantity) VALUES ('$session_id', $get_product_id, 1)";

            $result_insert = mysqli_query($conn, $insert_query);
            if ($result_insert) {
                echo "<script>alert('Item added to cart successfully')</script>";
                echo "<script>window.open('index.php', '_self')</script>";
            }
        }
    }
}

function cart_item() {
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
function cart_price(){
    global $conn;
    $session_id = get_session_id();
    $total = 0;

    // Query to fetch cart items and their prices
    $cart_query = "SELECT p.product_price FROM cart_details c
                    JOIN product p ON c.product_id = p.product_id
                    WHERE c.session_id ='$session_id'";
    $result_query = mysqli_query($conn, $cart_query);

    // Calculate total price
    while($row = mysqli_fetch_array($result_query)){
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
    $cart_query = "SELECT p.image1, p.product_id, p.product_name, p.product_price, c.quantity FROM cart_details c JOIN product_details p ON c.product_id = p.product_id WHERE c.session_id ='$session_id'";
    $result_query = mysqli_query($conn, $cart_query);

    // Display cart items
    while($row = mysqli_fetch_assoc($result_query)) {
        echo "<img src='./image/".$row['image1']."' alt='ww' >";
        echo "Product ID: " . $row['product_id'] . "<br>";
        echo "Product Name: " . $row['product_name'] . "<br>";
        echo "Price: " . $row['product_price'] . "<br>";
        echo "Quantity: " . $row['quantity'] . "<br>";
        // Additional product details can be displayed as needed
        echo "<br>";
    }
}
?>