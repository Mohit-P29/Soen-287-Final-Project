<?php
session_start();
?>

<?php 
$page_title = "Thank You!";
?>

<?php
    include('includes/header.php');
?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{      
    $form_error = false;
    $_SESSION["donationpage_donationamount"] = $_POST["donationpage_donationamount"];
    $_SESSION["donationpage_fullname"] = $_POST["donationpage_fullname"];
    $_SESSION["donationpage_cardnumber"] = $_POST["donationpage_cardnumber"];
    $_SESSION["donationpage_expirationmonth"] = $_POST["donationpage_expirationmonth"];
    $_SESSION["donationpage_expirationyear"] = $_POST["donationpage_expirationyear"];
    $_SESSION["donationpage_CVC"] = $_POST["donationpage_CVC"];
    $_SESSION["donationpage_email"] = $_POST["donationpage_email"];
    


// Validating donation amount
if(empty($_POST["donationpage_donationamount"]))
   {
    $_SESSION["donationamount_error"]  = "Please enter a donation amount";
    $form_error=true;
   }
   else
   {
       if(preg_match("/^\d+$/", $_POST["donationpage_donationamount"] ))
       {
           $_SESSION["donationamount_error"]  = "Good amount";
       }
       else
       {
           $_SESSION["donationamount_error"]  = "Incorrect Format";
           $form_error = true;
       }
   }
    
    
// Validating card name
if(empty($_POST["donationpage_fullname"]))
{
    $form_error = true;
    $_SESSION["donationcardname_error"] ="Please enter Cardholder's Full Name";
}
    else
    {
        $full_name = explode(" ", $_POST["donationpage_fullname"] );
            if(preg_match("/^([a-zA-Z' ]+)$/" , $full_name[0]) && preg_match("/^([a-zA-Z' ]+)$/" , $full_name[1]) )
            {
                $_SESSION["donationcardname_error"] = "Good Full Name";
            }
        else
        {
            $_SESSION["donationcardname_error"] = "Bad Full Name";
            $form_error = true;
        }
    }


// Validating card number
if(empty($_POST["donationpage_cardnumber"]))
{
    $_SESSION["donationcardnumber_error"] ="Enter card number";
    $form_error=true;
}
    else
    {
        if(preg_match("/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/" , $_POST["donationpage_cardnumber"] ))
        {
            $_SESSION["donationcardnumber_error"] = "Good card number";
        }
        else
        {
            $_SESSION["donationcardnumber_error"] = "Enter correct number format";
            $form_error=true;
        }
    }
    
    
// Validating card ExpDate
if(empty($_POST["donationpage_expirationmonth"]) || empty($_POST["donationpage_expirationyear"]) )
{
   $_SESSION["donationexpdate_error"]= "Please enter expiration date";
    $form_error=true;
}
    else
    {
        if(preg_match("/[0-9][0-9]/" , $_POST["donationpage_expirationmonth"] ) && preg_match("/[0-9][0-9]/" , $_POST["donationpage_expirationyear"] ))
        {
            $_SESSION["donationexpdate_error"]= "Correct Expiration Date";        
        }
        else
        {
            $_SESSION["donationexpdate_error"]= "Incorrect Expiration";            
            $form_error=true;
        }
    }
    
    
// Validating card CVC
    if(empty($_POST["donationpage_CVC"]))
    {
        $form_error=true;
        $_SESSION["donationcvc_error"]="Empty CVC";
        
    }
    else
    {
        if(preg_match("/[0-9][0-9][0-9]/" , $_POST["donationpage_CVC"]))
           {
              $_SESSION["donationcvc_error"]="Good CVC"; 
           }
           else
           {
               $form_error=true;
               $_SESSION["donationcvc_error"]="Incorrect CVC";
           }
    }
    
    
//  Validating donation email 
    if(empty($_POST["donationpage_email"]))
    {
        $_SESSION["donationemail_error"]= "Empty Email";
        $form_error=true;
    }
    else
    {
        //xinyideng10@hotmail.com
        $full_email = explode("@" , $_POST["donationpage_email"]);
        if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*/" , $full_email[0] ) && preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*/" , $full_email[1]))
        {
            $_SESSION["donationemail_error"]= "Good Email";
        }
        else
        {
            $_SESSION["donationemail_error"]= "Bad Email";
            $form_error=true;
        }
    }
    
    
// Validating if any errors in form
    if($form_error == true)
    {
         header("location: DonationPage.php");
    }
    else
    {
        header("location: Donation_Redirect.php");
    }
    
}
	  
  ?>  
    
  


<main>
<?php
    echo ("thanks");
    ?>
    
    <div class="donationpage_pic">
        <img class="donationpage_picquality" src="images/redcross2.jpg" alt="red cross pic" width="500px" height="730px">
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
    
    <div class="donationcomplete_container">
      <h1 class="donationcomplete_header"> Donation Successful! </h1>
        <br />
        <p> Thank You <?php echo $_SESSION["donation_first_name"] ?> For Your Donation! </p>
        <br />
        <p> You Have Donated <?php echo $_SESSION["donationpage_donationamount"] ?>$</p>
        <br />
        <p> Digital Receipt Has Been Sent To The Following E-mail:  </p>
        <br />
        <p> <?php echo $_SESSION["donationpage_email"] ?> </p>
        <br />
        <div class="donationcomplete_check"><ion-icon name="checkmark-done-sharp"></ion-icon></div>
        
        
    </div>
    
</main>

<?php
    include('includes/footer.php');
    ?>