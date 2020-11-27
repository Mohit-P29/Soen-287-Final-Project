<?php
include('includes/header.php')
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
                </div>
            
            </div><!--End of products-container-->

        </section>

        <section id="fbt">
            <hr>
            <h2>Frequently bought together</h2>
            <hr>
        </section>
        <section id="Subtotal">
            <form action="checkout.php">
                <input type="submit" value="Checkout"/>
            </form>
        </section>
        <script src="js/cart.js"></script>
        <script>
            displayItems();
        </script>
    </body>
    
    <?php 
    include('includes/footer.php')
    ?>
