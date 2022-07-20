<!-- Get Product Details -->

<?php

  include "connection_db.inc.php";

  if(isset($_GET['Product_id']))
  {
      $productid=$_GET['Product_id'];
  }

  $query="SELECT * FROM mouse WHERE product_id=$productid;";
  $result = pg_query($conn,$query);

  if(pg_num_rows($result)>0)
  {
    while($row=pg_fetch_assoc($result))
        {
          $product_name = $row['product_name'];
          $product_brandname = $row['brand'];
          $product_oprice = $row['orignal_price'];
          $product_aprice = $row['actual_price'];
          $product_details1 = $row['product_details1'];
          $product_details = $row['product_details'];
          $product_color = $row['color'];
          $product_category = $row['category'];
          $product_usage = $row['subcategory'];
          $product_modelname = $row['model_name'];
          $weight= $row['weight'];
          $connection_type=$row['connection_type'];

          $includedcomponents =$row['included_components'];
          $warranty =$row['warranty'];
        }
  }

  
?>


<!-- Get Product Details Ends-->
<!--  -->

<!-- Product Display Page Starts -->

<?php
  include "../../../../header.php";
  $uid= $_SESSION['login_id'];
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Card/Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
 
    <!-- PRODUCT SLIDER LINKS -->
    <link rel="stylesheet" href="productdisplaypage.css" />
    <link rel="stylesheet" href="../../../../header.css" />

    <link rel="stylesheet" href="lightslider.css">
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="lightslider.js"></script>
 
 
     <!-- PRODUCT SLIDER LINKS ENDS-->
  </head>
  <body>
    <br>
    <br>
    <br>
    <div class = "card-wrapper">
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src = "../images/logitechb170_1.png" alt = "shoe image">
              <img src = "../images/LogitechG102_1.png" alt = "shoe image">
              <img src = "../images/LogitechG402_1.png" alt = "shoe image">
              <img src = "../images/LogitechM221_1.png" alt = "shoe image">
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img src = "../images/logitechb170_1.png" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "2">
                <img src = "../images/LogitechG102_1.png" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "3">
                <img src = "../images/LogitechG402_1.png" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "4">
                <img src = "../images/LogitechM221_1.png" alt = "shoe image">
              </a>
            </div>
          </div>
        </div>
        
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title"><?php echo $product_name;?></h2>
          <a href = "#" class = "product-link"><?php echo $product_brandname;?> store</a>
          <div class = "product-rating">
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star-half-alt"></i>
            <span>4.7(21)</span>
          </div>
          <div class = "product-price">
            <p class = "last-price">M. R .P: &nbsp <span><?php echo "₹",$product_oprice;?></span></p>
            <p class = "new-price">New Price: &nbsp&nbsp <span><?php echo "₹",$product_aprice;?></span> &nbsp&nbsp&nbsp&nbsp  <div class = "savings"><span style="color:white; font-size:1.3rem; font-weight:700;">You Save :</span><span><?php echo " ₹",((int)$product_oprice-(int)$product_aprice),".00"; ?></span></div></p>
          </div>

          <div class = "product-detail">
            <h2>Product Details: </h2>
            <p><?php echo $product_details1;?>
            <p><?php echo $product_details;?>
            <ul>
              <li>Color : <span><?php echo $product_color;?></span></li>
              <li>Model Name : <span><?php echo $product_modelname;?></span></li>
              <li>Category :  <span><?php echo $product_category;?></span></li>
              <li>Connection Type: <span><?php echo $connection_type;?></span></li>
              <li>Usage : <span><?php echo $product_usage;?></span></li>
            </ul>
          </div>

          <div class = "purchase-info">
            <!-- <input type = "number" min = "0" value = "1" max= "9"> -->
            <button type = "button" onclick="location.href='addtocart.php?id=<?php echo $productid ?>&category=<?php echo $product_category ?>'" class = "btn">
              Add to Cart <i class = "fas fa-shopping-cart"></i>
            </button>
            <button type = "button" onclick="location.href = 'addtowishlist.php?id=<?php echo $productid ?>&cat=<?php echo $product_category ?>&pn=<?php echo $product_name;?>&uid=<?php echo $uid;?>';" class = "btn">Add To Wishlist &nbsp<i class="fas fa-heart"></i> </button>&nbsp&nbsp<?php if(isset($_GET['error'])){?><i class="fas fa-heart" style="color:red;font-size:20px"></i><?php }?>
          </div>

          <div class = "social-links">
            <p>Share: &nbsp</p>
            <a href = "#">
              <i class = "fab fa-facebook-f"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-twitter"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-instagram"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-whatsapp"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <script src="productdisplaypage.js"></script>
 



