<?php
include('includes/header.php');
    ?>

        <section id="orderInfo">
        <h2>Please complete the following forms before checking out</h2>

        <form action="shoppingCart.php" method="post">
            <fieldset>
                <legend>Biling Address</legend>
                <input type="text"  id="fName">
                <input type="text" placeholder="Last Name" id="lName"></br>
                <input type="text" placeholder="Street Address" id="sAddress"> </br>
                <input type="text" placeholder="City" id="city"> <input type="text" placeholder="Province" id="province"></br>
                <input type="text" placeholder="Email" id="email"> <input type="text" placeholder="Phone Number" id="pNum">
            </fieldset>
            <fieldset>
                <legend>Payment Method</legend>
                <input type="text" placeholder="Card Number" id="card"> </br>
                <input type="text" placeholder="Name on card" id="cardName">
                <input type="text" placeholder="CVC number" id="cvcNum">
            </fieldset>


             <input type="submit" value="Sign in" onclick="return checkForms()"/>
        </form>
        </section>

        <script src="js/cart.js"></script>
<?php 
    include('includes/footer.php');
?>