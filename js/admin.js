function showMenu(toggleId, navbarId, bodyId) {
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

function colorLink() {
    linkColor.forEach(l => l.classList.remove('active'));
    this.classList.add('active');
}
linkColor.forEach(l => l.addEventListener('click', colorLink));


function showSubMenu(toggleId, sublistId) {
    var toggle = document.getElementsByClassName(toggleId);
    var sublist = document.getElementsByClassName(sublistId);

    if (toggle && navbar) {
        toggle[0].addEventListener('click', () => {
            sublist[0].classList.toggle('showCollapse');
            toggle[0].classList.toggle('rotate');
        })
    }
}

showSubMenu('collapse-link', 'sublist');




/*
    Sorts HTML table
    @param{HTMLTableElement}
    @param{number}
    @param{boolean}

*/
function sortTableByColumn(table, column, asc = true) {
    const dirModifier = asc ? 1 : -1
    const tBody = table.tBodies[0];
    const rows = Array.from(tBody.querySelectorAll("tr"));

    //Sort each row
    const sortedRows = rows.sort((a, b) => {
        const aColText = a.querySelector(`td:nth-child(${column+1})`).textContent.trim();
        const bColText = b.querySelector(`td:nth-child(${column+1})`).textContent.trim();

        return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
    });

    //Remove all existing TRs one by onefrom the table
    while (tBody.firstChild) {
        tBody.removeChild(tBody.firstChild);
    }

    //Re-add the newly sorted rows
    tBody.append(...sortedRows);

    //Remember how the column is currently sorted
    table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
    table.querySelector(`th:nth-child(${column+1})`).classList.toggle("th-sort-asc", asc);
    table.querySelector(`th:nth-child(${column+1})`).classList.toggle("th-sort-desc", !asc);



}

document.querySelectorAll(".table-sortable th").forEach(headerCell => {
    headerCell.addEventListener("click", () => {
        const tableElement = headerCell.parentElement.parentElement.parentElement;
        const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
        const currentIsAscending = headerCell.classList.contains("th-sort-asc");

        sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
    });
});


//popup window for edit product
document.getElementById("edit_product").addEventListener("click", function() {
    document.getElementById("popup-1").classList.add("active");
});

document.getElementById("close-btn").addEventListener("click", function() {
    document.getElementById("popup-1").classList.remove("active");
});