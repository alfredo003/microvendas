<?php

use Dompdf\Dompdf;
require __DIR__ . "/../../vendor/autoload.php";

$dompdf = new Dompdf(["enable_remote"=>true]);

ob_start();
require __DIR__ . "/costumer_model.php";
$dompdf->loadHtml(ob_get_clean());
                     
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Lista_de_clientes.pdf",["Attachment" => false]);
die();?>