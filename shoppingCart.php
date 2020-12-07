<?php
include('includes/header.php');
include_once 'includes/covaid_database.php';

    ?>
       
        <section id="cart">
            <div>
                <h2>Shopping Cart</h2>
                <button onclick="displayMenu()" id="changeQty-btn">change quantity</button>
                <button onclick="closeMenu()" id="closeMenu">Close</button>
            </div>
            <div class="container-products">
                <div class="product-header">
                    <h5 class="product-title">PRODUCT</h5>
                    <h5 class="price sm-hide"></h5>
                    <h5 class="quantity">QUANTITY</h5>
                    <h5 class="total">TOTAL</h5>
                </div>
               
                    <form action="modifyQty.php" method="post" class="products">
                    <?php
                        
                        // setting up my select query
                        $sql = "SELECT * FROM cart ";

                        $result = $conn->query($sql);
                        $total=0;

                        if (!empty($result) && $result->num_rows > 0) {

                        // output data from each row of the database into each row of the table
                        while($row = $result->fetch_assoc()) {
                            $total=$total+$row["price"]*$row["quantity"];
                            //END OF PHP TAG
                            ?>
                           <div class="product">
                            <div class="left">
                                <input class="radioBtn" type="radio" name="itemsSelect" value="<?php echo $row["id"]?>">
                                <img src="<?php echo $row['image']?>" alt="img"/>
                            </div>
                            <div class="left nameANDprice">
                                <span class="sm-hide"><?php echo $row["productName"];  ?></span>
                                <span class="sm-hide">$<?php echo $row["price"];  ?></span>
                            </div>
                            </div>
                            <div class="price sm-hide"></div>
                            <div class="quantity">                                   
                                    <span id="qty"><?php echo $row["quantity"]; ?></span>
                            </div>
                            <div class="total">$<?php echo ($row["quantity"]*$row["price"]);  ?></div>
                            
                            <?php
                        }
                    } else {
                        echo "You don't have any items in your Cart";
                    }


                    ?>

                    <section id="changeQty">
                                <h2>Modify quantity</h2>
                                    <p>Please select which item you would like to modify (circles next to the products)</p>
                                    <p>How many do you want to change it to?</p>
                                    <div id="qty-modifier">
                                        <input type="number" name="newQty" value="">
                                        <input type="submit" name="submit" value="Change"></input>
                                    </div>
                                    
                            </section>

                    </form>
        
            
            </div><!--End of products-container-->

            <section id="Subtotal">
                <form action="checkout.php">
                    <p>Total: $<?php echo $total?></p>
                    <input type="submit" value="Checkout"/>
                </form>
            </section>
        </section><!--End of cart-->
        

      
        <script src="js/cart.js"></script>
        <script>


        </script>
    </body>
    
    <?php 
    include('includes/footer.php')






    ?>
