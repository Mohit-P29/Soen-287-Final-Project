<?php include "includes/address.php"?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="UserPage.css" />



</head>

<body>

    <div style="margin-left:auto;margin-right:auto;width:100%;height:100%;">
        <div class="div0">
            <!--Profile picture div-->
            <div class="div1" id="div1">

                <span id="EditP" class="EditP"></span>
                <div class="EditDiv" id="Ediv">
                    <div class="EditDive-content">
                        Edit Profile
                    </div>
                </div>
                <form>
                    <table class="div1_table">
                        <tr>
                            <td colspan="2"><span class="ProP" id="ProP"></span></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span class="ProName"><input type="text" class="ProNameInput" id="ProNameInput" value="UserA" /></span></td>
                        </tr>
                        <tr style="text-align: center;">
                            <td style=" background-color: deepskyblue;" class="ConfirmSpan" id="ConfirmSpan"><input type="submit" value=confirm style="border:0 none;background-color: transparent;font-family: 'Times New Roman', Times, serif;font-size: 1.1em;" /></td>
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



                <form class="MyAccountForm" action="includes/myaccount.php" method="post" id="MyAccountForm">
                    <table class="MyAccountTable">
                        <tr>
                            <td><label class="UserEmail" id="UserEmail">Login Email:<br />Preferredcone@gmail.com</label>
                                <div class="popup" id="popup">
                                    <span class="popuptext" id="myPopup">Login Email cannot be changed!</span>
                                </div>


                            </td>
                        </tr>
                        <tr>
                            <td>
                                First Name<br /><input type="text" id="SavedFirstName" name="user_first" class="Inputfield" value="<?php echo $firstname1;?>" placeholder="eg. Kate" />
                            </td>


                            <td>Last Name<br /><input type="text" id="SavedLastName" name="user_last" class="Inputfield" value="<?php echo $lastname1;?>" placeholder="eg.Sims" /></td>

                        </tr>
                        <tr>
                            <td><label for="ContactEmail" id="ChangedLable0">Contact Email</label>
                                <label id="ChangedIcon1" class="plus"></label>
                                <div class="popup" id="ChangedIcon1">
                                    <span class="popuptext" id="myPopup2">Add the second Email</span>
                                </div>

                                <br />
                                <input type="text" id="ContactEmail" class="Inputfield" name="user_email1" value="<?php echo $contact1;?>" placeholder="Katesims@hotmail.com" />
                            </td>

                            <td><label for="SavedPhone" id="ChangedLabel1">Phone</label>
                                <label id="ChangedIcon2" class="plus"></label>
                                <div class="popup" id="ChangedIcon2">
                                    <span class="popuptext" id="myPopup3">Add the second phone</span>
                                </div>

                                <br />
                                <input type="text" id="SavedPhone" name="user_phone1" class="Inputfield" value="<?php echo $p1;?>" placeholder="+1 415-789-3981" />
                            </td>
                        </tr>
                        <tr id="HiddenRow" style="display: none;">
                            <td colspan="2" id="HiddenInfo" style="display:none;">
                                <label id="ChangedLable2">Contact Email 2</label>
                                <label id="ChangedIcon3" class="plus"></label>
                                <br />
                                <input type="text" style="width: 545px;" id="ContactEmail2" name="user_email2" class="Inputfield2" placeholder="Katesims@hotmail.com" value="<?php echo $contact2;?>" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" id="HiddenInfo2" style="display:none;">
                                <label id="ChangedLable3">Phone 2</label>
                                <label id="ChangedIcon4" class="plus"></label>
                                <br />
                                <input type="text" style="width: 545px;" class="Inputfield2" name="user_phone2" id="Phone2" placeholder="+1 415-789-3981" value="<?php echo $p2;?>" />
                            </td>
                        </tr>




                        <tr>
                            <td><input class="UpdateAccount" type="submit" name="submit1" value="Update Info" /></td>
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

            <div id="DivForAddress" style="border-top:thin solid black; font-size:1.2em;padding-top: 50px;">

                <table id="AddressT1" style="display: none;border-bottom: thin solid lightgray;">

                    <?php 
                         if($firstname2!='' && $lastname2!='' && $p3!=''){
                             echo "<tr><td><span style=\"font-weight:bold;color:black; font-size:1.4em;\">";
                             echo "Address One";
                             echo "</span></td></tr>";
                             echo "<tr><td>";
                             echo "First Name: ".$firstname2;
                             echo "</td></tr>";
                             echo "<tr><td>";
                             echo "Last Name: ".$lastname2;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Company: ".$comp;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Addesss Line1: ".$address1;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Address Line2: ".$address2;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "City: ".$city;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Country: ".$coun;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Province: ".$prov;
                             echo "</td></tr>"; 
                             echo "<tr><td>";
                             echo "Postal Code: ".$po;
                             echo "</td></tr>";
                              echo "<tr><td>";
                             echo "Phone: ".$p3;
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
                            <form action="includes/removeaddress.php"><input type="submit" id="datadelete1" style="border: 0 none; background-color: white; color:black;text-decoration:underline; font-size:1.1em;" value="Cancel" /></form>
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
                            <label><span class="UpdateAccount" id="AddAddress">Add New Address</span></label>
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
                <form class="AddressForm" action="includes/addressform.php" method="post" id="AddressForm">
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
                            <td><input type="submit" style="margin-left: 0px; border:thin solid dodgerblue;height: 50px;font-family: 'Times New Roman', Times, serif;" id="button_addA" class="button_addA" value="Add Address" />
                                <lable id="AddressFormCancel" class="AddressFormCancel">Cancel</lable>
                            </td>
                            <td id="notify2" style="text-align: left;color: #4CAF50;display: none;"></td>
                        </tr>

                    </table>
                </form>



            </div>

        </div>
    </div>
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
    <script src="UserPage.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>
