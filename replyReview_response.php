
<?php
include_once 'includes/covaid_database.php';
?>

<?php
//Header
$page = "Reply Reviews";
include("includes/admin_header.php");

$review_id = $_POST['reviewId'];

//Retrieve review information
$review_date;
$review_username;
$review_stars;
$review_message;
$product_id;
$admin_reply;

$sql1 = "SELECT * FROM reviews WHERE review_id = $review_id;";
$result1 = mysqli_query($conn, $sql1);
$resultCheck1 = mysqli_num_rows($result1);
if ($resultCheck1 > 0) {
    $row1 = mysqli_fetch_assoc($result1);
    $review_date = $row1['review_date'];
    $review_username = $row1['username'];
    $review_stars = $row1['num_star'];
    $review_message = $row1['user_review'];
    $product_id = $row1['product_id'];
    $admin_reply = $row1['admin_reply'];

}


//Retrieve product information
$product_name;
$adminLink;

$sql = "SELECT * FROM products WHERE id = $product_id;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

//Makes sure that the connection was established
if ($resultCheck > 0) {
    $row = mysqli_fetch_assoc($result);
    $product_name = $row['name'];
    $adminLink = $row['adminpageLink'];
}
?>
<main class="main_content">
    <header class="header">
        <ion-icon name="pricetags-outline" class="header-icon"></ion-icon>
        <span class="header-name">Reply to Reviews</span>
    </header>

    <div class="wrapper">
        <div class="replycss">
        <form action="includes/replyReview.php" method="POST">
                <strong>Product name: </strong><?php echo $product_name; ?><br /><br />
                <strong>Review date: </strong><?php echo $review_date; ?><br />
                <strong>Customer's name: </strong><?php echo $review_username; ?><br /><br />
                <strong>Customer's rating: </strong><?php echo $review_stars; ?><br /><br />
                <strong>Customer's review: </strong><?php echo $review_message; ?><br /><br />
                <label style="font-weight: 700;">Admin's reply: </label> <br />
                <textarea name="adminReply" id="adminReply" rows="6" cols="50" style="font-size: large;" /><?php echo $admin_reply; ?></textarea>
                <span style = "font-size: small;">**Use \' when typing '</span>
                <br />
                <br />
                <input type="hidden" name="reviewId" value="<?php echo $review_id; ?>">
                <input type="hidden" name="adminLink" value="<?php echo $adminLink; ?>">

            
            <button type="submit" name="submit" class="edit_product"> Submit </button>
        </form>
        </div>
    </div>


</main>



<!-- JS script-->
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js "></script>
<script src="js/admin.js "></script>
</body>

</html>


<?php




    /*
    
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
    header("Location: $admin_link"."?review=success");
    */

?>