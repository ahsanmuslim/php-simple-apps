<?php

use Ramsey\Uuid\Uuid;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

require_once __DIR__ . '/vendor/autoload.php';

$number = bin2hex(random_bytes(6));

var_dump($number);

// This will output the barcode as HTML output to display in the browser
$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
echo $generator->getBarcode($number, $generator::TYPE_CODE_128);

//Menggunakan Library Chillerlan unutuk Generate QR Code
$data = 'http://localhost:3000/';
echo '<img src="'.(new QRCode)->render($data).'" alt="QR Code" />';

$options = new QROptions(
    [
        'eccLevel' => QRCode::ECC_L,
        'outputType' => QRCode::OUTPUT_MARKUP_SVG,
        'version' => 5,
    ]
);

$barcode = Uuid::uuid1()->toString();
var_dump($barcode);
$qrcode = (new QRCode($options))->render($barcode);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Create QR Codes in PHP</title>
        <link rel="stylesheet" href="/css/styles.min.css">
    </head>
    <body>
        <h1>Creating QR Codes in PHP</h1>
        <div class="container">
        <img src='<?= $qrcode ?>' alt='QR Code' width='200' height='200'>
        </div>
    </body>
</html>