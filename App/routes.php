
<?php


$mpdf = new \Mpdf\Mpdf();
// $mpdf = new \Mpdf\Mpdf();
$css = file_get_contents(__DIR__ . "/assets/style/test.css");
$js =  file_get_contents(__DIR__ . "/assets/signature.js");


// var_dump($js);

$app->get("/", function ($request, $response) {

    $home = __DIR__ . "/lista.php";

    ob_start();
    require $home;
    $html = ob_get_clean();

    $response->getBody()->write($html);

    return $response;
});

$app->get('/documents/{type}', function ($request, $response, $args) use ($css, $js) {

    echo ("PASSOU");
    $type = $args['type'];

    $template = __DIR__ . "/documents/$type/form.php";

    if (!file_exists($template)) {
        echo ("ERRO");
        echo ($template);
        $response->getBody()->write("Documento não existe");
        return $response;
    }

    ob_start();
    require $template;
    $html = ob_get_clean();
    $html .="<style>$css</style>"; 
    $html .="<script>$js</script>";
    $response->getBody()->write($html);

    return $response;
});

$app->post("/gerar/{type}", function ($request, $response, $args) use ($mpdf, $css) {

    $mpdf = new \Mpdf\Mpdf([
        'format' => 'A4',
        'debug' => true,
        'showImageErrors' => true
    ]);

    $type = $args['type'];
    $data = $request->getParsedBody();
    extract($data);
    $document = __DIR__ . "/documents/$type/pdf.php";

    ob_start();
    require $document;

    $html = ob_get_clean();
    try {
        $name = $data['name'];
        $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

        $mpdf->Output("$name.pdf", "I");
    } catch (\Mpdf\MpdfException $e) {
        echo ($html);
        $mpdf->Output($e->getMessage());
    }
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
