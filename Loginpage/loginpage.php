<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JQUERY CODE -->
    <!-- USERNAME VALIDATION -->
    <script>
      $(document).ready(function(){
        $("#s_username").keyup(function(){
          $.ajax({

            url: 'validationpage.php',
            type: 'post',
            data: {s_username: $(this).val()},
            success: function(result){
              $("#result").html(result);
            }

          });
        });

      });
    </script>

    <!-- EMAIL VALIDATION -->

    <script>
        $(document).ready(function(){
          $("#s_email").keyup(function(){
            $.ajax({

              url: 'validationpage.php',
              type: 'post',
              data: {s_email: $(this).val()},
              success: function(result){
                $("#result").html(result);
              }

            });
          });

        });
    </script>

    <!-- PASSWORD VALIDATION -->

    <script>
        $(document).ready(function(){
          $("#s_password").keyup(function(){
            $.ajax({

              url: 'validationpage.php',
              type: 'post',
              data: {s_password: $(this).val()},
              success: function(result){
                $("#result").html(result);
              }

            });
          });

        });
    </script>


    <link rel="stylesheet" href="loginpage.css" />
    <title>Mr. PC : Login & Sign up Page</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="logindb.php" method="POST" class="sign-in-form" >
            <h2 class="title">LOG IN</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username or Email" name="l_user" id="l_username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="l_pass" id="l_password"/>
            </div>
            <input type="submit" value="Login" name="loginsubmit" class="btn solid" />
            <p class="social-text">Or Visit our social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
              <i class="fab fa-instagram"></i>
              </a>
            </div>
            <span id="result1" class="warning">
            <?php

            if(isset($_GET['s_error']))
            {
              if($_GET['s_error']=="Success")
              {
                echo "Signup Sucessful";
              }
              else if($_GET['s_error']=="Edited")
              {
                echo "Changes Successful";
              }
              else if($_GET['s_error']=="Fail")
              {
                echo "Connection Error !";
              }
              else if($_GET['s_error']=="Logout")
              {
                echo "Logout Sucessful !";
              }
              else if($_GET['s_error']=="Deleted")
              {
                echo "Account Deleted Sucessfully !";
              }
              else{
                echo "Invalid Signup Details !";
              }

            }

            if(isset($_GET['error']))
            {
              if($_GET['error']=="Invaliduserpass")
              {
                echo "Invalid Username or Password";
              }

            }

          
            ?>
            </span>
          </form>
          
          <form class="sign-up-form" action="signupdb.php" method="POST">
            <h2 class="title">SIGN UP</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="s_user" id="s_username" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="s_mail" id="s_email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="s_pass" id="s_password" required/>
            </div>
            <input type="submit" class="btn" name="signupsubmit"/>

            <p class="social-text">Or Visit our social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
              <i class="fab fa-instagram"></i>
              </a>
            </div>
            <span id="result" class="warning"></span>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Let's <b>BUILD</b> the <b>CHANGE</b> we wish to see !
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/video-game.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              <b>DREAM IT.&nbspBELIEVE IT. &nbspBUILD IT.</b>
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Log In
            </button>
          </div>
          <img src="img/computer.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="loginpage.js"></script>
  </body>
</html>
