<?php


include 'connection_db.inc.php';


if(isset($_POST['username'])){
    
    $username=$_POST['username'];

    if(strlen($username)<6 || strlen($username)>15){                    // Username Validations
        echo "Number of characters must be between 6 to 15!";
    }             
    else if(!preg_match("/^[\w\s\.]*$/",$username)){
        echo "Should only contain alphanumeric characters, underscore and dot!";
    }
    else if(strlen($username)>5){

        $query="SELECT * from login WHERE username='$username'";
        $result = pg_query($conn,$query);
        

        if(pg_num_rows($result)>0)
        {
            echo "USERNAME ALREADY TAKEN !";
        }
        
    }
}

if(isset($_POST['email'])){
    
    $email=$_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
    }
    else if(strlen($email)>8){

        $query="SELECT * from login WHERE email='$email'";
        $result = pg_query($conn,$query);

        if(pg_num_rows($result)>0)
        {
            echo "EMAIL ALREADY TAKEN !";
        }
    }
}

if(isset($_POST['password'])){
    
    $password=$_POST['password'];

    if(strlen($password)<6){
        echo "Password should be atleast 6 characters!";
    }
    else if(!preg_match("#[0-9]+#",$password)) {
        echo "Your Password Must Contain At Least 1 Number!";
    }
    else if(!preg_match("#[A-Z]+#",$password)) {
        echo "Your Password Must Contain At Least 1 Uppercase Letter!";
    }
    else if(!preg_match("#[a-z]+#",$password)) {
        echo "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
    else if (!preg_match("/\W/", $password)) {
       echo "Password should contain at least one special character";
    }
    else if (preg_match("/\s/", $password)) {
       echo "Password should not contain any white space";
    }
}

?>

