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
            <span class="header-name">Product - Mask</span>
        </header>
        <div class="wrapper-grid layout2" id=scroll-1>
            <div class="half-page1">
                Product name: Mask<br /> Price: $20<br /> Total sales: 2243<br /> Total reviews: 209<br /> Average reviews: 3.4<br /><br />
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
            <form action="">
                <div style="text-align: left; padding: 1em; padding-top: 2em; font-size: large;">
                    <label>Product name: </label>
                    <input type="text" name="productName" id="productName" value="Mask" style="font-size: large;" />
                    <br /><br />
                    <label>Price: </label>
                    <input type="text" name="productPrice" id="productPrice" value="$20" style="font-size: large;" />
                    <br /><br />
                </div>
                <button type="submit" id="popup_button"> Submit </button>
            </form>
        </div>

    </div>


    <!-- JS script-->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js "></script>
    <script src="js/admin.js "></script>
</body>

</html>