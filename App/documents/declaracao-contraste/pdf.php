<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <img src="<?= __DIR__ ?>/../../assets/components/header.png" alt="" id="header">
    <div id="container">

        <h2>Entrevista</h2>
        <h1>TESTE</h1>
        <p>"Eu <?= $_POST['name'] ?> declaro que fui submetido(a) ao
            exame de imagem, com uso de contraste, conforme solicitação médica.
            Estou ciente que, de acordo com as condutas médicas e protocolos de radiologia, além do
            médico solicitante, também é de responsabilidade do médico radiologista indicar a
            utilização de contraste, a fim de garantir uma melhor definição das imagens e um
            diagnóstico preciso."
        </p>

        <br><br>

        <h2>Assinatura do Paciente</h2>

        <br><br>

        <img src="<?= __DIR__ ?>/../../assets/components/signature.png" alt="">

    </div>

    <img src="<?= __DIR__ ?>/../../assets/components/footer.png" alt="" id="footer">


</body>

</html>