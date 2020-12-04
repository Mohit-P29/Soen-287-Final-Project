<?php
    session_start();
?>

<?php
    include('includes/header.php')
    ?>

<main>
    
    <?php
        $_SESSION["donation_first_name"] = $_POST["donation_firstname"];
        $_SESSION["donation_last_name"] = $_POST["donation_lastname"];
    ?>



</main>

<?php
    include('includes/footer.php')
    ?>