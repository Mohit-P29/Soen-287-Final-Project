<?php
    include_once 'product_info.php';

    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDesc = $_POST['productDesc'];
    $productID = $_POST['productId'];
    
    $sql = "UPDATE products
            SET name = '$productName', price = '$productPrice', description = '$productDesc'
            WHERE id = $productID;";
    mysqli_query($conn, $sql);


    $admin_link;

    $sql = "SELECT * FROM products WHERE id = $productID;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    //Makes sure that the connection was established
    if($resultCheck > 0){
        $row = mysqli_fetch_assoc($result);
        $admin_link = $row['adminpageLink'];
    }

    //Go back to the page
    header("Location: $admin_link"."?update=success");