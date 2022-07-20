<?php

    include "connection_db.inc.php";
    session_start();
    if(isset($_GET['id'])){
        $pid=$_GET['id'];
        $cat=$_GET['category'];
        $uid=$_SESSION['login_id'];

        $query="SELECT id FROM login WHERE email='$uid';";
        $result = pg_query($conn,$query);

        if(pg_num_rows($result)==1)
        {
            while($row=pg_fetch_assoc($result))
                {
                    $orignalid=$row['id'];
                }
                // echo $orignalid;
        }
        else{
            header("Location: http://localhost/Website/Homepage/Products/Categories/os/Displaypage/productdisplaypage.php?Product_id=$pid");
            // echo "N Done";
            exit();
        }

        // CHECK FOR DUPLICATE PRODUCTS

        $query1="SELECT * FROM cart where user_id='$orignalid' and category='$cat' and item_id=$pid;";
        $result1=pg_query($conn,$query1);
        $no=pg_num_rows($result1);
        if(pg_num_rows($result1)>=1){
            header("Location: http://localhost/Website/Homepage/Products/Categories/os/Displaypage/productdisplaypage.php?Product_id=$pid&AlreadyAdded");
            // echo "N Done";
            exit();
            // echo $no;
        }
        else{
            $query1="INSERT INTO cart(cart_id, user_id, category, item_id) VALUES (DEFAULT,$orignalid,'$cat',$pid);";
            $result1=pg_query($conn,$query1);
            if($result1){
                header("Location: http://localhost/Website/Homepage/Products/Cartpage/cartpage.php?");
                // echo "Done";
                exit();
                // echo $no;
                }
            }

    }
    else{
        header("Location: http://localhost/Website/Homepage/Products/Categories/os/Displaypage/productdisplaypage.php?Product_id=$pid");
        // echo "N Done";
        exit();
    }


?>