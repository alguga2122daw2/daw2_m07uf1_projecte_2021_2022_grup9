<?php
include_once($_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php");
use Dompdf\Dompdf;

if ($_GET['Imprimir']=="true") {
    session_start();
    $dompdf = new Dompdf();
    $dompdf->setPaper('a4', 'landscape');
    $dompdf->loadHtml($_SESSION["render_table"]);
    $dompdf->render();
    $dompdf->stream();
}