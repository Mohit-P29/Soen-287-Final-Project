var button_addNewAddress=document.getElementById("AddAddress");
var orderpage=document.getElementById("div6");
var walletpage=document.getElementById("div4");
var addresspage=document.getElementById("div5");
var accountpage=document.getElementById("div3");
var AddressForm=document.getElementById("div7");
var button_closeAddressForm=document.getElementById("close1");
var button_cancel=document.getElementById("AddressFormCancel");
var button_confirmAdd=document.getElementById("button_addA");
var myorder=document.getElementById("MyOrder");
var myaddress=document.getElementById("MyAddress");
var mywallet=document.getElementById("MyWallet");
var myaccount=document.getElementById("MyAccount");
var country=document.getElementById("Country");
var province=document.getElementById("Province");
var postal=document.getElementById("PostalCode");
var city=document.getElementById("City");
var firstname=document.getElementById("FirstName");
var lastname=document.getElementById("LastName");
var companyname=document.getElementById("CompanyName");
var addressL1=document.getElementById("Address");
var addressL2=document.getElementById("AddressLine2");
var phone=document.getElementById("Phone");
var editprofile=document.getElementById("EditP");
var phonevalid=false;
var ediprofiediv=document.getElementById("Ediv");
var showNow=document.getElementById("ShopNow");
var checkDefault=document.getElementById("default");


showNow.onclick=function(){
    window.location.href="https://jiawyao.wixsite.com/website-1";
}
editprofile.onclick=function(){
    ediprofiediv.style.display="block";
    ediprofiediv.onclick=function(){
        document.getElementById("ProNameInput").classList.remove("ProNameInput");
        document.getElementById("ProNameInput").classList.add("ProNameInput2");
        ediprofiediv.style.display="none";
    }
}

myorder.onclick=function(){
     clearDivs();
    orderpage.style.display="block";
   
}
myaccount.onclick=function(){
    clearDivs();
    accountpage.style.display="block";
}
myaddress.onclick=function(){
    clearDivs();
    addresspage.style.display="block";
}
mywallet.onclick=function(){
    clearDivs();
    walletpage.style.display="block";
}

button_addNewAddress.onclick=function(){
    openToAddAddress();
}
button_closeAddressForm.onclick=function(){
    closeAddressForm();
}
button_cancel.onclick=function(){
    closeAddressForm();
}
button_confirmAdd.onclick=function(){
    confirmAdd();
}
function createNewAddress(){
   if(checkFormValidity && phonevalid){

       document.getElementById("NoAddress").style.display="none";
       addresspage.innerHTML+=("<table style='font-size:1.2em;width:600px;margin-top:30px;padding-top:20px;border-top:thin solid black;'></table>");
       var x=addresspage.lastChild;
       var row1=x.insertRow(0);
       var cell1=row1.insertCell(0);
       cell1.innerHTML=firstname.value+" "+lastname.value;
       row1=x.insertRow(1);
       cell1=row1.insertCell(0);
       cell1.innerHTML=addressL1.value;
       row1=x.insertRow(2);
       cell1=row1.insertCell(0);
       cell1.innerHTML=addressL2.value;
      row1=x.insertRow(3);
       cell1=row1.insertCell(0);
       cell1.innerHTML=city.value+" "+province.value;
      row1=x.insertRow(4);
       cell1=row1.insertCell(0);
       cell1.innerHTML=country.value;
      row1=x.insertRow(5);
       cell1=row1.insertCell(0);
       cell1.innerHTML=postal.value;
      row1=x.insertRow(6);
       cell1=row1.insertCell(0);
       cell1.innerHTML=phone.value;
       cell1.innerHTML=phone.value;
       if(checkDefault.checked=="true"){
           cell1.innerHTML+=("<span style='float=right;font-size=1.2em;'></span>");
           cell1.lastChild.innerHTML="Default Address.";
       }
      
      
       closeAddressForm();
       
   }
    else{
        clearInput();
        alert("Please check your phone number or name.");
    }
    
    
    
}
function openToAddAddress(){
    AddressForm.style.display="block";
}
function closeAddressForm(){
    AddressForm.style.display="none";
}
function openOrderPage(){
    orderpage.style.display="block";
}
function openAddressPage(){
    addresspage.style.display="block";
}
function openWalletPage(){
    walletpage.style.display="block";
}
function openAccountPage(){
    accountpage.style.display="block";
}
function clearDivs(){
    orderpage.style.display="none";
    addresspage.style.display="none";
    walletpage.style.display="none";
    accountpage.style.display="none";
}
function confirmAdd(){
    createNewAddress();
}
function checkFormValidity(){
    if(firstname.value==""||lastname.value==""){
        return false;
    }
    else{
        return true;
    }
}
phone.onkeyup=function(){
    if(phone.value.match(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/g)){
        phonevalid=true;
        phone.style.boxShadow="";
    }
    else{
        phone.style.boxShadow="0 0 3px red";
        phonevalid=false;
    }
}

