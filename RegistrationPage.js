var modal = document.getElementById("myModal");
var modal2 = document.getElementById("mymodal2");
var modal3 = document.getElementById("mymodal3");
var modal4 = document.getElementById("mymodal4");
var btn = document.getElementById("myBtn");
var checkterm = document.getElementById("checkterm");
var backarrow = document.getElementById("back");
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close2")[0];
var span3 = document.getElementsByClassName("close2")[1];
var span4 = document.getElementsByClassName("close2")[2];
var emailDisaply = document.getElementById("emailsent");
var checkbox = document.getElementById("checkbox");
var confirm_button_termform = document.getElementById("termformconfirm");
var cancel_button_termform = document.getElementById("termformcancel");
var signin_button = document.getElementById("signin");
var signup_button = document.getElementById("signup");
var reset_button = document.getElementById("reset_button");
var notification1 = document.getElementById("notification1");
var notification2 = document.getElementById("notification2");
var emailinput = document.getElementById("email");
var passinput = document.getElementById("password");
var repeatinput = document.getElementById("repeatinput");
var resetinput = document.getElementById("reset");
var formlabel = document.getElementById("formlabel");
var fieldset = document.getElementById("fieldset_userform");
var v1 = document.getElementById("v1");
var v2 = document.getElementById("v2");
var v3 = document.getElementById("v3");
var v4 = document.getElementById("v4");
var v5 = document.getElementById("v5");
var v6 = document.getElementById("v6");
var passvalid = false;
var emailvalid = false;
var emailvalid2 = false;
var repeatvalid = false;
var label = document.createElement("label");

signin_button.onclick = function () {
    backarrow.style.display = "block";
    signup_button.innerHTML = "Sign in";
    notification1.style.display = "none";
    notification2.style.display = "none";
    checkbox.style.display = "none";
    formlabel.innerHTML = "Sign In";
    formlabel.style.left = "170px";
    repeatinput.style.display = "none";
    clearBoxShadow();
    passinput.value = "";
    emailinput.value = "";
    var temp = document.createElement("div");
    signup_button.parentNode.insertBefore(temp, signup_button);
    repeatinput.parentNode.insertBefore(signup_button, repeatinput);
    temp.parentNode.insertBefore(repeatinput, temp);
    temp.parentNode.removeChild(temp);
    label.style.display = "block";
    label.innerHTML = "Forget Password?<br/><br/>";
    label.classList.add("signin");
    label.onclick = function () {
        showResetBox();

    }
    backarrow.onclick = function () {
        location.reload();
    }
    signup_button.parentNode.insertBefore(label, signup_button);
    document.getElementById("fieldset_userform").style.paddingTop = "40px";
}

function showResetBox() {
    modal3.style.display = "block";
}

checkterm.onclick = function () {
    modal2.style.display = "block";
}
confirm_button_termform.onclick = function () {
    modal2.style.display = "none";
    checkbox.checked = true;
}
cancel_button_termform.onclick = function () {
    modal2.style.display = "none";
    checkbox.checked = false;
}
resetinput.onblur = function () {
    if (resetinput.value.match(/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/g)) {
        resetinput.style.boxShadow = "0 0 7px forestgreen";
        emailvalid2 = true;
    } else {
        resetinput.style.boxShadow = "0 0 7px red";
        emailvalid2 = false;
    }

}
reset_button.onclick = function () {
    if (emailvalid2) {
        successful_reset();
    } else {
        alert("The email address you entered is invalid");
    }

}

function successful_reset() {
    modal4.style.display = "block";
    emailDisaply.innerHTML = "" + resetinput.value;
    emailDisaply.setAttribute("style", "color:dodgerblue;text-decoration: underline; font-weight:bold;");


}

span.onclick = function () {
    modal.style.display = "none";
    if (repeatinput.style.display == "none") {
        location.reload();
    }
}
span2.onclick = function () {
    modal2.style.display = "none";
}

span3.onclick = function () {
    resetinput.value = "";
    resetinput.style.boxShadow = "";
    emailvalid2 = false;
    modal3.style.display = "none";
}
span4.onclick = function () {
    resetinput.value = "";
    resetinput.style.boxShadow = "";
    emailvalid2 = false;
    modal4.style.display = "none";
    modal3.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}

