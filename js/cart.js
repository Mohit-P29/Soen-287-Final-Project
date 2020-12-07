function getDay(){
    var today= new Date();
    var oYear=today.getFullYear();
    var oMonth=today.getMonth()+1;
    var oDay=today.getDate();

    switch(oMonth){
        case 1: 
            oMonth="January";
            break;
        case 2: 
            oMonth="February";
            break;       
        case 3: 
            oMonth="March";
            break;
        case 4: 
            oMonth="April";
            break;
        case 5: 
            oMonth="May";
            break;
        case 6: 
            oMonth="June";
            break;
        case 7: 
            oMonth="July";
            break;
        case 8: 
            oMonth="August";
            break;
        case 9: 
            oMonth="September";
            break;
        case 10: 
            oMonth="October";
            break;
        case 11: 
            oMonth="November";
            break;
        case 12: 
            oMonth="December";
            break;
    }

    //set value for form
    document.getElementById("oMonthV").value=oMonth;
    document.getElementById("oDayV").value=oDay;
    document.getElementById("oYearV").value=oYear;


}



function shipping(){
    if(document.getElementById("hship1").checked){
        document.getElementById("shipMethodSelect").innerHTML="Regular Shipping";
        //set values for form
        document.getElementById("shipV").value="Regular Shipping";
        document.getElementById("shipMethodSelectPrice").innerHTML="$5";
        
    }   

    else{
        document.getElementById("shipMethodSelect").innerHTML="2-Day Shipping";
        //set values for form
        document.getElementById("shipV").value="Express Shipping";
        document.getElementById("shipMethodSelectPrice").innerHTML="$10";

    }

    newTotalCost();

}

//Calculate the cost
function newTotalCost(){
    var pbt1, pbt2,pat,taxes;
    var shippingCost,promoPercent=1;
    var code=document.getElementById("promoCode").value;

    let cart = document.getElementById("totalCost").value;
    cart=parseInt(cart);

    //Get info on current date to display arrival day
    var today= new Date();
    var aYear=today.getFullYear();
    var aMonth=today.getMonth()+1;
    var aDay=today.getDate();

    //Check for shipping method
    //regular shipping (1 week)
    if(document.getElementById("hship1").checked){

        //7 days from now
        aDay=aDay+7;

        //if we reach the end of February
        if(aDay>28 && aMonth==2){
            aDay=aDay-28;
            aMonth++;
        }

        //if we reach the end of January, March, May, etc)
        else if(aDay>31 && (aMonth==1 ||aMonth==3||aMonth==5||aMonth==7||aMonth==8||aMonth==10||aMonth==12)){
           
            aDay=aDay-31;
            aMonth++;
        }

        //if we reach the end of april, june, september or november)
       else if(aDay>30 && (aMonth==4 ||aMonth==6||aMonth==9||aMonth==11)){
        
            aDay=aDay-30;
            aMonth++;
        }

        //if we reach the end of the year
        if(aMonth>12){
            aYear++;
            aMonth=1;
        }

       shippingCost=5;
    }

    else if(document.getElementById("hship2").checked){

        document.getElementById("shipMethodSelect").innerHTML="2-Day Shipping";
        document.getElementById("shipMethodSelectPrice").innerHTML="$10";
        document.getElementById("shipV").value="Express Shipping";
        
                //2 days from now
                aDay=aDay+2;

                //if we reach the end of February
                if(aDay>28 && aMonth==2){
                    aDay=aDay-28;
                    aMonth++;
                }
        
                //if we reach the end of an odd month (January, March, May, etc)
                else if(aDay>31 && isOdd(aMonth)==1){
                    aDay=aDay-31;
                    aMonth++;
                }
        
                //if we reach the end of an even month (april, june, august, etc)
               else if(aDay>30 && isOdd(aMonth)==0){
                    aDay=aDay-30;
                    aMonth++;
                }
        
                //if we reach the end of the year
                if(aMonth>12){
                    aYear++;
                    aMonth=1;
                }

        shippingCost=10;
    }

    switch(aMonth){
        case 1: 
            aMonth="January";
            break;
        case 2: 
            aMonth="February";
            break;       
        case 3: 
            aMonth="March";
            break;
        case 4: 
            aMonth="April";
            break;
        case 5: 
            aMonth="May";
            break;
        case 6: 
            aMonth="June";
            break;
        case 7: 
            aMonth="July";
            break;
        case 8: 
            aMonth="August";
            break;
        case 9: 
            aMonth="September";
            break;
        case 10: 
            aMonth="October";
            break;
        case 11: 
            aMonth="November";
            break;
        case 12: 
            aMonth="December";
            break;
    }

    //display arrival day
    document.getElementById("aMonth").innerHTML=aMonth;
    document.getElementById("aDay").innerHTML=aDay;
    document.getElementById("aYear").innerHTML=aYear;

    //set value for form
    document.getElementById("aMonthV").value=aMonth;
    document.getElementById("aDayV").value=aDay;
    document.getElementById("aYearV").value=aYear;

    if(cart>=50){
        shippingCost=0;
        document.getElementById("shipMethodSelect").innerHTML="Free shipping Special";
        document.getElementById("shipMethodSelectPrice").innerHTML="$0";

        document.getElementById("shipMethodSelect").style.color="green";
        document.getElementById("shipMethodSelectPrice").style.color="green";
    }

    //Print pbt1
    pbt1=(cart+shippingCost);
    document.getElementById("pbt1").innerHTML="$"+pbt1;

    //Check for promo codes
    var promoDetected=false;
    if(code=="Fall20"){
       promoPercent=0.2;
       promoDetected=true;
    }

    if(promoDetected==true){
        pbt2=pbt1-(pbt1*promoPercent);
    }

    else{
        pbt2=pbt1;
    }

    //Print pbt2
    document.getElementById("pbt2").innerHTML="$"+ pbt2.toFixed(2);

    //Calculate taxes
    taxes=pbt2*0.15;
    pat=pbt2*1.15;

    //Print taxes and price after taxes
    document.getElementById("taxes").innerHTML="$"+taxes.toFixed(2);
    document.getElementById("taxV").value=taxes.toFixed(2);
    document.getElementById("pat").innerHTML="$"+pat.toFixed(2);

    //Calculates donation
    var dono=document.getElementById("donoAmount").value;
    dono=parseFloat(dono);
    var total;

    if(dono>0){
        total=dono+pat;
    }

    else{
        total=pat;
    }

    document.getElementById("finalTotal").innerHTML="$"+total.toFixed(2);
    document.getElementById("finalV").value=total.toFixed(2);
}

