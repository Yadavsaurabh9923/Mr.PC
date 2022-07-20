<?php

include 'connectiondb.inc.php';

if(isset($_POST['signupsubmit'])){

    $username= $_POST['s_user'];
    $email= $_POST['s_mail'];
    $password= $_POST['s_pass'];

    if(strlen($username)<6 || strlen($username)>15){ 
        header("Location: loginpage.php?s_error=Username_Length_Error");                   // Username Validations
        exit();
    }             
    else if(!preg_match("/^[\w\s\.]*$/",$username)){
        header("Location: loginpage.php?s_error=Username_Content_Error");
        exit();
    }
    else{

        $query="SELECT * from login WHERE username='$username'";
        $result = pg_query($conn,$query);
        
        if(pg_num_rows($result)>0)
        {
            header("Location: loginpage.php?s_error=Existing_Username_Error");
            exit();
        }
        // --------------------------------

        else{

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: loginpage.php?s_error=Invalid_Email_Error");
                exit();
            }
            else{
        
                $query="SELECT * from login WHERE email='$email'";
                $result = pg_query($conn,$query);
        
                if(pg_num_rows($result)>0)
                {
                    header("Location: loginpage.php?s_error=Existing_Email_Error");
                    exit();
                }
                else{
                    
                    if(strlen($password)<6){
                        header("Location: loginpage.php?s_error=Password_Length_Error");
                       exit();
                    }
                    else if(!preg_match("#[0-9]+#",$password)) {
                        header("Location: loginpage.php?s_error=Password_Content_Error");
                        exit();
                    }
                    else if(!preg_match("#[A-Z]+#",$password)) {
                        header("Location: loginpage.php?s_error=Password_Content_Error");
                        exit();
                    }
                    else if(!preg_match("#[a-z]+#",$password)) {
                        header("Location: loginpage.php?s_error=Password_Content_Error");
                        exit();
                    }
                    else if (!preg_match("/\W/", $password)) {
                        header("Location: loginpage.php?s_error=Password_Content_Error");
                        exit();
                    }
                    else if (preg_match("/\s/", $password)) {
                        header("Location: loginpage.php?s_error=Password_Content_Error");
                        exit();
                    }
                    else{

                        // INSERT QUERY

                        $query1="INSERT INTO login(id,username,email,password) VALUES (DEFAULT,'$username','$email','$password');";
                        $result1 = pg_query($conn,$query1);
                        if($result1){
                            header("Location: loginpage.php?s_error=Success");
                        }
                        else{
                            header("Location: loginpage.php?s_error=Fail");
                        }

                    }

                }
            }



        }
        
    }


}
else{
    header("Location: loginpage.php?UsernamessError");
}
?>