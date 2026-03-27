function startSignature(canvasId, formId, inputHiddenId){
    
    const canvas = document.getElementById(canvasId);
    canvas.width = canvas.offsetWidth;
    canvas.height = canvas.offsetHeight;
    canvas.tabIndex = 0;
    let signaturePad = new SignaturePad(canvas);
    let signatureOn = false;

    canvas.addEventListener("click", function() {
        canvas.focus();
    });

    canvas.addEventListener("focus", function() {
        signatureOn = true;
        canvas.style.border = "2px solid blue";
    });

    canvas.addEventListener("blur", function(e){

        signatureOn = false;
        canvas.style.border = "1px solid black";
    });

    canvas.addEventListener("keydown", function(event){

        if (event.code === "Space") {
            event.preventDefault();
            signaturePad.clear();
        }
        if (event.code === "Enter") {
            event.preventDefault();
            canvas.blur();
        }
    })
   
    document.getElementById(formId).addEventListener("submit", function() {

        if (!signaturePad.isEmpty()) {
        const dataURL = signaturePad.toDataURL();
        document.getElementById(inputHiddenId).value = dataURL;
        }
    });


}ht * ratio;


let signaturePad = null;

function startSignature(canvasId, formId, inputHiddenId){

    const canvas = document.getElementById(canvasId);
    const ctx = canvas.getContext("2d");

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    canvas.width = canvas.offsetWidth;
    canvas.height = canvas.offsetHeight;

    if (canvas.width === 0 || canvas.height === 0) {
    console.log("Canvas ainda não visível ", canvas.width, canvas.height);
    return;
}

    if (signaturePad) {
        signaturePad.off();
    }

    signaturePad = new SignaturePad(canvas);

    signaturePad.clear();

    canvas.onclick = () => canvas.focus();

    canvas.onkeydown = (event) => {
        if (event.code === "Space") {
            event.preventDefault();
            signaturePad.clear();
        }
        if (event.code === "Enter") {
            event.preventDefault();
            canvas.blur();
        }
    };

    document.getElementById(formId).onsubmit = function () {
        if (!signaturePad.isEmpty()) {
            document.getElementById(inputHiddenId).value =
                signaturePad.toDataURL();
        }
    };
}


function secondaryScreen(btnID, canvasID, step1ID, step2ID, form, signature){

    const btnAssinar = document.getElementById(btnID);
    const step1 = document.getElementById(step1ID);
    const step2 = document.getElementById(step2ID);
    const canvas = document.getElementById(canvasID);

    if(btnAssinar){
        btnAssinar.addEventListener("click", function(){

            const name = document.querySelector("input[name='name']").value;

            if(!name){
                alert("Preencha o nome antes de assinar.");
                return;
            }

            step1.style.display = "none";

            step2.style.display = "block";

        setTimeout(() => {
            startSignature(canvasID, form, signature);
        }, 50);
        })
    }
}


function changeStep(currentStepID, nextStepID){
    
    const canvas = document.getElementById("canvas");

    document.getElementById(currentStepID).style.display = "none";
    document.getElementById(nextStepID).style.display = "block";
    
    if(canvas){
        startSignature("canvas", "form", "signature");
    }
}

function toggleRequired(inputId, $value){
    
    const input = document.getElementById(inputId);
    if($value === "sim"){
        input.style.display = "block";
        input.required = true;
    } else {
        input.style.display = "none";
        input.required = false;
    }   
}

