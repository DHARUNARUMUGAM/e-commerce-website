<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
  $product_title=$_POST['product_title'];
  $description=$_POST['description'];
  $product_keywords=$_POST['product_keywords'];
  $product_category=$_POST['product_category'];
  $product_price=$_POST['product_price'];
  $product_status='true';

  //accessing image
  $product_image=$_FILES['product_image']['name'];
  $temp_image=$_FILES['product_image']['tmp_name'];

  if($product_title=='' or $description=='' or $product_keywords=='' or $product_category=='' or $product_price=='' or $product_image=='' ){
   echo "<script>alert('please fill the fields')</script>";
   exit();
  }else{
   move_uploaded_file($temp_image,"./product_images/$product_image");
   
// insert query

$insert_products="INSERT INTO `products` (product_title, product_description, product_keywords, category_id, product_image, product_price, date, status) VALUES ('$product_title','$description','$product_keywords','$product_category','$product_image','$product_price',NOW(),'$product_status')";

    $result_query=mysqli_query($con,$insert_products);
    if($result_query){
      echo "<script>alert('product inserted successfully')</script>";
    }  
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--FONTAWSEOM-->
    <script src="https://kit.fontawesome.com/fd17772ef1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"  href="admin.css">
    <title>insertproducts</title>
</head>
</body class="bg-light" >
    <div class="container ">
       <h1 class="text-center">Insert Products</h1>
       <!--form-->
       <form action="" method="post" enctype="multipart/form-data">
          <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
          </div>
          <!--description-->
          <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product Description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
          </div>
          <!--keyword-->
          <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label">Product keyword</label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keyword" autocomplete="off" required="required">
          </div>
          <!--categories-->
          <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_category" id="" class="form-select">
                <option value="">Select a category</option>
                <?php
                $select_query="Select * from `categories`";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $category_name=$row['category_name'];
                    $category_id=$row['category_id'];
                    echo "<option value='$category_id'>$category_name</option>";
                }
                ?>
                
            </select>
          </div>
          <!--image-->
          <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image" class="form-label">image</label>
            <input type="file" name="product_image" id="product_image" class="form-control"  required="required">
          </div>
          <!--price-->
          <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
          </div>
          <!--submit-->
          <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btnbtn-info mb-3 px-3" value="Insert Products">
       </form>
    </div>
    
</html>
