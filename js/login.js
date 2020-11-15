function verifCred() {
    if (document.getElementById("email").value == "admin") {
        window.open('admin.html', "_self")
    } else {
        alert("Please provide valid credentials");
    }
}

document.addEventListener('DOMContentLoaded', function(event) {

    document.getElementById('signup').style.visibility = 'visible';
    document.getElementById('signin').style.visibility = 'visible';

    document.getElementById('signup').onclick = function() {
        document.getElementById('flip-card').classList.toggle('do-flip');
    };

    document.getElementById('signin').onclick = function() {
        document.getElementById('flip-card').classList.toggle('do-flip');
    };

});

//https://codepen.io/Bjornros/pen/VPzQzB


//Verify sign up information
//Verify email
var emailvalid = false;
var emailSignUp = document.getElementById("email_signup");
emailSignUp.onkeyup = function() {
    var validation = document.getElementById("validation2");
    if (this.value.match(/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/g)) {
        validation.style.color = 'green';
        validation.style.fontSize = 'medium';
        validation.innerHTML = "Valid Email";
        emailvalid = true;
    } else {
        validation.style.color = 'red';
        validation.style.fontSize = 'medium';
        validation.innerHTML = "Invalid Email";
        emailvalid = false;
    }
}
emailSignUp.onblur = function() {
    var validation = document.getElementById("validation2");
    validation.innerHTML = "";
    validation.style.color = "";
    validation.style.fontSize = 'small';
}

//Verify password
var passwordvalid = false;

var passwordSignUp = document.getElementById("password_signup");
passwordSignUp.onkeyup = function() {
    var validation1 = document.getElementById("validation1");
    var validation2 = document.getElementById("validation2");
    var validation3 = document.getElementById("validation3");
    var validation4 = document.getElementById("validation4");

    validation1.innerHTML = "Minimum 6 characters   &#215";
    validation2.innerHTML = "- At least one digit   &#215";
    validation3.innerHTML = "- At least one upper   &#215";
    validation4.innerHTML = "- At least one lower character   &#215";
    validation1.style.color = "red";
    validation2.style.color = "red";
    validation3.style.color = "red";
    validation4.style.color = "red";

    var uppercase = false;
    var digit = false;
    var length = false;
    var lower = false;
    if (passwordSignUp.value.match(/[A-Z]/g)) {
        validation3.style.color = "green";
        validation3.innerHTML = "- At least one upper   &#10003";
        uppercase = true;
    } else {
        uppercase = false;
    }
    if (passwordSignUp.value.match(/[a-z]/g)) {
        validation4.style.color = "green";
        validation4.innerHTML = "- At least one lower character   &#10003";
        lower = true;
        passvalid = uppercase && digit && length && lower;
    } else {
        lower = false;
    }
    if (passwordSignUp.value.length >= 6) {
        validation1.style.color = "green";
        validation1.innerHTML = "Minimum 6 characters   &#10003";
        length = true;
    } else {
        length = false;
    }
    if (passwordSignUp.value.match(/[0-9]/g)) {
        validation2.style.color = "green";
        validation2.innerHTML = "- At least one digit   &#10003";
        digit = true;
    } else {
        digit = false;
    }
    passvalid = uppercase && digit && length && lower;
    if (passvalid) {
        passwordvalid = true;
    } else {
        passwordvalid = false;
    }
}

passwordSignUp.onblur = function() {
    var validation1 = document.getElementById("validation1");
    var validation2 = document.getElementById("validation2");
    var validation3 = document.getElementById("validation3");
    var validation4 = document.getElementById("validation4");

    validation1.innerHTML = "";
    validation1.style.color = "";
    validation2.innerHTML = "";
    validation2.style.color = "";
    validation3.innerHTML = "";
    validation3.style.color = "";
    validation4.innerHTML = "";
    validation4.style.color = "";
}

//Verify re-check password
var passcheckvalid = false;

var passCheckSignUp = document.getElementById("recheck_password_signup");
passCheckSignUp.onkeyup = function() {
    var validPassword = document.getElementById("password_signup").value;
    var recheckPassword = passCheckSignUp.value;
    var validation = document.getElementById("validation2");
    if (validPassword === recheckPassword) {
        validation.style.color = 'green';
        validation.style.fontSize = 'medium';
        validation.innerHTML = "Same password";
        passcheckvalid = true;
    } else {
        validation.style.color = 'red';
        validation.style.fontSize = 'medium';
        validation.innerHTML = "Different password";
        passcheckvalid = false;
    }
}
passCheckSignUp.onblur = function() {
    var validation = document.getElementById("validation2");
    validation.innerHTML = "";
    validation.style.color = "";
    validation.style.fontSize = 'small';
}

var termPrivacyvalid = document.getElementById("termPrivacy");

function submitSignup(event) {
    console.log(passcheckvalid);
    if (emailvalid && passwordvalid && passcheckvalid && termPrivacyvalid.checked) {
        alert("Successful Registration");
        return true;
    } else if (!emailvalid && !passwordvalid && !passcheckvalid) {
        alert("Please enter a valid email address and password");
    } else if (!emailvalid) {
        alert("Email address is not valid!");
    } else if (!passwordvalid || !passcheckvalid) {
        alert("Password is not valid!");
    } else if (!termPrivacyvalid.checked) {
        alert("Please agree to the terms and conditions to continue.");
    }
    event.preventDefault();
    return false;
}


//Popup window for forget password

document.getElementById("forgotpw").addEventListener("click", function() {
    document.getElementById("popup-1").classList.add("active");
});

document.getElementById("close-btn1").addEventListener("click", function() {
    document.getElementById("popup-1").classList.remove("active");
});

document.getElementById("popup_button1").addEventListener("click", function() {
    var email = document.getElementById("popup_email_input").value;
    if (email.match(/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/g)) {
        document.getElementById("popup-1").classList.remove("active");
        document.getElementById("popup-3").classList.add("active");
        document.getElementById("popup_successRest_desc").innerHTML = "An email will be sent to " + email;


    } else if (!email.match(/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/g)) {
        alert("Please enter a valid email.");
    }
});
document.getElementById("close-btn3").addEventListener("click", function() {
    document.getElementById("popup-3").classList.remove("active");
});



//Popup window for terms and agreement
document.getElementById("checkterm").addEventListener("click", function() {
    document.getElementById("popup-2").classList.add("active");
});

document.getElementById("close-btn2").addEventListener("click", function() {
    document.getElementById("popup-2").classList.remove("active");
});

document.getElementById("popup_button2").addEventListener("click", function() {
    document.getElementById("termPrivacy").checked = true;
    document.getElementById("popup-2").classList.remove("active");
});