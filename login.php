<?php
session_start();
$page_title = "Sign in";
include("includes/header.php");
include("includes/ConnectDB.php");
$_SESSION['login']=(isset($_SESSION['login']))?$_SESSION['login']:'false';
$_SESSION['user_id']=(isset($_SESSION['user_id']))?$_SESSION['user_id']:'No email shown';

?>

<link rel="stylesheet" type="text/css" href="css/login.css" />

<div class="flip-card-3D-wrapper">
    <div id="flip-card">
        <div class="container_signin">
            <h1 class="signin">Login</h1>
            <form action="" method="post">
            <div class="container_user_credentials">
                <img src="image/email_icon.JPG" alt="email_icon" width="25px" height="15px" />
                <input class="user_credentials" type="email" name="email" id="email" placeholder="E-mail" /><br /><br />

                <img src="image/password_icon.JPG" alt="password_icon" width="25px" height="15px" />
                <input class="user_credentials" type="password" name="password" id="password" placeholder="Password" /><br />

                <p id="forgotpw" href="#">Forgot password?</p>
            </div>

            <div class="submission">
                <input class="login_text" type="submit" value="Login" name="login"/><br /><br />
            </div>
            </form>

            <button id="signup">Sign Up</button>
        </div>

        <div class="countainer_signup">
            <h1 class="signup">Register</h1>
            <form onsubmit="return submitSignup(event);" method="post" action="" id='form'>
                <div class="container_user_credentials_signup">
                    <img src="image/email_icon.JPG" alt="email_icon" width="25px" height="15px" />
                    <input class="user_credentials_signup" type="email" name="email_signup" id="email_signup" placeholder="E-mail" /><br /><br />

                    <img src="image/password_icon.JPG" alt="password_icon" width="25px" height="15px" />
                    <input class="user_credentials_signup" type="password" name="password_signup" id="password_signup" placeholder="Password" /><br />

                    <img src="image/passcheck_icon.JPG" alt="passcheck_icon" width="25px" height="20px" />
                    <input class="user_credentials_signup" type="password" name="recheck_password_signup" id="recheck_password_signup" placeholder="Re-enter Password" /><br />

                    <label id="notification2" style="display: inline-block;">
                        <input type="checkbox" id="termPrivacy" />By check this, you agree to our
                    </label>
                    <span class="checkterm" id="checkterm"> Terms &amp; Privacy</span>
                </div>
                <p id="validation1"></p>
                <p id="validation2"></p>
                <p id="validation3"></p>
                <p id="validation4"></p>


                <div class="submission_signup">
                    <input class="login_text" type="submit" name='signup' id='register' value="Register" /><br /><br />
                </div>
                
            </form>
           
            
        


            <button id="signin">Sign In</button>

        </div>
    </div>
</div>

<!-- Popup window for reset password -->
<div class="popup" id="popup-1">
    <div class="overlay"></div>
    <div class="content" id="popup_box">
        <div id="close-btn1">&times;</div>
        <h1>Reset password</h1>
        <p class="popup_resetpw_desc">Please enter your email</p><br />
        <input type="text" id="popup_email_input" placeholder="Enter your E-mail" />
        <br /><br /><br />
        <button id="popup_button1">Reset Password</button>
    </div>
</div>

<!-- Popup window terms and privacy -->
<div class="popup" id="popup-2">
    <div class="overlay"></div>
    <div class="content" id="popup_box">
        <div id="close-btn2">&times;</div>
        <h1>Terms &amp; Privacy</h1>
        <p class="popup_tANDp_desc">
            <embed src="text/termandprivacy.txt">
        </p><br /><br /><br /><br />
        <button id="popup_button2">I agree</button>
    </div>
</div>

<!-- Popup window for successful sending email-->
<div class="popup" id="popup-3">
    <div class="overlay"></div>
    <div class="content" id="popup_box">
        <div id="close-btn3">&times;</div>
        <h1>Successful!</h1>
        <p id="popup_successRest_desc"></p><br /><br /><br /><br />
    </div>
</div>

 <?php 
                 
    
            if(isset($_POST['signup'])){
                    $email=(isset($_POST['email_signup']))?$_POST['email_signup']:'';
                    $pass=(isset($_POST['password_signup']))?$_POST['password_signup']:''; 
                    $check='valid';
                    $_SESSION['user_id']=$email;
                    $_SESSION['password']=$pass;
                    $sql = "SELECT * FROM user_info";
                    $retval = mysqli_query( $conn,$sql);
                    if(! $retval ) {
                      die('Could not get data: ' . mysqli_error());
                    }
                    $result=mysqli_num_rows($retval);
                   if($result>0){
                
                   while ( $row = mysqli_fetch_assoc($retval)){
                    if ($row['user_id']===$email){
                        $check='invalid';
                      }
                     }
                  }
                  if($check==='invalid'){ ?>


                <script>
                       alert("The email address exists!");
                       window.reload();
                </script>
                
                
                
                
                <?php
                                        
                                        
                                        }
                else{
                    $_SESSION['user_id']=$email;
                    $_SESSION['login']='true';
                    $sql = "INSERT INTO user_info (user_id,password,user_first,user_last,user_email1,user_email2,phone1,phone2) VALUES ('$email', '$pass', '', '', '$email', '','','')";
                    mysqli_query($conn,$sql);
                    $sql = "INSERT INTO useraddress (first,last,company,address,address2,city,country,province,post,phone,user_id) VALUES ('', '', '', '', '', '','','','','','$email')";
                    mysqli_query($conn,$sql);
                     $sql = "INSERT INTO payment (user_id) VALUES ('$email')";
                      mysqli_query($conn,$sql);
                     $sql = "INSERT INTO profile (user_name, user_id) VALUES ('No name yet','$email')";
                      mysqli_query($conn,$sql);
                     $conn->close(); 
                     include_once("includes/Mailer_login/mailerTemplate.php");
                      
                   ?>

                   <script> 
                       alert("Successful Registration!");
                       document.getElementById('form').onsubmit=function(){
                             return true;
                    } 
                       window.location.href='UserPage.php';</script>
   
              <?php
                }
            }

             elseif(isset($_POST['login'])){

                 $user=(isset($_POST['email']))?$_POST['email']:'';
                 $pass=(isset($_POST['password']))?$_POST['password']:'';
                 $check='invalid';
                   $sql = "SELECT * FROM user_info";
                    $retval = mysqli_query( $conn,$sql);
                    if(! $retval ) {
                      die('Could not get data: ' . mysqli_error());
                    }
                    $result=mysqli_num_rows($retval);
                    if($user==='Admin@domain.com' && $pass==='123456'){
                            $check='admin';
                    
                    }
                    else if($result>0){
                
                      while ( $row = mysqli_fetch_assoc($retval)){
                        if ($row['user_id']===$user && $row['password']===$pass && $row['user_id']!=='Admin@domain.com'){
                              $check="valid";
                        }
                     }
                  }
                 if($check==='admin'){
                     $_SESSION['login']='admin'; ?>

                      <script>alert("Successful Sign In!"); window.location.href='admin_products.php';</script>

            <?php }
                 
                 elseif($check=='valid'){ 
                     $_SESSION['login']='true';
                     $_SESSION['user_id']=$user;  ?>

                     <script>alert("Successful Sign In!"); window.location.href='UserPage.php';</script>
                 
           <?php  
                 } else{ ?>
                   <script>alert("User email and password don't match!"); 
                      } </script>
                     
           <?php  }
            
             }
                
         ?> 

<script type="text/javascript">



</script>


<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
<script src="js/login.js"></script>
