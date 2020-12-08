<?php
    session_start();
?>

<?php 


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $form_error = false;
    $_SESSION["footer_emailexclusives"] = $_POST["footer_emailexclusives"];
    
    if(empty($_SESSION["footer_emailexclusives"]))
    {
        $_SESSION["emailexclusives_errorfooter"]= "Empty Email";
        $form_error=true;
    }
    else
    {
        $full_email = explode("@" , $_SESSION["footer_emailexclusives"]);
        if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*/" , $full_email[0] ) && preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*/" , $full_email[1]))
        {
            $_SESSION["emailexclusives_errorfooter"]= "Suscribed";
        }
        else
        {
            $_SESSION["emailexclusives_errorfooter"]= "Incorrect Email";
            $form_error=true;
        }
    }
    
    
    if($form_error == true)
    {
        header("location: index.php");
    }
    else
    {
        header("location: Footer_email_exclusives_MAILER.php ");
    }
    
    
    
    
    
}
?> 