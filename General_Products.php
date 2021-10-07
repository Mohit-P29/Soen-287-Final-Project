

<?php
  $page_title = 'All Products';
   include("includes/header.php");
   include_once "includes/covaid_database.php";
   
   //Retrieve all products from the database
   $product_name;
   $product_price;
   $total_sales;
   $product_inventory;
   $number_reviews = 0; //Unknown
   $average_review = 0; //Unknown
   $adminlink;


   if(isset($_GET['order'])){
    $order=$_GET['order'];
  }else{
    $order= 'created';
  }
  if(isset($_GET['sort'])){
   $sort=$_GET['sort'];
 }else{
   $sort= 'DESC';
 }
   
   $sql = "SELECT * FROM products ORDER BY $order $sort;";
   $result = mysqli_query($conn, $sql);
   $resultCheck = mysqli_num_rows($result);


 
  
 

  
   //Makes sure that the connection was established
   if ($resultCheck > 0) {

    if ($sort== 'ASC'){

      $sort='DESC';
    }else{
      $sort='ASC';
    }
    
     echo " <main>
    <link rel='stylesheet' href='css/product_general.css'>
    <link rel='preconnect' href='https://fonts.gstatic.com'>
    <link href='https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap' rel='stylesheet'>
    <style>
             

.btn-drp {
  width:100px;
  height: 35px;
  background-color: #8db600;
  color: white;
  padding: 10px;
  font-size: 14px;
  border-radius: 20px;
  margin-right:80px;
}
.btn-drp:hover{
  background: red;
}

.sort-drop {
  
  display: inline-block;
}

.drp-cont {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 200px;

}

.drp-cont a {
  display: block;
  color: black;
  padding: 10px 12px;
  text-decoration: none;
  
}

.drp-cont a:hover {background-color: rgb(131, 125, 125);}

.sort-drop:hover .drp-cont {display: block;
}

.sort-drop:hover .dropbtn {background-color: background: red;}
      </style>
 
    <!----featured products-->
    <div class= 'submenu'>
       <div class='productRow'>
          <h2>General Products</h2>
          
          <div class='sort-drop'>
          <button class='btn-drp'> Sort Items </button>
          <div class='drp-cont'>
          <a href ='?order=name&&sort=$sort'>Sort by Name</a>
          <a href ='?order=price&&sort=$sort'>Sort by Price</a>
          <a href ='?order=created&&sort=$sort'>Newest Items</a>
          <a href ='?order=sales&&sort=$sort'>Most Bought Products</a>
          </div>
          </div>
       </div>
       <div class='defaultRow'>" ;
       
 
       while ($row = mysqli_fetch_assoc($result)) {
           $product_id = $row['id'];
           $product_name = $row['name'];
           $product_price = (float) $row['price'];
           $total_sales = (float) $row['sales'];
           $product_inventory = (float) $row['inventory'];
           $productlink = $row['webpageLink'];

      
           $imagelink= $row['image1']; 
           if(!isset($imagelink)|| $imagelink==''){
            $imagelink='image/products/noimage.jpg';
           }

           echo " 
           <div class='single-products'>
           <a href='$productlink'> <img src='$imagelink' style='width:50%;
            display: block;
         margin-left: auto;
         margin-right: auto;'></a>
         </br>
            <h4><a href='$productlink'>$product_name</a></h4>
            <div class='rating'>";
       
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

        
              
           echo" </div>
            <p>$$product_price</p>
         </div>
           ";
   
          
           
   
   
          
       }
       echo "</div>
       </div>
    </main>
    <!----footer-->";
    
       include("includes/footer.php");
     echo"
    </body>
    </html> ";
   }
   else{
    echo "no data avalaible";
  }
   ?>





