<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Anamnese de Face/Mastoide</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td {
            padding: 5px;
            vertical-align: top;
            border: 1px solid #ddd;
        }

        .header-table td {
            border: none;
        }

        .section-title {
            font-weight: bold;
            background-color: #f2f2f2;
            padding: 5px;
            margin-top: 15px;
            border: 1px solid #ddd;
        }

        .content-box {
            border: 1px solid #ddd;
            padding: 10px;
            min-height: 20px;
            margin-bottom: 10px;
        }

        .label {
            font-weight: bold;
        }

        .checkbox-item {
            display: inline-block;
            margin-right: 15px;
        }

        .signature-box {
            margin-top: 30px;
            text-align: center;
        }

        .signature-image {
            max-width: 300px;
            border-bottom: 1px solid #000;
        }
    </style>
</head>

<body>

    <h2 style="text-align: center;">Anamnese de Face / Mastoide</h2>

    <table class="header-table">
        <tr>
            <td><span class="label">Nome:</span> <?= $data['nome'] ?></td>
            <td><span class="label">Idade:</span> <?= $data['idade'] ?></td>
            <td><span class="label">Peso:</span> <?= $data['peso'] ?> kg</td>
        </tr>
    </table>

    <div class="section-title">1. Motivo do exame e início da sintomatologia:</div>
    <div class="content-box"><?= nl2br($data['motivo_exame']) ?></div>

    <div class="section-title">2. Queixa de dor facial?</div>
    <div class="content-box">
        <?php if ($data['queixa_dor'] == "sim"): ?>

            <strong>Sim.</strong><br>
            <?php foreach ($data['queixa_dor_locais'] as $local): ?>
                <span class="checkbox-item">[x] <?= ucfirst(str_replace('_', ' ', $local)) ?></span>
            <?php endforeach; ?>

            <?= !empty($data['queixa_dor_outras']['outro']) ? "({$data['queixa_dor_outras']['outro']})" : "" ?><br>

            <span class="label">Tipo:</span> <?= $data['queixa_dor_tipo'] ?> | <span class="label">Duração:</span> <?= $data['queixa_dor_duracao'] ?>
        <?php else: ?>
            Não.
        <?php endif; ?>
    </div>

    <div class="section-title">3. Secreção ou Obstrução Nasal:</div>
    <div class="content-box">
        <span class="label">Tipo:</span> <?= $data['screcao_obstrucao'] ?? 'Nenhum' ?><br>
        <span class="label">Lado:</span> <?= isset($data['screcao_obstrucao_locais']) ? implode(', ', $data['screcao_obstrucao_locais']) : 'Nenhum' ?>
    </div>

    <div class="section-title">4. Sintomas Associados:</div>
    <div class="content-box">
        <?php if (!empty($data['sintomas_associados'])): ?>
            <?php foreach ($data['sintomas_associados'] as $sintoma): ?>
                <span class="checkbox-item">[x] <?= ucfirst(str_replace('_', ' ', $sintoma)) ?></span>
            <?php endforeach; ?>
        <?php else: ?>
            Nenhum sintoma selecionado.
        <?php endif; ?>
    </div>

    <div class="section-title">5. Histórico Odontológico:</div>
    <div class="content-box">
        <?php if (!empty($data['historico_odontologico'])): ?>
            <?php foreach ($data['historico_odontologico'] as $key => $value): ?>
                <?php if (!empty($data['historico_odontologico'][$value]) || !empty($data['historico_odontologico'][$key])): ?>
                    <?php if ($key !== 'obs' && !is_array($value)): ?>
                        <span class="checkbox-item"><strong><?= ucfirst($value) ?>:</strong> <?= $data['historico_odontologico'][$value] ?? '' ?></span>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            <br><span class="label">Observações:</span> <?= $data['historico_odontologico']['obs'] ?>
        <?php endif; ?>
    </div>
    <div class="section-title">6. Trauma </div>
    <div class="content-box">
        <span class="label">Trauma:</span> <?= $data['trauma'] == 'sim' ? "Sim ({$data['data_trauma']}) - {$data['descricao_trauma']}" : "Não" ?>
    </div>
    <div class="section-title">7. Cirurgia:</div>
    <div class="content-box">
        <span class="label">Trauma:</span> <?= $data['trauma'] == 'sim' ? "Sim ({$data['data_trauma']}) - {$data['descricao_trauma']}" : "Não" ?><br>
        <span class="label">Cirurgia Prévia (Face/Crânio/Garganta):</span> <?= $data['cirurgia_garganta'] ?>
    </div>

    <div class="section-title">8. Tabagismo:</div>
    <div class="content-box">
        <?php
        if ($data['tabagista'] == 'tabagista') echo "Fumante: {$data['tabagista_maços_por_dia']} maços/dia por {$data['tabagista_tempo_fumando']}";
        elseif ($data['tabagista'] == 'exTabagista') echo "Ex-Fumante: Parou há {$data['exTabagista_tempo_fumando']} (Fumou por {$data['exTabagista_quanto_tempo']})";
        else echo "Não fumante";
        ?>
    </div>

    <div class="section-title">9. Tratamento para:</div>
    <div class="content-box">
        <?= isset($data['TTO']) ? implode(', ', array_filter($data['TTO'], fn($v) => !is_array($v))) : 'Nenhum' ?>
        <?= !empty($data['TTO']['outras']) ? " | Outras: " . $data['TTO']['outras'] : '' ?>
    </div>

    <div class="section-title">10. Quimioterapia e Radioterapia:</div>
    <div class="content-box">
        <span class="label">Quimioterapia:</span> <?= $data['quimioterapia'] == 'sim' ? $data['quimioterapia_explicacao'] : 'Não' ?><br>
        <span class="label">Radioterapia:</span> <?= $data['radioterapia'] == 'sim' ? $data['radioterapia_explicacao'] : 'Não' ?>
    </div>

    <div class="section-title">Dados Clínicos e Alergias:</div>
    <table>
        <tr>
            <td><span class="label">Creatina Sérica:</span> <?= $data['creatina_serica'] ?> (Data: <?= $data['data'] ?>)</td>
            <td><span class="label">Suspeita Gravidez:</span> <?= $data['suspeita_gravidez'] ?></td>
        </tr>
        <tr>
            <td><span class="label">Alergias:</span> <?= $data['alergias'] ?></td>
            <td><span class="label">Doença de Base:</span> <?= $data['doenca_base'] ?></td>
        </tr>
        <tr>
            <td><span class="label">Asma:</span> <?= $data['asma'] ?></td>
            <td><span class="label">Insuficiência Renal (IR):</span> <?= $data['IR_descricao'] ?: 'Não' ?></td>
        </tr>
    </table>

    <div class="section-title">Autorização de Telerradiologia:</div>
    <div class="content-box">
        O paciente <strong><?= $data['autorizacao'] == 'sim' ? 'AUTORIZA' : 'NÃO AUTORIZA' ?></strong> o compartilhamento de imagens para fins de diagnóstico.
    </div>

    <?php if (!empty($data['signature'])): ?>
        <div class="signature-box">
            <p>Assinatura do Paciente:</p>
            <img src="<?= $data['signature'] ?>" class="signature-image">
        </div>
    <?php endif; ?>

</body>

</html>