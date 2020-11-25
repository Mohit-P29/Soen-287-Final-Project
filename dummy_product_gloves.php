<?php 
    include_once 'includes/product_info.php';
    include("includes/header.php"); 
?>

<link rel="stylesheet" type="text/css" href="css/dummyProduct.css" />


<!-- Retrieve product information -->
<?php
    $product_name;
    $product_description;
    $product_price;
    $product_id;

    $sql = "SELECT * FROM products WHERE name = 'Gloves';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    //Makes sure that the connection was established
    if($resultCheck > 0){
        $row = mysqli_fetch_assoc($result);
        $product_name = $row['name'];
        $product_description = $row['description'];
        $product_price = $row['price'];
        $product_id = $row['id'];
    }
?>


<div class="wrapper-grid" id=scroll-1>
    <div class="product_image">
        <h2>Images</h2>

    </div>
    <div class="product_description">
        <h2><?php echo $product_name;?></h2>
        <br /><br />
        <strong>Description:</strong> <?php echo $product_description;?><br /><br />
        <strong>Price: </strong>$<?php echo $product_price;?><br /><br />
        <label><strong>Quantity: </strong></label>
        <select name="mask_quantity">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br/><br /><br />
        <button type="button">Add to Cart</button>

    </div>
    <div class="product_review">
        <h2>Review</h2>
        <br />
    </div>

</div>



</body>

</html>