<?php
// Start the session
session_start();
include_once 'includes/covaid_database.php';
$_SESSION["emailexclusives_errorfooter"] ="";

$product_id = 61;
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
   }





$page_title = "DIY MASK CREATOR";
 //HEADER	
include('includes/header.php');
    ?>
    <link rel="stylesheet" href="css/review.css">
<link rel="stylesheet" href="css/product_general.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <main> 
 
 <h1> DIY Mask Builder <?php
            if ($product_specialPrice == null) {
                echo $product_price; 
            } else {
                echo "<span style='color: red;'>\$$product_specialPrice </span>" . " <strike>\$$product_price</strike> ";
            }
            
            ?></h1>
     <div class="DIY_mask_review_stars"> <span>Product Rating</span>
     
      
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
                echo "<ion-icon name='star'></ion-icon>";
              }else if($average_review > 0){
                echo "<ion-icon name='star-half'></ion-icon>";
              }
              $average_review -= 1;
              $count -= 1;
            }

         ?>
        
         
          
           
            
             
              
                 </div>
 <form method="post" action="processMask.php">
  
  <input type="hidden" name="price" value="" >
 <div class="whole_container">
 
<!---------- script in order to display image------------>
  
    
<!---------------- script in order to display image-------------->  
 
 
 
<div class="DIYmask_container">


<div class="over_mask_diy">
<div id="image">

<div id="image-location" class="picture_container">
    
</div>
</div>

</div>


<svg class="svg_diy" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 648 604">
  <defs>
    <style>
      .cls-1 
        {
        fill: #fff;
      }
    </style>
  </defs>
  
  <g id="Layer_1" data-name="Layer 1">
    <ellipse class="cls-1" cx="324" cy="302" rx="458.2" ry="427.09"/>
    <path d="M466.68,368.19a658.7,658.7,0,0,0,251.67.18C634.45,407.57,550.56,407.23,466.68,368.19Z" transform="translate(-269 -73)"/>
    <path d="M495.54,416.88c32.78,10.13,64.1,19.47,97.1,19.5s64.55-9.19,96.5-19.21c-10.7,13.33-49.15,30.43-75.67,33.91C564.13,457.56,518,437.68,495.54,416.88Z" transform="translate(-269 -73)"/>
    <path d="M491.2,333.37a581.5,581.5,0,0,1,202.3,0C663.79,344.14,542.39,344.36,491.2,333.37Z" transform="translate(-269 -73)"/>
  </g>
  
  
  <g id="left-hole">
    <path class="cls-1" d="M418,369.38c-19.87-11.44-39.73-20.29-54.28-37-3.71-4.27-8-8.48-10.25-13.5-8.82-19.41,0-32.64,20.58-32.38,15.19.19,30.33,6.24,45.4,10.07,1.2.31,2.42,3.73,2.3,5.62-1.08,16.82-2.55,33.62-3.7,50.43C417.72,357.66,418,362.72,418,369.38Z" transform="translate(-269 -73)"/>
  </g>
  <g id="right-hole">
    <path class="cls-1" d="M769.45,367.86c-2.32-23.34-4.61-46.43-7-70,15.21-5.61,30.49-11.32,47-11.92,10.21-.36,19.63,3.19,24.4,12.19,4.93,9.31,1.07,18.32-5.5,26.31C814.2,341.77,788.94,360.53,769.45,367.86Z" transform="translate(-269 -73)"/>
  </g>
  <g id="mask_outline" data-name="mask outline">
    <path d="M592.73,503.5c-25.23-1-48.51-8.2-70.33-20.17-19.48-10.69-37.46-23.58-53-39.56-12.51-12.85-26.67-24.69-36.51-39.37-8.49-12.66-19.44-19.39-32-26.14-24.77-13.35-49.82-27.25-63.37-53.52-11.72-22.72-2.44-42.59,21.63-51.89,15.53-6,31.64-3.24,46,2.56,15.91,6.42,30.23,3.33,45.46-.31,38.84-9.3,77.68-18.64,116.74-27,28.06-6,55.55-.18,82.89,6.64,35.48,8.86,71.11,17.1,106.77,25.16,4.09.93,8.86-.74,13.24-1.58,13.88-2.67,27.65-7.16,41.62-7.88,18.06-.92,32.2,8.45,39.23,25.13,2.63,6.22,2.35,15.29-.12,21.72-8.37,21.9-24.8,37.09-45.08,48.34-13.85,7.68-27.73,15.33-41.47,23.22a12.65,12.65,0,0,0-4.44,5.26c-9.08,18-23.86,31.08-38.19,44.51q-13.14,12.3-27.09,23.72C673.21,480,649.21,492.94,622,499.18,612.42,501.38,602.5,502.1,592.73,503.5Z" transform="translate(-269 -73)"/>
  </g>
  <g id="mask-color">
    <path class="cls-1" d="M439.8,293.72c39.66-9.35,78.32-18.34,116.91-27.63a149.59,149.59,0,0,1,70.24-.48c39.56,9.31,79.1,18.69,119.3,28.2,1.68,22.48,3.69,44.79,4.92,67.15.76,13.67-4,25.76-12.84,36.38-27.1,32.73-57.66,61.39-96.92,78.93C605.71,492.21,570.27,490,535.54,472A242,242,0,0,1,470,421.84c-9.14-9.77-18.7-19.26-26.86-29.82-7.13-9.24-8.92-20.91-8.29-32.35C436.05,337.78,438.09,315.93,439.8,293.72Z" transform="translate(-269 -73)"/>
  </g>

