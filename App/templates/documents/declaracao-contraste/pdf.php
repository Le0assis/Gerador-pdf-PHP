<img src="<?= __DIR__ ?>/../assets/header.png" alt="" id="header">

<div id="step1">
    <h2>Entrevista</h2>

    <p>"Eu <?= $_POST['name'] ?> declaro que fui submetido(a) ao
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
<div id="step2" style="display:none;">
    <h2>Assinatura do Paciente</h2>

    <canvas id="canvas"></canvas>

    <input type="hidden" name="signature" id="signature">

    <br><br>

    <button type="submit">
        Finalizar e Gerar PDF
    </button>
</div>

<img src="<?= __DIR__ ?>/../assets/footer.png" alt="" id="footer">


<script src="<?= __DIR__ ?>/../assets/signature.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function(){
        secondaryScreen(
            "btnAssinar",
            "canvas",
            "step1",
            "step2",
            "form",
            "signature"
        )    
    });
</script>