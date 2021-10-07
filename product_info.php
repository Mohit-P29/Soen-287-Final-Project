<?php
  include_once 'includes/covaid_database.php';

//Retrieve product information
$product_name;
$product_description;
$product_price;
$product_specialPrice;
$product_image1;
$product_image2;
$product_image3;
$product_image4;
$product_image5;

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
    $product_image2=$row["image2"];
    $product_image3=$row["image3"];
    $product_image4=$row["image4"];
    $product_image5=$row["image5"];
}

if(!isset($product_image1)){
  $product_image1 = "image/products/noimage.jpg";
}
if(!isset($product_image2)){
 $product_image2 = "image/products/noimage.jpg";
}
if(!isset($product_image3)){
 $product_image3 = "image/products/noimage.jpg";
}
if(!isset($product_image4)){
 $product_image4 = "image/products/noimage.jpg";
}
if(!isset($product_image5)){
 $product_image5 = "image/products/noimage.jpg";
}

  if(!isset($_POST['submit'])){
    
  }else if( $_POST['submit'] == 'submit review' ){
    $newUser = $_POST['newUser'];
    $star = $_POST['star'];
    $userReview = $_POST['cus_review'];
    if($newUser == ""){
      $newUser = 'Anonymous';
    }
    if($userReview == ""){
      $userReview = 'NULL';
    }


    date_default_timezone_set('America/Montreal');
    $created = date("Y/m/d h:i:s");

    $sql = "INSERT INTO reviews (product_id, num_star, username, user_review, review_date) 
            VALUES('$product_id', '$star', '$newUser', '$userReview', '$created');";
    mysqli_query($conn, $sql);

    //Cart item
   }else if($_POST["submit"] == 'Add items to cart'){
     
    $product_Qty=$_POST["mask_quantity"];
  
    $sql="SELECT * FROM cart WHERE id=$product_id";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
  
  
  
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

         if ($product_specialPrice != null) {

               $sql = "INSERT INTO cart (id, productName, quantity, price, image) 
               VALUES('$product_id', '$product_name', '$product_Qty', '$product_specialPrice','$product_image1');";
               mysqli_query($conn, $sql);
         } else{
         $sql = "INSERT INTO cart (id, productName, quantity, price, image) 
         VALUES('$product_id', '$product_name', '$product_Qty', '$product_price','$product_image1');";
         mysqli_query($conn, $sql);
         }
    }
  
  }

   
   
   
   //Header
   $page_title = $product_name;
   include("includes/header.php");
   ?>
   <main>
<!-- Content of product page -->
<link rel="stylesheet" href="css/review.css">
<link rel="stylesheet" href="css/product_general.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
<!----single products-->
<div class="indiProduct">
   <div class="defaultRow">
      <div class="caption">
         <!-- Main Image goes here -->
         <img ID="p5" src="<?php echo $product_image1?>" style="
         max-width:250px; 
         max-height:380px;
         display: block;
         margin-left: auto;
         margin-right: auto;
 ">  
         <div class="complementary-images">
            <div class="sub-image">
               <!-- SubImages go here -->
               <img class="comp-image" src="<?php echo $product_image2?>">
            </div>
            <div class="sub-image">
               <img class="comp-image" src="<?php echo $product_image3?>">
            </div>
            <div class="sub-image">
               <img class="comp-image" src="<?php echo $product_image4?>">
            </div>
            <div class="sub-image">
               <img class="comp-image" src="<?php echo $product_image5?>">
            </div>
         </div>
      </div>
      <!-- SubImages end here -->
      <div class="caption">
         <h1> <?php echo $product_name; ?> </h1>
         <h4><?php
            if ($product_specialPrice == null) {
                echo '$'.$product_price; 
            } else {
                echo "<span style='color: red;'>\$$product_specialPrice </span>" . " <strike>\$$product_price</strike> ";
            }
            
            ?></h4>
         <form action="" method="post">
            <input name="mask_quantity" type="number" value="1" style="width:44px;" min="1">
            <input type="submit" name="submit" class="button" value="Add items to cart" style="width: 150px !important;">
         </form>
         <h3>Product Information</h3>
         <br>
         <!-- description goes here -->
         <p><?php echo $product_description; ?>
         </p>
      </div>
      <div class="rating_score" style="margin-left:250px;
         margin-top:00px;">
         <span class="rating_heading"><strong>Customer Rating:</strong></span>
         <div class="rev_rating">
         <?php 
            $number_reviews = 0; //Unknown
            $average_review = 0; //Unknown
            $sql1 = "SELECT COUNT(num_star) AS num_reviews FROM reviews WHERE product_id = $product_id;";
            $result1 = mysqli_query($conn, $sql1);
            $resultCheck1 = mysqli_num_rows($result1);
            if ($resultCheck1 > 0) {
               $row1 = mysqli_fetch_assoc($result1);
               $number_reviews = $row1['num_reviews'];
            }
            if ($number_reviews != 0) {
               $sql2 = "SELECT SUM(num_star) AS star_sum FROM reviews WHERE product_id = $product_id;";
               $result2 = mysqli_query($conn, $sql2);
               $resultCheck2 = mysqli_num_rows($result2);
               if ($resultCheck2 > 0) {
                  $row2 = mysqli_fetch_assoc($result2);
                  $sum_reviews = $row2['star_sum'];
                  $average_review = $sum_reviews / $number_reviews;
               }
            }
            $count = 5;
            while($count > 0){
              if($average_review >= 1){
                echo "<img src='images/Icons/star-solid.svg'>";
              }else if($average_review > 0){
                echo "<img src='images/Icons/star-half-alt-solid.svg'>";
              }else{
                echo "<img src='images/Icons/star-regular.svg'>";
              }
              $average_review -= 1;
              $count -= 1;
            }

         ?>
         </div>
         </br> 
         <p><?php 
         if($number_reviews == 0){
            $average_review_rounded = 0;
         }else{
            $average_review_rounded = number_format($sum_reviews / $number_reviews, 1, '.', '');
         }
         
         echo "$average_review_rounded rating based on $number_reviews reviews.";?>  </p>
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
<div class="old-reviews" style="padding: 0 7em; margin-left:-100px" >

