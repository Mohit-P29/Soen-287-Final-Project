<?php
    session_start();
?>

<?php
$page_title = "Donation Process";
?>

<?php
    include('includes/header.php')
    ?>

<?php
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $_SESSION["donation_first_name"] = $_POST["donation_firstname"];
            $_SESSION["donation_last_name"] = $_POST["donation_lastname"];
            $form_error = false;
            
            if( !isset($_SESSION["donationpage_donationamount"]) || !isset($_SESSION["donationpage_fullname"]) || !isset($_SESSION["donationpage_cardnumber"]) || !isset($_SESSION["donationpage_expirationmonth"]) || !isset($_SESSION["donationpage_expirationyear"]) || !isset($_SESSION["donationpage_CVC"]) || !isset($_SESSION["donationpage_email"]) ) 
            {
                $_SESSION["donationpage_donationamount"]  = "";
                 $_SESSION["donationpage_fullname"] = "";
                 $_SESSION["donationpage_cardnumber"] = "";
                 $_SESSION["donationpage_expirationmonth"]= "";
                $_SESSION["donationpage_expirationyear"] = ""; 
                $_SESSION["donationpage_CVC"]= "";
                $_SESSION["donationpage_email"] = "";
                
                
            }
            
            
            
            if( !isset($_SESSION["donationamount_error"]) || !isset($_SESSION["donationcardname_error"]) || !isset($_SESSION["donationcardnumber_error"]) || !isset($_SESSION["donationexpdate_error"]) || !isset($_SESSION["donationcvc_error"]) || !isset($_SESSION["donationemail_error"])  ) 
            {
                $_SESSION["donationamount_error"]  = "";
                 $_SESSION["donationcardname_error"] = "";
                 $_SESSION["donationcardnumber_error"] = "";
                 $_SESSION["donationexpdate_error"]= "";
                $_SESSION["donationcvc_error"] = ""; 
                 $_SESSION["donationemail_error"]= "";
                
            }
            
//------------------------------Validating first name--------------------------//
if(empty($_POST["donation_firstname"]))
   {
       $_SESSION["error_firstname"] = "Please enter first name";
       $form_error = true;
   }
   else
   {
       if(preg_match("/^[a-zA-Z]*$/", $_POST["donation_firstname"]))
       {
           $_SESSION["error_firstname"] = "";
       }
       else
       {
           $_SESSION["error_firstname"] = "Please enter a correct first name";
           $form_error = true;
       }
   }

//---------------------------Validating last name-------------------------//
if(empty($_POST["donation_lastname"]))
   {
       $_SESSION["error_lastname"] = "Please enter last name";
       $form_error = true;
   }
   else
   {
       if(preg_match("/^[a-zA-Z]*$/", $_POST["donation_lastname"]))
       {
           $_SESSION["error_lastname"] = "";
       }
       else
       {
           $_SESSION["error_lastname"] = "Please enter a correct last name";
           $form_error = true;
       }
   }

 if($form_error == true)
 {
     header("location: index.php");
 }
        
        
        }
?>

<main>
    
    <div class="donationpage_pic">
        <img class="donationpage_picquality" src="images/redcross2.jpg" alt="red cross pic" width="500px" height="714px">
        <div class="donationpage_pictext"> 
            <p class="donationpage_pictext1"> Your donation goes where it is needed most. </p>
            <br />
            <p class="donationpage_pictext2"> Money donated to the Canadian Red Cross Fund is used to support the entire organization as this allows flexibility for the funds raised to be used wherever the current need is greatest. At home and around the world, the red cross is a sign of hope for people who have lost everything. Whether responding to the COVID-19 pandemic, providing disaster relief and recovery to those in Canada and abroad or helping other vulnerable people through our programs and services, your gift allows us to deliver help to where it is needed most. </p> 
        </div>
    </div>
    <div class="donationpage_title">
        <p class="donationpage_titletext"> Donation to Canadian RedCross </p>
        <br />
        <a href="index.php"><ion-icon class="donationpage_goback" name="return-up-back-outline"></ion-icon></a>
    </div>
    
    <form action="Donation_PageConfirmation.php" method="post">
        <fieldset class="donationpage_fieldset">
            <legend> <ion-icon name="wallet-outline"></ion-icon> <strong> Donation Amount </strong> </legend>
            <label> I Want to Donate </label>
            <input type="text" name="donationpage_donationamount" id="donationpage_donationamount" value="<?php echo $_SESSION["donationpage_donationamount"] ?>" placeholder="Enter an amount">
            <span> <?php echo $_SESSION["donationamount_error"] ?> </span>
            
        </fieldset>
        <br />
        <fieldset class="donationpage_fieldset">
            <legend>
            <ion-icon name="lock-closed"></ion-icon>
            <strong> Payment Method </strong> 
            </legend>
            <label> Cardholder's Full Name </label>
            <input type="text" name="donationpage_fullname" id="donationpage_fullname" value="<?php echo $_SESSION["donationpage_fullname"] ?>" placeholder="John Doe">
            <span> <?php echo $_SESSION["donationcardname_error"] ?> </span>
            <br />
            <br />
            <label> Card Number </label>
            <input type="text" name="donationpage_cardnumber" placeholder="Number is 16 digits" value="<?php echo $_SESSION["donationpage_cardnumber"] ?>" maxlength="16">
            <span> <?php echo $_SESSION["donationcardnumber_error"] ?> </span>
            <br />
            <label> Expiration Date </label>
            <input class="donationpage_expdate" type="text" name="donationpage_expirationmonth" id="donationpage_expirationmonth" value="<?php echo $_SESSION["donationpage_expirationmonth"] ?>" maxlength="2" placeholder="MM">
            <input class="donationpage_expdate" type="text" name="donationpage_expirationyear" id="donationpage_expirationyear" value="<?php echo $_SESSION["donationpage_expirationyear"] ?>" maxlength="2" placeholder="YY">
            <span> <?php echo $_SESSION["donationexpdate_error"] ?></span>
            <br />
            <br />
            <label> CVC </label>
            <input class="donationpage_cvc" type="text" name="donationpage_CVC" id="donationpage_CVC" value="<?php echo $_SESSION["donationpage_CVC"] ?>" maxlength="3" placeholder="XXX">
            <span> <?php echo $_SESSION["donationcvc_error"] ?> </span>
        </fieldset >
        <br />
        <fieldset class="donationpage_fieldset">
            <legend>
                <ion-icon name="mail"></ion-icon> <strong> E-mail Receipt </strong>
            </legend>
            <input type="email" name="donationpage_email" id="donationpage_email" value="<?php echo $_SESSION["donationpage_email"] ?>" placeholder="client@example.com">
            <input type="submit" name="donationpage_button" id="donationpage_button" value="Make Donation">
            <span> <?php echo $_SESSION["donationemail_error"] ?></span>
        </fieldset>
    </form>



</main>

<?php
    include('includes/footer.php')
    ?>