function promo(){
    var code=document.getElementById("promoCode").value;

    if(localStorage.getItem("promo")!=""){
        alert("You cannot apply more than 1 promo code!");
        return;
    }

    if(code=="Fall20"){
        document.getElementById("enteredCode").innerHTML="Fall20 Promo Code";
        document.getElementById("codeV").value="Fall20";
        document.getElementById("enteredCodeDisc").innerHTML="-20%";
        document.getElementById("addedCode").innerHTML="<span class='deletePromo' onclick='removeCode()'>X</span> Promo Code <b>Fall20</b> has been added!";
        document.getElementById("addedCode").style.color="green";
        document.getElementById("pbt3").style.display="inherit";
        localStorage.setItem("promo", "Fall20");
    }

    else{
        document.getElementById("pbt3").style.display="none";
        document.getElementById("addedCode").innerHTML="The code you entered is invalid!";
        document.getElementById("addedCode").style.color="red";
    }
    newTotalCost();
}

function dono(){
    var dono=document.getElementById("donoAmount").value;

    if(isNaN(dono)){
        alert("Please enter a number");
        return;
    }
    else{
        dono=parseFloat(dono);
        document.getElementById("thankyouDono").innerHTML="Thank you for your $"+dono.toFixed(2)+" donation";
        document.getElementById("dono").innerHTML="$"+dono.toFixed(2);
        document.getElementById("dono").value=dono.toFixed(2);
        localStorage.setItem("dono",dono);
        newTotalCost();
    }
}

function load_P_and_D(){
    if(localStorage.getItem("promo")=="Fall20"){
        document.getElementById("enteredCode").innerHTML="Fall20 Promo Code";
        document.getElementById("enteredCodeDisc").innerHTML="-20%";
        document.getElementById("addedCode").innerHTML="<span class='deletePromo' onclick='removeCode()'>X</span> Promo Code <b>Fall20</b> has been added!";
        document.getElementById("addedCode").style.color="green";
        document.getElementById("pbt3").style.display="inherit";
        document.getElementById("codeV").value="Fall20";
        document.getElementById("promoCode").value="Fall20";
    }

    if(localStorage.getItem("dono")!=null){
        var dono=localStorage.getItem("dono");
        dono=parseFloat(dono);
        document.getElementById("thankyouDono").innerHTML="Thank you for your $"+dono.toFixed(2)+" donation";
        document.getElementById("dono").innerHTML="$"+dono.toFixed(2);
        document.getElementById("donoAmount").value=dono;
        document.getElementById("donoV").value=dono;
    }

    if(localStorage.getItem("shipping")=="regular"){
        document.getElementById("hship1").checked=true;
        document.getElementById("shipMethodSelect").innerHTML="Regular Shipping";
        document.getElementById("shipV").value="RegularShipping";
        document.getElementById("shipMethodSelectPrice").innerHTML="$5";
    }

    if(localStorage.getItem("shipping")=="express"){
        document.getElementById("hship2").checked=true;
        document.getElementById("shipMethodSelect").innerHTML="2-Day Shipping";
        document.getElementById("shipMethodSelectPrice").innerHTML="$10";
        //set values for form
        document.getElementById("shipV").value="Express Shipping";
    }

    newTotalCost();
}

function removeCode(){
    document.getElementById("enteredCode").innerHTML="";
    document.getElementById("enteredCodeDisc").innerHTML="";
    document.getElementById("addedCode").innerHTML="";
    document.getElementById("pbt3").style.display="none";
    document.getElementById("promoCode").value="";
    localStorage.setItem("promo", "");
    newTotalCost();
}

$(document).ready(function(){
    var radios = document.getElementsByName("shipping");
    var val = localStorage.getItem('shipping');
    for(var i=0;i<radios.length;i++){
      if(radios[i].value == val){
        radios[i].checked = true;
        newTotalCost();
      }
    }
    $('input[name="shipping"]').on('change', function(){
      localStorage.setItem('shipping', $(this).val());
    
    });
  });

  function selectItem(){
    const rbs = document.querySelectorAll('input[name="itemsSelect"]');
    let selectedValue;
    var retVal=true;
    for (const rb of rbs) {
        if (rb.checked) {
            selectedValue = rb.value;
            break;
        }
    }

    if(selectedValue==null){
        alert("please pick an item");
        retVal=false;
        return retVal;
    }

    return retVal;
  }