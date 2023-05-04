<?php
// Define database connection variables
$dbHost = "localhost";
$dbName = "mystore";

// Connect to the database
$conn = mysqli_connect($dbHost,$dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get form data
    $categoryName = $_POST['categoryName'];
    $categoryImage = $_FILES['categoryImage']['name'];
    $categoryImageTemp = $_FILES['categoryImage']['tmp_name'];

    // Move uploaded image to a folder on the server
    $uploadPath = "uploads/" . basename($categoryImage);
    move_uploaded_file($categoryImageTemp, $uploadPath);

    // Insert data into the database
    $sql = "INSERT INTO categories (name, image) VALUES ('$categoryName', '$uploadPath')";
    if (mysqli_query($conn, $sql)) {
        echo "New category added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>

<!-- HTML form to add a new category -->
<form method="post" enctype="multipart/form-data">
    <label for="categoryName">Category Name:</label>
    <input type="text" name="categoryName" required>
    <br>
    <label for="categoryImage">Category Image:</label>
    <input type="file" name="categoryImage" required>
    <br>
    <input type="submit" name="submit" value="Add Category">
</form>
