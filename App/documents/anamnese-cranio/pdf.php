<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="a4-container">

        <div class="header">
            <div>
                <h1>Anamnese de Crânio</h1>
                <small>Unimagem - Diagnóstico por Imagem</small>
            </div>
            <div style="text-align: right; color: #999;">Data: <?= date('d/m/Y') ?></div>
        </div>

        <table>
            <tr>
                <td>
                    <span class="label">Nome:</span>
                    <div class="response"><?= $data['nome'] ?></div>
                </td>
                <td>
                    <span class="label">Idade:</span>
                    <div class="response"><?= $data['idade'] ?></div>
                </td>
                <td>
                    <span class="label">Peso:</span>
                    <div class="response"><?= $data['peso'] ?></div>
                </td>
            </tr>
        </table>

        <div class="section-box">
            <span class="label">1. Motivo do exame e início da sintomatologia:</span>
            <div class="response"><?= nl2br($data['motivo_exame']) ?></div>
        </div>

        <div class="section-box">
            <span class="label">2. Se cefaleia, qual a localização, o tipo da dor e a duração?</span>
            <div class="response"><?= nl2br($data['cefaleia']) ?></div>
        </div>

        <div class="section-box">
            <span class="label">3. Teve convulsões?</span>
            <div class="response">
                <?php if ($data['convulsoes'] == "sim"): ?>
                    <strong>Sim</strong><br>
                    <strong>Percebe quando vai ter a crise?</strong> <?= $data['percepcao_crise'] ?><br>
                    <strong>Alguém testemunhou a crise?</strong> <?= $data['testemunha_crise'] ?>
                <?php else: ?>
                    Não
                <?php endif; ?>
            </div>
        </div>

        <div class="section-box">
            <span class="label">4. Sintomas:</span>
            <div class="response">
                <?php foreach ($data['sintomas'] as $sintoma): ?>
                    <span class="checkbox-row">
                        <input type="checkbox" checked disabled> <?= ucfirst(str_replace('_', ' ', $sintoma)) ?>
                    </span>
                <?php endforeach; ?>

                <?php if (in_array("outros", $data['sintomas'])): ?>
                    <div style="margin-top: 5px;">
                        <strong>Outros sintomas:</strong> <?= $data['outros_sintomas'] ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="section-box">
            <span class="label">5. Medicamentos em uso:</span>
            <div class="response"><?= $data['medicamentos'] ?></div>
        </div>

        <div class="section-box">
            <span class="label">6. Já fez cirurgias na cabeça? Quais e quantas?</span>
            <div class="response"><?= $data['cirurgias_cabeca'] ?></div>
        </div>

        <div class="section-box">
            <span class="label">7. Já foi submetido a Radio ou Quimioterapia?</span>
            <div class="response"><?= $data['radio_quimioterapia'] ?></div>
        </div>

        <div class="section-box">
            <span class="label">8. Paciente é criança ou teve filhos?</span>
            <div class="response">
                <?php if ($data['criancas'] == "sim"): ?>
                    <strong>Sim</strong><br>
                    <strong>Gestação:</strong> <?= $data['gestacao'] ?> |
                    <strong>Parto:</strong> <?= $data['parto'] ?> |
                    <strong>Atraso desenvolvimento:</strong> <?= $data['atraso_desenvolvimento'] ?>
                <?php else: ?>
                    Não
                <?php endif; ?>
            </div>
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
 
</body>

</html>