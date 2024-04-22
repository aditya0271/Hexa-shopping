<?php
include ('includes/config.php');
// include ('includes/header1.php');
?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $pincode = $_POST['pincode'];
    $locality = $_POST['locality'];
    $flatno = $_POST['flatno'];
    $landmark = $_POST['landmark'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address_type = $_POST['address-type'];

    // SQL query to insert data into the table
    $sql = "INSERT INTO address_info (name, mobile, pincode, locality, flatno, landmark, city, state, address_type) 
            VALUES ('$name', '$mobile', '$pincode', '$locality', '$flatno', '$landmark', '$city', '$state', '$address_type')";

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
    <title>Sidebar Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <h2>Sidebar Form Example</h2>
        <button class="btn btn-primary" onclick="toggleSidebar()">Open Sidebar</button>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-light" id="sidebar" style="display: none;">
                <button class="closebtn" onclick="toggleSidebar()">&times;</button>
                <h3 class="my-4">Address Information</h3>
                <form method="POST">
                    <!-- Address form inputs -->
                    <!-- Name -->
                    <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Name" required>
                    <!-- Mobile -->
                    <input type="tel" class="form-control mb-3" id="mobile" name="mobile" placeholder="Mobile Number" pattern="[0-9]{10}" required>
                    <!-- Pincode -->
                    <input type="text" class="form-control mb-3" id="pincode" name="pincode" placeholder="Pincode" required>
                    <!-- Locality -->
                    <input type="text" class="form-control mb-3" id="locality" name="locality" placeholder="Locality" required>
                    <!-- Flat Number -->
                    <input type="text" class="form-control mb-3" id="flatno" name="flatno" placeholder="Flat Number" required>
                    <!-- Landmark -->
                    <input type="text" class="form-control mb-3" id="landmark" name="landmark" placeholder="Landmark">
                    <!-- City -->
                    <input type="text" class="form-control mb-3" id="city" name="city" placeholder="City" required>
                    <!-- State -->
                    <input type="text" class="form-control mb-3" id="state" name="state" placeholder="State" required>
                    <!-- Address Type -->
                    <label for="address-type">Address-Type</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="residential" name="address-type" value="residential" required>
                        <label class="form-check-label" for="residential">Home</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="commercial" name="address-type" value="commercial" required>
                        <label class="form-check-label" for="commercial">Work</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="other" name="address-type" value="other" required>
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-dark mt-3">Save</button>
                </form>
            </div>
            <!-- Main Content -->
            <div class="col-md-9">
                <h2>Main Content</h2>
                <!-- Main content goes here -->
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            if (sidebar.style.display === "none") {
                sidebar.style.display = "block";
            } else {
                sidebar.style.display = "none";
            }
        }
    </script>
</body>
</html>
