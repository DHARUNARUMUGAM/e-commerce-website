
<h3 class="text-center text-success">VIEW PRODUCTS</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>PRODUCT ID</th>
            <th>PRODUCT TITLE</th>
            <th>PRODUCT IMAGE</th>
            <th>PRODUCT PRICE</th>
            <th>PRODUCT DESCRIPTION</th>
            <th>DELETE</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
           $get_products= "Select * from `products`";
           $result=mysqli_query($con,$get_products);
           $number=0;
           while($row=mysqli_fetch_assoc($result)){
            $product_id=$row["product_id"];
            $product_title=$row["product_title"];
            $product_image=$row["product_image"];
            $product_price=$row["product_price"];
            $product_description=$row["product_description"];
            $number++;
            echo "<tr class='text-center'>
            <td>$number</td>
            <td>$product_title</td>
            <td><center><img src='./product_images/$product_image' style='width:10%'></center></td>
            <td>$product_price</td>
            <td>$product_description</td>
            <td><a href='' class='text-light'><i class='fa fa-trash'></i></a></td>
        </tr>";
           }
        ?>
    </tbody>
</table>