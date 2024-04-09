<?php
include ('../includes/config.php');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $files = $_FILES["image"];

    // Loop through each file
    $imagePaths = [];
    for ($i = 0; $i < count($files["name"]); $i++) {
        $file_name = $files["name"][$i];
        $file_tmp = $files["tmp_name"][$i];
        $file_error = $files["error"][$i];

        // Check if file is uploaded successfully
        if ($file_error == UPLOAD_ERR_OK) {
            $destination = "../assets/images/uploads/" . $file_name;
            move_uploaded_file($file_tmp, $destination);
            $imagePaths[] = $destination;
            // echo "File uploaded successfully: $destination <br>";
        } else {
            echo "Error uploading file: $file_error <br>";
        }
    }

    // Get form data
    $product_id = $_POST['product_id'];
    $brand_name = $_POST["brand_name"];
    $product_name = $_POST["product_name"];
    $product_description = $_POST["product_description"];
    $product_price = $_POST['product_price'];
    $categories = $_POST['categories'];

    // Insert data into the database
    $image1 = isset($imagePaths[0]) ? $imagePaths[0] : '';
    $image2 = isset($imagePaths[1]) ? $imagePaths[1] : '';
    $image3 = isset($imagePaths[2]) ? $imagePaths[2] : '';

    $sql = "INSERT INTO product_details(product_id, brand_name, product_name, product_description, product_price, categories, image1, image2, image3) 
            VALUES ('$product_id', '$brand_name', '$product_name', '$product_description', '$product_price', '$categories', '$image1', '$image2', '$image3')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully')</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "')</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- csslink -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin-btn {
            border-radius: 5px;/* Centering the button */
            background: #0b1630;
            border-color: #0b1630;
            text-decoration: none;
}
    </style>
</head>

<body><div class="container w-50 my-5">
    <h1 class="text-center">Insert Products</h1>
    <div class="row ">
        <div class="">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- ID -->
                <div class="form-outline mb-2">
                    <label for="product_id" class="form-label">Product Id</label>
                    <input type="text" name="product_id" id="product_id" class="form-control" placeholder="Enter product id">
                </div>
                <!-- Brand name -->
                <div class="form-outline mb-2">
                    <label for="brand_name" class="form-label">Brand</label>
                    <input type="text" name="brand_name" id="brand_name" class="form-control" placeholder="Enter brand name">
                </div>
                <!-- Name -->
                <div class="form-outline mb-2">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter product name">
                </div>

                <!-- Description -->
                <div class="form-outline mb-2">
                    <label for="product_description" class="form-label">Product Description</label>
                    <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description">
                </div>

                <!-- Image -->
                <div class="form-outline mb-2">
                    <label for="product_image" class="form-label">Product Image</label>
                    <input type="file" name="image[]" multiple class="form-control" required="required">
                </div>
                <!-- Image -->
                <div class="form-outline mb-2">
                    <label for="product_image" class="form-label">Product Image</label>
                    <input type="file" name="image[]" multiple class="form-control" >
                </div>
                <!-- Image -->
                <div class="form-outline mb-2">
                    <label for="product_image" class="form-label">Product Image</label>
                    <input type="file" name="image[]" multiple class="form-control" >
                </div>

                <!-- Price -->
                <div class="form-outline mb-2">
                    <label for="product_price" class="form-label">Product Price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price">
                </div>

                <!-- Category -->
                <div class="form-outline mb-2 ">
                    <label for="categories" class="form-label">Category</label>
                    <select name="categories" id="categories" class="form-control">
                        <option value="" disabled selected hidden>Select Category</option>
                        <option value="m">m</option>
                        <option value="w">w</option>
                        <option value="k">k</option>
                    </select>
                </div>
                <br>

                <!-- Submit Button -->
                <div class="form-outline mb-2">
                    <input type="submit" name="insert_product" class="btn btn-dark w-100" value="Insert Product">
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
