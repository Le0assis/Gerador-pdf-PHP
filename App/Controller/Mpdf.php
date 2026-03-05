<?php

use Mpdf\Mpdf;

class PdfController
{

    public function gerar($request, $response, $args)
    {

        $tipo = $args['tipo'];

        $templates = [
            "declaracao-contraste" => "declaracao-contraste.php",
            "cranio" => "cranio.php"
        ];

        if(!isset($templates[$tipo])){
            $response->getBody()->write("Documento não existe");
            return $response;
        }

        $dados = $request->getParsedBody();

        $template = __DIR__ . "/../functions/" . $templates[$tipo];

        ob_start();
        require $template;
        $html = ob_get_clean();

        $mpdf = new Mpdf();

        $mpdf->WriteHTML($html);

        $mpdf->Output();

        return $response;

    }

}