<!DOCTYPE html>
<?php
include('../includes/connect.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Area</title>
    <!--css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--FONTAWSEOM-->
    <script src="https://kit.fontawesome.com/fd17772ef1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"  href="admin.css">
    <style>
        .adminimage{
            width:100px;
            object-fit:contain;
        }
    </style>
</head>
<body>
    <!--navbar-->
    <div class ="container-fluid p-0">
        <!--firstchild-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../logo1.jpg" alt="" class="logo">  
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!--second child-->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <!--third child-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <a href="#"><img src="../shirt.jpg" alt="" class="adminimage"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <button><a href="insertproduct.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert categories</a></button>
                    <button><a href="index.php?view_category" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">List users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>

        </div>
    </div> 
    <!--fourthchild-->
    <div class="container my-5">
        <?php
        if(isset($_GET['insert_category'])){
            include('insertcategories.php');
        }
        if(isset($_GET['insert_brands'])){
            include('insertbrands.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['view_category'])){
            include('view_category.php');
        }
        ?>
    </div>

<!--js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>