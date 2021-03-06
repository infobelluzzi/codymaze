<?php
//iDP 2021
/*
require __DIR__ . '/vendor/autoload.php';
use Knp\Snappy\Pdf;
use Knp\Snappy\Image;
*/

/*
function htmlToPdf($name) {
    $guid = GUID();
    $date = date("j F Y");

    require "pdf-template.php"; // Needed to generate static HTML page - Snappy won't read .php files

    // Prepare pdf generator
    //$snappy = new Pdf('/usr/local/bin/wkhtmltopdf');
    //$snappy = new Pdf('wkhtmltopdf');
    //$snappy = new Pdf('wkhtmltox/bin/wkhtmltopdf');

    //$snappy = new Image('wkhtmltoimage');
    $snappy = new Image('wkhtmltox/bin/wkhtmltoimage');

    //$snappy->setOption('orientation', 'Landscape');
    //$snappy->setOption('page-size', 'A4');
    //$snappy->setOption('no-pdf-compression', false);
    //$snappy->setOption('lowquality', false);

    try {
        // Generate PDF
        //$pdfName = $guid.'.pdf';
        $pdfName = $guid.'.png';
        $path = "certificates/".$pdfName;
        $snappy->generate('temp.html', $path);

        // Remove temp file
        unlink('temp.html');

        $returnData = array(
            "pdf_valid" => true,
            "pdf_guid" => $guid,
            "pdf_date" => $date,
            "pdf_name" => $name,
            "pdf_file" => $pdfName
        );
        return $returnData;
    } catch (Exception $e){
        Logger::error("pdf creation error: {$e}");
        $returnData = array(
            "pdf_valid" => false,
            "pdf_guid" => null,
            "pdf_date" => null,
            "pdf_name" => null,
            "pdf_file" => null
        );
        return $returnData;
    }
}
*/
//end iDP 2021
function GUID() {
//iDP 2021	
/*
    if (function_exists('com_create_guid') === true) {
        return trim(com_create_guid(), '{}');
    }
*/	
//end iDP 2021
    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

// to test:
// var_dump(htmlToPdf("Lorenz Klopfenstein"));
