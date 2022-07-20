<?php 
    include "connection_db.inc.php";

    $uid=$_GET['userid'];
    $iid=$_GET['itemid'];
    
    $query="DELETE FROM cart WHERE user_id='$uid' AND item_id='$iid' ";
    $result=pg_query($conn,$query);

    if($result){
        header("Location: http://localhost/Website/Homepage/Products/Cartpage/cartpage.php?Success");
    }
    else{
        header("Location: http://localhost/Website/Homepage/Products/Cartpage/cartpage.php?Failed");
    }


?>