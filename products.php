<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="stylee.css">
    <script src="https://kit.fontawesome.com/d3308567e4.js" crossorigin="anonymous"></script>
    <title>Twitter</title>
</head>
<body>
    <header>
        <div class="header-content">
        <div class="logo">
            <img src="logo1.jpg">
        </div>
        <h2 class="head">KRISHNA TEX</h2>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">New collections</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Message</a></li>
        </ul>
        <div class="burger">
            <i class="fa-solid fa-bars"></i>
        </div>
        </div>
        <div class="overall">
        <div class="topic">
            <div class="burgers">
                <div class="nav">
                <center><h2 class="menu" style="margin-left:200%">MENU</h2></center>
                </div>
            </div>
        <center><h2><b>TRENDING Collections</b></h2></center>
        </div>          
    <div class="text-center">
            <div class="text-content">
            <?php
   include('./includes/connect.php');
   $select_query="SELECT * FROM `products`";
   $result_query=mysqli_query($con,$select_query);
   while($row=mysqli_fetch_assoc($result_query)){
       $product_id=$row['product_id'];
       $product_title=$row['product_title'];
       $product_description=$row['product_description'];
       $product_keywords=$row['product_keywords'];
       $product_image=$row['product_image'];
       $product_price=$row['product_price'];
       echo"<div class='text-center'>
       <div class='text-content'>
           <div class='politics'>
           <div class='imhw'>
           <img src='./adminarea/product_images/$product_image' style='height:500px; width:500px;'>
           </div>
           <div class='cimg'>
           <p>$product_description</p>
           <p>Price: $product_price</p>
           </div> 
           </div>
       </div>
       </div>" ;
   }
?> 

    </div>
    </div>
    <ul class="nav-link">
                    <div class="nav-text">
                    <li><a href="#">My profile</a></li>
                    <br>
                    <br>
                    <li><a href="#">Messages</a></li>
                    <br>
                    <br>
                    <li><a href="#">Security</a></li>
                    <br>
                    <br>
                    <li><a href="#">logout</a></li>
                    </div>
    </header>
    <script src="app.js"></script>  
</body>
</html>

