<?php 

session_start();
include 'connection_db.inc.php';
    if(isset($_POST['signupsubmit1'])){
        $add1=$_POST['addressline1'];
        $add2=$_POST['addressline1'];
        $dist=$_POST['district'];
        $state=$_POST['state'];
        $country=$_POST['country'];
        $pcode=$_POST['pincode'];
        $orignalusername=$_SESSION['login_id'];
        
        if($_POST['address']=="one"){
            $query="UPDATE login SET haddressline1='$add1',haddressline2='$add2', hdistrict='$dist', hstate='$state', hcountry='$country', hpincode='$pcode' WHERE email='$orignalusername';";
            $result1 = pg_query($conn,$query);
            if($result1){
                header("Location: http://localhost/Website/Homepage/Accountpage/accountpage.php?s_error=Editedone");
            }
        }
        else{
            $query="UPDATE login SET oaddressline1='$add1',oaddressline2='$add2', odistrict='$dist', ostate='$state', ocountry='$country', opincode='$pcode' WHERE email='$orignalusername';";
            $result1 = pg_query($conn,$query);
            if($result1){
                header("Location: http://localhost/Website/Homepage/Accountpage/accountpage.php?s_error=Editedtwo");
            }

        }
    }

?>