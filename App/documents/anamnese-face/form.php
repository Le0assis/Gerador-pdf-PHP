<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src='https://cdn.jsdelivr.net/npm/signature_pad'></script>
</head>
<body>
    
    <div id="step1">
        <table>
            <tr>
                <td>
                    <label for="nome">Nome: </label>
                    <input type="text" id="nome" name="nome">
                </td>
                <td>
                    <label for="idade">Idade: </label>
                    <input type="text" id="idade" name="idade">
                </td>
                <td>
                    <label for="peso">Peso: </label>
                    <input type="text" id="peso" name="peso">
                </td>
            </tr>
        </table>
        <h1>Anamnese de face/mastoide</h1>

        <div>
            <label for="motivo_exame"><strong>1. Motivo do exame e início da sintomatologia:</strong></label>
            <textarea name="motivo_exame" id="motivo_exame" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="queixa_dor"><strong>2. Há queixa de dor facial? </strong></label>
            <input type="radio" name="queixa_dor" id="queixa_dor" value="sim" onclick="toggleMenu('menuQueixaDor', this.value)"> Sim
            <input type="radio" name="queixa_dor" id="queixa_dor" value="nao"> Não
            <div class="menuQueixaDor" >
                <table>
                    <tr>
                        <td><label>Local da dor: </label></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="queixa_dor_locais[]" value="Frontal">Frontal</td>
                        <td><input type="checkbox" name="queixa_dor_locais[]" value="Maxilar">Maxilar</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="queixa_dor_locais[]" value="Orbiaria">Orbitária</td>
                        <td><input type="checkbox" name="queixa_dor_locais[]" value="Periorbital">Periorbital</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="queixa_dor_locais[]" value="Nasal">Nasal</td>
                        <td><input type="checkbox" name="queixa_dor_locais[]" value="outro">Outro</td>
                        <td><input type="text" name="queixa_dor_local_outro"></td>
                    </tr>
                    <tr>
                        <td>
                            <label><strong>Outras: </strong></label>
                            <input type="text" name="queixa_dor_outras">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><strong>Tipo da dor: </strong></label>
                            <input type="text" name="queixa_dor_tipo">
                        </td>
                        <td>
                            <label>Duração: </label>
                            <input type="text" name="queixa_dor_duracao">
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div>
            <table>
                <tr>
                    <!-- Isso aqui ta repetido na 4 fala, fazer menu oblico -->
                    <td><input type="radio" name="screcao_obstrucao" value="secrecao">Secreção nasal</td>
                    <td><input type="radio" name="screcao_obstrucao" value="obstrucao">Obstrução nasal</td>
                </tr>
                <tr>
                    <tr id="menuScrecaoObstrucao" >
                        <td><input type="checkbox" name="screcao_obstrucao_locais[]" value="esquerda">Esquerda</td>
                        <td><input type="checkbox" name="screcao_obstrucao_locais[]" value="direita">Direita</td>
                        <td><input type="checkbox" name="screcao_obstrucao_locais[]" value="bilateral">Bilateral</td>
                    </tr>
                </tr>
            </table>
        </div>

        <div>
            <label><strong>4. Presença de sintomas associados: </strong></label>
            <table>
                <tr>
                    <td><input type="checkbox" name="sintomas_associados[]" value="otite">Otite</td>
                    <td><input type="checkbox" name="sintomas_associados[]" value="ronco">Ronco</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="sintomas_associados[]" value="rsc">RSC</td>
                    <td><input type="checkbox" name="sintomas_associados[]" value="diminuicao_olfato">Diminuição/perda de olfato</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="sintomas_associados[]" value="epifora">Epífora</td>
                    <td><input type="checkbox" name="sintomas_associados[]" value="dor_dentaria">Dor Dentária</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="sintomas_associados[]" value="edema_facial">Edema facial</td>
                    <td><input type="checkbox" name="sintomas_associados[]" value="febre">Febre</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="sintomas_associados[]" value="congestao_nasal">Congestão nasal</td>
                    <td><input type="checkbox" name="sintomas_associados[]" value="tontura">Tontura</td>
                </tr>
            </table>
        </div>









    </div>

</body>
</html>