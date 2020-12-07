var button_addNewAddress = document.getElementById("AddAddress");
var orderpage = document.getElementById("div6");
var walletpage = document.getElementById("div4");
var addresspage = document.getElementById("div5");
var accountpage = document.getElementById("div3");
var AddressForm = document.getElementById("div7");
var button_closeAddressForm = document.getElementById("close1");
var button_cancel = document.getElementById("AddressFormCancel");
var button_confirmAdd = document.getElementById("button_addA");
var myorder = document.getElementById("MyOrder");
var myaddress = document.getElementById("MyAddress");
var mywallet = document.getElementById("MyWallet");
var myaccount = document.getElementById("MyAccount");
var country = document.getElementById("Country");
var province = document.getElementById("Province");
var postal = document.getElementById("PostalCode");
var city = document.getElementById("City");
var firstname = document.getElementById("FirstName");
var lastname = document.getElementById("LastName");
var companyname = document.getElementById("CompanyName");
var addressL1 = document.getElementById("Address");
var addressL2 = document.getElementById("AddressLine2");
var phone = document.getElementById("Phone");
var editprofile = document.getElementById("EditP");
var phonevalid = false;
var ediprofiediv = document.getElementById("Ediv");
var showNow = document.getElementById("ShopNow");
var checkDefault = document.getElementById("default");
var lastnamevalid = false;
var firstnamevalid = false;

showNow.onclick = function () {
    window.location.href = "index.php";
}
var Editlock = false;
editprofile.onclick = function () {
    if (!Editlock) {
        ediprofiediv.style.display = "block";
        ediprofiediv.onclick = function () {
            Editlock = true;
            document.getElementById('colorcell').style.display="table-cell";
            document.getElementById("ConfirmSpan").style.display = "table-cell";
            document.getElementById("CancelSpan").style.display = "table-cell";
            document.getElementById("ProNameInput").classList.remove("ProNameInput");
            document.getElementById("ProNameInput").classList.add("ProNameInput2");
            ediprofiediv.style.display = "none";
        }
    }
}
document.getElementById("ConfirmSpan").onclick = function () {
    Editlock = false;
    document.getElementById("ConfirmSpan").style.display = "none";
    document.getElementById("CancelSpan").style.display = "none";
    document.getElementById("ProNameInput").classList.remove("ProNameInput2");
    document.getElementById("ProNameInput").classList.add("ProNameInput");
    
}
document.getElementById("CancelSpan").onclick = function () {
    Editlock = false;
    
    document.getElementById("ConfirmSpan").style.display = "none";
    document.getElementById("CancelSpan").style.display = "none"
    document.getElementById("ProNameInput").classList.remove("ProNameInput2");
    document.getElementById("ProNameInput").classList.add("ProNameInput");
}

myorder.onclick = function () {
    clearDivs();
    orderpage.style.display = "block";

}
myaccount.onclick = function () {
    clearDivs();
    accountpage.style.display = "block";
}
myaddress.onclick = function () {
    clearDivs();
    addresspage.style.display = "block";
}
mywallet.onclick = function () {
    clearDivs();
    walletpage.style.display = "block";
}

button_addNewAddress.onclick = function () {
    openToAddAddress();
}
button_closeAddressForm.onclick = function () {
    closeAddressForm();
}
button_cancel.onclick = function () {
    closeAddressForm();
}
button_confirmAdd.onclick = function () {
    createNewAddress();
    lastnamevalid=false;
    firstnamevalid=false;
    phonevalid=false;
}
var readyToSubmit2 = false;
function createNewAddress() {
    if (lastnamevalid & firstnamevalid & phonevalid) {
       alert("Successfully Add Address!");
       document.getElementById('div7').style.display="none";
        document.getElementById("AddressForm").onsubmit = function () {
            return true;
        }
    } else if (lastname.value=="" || firstname.value == "") {
        alert("Both first name and last name should be entered!");

        document.getElementById("AddressForm").onsubmit = function () {
            return false;
        }
        
    } else {
        alert("Your phone number is invalid!");

        document.getElementById("AddressForm").onsubmit = function () {
            return false;
        }
         firstname.value="";
        lastname.value="";
        phone.value="";
    }



}

function openToAddAddress() {
    AddressForm.style.display = "block";
}

function closeAddressForm() {
    AddressForm.style.display = "none";
}

function clearDivs() {
    document.getElementById('div8').style.display="none";
    orderpage.style.display = "none";
    addresspage.style.display = "none";
    walletpage.style.display = "none";
    accountpage.style.display = "none";
}

//Password and phone validation
lastname.onkeyup = function () {
    if (lastname.value == "") {
        firstnamevalid = false;
    } else {
        lastnamevalid = true;
    }
}
firstname.onkeyup = function () {
    if (firstname.value == "") {
        firstnamevalid = false;
    } else
        firstnamevalid = true;
}

phone.onkeyup = function () {
    if (phone.value.match(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/g)) {
        phonevalid = true;
        phone.style.boxShadow = "";
    } else {
        phone.style.boxShadow = "0 0 5px red";
        phonevalid = false;
    }
}

