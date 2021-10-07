<?php
    include("includes/ConnectDB.php");  
    $id=$_POST["itemsSelect"];

    if(isset($_POST["submit"])){
        $newQty=$_POST["newQty"];


        $sql="UPDATE cart SET quantity='$newQty' WHERE id='$id'";
        mysqli_query($conn, $sql);
    }

    else if(isset($_POST["deleteItem"])){
        $sql ="DELETE FROM cart WHERE id='$id' ";
        mysqli_query($conn, $sql);
    }

    header("Location: shoppingCart.php");

?>