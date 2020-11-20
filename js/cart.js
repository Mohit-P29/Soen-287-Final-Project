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
                <ion-icon class="decrease " name="arrow-dropleft-circle"></ion-icon>
                    <span>${item.inCart}</span>
                <ion-icon class="increase" name="arrow-dropright-circle"></ion-icon>   
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
                <p class="itemPrice">$${cart},00</p>
            </div>`

    }
}

function shipping(){
    if(document.getElementById("hship1").checked){
        document.getElementById("shipMethodSelect").innerHTML="Regular Shipping";
        document.getElementById("shipMethodSelectPrice").innerHTML="FREE";
    }

    else{
        document.getElementById("shipMethodSelect").innerHTML="2-Day Shipping";
        document.getElementById("shipMethodSelectPrice").innerHTML="$5";
    }

    newTotalCost();

}


function newTotalCost(){
    var pbt1, pbt2,pat,taxes;
    var shippingCost,promoPercent=1;
    var code=document.getElementById("promoCode").value;

    let cart = localStorage.getItem("totalCost");
    cart=parseInt(cart);

    //Check for shipping method
    if(document.getElementById("hship1").checked){
       shippingCost=0;
    }

    else if(document.getElementById("hship2").checked){
        shippingCost=5;
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

    pbt2.toFixed(2);

    //Print pbt2
    document.getElementById("pbt2").innerHTML="$"+pbt2;

    //Calculate taxes
    taxes=pbt2*0.15;
    pat=pbt2*1.15;

    //Print taxes and price after taxes
    document.getElementById("taxes").innerHTML="$"+taxes.toFixed(2);
    document.getElementById("pat").innerHTML="$"+pat.toFixed(2);

    //Calculates donation
    var dono=document.getElementById("donoAmount").value;
    dono=parseInt(dono);
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


    if(code=="Fall20"){
        document.getElementById("enteredCode").innerHTML="Fall20 Promo Code";
        document.getElementById("enteredCodeDisc").innerHTML="-20%";
        document.getElementById("addedCode").innerHTML="Promo Code Fall20 has been added!";
        
        document.getElementById("pbt3").style.display="inherit";
    }

    else{
        document.getElementById("pbt3").style.display="none";
    }
    newTotalCost();
}

function dono(){
    var dono=document.getElementById("donoAmount").value;
    document.getElementById("thankyouDono").innerHTML="Thank you for your $"+dono+" donation";
    document.getElementById("dono").innerHTML="$"+dono;

    newTotalCost();
}



onLoadCartNumbers();
displayCart();
