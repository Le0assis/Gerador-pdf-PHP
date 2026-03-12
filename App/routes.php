
<?php
require __DIR__ . "/assets/components/signature.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
$mpdf = new \Mpdf\Mpdf();
// $mpdf = new \Mpdf\Mpdf();
$css = file_get_contents(__DIR__ . "/assets/style/test.css");
$pdfCss = file_get_contents(__DIR__ . "/assets/style/pdf.css");
$pdfJs =  file_get_contents(__DIR__ . "/assets/js/signature.js");
$js = file_get_contents(__DIR__ . "/assets/js/utils.js") . $pdfJs;


// var_dump($js);

$app->get("/", function ($request, $response) {

    $home = __DIR__ . "/lista.php";

    ob_start();
    require $home;
    $html = ob_get_clean();

    $response->getBody()->write($html);

    return $response;
});

$app->get('/documents/{type}', function ($request, $response, $args) use ($js) {

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
    // $html .= "<style>$css</style>";
    $html .= "<script>$js</script>";
    $response->getBody()->write($html);

    return $response;
});

$app->post("/gerar/{type}", function ($request, $response, $args) use ($pdfCss) {

    $mpdf = new \Mpdf\Mpdf([
        'format' => 'A4',
        'margin_top' => 20,
        'margin_bottom' => 20,
        'margin_left' => 10,
        'margin_right' => 10,
        // 'debug' => true,
        // 'showImageErrors' => true
    ]);

    $type = $args['type'];
    $data = $request->getParsedBody();
    extract($data);
    $document = __DIR__ . "/documents/$type/pdf.php";

    ob_start();
    require $document;

    $html = ob_get_clean();
    try {
        $signature = new Signature( __DIR__ . "/assets/components");
        $base64 = $data["signature"];
        $signature->save($base64);
        $name = $data['name'];
        while (ob_get_level()) {
            ob_end_clean();
        }
        $mpdf->WriteHTML($pdfCss, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);


        $mpdf->Output("$name.pdf", "I");
    } catch (\Mpdf\MpdfException $e) {
        echo $e->getMessage();
        echo ($html);
    }

    return $response;
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