document.getElementById("ChangedIcon1").onclick = function () {
    document.getElementById("HiddenInfo").style.display = "table-cell";
    document.getElementById("ChangedIcon1").style.display = "none"
    document.getElementById("ChangedIcon3").classList.remove("plus");
    document.getElementById("ChangedIcon3").classList.add("minus");
    document.getElementById("HiddenRow").style.display = "table-row";

}
document.getElementById("ChangedIcon3").onclick = function () {
    document.getElementById("HiddenInfo").style.display = "none";
    document.getElementById("ChangedIcon1").style.display = "block";
    document.getElementById("ChangedIcon3").classList.remove("minus");
    document.getElementById("ChangedIcon3").classList.add("plus");
    document.getElementById("HiddenRow").style.display = "none";
}
document.getElementById("popup").onmouseover = function () {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
document.getElementById("popup").onmouseout = function () {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}

document.getElementById("ChangedIcon2").onclick = function () {
    document.getElementById("HiddenInfo2").style.display = "table-cell";
    document.getElementById("ChangedIcon2").style.display = "none";
    document.getElementById("ChangedIcon4").classList.remove("plus");
    document.getElementById("ChangedIcon4").classList.add("minus");

}
document.getElementById("ChangedIcon4").onclick = function () {
    document.getElementById("HiddenInfo2").style.display = "none";
    document.getElementById("ChangedIcon2").style.display = "block";
    document.getElementById("ChangedIcon4").classList.remove("minus");
    document.getElementById("ChangedIcon4").classList.add("plus");

}

document.getElementById("ChangedIcon1").onmouseover = function () {
    var popup = document.getElementById("myPopup2");
    popup.classList.toggle("show");
}
document.getElementById("ChangedIcon2").onmouseover = function () {
    var popup = document.getElementById("myPopup3");
    popup.classList.toggle("show");
}
document.getElementById("ChangedIcon1").onmouseout = function () {
    var popup = document.getElementById("myPopup2");
    popup.classList.toggle("show");
}
document.getElementById("ChangedIcon2").onmouseout = function () {
    var popup = document.getElementById("myPopup3");
    popup.classList.toggle("show");
}




                        document.getElementById('logout').onmousemover = function() {
                            document.getElementById('logout').style.background = "gray";
                        }
                        document.getElementById('logout').onmouseout = function() {
                            document.getElementById('logout').style.background = "red";
                        }


        var pwd1=false;
        var pwd2=false;
        var pwd3=false;
        function validatepwd1(input){
            var pass = input.value;
            var number = false;
            var length = false;
            var uppercase = false;
            var lowercase = false;
            var special = false;
            var count = 0;
            for (var j = 0; j < pass.length; j++) {
                if (pass.charAt(j).match(/[A-Z]/g)) {
                    count++;
                }
            }
            if (count >= 1) {
                uppercase = true;
            }

            if (pass.match(/[a-z]/g)) {
                lowercase = true;
            }
            if (pass.match(/[0-9]/g)) {
                number = true;
            }
            if (pass.match(/[^A-Za-z0-9]/g)) {
                special = true;
            }
            if (pass.match(/[!@#\$%\^&]/g))
                if (pass.length < 8) {
                    length = false;
                } else {
                    length = true;
                }
            if (number && length && uppercase && lowercase && special) {
                pwd1=true;
            } else {
                pwd1=false;
            }
        }
        function validatepwd2(input){
            var pass = input.value;
            var number = false;
            var length = false;
            var uppercase = false;
            var lowercase = false;
            var special = false;
            var count = 0;
            for (var j = 0; j < pass.length; j++) {
                if (pass.charAt(j).match(/[A-Z]/g)) {
                    count++;
                }
            }
            if (count >= 1) {
                uppercase = true;
            }

            if (pass.match(/[a-z]/g)) {
                lowercase = true;
            }
            if (pass.match(/[0-9]/g)) {
                number = true;
            }
            if (pass.match(/[^A-Za-z0-9]/g)) {
                special = true;
            }
            if (pass.match(/[!@#\$%\^&]/g))
                if (pass.length < 8) {
                    length = false;
                } else {
                    length = true;
                }
            if (number && length && uppercase && lowercase && special) {
                pwd2=true;
            } else {
                pwd2=false;
            }
        }
        document.getElementById('submit_changepwd').onclick=function(){
            validatepwd2(document.getElementById('oldpassword'));
            validatepwd1(document.getElementById('newpassword'));
            if(document.getElementById('newpassword').value==document.getElementById('newpassword2').value){
                if(pwd2 && pwd1){
                    document.getElementById('changeform').onsubmit=function(){
                        return true;
                    }
                    
                }
                else{
                    alert("please check if the password is valid or the new passwords you entered are not same.");
                    document.getElementById('changeform').onsubmit=function(){
                        return false;
                    }
                }
                
            }
            else{
                alert("please check if the password is valid or the new passwords you entered are not same.");
                    document.getElementById('changeform').onsubmit=function(){
                        return false;;
                    }
            }
            
            
        }
        
    
    document.getElementById('changepwd').onclick=function(){  
        clearDivs();
        document.getElementById('div8').style.display="block";
    }
    
    
           


    