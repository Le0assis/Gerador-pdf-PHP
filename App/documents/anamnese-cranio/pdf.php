<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    
    <div>
        <table>
            <tr>
                <td>
                    <p><strong>Nome: </strong></p>
                    <p><?= $data['nome'] ?></p>
                </td>
                <td>
                    <p><strong>Idade: </strong></p>
                    <p><?= $data['idade'] ?></p>
                </td>
                <td>
                    <p><strong>Peso: </strong></p>
                    <p><?= $data['peso'] ?></p>
                </td>
            </tr>
        </table>
    </div>

    <div>
        <p><strong>1. Motivo do exame e início da sintomatologia:</strong></p>
        <p><?= $data['motivo_exame'] ?></p>
    </div>

    <div>
        <p><strong>2. Se cefaleia, qual a localização, o tipo da dor e a duração?</strong></p>
        <p><?= $data['cefaleia'] ?></p>
    </div>

    <div>
        <p><strong>3. Teve convulsões?</strong></p>

        <?php if ($data['convulsoes'] == "sim"): ?>

            <p>Sim</p>

            <p><strong>Percebe quando vai ter a crise?</strong></p>
            <p><?= $data['percepcao_crise'] ?></p>

            <p><strong>Alguém testemunhou a crise?</strong></p>
            <p><?= $data['testemunha_crise'] ?></p>

        <?php else: ?>
            <p>Não</p>
        <?php endif; ?>
    </div>

    <div>
        <?php foreach ($data['sintomas'] as $sintoma): ?>
            <p>
                <input type="checkbox" <?= in_array($sintoma, $data['sintomas']) ? 'checked' : '' ?>>
                <?= $sintoma ?>
            </p>
        <?php endforeach; ?>

        <?php if (in_array("outros", $data['sintomas'])): ?>
            <p><strong>Outros sintomas:</strong></p>
            <p><?= $data['outros_sintomas'] ?></p>
        <?php endif; ?>
    </div>

    <div>
        <p><strong>5. Medicamentos em uso:</strong></p>
        <p><?= $data['medicamentos'] ?></p>
    </div>

    <div>
        <p><strong>6. Já fez cirurgias na cabeça? Quais e quantas?</strong></p>
        <p><?= $data['cirurgias_cabeca'] ?></p>
    </div>

    <div>
        <p><strong>7. Já foi submetido a Radio ou Quimioterapia? Há quanto tempo e em que local?</strong></p>
        <p><?= $data['radio_quimioterapia'] ?></p>
    </div>

    <div>
        <p><strong>8. Paciente é criança ou teve filhos?</strong></p>

        <?php if ($data['criancas'] == "sim"): ?>
            <p>Sim</p>

            <p><strong>Gestação normal? Complicações?</strong></p>
            <p><?= $data['gestacao'] ?></p>

            <p><strong>Parto normal? </strong></p>
            <p><?= $data['parto'] ?></p>

            <p><strong>Atraso no desenvolvimento? </strong></p>
            <p><?= $data['atraso_desenvolvimento'] ?></p>

        <?php else: ?>
            <p>Não</p>
        <?php endif; ?>
    </div>

    <div>
        <table>
            <tr>
                <td>
                    <p><strong>Creatina Sérica: </strong></p>
                    <p><?= $data['creatina_serica'] ?></p>
                </td>
                <td>
                    <p><strong>Data realizada: </strong></p>
                    <p><?= $data['data'] ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><strong>Suspeita de gravidez: </strong></p>
                </td>
                <td>
                    <p><?= $data['suspeita_gravidez'] ?></p>
                </td>

            </tr>
            <tr>
                <td>
                    <p><strong>Alergias: </strong></p>
                    <p><?= $data['alergias'] ?></p>
                </td>
                <td>
                    <p><strong>Doença base: </strong></p>
                    <p><?= $data['doenca_base'] ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><strong>Asma: </strong></p>
                    <p><?= $data['asma'] ?></p>
                </td>
                <td>
                    <p><strong>IR: </strong></p>
                    <p><?= $data['IR_descricao'] ?></p>
                </td>
            </tr>

        </table>





    </div>


</body>

</html>