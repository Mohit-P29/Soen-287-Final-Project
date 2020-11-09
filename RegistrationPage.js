var modal = document.getElementById("myModal");
var modal2 = document.getElementById("mymodal2")
var btn = document.getElementById("myBtn");
var checkterm = document.getElementById("checkterm");
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close2")[0];
var checkbox = document.getElementById("checkbox");
var confirm_button_termform = document.getElementById("termformconfirm");
var cancel_button_termform = document.getElementById("termformcancel");
var signin_button = document.getElementById("signin");
var signup_button = document.getElementById("signup");
var notification1 = document.getElementById("notification1");
var notification2 = document.getElementById("notification2");
var emailinput = document.getElementById("email");
var passinput = document.getElementById("password");
var repeatinput = document.getElementById("repeatinput");
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
var repeatvalid = false;
signin_button.onclick = function () {
    signup_button.innerHTML = "Sign in";
    notification1.style.display = "none";
    notification2.style.display = "none";
    checkbox.style.display = "none";
    formlabel.innerHTML = "Sign In";
    repeatinput.style.display="none";
    var temp = document.createElement("div");
    signup_button.parentNode.insertBefore(temp, signup_button);
    repeatinput.parentNode.insertBefore(signup_button, repeatinput);
    temp.parentNode.insertBefore(repeatinput, temp);
    temp.parentNode.removeChild(temp);


}

btn.onclick = function () {
    modal.style.display = "block";
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

span.onclick = function () {
    modal.style.display = "none";
    if (repeatinput.style.display == "none") {
        location.reload();
    }
}
span2.onclick = function () {
    modal2.style.display = "none";
}


window.onclick = function (event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}

passinput.onfocus = function () {
    if(signup_button.innerHTML!="Sign in"){
    document.getElementById("passvalidate1").style.display = "block";
    }
}
passinput.onblur = function () {
    document.getElementById("passvalidate1").style.display = "none";
}
passinput.onkeyup = function () {
   if(signup_button.innerHTML!="Sign in"){
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
    if(signup_button.innerHTML!="Sign in"){
    document.getElementById("emailvalidate").style.display = "block";
    }
}
emailinput.onblur = function () {
    document.getElementById("emailvalidate").style.display = "none";
}

emailinput.onkeyup = function () {
  if(signup_button.innerHTML!="Sign in"){
    if (emailinput.value.match(/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/g)) {
        v5.style.color = "forestgreen";
        emailvalid=true;
    } else {
        v5.style.color = "red";
        emailvalid=false;
    }
  }
}
repeatinput.onfocus = function () {
    document.getElementById("repeatvalidate").style.display = "block";
}
repeatinput.onblur = function () {
    document.getElementById("repeatvalidate").style.display = "none";
}
repeatinput.onkeyup = function () {
    if (document.getElementById("repeatpassword").value.length != 0 && document.getElementById("repeatpassword").value==passinput.value) {
        v6.style.color = "forestgreen";
        repeatvalid=true;
    } else {
        v6.style.color = "red";
        repeatvalid=false;
    }
}
signup_button.onclick=function(){
  if(signup_button.innerHTML!="Sign in"){
    if(checkbox.checked==false){
        passinput.value="";
        emailinput.value="";
        repeatinput.value="";
        alert("Must agree term and privacy to continue!");
    }
    if(passinput.value=="" || emailinput.value=="" || repeatinput.value==""){
        alert("Input field cannot be empty");
        passinput.value="";
        emailinput.value="";
        repeatinput.value="";
    }
    else if(passvalid && emailvalid && repeatvalid){
        alert("All done!");
    }
  }
    else{
        alert("yes");
    }
}
