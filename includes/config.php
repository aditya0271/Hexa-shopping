
<?php
$servername = "localhost";
$username = "root";
$password = "Admin@123";
$database = "shopping";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>


<?php
 // Start the session
session_start();
// Returns the session ID
function get_session_id()
{
    return session_id(); 
}


function checkLogin() {
    // Check if the 'user_id' session variable is set
    if(isset($_SESSION['user_id'])) {
        return true; // User is logged in
    } else {
        return false; // User is not logged in
    }
}



?>

<?php
//  Function for storing items in cart
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
            // echo "<script>window.open('index.php', '_self')</script>";
        } else {
            $user = $_SESSION['user_id'];
            // Insert the item into the cart_details table
            $insert_query = "INSERT INTO `cart_details` (session_id, product_id, quantity, user_id) VALUES ('$session_id', $get_product_id, $quantity, $user)";

            $result_insert = mysqli_query($conn, $insert_query);
            if ($result_insert) {
                echo "<script>alert('Item added to cart successfully')</script>";
                // echo "<script>window.open('index.php', '_self')</script>";
            }
        }
    }
}
cart();
?>


<!-- function to get no.of items in cart -->
<?php
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

?>


<!-- function get  -->
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


<!-- function to show cart items on cart page -->

<?php
function cart_items() {
    global $conn;

    // Get the session ID
    $session_id = get_session_id();

    // Query to fetch cart items
    $cart_query = "SELECT p.image1, p.brand_name, p.product_id, p.product_name, p.product_price, c.quantity FROM cart_details c JOIN product_details p ON c.product_id = p.product_id WHERE c.session_id ='$session_id'";
    $result_query = mysqli_query($conn, $cart_query);

    // Check if there are any cart items
    $num_items = mysqli_num_rows($result_query);

    if ($num_items > 0) {
        // Start of the table
        echo '<table class="table">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Remove</th>
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
                        <input type="number" class="quantity-input" id="qty_' . $row['product_id'] . '" style="width: 50px; text-align: center;" value="' . $row['quantity'] . '" min="1" data-price="' . $row['product_price'] . '" onchange="updatePrice(this, ' . $row['product_id'] . ')">
                    </td>
                    <td>RS. ' . $row['product_price'] . '</td>
                    <td id="total_' . $row['product_id'] . '">RS. ' . $total_price . '</td>
                    <td><button class="btn btn-danger remove-item" data-productid="' . $row['product_id'] . '"><i class="fas fa-trash-alt"></i></button></td>
                </tr>';
        }

        // End of the table
        echo '</tbody>
            </table>';

        // JavaScript for handling item removal
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    const removeButtons = document.querySelectorAll(".remove-item");
                    removeButtons.forEach(button => {
                        button.addEventListener("click", function() {
                            const productId = this.getAttribute("data-productid");
                            removeCartItem(productId);
                            
                        });
                    });

                    function removeCartItem(productId) {
                        // Send an AJAX request to remove the item from the cart
                        const xhr = new XMLHttpRequest();
                        xhr.open("POST", "delete.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    // Handle successful deletion
                                    const rowToRemove = document.getElementById("total_" + productId).parentNode;
                                    rowToRemove.remove();
                                    alert("Item removed from cart successfully!");
                                } else {
                                    // Handle deletion error
                                    alert("Error removing item from cart!");
                                }
                            }
                        };
                        xhr.send("product_id=" + productId);
                    }
                });
            </script>';
    } else {
        echo '<div class="alert alert-warning" role="alert">Cart is empty.</div>';
    }
}
?>


<!-- function to order summary -->

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
           
          </div>';
}
?>

<!-- Function for storing items in wishlist -->

<?php
function wish()
{
    global $conn; // Assuming $conn is your database connection
    if (isset($_GET['add_to_wish'])) {
        $session_id = get_session_id();
        $get_product_id = $_GET['add_to_wish'];

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

        $select_query = "SELECT * FROM `wishlist_details` WHERE session_id='$session_id' AND product_id=$get_product_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows > 0) {
            echo "<script>alert('Already in your Wishlists')</script>";
            // echo "<script>window.open('index.php', '_self')</script>";
        } else {
            // Insert the item into the cart_details table
            $insert_query = "INSERT INTO `wishlist_details` (session_id, product_id, quantity) VALUES ('$session_id', $get_product_id, $quantity)";

            $result_insert = mysqli_query($conn, $insert_query);
            if ($result_insert) {
                echo "<script>alert('Item added to your wishlist successfully')</script>";
                // echo "<script>window.open('index.php', '_self')</script>";
            }
        }
    }
}
wish();
?>


<!-- function to get no.of items in cart -->
<?php
function wish_item()
{
    global $conn; // Assuming $conn is your database connection

    // Get the session ID
    $session_id = get_session_id();

    // Fetch the current cart items count
    $select_query = "SELECT * FROM `wishlist_details` WHERE session_id='$session_id'";
    $result_query = mysqli_query($conn, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);

    // Display the count of cart items
    echo $count_cart_items;
}

// Call the cart function after form submission

?>


<?php
function wish_items() {
    global $conn;

    // Get the session ID
    $session_id = get_session_id();

    // Query to fetch cart items
    $cart_query = "SELECT p.image1, p.brand_name, p.product_id, p.product_name, p.product_price, c.quantity FROM wishlist_details c JOIN product_details p ON c.product_id = p.product_id WHERE c.session_id ='$session_id'";
    $result_query = mysqli_query($conn, $cart_query);

    // Start of the wishlist container
    echo '<div style="max-width: 100%; margin: 20px auto; padding: 20px; background-color: #f4f4f4; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <div style="display: flex; flex-wrap: wrap; ">';

    // Display wishlist items
    while ($row = mysqli_fetch_assoc($result_query)) {
        echo '<div style="width: 30%; margin-right: 20px; justify-content-center">
                <div style="border: 1px solid #ccc; border-radius: 5px; overflow: hidden; background-color: #fff;">
                    <img src="./image/' . $row['image1'] . '" alt="' . $row['product_name'] . $row['brand_name'] . '" style="width: 100%; height: auto; border-radius: 5px;">
                    <div style="padding: 10px;">
                        <span style="font-size: 18px; margin-bottom: 10px; display: block;">' . $row['product_name'] . '</span>
                        <span style="font-size: 18px; margin-bottom: 10px; display: block;">' . $row['brand_name'] . '</span>
                        <button class="btn btn-danger remove-item justify-content-center">Remove Items</button>
                    </div>
                </div>

            </div>';
    }

    // End of the wishlist container
    echo '</div></div>';

    // JavaScript for handling item removal
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                const removeButtons = document.querySelectorAll(".remove-item");
                removeButtons.forEach(button => {
                    button.addEventListener("click", function() {
                        const productId = this.getAttribute("data-productid");
                        removeCartItem(productId);
                    });
                });

                function removeCartItem(productId) {
                }
            });
        </script>';
}
?>

