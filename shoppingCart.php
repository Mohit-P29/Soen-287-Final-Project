<?php
include('includes/header.php');
include_once 'includes/covaid_database.php';

    ?>
       
        <section id="cart">
            <div>
                <h2>Shopping Cart</h2>
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


                        if (!empty($result) && $result->num_rows > 0) {

                        // output data from each row of the database into each row of the table
                        while($row = $result->fetch_assoc()) {
                            
                            //END OF PHP TAG
                            ?>
                           <div class="product">
                            <div class="left">
                                <img src="" alt="img"/>
                            </div>
                            <div class="left nameANDprice">
                                <span class="sm-hide"><?php echo $row["productName"];  ?></span>
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
                    } else {
                        echo "You don't have any items in your Cart";
                    }


                    ?>

                </div>
            
            </div><!--End of products-container-->

            <section id="Subtotal">
                <form action="checkout.php">
                    <input type="submit" value="Checkout"/>
                </form>
            </section>
        </section><!--End of cart-->

      
        <script src="js/cart.js"></script>
        <script>
            displayItems();
        </script>
    </body>
    
    <?php 
    include('includes/footer.php')
    ?>
