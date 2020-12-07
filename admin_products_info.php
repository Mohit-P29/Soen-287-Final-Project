<?php
include_once 'includes/covaid_database.php';
?>

<?php
//Header
$page = "Products";
include("includes/admin_header.php");

//Retrieve product information
$product_name;
$product_description;
$product_price;
$product_specialPrice;
$total_sales;
$product_inventory;
$product_link;
$product_image1;

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
    $total_sales = $row['sales'];
    $product_inventory = $row['inventory'];
    $product_link = $row['webpageLink'];
    $product_image1 = $row['image1'];
}

$number_reviews = 0; //Unknown
$average_review = 0; //Unknown
$sql1 = "SELECT COUNT(num_star) AS num_reviews FROM reviews WHERE product_id = $product_id;";
$result1 = mysqli_query($conn, $sql1);
$resultCheck1 = mysqli_num_rows($result1);
if ($resultCheck1 > 0) {
    $row1 = mysqli_fetch_assoc($result1);
    $number_reviews = $row1['num_reviews'];
}
if ($number_reviews != 0) {
    $sql2 = "SELECT SUM(num_star) AS star_sum FROM reviews WHERE product_id = $product_id;";
    $result2 = mysqli_query($conn, $sql2);
    $resultCheck2 = mysqli_num_rows($result2);
    if ($resultCheck2 > 0) {
        $row2 = mysqli_fetch_assoc($result2);
        $sum_reviews = $row2['star_sum'];
        $average_review = number_format($sum_reviews / $number_reviews, 1, '.', '');
    }
}
?>


<main class="main_content">
    <header class="header">
        <ion-icon name="pricetags-outline" class="header-icon"></ion-icon>
        <span class="header-name">Product - <?php echo $product_name; ?></span>
    </header>
    <div class="wrapper-grid layout2" id=scroll-1>
        <div class="half-page1" style="border: 0.5em solid rgba(126,7,7,1);">
            <strong>Product name: </strong><?php echo $product_name; ?><br />
            <strong>Price: </strong>$<?php echo $product_price; ?><br />
            <strong>Special Price: </strong>
            <?php
            if ($product_specialPrice == null) {
                echo "NONE";
            } else {
                echo "\$$product_specialPrice";
            }
            ?><br />
            <strong>Description: </strong><?php echo $product_description; ?><br /><br />
            <strong>Total number of sales: </strong><?php echo $total_sales; ?><br />
            <strong>Inventory: </strong><?php echo $product_inventory; ?><br /><br />
            <strong>Total number of reviews: </strong><?php echo $number_reviews; ?><br />
            <strong>Average reviews: </strong><?php echo $average_review; ?><br /><br />
            <a href="<?php echo $product_link; ?>" style="text-decoration: underline;">Product page</a><br /><br />
            <button type="button" class="edit_product" id="popup_button1">Edit</button>

        </div>
        <div class="half-page2" style="background: rgb(255,255,255);
background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(126,7,7,1) 100%);">
            <img src="<?php echo $product_image1; ?>" alt="No Image of Product Yet" width="50%" height="50%" />
        </div>
        <div class="full-page ">
            <table class="review-table table-sortable ">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Username</th>
                        <th>Review</th>
                        <th>Stars</th>
                        <th>Replied</th>
                        <th>Reply</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM reviews WHERE product_id = $product_id;;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $date = substr($row['review_date'], 0, 10);
                            $username = $row['username'];
                            $review_mess = $row['user_review'];
                            $rating = (float) $row['num_star'];
                            $review_id = $row['review_id'];
                            $admin_reply = $row['admin_reply'];

                            print("<tr> <td>$date</td>");
                            print("<td>$username</td>");
                            if (isset($review_mess)) {
                                print("<td>$review_mess</td>");
                            } else {
                                print("<td>---</td>");
                            }
                            print("<td style='text-align: center;'>$rating</td>");
                            if (isset($admin_reply)) {
                                print("<td style='text-align: center; font-weight: 700; font-size: 1.5em;'>&#10003</td>");
                            } else {
                                print("<td> </td>");
                            }


                            $str = <<<END
                            <td>
                                <form action="replyReview_response.php" method="POST" >
                                    <input type="hidden" name="reviewId" value="$review_id">
                                    <input type="submit" class='edit_product' value="Reply" />
                                </form>
                            </td>
                            END;
                            if (isset($review_mess)) {

                                print("$str");
                            } else {
                                print("<td>  </td>");
                                
                            }
                            print(" </tr>");
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Popup window to modify product information-->
<div class="popup" id="popup-1">
    <div class="overlay"></div>
    <div class="content" id="popup_box">
        <div id="close-btn">&times;</div>
        <h1>Product detail</h1>
        <form action="includes/updateProduct.php" method="POST" enctype="multipart/form-data">
            <div style="text-align: left; padding: 1em; padding-top: 2em; font-size: large;">
                <label style="font-weight: 700;">Product name: </label>
                <input type="text" name="productName" id="productName" value="<?php echo $product_name; ?>" style="font-size: large;" />
                <br /><br />
                <label style="font-weight: 700;">Price: </label>
                <input type="text" name="productPrice" id="productPrice" value="<?php echo $product_price; ?>" style="font-size: large;" />
                <br /><br />
                <label style="font-weight: 700;">Special Price: </label>
                <input type="text" name="specialPrice" id="specialPrice" value="<?php echo $product_specialPrice; ?>" style="font-size: large;" />
                <br /><br />
                <label style="font-weight: 700;">Description: </label>
                <textarea name="productDesc" id="productDesc" rows="4" cols="50" style="font-size: large;" /><?php echo $product_description; ?></textarea>
                <br /><br />
                <label style="font-weight: 700;">Inventory: </label>
                <input type="text" name="productInventory" id="productInventory" value="<?php echo $product_inventory; ?>" style="font-size: large;" />
                <br /><br />
                <label style="font-weight: 700;">Image: </label>
                <select name = "imageNum" style="font-size: large;">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <input type="file" name="file" id="file" style="font-size: large;" />
                <br /><br />
                <input type="hidden" name="productId" value="<?php echo $product_id; ?>">
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