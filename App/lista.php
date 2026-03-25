<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
    <?php
        $data = [
            'declaracao-contraste' => "Declaração de Contraste",
            'anamnese-cranio' => 'Anamnese Cranio',
            'anamnese-face' => 'Anamnese Face',
            'anamnese-atm' => 'Anamnese ATM'
        ];
    ?>
    <div class="cards-container">
        <?php foreach ($data as $key => $value): ?>
            <div class="card">
                <a href="../documents/<?= $key ?>">
                    <h3><?= ucwords(str_replace('-', ' ', $value)) ?></h3>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>
