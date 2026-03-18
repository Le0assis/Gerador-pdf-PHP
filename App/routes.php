
<?php
require __DIR__ . "/assets/components/signature.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
$mpdf = new \Mpdf\Mpdf();
// $mpdf = new \Mpdf\Mpdf();
$css = file_get_contents(__DIR__ . "/assets/style/test.css");
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

$app->get('/documents/{type}', function ($request, $response, $args) use ($js, $css) {

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
    $html .= "<style>$css</style>";
    $html .= "<script>$js</script>";
    $response->getBody()->write($html);

    return $response;
});

$app->post("/gerar/{type}", function ($request, $response, $args) use ( $js, $css) {

    

    $mpdf = new \Mpdf\Mpdf([
        'format' => 'A4',
        'margin_top' => 40,
        'margin_bottom' => 30,
        'margin_left' => 0,
        'margin_right' => 0,
        'debug' => true,
        'showImageErrors' => true
    ]);

    $type = $args['type'];
    $data = $request->getParsedBody();
    // var_dump($data);
    // extract($data);
    // echo "Nome: " . $data['nome'];
    $document = __DIR__ . "/documents/$type/pdf.php";
    $pdfCss = file_get_contents(__DIR__ . "/documents/$type/style.css");

    ob_start();
    require $document;

    $html = ob_get_clean();
    while (ob_get_level()) {
    ob_end_clean();
    }   

    try {
        $signature = new Signature( __DIR__ . "/assets/components");
        $base64 = $data["signature"];
        $signature->save($base64);
        $name = $data['nome'];
        
        // $footerPath = __DIR__ . "/assets/components/footer.png";
        // $headerPath = __DIR__ . "/assets/components/header.png";

        $mpdf->SetHTMLHeader('
            <header style="width: 100%; position: absolute; top: 0;">
                <img src="' . __DIR__ . "/assets/components/header.png" . '" alt="Header" style="width: 100%; height: auto;">
            </header>
        ');

        $mpdf->SetHTMLFooter('
            <footer style="width: 100%; position: absolute; bottom: 0;">
                <img src="' . __DIR__ . "/assets/components/footer.png" . '" alt="Footer" style="width: 100%; height: auto;">
            </footer>
        ');

        $mpdf->WriteHTML($pdfCss, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

        $mpdf->Output("$name.pdf", "I");
    } catch (\Mpdf\MpdfException $e) {
        echo $e->getMessage();
        echo ("ERROR: " . $html);
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
