
function showMenu(toggleId, navbarId, bodyId){
    var toggle = document.getElementById(toggleId);
    var navbar = document.getElementById(navbarId);
    var bodypadding = document.getElementById(bodyId);

    if (toggle && navbar) {
        toggle.addEventListener('click', () => {
            navbar.classList.toggle('expander');
            bodypadding.classList.toggle('body-id');
        })
    }
}

showMenu('nav-toggle', 'navbar', 'body-id');

var linkColor = document.querySelectorAll('.nav-list-link');
function colorLink(){
    linkColor.forEach(l => l.classList.remove('active'));
    this.classList.add('active');
}
linkColor.forEach(l=> l.addEventListener('click', colorLink));


function showSubMenu(toggleId, sublistId){
    var toggle = document.getElementsByClassName(toggleId);
    var sublist = document.getElementsByClassName(sublistId);

    if (toggle && navbar) {
        toggle[0].addEventListener('click', () => {
            sublist[0].classList.toggle('showCollapse');
            toggle[0].classList.toggle('rotate');
        })
    }
}

showSubMenu('collapse-link','sublist');





/* Don't touch the bottom for now */
/*
var linkCollapse = document.getElementsByClassName('collapse-link');
var i

for(i=0;i<linkCollapse.length;i++){
  linkCollapse[i].addEventListener('click', function(){
    const collapseMenu = this.nextElementSibling
    collapseMenu.classList.toggle('showCollapse')

    const rotate = collapseMenu.previousElementSibling
    rotate.classList.toggle('rotate')
  })
}

*/
