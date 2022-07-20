<?php
    
    include "connection_db.inc.php";

    if(isset($_GET['id'])){
        $did=$_GET['id'];
        
        $query="DELETE FROM wishlist WHERE wuserid=$did;";
        $result=pg_query($conn,$query);

        if($result){
            
            $query="DELETE FROM orders WHERE user_id=$did;";
            $result=pg_query($conn,$query);
    
            if($result){
                $query="DELETE FROM cart WHERE user_id=$did;";
                $result=pg_query($conn,$query);
        
                if($result){
                    
                    $query="DELETE FROM login WHERE id=$did;";
                    $result=pg_query($conn,$query);
            
                    if($result){
                        header("Location:  http://localhost/Website/Loginpage/loginpage.php?s_error=Deleted");
                    }
                }
                
            }
        }



    }

?>