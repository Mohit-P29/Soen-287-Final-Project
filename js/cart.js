let carts = document.querySelectorAll('.add-cart');

let products = [ 
    {
        name: "item 1",
        tag: "item1",
        price: 15,
        inCart: 0
    },
    {
        name: "item 3",
        tag: "item3",
        price: 20,
        inCart: 0
    },
    {
        name: "item 2",
        tag: "item2",
        price: 15,
        inCart: 0
    },
    {
        name: "item 4",
        tag: "item4",
        price: 20,
        inCart: 0
    }
];

//Checks for which ".addCart" button got clicked
for(let i=0; i< carts.length; i++) {
    carts[i].addEventListener('click', () => {
        cartNumbers(products[i]);
        totalCost(products[i]);
    });
}

function onLoadCartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');
    if( productNumbers ) {
        document.querySelector('.cart span').textContent = productNumbers;
    }
}

function cartNumbers(product, action) {
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);

    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if( action ) {
        localStorage.setItem("cartNumbers", productNumbers - 1);
        document.querySelector('.cart span').textContent = productNumbers - 1;
        console.log("action running");
    } else if( productNumbers ) {
        localStorage.setItem("cartNumbers", productNumbers + 1);
        document.querySelector('.cart span').textContent = productNumbers + 1;
    } else {
        localStorage.setItem("cartNumbers", 1);
        document.querySelector('.cart span').textContent = 1;
    }
    setItems(product);
}

function setItems(product) {
    // let productNumbers = localStorage.getItem('cartNumbers');
    // productNumbers = parseInt(productNumbers);
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if(cartItems != null) {
        let currentProduct = product.tag;
    
        if( cartItems[currentProduct] == undefined ) {
            cartItems = {
                ...cartItems,
                [currentProduct]: product
            }
        } 
        cartItems[currentProduct].inCart += 1;

    } else {
        product.inCart = 1;
        cartItems = { 
            [product.tag]: product
        };
    }

    localStorage.setItem('productsInCart', JSON.stringify(cartItems));
}

function totalCost( product, action ) {
    let cart = localStorage.getItem("totalCost");

    if( action) {
        cart = parseInt(cart);

        localStorage.setItem("totalCost", cart - product.price);
    } else if(cart != null) {
        
        cart = parseInt(cart);
        localStorage.setItem("totalCost", cart + product.price);
    
    } else {
        localStorage.setItem("totalCost", product.price);
    }
}

//Display the items in the shopping cart
function displayCart() {
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    let cart = localStorage.getItem("totalCost");
    cart = parseInt(cart);

    let productContainer = document.querySelector('.products');
    
    
    if( cartItems && productContainer ) {
        productContainer.innerHTML = '';
        Object.values(cartItems).map( (item, index) => {
            productContainer.innerHTML += 
            `<div class="product">
                <div class="left">
                    <ion-icon name="close-circle" class="deleteIcon"></ion-icon>
                    <img src="./image/${item.tag}.jpg" />
                </div>
                <div class="left nameANDprice">
                    <span class="sm-hide">${item.name}</span>
                    <span class="sm-hide">$${item.price},00</span>
                </div>
            </div>
            <div class="price sm-hide"></div>
            <div class="quantity">
                <ion-icon class="decrease" name="caret-back-outline"></ion-icon>
                    <span>${item.inCart}</span>
                <ion-icon class="increase" name="caret-forward-outline"></ion-icon>
            </div>
            <div class="total">$${item.inCart * item.price},00</div>`;
        });

        productContainer.innerHTML += `
            <div class="basketTotalContainer">
                <h4 class="basketTotalTitle">Basket Total</h4>
                <h4 class="basketTotal">$${cart},00</h4>
            </div>`


        deleteButtons();
        manageQuantity();
    }
}

//Increase the quantity in shopping cart
function manageQuantity() {
    let decreaseButtons = document.querySelectorAll('.decrease');
    let increaseButtons = document.querySelectorAll('.increase');
    let currentQuantity = 0;
    let currentProduct = '';
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    for(let i=0; i < increaseButtons.length; i++) {
        decreaseButtons[i].addEventListener('click', () => {
            console.log(cartItems);
            currentQuantity = decreaseButtons[i].parentElement.querySelector('span').textContent;
            console.log(currentQuantity);
            currentProduct = decreaseButtons[i].parentElement.previousElementSibling.previousElementSibling.querySelector('span').textContent.toLocaleLowerCase().replace(/ /g,'').trim();
            console.log(currentProduct);

            if( cartItems[currentProduct].inCart > 1 ) {
                cartItems[currentProduct].inCart -= 1;
                cartNumbers(cartItems[currentProduct], "decrease");
                totalCost(cartItems[currentProduct], "decrease");
                localStorage.setItem('productsInCart', JSON.stringify(cartItems));
                displayCart();
            }
        });

        increaseButtons[i].addEventListener('click', () => {
            console.log(cartItems);
            currentQuantity = increaseButtons[i].parentElement.querySelector('span').textContent;
            console.log(currentQuantity);
            currentProduct = increaseButtons[i].parentElement.previousElementSibling.previousElementSibling.querySelector('span').textContent.toLocaleLowerCase().replace(/ /g,'').trim();
            console.log(currentProduct);

            cartItems[currentProduct].inCart += 1;
            cartNumbers(cartItems[currentProduct]);
            totalCost(cartItems[currentProduct]);
            localStorage.setItem('productsInCart', JSON.stringify(cartItems));
            displayCart();
        });
    }
}