<br>
<br>
<!-- <hr> -->
<br>
<br>
<br>
    <!-- Details Table -->

    <center><h1 style="color:#44d62c">TECHNICAL SPECIFICATIONS</h1></center>
    <br>
<div class="row">
  <div class="column">
    <table>
      <tr>
        <td>Category</td>
        <td><?php echo $product_category ?></td>
      </tr>
      <tr>
        <td>Usage</td>
        <td><?php echo $product_usage ?></td>
      </tr>
      <tr>
        <td>Product Name</td>
        <td><?php echo $product_name ?></td>
      </tr>
      <tr>
        <td>Model Name</td>
        <td><?php echo $product_modelname ?></td>
      </tr>
      <tr>
        <td>Color</td>
        <td><?php echo $product_color ?></td>
      </tr>
      

    </table>
  </div>
  <div class="column">
    <table>
    <tr>
        <td>Brand</td>
        <td><?php echo $product_brandname ?></td>
      </tr>
        <td>Warranty</td>
        <td><?php echo $warranty ?></td>
      </tr>
        
      <tr>
        <td>Weight</td>
        <td><?php echo $weight," g" ?></td>
      </tr>

      <tr>
        <td>Connection Type</td>
        <td><?php echo $connection_type ?></td>
      </tr>

      <tr>
        <td>Included Components</td>
        <td><?php echo $includedcomponents ?></td>
      </tr>
      
      
    </table>
  </div>
</div>


<!-- Details Table ENDS-->

<br>
<center><h1 style="color:#44d62c">SIMILAR PRODUCTS</h1></center>

<!-- PRODUCT SLIDER STARTS -->

<!-- PHP CODE TO FETCH SIMILAR PRODUCTS Based on usage and brand-->
<?php

$query="SELECT * FROM mouse where subcategory='$product_usage' and product_id!='$productid';";
  $result = pg_query($conn,$query);

  $records=pg_num_rows($result);
  if(pg_num_rows($result)>0)
  {
    while($row=pg_fetch_assoc($result))
        {
          $datas[]= $row;
        }
  }

  echo $datas[0]['image_path'];

?>
<!-- PHP CODE TO FETCH SIMILAR PRODUCTS -->

<section class="slider">
<ul id="autoWidth" class="cs-hidden">

<?php
for ($x = 0; $x < $records; $x++) {
?>
  <li class="item-a">
    <!-- One Slide -->
      <div class="box">
        <div class="slide-img">
          <img src="../<?php echo $datas[$x]['image_path'] ?>">

          <div class="overlay">
            <a href="http://localhost/Website/Homepage/Products/Categories/Mouse/Displaypage/productdisplaypage.php?Product_id=<?php echo $datas[$x]['product_id']?>" class="buy-btn">Buy Now</a>
          </div>

        </div>

        <div class="detail-box">
          <div class="type">
            <a href="#"><?php if (isset($datas[$x]['product_name'])){ echo $datas[$x]['product_name'];} else{ echo "Not Available";} ?></a><br>
          </div>
          <a href="#" class="sliderprice"><?php if (isset($datas[$x]['actual_price'])){ echo "₹&nbsp",$datas[$x]['actual_price'];} else{ echo "Not Available";} ?></a>

        </div>
      </div>
    <!-- One Slide ENDS-->
  </li>
<?php

}
?>

</ul>

</section>

<script type="text/javascript" src="productslider.js"></script>

<!-- PRODUCT SLIDER ENDS -->

<!-- FOOTER -->

<br>
<footer>
    <p>Created by Mr.PC <i class="fa fa-copyright" aria-hidden="true"></i> &nbspCopyright. All Rights Reserved</p>
</footer>

<!-- FOOTER -->
</body>
</html>