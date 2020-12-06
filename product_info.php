<?php

include_once 'includes/covaid_database.php';

//Retrieve product information
$product_name;
$product_description;
$product_price;
$product_specialPrice;
$product_image1;
$product_image2;
$product_image3;
$product_image4;


$sql = "SELECT * FROM products WHERE id = $product_id;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

//Makes sure that the connection was established
if ($resultCheck > 0) {
    $row = mysqli_fetch_assoc($result);
    $product_name = $row['name'];
    $product_description = $row['description'];
    $product_price = $row['price'];
    $product_specialPrice = $row['specialPrice'];
    $product_image1;
    $product_image2;
    $product_image3;
    $product_image4;
}

//Header
$page_title = $product_name;
include("includes/header.php");
?>

<!-- Content of product page -->
<link rel="stylesheet" type="text/css" href="css/dummyProduct.css" />

<div class="wrapper-grid" id=scroll-1>
    <div class="product_image">
        <h2>Images</h2>

    </div>
    <div class="product_description">
        <h2><?php echo $product_name; ?></h2>
        <br /><br />
        <strong>Description:</strong> <?php echo $product_description; ?><br /><br />
        <strong>Price: </strong>
        <?php
        if ($product_specialPrice == null) {
            echo $product_price;
        } else {
            echo "<span style='color: red;'>\$$product_specialPrice </span>" . " <strike>\$$product_price</strike> ";
        }

        ?><br /><br />
        <label><strong>Quantity: </strong></label>
        <select name="mask_quantity">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br /><br /><br />
        <button type="button">Add to Cart</button>

    </div>
    <div class="product_review">
        <h2>Review</h2>
        <br />
    </div>

</div>


<?php
//footer
include("includes/footer.php");
?>