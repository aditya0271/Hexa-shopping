<!-- config file -->
<?php
include ('../includes/config.php');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert_product'])) {

    // Get form data

    echo $product_id = $_POST['product_id'];
    echo $product_name = $_POST["product_name"];
    echo $product_description = $_POST["product_description"];
    echo $product_price = $_POST['product_price'];
    echo $categories = $_POST['categories'];

    // Accessing image name
    $product_image = '/assets/images/' . $_FILES['product_image']['name'];
    $product_image1 = '/assets/images/' . $_FILES['product_image1']['name1'];
    $product_image2 = '/assets/images/' . $_FILES['product_image2']['name2'];
    $product_image3 = '/assets/images/' . $_FILES['product_image3']['name3'];

    // Accessing image temp name

    $temp_image = $_FILES['product_image']['tmp_name'];

    $temp_image = $_FILES['product_image1']['tmp_name1'];

    $temp_image = $_FILES['product_image2']['tmp_name2'];

    $temp_image = $_FILES['product_image3']['tmp_name3'];

    // Checking the condition

    if ($product_id == '' or $product_name == '' or $product_image == '' or $product_price == '' or $categories == '') {
        echo "<script>alert('Please fill all the available fields')</script>";
    } else {
        move_uploaded_file($temp_image, "/assets/images/$product_image");
        move_uploaded_file($temp_image1, "/assets/images1/$product_image1");
        move_uploaded_file($temp_image2, "/assets/images2/$product_image2");
        move_uploaded_file($temp_image3, "/assets/images3/$product_image3");

        // Insert data into the database
        $sql = "INSERT INTO combined_products (product_id, product_name, product_description, product_price, product_image,product_image1,product_image2,product_image3, categories) 
        VALUES ('$product_id','$product_name', '$product_description', '$product_price', '$product_image','$product_image1','$product_image2','$product_image3', '$categories')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New record created successfully')</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "')</script>";
        }
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
</head>

<div class="container my-30">
    <h1 class="text-center">Insert Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- ID -->
        <div class="form-outline mb-2">
            <label for="product_id" class="form-label">Product Id</label>
            <input type="text" name="product_id" id="product_id" class="form-control w-50 m-auto" placeholder="Enter product id">
        </div>

        <!-- Name -->
        <div class="form-outline mb-2">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control w-50 m-auto" placeholder="Enter product name">
        </div>

        <!-- Description -->
        <div class="form-outline mb-2">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description" id="product_description" class="form-control w-50 m-auto" placeholder="Enter product description">
        </div>

        <!-- Image -->
        <div class="form-outline mb-2">
            <label for="product_image" class="form-label">Product Image</label>
            <input type="file" name="product_image" id="product_image" class="form-control w-50 m-auto" required="required">
        </div>
        <!--Image1 -->
                   <div class="form-outline mb-2 w-50 m-auto">
            <label for="product_image" class="form-label">Product Image1</label>
            <input type="file" name="product_image" id="product_image" class="form-control" required="required">
        </div>
           <!--Image2 -->
           <div class="form-outline mb-2 w-50 m-auto">
            <label for="product_image" class="form-label">Product Image 2</label>
            <input type="file" name="product_image" id="product_image" class="form-control" required="required">
        </div>
        
           <!--Image3 -->
           <div class="form-outline mb-2 w-50 m-auto">
            <label for="product_image" class="form-label">Product Image 3</label>
            <input type="file" name="product_image" id="product_image" class="form-control" required="required">
        </div>

        <!-- Price -->
        <div class="form-outline mb-7">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control w-50 m-auto" placeholder="Enter product price">
        </div>

        <!-- Category -->
        <div class="form-outline S">
            <label for="categories" class="form-label">Category</label>
            <select name="categories" id="categories" class="form-control w-50 m-auto" placeholder="Select categories">
                <option value="m">m</option>
                <option value="w">w</option>
                <option value="k">k</option>
            </select>
        </div>
<br>
<br>

        <!-- Submit Button -->
        <div class="form-outline mb-2">
            <input type="submit" name="insert_product" class="btn btn-info w-50 m-auto" value="Insert Product">
        </div>
    </form>
    <br>
    <br>
</div>
 

</body>

</html>