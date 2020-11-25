<?php
    include_once 'product_info.php';

    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDesc = $_POST['productDesc'];
    date_default_timezone_set('America/Montreal');
    $created = date("Y/m/d h:i:s");
    $modified = date("Y/m/d h:i:s");

    $sql = "INSERT INTO products (name, description, price, created, modified) 
            VALUES('$productName', '$productDesc', '$productPrice', '$created', '$modified');";
    mysqli_query($conn, $sql);

    //Go back to the page
    header("Location: ../admin_product.php?creation=success");