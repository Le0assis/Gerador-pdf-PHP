
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
                <input type="text" name="nome" required>
                <label>"Eu ___________ declaro que fui submetido(a) ao
                    exame de imagem, com uso de contraste, conforme solicitação médica.
                    Estou ciente que, de acordo com as condutas médicas e protocolos de radiologia, além do
                    médico solicitante, também é de responsabilidade do médico radiologista indicar a
                    utilização de contraste, a fim de garantir uma melhor definição das imagens e um
                    diagnóstico preciso."
                </label>
                <br><br>

                <button type="button" onclick="changeStep('step1', 'step2')" id="btnAssinar">
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
                <button type="button" onclick="changeStep('step2', 'step1')">
                    Voltar
                </button>

            </div>

        </form>
    </div>

</body>
</html>