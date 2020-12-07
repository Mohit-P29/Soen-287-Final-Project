<?php
    include("includes/ConnectDB.php");  
    if(isset($_POST["submit"])){
        $id=$_POST["itemsSelect"];
        $newQty=$_POST["newQty"];
        

        $sql="UPDATE cart SET quantity='$newQty' WHERE id='$id'";
        mysqli_query($conn, $sql);
        header("Location: shoppingCart.php");
    }

?>