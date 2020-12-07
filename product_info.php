<?php
   include_once 'includes/covaid_database.php';
   
   //Retrieve product information
   $product_name;
   $product_description;
   $product_price;
   $product_specialPrice;
   $product_id=68;
   
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
       $product_image1=$row["image1"];
   }
   
   //Header
   $page_title = $product_name;
   include("includes/header.php");
   ?>
<!-- Content of product page -->
<link rel="stylesheet" href="css/review.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
         <form action="" method="post">
            <input name="mask_quantity" type="number" value="1" style="width:44px;" min="1">
            <input type="submit" name="submit" class="button" value="Add items to cart" style="width: 130px">
         </form>
         <h3>Product Information</h3>
         <br>
         <!-- description goes here -->
         <p><?php echo $product_description; ?>
         </p>
      </div>
      <div class="rating_score" style="margin-left:250px;
         margin-top:-200px;">
         <span class="rating_heading"><strong>Customer Rating:</strong></span>
         <div class="rev_rating">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
         </div>
         </br> 
         <p>  4.7 rating based on 0 reviews.</p>
      </div>
   </div>
</div>
          </br></br>
<!-- Old Review starts here -->
<div class="review_section">
      <div class="rev">
        <h1>Customer Reviews</h1>
        <div class="border">
        </div>
        </div>
        </div>
<div class="old-reviews">
    <h3>User Name</h3>
        <div class="rating">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-half-alt-solid.svg">
          </div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien tortor, viverra sed semper sit amet, ultricies id erat. Phasellus viverra ex id pellentesque tincidunt. Fusce posuere ex at vehicula suscipit. Donec vitae tincidunt lectus. Mauris nisi ante, rhoncus sit amet elit elementum, egestas sodales nuncm</p>
      
      <div class="admin-response">
         <h3>
         Admin's response</h3>
         <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien tortor, viverra sed semper sit amet, ultricies id erat.</p>
         </div>
         <h3>User Name</h3>
        <div class="rating">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-half-alt-solid.svg">
          </div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien tortor, viverra sed semper sit amet, ultricies id erat. Phasellus viverra ex id pellentesque tincidunt. Fusce posuere ex at vehicula suscipit. Donec vitae tincidunt lectus. Mauris nisi ante, rhoncus sit amet elit elementum, egestas sodales nuncm</p>
      
      <div class="admin-response">
         <h3>
         Admin's response</h3>
         <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien tortor, viverra sed semper sit amet, ultricies id erat.</p>
         </div>
         <h3>User Name</h3>
        <div class="rating">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-half-alt-solid.svg">
          </div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien tortor, viverra sed semper sit amet, ultricies id erat. Phasellus viverra ex id pellentesque tincidunt. Fusce posuere ex at vehicula suscipit. Donec vitae tincidunt lectus. Mauris nisi ante, rhoncus sit amet elit elementum, egestas sodales nuncm</p>
      
      <div class="admin-response">
         <h3>
         Admin's response</h3>
         <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien tortor, viverra sed semper sit amet, ultricies id erat.</p>
         </div>
 </div>
<!-- Old Review end here -->



<!-- Create Reviews start here -->
<div class="leave-review" style="
   margin-left:160px;">
   <div class="custom-review">
     <form action="">
       <h2> Write a customer review</h2>
       </br>
     
       <label for="username-part">Name:</label>
       <br>
      <input type="text" class="username-part" id="username-part">
       
      <label for="star-1" >  Rate this product</label>
      <div class="star-rating">
         <input type="radio" name="star" id="star-1" />
         <label for="star-1" ></label>
         <input type="radio" name="star" id="star-2" />
         <label for="star-2" ></label>
         <input type="radio" name="star" id="star-3" />
         <label for="star-3" ></label>
         <input type="radio" name="star" id="star-4" />
         <label for="star-4" ></label>
         <input type="radio" name="star" id="star-5" />
         <label for="star-5" ></label>
      </div>
      
      <h2 style="margin-top:30px;">Please leave your review below</h2>
      <br>
      <textarea type="text" name="cus_review" placeholder="Your review " class="review-part"></textarea>
          </br></br>
         <input id="submit-review" type="submit" value="submit review">
          </form>
   </div>
</div>
<!-- Create Reviews end here -->
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
   //footer
   include("includes/footer.php");
   
   if(isset($_POST["submit"])){
     
     $product_Qty=$_POST["mask_quantity"];
   
     $sql="SELECT * FROM cart WHERE id=$product_id";
     $result = mysqli_query($conn, $sql);
     $resultCheck = mysqli_num_rows($result);
   
     if ($product_specialPrice != null) {
         $product_price=$product_specialPrice;
     } 
   
     //Check if this product is already in cart
     if ($resultCheck > 0) {
   
         $row = mysqli_fetch_assoc($result);
   
         //update quantity
         $oldQty=$row["quantity"];
         echo"<script>console.log('".$oldQty."');</script>";
         echo"<script>console.log('".$product_Qty."');</script>";
         $product_Qty=$oldQty+$product_Qty;
   
         $sql="UPDATE cart SET quantity='$product_Qty' WHERE id='$product_id'";
         mysqli_query($conn, $sql);
   
     }
   
     //If it's not in the cart
     else{
         $sql = "INSERT INTO cart (id, productName, quantity, price, image) 
             VALUES('$product_id', '$product_name', '$product_Qty', '$product_price','$product_image1');";
             mysqli_query($conn, $sql);
     }
   
   }
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