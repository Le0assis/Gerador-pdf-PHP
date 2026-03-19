function toggleMenu(menuId, value) {
    const menu = document.getElementById(menuId);
    if (value === "sim") {
        menu.style.display = "block";
        menu.querySelector("input").required = true;
    } if (value === "nao") {
        menu.style.display = "none";
        menu.querySelector("input").required = false;
    } else {
        console.error("Valor inesperado:", value);
    }
}

function toggleMenuCheckbox(menuId) {
    const input = document.getElementById(menuId);

    if (!input) {
        console.error("Elemento não encontrado:", menuId.value);
        return;
    }

    input.style.display = menuId.checked ? "inline" : "none";
}

function toggleTabagismo(value) {


    document.getElementById("menu_tabagista").style.display = "none";
    document.getElementById("menu_ex").style.display = "none";

    if (value === "tabagista") {
        const menu = document.getElementById("menu_tabagista");
        menu.style.display = "block";

        menu.querySelectorAll("input").forEach(input => input.required = true);

    } else if (value === "ex") {
        const menu = document.getElementById("menu_ex");
        menu.style.display = "block";

        menu.querySelectorAll("input").forEach(input => input.required = true);
    }
}