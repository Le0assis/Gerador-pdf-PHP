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
    const checkbox = document.querySelector(`input[name="historico_odontologico[]"][value="${menuId}"]`);
    const menu = document.getElementById(menuId);
    if (!checkbox) {
        console.error("Checkbox não encontrado para menuId:", menuId);
        return;
    }
    if (checkbox.checked) {
        menu.style.display = "block";

    } else {
        menu.style.display = "none";

    }
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