</svg>

</div>

<div class="options_container">

<!----------------------- Color Changin SCRIPT -------------------->
<script>
    
function getColorPrimary(){
    alert("Inside primary color function");
  var selectBox = document.getElementById("selection_box");
var selectedValue = selectBox.options[selectBox.selectedIndex].value;
alert(selectedValue);
if(selectedValue == 1){
    
      let outline = document.getElementById('mask-color');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: red');
        
    }
    
}else if (selectedValue == 2) {
    
    
    let outline = document.getElementById('mask-color');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: blue');
        
    }
  
}else if (selectedValue == 3) {
    
    
    let outline = document.getElementById('mask-color');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: green');
        
    }
  
}else if (selectedValue == 4) {
    
    
   let outline = document.getElementById('mask-color');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: pink');
        
    }  
  
}else if (selectedValue == 5) {
    
    
   let outline = document.getElementById('mask-color');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: yellow');
        
    }
  
}else if (selectedValue == 6) {
    
    
   let outline = document.getElementById('mask-color');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: purple');
        
    }
  
}else if (selectedValue == 7) {
    
    
   let outline = document.getElementById('mask-color');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: orange');
        
    }
  
}else if (selectedValue == 8) {
    
    
   let outline = document.getElementById('mask-color');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: black');
        
    }
  
}else if (selectedValue == 9) {
    
    
   let outline = document.getElementById('mask-color');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: white');
        
    }
  
}
    
    
    
    else{
    
    alert("another color");
}
    
}
    
function getColorSecondary(){
    alert("Inside Secondary color function");
  var selectBox = document.getElementById("selection_box2");
var selectedValue = selectBox.options[selectBox.selectedIndex].value;
alert(selectedValue);
if(selectedValue == 1){
    
      let outline = document.getElementById('mask_outline');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: red');
        
    }
    
}else if (selectedValue == 2) {
    
    
    let outline = document.getElementById('mask_outline');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: blue');
        
    }
  
}else if (selectedValue == 3) {
    
    
    let outline = document.getElementById('mask_outline');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: green');
        
    }
  
}else if (selectedValue == 4) {
    
    
   let outline = document.getElementById('mask_outline');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: pink');
        
    }
  
}else if (selectedValue == 5) {
    
    
   let outline = document.getElementById('mask_outline');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: yellow');
        
    }
  
}else if (selectedValue == 6) {
    
    
   let outline = document.getElementById('mask_outline');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: purple');
        
    }
  
}else if (selectedValue == 7) {
    
    
   let outline = document.getElementById('mask_outline');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: orange');
        
    }
  
}else if (selectedValue == 8) {
    
    
   let outline = document.getElementById('mask_outline');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: black');
        
    }
  
}else if (selectedValue == 9) {
    
    
   let outline = document.getElementById('mask_outline');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: white');
        
    }
  
}

	
    
    
    
    else{
    
    alert("another color");
}
    
}
	
	
	
    
    </script>
    
    <!----------------------- END Color Changin SCRIPT -------------------->

