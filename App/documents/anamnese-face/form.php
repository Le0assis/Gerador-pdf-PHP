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
        <form id="form" action="/gerar/anamnese-face" method="POST">
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
                <div class="menuQueixaDor">
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
                            <td><input type="checkbox" name="queixa_dor_locais[]" value="outro" onclick="toggleMenuCheckbox(this)">Outro
                                <input type="text" name="queixa_dor_outras[outro]" style="display: none;" id="outro" placeholder="Outras...">
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
                    <tr id="menuScrecaoObstrucao">
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
            <div>
                <label><strong>5. Histórico odontológico: </strong></label>
                <table>
                    <tr>
                        <td><input type="checkbox" name="historico_odontologico[]" value="nenhum">Nenhum</td>
                        <td><input type="checkbox" name="historico_odontologico[]" value="implante" onclick="toggleMenuCheckbox(this)">Implante
                            <input type="date" name="historico_odontologico[implante]" id="implante" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="historico_odontologico[]" value="extracao" onclick="toggleMenuCheckbox(this)">Extração
                            <input type="date" name="historico_odontologico[extracao]" id="extracao" style="display: none;">
                        </td>

                        <td>
                            <input type="checkbox" name="historico_odontologico[]" value="canal" onclick="toggleMenuCheckbox(this)">Canal
                            <input type="date" name="historico_odontologico[canal]" id="canal" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="historico_odontologico[obs]" placeholder="Observações">
                        </td>
                    </tr>
                </table>
            </div>
            <div>
                <label><strong>6. Trauma? </strong></label>
                <input type="radio" name="trauma" value="sim" onclick="toggleMenu('menuTrauma', this.value)"> Sim
                <input type="radio" name="trauma" value="nao" onclick="toggleMenu('menuTrauma', this.value)"> Não
                <div id="menuTrauma" style="display: none;">
                    <label for="data_trauma">Data do trauma: </label>
                    <input type="date" name="data_trauma" id="data_trauma">
                    <br>
                    <label for="descricao_trauma">Descrição do trauma: </label>
                    <textarea name="descricao_trauma" id="descricao_trauma" cols="30" rows="10"></textarea>
                </div>
                <div>
                    <label><strong>
                            7. Cirurgia prévia em face e/ou crânio e/ou garganta:
                            <input type="text" name="cirurgia_garganta">
                        </strong></label>
                </div>
                <div>
                    <label><strong>8. É Fumante? </strong></label>
                    <input type="radio" name="tabagista" value="tabagista" onclick="toggleTabagismo('tabagista')"> Tabagista
                    <input type="radio" name="tabagista" value="exTabagista" onclick="toggleTabagismo('ex')"> Ex Tabagista
                    <input type="radio" name="tabagista" value="nao" onclick="toggleTabagismo('nao')"> Não

                    <div id="menu_tabagista" style="display: none;">
                        <label><strong>Quantos maços por dia? </strong></label>
                        <input type="number" name="tabagista_maços_por_dia" id="maços_por_dia">

                        <label><strong>Hà quanto tempo? </strong></label>
                        <input type="text" name="tabagista_tempo_fumando">
                    </div>
                    <div id="menu_ex" style="display: none;">
                        <label><strong>Parou hà quanto tempo? </strong></label>
                        <input type="text" name="exTabagista_tempo_fumando">

                        <label><strong>Por quanto tempo fumou? </strong></label>
                        <input type="text" name="exTabagista_quanto_tempo">
                    </div>
                </div>
                <div>
                    <label><strong>9. Realiza TTO para: </strong></label>
                    <table>
                        <tr>
                            <td><input type="checkbox" name="TTO[]" value="rinite_alergica">Rinite alérgica</td>
                            <td><input type="checkbox" name="TTO[]" value="rs">RS</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="TTO[]" value="rsc">RSC</td>
                            <td><input type="checkbox" name="TTO[]" value="desvio_septo">Desvio de septo</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="TTO[]" value="polipose_nasal">Polipose nasal</td>
                            <td><input type="checkbox" name="TTO[]" value="asma">Asma</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="TTO[]" value="refluxo_gastrico">Refluxo gàstrico</td>
                            <td><input type="checkbox" name="TTO[]" value="disfagia">Disfagia</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="TTO[]" value="tinnius">Tinnitus</td>
                            <td><input type="checkbox" name="TTO[]" value="vertigem">Vertigem</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="TTO[]" value="enxaqueca">Enxaqueca</td>
                            <td><input type="checkbox" name="TTO[]" value="outras" onclick="toggleMenuCheckbox(this)">Outras
                                <input type="text" name="TTO[outras]" id="outras" style="display: none;">
                            </td>
                            </td>
                        </tr>
                    </table>
                </div>
                <div>
                    <label><strong>10. Já realizou? </strong></label>
                    <table>
                        <tr>
                            <td>
                                <label><strong>Quimioterapia: </strong></label>
                            </td>
                            <td><input type="radio" name="quimioterapia" value="nao" onclick="toggleMenu('quimioterapia_explicacao', this.value)">Não</td>
                            <td><input type="radio" name="quimioterapia" value="sim" onclick="toggleMenu('quimioterapia_explicacao', this.value)">Sim</td>
                            <td><input type="text" name="quimioterapia_explicacao" id="quimioterapia_explicacao" style="display: none;" placeholder="Hà quanto tempo? e onde?"></td>
                        </tr>
                        <tr>
                            <td>
                                <label><strong>Radioterapia: </strong></label>
                            </td>
                            <td><input type="radio" name="radioterapia" value="nao" onclick="toggleMenu('radioterapia_explicacao', this.value)">Não</td>
                            <td><input type="radio" name="radioterapia" value="sim" onclick="toggleMenu('radioterapia_explicacao', this.value)">Sim</td>
                            <td><input type="text" name="radioterapia_explicacao" id="radioterapia_explicacao" style="display: none;" placeholder="Hà quanto tempo? e onde?"></td>
                        </tr>
                    </table>
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
                                    <br>
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


</body>

</html>