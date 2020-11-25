<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Product</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css" />
</head>

<body id="body-id">
    <!-- Header -->
    <?php include("includes/admin_header.php"); ?>


    <main class="main_content">
        <header class="header">
            <ion-icon name="pricetags-outline" class="header-icon"></ion-icon>
            <span class="header-name">Products</span>
        </header>
        <div class="wrapper-grid layout1" id=scroll-1>
            <div class="quarter-page1" style="background: rgb(115,14,197);
            background: linear-gradient(90deg, rgba(115,14,197,1) 0%, rgba(154,92,205,1) 43%, rgba(200,169,225,1) 100%);">
                <span>
                    Top seller:<br /> Mask
                </span>

            </div>
            <div class="quarter-page2" style="background: rgb(2,159,1);
            background: linear-gradient(90deg, rgba(2,159,1,1) 0%, rgba(92,205,99,1) 43%, rgba(161,244,171,1) 100%);">
                <span>
                    Number of product sold: 1000
                </span>

            </div>
            <div class="quarter-page3" style="background: rgb(255,165,0);
            background: linear-gradient(90deg, rgba(255,165,0,1) 0%, rgba(255,185,58,1) 43%, rgba(255,214,140,1) 100%);">
                <span>
                    Number of reviews: 1000
                </span>
            </div>
            <div class="quarter-page4" style="background: rgb(8,0,154);
            background: linear-gradient(90deg, rgba(8,0,154,1) 0%, rgba(14,14,156,1) 35%, rgba(0,178,214,1) 100%);">
                <button type="button "id="edit_product">
                    <ion-icon name="add-circle-outline"></ion-icon>
                    <span>Add a product</span>
                </button>

            </div>
            <div class="full-page ">
                <table class="product-table table-sortable ">
                    <thead>
                        <tr>
                            <th>Product name</th>
                            <th>Price</th>
                            <th># sales</th>
                            <th># reviews</th>
                            <th>Avg. review</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mask</td>
                            <td>$20</td>
                            <td>2243</td>
                            <td>209</td>
                            <td>3.5</td>
                        </tr>
                        <tr>
                            <td>Desinfectant</td>
                            <td>$10</td>
                            <td>8743</td>
                            <td>309</td>
                            <td>3.5</td>
                        </tr>
                        <tr>
                            <td>Lysol</td>
                            <td>$11</td>
                            <td>1237</td>
                            <td>138</td>
                            <td>3.5</td>
                        </tr>
                        <tr>
                            <td>Product 4</td>
                            <td>$15</td>
                            <td>1245</td>
                            <td>369</td>
                            <td>3.5</td>
                        </tr>
                        <tr>
                            <td>Product 4</td>
                            <td>$15</td>
                            <td>1245</td>
                            <td>369</td>
                            <td>3.5</td>
                        </tr>
                        <tr>
                            <td>Product 4</td>
                            <td>$15</td>
                            <td>1245</td>
                            <td>369</td>
                            <td>3.5</td>
                        </tr>
                        <tr>
                            <td>Product 4</td>
                            <td>$15</td>
                            <td>1245</td>
                            <td>369</td>
                            <td>3.5</td>
                        </tr>
                        <tr>
                            <td>Product 4</td>
                            <td>$15</td>
                            <td>1245</td>
                            <td>369</td>
                            <td>3.5</td>
                        </tr>
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
                    <label>Product name: </label>
                    <input type="text" name="productName" id="productName" style="font-size: large;" />
                    <br /><br />
                    <label>Price: </label>
                    <input type="text" name="productPrice" id="productPrice" style="font-size: large;" />
                    <br /><br />
                    <label>Description: </label>
                    <input type="text" name="productDesc" id="productDesc" style="font-size: large; height: 100px;" />
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