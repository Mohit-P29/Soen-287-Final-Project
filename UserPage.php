<?php 
     session_start();
     include "includes/address.php";
     include("includes/header.php");
     include("includes/ConnectDB.php");   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
   $id=(isset($_SESSION['user_id']))?$_SESSION['user_id']:"NoID";
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
    
            if ($row['user_id']===$id){
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
            if ($row['user_id']===$id){
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
             if($row['user_id']===$id){
               $username=$row['user_name'];
             }
          }
    }

//-------------------------Card-------------------------------
    $sql = "SELECT * FROM payment";
    $card="";
    $payfirst="";
    $paylast="";
    $payaddress="";
    $paycity="";
    $paycountry="";
    $payprovince="";
    $paypost="";
    $payphone="";
    $paycvc="";
  
    $retval = mysqli_query( $conn,$sql);
    $result=mysqli_num_rows($retval);
    if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
    }

    if($result>0){

          while ( $row = mysqli_fetch_assoc($retval)){
             if($row['user_id']===$id){
                 $card=$row['cardnumber'];
                 $payfirst=$row['pay_first'];
                 $paylast=$row['pay_last'];
                 $payaddress=$row['pay_address'];
                 $paycity=$row['pay_city'];
                 $paycountry=$row['pay_country'];
                 $payprovince=$row['pay_province'];
                 $paypost=$row['pay_post'];
                 $payphone=$row['pay_phone'];
                 $paycvc=$row['pay_cvc'];
             }
          }
    }


//----------------------------------------------------------
 //-----------------------Color---------------------------------
    $sql = "SELECT * FROM profile";
    $color="#FFFFFF";
    $retval = mysqli_query( $conn,$sql);
    $result=mysqli_num_rows($retval);
    if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
    }

    if($result>0){

          while ( $row = mysqli_fetch_assoc($retval)){
             if($row['user_id']===$id){
                $color=$row['picture'];
             }
          }
    }

//--------------------------------------------------------


   
    
?>

<script>
    document.title = "<?php echo (isset($_SESSION['user_id'])?$_SESSION['user_id']."'s space":"Unknown space"); ?>";

