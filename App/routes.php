
<?php


$mpdf = new \Mpdf\Mpdf();
// $mpdf = new \Mpdf\Mpdf();


$app->get("/", function ($request, $response) {

    $home = __DIR__ . "/templates/lista.php";

    ob_start();
    require $home;
    $html = ob_get_clean();

    $response->getBody()->write($html);

    return $response;
});

$app->get('/documento/{type}', function ($request, $response, $args) {

    echo("PASSOU");
    $type = $args['type'];

    $template = __DIR__ . "/templates/documents/$type/form.php";

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

$app->post("/gerar/{type}", function($request, $response, $args) use ($mpdf){

    $mpdf = new \Mpdf\Mpdf();
    
    $type = $args['type'];
    $data = $request->getParsedBody();
    extract($data);
    
    $document = __DIR__ . "/templates/documents/$type/pdf.php";
    $css = file_get_contents(__DIR__ . '/templates/documents/assets/style/test.css');

    ob_start();
    require $document;

    $html = ob_get_clean();



    $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

    $mpdf->Output("type.pdf", "D");

});



$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$errorMiddleware->setErrorHandler(
    Slim\Exception\HttpNotFoundException::class,
    function ($request, $exception, $displayErrorDetails) use ($app) {

        $response = new Slim\Psr7\Response();
        $response->getBody()->write("Página não encontrada");

        return $response->withStatus(404);
    }
);