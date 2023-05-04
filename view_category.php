<h3 class="text-center text-success">VIEW CATEGORIES</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>CATEGORY ID</th>
            <th>PRODUCT TITLE</th>
            <th>PRODUCT IMAGE</th>
            <th>DELETE</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
           $get_category= "Select * from `categories`";
           $result=mysqli_query($con,$get_category);
           $number=0;
           while($row=mysqli_fetch_assoc($result)){
            $category_id=$row["category_id"];
            $category_title=$row["category_name"];
            $category_image=$row["category_image"];
            $number++;
            echo "<tr class='text-center'>
            <td>$number</td>
            <td>$category_title</td>
            <td><img src='./categoryimg/$category_image' style='width:10%'></td>
            <td><a href=''class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
           }
        ?>
    </tbody>
</table>