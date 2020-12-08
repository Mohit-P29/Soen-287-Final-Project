<?php
    include("includes/ConnectDB.php");  
    // setting up my select query
    $sql = "SELECT * FROM cart ";

    $result = $conn->query($sql);
    $totalQty=0;

    while($row = $result->fetch_assoc()) {
        $totalQty=$totalQty+$row["quantity"];
    }
?>

 <?php

$_SESSION["emailexclusives_errorfooter"]= "";

?>


<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $page_title;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/homepage.css">
        <link rel="stylesheet" type="text/css" href="css/Global.CSS">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
        <script type="text/javascript" src="js/Homepage_Discount_PopUp.js"></script>
        <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/mask_style.css">
        
    </head>
    
    <body>
        
        <!----------- HEADER => The Navigation bar that will be reproduced on all pages of the website ----------------->
        <header id="discount_body_opacity2"> 
            <a class="logo" href="index.php"><img src="images/CompanyLogo.jpg" alt="logo" ></a>
            <nav>
                <ul class="nav__links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="General_Products.php">Shop</a></li>
                    <li><a href="AboutUs.php">About Us</a></li>
                    <li><a href="ContactUs.php">Contact Us</a></li>
                </ul>
            </nav>
            <div class="cta cart">
                        <a href="shoppingCart.php"> <img src="images/cart.jpg" alt="cart" height="25px" width="25px"></a>
                <span><?php echo $totalQty?></span>
                        
            </div>
            <a class="cta" href="login.php"><img src="images/signin.jpg" alt="Sign In" height="25px" width="25px"></a>
            <a class="cta" href="Product_search.php"><ion-icon name="search-outline"></ion-icon></a>
            <p class="menu cta">Menu</p>
            
            
        </header>
        <div class="overlay">
            <a class="close">&times;</a>
            <div class="overlay__content">
                <a href="index.php">Home</a>
                <a href="General_Products.php">Shop</a>
                <a href="AboutUs.php">About Us</a>
                <a href="ContactUs.php">Contact Us</a>
                <a href="shoppingCart.php"><img src="images/cart.jpg" alt="Cart" height="50px" width="50px"></a>
                <a href="login.php"><img src="images/signin.jpg" alt="Sign In" height="50px" width="50px"></a>
            </div>
        </div>
        <script type="text/javascript" src="js/header_mobile_friendly.js"></script>
        
        