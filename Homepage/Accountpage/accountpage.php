






















<?php
    include "../header.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mr. PC</title>
    <link rel="stylesheet" href="accountpage.css">
    <link rel="stylesheet" href="../header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;600&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- JQUERY CODE -->
    <!-- USERNAME VALIDATION -->
    <script>
      $(document).ready(function(){
        $("#username").keyup(function(){
          $.ajax({

            url: 'loginsecurity/validationpage.php',
            type: 'post',
            data: {username: $(this).val()},
            success: function(result){
              $("#result").html(result);
            }

          });
        });

      });
    </script>

    <!-- EMAIL VALIDATION -->

    <script>
        $(document).ready(function(){
          $("#email").keyup(function(){
            $.ajax({

              url: 'loginsecurity/validationpage.php',
              type: 'post',
              data: {email: $(this).val()},
              success: function(result){
                $("#result").html(result);
              }

            });
          });

        });
    </script>

    <!-- PASSWORD VALIDATION -->

    <script>
        $(document).ready(function(){
          $("#password").keyup(function(){
            $.ajax({

              url: 'loginsecurity/validationpage.php',
              type: 'post',
              data: {password: $(this).val()},
              success: function(result){
                $("#result").html(result);
              }

            });
          });

        });

        $(document).ready(function () {
          $("#grid1").click(function () {
            $(".ordersdetails").toggle();
            $("#account").hide();
            $("#addressdetails").hide();
            $("#mywishlist").hide();
          });
        });
        $(document).ready(function () {
          $("#grid2").click(function () {
            $("#account").toggle();
            $("#orders").hide();
            $("#addressdetails").hide();
            $("#mywishlist").hide();
          });
        });
        $(document).ready(function () {
          $("#grid3").click(function () {
            $("#addressdetails").toggle();
            $("#account").hide();
            $("#orders").hide();
            $("#mywishlist").hide();
          });
        });
        $(document).ready(function () {
          $("#grid4").click(function () {
            $("#mywishlist").toggle();
            $("#account").hide();
            $("#addressdetails").hide();
            $("#orders").hide();
          });
        });
    </script>


</head>
<body>
<br><br><br><br>
<center><h1>MY ACCOUNT</h1></center>

<!-- COLUMNS -->

<div class="rows">
    <div class="columns">
        <div class="grid" id="grid1">
            <i class="fa fa-archive" aria-hidden="true"></i>
            <text>Your Orders</text>
            <p>Check ordered products</p>

        </div>
    </div>

    <div class="columns">
        <div class="grid" id="grid2">
        <i class="fa fa-lock" aria-hidden="true"></i>
        <text>Login & Security</text>
            <p>Edit Personal Information</p>
        
        </div>
    </div>

</div>
<div class="rows">
    <div class="columns">
        <div class="grid" id="grid3" style="margin-bottom: 10%;">
        <i class="fa fa-address-book-o" aria-hidden="true"></i>
        <text>Your Addresses</text>
            <p>Edit or Add Addresses</p>

        </div>
    </div>

    <div class="columns">
        <div class="grid" id="grid4" style="margin-bottom: 10%;">
        <i class="fa fa-th-list" aria-hidden="true"></i></i>
        <text>My Wishlist</text>
            <p>Edit Wishlist</p>
        
        </div>
    </div>

</div>

<!-- COLUMNS -->

<!-- ORDER GRIDS -->

<!-- FETCH ORDER DETAILS -->
<?php


    include "connection_db.inc.php";
    $uname=$_SESSION['login_id'];

    // FETCH USERID

    $query="SELECT * FROM login WHERE email='$uname';";
    $result=pg_query($conn,$query);

    if(pg_num_rows($result)==1)
    {
      while($row=pg_fetch_assoc($result))
                {
                  $userid=$row['id']; 
                }
    }


    $query="SELECT * FROM orders WHERE user_id=$userid;";
    $result = pg_query($conn,$query);
    if(pg_num_rows($result)>0)
    {
    while($row=pg_fetch_assoc($result))
        {
            $datas[]= $row;
        }
      } 
      // echo pg_num_rows($result);  Number of rows
      // echo $datas[0]['product_name'];
    
      $records=pg_num_rows($result);
?>

<!--  -->

<div class="orderdetails" id="orders">
<center><h1>Your Orders</h1></center>
<div style="overflow-x:auto;" class="orders"><br>

<table>
  <tr>
    <th>Total Quantity</th>
    <th>Order Number</th>
    <th>Order Date</th>
    <th>Shipping Address</th>
    <th>Total Amount</th>
    <th>Order Status</th>
  </tr>
  <?php

