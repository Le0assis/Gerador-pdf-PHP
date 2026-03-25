<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="step1">
        <form action="/gerar/anamnese-atm" id="form" method="POST">
            <h1>Anamnese ATM</h1>

            <div class="grid">
                <label>
                    Nome:
                    <input type="text" id="nome" name="nome" required>
                </label>

                <label>
                    Idade:
                    <input type="number" id="idade" name="idade" required>
                </label>

                <label>
                    Peso:
                    <input type="number" id="peso" name="peso" step="any">
                </label>
            </div>

            <div>
                <label>
                    1. Motivo do exame e início da sintomatologia:
                    <textarea id="motivo_exame" name="motivo_exame" required></textarea>
                </label>
            </div>
            <div>
                <table>
                    <tr>
                        <td>

                            <div>
                                <label>
                                    2. Sente dor?

                                    <input type="radio" name="sente_dor" value="sim" required onclick="toggleRequired('senteDor', this.value)"> Sim
                                    <input type="radio" name="sente_dor" value="nao" required onclick="toggleRequired('senteDor', this.value)"> Não
                                </label>
                                <div>
                        </td>
                        <td>
                            <div id="senteDor" style="Display: none;">
                                <label style="display: flex; align-items: center;">
                                    De 0 a 10 qual o nivel de dor:
                                    <input type="number" id="nivel_dor" name="nivel_dor" min="0" max="10">
                                </label>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div>
                <div>
                    <label>
                        Você tem limitação de abertura de boca?

                        <input type="radio" name="limitacao_boca" value="sim" required onclick="toggleRequired('limitacaoBoca', this.value)"> Sim
                        <input type="radio" name="limitacao_boca" value="nao" required onclick="toggleRequired('limitacaoBoca', this.value)"> Não
                    </label>
                </div>
                <div id="limitacaoBoca" style="Display: none;">
                    <label>
                        Há quanto tempo? Descreva ela
                        <textarea id="descricao_limitacao" name="descricao_limitacao"></textarea>
                    </label>
                </div>
            </div>
            <div>
                <label>
                    4. Você ouve estralos ("clock") quando abre a boca?
                    <input type="radio" name="estralos" value="sim" required onclick="toggleRequired('estralos', this.value)"> Sim
                    <input type="radio" name="estralos" value="nao" required onclick="toggleRequired('estralos', this.value)"> Não
                </label>
                <div style="display: none;" id="estralos">
                    <label for="lado_estralo"> Lado Estralo:
                        <input type="radio" name="lado_estralo" value="direira"> Direita
                        <input type="radio" name="lado_estralo" value="esquerda"> Esquerda
                        <input type="radio" name="lado_estralo" value="ambos"> Ambos
                    </label>
                </div>
            </div>
            <div>
                <label for="saiLugar"> 5. Sai do lugar:
                    <input type="radio" name="saiLugar" value="sim">Sim
                    <input type="radio" name="saiLugar" value="nao">Não
                </label>
            </div>
            <div>
                <label for="trauma">6. Houve trauma?
                    <input type="radio" name="trauma" value="sim">Sim
                    <input type="radio" name="trauma" value="nao">Não
                </label>
            </div>
            <div>
                <label for="estresse">7. Houve fratura?
                    <input type="radio" name="estresse" value="sim">Sim
                    <input type="radio" name="estresse" value="nao">Não
                </label>
            </div>
            <div>
                <label for="mandibulaOperada">8. Já foi operado da mandíbula?
                    <input type="radio" name="mandibulaOperada" value="sim" onclick="toggleMenu('mandibulaOperadaMenu', this.value)">Sim
                    <input type="radio" name="mandibulaOperada" value="nao" onclick="toggleMenu('mandibulaOperadaMenu', this.value)">Não
                </label>
                <div id="mandibulaOperadaMenu" style="display: none;">
                    <label for="detalhesCirurgia">Há quanto tempo? Detalhes da cirurgia:
                        <textarea name="detalhesCirurgia" id="detalhesCirurgia"></textarea>
                    </label>
                </div>
            </div>
            <div>
                <label for="quimioterapia">9. já fez quimioterapia?
                    <input type="radio" name="quimioterapia" value="sim" onclick="toggleMenu('quimioterapiaTempo', this.value)">Sim
                    <input type="radio" name="quimioterapia" value="nao" onclick="toggleMenu('quimioterapiaTempo', this.value)">Não
                </label>

                <div id="quimioterapiaTempo" style="display: none;">
                    <label for="tempoQuimio">Há quanto tempo? Detalhes da quimioterapia:
                        <input type="text" name="quimioterapiaTempo">
                    </label>
                </div>
            </div>

            <div>
                <label for="quimioterapia">9. já fez radioterapia?
                    <input type="radio" name="quimioterapia" value="sim" onclick="toggleMenu('radioterapiaTempo', this.value)">Sim
                    <input type="radio" name="quimioterapia" value="nao" onclick="toggleMenu('radioterapiaTempo', this.value)">Não
                </label>
                <div id="radioterapiaTempo" style="display: none;">
                    <label for="tempoRadioterapia">Há quanto tempo? Detalhes da radioterapia:
                        <input type="text" name="radioterapiaTempo">
                    </label>
                </div>
            </div>












            <div style="display: flex; gap: 20px;">

                <!-- LADO ESQUERDO -->
                <div style="position: relative;">
                    <img id="imgLeft" src="../../App/assets/images/anamnese-atm-mandibula-direita.png" width="300">
                    <canvas id="canvasLeft"></canvas>
                </div>
                <input type="hidden" name="dor_esquerda" id="inputLeft">

                <!-- LADO DIREITO -->
                <div style="position: relative;">
                    <img id="imgRight" src="/assets/images/anamnese-atm-mandibula-direita.png" width="300">
                    <canvas id="canvasRight"></canvas>
                </div>
                <input type="hidden" name="dor_direita" id="inputRight">

            </div>

            <button type="button" onclick="removerUltimoGlobal()">Desfazer último</button>






    </div>
    </form>
    </div>
</body>

</html>