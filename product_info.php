<?php

include_once 'includes/covaid_database.php';

//Retrieve product information
$product_name;
$product_description;
$product_price;
$product_specialPrice;

$sql = "SELECT * FROM products WHERE id = $product_id;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

//Makes sure that the connection was established
if ($resultCheck > 0) {
    $row = mysqli_fetch_assoc($result);
    $product_name = $row['name'];
    $product_description = $row['description'];
    $product_price = $row['price'];
    $product_specialPrice = $row['specialPrice'];
}

//Header
$page_title = $product_name;
include("includes/header.php");
?>

<!-- Content of product page -->

<link rel="stylesheet" href="css/review.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
  
    <!----single products-->
    <div class="indiProduct">
      <div class="defaultRow">
        <div class="caption">


        <!-- Main Image goes here -->
          <img ID="p5" src="images/Product Images/product5.jpg">
          <div class="complementary-images">
            <div class="sub-image">
            <!-- SubImages go here -->
              <img class="comp-image" src="images/Product Images/product5a.png">
            </div>
            <div class="sub-image">
              <img class="comp-image" src="images/Product Images/product5b.png">
            </div>
            <div class="sub-image">
              <img class="comp-image" src="images/Product Images/product5c.png">
            </div>
            <div class="sub-image">
              <img class="comp-image" src="images/Product Images/product5d.png">
            </div>
          </div>
        </div>
         <!-- SubImages end here -->

        <div class="caption">
          <h1> <?php echo $product_name; ?> </h1>
          <h4><?php
            if ($product_specialPrice == null) {
                echo $product_price; 
            } else {
                echo "<span style='color: red;'>\$$product_specialPrice </span>" . " <strike>\$$product_price</strike> ";
            }
            
        ?></h4>
          
            <input type="number" value="1" style="width:44px;" min="1">
            <a href="" class="button"> Add item to cart</a>
            <h3>Product Information</h3>
            <br>
             <!-- description goes here -->
            <p><?php echo $product_description; ?>
            </p>
       
        </div>
        
        <div class="rating_score" style="margin-left:250px;
                                        margin-top:-100px;">
        <span class="rating_heading"><strong>Customer Rating:</strong></span>

<div class="rev_rating">
    <img src="images/Icons/star-solid.svg">
    <img src="images/Icons/star-solid.svg">
    <img src="images/Icons/star-solid.svg">
    <img src="images/Icons/star-solid.svg">
    <img src="images/Icons/star-solid.svg">
  </div>
</br>
<p >4.7 rating based on 0 reviews.</p>
</div>


      </div>
    </div>
    <!-- Review section goes here -->
    <div class="review_section">
      <div class="rev">
        <h1>Reviews</h1>
        <div class="border"></div>

        <div class="review-horiz">
          <div class="review-vertical">
            <div class="review-sec">
              <div class="name">David</div>
              <div class="rev_rating">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-regular.svg">
            <img src="images/Icons/star-regular.svg">
              </div>

              <p>
              review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  
              </p>
            </div>
          </div>

          <div class="review-vertical">
            <div class="review-sec">
              
              <div class="name">John</div>
              <div class="rev_rating">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
              </div>

              <p>
              review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  
              </p>
            </div>
          </div>

          <div class="review-vertical">
            <div class="review-sec">
              
              <div class="name">Emily</div>
              <div class="rev_rating">
                <img src="images/Icons/star-solid.svg">
                <img src="images/Icons/star-solid.svg">
                <img src="images/Icons/star-solid.svg">
                <img src="images/Icons/star-regular.svg">
                <img src="images/Icons/star-regular.svg">
              </div>

              <p>
              review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  
              </p>
            </div>
          </div>
          <div class="review-vertical">
            <div class="review-sec">
              <div class="name">Mike</div>
              <div class="rev_rating">
                <img src="images/Icons/star-solid.svg">
                <img src="images/Icons/star-solid.svg">
                <img src="images/Icons/star-solid.svg">
                <img src="images/Icons/star-solid.svg">
                <img src="images/Icons/star-solid.svg">
              </div>

              <p>
              review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  review  
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

        
    <div class="leave_review" style="
margin:80px
;
">
      <h2>Please leave your review below</h2>
      <input type="text" name="cus_review" placeholder="Please leave your review below"
      style="Width:800px; Height:100px; 
      text-align: left;
      padding-left: 20px;
      font-size: 15px ;

      border: 2px solid  #8db600; 
      border-radius: 10px; ">

</div>


    <div class="submenu">
      <div class="productRow">


      <!-- Suggested/Related items begin here -->


        <h2>Related Items</h2>
        <p><a href ="General_Products.php" > Find more </a> </p>
      </div>
    </div>
    <div class= "submenu">
      <div class="defaultRow">
        <div class="single-products">
          <img src="images/Product Images/Product1.jpg">
          <h4>Hand Sanitizer 500 ml</h4>
          <div class="rating">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
          </div>
          <p>$10.50</p>
        </div>
        <div class="single-products">
          <img src="images/Product Images/Product2.jpg">
          <h4>AiroDoctor Air Purifier</h4>
          <div class="rating">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-half-alt-solid.svg">
          </div>
          <p>$299.00</p>
        </div>
        <div class="single-products">
          <img src="images/Product Images/Product3.jpg">
          <h4>KIMTECH SCIENCE Precision Wipes</h4>
          <div class="rating">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-regular.svg">
            <img src="images/Icons/star-regular.svg">
          </div>
          <p>$2.99</p>
        </div>
        <div class="single-products">
          <img src="images/Product Images/Product4.jpg">
          <h4>Surgical Masks </h4>
          <div class="rating">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
          </div>
          <p>$20.00</p>
        </div>
      </div>
    </div>
    <!-- Suggested/Related items end here -->


    <!----footer-->
    <?php
    include("includes/footer.php");
    ?>
    <script> 
      var mainImage = document.getElementById("p5") ;
      var subImage = document.getElementsByClassName("comp-image");
      
      
      subImage[0].onclick =function(){
        mainImage.src = subImage[0].src;
        
      }
      subImage[1].onclick =function(){
        mainImage.src = subImage[1].src;
        
      }
      subImage[2].onclick =function(){
        mainImage.src = subImage[2].src;
        
      }
      subImage[3].onclick =function(){
        mainImage.src = subImage[3].src;
        
      }
      
      
      
        
    </script>
  </body>
</html>