<?php
    session_start();
?>


<?php
    $page_title = "Welcome to COVAID!"
    ?>

<?php
include_once "includes/covaid_database.php";
include ('includes/header.php');
        
    ?>

<?php 
    if(!isset($_SESSION["donation_first_name"]) || !isset($_SESSION["donation_last_name"]))
    {
        $_SESSION["donation_first_name"] = "";
        $_SESSION["donation_last_name"]= "";
    }

 if( !isset($_SESSION["error_firstname"]) || !isset($_SESSION["error_lastname"]) )
        {
            $_SESSION["error_firstname"] = "";
            $_SESSION["error_lastname"] = "";
        }

?>

<?php

if(!isset($_SESSION["emailexclusives_errorfooter"]))
{
    $_SESSION["emailexclusives_errorfooter"] = "";
}

if(isset($_POST["submit"]))
{
//  Validating donation email 
    if(empty($_POST["footer_emailexclusives"]))
    {
        $_SESSION["emailexclusives_errorfooter"]= "Empty Email";
        $form_error=true;
    }
    else
    {
        $full_email = explode("@" , $_POST["footer_emailexclusives"]);
        if(preg_match("/arash9_shafei8/" , $full_email[0] ) && preg_match("/outlook.com/" , $full_email[1]))
        {
            $_SESSION["emailexclusives_errorfooter"]= "Subscribed!";
        }
        else
        {
            $_SESSION["emailexclusives_errorfooter"]= "Bad Email";
            $form_error=true;
        }
    }
}

?>
 

<div id="discount_popup">
    <h1 style="margin-left:10px"> Requirements for Free Shipping </h1>
    <a onclick="pop()" id="discount_popup_close"><ion-icon name="close-circle-outline"></ion-icon></a>
    <p class="discount_insidetext"> For free shipping on orders over $49.99, order value must total $49.99 or more before taxes. Valid online at Covaid,Inc. For full price items, offer valid only on eligible items. Items in your cart that are not eligible are subject to shipping charges. Shipping will be automatically deducted at checkout. Offer is limited to standard delivery within Canada. Excludes bulk orders and drop ships. Entire order must ship to a single address. Does not apply to prior purchases or open orders and cannot be combined with any other offer. May not be used toward purchase of team orders. Promotion may be modified or terminated at any time. Certain restrictions and exclusions apply. </p>
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
                <a href="productpage_Disposablemask.php"><button class="slidebutton">Shop</button></a>
            </div>
        </div>
        
        <!---- Slide 2 ---->
        <div class="mySlides fade">
            <img src="images/DIYmaskSlide.jpg" width="100%" height="500px;">
            <div class="slidetext1"> 
                <p> Explore with Custom Protection Masks! </p>
                <a href="diy_mask_product_page.php"><button class="slidebutton">Shop</button></a>
            </div>
        </div>
        
        <!---- Slide 3 ---->
        <div class="mySlides fade">
        <img src="images/sanitizerSlide.jpg" width="100%" height="500px;">
        <div class="slidetext"> 
            <p> Premium Hand Sanitizer Avaiable Now! </p>
            <a href="productpage_SterilliumHandSanitizer100ml.php"><button class="slidebutton"> Shop </button></a>
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
    <h2 class="topsellers_heading0" style="text-decoration:underline"> Top Sellers </h2>
    <br />
    <br />
    <div class="topsellers_container">

    <?php 
        $sql = "SELECT* FROM products ORDER BY sales DESC limit 6;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        //Makes sure that the connection was established
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $topseller_name = $row['name'] ;
                $topseller_image = $row['image1'];
                $topseller_price = $row['price'];
                $topseller_webpage = $row['webpageLink'];
                $topseller_id = $row['id'];

                if(!isset($topseller_image) || $topseller_image == "" || $topseller_image == "NULL"){
                    $topseller_image = "image/products/noimage.jpg";
                }

                $number_reviews = 0; //Unknown
                $average_review = 0; //Unknown
                $sql1 = "SELECT COUNT(num_star) AS num_reviews FROM reviews WHERE product_id = $topseller_id;";
                $result1 = mysqli_query($conn, $sql1);
                $resultCheck1 = mysqli_num_rows($result1);
                if ($resultCheck1 > 0) {
                   $row1 = mysqli_fetch_assoc($result1);
                   $number_reviews = $row1['num_reviews'];
                }
                if ($number_reviews != 0) {
                   $sql2 = "SELECT SUM(num_star) AS star_sum FROM reviews WHERE product_id = $topseller_id;";
                   $result2 = mysqli_query($conn, $sql2);
                   $resultCheck2 = mysqli_num_rows($result2);
                   if ($resultCheck2 > 0) {
                      $row2 = mysqli_fetch_assoc($result2);
                      $sum_reviews = $row2['star_sum'];
                      $average_review = $sum_reviews / $number_reviews;
                   }
                }

                $str = <<<END
                <div class="topsellers_product">
                <img class="topsellers_pictures" src="$topseller_image" alt="Image not available">
                <a href="$topseller_webpage"><img class="topsellers_pictures2" src="images/information_button.jpg" alt="Info Button"></a>
                <br />
                <p class="topsellers_heading" style="position: relative; top: 15px;"> $topseller_name </p>
                <br />
                END;
                print $str;

                $count = 5;
                while($count > 0){
                  if($average_review >= 1){
                    echo "<img class='topsellers_stars' src='images/Icons/star-solid.svg'>";
                  }else if($average_review > 0){
                    echo "<img class='topsellers_stars' src='images/Icons/star-half-alt-solid.svg'>";
                  }else{
                    echo "<img class='topsellers_stars' src='images/Icons/star-regular.svg'>";
                  }
                  $average_review -= 1;
                  $count -= 1;
                }

                echo "<p> $topseller_price </p>";
                echo "</div> ";

            }
        }


        ?>
    </div>
          
    <!------------------ Donate Video Section --------------------->
            
    <div class="donation_container">
        <img class="donation_pic" src="images/redcross.jpg" alt="RedCrossBanner"/>
        <p class="donation_text1"> The Canadian Red Cross </p>
        <p class="donation_text2"> Help Where it Is Needed Most </p>
        <p class="donation_text3"> Your gift of any amount will save the day when the next emergency strikes. Whether that be help when a house burns down in your community, when someone needs CPR or a lifesaving blood transfusion, or when a family needs to contact a deployed service member in an emergency. Your gift supports the many urgent needs of the American Red Cross. </p>
        <form class="donation_buttons" action="DonationPage.php" method="post">
            <input class="donation_button1" type="text" name="donation_firstname" id="firstname" value="<?php echo $_SESSION["donation_first_name"] ?>" placeholder="First Name" required>
            <span style="color:red"> <?php echo $_SESSION["error_firstname"] ?></span>
            <br />
            <input class="donation_button2" type="text" name="donation_lastname" id="lastname" value="<?php echo $_SESSION["donation_last_name"] ?>" placeholder="Last Name" required>
             <span style="color:red"> <?php echo $_SESSION["error_lastname"] ?> </span>
            
            <input class="donation_button3" type="submit" name="submit" id="submit" value="Submit">
        </form>
    </div>
    
    
    
           
</main>

<?php 
    include('includes/footer.php')
    ?>

