<?php
require_once '../vendor/autoload.php';
require_once '../model/SuperHero.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    //Instanciar clase SuperHero
    $superhero = new SuperHero();
    
    //Recepcionando los datos para el filtro desde la vista
    $filtros = [
      "race_id"     => $_GET['race_id'],
      "gender_id"   => $_GET['gender_id'],
      "alignment_id"=> $_GET['alignment_id']
    ];
    $datos = $superhero->filtrarSuperHero($filtros);
    $titulo = $_GET['titulo'];

    ob_start();

    //Archivos que componen PDF
    include './estilos.report.html';
    include './supergero.filter.data.php';

    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'es');
    $html2pdf->writeHTML($content);
    $html2pdf->output('SuperHero.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}