<label class="label_cp"><strong>Colors Primary</strong></label>
<select class="primary-select" id="selection_box" name="mask_primary_color" onchange="getColorPrimary();">
   
    <option value="1">red</option>
    <option value="2">blue</option>
    <option value="3">green</option>
    <option value="4">pink</option>
    <option value="5">yellow</option>
    <option value="6">purple</option>
    <option value="7">orange</option>
    <option value="8">black</option>
    <!---newly added value --->
    <option value="9" selected="selected">white</option>
    
    
</select>
    <br />
    <br />

 <label class="label_op"><strong>Colors Outline</strong></label> 
<select class="primary-select" id="selection_box2" name="mask_secondary_color" onchange="getColorSecondary();">
    <option value="1">red</option>
    <option value="2">blue</option>
    <option value="3">green</option>
    <option value="4">pink</option>
    <option value="5">yellow</option>
    <option value="6">purple</option>
    <option value="7">orange</option>
    <option value="8" selected="selected">black</option>
    <!---newly added value --->
    <option value="9">white</option>
    
    
</select>
       <br>
    <br><br><br>
       
       <p>Add an Image to your mask that will be displayed on the front of the mask, from our selection.</p>
       <br>
       <label class="label_i"><strong>Images</strong></label>
<select id="selection_box3" name="images" class="image-select">
    <option value="1" data-picture="images/animal/elephant.png" >Elephant</option>
    <option value="2" data-picture="images/animal/fox.png">Fox</option>
    <option value="3" data-picture="images/animal/gecko.png">Gecko</option>
    <option value="4" data-picture="images/animal/polarbear.png">Polarbear</option>
    <option value="5" data-picture="images/animal/rabbit.png">Rabbit</option>
    <option value="6" data-picture="" selected="selected" data-picture="">No pictures wanted</option>
   
    
    
</select>

   <script>
     
     
	   
     $('#selection_box3').change(function(){ //if the select value gets changed
   var imageSource = $(this).find(':selected').data('picture'); //get the data from data-picture attribute
         alert(imageSource);
   if(imageSource){ //if it has data
      $('#image-location').html('<img src="'+imageSource+'" style="width:170px;height:170px;">'); // insert image in div image-location
   } else {
      $('#image-location').html(''); //remove content from div image-location, thus removing the image
   }
})
     
     
     
  </script>
  <br>



<input class='btn' type="submit" value="Add to Cart">

</div>

   

</div>
     
     <div class="DIY_mask_product_description">
         <p class="DIY_mask_product_description_text"> Product Description </p>
         <br />
         <p class="DIY_mask_product_description_text1">
             This is our very Own custom Mask! Choose your custom masks Color, Outline Color and even a special image from our selection.
             Our Masks are made with 100%  cotton, meaning they are extremly breathable, comfortable for long periods of time and perfect for hot summer days and cold winter days. We've even tested them with profesional atheletes, during practices and workout sessions that require wearing a mask. Needless to say, this is the only mask you'll ever need.
         </p>
         
     </div>

    
        
         
     </form>
     
     <!-- Old Review starts here -->
<div class="review_section">
      <div class="rev">
        <h1>Customer Reviews</h1>
        <div class="border">
        </div>
        </div>
        </div>
<div class="old-reviews" style="padding: 0 7em;">

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
<div class="leave-review" style="padding: 0 2em;">
   <div class="custom-review">
     <form action="" method="POST">
       <h2> Write a customer review</h2>
       </br>
     
       <label for="username-part">Name:</label>
       <br>
      <input type="text" name="newUser" class="username-part" id="username-part">
       
      <label for="star-1" >  Rate this product</label>
      <div class="star-rating">
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
      <textarea type="text" name="cus_review" placeholder="Your review " class="review-part"></textarea>
          </br></br>
         <input id="submit-review" type="submit" name="submit" value="submit review">
          </form>
   </div>
</div>
<!-- Create Reviews end here -->

</main> 


<?php 
    include('includes/footer.php')
    ?>