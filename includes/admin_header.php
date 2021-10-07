<?php
//Allow corresponding icon to be highlighted
include_once "covaid_database.php";

$home = null;
$products = null;
$mail = null;
$users = null;
$count = 0;
if ($page == "Home") {
    $home = "active";
} elseif ($page == "Products") {
    $products = "active";
} elseif ($page == "Promotional Email") {
    $mail = "active";
} elseif ($page == "Users") {
    $users = "active";
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - <?php echo $page; ?></title>
    <link rel="stylesheet" type="text/css" href="css/admin.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">

</head>

<body id="body-id">

    <div class="container-nav" id="navbar">
        <nav class="nav-sidebar">
            <div>
                <div class="nav-header">
                    <ion-icon name="menu-outline" class="navbar-toggle" id="nav-toggle"></ion-icon>
                    <span class="company-name">COVAID</span>
                </div>
                <div class="nav-list" id="scroll-3">
                    <ul>
                        <li>
                            <a href="admin_promotionalEmail.php" class="nav-list-link <?php echo $mail; ?>">
                                <ion-icon name="mail-outline" class="nav-list-icon"></ion-icon>
                                <span class="nav-list-name">Send Email</span>
                            </a>
                        </li>
                        <li>
                            <div class="nav-list-link collapse <?php echo $products; ?>">
                                <a href="admin_products.php">
                                    <ion-icon name="pricetags-outline" class="nav-list-icon"></ion-icon>
                                </a>
                                <span class="nav-list-name">Products</span>
                                <ion-icon name="chevron-down-outline" class="collapse-link"></ion-icon>
                            </div>

                            <ul class="sublist">
                                <li><a href="admin_products.php" class="sublink">All Products</a></li>
                                <ol>
                                    <?php
                                    //Retrieve all products from the database
                                    $product_name;
                                    $adminlink;

                                    $sql = "SELECT * FROM products;";
                                    $result = mysqli_query($conn, $sql);
                                    $resultCheck = mysqli_num_rows($result);

                                    //Makes sure that the connection was established
                                    if ($resultCheck > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $product_name = $row['name'];
                                            $adminlink = $row['adminpageLink'];

                                            print("<li><a href=\"$adminlink\" class=\"sublink\">$product_name</a></li>");
                                        }
                                    }
                                    ?>
                                </ol>
                            </ul>
                        </li>
                        <li>
                            <a href="admin_users.php" class="nav-list-link <?php echo $users; ?>">
                                <ion-icon name="people-outline" class="nav-list-icon"></ion-icon>
                                <span class="nav-list-name">User</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <a href="index.php" class="nav-list-link">
                <ion-icon name="log-out-outline" class="nav-list-icon"></ion-icon>
                <span class="nav-list-name">Log Out</span>
            </a>
        </nav>
    </div>