//Delete the item in shopping cart
function deleteButtons() {
    let deleteButtons = document.querySelectorAll('.product ion-icon');
    let productNumbers = localStorage.getItem('cartNumbers');
    let cartCost = localStorage.getItem("totalCost");
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);
    let productName;
    console.log(cartItems);

    for(let i=0; i < deleteButtons.length; i++) {
        deleteButtons[i].addEventListener('click', () => {
            productName = deleteButtons[i].parentElement.textContent.toLocaleLowerCase().replace(/ /g,'').trim();
           
            localStorage.setItem('cartNumbers', productNumbers - cartItems[productName].inCart);
            localStorage.setItem('totalCost', cartCost - ( cartItems[productName].price * cartItems[productName].inCart));

            delete cartItems[productName];
            localStorage.setItem('productsInCart', JSON.stringify(cartItems));

            displayCart();
            onLoadCartNumbers();
        })
    }
}

//Display the items in the checkout page
function displayItems() {
    let cartItems = localStorage.getItem('productsInCart');
    let productNumbers = localStorage.getItem('cartNumbers');
    cartItems = JSON.parse(cartItems);

    let cart = localStorage.getItem("totalCost");
    cart = parseInt(cart);

    let productContainer = document.querySelector('.yourItems');
    let itemsPriceTotal = document.querySelector('.itemsPriceTotal');
    
    if( cartItems && productContainer ) {
        productContainer.innerHTML = '';
        Object.values(cartItems).map( (item, index) => {
            productContainer.innerHTML += 
            `<div class="productItemDisplay">
            
            <div class="left">
                <img src="./image/${item.tag}.jpg" />
            </div> <!--end of class LEFT-->

            <div class="left nameANDprice">
                <span class="sm-hide">${item.name}</span>
                <span>QTY: ${item.inCart}</span>
                <span class="sm-hide">$${item.price},00</span>
            </div><!--END OF CLASS RIGHT-->
            `
        });

       itemsPriceTotal.innerHTML += `
            <div class="basketTotalContainer">
                <p class="item">items (${productNumbers})</p>
                <p class="itemPrice">$${cart}</p>
            </div>`

    }
}

function shipping(){
    if(document.getElementById("hship1").checked){
        document.getElementById("shipMethodSelect").innerHTML="Regular Shipping";
        document.getElementById("shipMethodSelectPrice").innerHTML="$5";

    }

    else{
        document.getElementById("shipMethodSelect").innerHTML="2-Day Shipping";
        document.getElementById("shipMethodSelectPrice").innerHTML="$10";

    }

    newTotalCost();

}

//Calculate the cost
function newTotalCost(){
    var pbt1, pbt2,pat,taxes;
    var shippingCost,promoPercent=1;
    var code=document.getElementById("promoCode").value;

    let cart = localStorage.getItem("totalCost");
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
            alert("odd! Day="+ aDay);
            aDay=aDay-31;
            aMonth++;
        }

        //if we reach the end of april, june, september or november)
       else if(aDay>30 && (aMonth==4 ||aMonth==6||aMonth==9||aMonth==11)){
        alert("even! Day="+ aDay);
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

}

function promo(){
    var code=document.getElementById("promoCode").value;

    if(localStorage.getItem("promo")!=""){
        alert("You cannot apply more than 1 promo code!");
        return;
    }

    if(code=="Fall20"){
        document.getElementById("enteredCode").innerHTML="Fall20 Promo Code";
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
        document.getElementById("promoCode").value="Fall20";
    }

    if(localStorage.getItem("dono")!=null){
        var dono=localStorage.getItem("dono");
        dono=parseFloat(dono);
        document.getElementById("thankyouDono").innerHTML="Thank you for your $"+dono.toFixed(2)+" donation";
        document.getElementById("dono").innerHTML="$"+dono.toFixed(2);
        document.getElementById("donoAmount").value=dono;
    }

    if(localStorage.getItem("shipping")=="regular"){
        document.getElementById("hship1").checked=true;
        document.getElementById("shipMethodSelect").innerHTML="Regular Shipping";
        document.getElementById("shipMethodSelectPrice").innerHTML="$5";
    }

    if(localStorage.getItem("shipping")=="express"){
        document.getElementById("hship2").checked=true;
        document.getElementById("shipMethodSelect").innerHTML="2-Day Shipping";
        document.getElementById("shipMethodSelectPrice").innerHTML="$10";
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

onLoadCartNumbers();
displayCart();

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