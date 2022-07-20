<?php

session_start();
include 'connectiondb.inc.php';

if(isset($_POST['loginsubmit'])){

    

    $username= $_POST['l_user'];
    $password= $_POST['l_pass'];

    $query="SELECT * from login WHERE username='$username' or email='$username' and password='$password'";
    $result = pg_query($conn,$query);

    if(pg_num_rows($result)==1)
    {
        $_SESSION['login_id']=$username;
        $_SESSION['password']=$password;

        header("Location: http://localhost/Website/Homepage/homepage.php");
        exit();
    }
    else
    {
        header("Location: loginpage.php?error=Invaliduserpass");
        exit();
    }
}

?>