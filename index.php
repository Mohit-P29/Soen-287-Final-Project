<?php
    session_start();
?>

<?php
include('includes/header.php')
    ?>

<?php 
    if(!isset($_SESSION["donation_first_name"]) || !isset($_SESSION["donation_last_name"]))
    {
        $_SESSION["donation_first_name"] = "";
        $_SESSION["donation_last_name"]= "";
    }

?>

<div id="discount_popup">
        <h1 style="margin-left:10px"> Requirements for Free Shipping </h1>
        <a onclick="pop()" id="discount_popup_close"><ion-icon name="close-circle-outline"></ion-icon></a>
    </div>

<main id="discount_body_opacity1">
    <div class="discount_container"> 
        <a class="discount_text" onclick="pop()"> Free Shipping on Orders $49.99+  </a>
    </div>
    
    <!---------------- Slideshow ------------------->
    <div class="slideshow_container">
        
        <!---- Slide 1 ---->
        <div class="mySlides fade">
            <img src="images/maskSlide.jpg" width="100%" height="500px;">
            <div class="slidetext"> 
                <p> Get Your Protection Masks Now!</p>
                <button class="slidebutton">Shop</button>
            </div>
        </div>
        
        <!---- Slide 2 ---->
        <div class="mySlides fade">
            <img src="images/DIYmaskSlide.jpg" width="100%" height="500px;">
            <div class="slidetext1"> 
                <p> Explore with Custom Protection Masks! </p>
                <button class="slidebutton">Shop</button>
            </div>
        </div>
        
        <!---- Slide 3 ---->
        <div class="mySlides fade">
        <img src="images/sanitizerSlide.jpg" width="100%" height="500px;">
        <div class="slidetext"> 
            <p> Premium Hand Sanitizer Avaiable Now! </p>
            <button class="slidebutton"> Shop </button>
            </div>
        </div>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
    </div>
    <script type="text/javascript" src="js/homepage_slideshow.js"></script>

    <!------------------ Top Sellers Section ----------------->
    
    <br />
    <br />
    <h2 class="topsellers_heading" style="text-decoration:underline"> Top Sellers </h2>
    <br />
    <br />
    <div class="topsellers_container"> 
        
        <!---- Product 1 ----->
        <div class="topsellers_product">
            <div class="topsellers_front">
            <img class="topsellers_pictures" src="images/mask.jpg" alt="Mask">
            <a href="#"><img class="topsellers_pictures2" src="images/information_button.jpg" alt="Info Button"></a>
            </div>
        </div>
        
        <!---- Product 2 ----->
        <div class="topsellers_product">
            <img class="topsellers_pictures" src="images/purell.jpg" alt="Mask">
            <img class="topsellers_pictures2" src="images/information_button.jpg" alt="Info Button">
            <a href="#"><img class="topsellers_pictures2" src="images/information_button.jpg" alt="Info Button"></a>
        </div>
        
        <!---- Product 3 ----->
        <div class="topsellers_product">
            <img class="topsellers_pictures" src="images/faceshield.jpg" alt="Mask">
            <img class="topsellers_pictures2" src="images/information_button.jpg" alt="Info Button">
            <a href="#"><img class="topsellers_pictures2" src="images/information_button.jpg" alt="Info Button"></a>
        </div>
        
        <!---- Product 4 ----->
        <div class="topsellers_product">
            <img class="topsellers_pictures" src="images/handsanitizerMINI.jpg" alt="Mask">
            <img class="topsellers_pictures2" src="images/information_button.jpg" alt="Info Button">
            <a href="#"><img class="topsellers_pictures2" src="images/information_button.jpg" alt="Info Button"></a>
        </div>
        
        <!---- Product 5 ----->
        <div class="topsellers_product">
            <img class="topsellers_pictures" src="images/lysol.jpg" alt="Mask">
            <img class="topsellers_pictures2" src="images/information_button.jpg" alt="Info Button">
            <a href="#"><img class="topsellers_pictures2" src="images/information_button.jpg" alt="Info Button"></a>
        </div>
        
        <!---- Product 6 ----->
        <div class="topsellers_product">
            <img class="topsellers_pictures" src="images/lysolspray.jpg" alt="Mask">
            <img class="topsellers_pictures2" src="images/information_button.jpg" alt="Info Button">
            <a href="#"><img class="topsellers_pictures2" src="images/information_button.jpg" alt="Info Button"></a>
        </div>
    </div>
          
    <!------------------ Donate Video Section --------------------->
            
    <div class="donation_container">
        <img class="donation_pic" src="images/redcross.jpg" alt="RedCrossBanner"/>
        <p class="donation_text1"> The Canadian Red Cross </p>
        <p class="donation_text2"> Help Where it Is Needed Most </p>
        <p class="donation_text3"> Your gift of any amount will save the day when the next emergency strikes. Whether that be help when a house burns down in your community, when someone needs CPR or a lifesaving blood transfusion, or when a family needs to contact a deployed service member in an emergency. Your gift supports the many urgent needs of the American Red Cross. </p>
        <form class="donation_buttons" action="DonationPage.php" method="post">
            <input class="donation_button1" type="text" name="donation_firstname" id="firstname" value="<?php echo $_SESSION["donation_first_name"] ?>" placeholder="First Name" required>
            <input class="donation_button2" type="text" name="donation_lastname" id="lastname" value="<?php echo $_SESSION["donation_last_name"] ?>" placeholder="Last Name" required>
            <input class="donation_button3" type="submit" name="submit" id="submit" value="Submit">
        </form>
    </div>
    
    
    
           
</main>

<?php 
    include('includes/footer.php')
    ?>

