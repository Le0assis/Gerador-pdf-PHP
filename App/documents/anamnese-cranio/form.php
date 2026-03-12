<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdn.jsdelivr.net/npm/signature_pad'></script>
    <title>Anamnese</title>
</head>
<style>

body{
    font-family: Arial, Helvetica, sans-serif;
    background-color:#f4f6f8;
    margin:0;
    padding:40px;
}

form{
    background:white;
    max-width:900px;
    margin:auto;
    padding:30px;
    border-radius:8px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

h1{
    text-align:center;
    margin-bottom:30px;
}

div{
    margin-bottom:18px;
}

label{
    font-weight:bold;
    display:block;
    margin-bottom:5px;
}

input[type="text"],
input[type="number"],
input[type="date"],
textarea{
    width:100%;
    padding:8px;
    border:1px solid #ccc;
    border-radius:4px;
    font-size:14px;
}

textarea{
    min-height:70px;
    resize:vertical;
}

input[type="radio"],
input[type="checkbox"]{
    margin-right:6px;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}

td{
    padding:6px;
    vertical-align:top;
}

button{
    background:#2c7be5;
    color:white;
    border:none;
    padding:12px 20px;
    font-size:16px;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#1a68d1;
}
td input[type="checkbox"]{
    margin-right:8px;
}
label input[type="radio"]{
    margin-right:5px;
}
.grid{
    display:grid;
    grid-template-columns:2fr 1fr 1fr;
    gap:15px;
}

</style>
<body>
    <div id="step1">
        <form id="form" action="/gerar/anamnese-cranio" method="POST">
            <h1>Anamnese Crânio</h1>

            <div class="grid">
                <label>
                    Nome:
                    <input type="text" id="nome" name="name">
                </label>

                <label>
                    Idade:
                    <input type="number" id="idade" name="age">
                </label>

                <label>
                    Peso:
                    <input type="number" id="peso" name="weight">
                </label>
            </div>

            <div>
                <label>
                    1. Motivo do exame e início da sintomatologia:
                    <textarea id="motivo_exame" name="question1"></textarea>
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
                    <input type="radio" name="convulsions" value="sim" onclick="toggleMenu('convulsionsMenu', this.value)"> Sim
                </label>
                <label>
                    <input type="radio" name="convulsions" value="nao" onclick="toggleMenu('convulsionsMenu', this.value)"> Não
                </label>
            </div>
            <!-- style="display: none;" -->
            <div id="convulsionsMenu" style="display: none;">
                <p>Percebe quando vai ter a crise? </p>
                <input type="text" name="percepcao_crise">

                <p>Alguém testemunhou a crise? Se positivo, descrevê-la desde início.
                    (Qual membro flexiona? com qual mão se recompõe ou enxuga o rosto após a crise?)</p>
                <textarea name="testemunha_crise"></textarea>

                <p>Quantas crises apresentou no último mês? </p>
                <input type="number" name="qtd_ultimo_mes" placeholder="Ex: 3">

                <p>Há aumento da freqüência das crises? Quanto? </p>
                <input type="text" name="frequencia_crises">

                <p>Fez (trouxe) ECG? </p>
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
                    <input type="radio" name="criancas" onclick="toggleMenu('childrenMenu', this.value)"> Sim
                    <input type="radio" name="criancas" onclick="toggleMenu('childrenMenu', this.value)"> Não
                </label>
            </div>
            <!-- style="display: none;" -->
            <div id="childrenMenu" style="display: none;">
                <p>Gestação nomral?Complicações? </p>
                <input type="text" name="gestacao">
                <p>Parto nomral? </p>
                <input type="text" name="parto">
                <p>Atraso no desenvolvimento? </p>
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
                                <input type="radio" name="IR" value="sim" onchange="toggleRequired()">
                                Sim
                                <input type="radio" name="IR" value="nao" onchange="toggleRequired()">
                                Não
                            </label>
                            <input type="text" id="IR_descricao" placeholder="Descreva a IR" name="IR_descricao" style="display: none;">
                        </td>
                    </tr>
                </table>
            </div>
            <div>
                <p><strong>
                        Autorizo compartilhar, se necessário, as imagens do meu exame, bem como minhas informações clinicas,
                        caso necessite de uma opinião de serviço de telerradiologia para auxiliar no meu diagnóstico.
                    </strong></p>
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