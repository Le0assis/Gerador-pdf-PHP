<!DOCTYPE html>
<html>
<head>
<style>

body{
    font-family: Arial, sans-serif;
    font-size: 14px;
}

.header{
    text-align:center;
    margin-bottom:30px;
}

.section{
    margin-bottom:20px;
}

.label{
    font-weight:bold;
}

.box{
    border:1px solid black;
    padding:10px;
}

</style>
</head>

<body>

<div class="header">
    <h2>ANAMNESE CRÂNIO</h2>
</div>

<div class="section">
    <span class="label">Paciente:</span>
    <?= $dados['name'] ?>
</div>

<div class="section">
    <span class="label">Data:</span>

</div>

<div class="section box">
    Observações do exame
</div>

</body>
</html>