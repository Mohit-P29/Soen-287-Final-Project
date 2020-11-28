<?php
$page_title = "Sign in";
include("includes/header.php");
?>

<link rel="stylesheet" type="text/css" href="css/login.css" />

<div class="flip-card-3D-wrapper">
    <div id="flip-card">
        <div class="container_signin">
            <h1 class="signin">Login</h1>
            <div class="container_user_credentials">
                <img src="image/email_icon.JPG" alt="email_icon" width="25px" height="15px" />
                <input class="user_credentials" type="email" name="email" id="email" placeholder="E-mail" /><br /><br />

                <img src="image/password_icon.JPG" alt="password_icon" width="25px" height="15px" />
                <input class="user_credentials" type="password" name="password" id="password" placeholder="Password" /><br />

                <p id="forgotpw" href="#">Forgot password?</p>
            </div>

            <div class="submission">
                <input class="login_text" type="submit" value="Login" onclick="verifCred()" /><br /><br />
            </div>

            <button id="signup">Sign Up</button>
        </div>

        <div class="countainer_signup">
            <h1 class="signup">Register</h1>
            <form onsubmit="return submitSignup(event);">
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
                    <input class="login_text" type="submit" value="Register" /><br /><br />
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
        <h1>Terms & Privacy</h1>
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




<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
<script src="js/login.js"></script>

</body>
</html>