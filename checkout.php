<?php 
     session_start();
     $page_title="Checkout";
     include("includes/address.php");
     include("includes/header.php");
     include("includes/ConnectDB.php");   

  


   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }

   $sql = "SELECT * FROM payment";
   $retval = mysqli_query( $conn,$sql);
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
   }
    $result=mysqli_num_rows($retval);

        if($result>0){       
          while ( $row = mysqli_fetch_assoc($retval)){

            if ($row['user_id']===$_SESSION['user_id']){
                  $paymentCard=$row['cardnumber'];
            }
        }
      }

    $paymentCard=substr($paymentCard,15);

   
   $sql = "SELECT * FROM user_info";
   $retval = mysqli_query( $conn,$sql);
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
   }
   $_SESSION['user_id']=(isset($_SESSION['user_id']))?$_SESSION['user_id']:'No Email Shown';
    $result=mysqli_num_rows($retval);
    $last='';
    $first="";
    $email1="";
    $email2="";
    $phone1="";
    $phone2="";
        if($result>0){       
          while ( $row = mysqli_fetch_assoc($retval)){
    
            if ($row['user_id']===$_SESSION['user_id']){
                  $first=$row['user_first'];
                 $last=$row['user_last'];
                 $email1=$row['user_email1'];
                 $email2=$row['user_email2'];
                 $phone1=$row['phone1'];
                  $phone2=$row['phone2'];
            }
        }
      }

    $first2='';
    $last2='';
    $comp2='';
    $a1='';
    $a2='';
    $city='';
    $country='';
    $province='';
    $post='';
    $phone='';
    $sql = "SELECT * FROM useraddress";
    $retval = mysqli_query( $conn,$sql);
    $result=mysqli_num_rows($retval);
    if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
    }

    if($result>0){

          while ( $row = mysqli_fetch_assoc($retval)){
            if ($row['user_id']===$_SESSION['user_id']){
                  $first2=$row['first'];
                  $last2=$row['last'];
                  $comp2=$row['company'];
                  $a1=$row['address'];
                  $a2=$row['address2'];
                  $city=$row['city'];
                  $country=$row['country'];
                  $province=$row['province'];
                  $post=$row['post'];
                  $phone=$row['phone'];
            }
        }
      }
     $username='No name yet';
    $sql = "SELECT * FROM profile";
    $retval = mysqli_query( $conn,$sql);
    $result=mysqli_num_rows($retval);
    if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
    }

    if($result>0){

          while ( $row = mysqli_fetch_assoc($retval)){
             if($row['user_id']===$_SESSION['user_id']){
               $username=$row['user_name'];
             }
          }
    }
    
    //if user does not have an account
    if($_SESSION["login"]=='false'){
        header("Location: errorLogin.php");
    }

    //add payment info checker after Jia Wei gets it done.
    if($a1==""){
        header("Location: errorInfo.php");
    }
    
