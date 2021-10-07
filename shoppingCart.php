<?php
$page_title="Shopping Cart";
include('includes/header.php');
include_once 'includes/covaid_database.php';
    ?>
       
        <form action="modifyQty.php" method="post" id="cart">
            <div>
                <h2>Shopping Cart</h2>
                <p>Please select an item before modifying or deleting item</p>
                <input type="number" name="newQty" value="1" id="inputNum" min="1">
                <input type="submit" id="changeQtyBtn" name="submit" value="Change" onclick="return selectItem()"></input>
                <input type="submit" name="deleteItem" value="delete" id="deleteBtn"  onclick="return selectItem()">
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

                        if (!empty($result) && $result->num_rows > 0) {

                        // output data from each row of the database into each row of the table
                        while($row = $result->fetch_assoc()) {

                            $id=$row["id"];

                                $prodName=$row["productName"];
                                $c1=$row["maskPColor"];
                                $c2=$row["MaskSColor"];

                                if($prodName=="Custom Mask"){
                                    $prodName=$prodName."(Primary Color: ".$c1." Secondary Color: ".$c2.")";
                                }

                            if($row["quantity"]==0){
                                $sql ="DELETE FROM cart WHERE id='$id' ";
                                mysqli_query($conn, $sql);
                            }

                            $total=$total+$row["price"]*$row["quantity"];
                            //END OF PHP TAG
                            ?>
                           <div class="product">
                            <div class="left">
                                <input class="radioBtn" type="radio" name="itemsSelect" value="<?php echo $row["id"]?>">
                                <img src="<?php echo $row['image']?>" alt="img"/>
                            </div>
                            <div class="left nameANDprice">
                                <span class="sm-hide"><?php echo $prodName;  ?></span>
                                <span class="sm-hide">$<?php echo $row["price"];  ?></span>
                            </div>
                            </div>
                            <div class="price sm-hide"></div>
                            <div class="quantity">                                   
                                    <span id="qty"><?php echo $row["quantity"]; ?></span>
                            </div>
                            <div class="total">$<?php echo ($row["quantity"]*$row["price"]);  ?></div>
                            <input type="hidden" value="<?php echo ($row["quantity"]*$row["price"]);?>">
                            
                            <?php
                        }
                    } else {
                        echo "You don't have any items in your Cart";
                    }


                    ?>

                </div>
        
            
            </div><!--End of products-container-->

            <section id="Subtotal">
                
                    <p>Total: $<span id="finalTotal"><?php echo $total?></span></p>
                    <button type="button" onclick="validCart()" id="checkoutBtn">Checkout</button>
              
            </section>
                </form><!--End of cart-->
        

      
        <script src="js/cart.js"></script>

    </body>
        <script>

            function validCart(){
                if(document.getElementById("finalTotal").innerHTML=='0'){
                    alert("You must have at least 1 item in the cart to proceed!");
                }
                else{
                    location.href='checkout.php';
                }
            }

        </script>
    <?php 
    include('includes/footer.php');

    ?>
