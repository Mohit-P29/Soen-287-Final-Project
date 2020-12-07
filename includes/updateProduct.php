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
    $imageNumber = $_POST['imageNum'];
    $imageFile = $_FILES['file'];
    $imageNewName = "";

    
    if($imageFile != null){
        $imageFileName = explode('.', $_FILES['file']['name']);
        $imageFileNameExt = strtolower(end($imageFileName));
        $allowedImageExt = array('jpg', 'jpeg', 'png');

        if(in_array($imageFileNameExt, $allowedImageExt)){
            if($_FILES['file']['error'] === 0){
                $imageNewName = 'images/Product Images/'.uniqid('', true).".".$imageFileNameExt;
                move_uploaded_file($_FILES['file']['tmp_name'], "../".$imageNewName);

                $sql = "UPDATE products
                        SET image$imageNumber = '$imageNewName'
                        WHERE id = $productID;";
                mysqli_query($conn, $sql);
    
            }else{
                echo "There was an error uploading file!";
            }
    
        }else{
            echo "You cannot upload files of this type!";
        }
    }
    


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
    //header("Location: ../$admin_link"."?update=success");