?>
 
        <section id="orderReview">
            <div id="shipAddress">
                <h3>Shipping Address</h3>
                <a href="UserPage.php">change</a>
                <p><?php echo $first2." ".$last2?></p>
                <p><?php echo $a1?></p>
                <p><?php echo $city.", ".$province?></p>
                <p><?php echo $post?></p>
                <p><?php echo $phone1?></p>
                <p><?php echo $email1?></p>
                
            </div>
           <div id="methods">
                <div id="payMethod">
                    <h3>Payment Method</h3>
                    <a href="UserPage.php">change</a>
                    <img id="visa" src="image/visa.png" alt="visa">
                    <p>ending in <?php echo $paymentCard?></p>
                </div>
                <div id="shipMethod">
                    <h3>Shipping Method</h3>
                    <input type="radio" name="shipping" value="Regular" id="hship1" onchange="shipping()" checked="checked"> Regular ($5)<br>
                    <input type="radio" name="shipping" value="Express" id="hship2" onchange="shipping()"> 2-day shipping ($10)
                </div>
            </div>
            <div id="others">
                <div id="promo">
                    <h3>Gift cards & promotional codes</h3>
                    <input placeholder="Enter code" id="promoCode">
                    <button onclick="promo()" id="codeBtn">Apply</button>
                    <p id="addedCode"></p>
                </div>
                
                <div id="arrival">
                    <h3>Arrival day</h3>
                    <p><span id="aMonth"></span> <span id="aDay"></span>, <span id="aYear"></span></p>
                </div>
            </div>
        </section>
  
       
        <section id="cart-checkout">
            <div>
                <h2>Your Items</h2>
                <a href="shoppingCart.php">Modify items</a>
            </div>
            <div class="container-products">
                <div class="product-header">
                    <h5 class="product-title">PRODUCT</h5>
                    <h5 class="price sm-hide"></h5>
                    <h5 class="quantity">QUANTITY</h5>
                    <h5 class="total">TOTAL</h5>
                </div>
                <div class="products">
                    <?php
                    // setting up my select query
                    $sql = "SELECT * FROM cart ";

                    $result = $conn->query($sql);
                    $total=0;
                    $totalQty=0;


                        // output data from each row of the database into each row of the table
                        while($row = $result->fetch_assoc()) {
                            
                            $total=$total+$row["quantity"]*$row["price"];
                            $totalQty=$totalQty+$row["quantity"];

                            $prodName=$row["productName"];
                            $c1=$row["maskPColor"];
                            $c2=$row["MaskSColor"];

                            if($prodName=="Custom Mask"){
                                $prodName=$prodName."(Primary Color: ".$c1." Secondary Color: ".$c2.")";
                            }


                            //END OF PHP TAG
                            ?>
                           <div class="product">
                            <div class="left">
                             <img src="<?php echo $row['image']?>" alt="img"/>
                            </div>
                            <div class="left nameANDprice">
                                <span class="sm-hide"><?php echo $prodName;  ?></span>
                                <span class="sm-hide">$<?php echo $row["price"];  ?></span>
                                
                            </div>
                            </div>
                            <div class="price sm-hide"></div>
                            <div class="quantity">
                                    <span><?php echo $row["quantity"]; ?></span>
                            </div>
                            <div class="total">$<?php echo ($row["quantity"]*$row["price"]);  ?></div>
                            
                            <?php
                        }
                    ?>

        </section>

        <section id="donationANDreceipt">
            <div id="donation">
                <h3>Please consider a kind donation</h3>
                <p>As you may know, many lives are impacted by the global pandemic...
                    By donating, you are automatically supporting the people in need and you will be given a free discount code for your next purchase!</p>
                <img src="images/redCrossLogo.jpg" alt="red cross logo" id="redCrossLogo">
                <div id="donoNow"> 
                    <h4>Donate now</h4>
                    <input placehold="Enter amount" id="donoAmount">
                    <button onclick="dono()" id="addDonoBtn">Add donation</button>
                </div>
                <p id="thankyouDono"></p>
            </div>
            <div id="receipt">
                
                <h4>Order summary</h4>
                <div>
                    <p class="item">Items(<?php echo $totalQty?>)</p>
                    <p class="itemPrice">$<?php echo $total?><p>
                    <input type="hidden" id="totalCost" value="<?php echo $total?>">
                </div>
                <div>
                    <p class="item" id="shipMethodSelect"></p>
                    <p class="itemPrice" id="shipMethodSelectPrice"></p>
                </div>
                <hr>
                <div>
                    <p class="item">Total before tax:</p>
                    <p class="itemPrice" id="pbt1"></p>
                </div>
                <div>
                    <p class="item" id="enteredCode"></p>
                    <p class="itemPrice" id="enteredCodeDisc"></p>
                </div>
                <div id="pbt3">
                    <hr class="pbt2">
                    
                    <p class="item pbt2">Total before tax</p>
                    <p class="itemPrice pbt2" id="pbt2"></p>
                </div>
                <div>
                    <p class="item">Taxes (15%)</p>
                    <p class="itemPrice" id="taxes"></p>
                </div>
                <hr>
                <div>
                    <p class="item dono">Total after tax:</p>
                    <p class="itemPrice dono" id="pat"></p>
                </div>
                <div>
                    <p class="item dono" id="donoText">Additional Donation</p>
                    <p class="itemPrice dono" id="dono">$0</p>
                </div>
                <div class="orderTotal">
                    <p class="item">Order Total:</p>
                    <p class="itemPrice" id="finalTotal"></p>
                </div>

                <form action="orderPlaced2.php" method="post" onsubmit="clearStorage()">

                    <input type="hidden" name="oMonth" id="oMonthV">
                    <input type="hidden" name="oDay" id="oDayV">
                    <input type="hidden" name="oYear" id="oYearV">

                    <input type="hidden" name="aMonth" id="aMonthV">
                    <input type="hidden" name="aDay" id="aDayV">
                    <input type="hidden" name="aYear" id="aYearV">

                    <input type="hidden" name="taxV" id="taxV">
                    <input type="hidden" name="codeV" id="codeV">
                    <input type="hidden" name="shipV" id="shipV">
                    <input type="hidden" name="totalV" id="totalV">
                    <input type="hidden" name="donoV" id="donoV">
                    <input type="hidden" name="finalV" id="finalV">

                    <input type="submit" value="Place Order" id="orderBtn"/>
                </form>
            </div>

        </section>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        <script src="js/cart.js"></script>
        <script>
            getDay();
            newTotalCost();
            shipping();
            load_P_and_D();
        </script>
    </body>
    
    <?php 
    include('includes/footer.php');
    ?>
