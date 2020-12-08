<?php
session_start();
include_once 'includes/covaid_database.php';
include_once 'includes/ConnectDB.php';

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
    $user_array=[];
    $_SESSION['dontsend']=(isset($_SESSION['dontsend']))?$_SESSION['dontsend']:array("Admin@domain.com");
    
        if($result>0){       
          while ( $row = mysqli_fetch_assoc($retval)){
              $check=TRUE;
             foreach($_SESSION['dontsend'] as $value){
        
               if($value===$row['user_id']){
                  $check=FALSE;
                }
               
              }
              if($check===TRUE){
                  array_push($user_array,array($row['user_first'],$row['user_id']));
              }
           
            }
        }

?>

<?php
//Header
$page = "Promotional Email";
include("includes/admin_header.php");


//Rerieve review information

?>
<main class="main_content">
    <header class="header">
        <ion-icon name="pricetags-outline" class="header-icon"></ion-icon>
        <span class="header-name">Reply to Reviews</span>
    </header>

    <div class="wrapper" style="padding-left:100px;padding-right:120px;">
        <div class="replycss" style="padding-left:320px; padding-top:50px;">
            <form method="POST" action="">
                <table style="border-spacing=15px;">
                    <tr>
                        <td>
                            <span style="font-size:1.5em;font-weight:bold;float:left;">User List: </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="overflow:auto;width:550px;hieght:250px;background-color:white;border:thick solid white;">
                                <table style="border-spacing:15px;">
                                    <?php
                            
                           foreach($user_array as $id){
                               $var1=$id[0];
                               $var2=$id[1];
                               if($var1===''){
                               echo "<tr><td>No Name Yet</td><td>$var2</td></tr>";
                               }
                               else{
                                    echo "<tr><td>$var1</td><td>$var2</td></tr>";
                               }
                                      
                           }     
                          ?>



                                </table>


                            </div>


                        </td>


                    </tr>

                </table>

                <br />
                <table style="border-spacing=25px;">

                    <tr>
                        <td><textarea name="adminReply" id="adminReply" rows="8" cols="80" style="font-size: large;" maxlength="250">Hello, this is COVAID adimistrator. New Promotions are coming soon. Be prepared for Chrismas discounts!</textarea></td>
                    </tr>
                    <tr>
                        <td>
                            Enter user_login_email that you do not want to send the email:
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <input type="text" style="width:250px;heigh:40px;border:thin solid gray;" name="remove" placeholder="user'email" /><br />

                        </td>
                        <td>
                            <input type="submit" style="position:absolute;left:850px;width:100px;height:30px;margin-top:-10px;background-color:dodgerblue;color:white;border:0 none;cursor:pointer;" value="confirm" name="removebutton" />

                        </td>
                        <td>
                            <input type="submit" style="position:absolute;left:960px;width:100px;height:30px;margin-top:-10px;background-color:gray;color:white;border:0 none;cursor:pointer;" value="Reset" name="reset" />

                        </td>
                    </tr>
                    <tr style ="padding-top: 1em;">
                           
                        <td><input type="submit" name="submit" class="edit_product" value="submit" /></td>
                    </tr>

                </table>



            </form>
        </div>
    </div>

    <?php
        if(isset($_POST['submit'])){
            $msg=(isset($_POST['adminReply']))?$_POST['adminReply']:"";
            $email="";
            $name="Customer";
            foreach($user_array as $mail){
                $email=$mail[1];
                $name=$email[0];
                include("includes/Mailer_review/mailerTemplate.php");
            }
            
                
            
            $_SESSION['dontsend']=array("Admin@domain.com");
            echo "<script type='text/javascript'>alert('Emails have been successfully sent to users');window.location.href='replyReview_response.php';</script>";
            
            
        }
       elseif(isset($_POST['removebutton'])){
           $email=(isset($_POST['remove']))?$_POST['remove']:"";
           if($email!==""){
              array_push($_SESSION['dontsend'],$email);
            }
           echo '<script type="text/javascript">window.location.href="replyReview_response.php";</script>';

    ?>
    <script>

    </script>


    <?php       }
    elseif(isset($_POST['reset'])){
        $_SESSION['dontsend']=array("Admin@domain.com");
           echo '<script type="text/javascript">window.location.href="replyReview_response.php";</script>';
    }
      
    ?>


</main>



<!-- JS script-->
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js "></script>
<script src="js/admin.js "></script>
</body>

</html>


<?php




    /*
    
    $sql = "UPDATE products
            SET name = '$productName', price = '$productPrice', specialPrice = $specialPrice, description = '$productDesc', inventory = '$productInventory', modified = '$modified'
            WHERE id = $productID;";
    mysqli_query($conn, $sql);

    
    
    //Goes back to the admin page of the product after updating the information
    $admin_link;
    $sql = "SELECT * FROM products WHERE id = $productID;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    //Makes sure that the connection was established
    if($resultCheck > 0){
        $row = mysqli_fetch_assoc($result);
        $admin_link = $row['adminpageLink'];
    }

    //Go back to the page
    header("Location: $admin_link"."?review=success");
    */

?>
