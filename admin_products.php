    <?php
    include_once "includes/covaid_database.php";
    $page = "Products";
    include("includes/admin_header.php");

    //Find top seller product
    $top_seller;
    $sql = 'SELECT * FROM products WHERE sales = (SELECT MAX(sales) FROM products);';
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
        $top_seller = $row['name'];
    }

    //Retrieve total amount of product sold
    $numProduct_sold;
    $sql = 'SELECT SUM(sales) AS sales_sum FROM products;';
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
        $numProduct_sold = $row['sales_sum'];
    }

    //Retrieve Total number of reviews
    $total_reviews;
    $sql1 = "SELECT COUNT(*) AS all_reviews FROM reviews;";
    $result1 = mysqli_query($conn, $sql1);
    $resultCheck1 = mysqli_num_rows($result1);
    if($resultCheck1 > 0){
        $row1 = mysqli_fetch_assoc($result1);
        $total_reviews = $row1['all_reviews'];
    }
    ?>


    <main class="main_content">
        <header class="header">
            <ion-icon name="pricetags-outline" class="header-icon"></ion-icon>
            <span class="header-name">Products</span>
        </header>
        <div class="wrapper-grid layout1" id=scroll-1>
            <div class="quarter-page1" style="background: rgb(115,14,197);
            background: linear-gradient(90deg, rgba(115,14,197,1) 0%, rgba(154,92,205,1) 43%, rgba(200,169,225,1) 100%);">
                <span style="margin-top: 1em;">
                    <strong>Top seller: </strong><br /> <?php echo $top_seller; ?>
                </span>

            </div>
            <div class="quarter-page2" style="background: rgb(2,159,1);
            background: linear-gradient(90deg, rgba(2,159,1,1) 0%, rgba(92,205,99,1) 43%, rgba(161,244,171,1) 100%);">
                <span>
                    <strong>Number of product sold: </strong><?php echo $numProduct_sold; ?>
                </span>

            </div>
            <div class="quarter-page3" style="background: rgb(255,165,0);
            background: linear-gradient(90deg, rgba(255,165,0,1) 0%, rgba(255,185,58,1) 43%, rgba(255,214,140,1) 100%);">
                <span style="margin-top: 1em;">
                    <strong>Number of reviews: </strong><?php echo $total_reviews; ?>
                </span>
            </div>
            <div class="quarter-page4" style="background: rgb(8,0,154);
            background: linear-gradient(90deg, rgba(8,0,154,1) 0%, rgba(14,14,156,1) 35%, rgba(0,178,214,1) 100%);">
                <button type="button " id="popup_button1">
                    <ion-icon name="add-circle-outline" style="margin-top: 0.5em;"></ion-icon>
                    <span style="position: relative; top: -0.3em;">Add a product</span>
                </button>

            </div>
            <div class="full-page ">
                <table class="product-table table-sortable ">
                    <thead>
                        <tr>
                            <th>Product name</th>
                            <th>Price</th>
                            <th># sales</th>
                            <th>Inventory</th>
                            <th># reviews</th>
                            <th>Avg. review</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //Retrieve all products from the database
                        $product_name;
                        $product_price;
                        $total_sales;
                        $product_inventory;
                        $number_reviews = 0; //Unknown
                        $average_review = 0; //Unknown
                        $adminlink;

                        $sql = "SELECT * FROM products;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        //Makes sure that the connection was established
                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $product_id = $row['id'];
                                $product_name = $row['name'];
                                $product_price = (float) $row['price'];
                                $total_sales = (float) $row['sales'];
                                $product_inventory = (float) $row['inventory'];
                                $adminlink = $row['adminpageLink'];

                                $sql1 = "SELECT COUNT(num_star) AS num_reviews FROM reviews WHERE product_id = $product_id;";
                                $result1 = mysqli_query($conn, $sql1);
                                $resultCheck1 = mysqli_num_rows($result1);
                                if($resultCheck1 > 0){
                                    $row1 = mysqli_fetch_assoc($result1);
                                    $number_reviews = $row1['num_reviews'];
                                }
                                if($number_reviews != 0){
                                    $sql2 = "SELECT SUM(num_star) AS star_sum FROM reviews WHERE product_id = $product_id;";
                                    $result2 = mysqli_query($conn, $sql2);
                                    $resultCheck2 = mysqli_num_rows($result2);
                                    if ($resultCheck2 > 0) {
                                        $row2 = mysqli_fetch_assoc($result2);
                                        $sum_reviews = $row2['star_sum'];
                                        $average_review = number_format($sum_reviews / $number_reviews, 1, '.', '');
                                    }
                                }


                                print("<tr> <td><a href=$adminlink >$product_name</a></td>");
                                print("<td>\$$product_price </td> <td>$total_sales</td>");
                                print("<td>$product_inventory </td>");
                                print("<td>$number_reviews</td> <td>$average_review</td> </tr>");
                                $number_reviews = 0;
                                $average_review = 0;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>


        </div>
    </main>

    <!-- Popup window for creating new page -->
    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="content" id="popup_box">
            <div id="close-btn">&times;</div>
            <h1>Create a new product</h1>
            <form action="includes/createProduct.php" method="POST">
                <div style="text-align: left; padding: 1em; padding-top: 2em; font-size: large;">
                    <label style="font-weight: 700;">Product name: </label>
                    <input type="text" name="productName" id="productName" style="font-size: large;" />
                    <br /><br />
                    <label style="font-weight: 700;">Price: </label>
                    <input type="text" name="productPrice" id="productPrice" style="font-size: large;" />
                    <br /><br />
                    <label style="font-weight: 700;">Description: </label>
                    <textarea name="productDesc" id="productDesc" rows="4" cols="50" style="font-size: large;" /></textarea>
                    <br /><br />
                    <label style="font-weight: 700;">Inventory: </label>
                    <input type="text" name="productInventory" id="productInventory" style="font-size: large;" />
                    <br /><br />
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