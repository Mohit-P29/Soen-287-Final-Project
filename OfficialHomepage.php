<?php
include('header.php')
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
            
           
</main>

<?php 
    include('footer.php')
    ?>

