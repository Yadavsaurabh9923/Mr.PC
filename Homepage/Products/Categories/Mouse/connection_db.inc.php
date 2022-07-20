<?php

    $servername="localhost";
    $dbusername="postgres";
    $dbpassword="root";
    $dbname="MrPc";
    
    $conn= pg_connect("host=$servername dbname=$dbname user=$dbusername password=$dbpassword");
    
    if(!$conn)
    {
        die("Connection Failed");
    }


?>