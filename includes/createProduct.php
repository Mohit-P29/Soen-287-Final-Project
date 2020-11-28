<?php
include_once 'covaid_database.php';

$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productDesc = $_POST['productDesc'];
$productInventory = $_POST['productInventory'];
date_default_timezone_set('America/Montreal');
$created = date("Y/m/d h:i:s");
$modified = date("Y/m/d h:i:s");

$sql = "INSERT INTO products (name, description, price, created, modified, inventory) 
            VALUES('$productName', '$productDesc', '$productPrice', '$created', '$modified', '$productInventory');";
mysqli_query($conn, $sql);
$product_id = mysqli_insert_id($conn); //Retrieve id of product that was created


//Create product file in the root directory
chdir("..");

//Make sure a product with a similar name does not exists
$filename = preg_replace('/[\W]/', '', $productName);
$i = 1;
while (file_exists("dummy_product_$filename.php")) {
        if ($i > 2) {
                $filename = substr($filename, 0, -1);
        }
        $filename .= $i;
        $i++;
}

//Create a new product page
$myfile = fopen("dummy_product_$filename.php", "w") or die("Unable to open file!");
$txt = <<<END
<?php 
    \$product_id = $product_id;
    //chdir("..");
    include("product_info.php");    
?>
END;
fwrite($myfile, $txt);
fclose($myfile);

//Create a new admin product page
$myfile = fopen("admin_product_$filename.php", "w") or die("Unable to open file!");
$txt = <<<END
<?php 
    \$product_id = $product_id;
    //chdir("..");
    include("admin_product_info.php"); 
?>
END;
fwrite($myfile, $txt);
fclose($myfile);

//Update product information with product page and admin page link
$sql = "UPDATE products
            SET webpageLink = '/Soen-287-Final-Project/dummy_product_$filename.php', adminpageLink = '/Soen-287-Final-Project/admin_product_$filename.php'
            WHERE id = $product_id;";
mysqli_query($conn, $sql);

//Create a new admin page for the product




//Go back to the page
header("Location: ../admin_product.php?creation=$product_id");
