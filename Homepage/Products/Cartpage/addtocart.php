<?php

include"connection_db.php";

$query="INSERT INTO cart VALUES (DEFAULT,$userid,$category,);  ";
$result = pg_query($conn,$query);


?>