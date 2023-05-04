<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="admin.css">
    <script src="https://kit.fontawesome.com/d3308567e4.js" crossorigin="anonymous"></script>
    <title>Twitter</title>
</head>
<body>
    <header>
        <center>
            <h3>UPLOAD CATEGORIES<h3>
            <form method="post" action="submit_product.php" enctype="multipart/form-data">
              <br>
              <label for="product-name">Product Name:</label>
              <br>
              <input type="text" id="product-name" name="product_name"><br>
              <br>
              <label for="product-image">Product Image:</label>
              <br>
              <input type="file" id="product-image" name="product_image"><br>
              <br>
              <input type="submit" value="Submit">
            </form>

        </center>
</header>
</body>
</html>
<?php
// Connect to database
$host = 'localhost';
$dbname = 'mystore';
$conn = mysqli_connect($host, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get product name
$product_name = $_POST['product_name'];

// Get product image
$product_image = $_FILES['product_image']['name'];
$product_image_temp = $_FILES['product_image']['tmp_name'];
$upload_dir = 'uploads/';
$target_file = $upload_dir . basename($product_image);
if (!move_uploaded_file($product_image_temp, $target_file)) {
  die("Error uploading file");
}

// Store product information in database
$sql = "INSERT INTO  (category_title,product_image) VALUES ('$product_name', '$target_file')";
if (mysqli_query($conn, $sql)) {
  echo "Product added successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
