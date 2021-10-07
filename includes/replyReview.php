<?php
    include_once 'covaid_database.php';

    $adminReply = $_POST['adminReply'];
    $reviewId = $_POST['reviewId'];
    date_default_timezone_set('America/Montreal');
    $reviewDate = date("Y/m/d h:i:s");

    $adminLink = $_POST['adminLink'];

    
    $sql = "UPDATE reviews
            SET admin_reply = '$adminReply', reply_date = '$reviewDate'
            WHERE review_id = $reviewId;";
    mysqli_query($conn, $sql);


    //Go back to the page
    header("Location: ../$adminLink"."?review_reply=success");