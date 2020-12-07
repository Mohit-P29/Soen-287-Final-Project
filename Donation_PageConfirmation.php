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


// Validating donation amount
if(empty($_POST["donationpage_donationamount"]))
   {
    $_SESSION["donationamount_error"]  = "Please enter a donation amount";
    $form_error=true;
   }
   else
   {
       if(preg_match("/[0-9]*/", $_POST["donationpage_donationamount"] ))
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
        if(preg_match("/xinyideng10/" , $full_email[0] ) && preg_match("/hotmail.com/" , $full_email[1]))
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
    
}

    $firstName =  $_SESSION["donation_first_name"];
 $lastName = $_SESSION["donation_last_name"];
$amount = $_POST["donationpage_donationamount"];

	  /**
 * PHP Template for using PHPMailer to send emails.
 * Before sending emails using the Gmail's SMTP Server, you must make some of the security and permission level     
 * settings under your Google Account Security Settings. Please create a dummy account as you will have to put in 
 * username and password
 * Make sure that 2-Step-Verification is disabled. Follow the link https://myaccount.google.com/security
 * Turn ON the "Less Secure App" access at https://myaccount.google.com/u/0/lesssecureapps 
 */

//Import the Plike thatHPMailer class into the global namespace
//You don't have to modify these lines. 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//Set the hostname of the mail server (We will be using GMAIL)
$mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication
$mail->Username = 'info.covaid@gmail.com';
//Password to use for SMTP authentication
$mail->Password = '!covaidTEAM123';
//Set who the message is to be sent from
$mail->setFrom('info.covaid@gmail.com', 'Covaid Inc.');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to email and name
$mail->addAddress($_POST["donationpage_email"],  $_SESSION["donation_first_name"]. " " . $_SESSION["donation_last_name"]
);
//Name is optional
//$mail->addAddress('recepientid@domain.com');

//You may add CC and BCC
//$mail->addCC("recepient2id@domain.com");
//$mail->addBCC("recepient3id@domain.com");

$mail->isHTML(true);

//You can add attachments. Provide file path and name of the attachments
$mail->addAttachment("kobe.jpg", "kobe.jpg");        
//Filename is optional
//$mail->addAttachment("images/profile.png"); 



//Set the subject line
$mail->Subject = 'Donation Confirmation Receipt';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->Body = "Thank you for your " .  $amount . "$" . " donation " . $firstName . " " . $lastName . "From the Covaid Team!";
//You may add plain text version using AltBody
//$mail->AltBody = "This is the plain text version of the email content";
//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message was sent Successfully!';
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
        <p> You Have Donated <?php echo $_POST["donationpage_donationamount"] ?>$</p>
        <br />
        <p> Digital Receipt Has Been Sent To The Following E-mail:  </p>
        <br />
        <p> <?php echo $_POST["donationpage_email"] ?> </p>
        <br />
        <div class="donationcomplete_check"><ion-icon name="checkmark-done-sharp"></ion-icon></div>
        
        
    </div>
    
</main>

<?php
    include('includes/footer.php');
    ?>