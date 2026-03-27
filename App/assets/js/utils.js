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

    canvas.addEventListener("click", function (e) {
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


document.querySelectorAll(".draw-area").forEach(area => {
    const img = area.querySelector("img");
    const canvas = area.querySelector("canvas");
    const inputId = area.dataset.input;
    const input = document.getElementById(inputId);

    const ctx = canvas.getContext("2d");
    let pontos = [];

    function resizeCanvas() {
        canvas.width = img.clientWidth;
        canvas.height = img.clientHeight;

        canvas.style.position = "absolute";
        canvas.style.top = 0;
        canvas.style.left = 0;
    }

    img.onload = resizeCanvas;
    window.addEventListener("resize", resizeCanvas);

    canvas.addEventListener("click", e => {
        const rect = canvas.getBoundingClientRect();

        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        ctx.beginPath();
        ctx.arc(x, y, 6, 0, Math.PI * 2);
        ctx.fillStyle = "red";
        ctx.fill();

        pontos.push({ x, y });

        input.value = JSON.stringify(pontos);
    });
});

let signaturePad = null;

function startSignature(canvasId, formId, inputHiddenId) {

    const canvas = document.getElementById(canvasId);

    canvas.width = canvas.offsetWidth;
    canvas.height = canvas.offsetHeight;

    if (canvas.width === 0 || canvas.height === 0) {
        console.log("Canvas ainda não visível");
        return;
    }

    if (!signaturePad) {
        signaturePad = new SignaturePad(canvas);
    }

    canvas.onclick = () => canvas.focus();

    canvas.onkeydown = (event) => {
        if (event.code === "Space") {
            event.preventDefault();
            signaturePad.clear();
        }
    };

    document.getElementById(formId).onsubmit = function () {
        if (!signaturePad.isEmpty()) {
            document.getElementById(inputHiddenId).value =
                signaturePad.toDataURL();
        }
    };
}

function changeStep(currentStepID, nextStepID) {

    const form = document.getElementById("form");

    if (!form.reportValidity()) return;

    document.getElementById(currentStepID).style.display = "none";
    document.getElementById(nextStepID).style.display = "block";

    setTimeout(() => {
        const canvas = document.getElementById("canvas");

        if (canvas && canvas.offsetWidth > 0) {
            startSignature("canvas", "form", "signature");
        }
    }, 100);
}
function backStep() {
    if (signaturePad && !signaturePad.isEmpty()) {
        document.getElementById("signature").value =
            signaturePad.toDataURL();
    }

    changeStep('step2', 'step1');
}



function toggleRequired(inputId, $value) {

    const input = document.getElementById(inputId);
    if ($value === "sim") {
        input.style.display = "block";
        input.required = true;
    } else {
        input.style.display = "none";
        input.required = false;
    }
}

