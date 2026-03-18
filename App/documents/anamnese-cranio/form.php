<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdn.jsdelivr.net/npm/signature_pad'></script>
    <title>Anamnese</title>
</head>

<body>
    <div id="step1">
        <form id="form" action="/gerar/anamnese-cranio" method="POST">
            <h1>Anamnese Crânio</h1>

            <div class="grid">
                <label>
                    Nome:
                    <input type="text" id="nome" name="nome">
                </label>

                <label>
                    Idade:
                    <input type="number" id="idade" name="idade">
                </label>

                <label>
                    Peso:
                    <input type="number" id="peso" name="peso" step="any">
                </label>
            </div>

            <div>
                <label>
                    1. Motivo do exame e início da sintomatologia:
                    <textarea id="motivo_exame" name="motivo_exame"></textarea>
                </label>
            </div>

            <div>
                <label>
                    2. Se cefaleia, qual a localização, o tipo da dor e a duração?
                    <textarea name="cefaleia"></textarea>
                </label>
            </div>
            <div>
                <label>3. Teve convulsões?</label>

                <label>
                    <input type="radio" name="convulsoes" value="sim" onclick="toggleMenu('convulsoesMenu', this.value)"> Sim
                </label>
                <label>
                    <input type="radio" name="convulsoes" value="nao" onclick="toggleMenu('convulsoesMenu', this.value)"> Não
                </label>
            </div>
            <!-- style="display: none;" -->
            <div id="convulsoesMenu" style="display: none;">
                <label>Percebe quando vai ter a crise? </label>
                <input type="text" name="percepcao_crise">

                <label>Alguém testemunhou a crise? Se positivo, descrevê-la desde início.
                    (Qual membro flexiona? com qual mão se recompõe ou enxuga o rosto após a crise?)</label>
                <textarea name="testemunha_crise"></textarea>

                <label>Quantas crises apresentou no último mês? </label>
                <input type="number" name="qtd_ultimo_mes" placeholder="Ex: 3">

                <label>Há aumento da freqüência das crises? Quanto? </label>
                <input type="text" name="frequencia_crises">

                <label>Fez (trouxe) ECG? </label>
                <input type="text" name="ECG">
            </div>
            <div>
                <table>
                    <tr>
                        <td>
                            <label>4. Outros sintomas: </label>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" name="sintomas[]" value="Tonturas_vertigens"> Tonturas / Vertigens
                            (rotatoria)</td>
                        <td><input type="checkbox" name="sintomas[]" value="Desmaio"> Desmaio ou Perda de consciência</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="sintomas[]" value="nauseas_vomitos">Náuseas / Vômitos</td>
                        <td><input type="checkbox" name="sintomas[]" value="sensibilidade">Prde de sensibilidade</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="sintomas[]" value="alteracao_marcha">Alteração de marcha</td>
                        <td><input type="checkbox" name="sintomas[]" value="confusao_mental">Confusaão Mental</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="sintomas[]" value="perda_forca">Perda de força</td>
                        <td><input type="checkbox" name="sintomas[]" value="disturbio_auditivo">Distúrbio auditivo</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="sintomas[]" value="disturbio_visual">Distúrbio visual</td>
                        <td><input type="checkbox" name="sintomas[]" value="trauma_queda">Trauma / Queda</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="sintomas[]" value="esquecimento">Esquecimento de fatos? (recente ou antigo)</td>
                        <td><input type="checkbox" name="sintomas[]" value="outro">Outros
                            <input type="text" name="outros_sintomas">
                        </td>
                    </tr>
                </table>
            </div>
            <div>
                <label>
                    5. Medicamentos em uso:
                    <input type="text" name="medicamentos">
                </label>
            </div>
            <div>
                <label>
                    6. Já fez cirurgias na cabeça? Quais e quantas?
                    <input type="text" name="cirurgias_cabeca">
                </label>
            </div>
            <div>
                <label>
                    7. Já foi submetido a Radio ou Quimioterapia? Há quanto tempo e em que local?
                    <input type="text" name="radio_quimioterapia">
                </label>
            </div>
            <div>
                <label>
                    8. Paciente é criança ou teve filhos?
                    <input type="radio" name="criancas" onclick="toggleMenu('childrenMenu', this.value)" value="sim"> Sim
                    <input type="radio" name="criancas" onclick="toggleMenu('childrenMenu', this.value)" value="nao"> Não
                </label>
            </div>
            <!-- style="display: none;" -->
            <div id="childrenMenu" style="display: none;">
                <label>Gestação nomral? Complicações? </label>
                <input type="text" name="gestacao">
                <label>Parto nomral? </label>
                <input type="text" name="parto">
                <label>Atraso no desenvolvimento? </label>
                <input type="text" name="atraso_desenvolvimento">
            </div>
            <div>
                <table>
                    <tr>
                        <td>
                            <label>
                                <strong>CREATINA SÉRICA</strong>
                            <input type="text" name="creatina_serica">
                        </label>
                        </td>
                        <td>
                            <label>
                                <strong>DATA</strong>
                            <input type="date" name="data">
                        </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <strong>SUSPEITA DE GRAVIDEZ</strong>
                            <input type="radio" name="suspeita_gravidez" value="sim"> Sim
                            <input type="radio" name="suspeita_gravidez" value="nao"> Não
                            <input type="radio" name="suspeita_gravidez" value="nao_aplica"> Não se aplica
                        </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                Alergias: 
                            <input type="text" name="alergias">
                            </label>
                        </td>
                        <td>
                            <label>
                                Doença de base:
                            <input type="text" name="doenca_base">
                        </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                Asma: 
                            <input type="radio" name="asma" value="sim"> Sim
                            <input type="radio" name="asma" value="nao"> Não
                        </label>
                        </td>
                        <td>
                            <label>IR: 
                                <input type="radio" name="IR" value="sim" onchange="toggleRequired('IR_descricao', this.value)">
                                Sim
                                <input type="radio" name="IR" value="nao" onchange="toggleRequired('IR_descricao', this.value)">
                                Não
                            </label>
                         
                                <input type="text" id="IR_descricao" placeholder="Descreva a IR" name="IR_descricao" style="Display: none;">
               

                        </td>
                    </tr>
                </table>
            </div>
            <div>
                <label><strong>
                        Autorizo compartilhar, se necessário, as imagens do meu exame, bem como minhas informações clinicas,
                        caso necessite de uma opinião de serviço de telerradiologia para auxiliar no meu diagnóstico.
                    </strong></label>
                <label>
                    <strong>
                        <input type="radio" name="autorizacao" value="sim">
                        Sim
                    </strong>
                </label>
                <label>
                    <strong>
                        <input type="radio" name="autorizacao" value="nao">
                        Não
                    </strong>
                </label>
            </div>
            <button type="button" onclick="changeStep('step1', 'step2')">Enviar</button>
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
            <button type="button" onclick="changeStep('step2', 'step1')">Voltar</button>
        </div>


        
    </form>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            teste()
        });
    </script>
</body>

</html>