<?php
    session_start();
    include('includes/header.php');
    include("includes/ConnectDB.php");
    if(!$conn ) {
        die('Could not connect: ' . mysqli_error());
    }

    $sql = "SELECT * FROM cart";
    $retval = mysqli_query( $conn,$sql);
    if(! $retval ) {
       die('Could not get data: ' . mysqli_error());
    }

    ?>

        <section id="products">
            <div id="leftCol">
                <form id="item1" action="" method="post">
                    <img alt="item1">
                    <p>$5</p>
                    <input type="submit" name="add-cart" class="add-cart" value="Add to cart">
                    <input type="hidden" name="prodID" value="1">
                    <input type="hidden" name="prodName" value="HandSanitizers">
                    <input type="hidden" name="prodPrice" value="5">
                    <input type="hidden" name="prodQty" value="1">
                </form>

                <form id="item2" action="" method="post">
                    <img alt="item2">
                    <p>$5</p>
                    <input type="submit" name="add-cart" class="add-cart" value="Add to cart">
                    <input type="hidden" name="prodID" value="1">
                    <input type="hidden" name="prodName" value="Stuff3">
                    <input type="hidden" name="prodPrice" value="5">
                    <input type="hidden" name="prodQty" value="1">
                </form>


            </div> 
            <div id="rightCol">

                <form id="item1" action="" method="post">
                    <img alt="item1">
                    <p>$5</p>
                    <input type="submit" name="add-cart" class="add-cart" value="Add to cart">
                    <input type="hidden" name="prodID" value="1">
                    <input type="hidden" name="prodName" value="Stuuf1">
                    <input type="hidden" name="prodPrice" value="5">
                    <input type="hidden" name="prodQty" value="1">
                </form>


                <form id="item1" action="" method="post">
                    <img alt="item1">
                    <p>$5</p>
                    <input type="submit" name="add-cart" class="add-cart" value="Add to cart">
                    <input type="hidden" name="prodID" value="1">
                    <input type="hidden" name="prodName" value="Stuff5">
                    <input type="hidden" name="prodPrice" value="5">
                    <input type="hidden" name="prodQty" value="1">
                </form>
            </div>

           

        </section>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        <script src="js/cart.js"></script>
    </body>
    
    <?php 
    include('includes/footer.php');
    
    if(isset($_POST["add-cart"])){

        $id=$_POST["prodID"];
        $prodName=$_POST["prodName"];
        $prodPrice=$_POST["prodPrice"];
        $prodQty=$_POST["prodQty"];

        //check if the id is already there
        //if yes, then grab the number in cart first and add quantity together

       /* $sql = "SELECT * FROM cart where id='$id'";
            $retval = mysqli_query( $conn,$sql);
            $result=mysqli_num_rows($retval);
            if(! $retval ) {
            die('Could not get data: ' . mysqli_error());
            }

            if($result>0){

                while ( $row = mysqli_fetch_assoc($retval)){
                    if ($row['cart']===$_SESSION['cart']){
                        $oldQty=$row['quantity'];
                    }
                }
            }

            if($oldQty!='0'){
                $oldQty=parseInt($oldQty);
                $prodQty=parseInt($prodQty);

                $prodQty=$prodQty+$oldQty;
            }
*/

        $query="SELECT * FROM cart where id='$id'";
        $query_run=mysqli_query($conn,$query);


        if($row["quantity"]>0){
            $prodQty=$prodQty+$row["quantity"];
        }

      /*  while($row=mysqli_fetch_array($query_run)){
            
        }*/

        $sql = "INSERT INTO cart 
                VALUES('$id','$prodName','$prodQty','$prodPrice')";
        mysqli_query($conn,$sql);
        //$conn->close();
    }

    ?>