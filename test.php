<?php
include('includes/header.php');
    ?>

        <section id="orderInfo">
        
             <form id="item1" action="" method="post">
                    <p>Item 1</p>
                    <input type="submit" name="add-cart" class="add-cart" value="Add to cart">
                    <input type="hidden" name="prodID" value="1">
                </form>

                <form id="item2" action="" method="post">
                    <p>Item 2</p>
                    <input type="submit" name="add-cart" class="add-cart" value="Add to cart">
                    <input type="hidden" name="prodID" value="2">
                </form>

                <form id="item3" action="" method="post">
                    <p>Item 3</p>
                    <input type="submit" name="add-cart" class="add-cart" value="Add to cart">
                    <input type="hidden" name="prodID" value="3">
                </form>

                <form id="item4" action="" method="post">
                    <p>Item 4</p>
                    <input type="submit" name="add-cart" class="add-cart" value="Add to cart">
                    <input type="hidden" name="prodID" value="4">
                </form>
        </section>


    </body>

<?php 

    if(isset($_POST["submit"])){
        $item=$_POST["prodID"];

        echo "hello";

    }



?>