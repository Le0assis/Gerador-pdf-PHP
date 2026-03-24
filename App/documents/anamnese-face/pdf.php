<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
</head>

<body>

    <div class="a4-container">
        <div class="header">
            <h1>Anamnese de Face / Mastoide</h1>
            <small>Unimagem - Diagnóstico por Imagem</small>
        </div>
        <div style="text-align: right; color: #999;">Data: <?= date('d/m/Y') ?></div>

        <table class="header-table">
            <tr>
                <td>
                    <span class="label">Nome:</span>
                    <div> <?= $data['nome'] ?></div>
                </td>
                <td>
                    <span class="label">Idade:</span>
                    <div> <?= $data['idade'] ?></div>
                </td>
                <td>
                    <span class="label">Peso:</span>
                    <div> <?= $data['peso'] ?> kg</div>
                </td>
            </tr>
        </table>

        <div class="section-box">
            <div class="label">1. Motivo do exame e início da sintomatologia:</div>
            <div class="response"><?= nl2br($data['motivo_exame']) ?></div>
        </div>
        <div class="section-box">
            <div class="label">2. Queixa de dor facial?</div>
            <div class="response">
                <?php if (isset($data['queixa_dor']) && $data['queixa_dor'] == "sim"): ?>
                    <strong>Sim.</strong><br>
                    <?php foreach ($data['queixa_dor_locais'] as $local): ?>
                        <span class="checkbox-item">[x] <?= ucfirst(str_replace('_', ' ', $local)) ?></span>
                    <?php endforeach; ?>
                    <?php if (!empty($data['queixa_dor_outras']['outro'])): ?>
                        <br>
                        <span class="checkbox-item">[x] Outro: <?= $data['queixa_dor_outras']['outro'] ?></span>
                    <?php endif; ?>
                <?php else: ?>
                    Não.
                <?php endif; ?>
            </div>
        </div>


        <div class="label">3. Secreção ou Obstrução Nasal:</div>
        <div class="response">
            <span class="label">Tipo:</span> <?= $data['screcao_obstrucao'] ?? 'Nenhum' ?><br>
            <span class="label">Lado:</span> <?= isset($data['screcao_obstrucao_local']) ? $data['screcao_obstrucao_local'] : 'Nenhum' ?>
        </div>

        <div class="label">4. Sintomas Associados:</div>
        <div class="response">
            <?php if (!empty($data['sintomas_associados'])): ?>
                <?php foreach ($data['sintomas_associados'] as $sintoma): ?>
                    <span class="checkbox-item">[x] <?= ucfirst(str_replace('_', ' ', $sintoma)) ?></span>
                <?php endforeach; ?>
            <?php else: ?>
                Nenhum sintoma selecionado.
            <?php endif; ?>
        </div>

        <div class="label">5. Histórico Odontológico:</div>
        <div class="response">
            <?php if (!empty($data['historico_odontologico']) && !in_array('nenhum', $data['historico_odontologico'])): ?>
                <?php foreach ($data['historico_odontologico'] as $key => $value): ?>
                    <?php if ($key !== 'obs' && !is_array($value)): ?>
                        <span class="checkbox-item"><strong><?= ucfirst($value) ?></strong></span>
                        <br>
                    <?php endif; ?>
                <?php endforeach; ?>
                <br><span class="label">Observações:</span> <?= $data['historico_odontologico']['obs'] ?>
            <?php else: ?>
                Nenhum histórico odontológico relevante.
            <?php endif; ?>
        </div>
        <div class="label">6. Trauma </div>
        <div class="response">
            <span class="label">Trauma:</span> <?= $data['trauma'] == 'sim' ? "Sim " . "<br>" . " ({$data['data_trauma']}) - {$data['descricao_trauma']}" : "Não" ?>
        </div>
        <div class="label">7. Cirurgia:</div>
        <div class="response">
            <span class="label">Trauma:</span> <?= $data['trauma'] == 'sim' ? "Sim " . "<br>" . " ({$data['data_trauma']}) - {$data['descricao_trauma']}" : "Não" ?><br>
            <span class="label">Cirurgia Prévia (Face/Crânio/Garganta):</span> <?= $data['cirurgia_garganta'] ?>
        </div>

        <div class="label">8. Tabagismo:</div>
        <div class="response">
            <?php
            if (!empty($data['tabagista']) && $data['tabagista'] == 'tabagista')
                echo "Fumante: {$data['tabagista_maços_por_dia']} maços/dia por {$data['tabagista_tempo_fumando']}";
            elseif (!empty($data['tabagista']) && $data['tabagista'] == 'exTabagista')
                echo "Ex-Fumante: Parou há {$data['exTabagista_tempo_fumando']} (Fumou por {$data['exTabagista_quanto_tempo']})";
            else echo "Não fumante";
            ?>
        </div>

        <div class="label">9. Tratamento para:</div>
        <div class="response">
            <?= isset($data['TTO']) ? implode(', ', array_filter(str_replace('_', ' ', $data['TTO']), fn($v) => !is_array($v))) : 'Nenhum' ?>
            <?= !empty($data['TTO']['outras']) ? " | Outras: " . $data['TTO']['outras'] : '' ?>
        </div>

        <div class="label">10. Quimioterapia e Radioterapia:</div>
        <div class="response">
            <span class="label">Quimioterapia:</span> <?= $data['quimioterapia'] == 'sim' ? $data['quimioterapia_explicacao'] : 'Não' ?><br>
            <span class="label">Radioterapia:</span> <?= $data['radioterapia'] == 'sim' ? "Sim" . " - " . $data['radioterapia_explicacao'] : 'Não' ?>
        </div>

        <div class="label">Dados Clínicos e Alergias:</div>
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

        <div class="label">Autorização de Telerradiologia:</div>
        <div class="response">
            O paciente <strong><?= $data['autorizacao'] == 'sim' ? 'AUTORIZA' : 'NÃO AUTORIZA' ?></strong> o compartilhamento de imagens para fins de diagnóstico.
        </div>
        <div id="signature-box">
            <div class="label">Assinatura do Paciente:</div>
            <img src="<?= $data['signature'] ?>">
        </div>
    </div>

</body>

</html>