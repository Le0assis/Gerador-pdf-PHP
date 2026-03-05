
<?php
require __DIR__ . '/../Controller/Mpdf.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();
$mpdf = new \Mpdf\Mpdf();
// $mpdf = new \Mpdf\Mpdf();


$app->get('/', function ($request, $response) {
    $response->getBody()->write("Home");
    return $response;
});

$app->get('/documento/{type}', function ($request, $response, $args) {

    echo("PASSOU");
    $type = $args['type'];

    $template = __DIR__ . "/../templates/$type.php";

    if (!file_exists($template)) {
        echo("ERRO");
        echo($template);
        $response->getBody()->write("Documento não existe");
        return $response;
    }

    ob_start();
    require $template;
    $html = ob_get_clean();

    $response->getBody()->write($html);

    return $response;
});

$app->get('/gerar/{type}',  [$controller, 'gerar']);