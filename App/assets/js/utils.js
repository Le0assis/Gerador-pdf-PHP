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




const instances = [];

function initPainMarker({ imageId, canvasId, inputId }) {

    const img = document.getElementById(imageId);
    const canvas = document.getElementById(canvasId);
    const input = document.getElementById(inputId);
    const ctx = canvas.getContext("2d");

    let pontos = [];

    function resizeCanvas() {
        canvas.width = img.clientWidth;
        canvas.height = img.clientHeight;

        canvas.style.position = "absolute";
        canvas.style.left = 0;
        canvas.style.top = 0;
    }

    img.onload = resizeCanvas;
    window.addEventListener("resize", resizeCanvas);

    canvas.addEventListener("click", function(e) {
        const rect = canvas.getBoundingClientRect();

        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        pontos.push({ x, y });

        desenhar();
        atualizarInput();
    });

    function desenhar() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        pontos.forEach(p => {
            ctx.beginPath();
            ctx.arc(p.x, p.y, 6, 0, 2 * Math.PI);
            ctx.fillStyle = "red";
            ctx.fill();
        });
    }

    function atualizarInput() {
        input.value = JSON.stringify(pontos);
    }

    function removerUltimo() {
        pontos.pop();
        desenhar();
        atualizarInput();
    }

    // guarda essa instância
    instances.push({
        removerUltimo
    });
}