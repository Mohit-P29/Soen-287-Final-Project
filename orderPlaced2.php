<?php 
     session_start();
     include "includes/address.php";
     include("includes/header.php");
     include("includes/ConnectDB.php");   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
   
   $sql = "SELECT * FROM user_info";
   $retval = mysqli_query( $conn,$sql);
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
   }
   $_SESSION['user_id']=(isset($_SESSION['user_id']))?$_SESSION['user_id']:'No Email Shown';
    $result=mysqli_num_rows($retval);
    $last='';
    $first="";
    $email1="";
    $email2="";
    $phone1="";
    $phone2="";
        if($result>0){       
          while ( $row = mysqli_fetch_assoc($retval)){
    
            if ($row['user_id']===$_SESSION['user_id']){
                  $first=$row['user_first'];
                 $last=$row['user_last'];
                 $email1=$row['user_email1'];
                 $email2=$row['user_email2'];
                 $phone1=$row['phone1'];
                  $phone2=$row['phone2'];
            }
        }
      }

    $first2='';
    $last2='';
    $comp2='';
    $a1='';
    $a2='';
    $city='';
    $country='';
    $province='';
    $post='';
    $phone='';
    $sql = "SELECT * FROM useraddress";
    $retval = mysqli_query( $conn,$sql);
    $result=mysqli_num_rows($retval);
    if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
    }

    if($result>0){

          while ( $row = mysqli_fetch_assoc($retval)){
            if ($row['user_id']===$_SESSION['user_id']){
                  $first2=$row['first'];
                  $last2=$row['last'];
                  $comp2=$row['company'];
                  $a1=$row['address'];
                  $a2=$row['address2'];
                  $city=$row['city'];
                  $country=$row['country'];
                  $province=$row['province'];
                  $post=$row['post'];
                  $phone=$row['phone'];
            }
        }
      }
     $username='No name yet';
    $sql = "SELECT * FROM profile";
    $retval = mysqli_query( $conn,$sql);
    $result=mysqli_num_rows($retval);
    if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
    }

    if($result>0){

          while ( $row = mysqli_fetch_assoc($retval)){
             if($row['user_id']===$_SESSION['user_id']){
               $username=$row['user_name'];
             }
          }
    }
    
?>


<?php

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
$mail->setFrom('info.covaid@gmail.com', 'Covaid');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to email and name
$mail->addAddress($email1, $first." ".$last);
//Name is optional
//$mail->addAddress('recepientid@domain.com');

//You may add CC and BCC
//$mail->addCC("recepient2id@domain.com");
//$mail->addBCC("recepient3id@domain.com");

$mail->isHTML(true);

//You can add attachments. Provide file path and name of the attachments
$mail->addAttachment("file.txt", "File.txt");        
//Filename is optional
//$mail->addAttachment("images/profile.png"); 



//Set the subject line
$mail->Subject = 'PHPMailer SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->Body = "This is a PHP Test";
//You may add plain text version using AltBody
//$mail->AltBody = "This is the plain text version of the email content";
//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message was sent Successfully!';
}