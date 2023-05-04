

<form action="" method="post" class="mb-1" enctype="multipart/form-data">
<div class="input-group w-90 mb-1">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="category_name" placeholder="Insert categories" aria-label="Username" aria-describedby="basic-addon1" id="category_name">
  <div>
    <div class="form-outline mb-1 w-90 m-auto">
      
      <input id="category_image" type="file" class="form-control" name="category_image" placeholder="Upload image" required="required"> </div>
</div>
<div class="input-group w-10 mb-2">
  <input type="submit" class="form-control" name="insert_cat" value="Insert categories" >
</div>
</form>

<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
  $category_title=$_POST['category_name'];

  if(isset($_FILES['category_image']) && $_FILES['category_image']['error'] === UPLOAD_ERR_OK){
    $category_image = $_FILES['category_image']['name'];
    $category_image_temp = $_FILES['category_image']['tmp_name'];
    move_uploaded_file($category_image_temp,"./categoryimg/$category_image");

    $select_query="Select * from `categories` where category_name='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
      echo "<script>alert('Category is already present')</script>";
    }
    else{
      $insert_query="insert into `categories` (category_name,category_image) values ('$category_title','$category_image')";
      $result_query=mysqli_query($con,$insert_query);
      if($result_query){
        echo "<script>alert('Category added')</script>";
      } 
    }
  } else {
    switch($_FILES['category_image']['error']){
      case UPLOAD_ERR_INI_SIZE:
        $msg = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        break;
      case UPLOAD_ERR_FORM_SIZE:
        $msg = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        break;
      case UPLOAD_ERR_PARTIAL:
        $msg = 'The uploaded file was only partially uploaded';
        break;
      case UPLOAD_ERR_NO_FILE:
        $msg = 'No file was uploaded';
        break;
     
      }
    }
  }

?>