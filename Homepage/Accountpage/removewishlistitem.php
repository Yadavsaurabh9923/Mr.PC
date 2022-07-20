<?php

    $pid=$_GET['pidvalue'];
    include "connection_db.inc.php";

    $query="DELETE FROM wishlist WHERE wpid=$pid;";
    $result=pg_query($conn,$query);

    if($result){
        header("Location:http://localhost/Website/Homepage/Accountpage/accountpage.php?Success");
    }
    else{
        header("Location:http://localhost/Website/Homepage/Accountpage/accountpage.php?Failed");
    }

?>