for ($x = 0; $x < $records; $x++) {

?>
  <tr>
    <td><?php echo $datas[$x]['quantity'] ?></td>
    <td class="order_no"><?php echo $datas[$x]['order_no'] ?></td>
    <td><?php echo $datas[$x]['order_date'] ?></td>
    <td><?php echo $datas[$x]['shipping_address'] ?></td>
    <td><?php echo "₹".$datas[$x]['total_amount'].".00" ?>      
  </td>
    <td><?php echo $datas[$x]['order_status'] ?></td>
  </tr>
  
  <?php
        }
    ?>
</table>
</div>
</div>

<br><br><br><br><br>
<!-- ORDER GRIDS -->

<!-- -------------------------------------------------------------------------------------------------------------->

<!-- LOGIN GRIDS -->

<!-- FETCH LOGIN DETAILS -->
<?php
    
    $query="SELECT * FROM login where email='$uname';";
    $result = pg_query($conn,$query);
    if(pg_num_rows($result)>0)
    {
    while($row=pg_fetch_assoc($result))
        {
?>

<!-- FETCH LOGIN DETAILS ENDS-->

<div id="account" class="tabcontent">

<div class="row">
    <div class="column">
        <h1>LOG IN</h1>
        <div class="usernametab">
            <text>USERNAME</text>
            <p><?php echo $row['username']; ?></p>
            <button><i class="fa fa-lock" aria-hidden="true"></i></button>
        </div>
        <div class="usernametab">
            <text>EMAIL</text>
            <p><?php echo $row['email'] ?></p>
            <button><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
        </div>
        <div class="usernametab" id="mobilemodal">
            <text>MOBILE PHONE</text>
            <p><?php echo $row['mobile'] ?></p>
            <button><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
        </div>
        <div class="usernametab">
            <text>PASSWORD</text>
            <p>********</p>
            <button><i class="fa fa-lock" aria-hidden="true"></i></button>
        </div>
        <div onclick="location.href='logout.php';" class="usernametab">
            <text>LOGOUT</text>
            <p>Logout of your devices </p>
            <button><i class="fa fa-lock" aria-hidden="true"></i></button>
        </div>
    </div>

    <div class="column">
        <h1>SECURITY</h1>
        <div class="usernametab">
            <text>INFORMATION</text>
            <p><?php echo $row['personal_info'] ?></p>
            <button><i class="fa fa-lock" aria-hidden="true"></i></button>
        </div>
        <div class="usernametab">
            <text>BACKUP EMAIL</text>
            <p><?php if(isset($row['backup_email'])){ echo $row['backup_email'];}else{echo"-";} ?></p>
            <button><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
        </div>
        <div class="usernametab">
            <text>PRIVACY CENTER</text>
            <p>Understand how your data is used</p>
            <button><i class="fa fa-lock" aria-hidden="true"></i></button>
        </div>
        <div onclick="location.href='http://localhost/Website/Homepage/aboutus.php';" class="usernametab">
            <text>MY SUPPORT</text>
            <p>Get some help</p>
            <button><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
        </div>
        <div onclick="location.href='deleteaccount.php?id=<?php echo $userid ?>';" class="usernametab">
            <text>DELETE ACCOUNT</text>
            <p>Permanently remove your account</p>
            <button><i class="fa fa-lock" aria-hidden="true"></i></button>
        </div>
    </div>
</div>
<button class="editbutton" id="editbuttonmodal">EDIT DETAILS</button><br><br>
</div>
  
<!-- LOGIN GRIDS -->

<!-- MODAL STARTS -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" style="color:#44d62c;cursor:pointer;font-size:30px;float:right;">&times;</span>
    <center><p>EDIT DETAILS</p></center>
    <br>
    <form action="loginsecurity/editdetails.php" method="POST">
    <center>
    <input type="text" name="s_email" id="email" placeholder="Enter email" required>
    <input type="text" name="s_mob" placeholder="Enter mobile number" required>
    <input type="password" name="s_op" placeholder="Enter Old Password" required>
    <input type="password" name="s_np1" id="password" placeholder="Enter New Password"  required>
    <input type="password" name="s_np2" id="password" placeholder="Re-Enter New Password"  required>
    <input type="text" name="s_bemail" id="email" placeholder="Enter Backup Email (Optional)">
    <input type="text" name="s_pi" id="email" placeholder="Enter Personal Information" required><br><br>
    <p id="result" style="color:red"></p>


    <button class="savebutton" name="signupsubmit" type="submit">SAVE CHANGES</button>
        

    </center>
    </form>
</div>

</div>





<!-- MODAL STARTS -->
<!-- ------------------------------------------------------------------------------------------------------------ -->

<!-- ADDRESS DETAILS  -->
<!-- CHECK IF ADDRESS1 IS SET -->

<div id="addressdetails" class="addresscontent">
<?php
if(isset($row['haddressline1'])){
?>
<div class="addressrow">
  <div class="addresscolumn">
    <h2>Address 1 &nbsp&nbsp<i class="fa fa-pencil-square-o" id="openmodal1" aria-hidden="true"></i></h2>
    <p><?php echo $row['haddressline1']; ?></p>
    <p><?php echo $row['haddressline2']; ?></p>
    <p><?php echo $row['hdistrict']; ?></p>
    <p><?php echo $row['hstate']; ?>,<?php echo $row['hcountry']; ?></p>
    <p><?php echo $row['hpincode']; ?></p>
  </div>
<?php
}
else{
?>
  <div class="addressrow">
  <div class="addresscolumn">
    <h2>Address 1 &nbsp&nbsp<i class="fa fa-pencil-square-o" id="openmodal1" aria-hidden="true"></i></h2>
    <p><?php echo "Not Available"; ?></p>
  </div>
<?php
}
?>



<!-- ADDRESS 2 -->
<?php
if(isset($row['oaddressline1'])){
?>
<div class="addressrow">
  <div class="addresscolumn">
    <h2>Address 2 &nbsp&nbsp<i class="fa fa-pencil-square-o" id="openmodal2" aria-hidden="true"></i></h2>
    <p><?php echo $row['oaddressline1']; ?></p>
    <p><?php echo $row['oaddressline2']; ?></p>
    <p><?php echo $row['odistrict']; ?></p>
    <p><?php echo $row['ostate']; ?>,<?php echo $row['ocountry']; ?></p>
    <p><?php echo $row['opincode']; ?></p>
  </div>
<?php
}
else{
?>
  <div class="addressrow">
  <div class="addresscolumn">
    <h2>Address 2 &nbsp&nbsp<i class="fa fa-pencil-square-o" id="openmodal2" aria-hidden="true"></i></h2>
    <p><?php echo "Not Available"; ?></p>
  </div>
<?php
}
?>

</div>
</div>
</div>








<!-- ----------------------------------------------------------- -->
<!-- The Modal for ADDress 2 -->
<div id="myModal1" class="modal1">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close1" style="color:#44d62c;cursor:pointer;font-size:30px;float:right;">&times;</span>
    <center><p>EDIT ADDRESS</p></center>
    <br>
    
    <form action="loginsecurity/addaddress.php" method="POST">
    <div class="radio-toolbar">
        <input type="radio" name="address" value="one" checked><p>Address 1</p>

        <input type="radio" name="address" value="two"><p>Address 2</p>
    </div>




    <center>
    <input type="text" name="addressline1" id="addl1" placeholder="Enter Address Line 1" required>
    <input type="text" name="addressline1" id="addl2" placeholder="Enter Address Line 2">
    <input type="text" name="district" id="dist" placeholder="Enter District" required>
    <input type="text" name="state" id="state" placeholder="Enter State" required>
    <input type="text" name="country" id="country" placeholder="Enter Country" required>
    <input type="text" name="pincode" id="pincode" placeholder="Enter Pincode" required>
          <br>
    <button class="savebutton" name="signupsubmit1" type="submit">SAVE CHANGES</button>
        

    </center>
    </form>
</div>

</div>




<!-- --------------------------------------- -->
<?php
    }
    } 
