var adminModal = document.getElementById("adminModal");
var clientModal = document.getElementById("clientModal");
var addAdminModal = document.getElementById("addAdminModal");

var adminBtn = document.getElementById("adminButton");
var clientBtn = document.getElementById("clientButton");
var addAdminBtn = document.getElementById("addAdminBtn");

var adminClose = document.getElementById("adminClose");
var clientClose = document.getElementById("clientClose");
var addAdminClose = document.getElementById("addAdminClose");

adminBtn.onclick = function() {
    adminModal.style.display = "block";
}

clientBtn.onclick = function() {
    clientModal.style.display = "block";
}

function openAddAdminModal() {
    addAdminModal.style.display = "block";
}

adminClose.onclick = function() {
    adminModal.style.display = "none";
}

clientClose.onclick = function() {
    clientModal.style.display = "none";
}

addAdminClose.onclick = function() {
    addAdminModal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == adminModal) {
        adminModal.style.display = "none";
    }
    if (event.target == clientModal) {
        clientModal.style.display = "none";
    }
    if (event.target == addAdminModal) {
        addAdminModal.style.display = "none";
    }
}
