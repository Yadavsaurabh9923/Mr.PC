<?php

    include "connection_db.inc.php";

    $id=$_GET['id'];
    $cat=$_GET['cat'];
    $pn=$_GET['pn'];
    $uid=$_GET['uid'];


    $query="SELECT id FROM login WHERE email='$uid';";
    $result=pg_query($conn,$query);

    if(pg_num_rows($result)==1){
        $row=pg_fetch_assoc($result);
        $userid = $row['id'];

        $query="SELECT * FROM wishlist WHERE wuserid='$userid' AND wpid=$id AND wpcategory='$cat';";
        $result=pg_query($conn,$query);

        if(pg_num_rows($result)==0){
            
            $query="INSERT INTO wishlist(wid, wpid, wpcategory, wuserid, wpname) VALUES (DEFAULT,$id,'$cat',$userid,'$pn');";
            $result=pg_query($conn,$query);

            if($result){
                header("Location:http://localhost/Website/Homepage/Accountpage/accountpage.php");
            }
        }
        else{
            header("Location:http://localhost/Website/Homepage/Products/Categories/Harddrives/Displaypage/productdisplaypage.php?Product_id=$id&error=AlreadyAdded");
        }
    }

?>