?>




<!--  -->

<!-- WIshlist DETAILS  -->
<div id="mywishlist" class="mywishlist">

<center><h1>Your Wishlist</h1></center><br>
<!-- FETCH WISHLIST DATA -->

<div class="wishcontainer">
  <main class="wishgrid">

<?php

$query= "SELECT * FROM wishlist WHERE wuserid=$userid;";
$result=pg_query($conn,$query);
if(pg_num_rows($result)>0)
    {
    while($row=pg_fetch_assoc($result))
        {
                   
?>
    <article>

      <div class="wishtext">
      <?php
        $cat=$row['wpcategory'];
        $wpid=$row['wpid'];
        $query1= "SELECT image_path FROM $cat WHERE product_id = $wpid;";
        $result1=pg_query($conn,$query1);
        if(pg_num_rows($result1)>0)
        {
        while($row1=pg_fetch_assoc($result1))
            {
      ?>
        <img src="../Products/Categories/<?php echo $cat?>/<?php echo $row1['image_path']?>">
        <h3><?php echo $row['wpname']?></h3>
        <button onclick="window.location.href='http://localhost/Website/Homepage/Products/Categories/<?php echo $row['wpcategory'];?>/Displaypage/productdisplaypage.php?Product_id=<?php echo $row['wpid'];?>';" class="btn btn-primary btn-block">Buy Now</button><br><br>
        <a href="removewishlistitem.php?pidvalue=<?php echo $row['wpid'];?>">Remove</a>
      </div><br>
    </article>

<?php 
              }}
}
}
else{
?><div class="emptywishlist"><?php echo "Wishlist is Empty !!"; ?></div>
<?php 

} 

?>
  </main>
</div>
</div>






<script type="text/javascript" src="accountpage.js"></script>

<br><br><br><br><br>

</body>
</html>