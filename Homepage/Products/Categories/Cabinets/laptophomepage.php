<!-- HEADER -->

<?php
  
  include "../../../../Homepage/header.php";

?>

<!-- HEADER ENDS-->

<!-- HTML CODE -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mr. PC</title>
    <link rel="stylesheet" href="laptophomepage.css">
    <link rel="stylesheet" href="../../../../Homepage/header.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--  SCRIPT TO CHECK FILTER VALUES -->
    <!-- <script type="text/javascript" src="laptophomepage.js"></script> -->
    <!--  SCRIPT TO CHECK FILTER VALUES -->
</head>
<body>

<br><br><br><br>
<h1 style="font-size: 2.1rem; padding-left: 20px; color: white;">Top Picks / Showing Results for Cabinets </h1>

<hr>
<br>


 <!-- FILTER PANEL------------------------------------------------------------------------------------------------------------ -->


<div class="filter">
<h1 style="font-size: 1.7rem; color: white;"><u>Filter Results</u></h1>
<h1 style="font-size: 1.5rem; color: white;">Brands</h1>

<?php

include "connection_db.inc.php";

$query="SELECT DISTINCT brand FROM cabinets ORDER BY brand;";
$result = pg_query($conn,$query);

if(pg_num_rows($result)>0)
  {
    while($row = pg_fetch_assoc($result))
    {?>
      
      <label class="container"><?php echo $row['brand']; ?>
      <input type="checkbox"  id="brandcheckbox" class="filter_all brand" value="<?php echo $row['brand']; ?>">
      <span class="checkmark"></span>
      </label>
      
    <?php
    }
  } 
?>

<br>
<hr>
<br>

<h1 style="font-size: 1.5rem; color: white;">Form Factor</h1>
<?php

include "connection_db.inc.php";

$query="SELECT DISTINCT form_factor FROM cabinets ORDER BY form_factor;";
$result = pg_query($conn,$query);

if(pg_num_rows($result)>0)
  {
    while($row = pg_fetch_assoc($result))
    {?>
      
      <label class="container"><?php echo $row['form_factor']; ?>
      <input type="checkbox"  id="connection_typecheckbox" class="filter_all brand" value="<?php echo $row['form_factor']; ?>">
      <span class="checkmark"></span>
      </label>
      
    <?php
    }
  } 
?>

<br>
<hr>
<br>

<h1 style="font-size: 1.5rem; color: white;">Usage</h1>

<?php

include "connection_db.inc.php";

$query="SELECT DISTINCT subcategory FROM cabinets ORDER BY subcategory;";
$result = pg_query($conn,$query);

if(pg_num_rows($result)>0)
  {
    while($row = pg_fetch_assoc($result))
    {?>
      
      <label class="container"><?php echo $row['subcategory']; ?>
      <input type="checkbox"  id="subcategorycheckbox" class="filter_all brand" value="<?php echo $row['subcategory']; ?>">
      <span class="checkmark"></span>
      </label>
      
    <?php
    }
  } 
?>

<br>


<hr>

</div>

<!-------------------------------------------FILTER PANEL ENDS--------------------------------------------------------------------->

<!-- PRODUCTS DISPLAY -->


<!-- PHP FETCH PRODUCTS -->

<?php

  include 'connection_db.inc.php';

  $query="SELECT * FROM cabinets ORDER BY product_id ASC;";
  $result = pg_query($conn,$query);
  $datas= array();

  if(pg_num_rows($result)>0)
  {
    while($row = pg_fetch_assoc($result))
    {
      $datas[]= $row;
    }
  } 
  // echo pg_num_rows($result);  Number of rows
  // echo $datas[0]['product_name'];

  $records=pg_num_rows($result);


?>

<!-- PHP FETCH PRODUCTS ENDS-->

<div id="wrap">
	<div id="columns" class="columns_4">
  <!-- FILTERED PRODUCTS WILL BE SHOWN HERE -->
  <?php

for ($x = 0; $x < $records; $x++) {
?>
    <figure>
    <img src="<?php echo $datas[$x]['image_path'] ?>">
    <figcaption><?php if (isset($datas[$x]['product_name'])){ echo $datas[$x]['product_name'];} else{ echo "Not Available";} ?></figcaption>
    <span class="price1"><?php if (isset($datas[$x]['actual_price'])){ echo "₹&nbsp",$datas[$x]['actual_price'];} else{ echo "Not Available";} ?></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="price2"><?php if (isset($datas[$x]['orignal_price'])){ echo "₹&nbsp",$datas[$x]['orignal_price'];} else{ echo "Not Available";} ?></span>
    <a class="button" href="http://localhost/Website/Homepage/Products/Categories/Cabinets/Displaypage/productdisplaypage.php?Product_id=<?php echo $datas[$x]['product_id']?>">Buy Now</a>
    </figure>

<?php
}
?>

  </div>
  
</div>

<!-- PRODUCTS DISPLAY ENDS-->





<!-- AJAX FOR PRODUCT FILTERING -->

<script type="text/javascript">

$(document).ready(function() {
 
 $(".brand").click(function(){

    var action = 'data';
    var brand = get_filter_text('brandcheckbox');
    var formfactor = get_filter_text('connection_typecheckbox');
    var usage = get_filter_text('subcategorycheckbox');


    $.ajax({
         url: "filterproduct.php",
         method: "POST",
         data: {
             action: action,
             brand: brand,
             formfactor:formfactor,
             usage:usage
         },
         success: function(response) {
             $('.columns_4').html(response);
         }
 });
 });


 function get_filter_text(text_id){
     var filterData = [];
     $('#'+text_id+':checked').each(function(){
         filterData.push($(this).val());
     });
     return filterData;
 }
});


</script>





<!-- AJAX FOR PRODUCT FILTERING ENDS-->

</body>

</html>

<!-- HTML CODE ENDS-->
