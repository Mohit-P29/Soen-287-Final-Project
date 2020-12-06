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


<link rel="stylesheet" href="css/UserPage.css" />

<div style="margin-left:auto;margin-right:auto;width:100%;height:100%;">
    <div class="div0">
        <!--Profile picture div-->
        <div class="div1" id="div1">

            <span id="EditP" class="EditP"></span>
            <div class="EditDiv" id="Ediv">
                <div class="EditDive-content" style="float:left;font-size:1.3em;margin-left:30px;">
                    Edit Profile
                </div>
            </div>
            <form action='' id="proform" method="post" enctype="multipart/form-data">
                <table class="div1_table">
                    <tr>
                        <td colspan="2">
                            <input type="file" style="display:none;" name='image' style="position:absolute;top:85px;left:30px; z-index:3;width:200px;" />
                            <div class="ProP" style="background-color:brown;color:white;text-align:center;font-size:3.3em;padding:35px;">
                                <span><?php echo substr($username,0,1)?></span>
                            </div>

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
                    <td>
                        <form action='' method="post"><input class='list' type="submit" style="color:white;font-weight:900;font-size:1.0em; font-family:sans-serif;border:0 none;background-color:red;width:100px;margin-left:-5px;float:left;height:30px;" id="logout" name="logout" value="Log Out" /></form>
                    </td>


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
                            First Name<br /><input type="text" id="SavedFirstName" name="user_first" class="Inputfield" value="<?php echo $first; ?>" placeholder="eg. Kate" maxlength="10" />
                        </td>


                        <td>Last Name<br /><input type="text" id="SavedLastName" name="user_last" class="Inputfield" value="<?php echo $last; ?>" placeholder="eg.Sims" maxlength="10" /></td>

                    </tr>
                    <tr>
                        <td><label for="ContactEmail" id="ChangedLable0">Contact Email</label>
                            <label id="ChangedIcon1" class="plus"></label>
                            <div class="popup" id="ChangedIcon1">
                                <span class="popuptext" id="myPopup2">Add the second Email</span>
                            </div>

                            <br />
                            <input type="text" id="ContactEmail" class="Inputfield" name="user_email1" value="<?php echo $email1; ?>" placeholder="Katesims@(hotmail.com/gmail.com/outlook.com)" />
                        </td>

                        <td><label for="SavedPhone" id="ChangedLabel1">Phone</label>
                            <label id="ChangedIcon2" class="plus"></label>
                            <div class="popup" id="ChangedIcon2">
                                <span class="popuptext" id="myPopup3">Add the second phone</span>
                            </div>

                            <br />
                            <input type="text" id="SavedPhone" name="user_phone1" class="Inputfield" value="<?php echo $phone1; ?>" placeholder="001-234-567-8901" maxlength="16"/>
                        </td>
                    </tr>
                    <tr id="HiddenRow" style="display: none;">
                        <td colspan="2" id="HiddenInfo" style="display:none;">
                            <label id="ChangedLable2">Contact Email 2</label>
                            <label id="ChangedIcon3" class="plus"></label>
                            <br />
                            <input type="text" style="width: 545px;" id="ContactEmail2" name="user_email2" class="Inputfield2" placeholder="Katesims@hotmail.com" value="<?php echo $email2; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" id="HiddenInfo2" style="display:none;">
                            <label id="ChangedLable3">Phone 2</label>
                            <label id="ChangedIcon4" class="plus"></label>
                            <br />
                            <input type="text" style="width: 545px;" class="Inputfield2" name="user_phone2" id="Phone2" placeholder="001- 415-789-3981" maxlength="16" value="<?php echo $phone2; ?>" />
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
    <!--My wallet-->
    <div class="div4" id="div4">
        <span class="listTitle">My Wallet</span>
        <br /><br />
        <span style=font-size:1.3em>Save your credit and debit card details for faster checkout</span>
        <div id="NoWallet">
            <form class="MyOtherForm">
                <label style="font-size: 1.5em;color:black;text-align: center;">You haven't saved any cards yet<br /></label>
                <label style="font-size:1.2em;color:dimgray;text-align: center">Securely save your payment details when you place an order at checkout.</label>
            </form>
        </div>
    </div>
    <!--My addresses-->
    <div class="div5" id="div5">
        <div>
            <span class="listTitle">My Addresses</span>
            <br /><br />
            <span id="node" style="font-size:1.3em;">Add and manage the address you use often</span>
        </div>

        <div id="DivForAddress" style="border-top:thin solid black; font-size:1.2em;padding-top: 20px;">

            <table id="AddressT1" style="display: none;border-bottom: thin solid lightgray;">

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
            
                       ?>
                <script>
                    document.getElementById("AddressT1").style.display = "block";
                    document.getElementById("addressnotify").innerHTML = "";

                </script>


                <?php } ?>
                <tr>
                    <td><span id="dataedit1" style="font-weight:bold;color:black;text-decoration:underline; font-size:1.2em;cursor:pointer;">Edit</span></td>

                    <td>
                        <form action=""><input type="submit" id="datadelete1" name="delete_address" style="border: 0 none; background-color: white; color:black;text-decoration:underline; font-size:1.1em;font-weight:bold;" value="Remove" /></form>
                    </td>
                    <script type="text/javascript">

                    </script>
                </tr>
            </table>

            <table id="AddressT2" style="display: none;border-bottom: thin solid lightgray;">
                <tr>
                    <td>




                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>

                <tr>
                    <td><span>Edit</span></td>
                    <td><span>Remove</span></td>
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
            <form class="AddressForm" action="<?PHP echo $_SERVER['PHP.SELF']; ?>" method="post" id="AddressForm">
                <table class="AddressFormTable">
                    <!--Name section-->
                    <tr>
                        <td>
                            <label for="FirstName">*First Name<br /><input type="text" id="FirstName" name="first2" class="Inputfield" value="" /></label>
                        </td>
                        <td>
                            <label for="LastName">*Last Name<br /><input type="text" id="LastName" name="last2" class="Inputfield" value="" /></label>
                        </td>
                    </tr>
                    <!--Comany name section-->
                    <tr>
                        <td colspan="2"><label for="CompanyName">Company Name<br /><input type="text" id="CompanyName" name="company" class="Inputfield2" value="" /></label></td>

                    </tr>
                    <!--Addres section-->
                    <tr>
                        <td colspan="2"><label for="Address">Address<br /><input type="text" id="Address" name="address1" class="Inputfield2" value="" /></label></td>

                    </tr>
                    <!--The alternative address section-->
                    <tr>
                        <td colspan="2"><label for="AddressLine2">Address - Line 2<br /><input type="text" id="AddressLine2" class="Inputfield2" name="address2" value="" /></label>

                        </td>
                    </tr>
                    <!--City-->
                    <tr>
                        <td colspan="2"><label for="City">City<br /><input type="text" id="City" name="city" class="Inputfield2" placeholder="Apartment, suite, floor" value="" /></label></td>
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
                        <td><label for="Province">Province<br /><select class="Select" name="province" id="Province">
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
                        <td><label for="PostalCode">Zip/Postal Code<br /><input type="text" id="PostalCode" name="post" class="Inputfield" value="" /></label></td>
                        <td><label for="Phone">Phone<br /><input type="text" id="Phone" name="phone" class="Inputfield" value="" /></label></td>
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
<?php 
            $_SESSION['fixed_AddressPage']=(isset($_SESSION['fixed_AddressPage']))?$_SESSION['fixed_AddressPage']:'false';

            if($_SESSION['fixed_AddressPage']==='true'){ ?>
<script>
    document.getElementById('div5').style.display = 'block';
    document.getElementById('div3').style.display = "none";

</script>

<?php  $_SESSION['fixed_AddressPage']='false'; }




            if(isset($_POST["submit1"])){
                echo "yes";
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
            else if(isset($_POST['button_addA'])){
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
                 $sql = "UPDATE useraddress SET first='$first',last='$last',company='$comp',address='$a1',address2='$a2',city='$city',country='$country',province='$province',post='$post',phone='$phone' WHERE user_id='$id'";
                 mysqli_query($conn,$sql);
                 $conn->close(); 
                 $_SESSION['fixed_AddressPage']="true";
            }

            else if(isset($_POST['delete_address'])){
                $id=$_SESSION['user_id'];
                $sql ="DELETE FROM useraddress WHERE user_id='$id'";
                 mysqli_query($conn,$sql);
                 $conn->close();  
                
                
            }
            else if(isset($_POST['logout'])){
                session_destroy(); ?>
<script>
    alert("You have logged out!");
    window.location.href = 'login.php';

</script>

<?php  }
else if(isset($_POST['upload'])){
     $id=$_SESSION['user_id'];
    $username=(isset($_POST['username']))?$_POST['username']:'';
    mysqli_query($conn,"UPDATE profile SET user_name='$username' where user_id='$id'");
    mysqli_query($conn,$sql);
    echo "<script>window.location.href='UserPage.php'</script>";
}

?>


<script>
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

</script>
<script>
    if ("<?php echo $contact2 ?>" != '') {
        document.getElementById("ChangedIcon1").style.display = "none";
        document.getElementById("HiddenRow").style.display = "table-row";
        document.getElementById("HiddenInfo").style.display = "table-cell";
        document.getElementById("ChangedIcon3").classList.remove("plus");
        document.getElementById("ChangedIcon3").classList.add("minus");
    }
    if ("<?php echo $p2 ?>" != '') {
        document.getElementById("ChangedIcon2").style.display = "none";
        document.getElementById("HiddenInfo2").style.display = "table-cell";
        document.getElementById("ChangedIcon4").classList.remove("plus");
        document.getElementById("ChangedIcon4").classList.add("minus");
    }

</script>
<script src="js/UserPage.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
