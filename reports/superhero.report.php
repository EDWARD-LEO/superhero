<?php

require_once '../vendor/autoload.php';
require_once '../model/SuperHero.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {

    //Instanciar clase SuperHero
    $superhero = new SuperHero();
    $datos = $superhero->listarSuperHero(3);

    ob_start();

    //Archivos que componen PDF
    //Hoja de estilos
    include './estilos.report.html';
    //Archivos con datos (estáticos/dinámicos)
    include './superhero.data.php';

    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'es');
    $html2pdf->writeHTML($content);
    $html2pdf->output('SuperHero.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}