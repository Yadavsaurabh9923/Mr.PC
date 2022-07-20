<?php
    include "connection_db.inc.php";
    include "../../../Homepage/header.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mr. PC</title>
    <link rel="stylesheet" href="cartpage.css">
    <link rel="stylesheet" href="../../../Homepage/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;600&display=swap" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<!-- SHOPPING CART STARTS -->

<!-- FETCH CART VALUES -->

<!-- FETCH CART VALUES -->
<br><br><br><br>
<center><h1>SHOPPING CART</h1></center>


    <div class="small-container cart-page">
    
    <table class="cartproducts">
        <tr>
            <th>&nbspProduct</th>
            <th>&nbspQuantity</th>
            <th>&nbspSubtotal</th>
        </tr>

<?php
    $orignalusername = $_SESSION['login_id'];
    $orignalpassword = $_SESSION['password'];

;
    $query="SELECT id FROM login WHERE email='$orignalusername';";
    $result=pg_query($conn,$query);
    if(pg_num_rows($result)>0)
    {
    while($row=pg_fetch_assoc($result))
    {
        $orignalid = $row['id'];
    }
    }


    $query="SELECT login.id,cart.category,cart.item_id FROM login,cart WHERE login.id=cart.user_id AND login.id='$orignalid';";
    $result=pg_query($conn,$query);
    if(pg_num_rows($result)>0)
    {
    while($row=pg_fetch_assoc($result))
    {
        // echo $row['id'],$row['category'],$row['item_id'];
        // FETCH INDIVIDUAL PRODUCTS

        $query1= "SELECT * FROM ".strtolower($row['category'])." WHERE product_id='".$row['item_id']."'; ";
        $result1=pg_query($conn,$query1);
            if(pg_num_rows($result1)>0)
            {
                while($row1=pg_fetch_assoc($result1))
                {
?>

        <tr class="cartrow">
            <td>
                <div class="cart-info">
                    <img src="../Categories/<?php echo $row['category'] ?>/<?php echo $row1['image_path']?>">
                    <div class="cart-pdetails">
                        <p><?php echo $row1['product_name']; ?></p>
                        <h3><?php echo $row1['product_details']; ?></h3>
                        <small class="productprice">₹<?php echo $row1['actual_price']; ?></small>
                        <br>
                        <a href="http://localhost/Website/Homepage/Products/Cartpage/removeitem.php?userid=<?php echo $orignalid ?>&itemid=<?php echo $row['item_id'];?>">Remove</a>
                    </div>
                </div>
                
            </td>
            <td>&nbsp&nbsp&nbsp<input class="quantity" type="number" value="1" min="1" max="5"></td>
            <td class="pprice"></td>
        </tr>

<?php
}
}
}
}
?>
        
    </table>


    <div class="total-price">
        <table>
        <tr>
            <td>Total Items</td>
            <td id="totalquantity">N.A</td>
        </tr>
        <tr>
            <td>Subtotal</td>
            <td id="totalsubtotal">N.A</td>
        </tr>
        <tr>
            <td>Tax (GST Inclusive)</td>
            <td id="tax">N.A</td>
        </tr>
        <tr>
            <td id="totalprice">Total</td>
            <td id="totalamount">N.A</td>
        </tr>
        </table>
    </div>



</div>

<!-- SHOPPING CART ENDS -->

<!-- DISCOUNT SECTION -->
<div class="discountrow">
    
    <div class="discountcolumn">
        <div class="discountgrid">
            <text>Have a Coupon ?</text><br>
            <input type="text" id="couponcode" placeholder="Enter the coupon code"><button onclick="checkcoupon()">Apply</button><br><br>
            
        </div>
    </div>  
    
    <div class="discountcolumn">
        <div class="paymentgrid">
            <button onclick="encryption()">Checkout</button><br>
            <button onclick="location.href='http://localhost/Website/Homepage/homepage.php';">Continue Shopping</button>
        </div>
    </div>

</div>

<!-- DISCOUNT SECTION -->

<br>
<br><br>
<br><br>
<br>

<!-- FOOTER -->
<footer>
    <p>Created by Mr.PC <i class="fa fa-copyright" aria-hidden="true"></i> &nbspCopyright. All Rights Reserved</p>
</footer>


<!-- FOOTER -->
<script type="text/javascript" src="cartpage.js" async></script>

</body>
</html>