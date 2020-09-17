<?php

$pdfcontent = '

<html>


    <head>

        <title>Schulfest Zugang</title>
        <meta charset="utf-8">

    </head>

    <bod>

        <h1>Dies ist ein Test.</h1>
        <p>Bitte ignorieren.</p>

    </body>


</html>

';

// TCPDF Library laden
require_once('tcpdf/tcpdf.php');

// Erstellung des PDF Dokuments
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Dokumenteninformationen
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($pdfAuthor);
$pdf->SetTitle("Schulfest Zugang");
$pdf->SetSubject("Schulfest-Account");


// Header und Footer Informationen
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Auswahl des Font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Auswahl der MArgins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Automatisches Autobreak der Seiten
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Image Scale 
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Schriftart
$pdf->SetFont('dejavusans', '', 10);

// Neue Seite
$pdf->AddPage();

// Fügt den HTML Code in das PDF Dokument ein
$pdf->writeHTML($pdfcontent, true, false, true, false, '');

//Ausgabe der PDF

//Variante 1: PDF direkt an den Benutzer senden:
//$pdf->Output($pdfName, 'I');

//Variante 2: PDF im Verzeichnis abspeichern:

$pdfName = "test-" . time() . ".pdf";

#$pdf->Output($_SERVER["DOCUMENT_ROOT"] . "manage/pdf/" . $pdfName, 'F');
echo 'PDF herunterladen: <a href="pdf/'.$pdfName.'">'.$pdfName.'</a>';

?>