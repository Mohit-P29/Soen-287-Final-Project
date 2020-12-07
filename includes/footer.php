<!-- FOOTER => Social Media links, Contact Info, Emails, address, etc.  which will be reproduced on all pages on the website-->
        <footer id="discount_body_opacity3">
            <div class="footers">
                <div class="about">
                    <h1> About COV-AID </h1>
                    <ul class="foot">
                        <li><a href="#">Privacy Statement</a></li>
                        <li><a href="#">Terms Of Use</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>
                </div>

                <div class="custService">
                    <h1> Customer Service </h1>
                    <ul class="foot">
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Ordering Help</a></li>
                        <li><a href="#">Shipping Info</a></li>
                        <li><a href="#">Order Status</a></li>
                        <li><a href="#">Returns</a></li>
                    </ul>
                </div>

                <div class="social">
                    <h1> Social </h1>
                    <br />
                    <a class ="footer_socials" href="#"> <ion-icon name="logo-instagram"></ion-icon> </a>
                    <a class ="footer_socials" href="#"> <ion-icon name="logo-twitter"></ion-icon> </a>
                    <a class ="footer_socials" href="#"> <ion-icon name="logo-facebook"></ion-icon> </a>
                </div>

                <div class="emailpromos">
                    <h1> Email Exclusives </h1>
                    <form action="index.php" method="post">
                        <input type="email" id="email" name="footer_emailexclusives" placeholder="Enter email here">
                        <input type="submit" name="submit" value="Submit">
                    </form>
                    <p style="font-weight:200"> Receive notifications on when we restock our products! </p>
                    <br />
                    <span> <?php echo  $_SESSION["emailexclusives_errorfooter"] ?> </span>
                </div>
            </div>
            
            <a href="#"><img src="images/CompanyLogo.jpg" alt="Company Logo"></a>
            
            <p class="copyright"> © 2020 COV-AID, Inc. All Rights Reserved </p>
        </footer>
        
    </body>
</html>