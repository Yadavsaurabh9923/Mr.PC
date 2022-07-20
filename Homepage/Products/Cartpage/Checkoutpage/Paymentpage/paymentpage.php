<?php

$apikey="rzp_test_soKYbDIMNrAIuw";

if(isset($_POST['paymentsubmit'])){

    if(isset($_POST['paymentname'])){
        $ppaymentname=$_POST['paymentname'];
    }
    if(isset($_POST['paymentnumber'])){
        $ppaymentnumber=$_POST['paymentnumber'];
    }
    if(isset($_POST['paymentemail'])){
        $ppaymentemail=$_POST['paymentemail'];
    }
    if(isset($_POST['paymentinst'])){
        $ppaymentinst=$_POST['paymentinst'];
    }
    if(isset($_POST['paymentquantity'])){
        $ppaymentquantity=$_POST['paymentquantity'];
    }

    // ADDRESS

    if(isset($_POST['addressline1'])){
        $paddressline1=$_POST['addressline1'];
    }
    if(isset($_POST['addressline2'])){
        $paddressline2=$_POST['addressline2'];
    }
    if(isset($_POST['district'])){
        $pdistrict=$_POST['district'];
    }
    if(isset($_POST['state'])){
        $pstate=$_POST['state'];
    }
    if(isset($_POST['country'])){
        $pcountry=$_POST['country'];
    }
    if(isset($_POST['pincode'])){
        $ppincode=$_POST['pincode'];
    }

    if(isset($_POST['paymentamount'])){
        $ppaymentamount1=$_POST['paymentamount'];
        $ppaymentamount1=$ppaymentamount1+100;
        $ppaymentamount2="00";
        $ppaymentamount3=$ppaymentamount1.$ppaymentamount2;
        // echo $ppaymentamount3;
    }
// GENERATE ADDRESS

    $address=$paddressline1."," .$paddressline2."," .$pdistrict."," .$pstate."," .$pcountry."," .$ppincode;

// GENERATE ORDERID
        $today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,5));
        $orderid = $today . $rand;
        // echo $orderid;

// GENERATE ADDRESS
        $date=date("Y/m/d");
        // echo $date;


?>
<html>
    <head>
    <link rel="stylesheet" href="paymentpage.css">
    <script type="text/javascript" src="paymentpage.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

<body>
<form action="sucesspage.php" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_test_soKYbDIMNrAIuw"
    data-amount="<?php if(isset($ppaymentamount3)){echo $ppaymentamount3;} ?>" 
    data-currency="INR"
    data-buttontext="Pay with Razorpay"
    data-name="Mr.PC"
    data-description="Dream it, Belive it, Build it"
    data-image="https://example.com/your_logo.jpg"
    data-prefill.name= "<?php if(isset($ppaymentname)){echo $ppaymentname;} ?>"
    data-prefill.email="<?php if(isset($ppaymentemail)){echo $ppaymentemail;} ?>"
    data-prefill.contact= "<?php if(isset($ppaymentnumber)){echo $ppaymentnumber;} ?>"
    data-theme.color="#44d62c"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">


<!-- ALL VALUES FOR ORDER ENTRY -->

<input type="text" style="display:none;" name="orderid" value="<?php echo $orderid ?>"/>
<input type="text" style="display:none;" name="orderdate" value="<?php echo $date ?>"/>
<input type="text" style="display:none;" name="shippingaddress" value="<?php echo $address ?>"/>
<input type="text" style="display:none;" name="totalamount" value="<?php echo $ppaymentamount1 ?>"/>
<input type="text" style="display:none;" name="orderstatus" value="In Progress"/>
<input type="text" style="display:none;" name="quantity" value="<?php echo $ppaymentquantity ?>"/>



<!--  -->
</form>
</body>
</html>


<?php
}
?>