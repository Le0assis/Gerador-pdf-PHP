function teste() {
    console.log("TESTE");
}


function toggleMenu(menuId, value) {
    const menu = document.getElementById(menuId);
    if (value === "sim") {
        menu.style.display = "block";
        menu.querySelector("input").required = true;
    } else {
        menu.style.display = "none";
        menu.querySelector("input").required = false;
    }
}