passinput.onfocus = function () {
    if (signup_button.innerHTML != "Sign in") {
        if (passvalid) {
            v3.classList.remove("v2");
            v3.classList.add("v1");
            v4.classList.remove("v2");
            v4.classList.add("v1");
            v4.classList.remove("v2");
            v4.classList.add("v1");
            v1.classList.remove("v2");
            v1.classList.add("v1");
            v2.classList.remove("v2");
            v2.classList.add("v1");
            passinput.style.boxShadow = "0 0 7px red";
            passvalid = false;
        }
        document.getElementById("passvalidate1").style.display = "block";
    }
}
passinput.onblur = function () {
    if (!passvalid) {
        passinput.style.boxShadow = "0 0 7px red";
    } else {
        passinput.style.boxShadow = "0 0 7px forestgreen";
    }
    document.getElementById("passvalidate1").style.display = "none";
}
passinput.onkeyup = function () {
    if (signup_button.innerHTML != "Sign in") {
        var uppercase = false;
        var digit = false;
        var length = false;
        var lower = false;
        if (passinput.value.match(/[A-Z]/g)) {
            v3.classList.remove("v1");
            v3.classList.add("v2");
            uppercase = true;
            passvalid = uppercase && digit && length && lower;
        } else {
            v3.classList.remove("v2");
            v3.classList.add("v1");
            uppercase = false;
            passvalid = uppercase && digit && length && lower;
        }
        if (passinput.value.match(/[a-z]/g)) {
            v4.classList.remove("v1");
            v4.classList.add("v2");
            lower = true;
            passvalid = uppercase && digit && length && lower;
        } else {
            v4.classList.remove("v2");
            v4.classList.add("v1");
            lower = false;
            passvalid = uppercase && digit && length && lower;
        }
        if (passinput.value.length >= 6) {
            v1.classList.remove("v1");
            v1.classList.add("v2");
            length = true;
            passvalid = uppercase && digit && length && lower;
        } else {
            v1.classList.remove("v2");
            v1.classList.add("v1");
            length = false;
            passvalid = uppercase && digit && length && lower;
        }
        if (passinput.value.match(/[0-9]/g)) {
            v2.classList.remove("v1");
            v2.classList.add("v2");
            digit = true;
            passvalid = uppercase && digit && length && lower;
        } else {
            v2.classList.remove("v2");
            v2.classList.add("v1");
            digit = false;
            passvalid = uppercase && digit && length && lower;
        }
    }

}
emailinput.onfocus = function () {
    if (signup_button.innerHTML != "Sign in") {
        if (emailvalid) {
            v5.classList.remove("v2");
            v5.classList.add("v1");
            emailinput.style.boxShadow = "0 0 7px red";
            emailvalid = false;
        }
        document.getElementById("emailvalidate").style.display = "block";
    }
}
emailinput.onblur = function () {
    if (!emailvalid) {
        emailinput.style.boxShadow = "0 0 7px red";
    } else {
        emailinput.style.boxShadow = "0 0 7px forestgreen";
    }

    document.getElementById("emailvalidate").style.display = "none";
}

emailinput.onkeyup = function () {
    if (signup_button.innerHTML != "Sign in") {
        if (emailinput.value.match(/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/g)) {

            v5.classList.remove("v1");
            v5.classList.add("v2");
            emailvalid = true;
        } else {

            v5.classList.remove("v2");
            v5.classList.add("v1");
            emailvalid = false;
        }
    }
}
document.getElementById("repeatpassword").onfocus = function () {
    if (passinput.value != "") {
        if (repeatvalid) {
            v6.classList.remove("v2");
            v6.classList.add("v1");
            document.getElementById("repeatpassword").style.boxShadow = "0 0 7px red";
            repeatvalid = false;
        }
        document.getElementById("repeatvalidate").style.display = "block";
    }
}
document.getElementById("repeatpassword").onblur = function () {
    if (!repeatvalid) {
        document.getElementById("repeatpassword").style.boxShadow = "0 0 7px red";
    } else {
        document.getElementById("repeatpassword").style.boxShadow = "0 0 7px forestgreen";
    }
    document.getElementById("repeatvalidate").style.display = "none";
}
document.getElementById("repeatpassword").onkeyup = function () {
    if (document.getElementById("repeatpassword").value.length != 0 && document.getElementById("repeatpassword").value == passinput.value) {

        v6.classList.remove("v1");
        v6.classList.add("v2");
        repeatvalid = true;
    } else {

        v6.classList.remove("v2");
        v6.classList.add("v1");
        repeatvalid = false;
    }
}
signup_button.onclick = function () {
    if (signup_button.innerHTML != "Sign in") {
        if (passinput.value == "" || emailinput.value == "" || document.getElementById("repeatpassword").value == "") {
            alert("Input field cannot be empty");
            passinput.value = "";
            emailinput.value = "";
            document.getElementById("repeatpassword").value = "";
            clearBoxShadow();
            checkbox.checked = false;
        } else if (checkbox.checked == false) {
            passinput.value = "";
            emailinput.value = "";
            document.getElementById("repeatpassword").value = "";
            clearBoxShadow();
            alert("Must agree term and privacy to continue!");
        } else if (passvalid && emailvalid && repeatvalid) {
            alert("All done!");
        } else {

            if (!emailvalid) {
                passinput.value = "";
                emailinput.value = "";
                document.getElementById("repeatpassword").value = "";
                checkbox.checked = false;
                clearBoxShadow();
                alert("Email address is not valid!");
            } else if (!passvalid) {
                passinput.value = "";
                emailinput.value = "";
                document.getElementById("repeatpassword").value = "";
                checkbox.checked = false;
                clearBoxShadow();
                alert("Password is not valid!");
            } else if (!repeatvalid) {
                passinput.value = "";
                emailinput.value = "";
                document.getElementById("repeatpassword").value = "";
                checkbox.checked = false;
                clearBoxShadow();
                alert("Two passwords you entered are not same!");
            }
        }
    } else {
        alert("Sign In!");
    }
}

function clearBoxShadow() {
    emailinput.style.boxShadow = "";
    passinput.style.boxShadow = "";
    document.getElementById("repeatpassword").style.boxShadow = "";
}
