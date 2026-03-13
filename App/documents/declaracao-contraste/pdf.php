<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header>
        <img src="<?= __DIR__ . '/../../assets/components/header.png' ?>" alt="" id="header">
    </header>

    <main>
        <table>

            <tr>
                <td class="td-titulo">
                    <h1>Entrevista</h1>
                </td>
            </tr>
            <tr>
                <td class="td-text">
                    <p>Eu <?= $data['nome'] ?> declaro que fui submetido(a) ao
                        exame de imagem, com uso de contraste, conforme solicitação médica.
                        Estou ciente que, de acordo com as condutas médicas e protocolos de radiologia, além do
                        médico solicitante, também é de responsabilidade do médico radiologista indicar a
                        utilização de contraste, a fim de garantir uma melhor definição das imagens e um
                        diagnóstico preciso.
                    </p>
                </td>
            </tr>

            <tr>
                <td>

                    <div id="date">
                        Marìlia,
                        <span class="day Line"> 01</span>
                        de
                        <span class="month Line">janeiro</span>
                        de
                        <span class="year Line">2023</span>
                    </div>


                    <div id="signature">
                        <img src="<?= __DIR__ . '/../../assets/components/signature.png' ?>" alt="Não achei" id="signature-img">
                    </div>

                    <h2 id="signature-text">Assinatura do Paciente</h2>

                </td>
            </tr>

        </table>
    </main>

    <footer>
        <img src="<?= __DIR__ . '/../../assets/components/footer.png' ?>" alt="" id="footer">
    </footer>


</body>

</html>