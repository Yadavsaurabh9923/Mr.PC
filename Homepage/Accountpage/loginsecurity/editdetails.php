<?php

session_start();
include 'connection_db.inc.php';

if(isset($_POST['signupsubmit'])){

    $orignalusername=$_SESSION['login_id'];
    $orignalpassword=$_SESSION['password'];

    $email= $_POST['s_email'];
    $op= $_POST['s_op'];
    $np1= $_POST['s_np1'];
    $np2= $_POST['s_np2'];
    $bemail= $_POST['s_bemail'];
    $pi= $_POST['s_pi'];
    $mobile= $_POST['s_mob'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !filter_var($bemail, FILTER_VALIDATE_EMAIL)) {
                header("Location: http://localhost/Website/Homepage/Accountpage/accountpage.php?s_error=Invalid_Email_Error");
                exit();
            }
            else{
                   if(strlen($np1)<6){
                        header("Location: http://localhost/Website/Homepage/Accountpage/accountpage.php?s_error=Password_Length_Error");
                       exit();
                    }
                    else if(!preg_match("#[0-9]+#",$np1)) {
                        header("Location: http://localhost/Website/Homepage/Accountpage/accountpage.php?s_error=Password_Content_Error");
                        exit();
                    }
                    else if(!preg_match("#[A-Z]+#",$np1)) {
                        header("Location: http://localhost/Website/Homepage/Accountpage/accountpage.php?s_error=Password_Content_Error");
                        exit();
                    }
                    else if(!preg_match("#[a-z]+#",$np1)) {
                        header("Location: http://localhost/Website/Homepage/Accountpage/accountpage.php?s_error=Password_Content_Error");
                        exit();
                    }
                    else if (!preg_match("/\W/", $np1)) {
                        header("Location: http://localhost/Website/Homepage/Accountpage/accountpage.php?s_error=Password_Content_Error");
                        exit();
                    }
                    else if (preg_match("/\s/", $np1)) {
                        header("Location: http://localhost/Website/Homepage/Accountpage/accountpage.php?s_error=Password_Content_Error");
                        exit();
                    }
                    else{

                        // UPDATE QUERY
                        if(($np1==$np2) && ($op==$orignalpassword)){

                        
                        $query1="UPDATE login SET id=DEFAULT, username='$orignalusername', email='$email', password='$np1', backup_email='$bemail', personal_info='$pi', mobile='$mobile' WHERE email='$orignalusername';";
                        $result1 = pg_query($conn,$query1);
                        if($result1){
                            header("Location: http://localhost/Website/Loginpage/loginpage.php?s_error=Edited");
                            session_destroy();
                        }
                        else{
                            header("Location: http://localhost/Website/Homepage/Accountpage/accountpage.php?s_error=Fail");
                        }
                        }
                        else{
                            header("Location: http://localhost/Website/Homepage/Accountpage/accountpage.php?s_error=FailPassword");
                        }

                    }

                }
            }


else{
    header("Location: http://localhost/Website/Homepage/Accountpage/accountpage.php?UsernamessError");
}
?>