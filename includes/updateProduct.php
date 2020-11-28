<?php
    include_once 'covaid_database.php';

    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $specialPrice = $_POST['specialPrice'];
    if(!is_numeric($specialPrice)){
        $specialPrice = 'NULL';
    }
    $productDesc = $_POST['productDesc'];
    $productID = $_POST['productId'];
    $productInventory = $_POST['productInventory'];
    date_default_timezone_set('America/Montreal');
    $modified = date("Y/m/d h:i:s");
    
    $sql = "UPDATE products
            SET name = '$productName', price = '$productPrice', specialPrice = $specialPrice, description = '$productDesc', inventory = '$productInventory', modified = '$modified'
            WHERE id = $productID;";
    mysqli_query($conn, $sql);

    
    //Goes back to the admin page of the product after updating the information
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