<?php
$sql = "SELECT * FROM reviews WHERE product_id = $product_id;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $username = $row['username'];
    $review_mess = $row['user_review'];
    $rating = (float) $row['num_star'];
    $admin_reply = $row['admin_reply'];

    if (isset($review_mess) && $review_mess != "NULL" && $review_mess != "") {
      echo "<h3>$username</h3>";
      echo "<div class='rating'>";
      $count = 5;
      while($count > 0){
        if($rating >= 1){
          echo "<img src='images/Icons/star-solid.svg'>";
        }else if($rating > 0){
          echo "<img src='images/Icons/star-half-alt-solid.svg'>";
        }else{
          echo "<img src='images/Icons/star-regular.svg'>";
        }
        $rating -= 1;
        $count -= 1;
      }
      echo "</div>";
      echo "<p>$review_mess</p>";
      if(isset($admin_reply)){
        $str1 = <<<END
        <div class="admin-response">
        <h3>Admin's response</h3>
        <p >$admin_reply</p>
        </div>
        END;
        print("$str1");

      }
    } 




  }
}
?>
</div>
<!-- Old Review end here -->



<!-- Create Reviews start here -->
<div class="leave-review" >
   
   <div class="custom-review" style="margin-right:100px">
   <!--you can adjust margin of "create review section ^^ here-->
     <form action="" method="POST">
       <h2> Write a customer review</h2>
       </br>
     
       <label for="username-part">Name:</label>
       <br>
      <input type="text" name="newUser" class="username-part" id="username-part">
      <br>
      <label for="star-1" >  Rate this product</label>
      <div class="star-rating" style="margin-right:700px;">
         <input type="radio" name="star" value="5" id="star-1" required/>
         <label for="star-1" ></label>
         <input type="radio" name="star" value="4" id="star-2" />
         <label for="star-2" ></label>
         <input type="radio" name="star" value="3" id="star-3" />
         <label for="star-3" ></label>
         <input type="radio" name="star" value="2" id="star-4" />
         <label for="star-4" ></label>
         <input type="radio" name="star" value="1" id="star-5" />
         <label for="star-5" ></label>
      </div>

      
      <h2 style="margin-top:30px;">Please leave your review below</h2>
      <br>
      <textarea type="text" name="cus_review" placeholder="Your review " class="review-part" style="max-wdith:1000px;
      "></textarea>
          </br></br>
         <input id="submit-review" type="submit" name="submit" value="submit review">
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
         <img src="image/products/p10m.jpg">
         <a href="productpage_PurellES8disinfectantdispense.php"><h4>Purell ES8 disinfectant dispense</h4></a>
         <div class="rating">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
         </div>
         <p>$38.85</p>
      </div>
      <div class="single-products">
         <img src="image/products/p12m.jpg">
         <a href="productpage_WellisairAirDisinfectionPurifier.php"><h4>Wellisair Air Disinfection Purifier</h4></a>
         <div class="rating">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-half-alt-solid.svg">
         </div>
         <p>$782</p>
      </div>
      <div class="single-products">
         <img src="images/Product Images/Product3.jpg">
         <a href="productpage_CloroxDisinfectingWipesProWipes.php"><h4>Clorox Disinfecting Wipes & Pro Wipes</h4></a>
         <div class="rating">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-regular.svg">
            <img src="images/Icons/star-regular.svg">
         </div>
         <p>$7.99</p>
      </div>
      <div class="single-products">
         <img src="image/products/p5m.jpg">
         <a href="productpage_TeqlerSurgicalMaskblack.php"><h4>Surgical Masks </h4></a>
         <div class="rating">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
            <img src="images/Icons/star-solid.svg">
         </div>
         <p>$29.99</p>
      </div>
   </div>
</div>

</main>
<!-- Suggested/Related items end here -->
<!----footer-->
<?php
   //footer
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