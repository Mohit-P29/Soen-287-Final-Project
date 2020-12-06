<?php
    include('includes/header.php');
    include("includes/ConnectDB.php");   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
?>
        <h2>Review your order</h2>
        <section id="orderReview">
            <div id="shipAddress">
                <h3>Shipping Address</h3>
                <a href="">change</a>
                <p>John Doe</p>
                <p>492 Rue main</p>
                <p>Montreal. Qc</p>
                <p>J8T 2H5</p>
                <p>514-123-4567</p>
            </div>
           <div id="methods">
                <div id="payMethod">
                    <h3>Payment Method</h3>
                    <a href="">change</a>
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
                <p class="item" id="shipMethodSelect"></p>
                <p class="itemPrice" id="shipMethodSelectPrice"></p>

                <hr>

                <p class="item">Total before tax:</p>
                <p class="itemPrice" id="pbt1"></p>

                <p class="item" id="enteredCode"></p>
                <p class="itemPrice" id="enteredCodeDisc"></p>
                <div id="pbt3">
                    <hr class="pbt2">
                    
                    <p class="item pbt2">Total before tax</p>
                    <p class="itemPrice pbt2" id="pbt2"></p>
                </div>
                <p class="item">Taxes (15%)</p>
                <p class="itemPrice" id="taxes"></p>

                <hr>

                <p class="item dono">Total after tax:</p>
                <p class="itemPrice dono" id="pat"></p>
                
                <p class="item dono" id="donoText">Additional Donation</p>
                <p class="itemPrice dono" id="dono">$0</p>
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
