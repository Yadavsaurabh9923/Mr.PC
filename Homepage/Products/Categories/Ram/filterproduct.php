<?php

include "connection_db.inc.php";

if(isset($_POST['action'])){
    $sql="SELECT * FROM ram WHERE stock_count>1";

    if (isset($_POST["brand"])) {
        $brand_filter = implode("','", $_POST["brand"]);
        $sql .= "
   AND brand IN('" . $brand_filter . "')
  ";
    }

    if (isset($_POST["formfactor"])) {
        $brand_filter = implode("','", $_POST["formfactor"]);
        $sql .= "
   AND ram_size IN('" . $brand_filter . "')
  ";
    }

    if (isset($_POST["usage"])) {
        $brand_filter = implode("','", $_POST["usage"]);
        $sql .= "
   AND voltage IN('" . $brand_filter . "')
  ";
    }




    $result = pg_query($conn,$sql);
    $output    = '';

    if(pg_num_rows($result)>0)
    {
        while($row=pg_fetch_assoc($result))
        {
            $productid= $row['product_id'];
            $output .='<figure>
            <img src="'.$row['image_path'].'">
            <figcaption>'.$row['product_name'].'</figcaption>
            <span class="price1">₹&nbsp'.$row["actual_price"].'</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="price2">₹&nbsp'.$row["orignal_price"].'</span>
            <a class="button" href="http://localhost/Website/Homepage/Products/Categories/Ram/Displaypage/productdisplaypage.php?Product_id='.$row["product_id"].'">Buy Now</a>
            </figure>';
        }
    }

    else{
        $output = "<h3 style=color:white;>No Products Found !</h3>";
    }
    
    echo $output;

}

?>