<?php
    include "connection_db.inc.php";
    session_start();
    $uname=$_SESSION['login_id'];
    if(isset($_GET['value1'])){
      // echo $_GET['value1'];
?>
<?php
            include "../../../../Homepage/header.php";  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mr. PC</title>
    <link rel="stylesheet" href="checkoutpage.css">
    <link rel="stylesheet" href="../../../../Homepage/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<br><br><br><br>

<center><h1>CHECKOUT</h1></center>



<form action="Paymentpage/paymentpage.php" method="POST" novalidate>

<div class="container">
  <div class="step-checkout">
  <ul class="step-checkout_list" id="checkoutList">
    <!-- Checkout items/tabs -->
    <li role="button" class="step-checkout_item active" id="stepCheckoutItem1" tabindex="1"><span>Your details</span></li>
    <li role="button" class="step-checkout_item" id="stepCheckoutItem2" tabindex="1"><span>Shipping address</span></li>
    <li role="button" class="step-checkout_item" id="stepCheckoutItem3" tabindex="1"><span>Cart Details</span></li>
    <li role="button" class="step-checkout_item" id="stepCheckoutItem4" tabindex="1"><span>Payment</span></li>
    <li class="step-checkout_content">
      <!-- Split Checkout steps from the Summary -->
      <div class="grid-x">
        <!-- Checkout step content here -->
        <div class="col">
          <div class="step-checkout_item_content" id="stepCheckoutContent1">
            <div class="step-box">
              <center><h2>Enter Your Details</h2></center>
                <!-- PERSONAL DETAILS ---------------------------------------------------------------------------------->
                    <input class="yourdetailstext" name="paymentname" type="text" placeholder="Enter your name" required>
                    <input class="yourdetailstext" name="paymentnumber" type="text" placeholder="Enter mobile number" required>

                    <input class="yourdetailstext" name="paymentemail" type="text" value="<?php echo $uname;?>" disabled>
                    <input class="yourdetailstext" name="paymentinst" type="text" placeholder="Enter Delivery Instructions"><br><br>


                <!-- PERSONAL DETAILS ENDS---------------------------------------------------------------------------------->
            </div>
          </div>
          <div class="step-checkout_item_content" id="stepCheckoutContent2">
            <div class="step-box">
              <center><h2>Select Your Address</h2></center>
              <!-- SHIPPING DETAILS--------------------------------------------------------------------------------------- -->

                <!-- FETCH ADDRESS DETAILS -->
                <?php
                    
                    $uname=$_SESSION['login_id'];
                    $query="SELECT * FROM login where email='$uname';";
                    $result = pg_query($conn,$query);
                    if(pg_num_rows($result)>0)
                    {
                    while($row=pg_fetch_assoc($result))
                        {
                ?>



              <div class="radio-toolbar">

              <!-- ---------------------------------------- -->
                <?php   
                    if(isset($row['haddressline1'])){
                ?>
                <input type="radio" id="radioApple" name="radioFruit" value="home" >
                <label for="radioApple" id="homeaddress"><?php echo $row['haddressline1']; ?>, <?php echo $row['haddressline2']; ?>, <?php echo $row['hdistrict']; ?>, <?php echo $row['hstate']; ?>, <?php echo $row['hcountry']; ?>, <?php echo $row['hpincode']; ?> </label>
                <?php
                    }
                ?>
                <!-- ---------------------------------------- -->
                <?php   
                    if( isset($row['oaddressline1'])){
                ?>
                <input type="radio" id="radioBanana" name="radioFruit" value="office">
                <label for="radioBanana" id="officeaddress"><?php echo $row['oaddressline1']; ?>, <?php echo $row['oaddressline2']; ?>, <?php echo $row['odistrict']; ?>, <?php echo $row['ostate']; ?>, <?php echo $row['ocountry']; ?>, <?php echo $row['opincode']; ?> </label> 
                <?php
                    }
                ?>
                <!-- ---------------------------------------- -->
            </div>
            <br>
                        <?php
                        }
                    }
                        ?>


            <center><h2>OR Enter Your Custom Address</h2></center>

            <input type="text" class="yourdetailstext" name="addressline1" id="addl1" placeholder="Enter Address Line 1" required>
            <input type="text" class="yourdetailstext" name="addressline2" id="addl2" placeholder="Enter Address Line 2">
            <input type="text" class="yourdetailstext" name="district" id="dist" placeholder="Enter District" required>
            <input type="text" class="yourdetailstext" name="state" id="state" placeholder="Enter State" required>
            <input type="text" class="yourdetailstext" name="country" id="country" placeholder="Enter Country" required>
            <input type="text" class="yourdetailstext" name="pincode" id="pincode" placeholder="Enter Pincode" required>

            
            </div>
        </div>
    <!-- SHIPPING DETAILS--------------------------------------------------------------------------------------- -->
    <!-- CART DETAILS--------------------------------------------------------------------------------------- -->

          <div class="step-checkout_item_content" id="stepCheckoutContent3">
            <div class="step-box">
              <center><h2>Check Your Cart Details</h2></center>
                    <div class="cart">
                    
                      <p>Total Amount :&nbsp&nbsp <text id="ta"></text> </p>
                      <p>Total Quantity : &nbsp&nbsp<text id="quantity"></text></p>
                      <p>Sub-total Amount : &nbsp&nbsp<text id="subto"></text></p>
                      <p>Tax Amount : &nbsp&nbsp<text id="tax"></text></p>
                      <p>Delivery Charges : &nbsp&nbsp<text>₹ 100.00 </text></</p>
                      <p>Estimated Shipping Date : &nbsp&nbsp8-10 Working Days</p>
                    
                    </div>

            </div>
          </div>

    <!-- CART DETAILS----------------------------------------------------------------------------------------->

          <div class="step-checkout_item_content" id="stepCheckoutContent4">
            <div class="step-box">
              <center><h2>Payment Methods</h2></center>
                <input type="text" value="" name="paymentamount" id="paymentamt" style="display:none;" />
                <input type="text" value="" name="paymentquantity" id="paymentquantity" style="display:none;" />
              <div class="paymentdetails">
                    <button type="submit" name="paymentsubmit">Continue With RAZORPAY</button>

              </div>
            </div>
          </div>
        </div>
      </div>
    </li>
  </ul>
</div>
</div>
</form>



<script type="text/javascript" src="checkoutpage.js"></script>

<!-- <text class="paymentwarning">Incomplete User Details</text> -->

<footer>
    <p>Created by Mr.PC <i class="fa fa-copyright" aria-hidden="true"></i> &nbspCopyright. All Rights Reserved</p>
</footer>


    <!-- DECRYPT VALUES -->
    <script>
      
      var enc1 = "<?php echo $_GET['value1']; ?>"
      var enc2 = "<?php echo $_GET['value2']; ?>"
      var enc3 = "<?php echo $_GET['value3']; ?>"

      var decodedString1 = window.atob(enc1);
      var decodedString2 = window.atob(enc2);
      var decodedString3 = window.atob(enc3);

      document.getElementById('ta').innerHTML = '₹'+ decodedString1 +'.00';
      document.getElementById('quantity').innerHTML = decodedString2;
      document.getElementById('subto').innerHTML = '₹'+ decodedString1 +'.00';
      document.getElementById('tax').innerHTML = '₹'+ parseFloat(decodedString3).toFixed(2);
      document.getElementById("paymentamt").value = decodedString1;
      document.getElementById("paymentquantity").value = decodedString2;
      
      </script>


    <!--  -->



</body>
</html>

<?php
  }
?>


