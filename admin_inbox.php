<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Inbox</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css" />
</head>

<body id="body-id">
    <!-- Header -->
    <?php include("includes/admin_header.php"); ?>

    <main class="main_content">
        <header class="header">
            <ion-icon name="mail-open-outline" class="header-icon"></ion-icon>
            <span class="header-name">Inbox</span>
        </header>
        <div class="wrapper-grid layout2" id=scroll-1>
            <div class="half-page1">
            </div>
            <div class="half-page2">
            </div>
            <div class="full-page ">
                <table class="review-table table-sortable ">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Sender</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Reply</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>11/02/2019</td>
                            <td>Catriona Beaumont</td>
                            <td>Hi, I placed an order one month and I still haven't received it.</td>
                            <td>Unread</td>
                            <td><button type="button">Reply</button></td>
                        </tr>
                        <tr>
                            <td>07/02/2019</td>
                            <td>Sender</td>
                            <td>Message</td>
                            <td>Unread</td>
                            <td><button type="button">Reply</button></td>
                        </tr>
                        <tr>
                            <td>03/10/2019</td>
                            <td>Sender</td>
                            <td>Message</td>
                            <td>Read</td>
                            <td><button type="button">Reply</button></td>

                        </tr>
                        <tr>
                            <td>24/03/2019</td>
                            <td>Message</td>
                            <td>review</td>
                            <td>Read</td>
                            <td><button type="button">Reply</button></td>

                        </tr>
                        <tr>
                            <td>13/02/2019</td>
                            <td>Message</td>
                            <td>review</td>
                            <td>Read</td>
                            <td><button type="button">Reply</button></td>

                        </tr>
                        <tr>
                            <td>05/01/2019</td>
                            <td>Message</td>
                            <td>review</td>
                            <td>Unread</td>
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
                <div style="text-align: left; padding: 4em; font-size: large;">
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