<?php 
    include_once 'includes/product_info.php';
?>

<!-- Retrieve product information -->
<?php
    $product_name;
    $product_description;
    $product_price;
    $total_sales;

    $sql = "SELECT * FROM products WHERE id = 47;"; //ID of mask
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    //Makes sure that the connection was established
    if($resultCheck > 0){
        $row = mysqli_fetch_assoc($result);
        $product_name = $row['name'];
        $product_description = $row['description'];
        $product_price = $row['price'];
        $total_sales = $row['sales'];
    }
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Mask</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css" />
</head>

<body id="body-id">
    <!-- Header -->
    <?php include("includes/admin_header.php"); ?>


    <main class="main_content">
        <header class="header">
            <ion-icon name="pricetags-outline" class="header-icon"></ion-icon>
            <span class="header-name">Product - <?php echo $product_name;?></span>
        </header>
        <div class="wrapper-grid layout2" id=scroll-1>
            <div class="half-page1">
                Product name: <?php echo $product_name;?><br /> 
                Price: $<?php echo $product_price;?><br /> 
                Description: <?php echo $product_description;?><br />
                Total sales: <?php echo $total_sales;?><br /> 
                Total reviews: unknown<br /> 
                Average reviews: unknown<br /><br />
                <button type="button" id="edit_product">Edit</button>

            </div>
            <div class="half-page2">
                <span>Sales over the weeks</span><br />
                <img src="image/graph-mask.png" alt="Mask graph" width="50%" height="50%" />
            </div>
            <div class="full-page ">
                <table class="review-table table-sortable ">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Username</th>
                            <th>Review</th>
                            <th>Stars</th>
                            <th>Reply</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>11/02/2019</td>
                            <td>Catriona Beaumont</td>
                            <td>This product is so amazing, it changed my life. Love it. Really good quality</td>
                            <td>5</td>
                            <td><button type="button">Reply</button></td>
                        </tr>
                        <tr>
                            <td>07/02/2019</td>
                            <td>User</td>
                            <td>review</td>
                            <td>5</td>
                            <td><button type="button">Reply</button></td>
                        </tr>
                        <tr>
                            <td>03/10/2019</td>
                            <td>User</td>
                            <td>review</td>
                            <td>2</td>
                            <td><button type="button">Reply</button></td>

                        </tr>
                        <tr>
                            <td>24/03/2019</td>
                            <td>User</td>
                            <td>review</td>
                            <td>4</td>
                            <td><button type="button">Reply</button></td>

                        </tr>
                        <tr>
                            <td>13/02/2019</td>
                            <td>User</td>
                            <td>review</td>
                            <td>1</td>
                            <td><button type="button">Reply</button></td>

                        </tr>
                        <tr>
                            <td>05/01/2019</td>
                            <td>User</td>
                            <td>review</td>
                            <td>1</td>
                            <td><button type="button">Reply</button></td>

                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Popup window for reset password -->
    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="content" id="popup_box">
            <div id="close-btn">&times;</div>
            <h1>Product detail</h1>
            <form action="includes/updateProduct.php" method="POST">
                <div style="text-align: left; padding: 1em; padding-top: 2em; font-size: large;">
                    <label>Product name: </label>
                    <input type="text" name="productName" id="productName" value="<?php echo $product_name;?>" style="font-size: large;" />
                    <br /><br />
                    <label>Price: </label>
                    <input type="text" name="productPrice" id="productPrice" value="<?php echo $product_price;?>" style="font-size: large;" />
                    <br /><br />
                    <label>Description: </label>
                    <input type="text" name="productDesc" id="productDesc" value="<?php echo $product_description;?>" style="font-size: large; height: 100px;" />
                    <br /><br />
                    <input type="hidden" name="productId" value="47">
                </div>
                <button type="submit" name="submit" id="popup_button"> Submit </button>
            </form>
        </div>

    </div>


    <!-- JS script-->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js "></script>
    <script src="js/admin.js "></script>
</body>

</html>