<?php 
require __DIR__ . "/../../assets/components/signature.php";

$signature = new Signature("signature.php");
$base64 = $_POST["signature"];
$path = $signature->save($base64);
echo("".$path);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdn.jsdelivr.net/npm/signature_pad'></script>
</head>

<body>
    <div id="container">
        <form id="form" method="POST" action="/gerar/declaracao-contraste">

            <!-- TELA 1 -->
            <div id="step1">
                <h2>Entrevista</h2>

                Nome:
                <input type="text" name="name" required>
                <p>"Eu ___________ declaro que fui submetido(a) ao
                    exame de imagem, com uso de contraste, conforme solicitação médica.
                    Estou ciente que, de acordo com as condutas médicas e protocolos de radiologia, além do
                    médico solicitante, também é de responsabilidade do médico radiologista indicar a
                    utilização de contraste, a fim de garantir uma melhor definição das imagens e um
                    diagnóstico preciso."
                </p>
                <br><br>

                <button type="button" id="btnAssinar">
                    Ir para assinatura
                </button>
            </div>

            <!-- TELA 2 -->
            <div id="step2" style="display:none;">
                <h2>Assinatura do Paciente</h2>

                <canvas id="canvas"></canvas>

                <input type="hidden" name="signature" id="signature">

                <br><br>

                <button type="submit">
                    Finalizar e Gerar PDF
                </button>

            </div>

        </form>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        console.log("PQP");
        try {
            secondaryScreen(
                "btnAssinar",
                "canvas",
                "step1",
                "step2",
                "form",
                "signature"
            );
        } catch (error) {
            console.error("Um erro ocorreu: ", error)

        }
    });

    document.querySelector("form").addEventListener("submit", function() {
    
    if(canvas.toDataURL() === blankCanvas.toDataURL()) {
        alert("Por favor, forneça uma assinatura antes de enviar o formulário.");
        event.preventDefault();
        return false;
    }
    let canvas = document.getElementById("canvas");

    let base64 = canvas.toDataURL("image/png");

    document.getElementById("signature").value = base64;

    });
</script>