</script>
<link rel="stylesheet" href="css/UserPage.css" />
<main>
<div style="width:100%;height:100%; position:absolute;top:20px;">
    <div class="div0">
        <!--Profile picture div-->
        <div class="div1" id="div1">

            <span id="EditP" class="EditP"></span>
            <div class="EditDiv" id="Ediv">
                <div class="EditDive-content" style="cursor:pointer;float:left;font-size:1.3em;margin-left:30px;">
                    Edit Profile
                </div>
            </div>
            <form action='' id="proform" method="post" enctype="multipart/form-data">
                <table class="div1_table">
                    <tr>
                        <td colspan="2">
                        
                            <div class="ProP" style="background-color:<?php echo (isset($color))?$color:""; ?>;color:gray;text-align:center;font-size:3.3em;padding:35px;" id='propic'>
                                <span><?php echo substr($username,0,1)?></span>
                            </div>

                        </td>
                    </tr>
                    <tr>
                    <td colspan="2" style="padding-left:50px; display:none;" id="colorcell" >
                        <input type="color" value="#FFFFFF"  id="colortag" name="colortag" style="width:85px;height:30px;" />
                    </td>
                    
                    
                    </tr>

                    <tr>
                        <td colspan="2"><span class="ProName"><input type="text" class="ProNameInput" name="username" id="ProNameInput" value="<?php echo $username;?>" /></span></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td style=" background-color: deepskyblue;" class="ConfirmSpan" id="ConfirmSpan"><input type="submit" value=confirm style="border:0 none;background-color: transparent;font-family: 'Times New Roman', Times, serif;font-size: 1.1em;" name="upload" /></td>
                        <td style="background-color: gainsboro;" class="CancelSpan" id="CancelSpan"><span>Cancel</span></td>
                    </tr>
                </table>
            </form>
        </div>
        <script type="text/javascript">
        document.getElementById('Ediv').onmouseover=function(){
            document.getElementById('colorcell').style.display="table-cell";
        }
        
        
        </script>
        <!--List of functions div-->
        <div class="div2">
            <table class="div2_table">
                <tr>
                    <td><span class="list" id="MyOrder">My Order</span></td>
                </tr>
                <tr>
                    <td><span class="list" id="MyAddress">My Address</span></td>
                </tr>
                <tr>
                    <td><span class="list" id="MyWallet">My Wallet</span></td>
                </tr>
                <tr>
                    <td><span class="list" id="MyAccount">My Account</span></td>
                </tr>
                <tr>
                    <td><span class="list" id="changepwd">Change Password</span></td>
                </tr>
                <tr>
                    <td>
                        <form action='' method="post"><input class='list' type="submit" style="color:white;font-weight:900;font-size:1.0em; font-family:sans-serif;border:0 none;background-color:red;width:120px;margin-left:-5px;float:left;height:40px;" id="logout" name="logout" value="Log Out" /></form>
                    </td>
                    <script>
                        document.getElementById('logout').onmousemove = function() {
                            document.getElementById('logout').style.background = "gray";
                        }
                        document.getElementById('logout').onmouseout = function() {
                            document.getElementById('logout').style.background = "red";
                        }

                    </script>


                </tr>

            </table>
        </div>
    </div>
    <!--My account-->
    <div class="div3" id="div3">
        <div>
            <span class="listTitle">My Account<br /></span>
            <br />
            <span style="font-size: 1.3em;">View and edit your personal info below</span>
        </div>
        <div style="height: 700px;">



            <form class="MyAccountForm" action="" method="post" id="MyAccountForm">
                <table class="MyAccountTable">
                    <tr>
                        <td><label class="UserEmail" id="UserEmail">Login Email:<br /><?php echo $_SESSION['user_id'] ?></label>
                            <div class="popup" id="popup">
                                <span class="popuptext" id="myPopup">Login Email cannot be changed!</span>
                            </div>


                        </td>
                    </tr>
                    <tr>
                        <td>
                            First Name<br /><input type="text" id="SavedFirstName" style="padding-left:0px;"  name="user_first" class="Inputfield" value="<?php echo $first; ?>" placeholder="eg. Kate" maxlength="10" />
                        </td>


                        <td>Last Name<br /><input type="text" id="SavedLastName" style="padding-left:0px;"  name="user_last" class="Inputfield" value="<?php echo $last; ?>" placeholder="eg.Sims" maxlength="10" /></td>

                    </tr>
                    <tr>
                        <td><label for="ContactEmail" id="ChangedLable0">Contact Email</label>
                            <label id="ChangedIcon1" class="plus"></label>
                            <div class="popup" id="ChangedIcon1">
                                <span class="popuptext" id="myPopup2">Add the second Email</span>
                            </div>

                            <br />
                            <input type="text" id="ContactEmail" class="Inputfield" style="padding-left:0px;"  name="user_email1" value="<?php echo $email1; ?>" placeholder="Katesims@(hotmail.com/gmail.com/outlook.com)" />
                        </td>

                        <td><label for="SavedPhone" id="ChangedLabel1">Phone1</label>
                            <label id="ChangedIcon2" class="plus"></label>
                            <div class="popup" id="ChangedIcon2">
                                <span class="popuptext" id="myPopup3">Add the second phone</span>
                            </div>

                            <br />
                            <input type="text" id="SavedPhone" name="user_phone1" style="padding-left:0px;"  class="Inputfield" value="<?php echo $phone1; ?>" placeholder="001-234-567-8901" maxlength="16" />
                        </td>
                    </tr>
                    <tr id="HiddenRow" style="display: none;">
                        <td colspan="2" id="HiddenInfo" style="display:none;">
                            <label id="ChangedLable2">Contact Email 2</label>
                            <label id="ChangedIcon3" class="plus"></label>
                            <br />
                            <input type="text" style="width: 545px;padding-left:0px;" id="ContactEmail2" name="user_email2" class="Inputfield2" placeholder="Katesims@(hotmail.com/gmail.com/outlook.com)" value="<?php echo $email2; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" id="HiddenInfo2" style="display:none;">
                            <label id="ChangedLable3">Phone 2</label>
                            <label id="ChangedIcon4" class="plus"></label>
                            <br />
                            <input type="text" style="width: 545px;padding-left:0px;" class="Inputfield2" name="user_phone2" id="Phone2" placeholder="001- 415-789-3981" maxlength="16" value="<?php echo $phone2; ?>" />
                        </td>
                    </tr>




                    <tr>
                        <td><input class="UpdateAccount" type="submit" id="update_info" name="submit1" value="Update Info" /></td>
                    </tr>



                    <tr>
                        <td id="notify" style="text-align: left;background-color:#4CAF50;color: white;display: none;"></td>
                    </tr>
                </table>
            </form>

        </div>
    </div>
    
    
    <!--Change Password-->
    <div class="div8" id="div8">
     <span class="listTitle">Change Password</span>
     <form class="MyOtherForm" style="margin-top:40px;padding-top:35px;" id="changeform" action="" method="post" >
        <table style="border-spacing:30px; text-align:left;">
            <tr><td>Enter Old Password: </td><td><input type="text" style="padding-left:0px;"  class="Inputfield" id="oldpassword" name="oldpassword" placeholder="Old Password" required/></td></tr>
            <tr><td>Enter New Password:</td><td> <input type="text" style="padding-left:0px;"  class="Inputfield"  id="newpassword" name="newpassword" placeholder="New Password" required/></td></tr>
            <tr><td>Repeat New Password: </td><td><input type="text" style="padding-left:0px;"  class="Inputfield" id="newpassword2" name="newpassword2" placeholder="Repeat Password" required/></td></tr>
            <tr><td style="font-size:0.8em;"><br/>Password contains at least 8 characters, 1 lower character, 1 upper character,1 digit</td></tr>
            <tr><td><input type="submit" value="Submit" id="submit_changepwd" name="submit_changepwd" class="UpdateAccount"/></td></tr>
        </table>

    </form>
 
    
    
    </div>
    <?php
      if(isset($_POST['submit_changepwd'])){
         $id=$_SESSION['user_id'];
         $check="false";
         $old=(isset($_POST['oldpassword']))?$_POST['oldpassword']:"";
             $new=(isset($_POST['newpassword']))?$_POST['newpassword']:"";
        $sql = "SELECT * FROM user_info WHERE user_id='$id'";
      $retval = mysqli_query( $conn,$sql);
      if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
      }
       $result=mysqli_num_rows($retval);
     
        if($result>0){       
          while ( $row = mysqli_fetch_assoc($retval)){
             if($old==$row["password"]){
                 $check="true";
             }
                 
        }
      }
    if($check==="true"){
       $sql = "UPDATE user_info SET password='$new' WHERE user_id='$id'";
       $retval = mysqli_query( $conn,$sql);
      if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
      }
      echo "<script>alert('Successfully Change the password');</script>";
        
    }
          else{
              echo "<script>alert('The old password is incorrect! Fail to change the password!');</script>";
              
          }
          
    }
    
    
    ?>
    
    
    
    
    <!--My wallet-->
    <div class="div4" id="div4">
        <span class="listTitle">My Wallet</span>
        <br /><br />
        <span style=font-size:1.3em>Save your credit and debit card details for faster checkout</span>
        <div id="NoWallet" style="display:block;">
            <form class="MyOtherForm">
                <label style="font-size: 1.5em;color:black;text-align: center;">You haven't saved any cards yet<br /></label>
                <label style="font-size:1.2em;color:dimgray;text-align: center">Securely save your payment details when you place an order at checkout.</label>
                <br />
                <br />
                <input type="button" class="UpdateAccount" id="addWallet" value="Add Bank Card" />
            </form>
        </div>
        <div id="addcard" style="display:none;">
            <form class="MyOtherForm" id="addwalletform" style="padding-top:25px;" method="post" action="">
                <table style="float:left;text-align:left;border-spacing:15px;">
                    <tr>
                        <td>Card Number:</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input id="cardnumber" style="padding-left:0px;"  name="cardnumber" type="text" class="Inputfield2" placeholder="1234 5678 1234 5678" required maxlength="19" /></td>
                    </tr>
                    <tr>
                        <td>First Name:<br /><input type="text" style="padding-left:0px;"  id="pay_first" name="pay_first" class="Inputfield" placeholder="eg. Kate" required /></td>
                        <td>Last Name:<br /><input type="text" style="padding-left:0px;"  id="pay_last" name="pay_last" class="Inputfield" placeholder="eg. Sims" required /></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Address:<br /><input type="text" style="padding-left:0px;"  id="pay_address" class="Inputfield2" name="pay_address" placeholder="1234 Rue Somewhere" required />

                        </td>
                    </tr>
                    <tr>
                        <td>City:</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="text" id="pay_city" class="Inputfield2" style="padding-left:0px;" name="pay_city" placeholder="Montreal" required />

                        </td>
                    </tr>
                    <tr>
                        <td><label for="Country">Country<br /><select class="Select" name="pay_country" id="pay_country" required>
                                    <option value="canada" selected>Canada</option>
                                    <option value="United">United States</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="France">France</option>
                                    <option vaue="China">China</option>
                                    <option value="Germany">Germany</option>
                                    <option value="United Kingdom">United Kingdom</option>

                                </select></label></td>
                        <td><label for="Province">Province<br /><select class="Select" name="pay_province" id="pay_province" required>
                                    <option value="Quebec" selected>
                                        Quebec
                                    </option>
                                    <option value="Brithish Columbia">British Columbia</option>
                                    <option value="Ontario">Ontario</option>
                                    <option value="Yukon Territory">Yukon Territory</option>
                                    <option value="Nova Scotia">Nova Scotia</option>



                                </select></label></td>


                    </tr>
                    <tr>
                        <td>Zip/Postal Code::<br /><input type="text" id="pay_post" style="padding-left:0px;"  name="pay_post" class="Inputfield" placeholder="A1BC2D" required maxlength="6" /></td>
                        <td>Phone:<br /><input type="text" id="pay_phone" name="pay_phone" style="padding-left:0px;"  class="Inputfield" placeholder="001-234-567-8901" required /></td>
                    </tr>
                    <tr>
                        <td>CVC/Security Code:<br /><input type="text" id="pay_cvc" style="padding-left:0px;"  name="pay_cvc" placeholder="3-digit number" required maxlength="3" /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="pay_info" id="pay_info" class="UpdateAccount" style="border:0 none;" value="Add card to wallet" /></td>
                        <td><input type="button" id="cancel_addcard" name="cancel_addcard" class="UpdateAccount" style="background-color:lightgray;border:0 none;" value="Cancel" /></td>

                    </tr>
                </table>
            </form>
           
            <?php
              $remove=(isset($_SESSION['CardRemoved']))?$_SESSION['CardRemoved']:'';
              if(isset($_POST['removeCard'])){
                  echo "yes";
                 $id=$_SESSION['user_id'];
                 $sql = "UPDATE payment SET cardnumber='',pay_first='',pay_last='',pay_address='',pay_city='',pay_country='', pay_province='',pay_post='',pay_phone='',pay_cvc='' WHERE user_id='$id'";
                 mysqli_query($conn,$sql);
                 $conn->close();
                 $_SESSION['CardRemoved']='true';

                  
            ?>
            
            <script>
            alert("Successfully remove the bank card!");
            window.location.href="UserPage.php";
            
            </script>
                  
        <?php }
            $remove=(isset($_SESSION['CardRemoved']))?$_SESSION['CardRemoved']:'';
            if($remove=='true'){ ?>
            
           <script>
            document.getElementById('div4').style.display="block";
            document.getElementById('div3').style.display="none";
            document.getElementById('showcard').style.display="none";
             document.getElementById('NoWallet').style.display="block";
             document.getElementById('addcard').style.display="none";
            
            </script>
                
              
    <?php   $_SESSION['CardRemoved']="false";    }
             
            
            ?>

        </div>
       
        <div id="showcard" style="display:none;">
            <form class="MyOtherForm" style="padding-top:40px;" method="post" action="">
                <span style="font-size:1.4em;font-weight:bold;">Bank Card One<br/></span>
                <table style="border-spacing:15px; text-align:left;float:left;">
                    <?php
                      if($card!==''){
                             echo "<tr><td>";
                             echo "First Name: ".$payfirst;
                             echo "</td></tr>";
                             echo "<tr><td>";
                             echo "Last Name: ".$paylast;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Address: ".$payaddress;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "City: ".$paycity;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Country: ".$paycountry;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Province: ".$payprovince;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Postal Code: ".$paypost;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "payphone: ".$payphone;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "CVC: "."***";
                             echo "</td></tr>";             
                             
                    ?>
                    
                    <script>
                        document.getElementById('showcard').style.display="block";
                        document.getElementById('NoWallet').style.display="none";
                    
                    </script>
                
                
             <?php }   ?>
                <tr><td >
                    
                     <input type="button" id="editCard" name="editCard" class="UpdateAccount" value="Edit"/>
                    
                    </td>
                    
                    <td><input type="submit" id="removeCard" name="removeCard" class="UpdateAccount" style="background-color:lightgray;border:0 none;" value="remove"/></td>
                    
                    </tr>
                </table>

            </form>
            


        </div>
    </div>
    <script>
        document.getElementById('editCard').onclick=function(){
             document.getElementById('showcard').style.display="none";
            document.getElementById('addcard').style.display = "block";
             
            
        }
        document.getElementById('removeCard').onclick=function(){
            document.getElementById('showcard').style.display="none";
            document.getElementById('NoWallet').style.display="block";
            
        }
        document.getElementById('removeCard').onmouseover=function(){
            document.getElementById('removeCard').style.backgroundColor="gray";
            
        }
        document.getElementById('removeCard').onmouseout=function(){
            document.getElementById('removeCard').style.backgroundColor="lightgray";
            
        }
        
        
        
        document.getElementById('pay_cvc').onfocus = function() {
            if (document.getElementById('pay_cvc').type == "text") {
                document.getElementById('pay_cvc').type = "password";
            }
        }
        //----------------------------------------------------------------------------------------------
        var pay1 = false;
        var pay2 = false;
        var pay3 = false;
        var pay4 = false;
        var pay5 = false;
        var pay6 = false;
        var pay7 = false;
        var pay8 = false;

        function pvalidate1(input) {
            var pass = input.value;

            if (pass.match(/^[0-9]{4}[ ]{1}[0-9]{4}[ ]{1}[0-9]{4}[ ]{1}[0-9]{4}/g)) {
                pay1 = true;

            } else {
                pay1 = false;
            }
        }

        function pvalidate2(input) {
            var pass = input.value;

            if (pass.match(/[A-Za-z]+/g)) {
                pay2 = true;

            } else {
                pay2 = false;
            }

        }

        function pvalidate3(input) {
            var pass = input.value;

            if (pass.match(/[A-Za-z]+/g)) {
                pay3 = true;

            } else {
                pay3 = false;
            }

        }

        function pvalidate4(input) {
            var pass = input.value;
            if (pass.match(/[A-Za-z]+/g)) {
                pay4 = true;

            } else {
                pay4 = false;
            }
        }

        function pvalidate5(input) {
            var pass = input.value;
            if (pass.match(/^[A-Z]{1}[0-9]{1}[A-Z]{1}[0-9]{1}[A-Z]{1}[0-9]{1}/g)) {
                pay5 = true;

            } else {
                pay5 = false;
            }
        }

        function pvalidate6(input) {
            var pass = input.value;
            if (pass.match(/^[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{4}/g)) {
                pay6 = true;

            } else {
                pay6 = false;
            }
        }

        function pvalidate7(input) {
            var pass = input.value;
            if (pass.match(/[0-9]{3}/g)) {
                pay7 = true;

            } else {
                pay7 = false;
            }
        }

        document.getElementById('pay_info').onclick = function() {
            pvalidate1(document.getElementById('cardnumber'));

            pvalidate2(document.getElementById('pay_first'));

            pvalidate3(document.getElementById('pay_last'));

            pvalidate4(document.getElementById('pay_city'));

            pvalidate5(document.getElementById('pay_post'));

            pvalidate6(document.getElementById('pay_phone'));

            pvalidate7(document.getElementById('pay_cvc'));



            if (pay1 & pay2 & pay3 & pay4 & pay5 & pay6 & pay7) {
                alert("Successful Update Bank Card!");
                document.getElementById('addwalletform').onsubmit = function() {
                    return true;
                }
            } else {
                var er1 = (pay1 == false) ? "Card Number: invalid\n" : "Card Number: valid\n";
                var er2 = (pay2 == false) ? "First Name: invalid\n" : "First Name: valid\n";
                var er3 = (pay3 == false) ? "Last Name: invalid\n" : "Last Name: valid\n";
                var er4 = (pay4 == false) ? "City: invalid\n" : "City: valid\n";
                var er5 = (pay5 == false) ? "Postal Code: invalid\n" : "Postal Code: valid\n";
                var er6 = (pay6 == false) ? "Phone: invalid\n" : "Phone: valid\n";
                var er7 = (pay7 == false) ? "CVC Code: invalid\n" : "CVC code: valid\n";



                alert(er1 + er2 + er3 + er4 + er5 + er6 + er7);
                document.getElementById('addwalletform').onsubmit = function() {
                    return false;
                }

            }
        }









        //----------------------------------------------------------------------------------------------------        
        document.getElementById('addWallet').onclick = function() {
            document.getElementById('NoWallet').style.display = "none";
            document.getElementById('addcard').style.display = "block";

        }
        document.getElementById('cancel_addcard').onclick = function() {
            var cardnum="<?php echo $card; ?>";
            if(cardnum==""){
                document.getElementById('NoWallet').style.display="block";
                document.getElementById('addcard').style.display="none";
                document.getElementById('showcard').style.display="none";
                
            }
            else{
               document.getElementById('NoWallet').style.display="none";
                document.getElementById('addcard').style.display="none";
                document.getElementById('showcard').style.display="block"; 
            }
        
        }
        document.getElementById("editCard").onclick=function(){
            document.getElementById('showcard').style.display="none";
            document.getElementById('addcard').style.display="block";
        }
        
        document.getElementById('cancel_addcard').onmousemove = function() {
            document.getElementById('cancel_addcard').style.backgroundColor = "gray";
        }
        document.getElementById('cancel_addcard').onmouseout = function() {
            document.getElementById('cancel_addcard').style.backgroundColor = "lightgray";
        }

    </script>
    <?php
    if(isset($_POST["pay_info"])){
                $card=isset($_POST['cardnumber'])?$_POST['cardnumber']:'';
                $first=isset($_POST['pay_first'])?$_POST['pay_first']:'';
                $last=isset($_POST['pay_last'])?$_POST['pay_last']:'';
                $a1=isset($_POST['pay_address'])?$_POST['pay_address']:'';
                $city=isset($_POST['pay_city'])?$_POST['pay_city']:'';
                $country=isset($_POST['pay_country'])?$_POST['pay_country']:'';
                $province=isset($_POST['pay_province'])?$_POST['pay_province']:'';
                $post=isset($_POST['pay_post'])?$_POST['pay_post']:'';
                $phone=isset($_POST['pay_phone'])?$_POST['pay_phone']:'';
                $cvc=isset($_POST['pay_cvc'])?$_POST['pay_cvc']:'';
                 $id=$_SESSION['user_id'];
                 $sql = "UPDATE payment SET cardnumber='$card',pay_first='$first',pay_last='$last',pay_address='$a1',pay_city='$city',pay_country='$country', pay_province='$province',pay_post='$post',pay_phone='$phone',pay_cvc='$cvc' WHERE user_id='$id'";
                 mysqli_query($conn,$sql);
                 $_SESSION['cardAdded']='true';
                 $conn->close(); ?>
            <script>
            window.location.href="UserPage.php";
            </script>
    
        
<?php    } ?>
    
<?php 
    $_SESSION['cardAdded']=(isset($_SESSION['cardAdded']))?$_SESSION['cardAdded']:"";
    if($_SESSION['cardAdded']==='true'){ 
    
    ?>
    <script>
         document.getElementById('div4').style.display="block";
        document.getElementById('div3').style.display="none";
        document.getElementById('showcard').style.display="block";
        document.getElementById('NoWallet').style.display="none";
        document.getElementById('addcard').style.display="none";
    
    
    </script>
        
   <?php
        $_SESSION['cardAdded']="false";               
        }
    
    
    ?>
    
     
    
    <!--My addresses-->
    <div class="div5" id="div5">
        <div>
            <span class="listTitle">My Addresses</span>
            <br /><br />
            <span id="node" style="font-size:1.3em;">Add and manage the address you use often</span>
        </div>

        <div id="DivForAddress" style="border-top:thin solid black; font-size:1.2em;padding-top: 20px;">

            <table id="AddressT1" style="display: none;border-bottom: thin solid lightgray;border-spacing:15px;">

                <?php 
                         if($first2!='' && $last2!='' && $phone!=''){
                             echo "<tr><td><span style=\"font-weight:bold;color:black; font-size:1.4em;\">";
                             echo "Address One";
                             echo "</span></td></tr>";
                             echo "<tr><td>";
                             echo "First Name: ".$first2;
                             echo "</td></tr>";
                             echo "<tr><td>";
                             echo "Last Name: ".$last2;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Company: ".$comp2;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Addesss Line1: ".$a1;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Address Line2: ".$a2;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "City: ".$city;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Country: ".$country;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Province: ".$province;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Postal Code: ".$post;
                             echo "</td></tr>";
                              echo "<tr><td>";
                             echo "Phone: ".$phone;
                             echo "</td></tr>"; 
                       
                      


               } ?>
                <tr>
                    <td><span id="dataedit1" style="font-weight:bold;color:black;text-decoration:underline; font-size:1.2em;cursor:pointer;">Edit</span></td>

                    <td>
                        <form action="" method="post"><input type="submit" id="datadelete1" name="delete_address" style="border: 0 none; background-color: white; color:black;text-decoration:underline; font-size:1.1em;font-weight:bold;" value="Remove" /></form>
                    </td>
                    <script type="text/javascript">

                    </script>
                </tr>
            </table>

          

            <table id="AddressT3">
                <tr>
                    <td>
                        <label><span class="UpdateAccount" style="margin-top:30px;" id="AddAddress">Add New Address</span></label>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php 
       
                         if($first2!='' && $last2!='' && $phone!=''){
                      echo "<script>
        
                    document.getElementById('AddressT1').style.display = 'block';
                 
                    document.getElementById('AddAddress').style.display='none';

                      </script>";
                         }
    
    
    ?>
    <!--My orders-->
    <div class="div6" id="div6">
        <span class="listTitle">My Orders</span>
        <br /><br />
        <span style="font-size:1.3em;">Check the status of orders or browse through your past purchases</span>
        <div id="NoOrder">
            <form class="MyOtherForm">
                <label>You haven't placed any orders yet</label><br /><br />
                <label><span class="UpdateAccount" id="ShopNow">Shop Now</span></label>
            </form>
        </div>
        <div id="showOrder" style="margin-top:30px;overflow:auto;height:550px;">
         <?php
          
            $sql = "SELECT * FROM user_order WHERE userID='$id'";
             $retval = mysqli_query( $conn,$sql);
             $result=mysqli_num_rows($retval);
             if(! $retval ) {
                die('Could not get data: ' . mysqli_error());
            } 
           if($result>0){

             echo "<div ><table style='table-layout:fixed;border-spacing:20px;text-align:right;'><tr style='font-size:1.4em;font-weight:bold;text-align:right;'><td>Image</td><td>Name</td><td>Quantity</td><td>Price</td><td colspan='3'>Purchase Time</td>
             <td colspan='3'>Arrival Time</td>
             </tr>";
             while ( $row = mysqli_fetch_assoc($retval)){
                     echo "<tr>";
                     echo "<td><image width='80px;' height='60px' src='".$row['image']."'/></td>";
                     echo "<td>".$row['productName']."</td>";
                     echo "<td>".$row['quantity']."</td>";
                    echo "<td>".$row['price']."</td>";
                    echo "<td colspan='3'>".$row['oDay']."  ".$row['oMonth']."  ".$row['oYear']."</td>";
                   echo "<td colspan='3'>".$row['aDay']."  ".$row['aMonth']."  ".$row['aYear']."</td>";
                   
                    echo "</tr>";
                  
                }
                 
              echo "</table></div>";
               echo "<script>document.getElementById('showOrder').style.display='block';document.getElementById('NoOrder').style.display='none';</script>";
               
               
           }
                    
            
           ?>
        
        
        </div>
    </div>
    <!--Add addresses form-->
    <div class="div7" id="div7">
        <div class="div7-content">
            <!--Close button-->
            <span class="close" id="close1">X</span>
            <br />
            <!--Header-->
            <span class="AddressFormTitle">Add New Address</span>

            <!--The form contains the inputfields to add address-->
            <form class="AddressForm" action="" method="post" id="AddressForm">
                <table class="AddressFormTable">
                    <!--Name section-->
                    <tr>
                        <td>
                            <label for="FirstName">*First Name<br /><input type="text" style="padding-left:0px;" id="FirstName" name="first2" class="Inputfield" value="" placeholder="First Name" required /></label>
                        </td>
                        <td>
                            <label for="LastName">*Last Name<br /><input type="text" style="padding-left:0px;" id="LastName" name="last2" class="Inputfield" value="" placeholder="Last Name"required /></label>
                        </td>
                    </tr>
                    <!--Comany name section-->
                    <tr>
                        <td colspan="2"><label for="CompanyName">Company Name<br /><input type="text" style="padding-left:0px;" id="CompanyName" name="company" class="Inputfield2" value="" placeholder="Company" /></label></td>

                    </tr>
                    <!--Addres section-->
                    <tr>
                        <td colspan="2"><label for="Address">Address<br /><input type="text" id="Address" style="padding-left:0px;" name="address1" class="Inputfield2" value="" placeholder="1234 Rue Somewhere"  required /></label></td>

                    </tr>
                    <!--The alternative address section-->
                    <tr>
                        <td colspan="2"><label for="AddressLine2">Address - Line 2<br /><input type="text" style="padding-left:0px;" id="AddressLine2" class="Inputfield2" name="address2" value="" placeholder="1234 Rue Somewhere" /></label>

                        </td>
                    </tr>
                    <!--City-->
                    <tr>
                        <td colspan="2"><label for="City">City<br /><input type="text" id="City" name="city" style="padding-left:0px;" class="Inputfield2" placeholder="City" value="" required /></label></td>
                    </tr>

                    <tr>
                        <td><label for="Country">Country<br /><select class="Select" name="country" id="Country">
                                    <option value="canada">Canada</option>
                                    <option value="United">United States</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="France">France</option>
                                    <option vaue="China">China</option>
                                    <option value="Germany">Germany</option>
                                    <option value="United Kingdom">United Kingdom</option>

                                </select></label></td>
                        <td><label for="Province">Province<br /><select class="Select" name="province" id="Province" required>
                                    <option value="Quebec">
                                        Quebec
                                    </option>
                                    <option value="Brithish Columbia">British Columbia</option>
                                    <option value="Ontario">Ontario</option>
                                    <option value="Yukon Territory">Yukon Territory</option>
                                    <option value="Nova Scotia">Nova Scotia</option>



                                </select></label></td>
                    </tr>
                    <tr>
                        <td><label for="PostalCode">Zip/Postal Code<br /><input type="text" placeholder="A1B2CD"  style="padding-left:0px;"id="PostalCode" name="post" class="Inputfield" value="" required /></label></td>
                        <td><label for="Phone">Phone<br /><input type="text" id="Phone" style="padding-left:0px;" name="phone" class="Inputfield" value="" placeholder="1234567890000" required /></label></td>
                    </tr>

                    <tr>
                        <td><input type="submit" style="margin-left: 0px; border:thin solid dodgerblue;height: 50px;font-family: 'Times New Roman', Times, serif;" id="button_addA" name="button_addA" class="button_addA" value="Add Address" />
                            <lable id="AddressFormCancel" class="AddressFormCancel">Cancel</lable>
                        </td>
                        <td id="notify2" style="text-align: left;color: #4CAF50;display: none;"></td>
                    </tr>

                </table>
            </form>



        </div>

    </div>
</div>
</main>
<?php 
            $_SESSION['fixed_AddressPage']=(isset($_SESSION['fixed_AddressPage']))?$_SESSION['fixed_AddressPage']:'false';

            if($_SESSION['fixed_AddressPage']==='true'){ ?>
<script>
    document.getElementById('div5').style.display = 'block';
    document.getElementById('div3').style.display = "none";

</script>

<?php  $_SESSION['fixed_AddressPage']='false'; }




            if(isset($_POST["submit1"])){
                $first=isset($_POST['user_first'])?$_POST['user_first']:'';
                $last=isset($_POST['user_last'])?$_POST['user_last']:'';
                $contactE1=isset($_POST['user_email1'])?$_POST['user_email1']:'';
                 $contactE2=isset($_POST['user_email2'])?$_POST['user_email2']:'';
                $phone1=isset($_POST['user_phone1'])?$_POST['user_phone1']:'';
                $phone2=isset($_POST['user_phone2'])?$_POST['user_phone2']:'';
                  
                 $id=$_SESSION['user_id'];
                 $sql = "UPDATE user_info SET user_first='$first',user_last='$last',user_email1='$contactE1',user_email2='$contactE2',phone1='$phone1',phone2='$phone2' WHERE user_id='$id'";
                 mysqli_query($conn,$sql);
                 $conn->close();
        
                 ?>


<script>
    alert('Successfull Update!');
    window.location.href = 'UserPage.php';

</script>


<?php }
            elseif(isset($_POST['button_addA'])){
                $first=isset($_POST['first2'])?$_POST['first2']:'';
                $last=isset($_POST['last2'])?$_POST['last2']:'';
                $comp=isset($_POST['company'])?$_POST['company']:'';
                $a1=isset($_POST['address1'])?$_POST['address1']:'';
                $a2=isset($_POST['address2'])?$_POST['address2']:'';
                $city=isset($_POST['city'])?$_POST['city']:'';
                $country=isset($_POST['country'])?$_POST['country']:'';
                $province=isset($_POST['province'])?$_POST['province']:'';
                $post=isset($_POST['post'])?$_POST['post']:'';
                $phone=isset($_POST['phone'])?$_POST['phone']:'';

                 $id=$_SESSION['user_id'];
                 $sql = "UPDATE useraddress SET first= '$first',last='$last',company='$comp',address='$a1',address2='$a2',city='$city',country='$country',province='$province',post='$post',phone='$phone' WHERE user_id='$id'";
                 mysqli_query($conn,$sql);
                 $conn->close(); 
                 $_SESSION['fixed_AddressPage']="true";  ?>

<script>
    alert('Successfull Update!');
    window.location.href = 'UserPage.php';

</script>

<?php  } 


            elseif(isset($_POST['delete_address'])){ 
                 $id=$_SESSION['user_id'];
                 $sql = "UPDATE useraddress SET first= '',last='',company='',address='',address2='',city='',country='',province='',post='',phone='' WHERE user_id='$id'";
               
                 mysqli_query($conn,$sql);
                 $conn->close();
                   $_SESSION['fixed_AddressPage']="true";?>
<script>
    alert('Successfull Update!');
    window.location.href = 'UserPage.php';

</script>


<?php      }
            elseif(isset($_POST['logout'])){
                session_destroy(); ?>
<script>
    alert("You have logged out!");
    window.location.href = 'login.php';

</script>

<?php  }
else if(isset($_POST['upload'])){
     $id=$_SESSION['user_id'];
    $username=(isset($_POST['username']))?$_POST['username']:'';
    $pic=(isset($_POST['colortag']))?$_POST['colortag']:'';
    mysqli_query($conn,"UPDATE profile SET picture='$pic',user_name='$username'  where user_id='$id'");
    mysqli_query($conn,$sql);
    echo "<script>window.location.href='UserPage.php'</script>";
}

?>


<script type="text/javascript">
       document.getElementById("dataedit1").onclick = function() {
        document.getElementById("div7").style.display = "block";
        document.getElementById("Province").value = "<?php echo $prov;?>";
        document.getElementById("City").value = "<?php echo $city;?>";
        document.getElementById("PostalCode").value = "<?php echo $po;?>";
        document.getElementById("Phone").value = "<?php echo $p3;?>";
        firstname.value = "<?php echo $firstname2;?>";
        lastname.value = "<?php echo $lastname2;?>";
        document.getElementById("CompanyName").value = "<?php echo $comp;?>";
        document.getElementById("Address").value = "<?php echo $address1;?>";
        document.getElementById("Address2").value = "<?php echo $address2;?>";
        document.getElementById("Country").value = "<?php echo $coun;?>";


    }
    //---------------------Update info------------------------------------
    var v1 = false;
    var v2 = false;
    var v3 = false;
    var v4 = false;
    var v5 = false;

    function validate1(input) {
        var pass = input.value;
        if (pass.match(/[A-Za-z]*/g)) {
            v1 = true;
        } else {
            v1 = false;
        }
    }

    function validate2(input) {
        var pass = input.value;
        if (pass.match(/[A-Za-z]*/g)) {
            v2 = true;
        } else {
            v2 = false;
        }
    }

    function validate3(input) {
        var pass = input.value;
        if (pass.match(/^[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{4}/g) || pass == "") {
            v3 = true;

        } else {
            v3 = false;
        }
    }

    function validate4(input) {
        var pass1 = input.value;
        if (pass1 == "") {
            v4 = true;
        }
        //at least 6 characters in the prefix
        else if (pass1.match(/^[a-zA-Z0-9]([\._-]?[A-Za-z0-9]){2,}@gmail\.com$/g)) {
            v4 = true;
            //at least 6 characters in the prefix
        } else if (pass1.match(/^[A-Za-z0-9]([\._-]?[A-Za-z0-9]){2,}@hotmail\.com$/g)) {
            v4 = true;
            //at least 6 characters in the prefix
        } else if (pass1.match(/^[A-Za-z0-9]([\._-]?[A-Za-z0-9]){2,}@outlook\.com$/g)) {
            v4 = true;
        } else {
            v4 = false;
        }
    }

    function validate5(input) {
        var pass = input.value;
        if (pass.match(/^[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{4}/g) || pass == "") {
            v5 = true;

        } else {
            v5 = false;
        }
    }
    document.getElementById('update_info').onclick = function() {
        validate1(document.getElementById("SavedFirstName"));

        validate2(document.getElementById('SavedLastName'));

        validate3(document.getElementById('SavedPhone'));

        validate4(document.getElementById('ContactEmail2'));

        validate5(document.getElementById('Phone2'));


        if (v1 && v2 && v3 && v4 && v5) {
            document.getElementById("MyAccountForm").onsubmit = function() {
                return true;
            }
        } else {

            document.getElementById("MyAccountForm").onsubmit = function() {
                return false;
            }
            var value1 = (v1 == false) ? "invalid" : "valid";
            var value2 = (v2 == false) ? "invalid" : "valid";
            var value3 = (v3 == false) ? "invalid" : "valid";
            var value4 = (v4 == false) ? "invalid" : "valid";
            var value5 = (v5 == false) ? "invalid" : "valid";

            alert("Please check input field!\n" + "First name: " + value1 + "\nLast name: " + value2 + "\nPhone1: " + value3 + "\nContact Email2: " + value4 + "\nPhone2: " + value5);



        }


    }
    
    
    //--------------------------------------------------------------------
  
     
    
     document.getElementById('MyWallet').onmouseover=function(){
          document.getElementById('div8').style.display="none";
          document.getElementById("div3").style.display='none';
          document.getElementById("div4").style.display='block';
          document.getElementById("div5").style.display='none';
          document.getElementById("div6").style.display='none';
       
     }
     document.getElementById('MyOrder').onmouseover=function(){
          document.getElementById('div8').style.display="none";
          document.getElementById("div3").style.display='none';
          document.getElementById("div4").style.display='none';
          document.getElementById("div5").style.display='none';
          document.getElementById("div6").style.display='block';
       
     }
     document.getElementById('MyAddress').onmouseover=function(){
          document.getElementById('div8').style.display="none";
          document.getElementById("div3").style.display='none';
          document.getElementById("div4").style.display='none';
          document.getElementById("div5").style.display='block';
          document.getElementById("div6").style.display='none';
       
     }
     document.getElementById('MyAccount').onmouseover=function(){
          document.getElementById('div8').style.display="none";
          document.getElementById("div3").style.display='block';
          document.getElementById("div4").style.display='none';
          document.getElementById("div5").style.display='none';
          document.getElementById("div6").style.display='none';
       
     }
     
      document.getElementById('changepwd').onmouseover=function(){
          document.getElementById("div3").style.display='none';
          document.getElementById("div4").style.display='none';
          document.getElementById("div5").style.display='none';
          document.getElementById("div6").style.display='none';
        document.getElementById('div8').style.display="block";
     }
      
      document.getElementById('oldpassword').onfocus=function(){
              document.getElementById('oldpassword').type="text";
          

      }
       document.getElementById('oldpassword').onblur=function(){
              document.getElementById('oldpassword').type="password";
          

      }
         document.getElementById('newpassword').onfocus=function(){
              document.getElementById('newpassword').type="text";
          

      }
       document.getElementById('newpassword').onblur=function(){
              document.getElementById('newpassword').type="password";
          

      }
         document.getElementById('newpassword2').onfocus=function(){
              document.getElementById('newpassword2').type="text";
          

      }
       document.getElementById('newpassword2').onblur=function(){
              document.getElementById('newpassword2').type="password";
          

      }
      
    
    


</script>

<script src="js/UserPage.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php include "includes/footer.php"; ?>