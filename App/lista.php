<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            padding: 40px;
            max-width: 1000px;
            margin: auto;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 30px 20px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.2s ease;
            cursor: pointer;

            text-decoration: none;
            /* remove underline */
            color: #333;
            display: block;
            /* faz ocupar tudo */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .card a {
            text-decoration: none;
            color: #333;
            display: block;
        }

        .card h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }

        /* opcional: título da página */
        .title {
            text-align: center;
            padding-top: 30px;
            font-size: 26px;
            font-weight: bold;
            color: #333;
        }
    </style>

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
    <div class="title">Selecione um Documento</div>
    <div class="cards-container">

        <?php foreach ($data as $key => $value): ?>
            <a href="../documents/<?= $key ?>" class="card">
                <h3><?= ucwords(str_replace('-', ' ', $value)) ?></h3>
            </a>
        <?php endforeach; ?>
    </div>
</body>

</html>