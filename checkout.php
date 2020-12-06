<?php 
     session_start();
     include "includes/address.php";
     include("includes/header.php");
     include("includes/ConnectDB.php");   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
   
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
    

    
?>
        <h2>Review your order</h2>
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
                    <img src="" alt="visa">
                    <p>ending in 1337</p>
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
                    <button onclick="promo()">Apply</button>
                    <p id="addedCode"></p>
                </div>
                
                <div id="arrival">
                    <h3>Arrival day</h3>
                    <p><span id="aMonth"></span> <span id="aDay"></span>, <span id="aYear"></span></p>
                </div>
            </div>
        </section>
        <div id="yourItemsHeader">
            <h2 >Your items</h2>
            <a href="shoppingCart.php">Modify items</a>
        </div>
       
        <section id="yourItems" class="yourItems">

        </section>

        <section id="donationANDreceipt">
            <div id="donation">
                <h3>Please consider a kind donation</h3>
                <p>As you may know, many lives are impacted by the global pandemic... blablabla
                    By donating, you are automatically supporting the people in need and you will be given a free discount code for your next purchase!</p>
                <img src="images/redCrossLogo.jpg" alt="red cross logo" id="redCrossLogo">
                <div id="donoNow"> 
                    <h4>Donate now</h4>
                    <input placehold="Enter amount" id="donoAmount">
                    <button onclick="dono()">Add donation</button>
                </div>
                <p id="thankyouDono"></p>
            </div>
            <div id="receipt">
                <h4>Order summary</h4>
                <div class="itemsPriceTotal">
                
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
                <form action="orderPlaced.php">
                    <input type="submit" value="Place Order"/>
                </form>
            </div>

        </section>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        <script src="js/cart.js"></script>
        <script>
            displayItems();
            newTotalCost();
            shipping();
            load_P_and_D();
        </script>
    </body>
    
    <?php 
    include('includes/footer.php')
    ?>
